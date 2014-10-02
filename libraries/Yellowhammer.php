<?php
/**
 * Order Processing utilities
 * 
 * 
 * @author Brian Gibbins
 * @copyright 2014
 * @see http://en.wikipedia.org/wiki/PHPDoc
 */

class Yellowhammer {
	
	static $appMessagesAry = array();
	static $appErrorsAry = array();
	
	const USERNAME = "";
	const PASSWORD = "";
	const URL = "https://jump.omnitarget.com/tr1ec0dd";
	
	public function __construct() {
		
	}
	
	function postSale($saleDataObj, $orderRevenue) {

		$postSale = new stdClass();

		//check that sspData is present

		//check that subId2 is present

		//check that $orderRevenue is numeric
		if(!is_numeric($orderRevenue)) {
			self::setError("orderRevenue is not numeric.");
			$postSale->success = false;
			$postSale->errors = self::getErrors();
			return $postSale;
		}

		include_once("Analytics.php");
		$analyticsObj = new Analytics();

		$yellowParams = array (

			"sspdata" => $analyticsObj->sspData,
			"customer_id" => $saleDataObj->customerId,
			"order_revenue" => $orderRevenue,
			"order_id" => $saleDataObj->orderId,
			"order_date" => date("d-m-Y"),
			"subid2" => $analyticsObj->sspData,

		);

		$queryString = http_build_query($yellowParams);

		//doCurl call
		$configObj = new stdClass();
		$configObj->url = self::URL . "?" . $queryString;
		$configObj->fields = $yellowParams;
		
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
