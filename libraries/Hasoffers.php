<?php
/**
 * Order Processing utilities
 * 
 * 
 * @author Brian Gibbins
 * @copyright 2014
 * @see http://en.wikipedia.org/wiki/PHPDoc
 */
class Hasoffers {
	
	static $appMessagesAry = array();
	static $appErrorsAry = array();
	
	public function __construct() {
		
	}
	
	function postSale($amount) {

		include_once("Analytics.php");
		$analyticsData = new Analytics();
		$transactionId = $analyticsData->clickId;


		//TODO decide which offerIds are applicable here
		switch($analyticsData->offerId) {
			case 37:
				$postUrl = "https://trk.rebootmarketing.com/SP6b";
				break;
			default:
				//TODO make this an error state
				break;
		}


		$postSale = new stdClass();

		//TODO error check that these values are the correct type

		$hoParams = array (
			"transaction_id" => $transactionId,
			"amount" => $amount,
		);

		$queryString = http_build_query($hoParams);

		//doCurl call
		$configObj = new stdClass();
		$configObj->url = $postUrl . "?" . $queryString;
		$configObj->fields = $hoParams;

		include_once("Curl.php");
		$curl = new Curl();

		$curlResults = $curl->doCurl($configObj);

		$resultsString = urldecode($curlResults->results);
		$postSale->serverResponse = $resultsString;
		$postSale->errors = $curlResults->errors;
		$postSale->messages = $curlResults->messages;
		$postSale->hasOffersUrl = $curlResults->curlUrl;

		if($curlResults->httpCode === 200) {
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
