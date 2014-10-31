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
	const PROD_GA_AFFILIATION = "F4P";

	//LEAVE THESE DEV VALUES AS IS
	const DEV_GA_ACCT = "UA-31877487-9";
	const DEV_GA_DOMAIN = "dev.4patriots.net";
	const DEV_GA_AFFILIATION = "DEV";

	static $subId = null;
	static $subId2 = null;
	static $clickId = null; //has offers unique visitor tracking number
	static $offerId = null; //has offers offerId / campaignId
	static $affiliateId = null; //has offers affiliateId
	static $affSub2 = null; //CPV unique visitor tracking number
	static $googleAccount = null;
	static $googleDomain = null;
	static $googleAffiliation = null;
	static $serverId = null;
	static $sspData = null;
	static $source = null;
	static $custom = null;
	static $queryString = null;
	static $vwoTestId = null;
	static $vwoGoalId = null;
	static $vwoVariationId = null;

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
		$this->googleAffiliation = self::$googleAffiliation;
		$this->serverId = self::$serverId;
		$this->sspData = self::$sspData;
		$this->source = self::$source;
		$this->custom = self::$custom;
		$this->queryString = self::$queryString;
		$this->vwoTestId = self::$vwoTestId;
		$this->vwoGoalId = self::$vwoGoalId;
		$this->vwoVariationId = self::$vwoVariationId;

		return $this;
		
	}

	function initializeValues() {

		$serverId = getenv("DESIGNATION");
		self::$serverId = $serverId;

		if($serverId !== "RB03") {
			self::$googleAccount = self::PROD_GA_ACCT;
			self::$googleDomain = self::PROD_GA_DOMAIN;
			self::$googleAffiliation = self::PROD_GA_AFFILIATION;
		} else {
			self::$googleAccount = self::DEV_GA_ACCT;
			self::$googleDomain = self::DEV_GA_DOMAIN;
			self::$googleAffiliation = self::DEV_GA_AFFILIATION;
		}

		$subId = trim($_GET["subid"]);
		if(!empty($subId)) {
			$this->setSubId($subId);
		} elseif (!empty($_SESSION["subId"])) {
			$this->setSubId($_SESSION["subId"]);
		} else {
			$this->setSubId(null);
		}

		$subId2 = trim($_GET["subid2"]);
		if(!empty($subId2)) {
			$this->setSubId2($subId2);
		} elseif (!empty($_SESSION["subId2"])) {
			$this->setSubId2($_SESSION["subId2"]);
		} else {
			$this->setSubId2(null);
		}

		$clickId = trim($_GET["click_id"]);
		if(!empty($clickId)) { //hasoffers unique visitor tracking id
			$this->setClickId($clickId);
		} elseif (!empty($_SESSION["clickId"])) {
			$this->setClickId($_SESSION["clickId"]);
		} else {
			$this->setClickId(null);
		}

		$affiliateId = trim($_GET["AFID"]);
		if(!empty($affiliateId)) { //hasoffers unique affiliate tracking id
			$this->setAffiliateId($affiliateId);
		} elseif (!empty($_SESSION["affiliateId"])) {
			$this->setAffiliateId($_SESSION["affiliateId"]);
		} else {
			$this->setAffiliateId(null);
		}

		$offerId = trim($_GET["CID"]);
		if(!empty($offerId)) { //hasoffers unique campaign tracking id
			$this->setOfferId($offerId);
		} elseif (!empty($_SESSION["offerId"])) {
			$this->setOfferId($_SESSION["offerId"]);
		} else {
			$this->setOfferId(null);
		}

		$affSub2 = trim($_GET["aff_sub2"]);
		if(!empty($affSub2)) {
			$this->setAffSub2($affSub2);
		} elseif (!empty($_SESSION["affSub2"])) {
			$this->setAffSub2($_SESSION["affSub2"]);
		} else {
			$this->setAffSub2(null);
		}

		$sspData = trim($_GET["sspdata"]);
		if(!empty($sspData)) {
			$this->setSspData($sspData);
		} elseif (!empty($_SESSION["sspData"])) {
			$this->setSspData($_SESSION["sspData"]);
		} else {
			$this->setSspData(null);
		}

		$source = trim($_GET["source"]);
		if(!empty($source)) {
			$this->setSource($source);
		} elseif (!empty($_SESSION["source"])) {
			$this->setSource($_SESSION["source"]);
		} else {
			$this->setSource(null);
		}

		$custom = trim($_GET["custom"]);
		if(!empty($custom)) {
			$this->setCustom($custom);
		} elseif (!empty($_SESSION["custom"])) {
			$this->setCustom($_SESSION["custom"]);
		} else {
			$this->setCustom(null);
		}

		$vwoTestId = trim($_GET["experiment_id"]);
		if(!empty($vwoTestId)) {
			$this->setVwoTestId($vwoTestId);
		} elseif (!empty($_SESSION["vwoTestId"])) {
			$this->setVwoTestId($_SESSION["vwoTestId"]);
		} else {
			$this->setVwoTestId(null);
		}

		$vwoGoalId = trim($_GET["GOAL_ID"]);
		if(!empty($vwoGoalId)) {
			$this->setVwoGoalId($vwoGoalId);
		} elseif (!empty($_SESSION["vwoGoalId"])) {
			$this->setVwoGoalId($_SESSION["vwoGoalId"]);
		} else {
			$this->setVwoGoalId(null);
		}

		$vwoVariationId = trim($_GET["COMBINATION"]);
		if(!empty($vwoVariationId)) {
			$this->setVwoVariationId($vwoVariationId);
		} elseif (!empty($_SESSION["vwoVariationId"])) {
			$this->setVwoVariationId($_SESSION["vwoVariationId"]);
		} else {
			$this->setVwoVariationId(null);
		}

		//create a querystring of analytics vars to append to checkout url
		if(!empty(self::$affiliateId)){
			$qs["AFID"] = self::$affiliateId;
		}
		if(!empty(self::$subId)){
			$qs["subid"] = self::$subId;
		}
		if(!empty(self::$clickId)){
			$qs["click_id"] = self::$clickId;
		}
		if(!empty(self::$subId2)){
			$qs["subid2"] = self::$subId2;
		}
		if(!empty(self::$offerId)){
			$qs["CID"] = self::$offerId;
		}
		if(!empty(self::$affSub2)){
			$qs["aff_sub2"] = self::$affSub2;
		}
		if(!empty(self::$sspData)){
			$qs["sspdata"] = self::$sspData;
		}
		$qs = http_build_query($qs);
		$this->setQueryString($qs);

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
	function setSspData($sspData) {
		self::$sspData = $sspData;
		$_SESSION["sspData"] = $sspData;
	}
	function setSource($source) {
		self::$source = $source;
		$_SESSION["source"] = $source;
	}
	function setCustom($custom) {
		self::$custom = $custom;
		$_SESSION["custom"] = $custom;
	}
	function setQueryString($queryString) {
		self::$queryString = "?" . $queryString;
		//$_SESSION["queryString"] = $queryString;
	}
	function setVwoTestId($vwoTestId) {
		self::$vwoTestId = $vwoTestId;
		$_SESSION["vwoTestId"] = $vwoTestId;
	}
	function setVwoGoalId($vwoGoalId) {
		self::$vwoGoalId = $vwoGoalId;
		$_SESSION["vwoGoalId"] = $vwoGoalId;
	}
	function setVwoVariationId($vwoVariationId) {
		self::$vwoVariationId = $vwoVariationId;
		$_SESSION["vwoVariationId"] = $vwoVariationId;
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
