<?php
/**
 * Utility classes used in php development for various tasks
 *
 *
 * @author Brian Gibbins
 * @copyright 2014
 * @see http://en.wikipedia.org/wiki/PHPDoc
 */

class Dblog {

	//TODO set PDO string vars to constants

	static $applicationMessages = array();
	static $applicationErrors = array();

	const STORE_ID = "f4p";

	const DB_TABLE = "processLogF4P";

	function getDblog($filter=null) {


		include_once("Db.php");
		$dbObj = new Db();
		$db = $dbObj->connect();

		if(!empty($filter)) {
			$where = " WHERE `visitorId`='" . $filter . "' ";
			$sql = "SELECT * FROM `" . self::DB_TABLE . "` " . $where . " ORDER BY logkey DESC LIMIT 0,10000";
		} else {
			$sql = "SELECT * FROM `" . self::DB_TABLE . "` ORDER BY logkey DESC LIMIT 0,10000";
		}


		$result = $db->query($sql);

		if($data = $result->fetchAll()) {
			$getDblog->results = $data;
			$getDblog->resultsCount = count($data);
			self::setMsg("Fetched devlog results.");
			$getDblog->success = true;
		} else {
			self::setError("Unable to fetch from devlog.");
			$getDblog->resultsCount = count($data);
			$getDblog->success = false;
		}

		$getDblog->messages = self::getMsg();
		$getDblog->errors = self::getError();

		return $getDblog;
	}

	function showDblog($filter=null) {

		$dbLog = self::getDblog($filter);

		if(count($dbLog) > 0) {
			?>
			<style>
				table {
					border:1px solid #666666;
				}
				table tr td {
					font-family:Courier;
					padding-bottom:5px;
					border-bottom:1px solid #cccccc;
					font-size:.8em;
					vertical-align: top;
				}
				table tr td.process {
					font-style:italic;
					border-right:1px solid #cccccc;
					padding-right:10px;
					color:green;
				}
				table tr td.stamp {
					font-size:.8em;
					font-style:italic;
					border-right:1px solid #cccccc;
					padding-right:10px;
				}
			</style>
			<?php

			echo ("<table>\n");
			foreach($dbLog->results as $devlog) {
				echo "<tr>\n";
				//	echo "<td>" . $devlog["logkey"] . "</td>\n";
				echo "<td class='stamp'>" . date("m-d h:i:s",strtotime($devlog["stamp"])) . "</td>\n";
				echo "<td class='process'>" . $devlog["process"] . "</td>\n";
				echo "<td class='process'>" . $devlog["userIp"] . "</td>\n";
				echo "<td class='process'><a href='devlog.php?v=" . $devlog["visitorId"] . "'>" . $devlog["visitorId"] . "</a></td>\n";
				echo "<td class='process'>" . $devlog["serverId"] . "</td>\n";
				echo "<td>" . $devlog["log"] . "</td>\n";
				echo "<td class='process'><textarea>" . $devlog["json"] . "</textarea></td>\n";
				echo "</tr>\n";
			}
			echo "</table>";


		} else {
			echo "No log entries found!";
		}


	}

	function setDblog($inputStr, $processStr="Unknown", $json=null) {

		/*
		 * 
		 */

		$setDblog = new stdClass();
		$setDblog->errors = array();

		if(empty($inputStr)) {
			self::setError("dblog 'inputStr' must contain a string value.");
			$setDblog->success = false;
			return $dblog;
		}

		if(gettype($inputStr) !== "string") {
			self::setError("dblog 'inputStr' must be a string. Received " . gettype($inputStr) . ".");
			$inputStr = "Received " . gettype($inputStr) . ", 'inputStr' must have string.";
		}

		if(gettype($processStr) !== "string") {
			self::setError("dblog 'processStr' must be a string. Received " . gettype($processStr) . ".");
			$processStr = "Received " . gettype($processStr) . ", 'processStr' must have string.";
		}

		if(self::isJSON($json)) {
			$jsonInput = $json;
		} else {
			//Input is not JSON
			$jsonInput = "";
		}

		include_once("Db.php");
		$dbObj = new Db();
		$db = $dbObj->connect();

		$userIpStr = self::getIpAddress();
		$serverId = getenv("DESIGNATION");
		$visitorId = session_id();

		$sql = "INSERT INTO `" . self::DB_TABLE . "` SET process=:processStr, userIp=:userIpStr, log =:inputStr, serverId=:serverId, visitorId=:visitorId, json=:json";
		$insert = $db->prepare($sql);
		$insert->bindParam(':processStr', $processStr, PDO::PARAM_STR, 12);
		$insert->bindParam(':inputStr', $inputStr, PDO::PARAM_STR, 12);
		$insert->bindParam(':userIpStr', $userIpStr, PDO::PARAM_STR, 12);
		$insert->bindParam(':serverId', $serverId, PDO::PARAM_STR, 12);
		$insert->bindParam(':visitorId', $visitorId, PDO::PARAM_STR, 12);
		$insert->bindParam(':json', $jsonInput, PDO::PARAM_STR, 12);

		if($insert->execute()) {
			self::setMsg("Inserted into devlog: " . $inputStr);
			$setDblog->success = true;
		} else {
			self::setError("Unable to insert into devlog.");
			$setDblog->success = false;
		}

		$setDblog->errors = self::getError();
		$setDblog->messages = self::getMsg();
		return $setDblog;
	}

	function getIpAddress() {

		if (isset($_SERVER["REMOTE_ADDR"])) {
			$ipAddress = $_SERVER["REMOTE_ADDR"];

		} else if (isset($_SERVER["HTTP_X_FORWARDED_FOR"])) {
			$ipAddress = $_SERVER["HTTP_X_FORWARDED_FOR"];

		} else if (isset($_SERVER["HTTP_CLIENT_IP"])) {
			$ipAddress = $_SERVER["HTTP_CLIENT_IP"];

		} else {
			$ipAddress = '127.0.0.1';
		}

		return $ipAddress;
	}

	function getError() {
		return self::$applicationErrors;
	}

	function setError($errorString) {

		$eol = "<br />=====<br />";
		$bol = date("Y-m-d h:i:s") . $eol;

		if(self::$applicationErrors = $bol . $errorString . $eol) {
			return true;
		} else {
			return false;
		}

	}

	function getMsg() {
		return self::$applicationMessages;
	}

	function setMsg($msgString) {

		$eol = "<br />=====<br />";
		$bol = date("Y-m-d h:i:s") . $eol;

		if(self::$applicationMessages = $bol . $msgString . $eol) {
			return true;
		} else {
			return false;
		}
	}

	function isJSON($string){
		return is_string($string) && is_object(json_decode($string)) ? true : false;
	}




}//end of class
