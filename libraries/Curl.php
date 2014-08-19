<?php
/**
 * Curl utilities
 * 
 * 
 * @author Brian Gibbins
 * @copyright 2014
 */
class Curl {
	
	static $appMessagesAry = array();
	static $appErrorsAry = array();
	
	
	
	public function __construct() {
		
	}
	
	function doCurl($configObj) {
		
		$resultObj = new stdClass();
		
		//check configObj type without this set we can't curl
		//pretty much a fatal error so we return and exit right away
		if(!is_object($configObj)) {
			self::setError("'doCurl' params must be an object.");
			$resultObj->errors = self::getErrors();
			$resultObj->success = false;
			return $resultObj;
			exit;
		}
		
		//TODO test that the url is a string
		$curlUrl = $configObj->url;
		
		//TODO test that the fields are in an array
		//TODO allow the fields NOT to be set in the case of a post w/ querystring
		$curlFields = $configObj->fields;
				
		if(self::hasCurl() === true) {
			self::setMessage("Server allows 'curl'.");
			$curlSession = curl_init();

			curl_setopt($curlSession, CURLOPT_URL, $curlUrl);
			curl_setopt($curlSession, CURLOPT_HEADER, 1);
			curl_setopt($curlSession, CURLOPT_RETURNTRANSFER,1);
			curl_setopt($curlSession, CURLOPT_POST, 1);
			curl_setopt($curlSession, CURLOPT_SSL_VERIFYPEER, FALSE);
			curl_setopt($curlSession, CURLOPT_POSTFIELDS, $curlFields);
			
			if($execute = curl_exec($curlSession)) {
				self::setMessage("Successfully posted to " . $curlUrl . ".");
				$resultObj->success = true;
				$resultObj->results = $execute;
			} else {
				self::setError("Unable to execute 'curl' call to remote server.");
				$resultObj->success = false;
			}
			$curlResponseInfo = curl_getinfo($curlSession);
			
			$resultObj->httpCode = $curlResponseInfo["http_code"];

			curl_close($curlSession);

		} else {
			//curl not available on this server
			self::setError("Curl not available on this server");
			$resultObj->success = false;
			
		}
		
		$resultObj->dataSent = $curlFields;
		$resultObj->curlUrl = $curlUrl;
		$resultObj->errors = self::getErrors();
		$resultObj->messages = self::getMessages();
		
		return $resultObj;

	}
	
	//TODO check to be sure operating system supports curl
	function hasCurl() {
		return true;
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
