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

	const HO_BASE_URL = "https://trk.rebootmarketing.com/";
	
	public function __construct() {
		
	}
	
	function postSale($productId, $offerId, $transactionId, $amount) {

		$postSale = new stdClass();

		/*
		 * $hoArray defines the productId and offerId relationship
		 * and is used to determine the final postback url for HO
		 *
		 */
		$hoArray[17] = array ( //productId
			28 => "GP3A",
			30 => "SP2w",
			0 => "GP1Y" //default
		);
		$hoArray[18] = array ( //productId
			28 => "GP3G",
			30 => "SP2w",
			0 => "GP1e" //default
		);
		$hoArray[19] = array ( //productId
			28 => "GP3M",
			30 => "SP2w",
			0 => "GP1k" //default
		);

		//21 is missing from process file

		$hoArray[22] = array (
			28 => "GP3S",
			30 => "SP2w",
			0 => "GP1q" //default
		);
		$hoArray[23] = array (
			28 => "GP3Y",
			30 => "SP2w",
			0 => "GP1w" //default
		);
		$hoArray[27] = array (
			30 => "SP2w",
			0 => "GP1Y" //default
		);
		$hoArray[40] = array (
			28 => "GP34",
			30 => "SP2w",
			0 => "GP2E" //default
		);
		$hoArray[120] = array (
			28 => "GP34",
			30 => "SP2w",
			0 => "GP2E" //default
		);
		$hoArray[128] = array (
			28 => "GP6L",
			30 => "SP2w",
			0 => "GP6R" //default
		);







		if($postBack = $hoArray[$productId][$offerId]) {
			$postUrl = self::HO_BASE_URL . $postBack;
		} elseif($postBack = $hoArray[$productId][0]) {
			$postUrl = self::HO_BASE_URL . $postBack;
		} else {
			self::setError("productId not found in the hoArray");
			//exit and return to calling script
			$postSale->success = false;
			$postSale->messages = self::getMessages();
			$postSale->errors = self::getErrors();
			return $postSale;
		}

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
