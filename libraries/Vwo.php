<?php
/**
 * Order Processing utilities
 * 
 * 
 * @author Brian Gibbins
 * @copyright 2014
 * @see http://en.wikipedia.org/wiki/PHPDoc
 */

class Vwo {
	
	static $appMessagesAry = array();
	static $appErrorsAry = array();

	const ACCOUNTID = 827;
	const URL = "http://dev.visualwebsiteoptimizer.com/c.gif";
	
	public function __construct() {
		
	}
	
	function postSale($orderRevenue) {

		$postSale = new stdClass();

		//check that $orderRevenue is numeric
		if(!is_numeric($orderRevenue)) {
			self::setError("orderRevenue is not numeric.");
			$postSale->success = false;
			$postSale->errors = self::getErrors();
			return $postSale;
		}

		include_once("Analytics.php");
		$analyticsObj = new Analytics();

		$vwoParams = array (

			"experiment_id" => $analyticsObj->vwoTestId,
			"ACCOUNT_ID" => self::ACCOUNTID,
			"GOAL_ID" => $analyticsObj->vwoGoalId,
			"COMBINATION" => $analyticsObj->vwoVariationId,
			"r" => $orderRevenue,

		);

		$queryString = http_build_query($vwoParams);

		//doCurl call
		$configObj = new stdClass();
		$configObj->url = self::URL . "?" . $queryString;
		$configObj->fields = $vwoParams;
		
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
