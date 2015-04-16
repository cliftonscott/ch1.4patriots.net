<?php
/**
 * Order Processing utilities
 * 
 * 
 * @author Brian Gibbins
 * @copyright 2014
 * @see http://en.wikipedia.org/wiki/PHPDoc
 */
class Cpv {
	
	static $appMessagesAry = array();
	static $appErrorsAry = array();
	static $postBackUrl = null;

	const USERNAME = "";
	const PASSWORD = "";

	public function __construct() {

		include_once("Analytics.php");
		$analyticsObj = new Analytics();
		$cpvInstance = $analyticsObj->getCpvInstance();

		switch ($cpvInstance) {
			case "f4p":
				self::$postBackUrl = "https://track.food4patriots.com/adclick.php";
				break;
			default:
				self::$postBackUrl = "https://securetrack1.com/adclick.php";
		}
		
	}
	
	function postSale($subId, $revenue) {

		$postSale = new stdClass();

		if($revenue == 0) {
			self::setError("Revenue of $0 received. Did not post.");
			$postSale->success = false;
			$postSale->errors = self::getErrors();
			return $postSale;
		}

		$revenue = $revenue + $_SESSION["cpvRevenue"];
		$_SESSION["cpvRevenue"] = $revenue;
		
		$cpvParams = array (
			"subid" => $subId,
			"rev" => $revenue,
		);
		
		$queryString = http_build_query($cpvParams);
		
		//doCurl call
		$configObj = new stdClass();
		$configObj->url = self::$postBackUrl . "?" . $queryString;
		$configObj->fields = $cpvParams;
		
		include_once("Curl.php");
		$curl = new Curl();
		
		$postResults = $curl->doCurl($configObj);
		
		
		//CPV returns a single pixel which is not a return value
		//consequently, as long as we get a successful post
		//meaning that the connection is made and we receive an 
		//http_code of 200 we assume success
		//passing it back to the processing script because we
		//might need it
		$postSale->cpvUrl = $configObj->url;
		$postSale->cpvRevenue = $revenue;
		$postSale->httpCode = $postResults->httpCode;
		$postSale->dataSent = $postResults->dataSent;
		$postSale->errors = $postResults->errors;
		$postSale->messages = $postResults->messages;
		
		$resultsString = urldecode($postResults->results);
		$postSale->serverResponse = $resultsString;

		if($postResults->httpCode === 200) {
			$postSale->success = TRUE;
		} else {
			$postSale->success = FALSE;
		}
		$jsonLog = array (
			"resultsString" => $resultsString,
			"errors" => $postResults->errors,
			"messages" => $postResults->messages,
		);
		include_once("Dblog.php");
		$log = new Dblog();
		$log->setDblog($configObj->url ,"CPV Post Url:<br>" . $subId, json_encode($jsonLog));

		return $postSale;
		
	}

	function setRevenue($orderId) {
		//TODO 
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


$AFID = $_GET['AFID'];
$CID = $_GET['CID'];
$click_id = $_GET['click_id'];
$subid = $_GET['subid'];
$sspdata = $_GET['sspdata'];
$subid2 = $_GET['subid2'];
$offerid = $_GET['offer_id'];
$aff_sub2 = $_GET['aff_sub2'];
$email = $_GET['email'];
