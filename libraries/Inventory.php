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

	const THRESHOLD = 5; //how many items must be instock for positive result

	static $databaseName;

	public function __construct() {

	}

	public function hasGlobalInventory($sku) {
		$hasGlobalInventory = self::hasStoreInventory($sku,0);
		return $hasGlobalInventory;
	}

	public function hasAllInventoryByPid($productId) {

		$hasAllStoreInventory = TRUE;
		$parts = self::loadLionParts($productId);
		foreach($parts as $part) {
			//todo make emp a variable or constant
			$hasInventory = self::hasStoreInventory($part["sku"],"all");
			if($hasInventory === false) {
				self::setError("Store does not have adequate inventory of " . $part["sku"] . ".");
				$hasAllStoreInventory = false;
			}
		}
		return $hasAllStoreInventory;
	}

	public function subtractAllInventoryByPid($productId, $quantity) {

		$subtractAllInventory = new stdClass();

		$parts = self::loadLionParts($productId);
		$success = true;
		foreach($parts as $part) {
			//todo make emp a variable or constant
			echo "<pre>";
			$extendedQuantity = $quantity * $part["qty"];

			$subtractInventory = self::subtractStoreInventory($part["sku"], $extendedQuantity, "all");

			if($subtractInventory->success === true) {
				self::setMessage("Subtracted " . $extendedQuantity . " @ " . $part["sku"] . " from store.");
			} else {
				self::setError("Unable to subtract " . $part["sku"] . " from store.");
				$success = false;
			}
		}

		$subtractAllInventory->success = $success;
		$subtractAllInventory->messages = self::getMessages();
		$subtractAllInventory->errors = self::getErrors();

		return $subtractAllInventory;
	}

	public function hasStoreInventory($sku,$storeId) {

		$hasStoreInventory = new stdClass();

		//checkId
		//todo check return and error
		if($storeId === 0) {
			$storekey = 0;
		} else {
			$storekey = self::getStorekeyByStoreId($storeId);
		}


		//checkSku
		$skukey = self::getSkukeyBySku($sku);
		//todo check return and error

		if(!$db = self::dbConnect()) {
			self::setError("Unable to connect to database");
			$hasStoreInventory->success = false;
			$hasStoreInventory->messages = self::getMessages();
			$hasStoreInventory->errors = self::getErrors();
			$hasStoreInventory->success = false;
		} else {

			$sql = "SELECT instock FROM `inventory` WHERE storekey=" . $storekey . " AND skukey=" . $skukey;

			$result = $db->query($sql);

			if($data = $result->fetchAll()) {
				self::setMessage("Fetched results.");

				if(count($data) > 1) {
					self::setError("More than one row was found with pId " . $productId);
					$hasStoreInventory->success = false;
					$hasStoreInventory->messages = self::getMessages();
					$hasStoreInventory->errors = self::getErrors();
					return $hasStoreInventory;
				}
				$inventory = $data[0];

				$instock = intval($inventory["instock"]);

				if($instock > self::THRESHOLD) {
					$hasStoreInventory->success = true;
					$hasStoreInventory->instock = $instock;
				} else {
					$hasStoreInventory->instock = $instock;
					$hasStoreInventory->success = false;
				}
			} else {
				self::setError("Unable to fetch from inventory.");
				$hasStoreInventory->success = false;
			}

			return $hasStoreInventory->success;

		}

	}

	public function subtractGlobalInventory($sku, $quantity) {
		$subtractGlobalInventory = self::subtractStoreInventory($sku, $quantity, 0);
		return $subtractGlobalInventory;
	}

	public function subtractStoreInventory($sku, $quantity, $storeId) {

		$subtractInventory = new stdClass();

		//checkId
		//todo check return and error
		if($storeId === 0) {
			$storekey = 0;
		} else {
			$storekey = self::getStorekeyByStoreId($storeId);
		}

		//checkSku
		$skukey = self::getSkukeyBySku($sku);

		$db = self::dbConnect();
		//todo error from this connection if it fails

		$subtractInventory = new stdClass();

		$sql = "UPDATE inventory SET instock=(instock -" . $quantity . ") WHERE storekey=" . $storekey . " AND skukey=" . $skukey;

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

	public function isLion($productId) {
		$lionParts = self::loadLionParts();
		if(array_key_exists($productId, $lionParts)) {
			return true;
		} else {
			return false;
		}
	}

	private function getSkukeyBySku($sku) {

		if(!$db = self::dbConnect()) {
			self::setError("Unable to connect to database");
			return false;
		} else {

			$sql = "SELECT skukey FROM `skus` WHERE sku='" . $sku . "' LIMIT 1";

			$result = $db->query($sql);

			if($data = $result->fetch(PDO::FETCH_ASSOC)) {
				self::setMessage("Fetched results.");

				if(count($data) > 1) {
					self::setError("More than one row was found with pId " . $productId);
					return false;
				}
				$skukey = intval($data["skukey"]);
				return $skukey;
			} else {
				self::setError("Unable to fetch from inventory.");
				return false;
			}
		}
	}

	private function getStorekeyByStoreId($storeId) {

		if(!$db = self::dbConnect()) {
			self::setError("Unable to connect to database");
			return false;
		} else {

			$sql = "SELECT storekey FROM `stores` WHERE storeId='" . $storeId . "' LIMIT 1";

			$result = $db->query($sql);

			if($data = $result->fetch(PDO::FETCH_ASSOC)) {
				self::setMessage("Fetched results.");

				if(count($data) > 1) {
					self::setError("More than one row was found with pId " . $productId);
					return false;
				}
				$storekey = intval($data["storekey"]);
				return $storekey;
			} else {
				self::setError("Unable to fetch from inventory.");
				return false;
			}
		}
	}

	public function loadLionParts($productId=null) {

		//PPG PLUS BONUSES
		$lionParts[162][] = array ("qty" => 1, "sku" => "LI-PANEL");
		$lionParts[162][] = array ("qty" => 1, "sku" => "LI-GUNIT");
		//PPG PLATINUM UPGRADE
		$lionParts[164][] = array ("qty" => 1, "sku" => "LI-EMPBAG");
		$lionParts[164][] = array ("qty" => 1, "sku" => "LI-PANEL");
		//Patriot Power Generator - Platinum Upgrade - PMT
		$lionParts[166][] = array ("qty" => 1, "sku" => "LI-EMPBAG");
		$lionParts[166][] = array ("qty" => 1, "sku" => "LI-PANEL");
		//Patriot Power Generator Plus Bonuses - PMT
		$lionParts[174][] = array ("qty" => 1, "sku" => "LI-PANEL");
		$lionParts[174][] = array ("qty" => 1, "sku" => "LI-GUNIT");
		//EMP Bag
		$lionParts[184][] = array ("qty" => 1, "sku" => "LI-EMPBAG");
		//EMP Blackout Platinum Package Upgrade
		$lionParts[186][] = array ("qty" => 1, "sku" => "LI-EMPBAG");
		$lionParts[186][] = array ("qty" => 2, "sku" => "LI-PANEL");
		$lionParts[186][] = array ("qty" => 1, "sku" => "LI-GUNIT");
		//EMP Blackout Platinum Package Upgrade PMT
		$lionParts[188][] = array ("qty" => 1, "sku" => "LI-EMPBAG");
		$lionParts[188][] = array ("qty" => 2, "sku" => "LI-PANEL");
		$lionParts[188][] = array ("qty" => 1, "sku" => "LI-GUNIT");

		if(intval($productId > 0)) {
			return $lionParts[$productId];
		} else {
			return $lionParts;
		}

	}


	/*
	 * all this function does is return a database object connected to the db server
	 * based on environment
	*/
	public function dbConnect() {
		include_once("Db.php");
		$dbObj = new Db();
		$db = $dbObj->connect();
		return $db;
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
