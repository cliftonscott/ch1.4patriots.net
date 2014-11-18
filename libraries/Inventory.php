<?php
/**
 * Plat4orm Class providing inventory utility classes
 * see wiki documentation https://wiki4patriots.atlassian.net/wiki/display/DEV/Platform4Patriots
 * 
 * 
 * @author Brian Gibbins
 * @copyright 2014 4Patriots, LLC
 */
 
class Inventory {
	
	static $appMessagesAry = array();
	static $appErrorsAry = array();

	const THRESHHOLD = 1000; //how many items must be instock for positive result
	
	static $databaseName;

	public function __construct() {

	}
	 
	public function hasInventory($productId) {

		include_once("Db.php");
		$dbObj = new Db();
		$db = $dbObj->connect();
		//todo error from this connection if it fails

		if(!is_int($productId)) {
			//TODO return more info here
			return false;
		}

		$hasInventory = new stdClass();

		$sql = "SELECT instock FROM `inventory` WHERE pid=" . $productId;

		$result = $db->query($sql);
		
		if($data = $result->fetchAll()) {
			self::setMessage("Fetched results.");

			if(count($data) > 1) {
				self::setError("More than one row was found with pId " . $productId);
				$hasInventory->success = false;
				$hasInventory->messages = self::getMessages();
				$hasInventory->errors = self::getErrors();
				return $hasInventory;
			}
			$inventory = $data[0];

			$instock = intval($inventory["instock"]);

			if($instock > self::THRESHHOLD) {
				$hasInventory->success = true;
				$hasInventory->instock = $instock;
			} else {
				$hasInventory->instock = $instock;
				$hasInventory->success = false;
			}
		} else {
			self::setError("Unable to fetch from inventory.");
			$hasInventory->success = false;
		}

		$hasInventory->messages = self::getMessages();
		$hasInventory->errors = self::getErrors();


	 	return $hasInventory;
	 }

	function subtractInventory($productId, $quantity=1) {

		include_once("Db.php");
		$dbObj = new Db();
		$db = $dbObj->connect();
		//todo error from this connection if it fails

		if(!is_int($productId)) {
			//TODO return more info here
			return false;
		}

		$subtractInventory = new stdClass();

		$sql = "UPDATE inventory SET instock=(instock -" . $quantity . ") WHERE pid=" . $productId;
		$result = $db->exec($sql);
		if($result === 1) {
			$subtractInventory->success = true;
		} else {
			$subtractInventory->success = false;
		}
		$subtractInventory->messages = self::getMessages();
		$subtractInventory->errors = self::getErrors();

		return $subtractInventory;
	}


//ERROR AND MESSAGE HANDLING
	function setMessage($msg) {
		$message = array("timestamp" => microtime(), "message" => $msg);
		self::$appMessagesAry[] = $message;
	}
	function getMessages() {
		return self::$appMessagesAry;
	}
	function setError($err) {
		$error = array("timestamp" => microtime(), "error" => $err);
		self::$appErrorsAry[] = $error;
	}
	function getErrors() {
		return self::$appErrorsAry;
	}

}//end of class
