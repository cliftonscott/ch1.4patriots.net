<?php
/**
 * Product utilities
 * 
 * 
 * @author Brian Gibbins
 * @copyright 2014
 */
class Sale {
	
	static $appMessagesAry = array();
	static $appErrorsAry = array();
	
	static $saleDate = null;
	static $timerStart = null;
	
	static $productId = 0;
	static $orderId = 0;
	static $customerId = 0;
	static $quantity = 0;
	static $limelight = FALSE;
	static $mps = FALSE;
	static $cpv = FALSE;
	static $ffh = FALSE;
	static $hasOffers = FALSE;
	static $yellowHammer = FALSE;
	static $autoResponder = FALSE;
	static $patriots = FALSE;
	static $vwo = FALSE;
	
	public function __construct() {
		
		self::$saleDate = date("Y-m-d");
		self::$timerStart = microtime();
		
	}

	function setProductId($productId) {
		self::$productId = $productId;
	}
	function setOrderId($orderId) {
		self::$orderId = $orderId;
	}
	function setCustomerId($customerId) {
		self::$customerId = $customerId;
	}
	function setQuantity($quantity) {
		self::$quantity = $quantity;
	}
	function setLimelight($limelight) {
		self::$limelight = $limelight;
	}
	function setMps($mps) {
		self::$mps = $mps;
	}
	function setCpv($cpv) {
		self::$cpv = $cpv;
	}
	function setFfh($ffh) {
		self::$ffh = $ffh;
	}
	function setHasOffers($hasOffers) {
		self::$hasOffers = $hasOffers;
	}
	function setYellowhammer($yellowHammer) {
		self::$yellowHammer = $yellowHammer;
	}
	function setAutoResponder($autoResponder) {
		self::$autoResponder = $autoResponder;
	}
	function setPatriots($patriots) {
		self::$patriots = $patriots;
	}
	function setVwo($vwo) {
		self::$vwo = $vwo;
	}

	
	function getSale() {
		//returns all of the sale information set earlier
		
		$saleData = new stdClass();
		
		$saleData->saleDate = self::$saleDate;
		$saleData->timerStart = self::$timerStart;
		$saleData->productId = self::$productId;
		$saleData->quantity = self::$quantity;
		$saleData->limelight = self::$limelight;
		$saleData->orderId = self::$orderId;
		$saleData->customerId = self::$customerId;
		$saleData->mps = self::$mps;
		$saleData->cpv = self::$cpv;
		$saleData->ffh = self::$ffh;
		$saleData->hasOffers = self::$hasOffers;
		$saleData->autoResponder = self::$autoResponder;
		$saleData->patriots = self::$patriots;
		$saleData->vwo = self::$vwo;
		
		return $saleData;
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
