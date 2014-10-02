<?php
/**
 * Order Processing utilities
 * 
 * 
 * @author Brian Gibbins
 * @copyright 2014
 * @see http://en.wikipedia.org/wiki/PHPDoc
 */
class Mps {
	
	static $appMessagesAry = array();
	static $appErrorsAry = array();
	
	static $orderId = null;
	static $customerId = null;
	
	const USERNAME = "";
	const PASSWORD = "";
	const URL = "https://drop.mypatriotsupply.com/scripts/limelightin.php";
	
	public function __construct() {
		
	}
	
	function postSale($saleDataObj, $productDataObj, $customerDataObj) {

		$postSale = new stdClass();
		
		//TODO error check that these values are objects
		
		//TODO make sure orderId and CustomerId are set before processing
		
		$mpsParams = array (
			"orderId" => self::$orderId,
			"customerId" => self::$customerId,
			"firstName" => $customerDataObj->firstName,
			"lastName" => $customerDataObj->lastName,
			"email" => $customerDataObj->email,
			"phone" => $customerDataObj->phone,
			"shippingAddress1" => $customerDataObj->shippingAddress1,
			"shippingCity" => $customerDataObj->shippingCity,
			"shippingState" => $customerDataObj->shippingState,
			"shippingCountry" => $customerDataObj->shippingCountry,
			"shippingZip" => $customerDataObj->shippingZip,
			"productId" => $productDataObj->mpsId,
			"quantity" => $saleDataObj->quantity,
			"shippingId" => $productDataObj->shippingId,
		);
		
		$queryString = http_build_query($mpsParams);

		//doCurl call
		$configObj = new stdClass();
		$configObj->url = self::URL . "?" . $queryString;
		$configObj->fields = $mpsParams;
		
		include_once("Curl.php");
		$curl = new Curl();
		
		$postResults = $curl->doCurl($configObj);
		
		//TODO work w/ MPS to sort out their return string as it is sending errors about logs on their system
		
		$resultsString = urldecode($postResults->results);
		$postSale->serverResponse = $resultsString;

		if($postResults->success === TRUE) {
			$postSale->success = TRUE;
		} else {
			$postSale->success = FALSE;
		}
		
		return $postSale;
		
	}

	function setOrderId($orderId) {
		self::$orderId = $orderId;
	}
	
	function setCustomerId($customerId) {
		self::$customerId = $customerId;
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
