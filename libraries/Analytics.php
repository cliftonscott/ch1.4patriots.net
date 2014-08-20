<?php
/**
 * Analytics Processing utilities
 * 
 * 
 * @author Brian Gibbins
 * @copyright 2014
 * @see http://en.wikipedia.org/wiki/PHPDoc
 * 
 */
class Analytics {
	
	static $appMessagesAry = array();
	static $appErrorsAry = array();

	//CHANGE THESE VALUES BASED ON SITE
	const PROD_GA_ACCT = "UA-31877487-4";
	const PROD_GA_DOMAIN = "food4patriots.com";

	//LEAVE THESE DEV VALUES AS IS
	const DEV_GA_ACCT = "UA-31877487-9";
	const DEV_GA_DOMAIN = "dev.4patriots.net";

	static $subId = null;
	static $subId2 = null;
	static $clickId = null; //has offers unique visitor tracking number
	static $offerId = null; //has offers offerId / campaignId
	static $affiliateId = null; //has offers affiliateId
	static $affSub2 = null; //CPV unique visitor tracking number
	static $googleAccount = null;
	static $googleDomain = null;
	static $serverId = null;
	
	
	public function __construct() {
		
		$this->initializeValues();
		
		$this->subId = self::$subId;
		$this->subId2 = self::$subId2;
		$this->clickId = self::$clickId;
		$this->affiliateId = self::$affiliateId;
		$this->offerId = self::$offerId;
		$this->affSub2 = self::$affSub2;
		$this->googleAccount = self::$googleAccount;
		$this->googleDomain = self::$googleDomain;
		$this->serverId = self::$serverId;
		
		return $this;
		
	}
	

	function initializeValues() {

		$serverId = getenv("DESIGNATION");
		self::$serverId = $serverId;

		if($serverId !== "RB03") {
			self::$googleAccount = self::PROD_GA_ACCT;
			self::$googleDomain = self::PROD_GA_DOMAIN;
		} else {
			self::$googleAccount = self::DEV_GA_ACCT;
			self::$googleDomain = self::DEV_GA_DOMAIN;
		}
		
		if(!empty($_GET["subid"])) {
			$this->setSubId(trim($_GET["subid"]));
		} elseif (!empty($_SESSION["subId"])) {
			$this->setSubId($_SESSION["subId"]);
		} else {
			$this->setSubId(null);
		}
		
		if(!empty($_GET["subid2"])) {
			$this->setSubId2(trim($_GET["subid2"]));
		} elseif (!empty($_SESSION["subId2"])) {
			$this->setSubId2($_SESSION["subId2"]);
		} else {
			$this->setSubId2(null);
		}
		
		if(!empty($_GET["click_id"])) { //hasoffers unique visitor tracking id
			$this->setClickId(trim($_GET["click_id"]));
		} elseif (!empty($_SESSION["clickId"])) {
			$this->setClickId($_SESSION["clickId"]);
		} else {
			$this->setClickId(null);
		}
		
		if(!empty($_GET["AFID"])) { //hasoffers unique affiliate tracking id
			$this->setAffiliateId(trim($_GET["AFID"]));
		} elseif (!empty($_SESSION["affiliateId"])) {
			$this->setAffiliateId($_SESSION["affiliateId"]);
		} else {
			$this->setAffiliateId(null);
		}
		
		if(!empty($_GET["CID"])) { //hasoffers unique campaign tracking id
			$this->setOfferId(trim($_GET["CID"]));
		} elseif (!empty($_SESSION["offerId"])) {
			$this->setOfferId($_SESSION["offerId"]);
		} else {
			$this->setOfferId(null);
		}
		
		if(!empty($_GET["aff_sub2"])) {
			$this->setAffSub2(trim($_GET["aff_sub2"]));
		} elseif (!empty($_SESSION["affSub2"])) {
			$this->setAffSub2($_SESSION["affSub2"]);
		} else {
			$this->setAffSub2(null);
		}
		
	}

	function setSubId($subId) {
		self::$subId = $subId;
		$_SESSION["subId"] = $subId;
	}
	function setSubId2($subId2) {
		self::$subId2 = $subId2;
		$_SESSION["subId2"] = $subId2;
	}
	function setClickId($click_id) {
		self::$clickId = $click_id;
		$_SESSION["clickId"] = $click_id;
	}
	function setAffiliateId($affiliateId) {
		self::$affiliateId = $affiliateId;
		$_SESSION["affiliateId"] = $affiliateId;
	}
	function setOfferId($offerId) {
		$offerId = intval($offerId);
		self::$offerId = $offerId;
		$_SESSION["offerId"] = $offerId;
	}
	function setAffSub2($affSub2) {
		self::$affSub2 = $affSub2;
		$_SESSION["affSub2"] = $affSub2;
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
