<?php
/**
 * Order Processing utilities
 * 
 * 
 * @author Brian Gibbins
 * @copyright 2014
 * @see http://en.wikipedia.org/wiki/PHPDoc
 */
class Autoresponder {
	
	static $appMessagesAry = array();
	static $appErrorsAry = array();
	
	const USERNAME = "";
	const PASSWORD = "";
	const URL = "https://secure.power4patriots.com/oap/index.php";
	
	
	public function __construct() {
		
	}
	
	function postSale($productDataObj, $customerDataObj) {
		
		//TODO error check that these values are the correct type

		$postSale = new stdClass();
		
//		var_dump($customerDataObj);

			  		
		$autoResponderParams = array (
			"first_name" => $customerDataObj->firstName,
			"last_name" => $customerDataObj->lastName,
			"email" => $customerDataObj->email,
			"address" => $customerDataObj->billingAddress1,
			"city" => $customerDataObj->billingCity,
			"state" => $customerDataObj->billingState,
			"zip" => $customerDataObj->billingZip,
			"country" => $customerDataObj->billingCountry,
			"home_phone" => $customerDataObj->phone,
			"tags" => $productDataObj->tags,
			"sequences" => $productDataObj->listId,
		);
		
		$queryString = http_build_query($autoResponderParams);
		
		//doCurl call
		$configObj = new stdClass();
		$configObj->url = self::URL . "?" . $queryString;
		$configObj->fields = $mpsParams;
		
		include_once("Curl.php");
		$curl = new Curl();
		
		$curlResults = $curl->doCurl($configObj);
		
		$resultsString = urldecode($curlResults->results);
		$postSale->serverResponse = $resultsString;
		$postSale->errors = $curlResults->errors;
		$postSale->messages = $curlResults->messages;
		$postSale->autoResponderUrl = $curlResults->curlUrl;

		if($curlResults->httpCode === 200) {
			$postSale->success = TRUE;
		} else {
			$postSale->success = FALSE;
		}

//		if($postResults->success === TRUE) {
//			$postSale->success = TRUE;
//		} else {
//			$postSale->success = FALSE;
//		}
		
		return $postSale;
		
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
