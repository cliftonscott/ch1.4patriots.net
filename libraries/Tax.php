<?php
/**
 * Order Processing utilities
 * 
 * 
 * @author Brian Gibbins
 * @copyright 2014
 * @see http://en.wikipedia.org/wiki/PHPDoc
 */
class Tax {
	
	static $appMessagesAry = array();
	static $appErrorsAry = array();
	
	public function __construct() {
		
	}
	
	function getTaxByStateAbbreviation($stateAbbreviation) {
		
		$stateTaxTable = self::getStateTaxRates();
		
		if(array_key_exists($stateAbbreviation, $stateTaxTable)) {
			$tax = $stateTaxTable[$stateAbbreviation];
		} else {
			$tax = FALSE;
		}
		
		return $tax;
	}
	
	function getStateTaxRates() {
		
		$stateTaxTable = array(
			"TN" => .0925,
			"AZ" => .0810,
		);
		
		return $stateTaxTable;
				
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
