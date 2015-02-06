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

	const ACCOUNTID = "827";
	const URL = "http://dev.visualwebsiteoptimizer.com/c.gif";
	
	public function __construct() {
		
	}
	
	function postSale($vwoRevenue) {

		// Initialize our sale as an empty class.
		$postSale = new stdClass();

		// Set post sale process as successful as default.
		// If any CURL request fails, we will make it as failed.
		$postSale->success = TRUE;

		// Initialize our Curl and Analytics services.
		// Will be used in each VWO experiment post.
		include_once("Curl.php");
		$curl = new Curl();
		include_once("Analytics.php");
		$analyticsObj = new Analytics();

		//check that $orderRevenue is numeric
		if(!is_numeric($vwoRevenue)) {
			file_put_contents('vwo_log.txt', 'orderRevenue is not numeric.', FILE_APPEND);
			self::setError("orderRevenue is not numeric.");
			$postSale->success = false;
			$postSale->errors = self::getErrors();
			return $postSale;
		}

		// Check that at least one experiment ID is provided.
		$experimentIds = $analyticsObj->vwoTestIds;
		if (!is_array($experimentIds) || count($experimentIds) == 0) {
			file_put_contents('vwo_log.txt', 'No experiment ID is provided.', FILE_APPEND);
			self::setError("No experiment ID is provided.");
			$postSale->success = false;
			$postSale->errors = self::getErrors();
			return $postSale;
		}

		// Post the sale to each VWO experiment.
		foreach ($experimentIds as $experimentId) {

			$vwoParams = array (
				"experiment_id" => $experimentId,
				"ACCOUNT_ID" => self::ACCOUNTID,
				"GOAL_ID" => $analyticsObj->vwoGoalId,
				"COMBINATION" => $analyticsObj->vwoVariationId,
				"r" => $vwoRevenue,
			);

			$queryString = http_build_query($vwoParams);

			//doCurl call
			$configObj = new stdClass();
			$configObj->url = self::URL . "?" . $queryString;
			$configObj->fields = $vwoParams;

			$curlResults = $curl->doCurl($configObj);

			file_put_contents('vwo_log.txt', 'New VWO post:' . "\r\n", FILE_APPEND);
			file_put_contents('vwo_log.txt', print_r($curlResults->dataSent, true) . "\r\n", FILE_APPEND);
			file_put_contents('vwo_log.txt', $curlResults->curlUrl . "\r\n", FILE_APPEND);
			file_put_contents('vwo_log.txt', $curlResults->success . "\r\n", FILE_APPEND);

			$resultsString = urldecode($curlResults->results);
			$postSale->serverResponse = $resultsString;
			$postSale->errors = $curlResults->errors;
			$postSale->messages = $curlResults->messages;
			$postSale->hasOffersUrl = $curlResults->curlUrl;

			// If any Curl request fails, this sale post is unsuccessful.
			if($curlResults->success === FALSE) {
				$postSale->success = FALSE;
			}
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
