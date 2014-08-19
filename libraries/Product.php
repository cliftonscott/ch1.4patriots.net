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
			
			case 162: //main product - Patriot Power Generator
				$productObj->pmaSku = null;
				$productObj->price = 1997;
				$productObj->originalPrice = 1997;
				$productObj->shippingIdDomestic = 26;
				$productObj->shippingIdInternational = null; //no international sales
				$productObj->shippingCostDomestic = 0;
				$productObj->shippingCostInternational = 0; //no international sales
				$productObj->mpsId = null; //used for MPS
				$productObj->campaignId = 16;
				$productObj->netRevenueEach = 615;
				$productObj->taxable = TRUE;
				$productObj->listId = 55;
				$productObj->tags = "ppg1500";
				$productObj->googleProductName = "Patriot Power Generator 1500" . self::VSL_VERSION;
				$productObj->metaTitle = "Patriot Power Generator 1500";
				$productObj->metaDescription = "Patriot Power Generator 1500 - Plus Bonuses";
				$productObj->defaultQuantity = 1;
				$productObj->hasBonuses = TRUE; //set this to trigger any bonuses for this id
				$productObj->bonusIds = array (170); //set this as a single integer in an array (1) or a string of integers (123,456)
				$productObj->nextPage = "/checkout/oto/ppg-platinum.php";
				break;
			case 170: //PPG Bonuses
				$productObj->pmaSku = null;
				$productObj->price = 0;
				$productObj->originalPrice = 0;
				$productObj->shippingIdDomestic = 7;
				$productObj->shippingIdInternational = null; //no international sales
				$productObj->shippingCostDomestic = 0;
				$productObj->shippingCostInternational = 0; //no international sales
				$productObj->mpsId = null; //used for MPS
				$productObj->campaignId = 18;
				$productObj->netRevenueEach = 0;
				$productObj->taxable = TRUE;
				$productObj->listId = null;
				$productObj->tags = null;
				$productObj->googleProductName = "PPG Bonuses " . self::VSL_VERSION;
				$productObj->metaTitle = "Patriot Power Generator 1500 - Bonuses";
				$productObj->metaDescription = "Patriot Power Generator 1500 - Bonuses";
				$productObj->defaultQuantity = 1;
				$productObj->isBonus = TRUE;
				$productObj->nextPage = null; //bonuses don't use a next page
				break;
			case 164: //Patriot Power Generator Deluxe Upgrade
				$productObj->pmaSku = null;
				$productObj->price = 997;
				$productObj->originalPrice = 997;
				$productObj->shippingIdDomestic = 26;
				$productObj->shippingIdInternational = null; //no international sales
				$productObj->shippingCostDomestic = 0;
				$productObj->shippingCostInternational = 0; //no international sales
				$productObj->mpsId = null; //used for MPS
				$productObj->campaignId = 16;
				$productObj->netRevenueEach = 546;
				$productObj->taxable = TRUE;
				$productObj->listId = 56;
				$productObj->tags = "ppgDeluxe";
				$productObj->googleProductName = "PPG Platinum Upgrade " . self::VSL_VERSION;
				$productObj->metaTitle = "PPG Platinum Upgrade";
				$productObj->metaDescription = "Patriot Power Generator Platinum Upgrade";
				$productObj->defaultQuantity = 1;
				$productObj->nextPage = "/checkout/oto/ppg-1year.php";
				break;
			case 166: //PPG Deluxe Upgrade - 2 Easy Payment Plan
				$productObj->pmaSku = null;
				$productObj->price = 497;
				$productObj->originalPrice = 497;
				$productObj->shippingIdDomestic = 26;
				$productObj->shippingIdInternational = null; //no international sales
				$productObj->shippingCostDomestic = 0;
				$productObj->shippingCostInternational = 0; //no international sales
				$productObj->mpsId = null; //used for MPS
				$productObj->campaignId = 16;
				$productObj->netRevenueEach = 448;
				$productObj->taxable = TRUE;
				$productObj->listId = 57;
				$productObj->tags = "ppgDeluxe2pay";
				$productObj->googleProductName = "PPG Platinum 2Pay " . self::VSL_VERSION;
				$productObj->metaTitle = "PPG Platinum Upgrade - 2 Easy Payment Plan";
				$productObj->metaDescription = "PPG Platinum Upgrade - 2 Easy Payment Plan";
				$productObj->defaultQuantity = 1;
				$productObj->nextPage = "/checkout/oto/ppg-1year.php";
				break;
			case 168: //PPG Deluxe Upgrade - 2nd Payment (NO SHIP)
				$productObj->pmaSku = null;
				$productObj->price = 497;
				$productObj->originalPrice = 497;
				$productObj->shippingIdDomestic = 26;
				$productObj->shippingIdInternational = null; //no international sales
				$productObj->shippingCostDomestic = 0;
				$productObj->shippingCostInternational = 0; //no international sales
				$productObj->mpsId = null; //used for MPS
				$productObj->campaignId = 16;
				$productObj->netRevenueEach = 0;
				$productObj->taxable = TRUE;
				$productObj->listId = null;
				$productObj->tags = null;
				$productObj->googleProductName = "PPG Platinum 2Pay2 " . self::VSL_VERSION;
				$productObj->metaTitle = "PPG Platinum Upgrade - 2nd Payment (NO SHIP)";
				$productObj->metaDescription = "PPG Platinum Upgrade - 2nd Payment (NO SHIP)";
				$productObj->defaultQuantity = 1;
				$productObj->nextPage = "/checkout/oto/ppg-platinum.php";
				break;
			case 40: //Food4Patriots 1 Year Food Kit
				$productObj->pmaSku = null;
				$productObj->price = 1997;
				$productObj->originalPrice = 1997;
				$productObj->shippingIdDomestic = 7;
				$productObj->shippingIdInternational = null; //no international sales
				$productObj->shippingCostDomestic = 0;
				$productObj->shippingCostInternational = 0; //no international sales
				$productObj->mpsId = null; //used for MPS
				$productObj->campaignId = 9;
				$productObj->netRevenueEach = 952;
				$productObj->taxable = TRUE;
				$productObj->listId = 58;
				$productObj->tags = "ppg1YrKit";
				$productObj->googleProductName = "F4P 1YR " . self::VSL_VERSION;
				$productObj->metaTitle = "Food4Patriots 1 Year Food Kit";
				$productObj->metaDescription = "Food4Patriots 1 Year Food Kit";
				$productObj->defaultQuantity = 1;
				$productObj->nextPage = "/checkout/thankyou.php";
				break;
			case 120: //Food4Patriots 1 Year Food Kit w/ payments
				$productObj->pmaSku = null;
				$productObj->price = 597;
				$productObj->originalPrice = 597;
				$productObj->shippingIdDomestic = 7;
				$productObj->shippingIdInternational = null; //no international sales
				$productObj->shippingCostDomestic = 0;
				$productObj->shippingCostInternational = 0; //no international sales
				$productObj->mpsId = null; //used for MPS
				$productObj->campaignId = 9;
				$productObj->netRevenueEach = 952;
				$productObj->taxable = TRUE;
				$productObj->listId = 60;
				$productObj->tags = "ppg1YrKitPmt";
				$productObj->googleProductName = "F4P 1YR Payments" . self::VSL_VERSION;
				$productObj->metaTitle = "Food4Patriots 1 Year Food Kit";
				$productObj->metaDescription = "Food4Patriots 1 Year Food Kit";
				$productObj->defaultQuantity = 1;
				$productObj->nextPage = "/checkout/thankyou.php";
				break;
			case 148: //Power4Patriots Platinum Hard Copy Book Version 2.0
				$productObj->pmaSku = "P4PHCBK";
				$productObj->price = 97;
				$productObj->originalPrice = 97;
				$productObj->shippingIdDomestic = 8;
				$productObj->shippingIdInternational = 6;
				$productObj->shippingCostDomestic = null;
				$productObj->shippingCostInternational = null;
				$productObj->mpsId = null; //used for MPS
				$productObj->campaignId = 1;
				$productObj->netRevenueEach = 84;
				$productObj->taxable = TRUE;
				$productObj->listId = 14;
				$productObj->tags = "p4pplatinum";
				$productObj->googleProductName = "P4P Platinum " . self::VSL_VERSION;
				$productObj->metaTitle = "Power4Patriots Platinum Hardcopy Package";
				$productObj->metaDescription = "Power4Patriots Platinum Hardcopy Package";
				$productObj->defaultQuantity = 1;
				$productObj->nextPage = "/checkout/thankyou-p4p-platinum.php";
				break;		}
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
