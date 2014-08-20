<?php
/**
 * Product utilities
 * 
 * 
 * @author Brian Gibbins
 * @copyright 2014
 */
class Product {
	
	static $appMessagesAry = array();
	static $appErrorsAry = array();
	
	const VSL_VERSION = "VSL 1.0";
	
	public function __construct() {
		
	}
	
	function getProduct($productId) {
		
		$productObj = new stdClass();
		
		$productObj->offerLink = "/checkout/index.php";
		$productObj->exitLink = "/letter/index.php";
		$productObj->mobileLink = "/letter/index.php";
		$productObj->trialLink = null;
		
		//TODO ensure there is a variable here
		$productObj->productId = intval($productId);
		switch($productObj->productId) {
			
			case 19: //main product - 3 Month Kit
				$productObj->pmaSku = null;
				$productObj->price = 497;
				$productObj->originalPrice = 497;
				$productObj->shippingIdDomestic = 8;
				$productObj->shippingIdInternational = 6;
				$productObj->shippingCostDomestic = null;
				$productObj->shippingCostInternational = null;
				$productObj->mpsId = 19;
				$productObj->campaignId = 9;
				$productObj->netRevenueEach = 245;
				$productObj->taxable = TRUE;
				$productObj->listId = 35;
				$productObj->tags = "3MKIT";
				$productObj->googleProductName = "F4P-3MK";
				$productObj->googleProductSKU = "PID19";
				$productObj->googleProductCategory = "1-PAY-497";
				$productObj->metaTitle = "Food4Patriots 3 Month Food Supply";
				$productObj->metaDescription = "Food4Patriots 3 Month Food Supply";
				$productObj->defaultQuantity = 1;
				$productObj->isBonus = FALSE;
				$productObj->hasBonuses = FALSE; //set this to trigger any bonuses for this id
				$productObj->bonusIds = array (0); //set this as a single integer in an array (1) or a string of integers (123,456)
				$productObj->nextPage = "/checkout/oto/f4p-oto-1year.php";
				break;
			case 18: //additional product
				$productObj->pmaSku = null;
				$productObj->price = 197;
				$productObj->originalPrice = 197;
				$productObj->shippingIdDomestic = 8;
				$productObj->shippingIdInternational = 6;
				$productObj->shippingCostDomestic = null;
				$productObj->shippingCostInternational = null;
				$productObj->mpsId = 18;
				$productObj->campaignId = 9;
				$productObj->netRevenueEach = 110;
				$productObj->taxable = TRUE;
				$productObj->listId = 35;
				$productObj->tags = "4WKIT";
				$productObj->googleProductName = "F4P-4WK";
				$productObj->googleProductSKU = "PID18";
				$productObj->googleProductCategory = "1-PAY-197";
				$productObj->metaTitle = "Food4Patriots 4 Week Food Supply";
				$productObj->metaDescription = "Food4Patriots 4 Week Food Supply";
				$productObj->defaultQuantity = 1;
				$productObj->isBonus = FALSE;
				$productObj->hasBonuses = FALSE; //set this to trigger any bonuses for this id
				$productObj->bonusIds = array (0); //set this as a single integer in an array (1) or a string of integers (123,456)
				$productObj->nextPage = "/checkout/oto/f4p-oto-b.php";
				break;
			case 17: //additional product
				$productObj->pmaSku = null;
				$productObj->price = 27;
				$productObj->originalPrice = 27;
				$productObj->shippingIdDomestic = 14;
				$productObj->shippingIdInternational = 19;
				$productObj->shippingCostDomestic = null;
				$productObj->shippingCostInternational = null;
				$productObj->mpsId = 17;
				$productObj->campaignId = 9;
				$productObj->netRevenueEach = 17;
				$productObj->taxable = TRUE;
				$productObj->listId = 35;
				$productObj->tags = "72HKIT";
				$productObj->googleProductName = "F4P-72HRK";
				$productObj->googleProductSKU = "PID17";
				$productObj->googleProductCategory = "1-PAY-27";
				$productObj->metaTitle = "Food4Patriots 72 Hour Food Supply";
				$productObj->metaDescription = "Food4Patriots 72 Hour Food Supply";
				$productObj->defaultQuantity = 1;
				$productObj->isBonus = FALSE;
				$productObj->hasBonuses = FALSE; //set this to trigger any bonuses for this id
				$productObj->bonusIds = array (0); //set this as a single integer in an array (1) or a string of integers (123,456)
				$productObj->nextPage = "/checkout/oto/f4p-oto-a.php";
				break;
		}
		return $productObj;	
	}
	
	function setQuantity($quantity) {
		self::$variableQuantity = $quantity;
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
