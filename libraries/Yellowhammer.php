<?php
/**
 * Order Processing utilities
 * 
 * 
 * @author Brian Gibbins
 * @copyright 2014
 * @see http://en.wikipedia.org/wiki/PHPDoc
 */
class Patriots {
	
	static $appMessagesAry = array();
	static $appErrorsAry = array();
	
	//TODO secure this access w/ username/password
	const USERNAME = "";
	const PASSWORD = "";
	const URL = "https://secure.power4patriots.com/csr2/rebootmcdb.php";
	
	public function __construct() {
		
	}
	
	function postSale($saleDataObj, $customerDataObj) {
		
		$postSale = new stdClass();
		
		//TODO error check that these values are the correct type
		
		$insertFields = array (
		
		
			"date_of_sale" => date("Y-m-d"),
			"page_url" =>  $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"],			
			
			"order_id" => $saleDataObj->orderId,
			"product_id" => $saleDataObj->productId,
			"quantity" => $saleDataObj->quantity,
			
			"member_login" => null, //WHAT IS THIS?
			"customer_number" => $saleDataObj->customerId, //AND THIS?
			
			"bill_first" => $customerDataObj->firstName,
			"bill_last" => $customerDataObj->lastName,
			"bill_address1" => $customerDataObj->billingAddress1,
			"bill_address2" => $customerDataObj->billingAddress2,
			"bill_city" => $customerDataObj->billingCity,
			"bill_state" => $customerDataObj->billingState,
			"bill_zip" => $customerDataObj->billingZip,
			"bill_country" => $customerDataObj->billingCountry,
			"bill_phone" => $customerDataObj->phone,
			"bill_email" => $customerDataObj->email,
			
			"ship_first" => $customerDataObj->firstName,
			"ship_last" => $customerDataObj->lastName,
			"ship_address1" => $customerDataObj->shippingAddress1,
			"ship_address2" => $customerDataObj->shippingAddress2,
			"ship_city" => $customerDataObj->shippingCity,
			"ship_state" => $customerDataObj->shippingState,
			"ship_zip" => $customerDataObj->shippingZip,
			"ship_country" => $customerDataObj->shippingCountry,
			"ship_phone" => $customerDataObj->phone,
		);
		
		//doCurl call
		$configObj = new stdClass();
		$configObj->url = self::URL;
		$configObj->fields = $insertFields;
		
		include_once("Curl.php");
		$curl = new Curl();
		
		$curlResults = $curl->doCurl($configObj);
		
		$resultsString = urldecode($curlResults->results);
		$postSale->serverResponse = $resultsString;
		$postSale->errors = $curlResults->errors;
		$postSale->messages = $curlResults->messages;
		$postSale->hasOffersUrl = $curlResults->curlUrl;


		if($curlResults->success === TRUE) {
			$postSale->success = TRUE;
		} else {
			$postSale->success = FALSE;
		}
		
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
