<?php
/**
 * Utility classes used in php development for various tasks
 * 
 * 
 * @author Brian Gibbins
 * @copyright 2014
 * @see http://en.wikipedia.org/wiki/PHPDoc
 */
 
class Inventory {
	
	static $applicationMessages = array();
	static $applicationErrors = array();

	const THRESHHOLD = 5; //how many items must be instock for positive result
	
	const DB_TABLE = "ppg";
	 
	function hasInventory($productId) {

		if(!is_int($productId)) {
			//TODO return more info here
			return false;
		}

		$hasInventory = new stdClass();
	 	
	 	try {
			$db = new PDO('mysql:host=10.178.197.38;dbname=inventories', 'janus', '2RNJun5NhSpfr3ED');
			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch (PDOException $e) {
			echo "Error: " . $e->getMessage();
		    $hasInventory->success = false;
			self::setError("Unable to connect to db server via PDO.");
			return $hasInventory;
		}
	 	
		$sql = "SELECT instock FROM `" . self::DB_TABLE . "` WHERE pid=" . $productId;

		$result = $db->query($sql);
		
		if($data = $result->fetchAll()) {
			self::setMsg("Fetched results.");

			if(count($data) > 1) {
				self::setError("More than one row was found with pId " . $productId);
				$hasInventory->success = false;
				$hasInventory->messages = self::getMsg();
				$hasInventory->errors = self::getError();
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

		$hasInventory->messages = self::getMsg();
		$hasInventory->errors = self::getError();
	
	 	return $hasInventory;
	 }

	function subtractInventory($productId, $quantity=1) {
		if(!is_int($productId)) {
			//TODO return more info here
			return false;
		}

		$subtractInventory = new stdClass();

		try {
			$db = new PDO('mysql:host=10.178.197.38;dbname=inventories', 'janus', '2RNJun5NhSpfr3ED');
			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch (PDOException $e) {
			echo "Error: " . $e->getMessage();
			$subtractInventory->success = false;
			self::setError("Unable to connect to db server via PDO.");
			return $subtractInventory;
		}

		$sql = "UPDATE " . self::DB_TABLE . " SET instock=(instock -" . $quantity . ") WHERE pid=" . $productId;
		$result = $db->exec($sql);
		if($result === 1) {
			$subtractInventory->success = true;
		} else {
			$subtractInventory->success = false;
		}
		$subtractInventory->messages = self::getMsg();
		$subtractInventory->errors = self::getError();

		return $subtractInventory;
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




}//end of class
