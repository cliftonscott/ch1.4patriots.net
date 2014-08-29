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

		// is #21 new? isn't in old process file
		
		$productObj = new stdClass();

		//TODO move these vars to the Platform.php library
		$productObj->offerLink = "/checkout/index.php";
		$productObj->exitLink = "/letter/index.php";
		$productObj->mobileLink = "/letter/index.php";
		$productObj->trialLink = null;
		
		//TODO ensure there is a variable here
		$productObj->productId = intval($productId);
		switch($productObj->productId) {

			case 17: //additional product
				$productObj->pmaSku = null;
				$productObj->price = 27;
				$productObj->originalPrice = 27;
				$productObj->shippingIdDomestic = 14;
				$productObj->shippingIdInternational = 19;
				$productObj->shippingCostDomestic = 5.95;
				$productObj->shippingCostInternational = 5.95;
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
			case 18: //additional product
				$productObj->pmaSku = null;
				$productObj->price = 197;
				$productObj->originalPrice = 197;
				$productObj->shippingIdDomestic = 8;
				$productObj->shippingIdInternational = 6;
				$productObj->shippingCostDomestic = 0;
				$productObj->shippingCostInternational = 0;
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
			case 19: //main product - 3 Month Kit
				$productObj->pmaSku = null;
				$productObj->price = 497;
				$productObj->originalPrice = 497;
				$productObj->shippingIdDomestic = 8;
				$productObj->shippingIdInternational = 6;
				$productObj->shippingCostDomestic = 0;
				$productObj->shippingCostInternational = 0;
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
			case 21:
				//is this id new?
				break;
			case 22: // 4WEEK DISCOUNT KIT
				//process file
				$productObj->campaignId = 9;
				$productObj->nextPage = "/checkout/oto/f4p-rutgers.php";
				$productObj->listId = 35;
				$productObj->tags = "4WKITUP";
				$productObj->shippingIdDomestic = 8;
				$productObj->shippingIdInternational = 6;
				$productObj->shippingCostDomestic = 0;
				$productObj->shippingCostInternational = 0;
				//TODO add something for skip rutgers nextpage?
				$productObj->mpsId = 18;
				//Limelight
				$productObj->price = 147;
				$productObj->originalPrice = 197;
				//GA Naming Wiki
				$productObj->netRevenueEach = 65;
				$productObj->googleProductName = "F4P-4WK";
				$productObj->googleProductSKU = "PID22";
				$productObj->googleProductCategory = "1-PAY-147-DISCOUNT";
				$productObj->metaTitle = "Additional Food4Patriots 4 Week Food Supply $50 Off";
				$productObj->metaDescription = "Additional Food4Patriots 4 Week Food Supply $50 Off";
				//Other
				$productObj->pmaSku = null;
				$productObj->taxable = TRUE;
				$productObj->defaultQuantity = 1;
				$productObj->isBonus = FALSE;
				$productObj->hasBonuses = FALSE; //set this to trigger any bonuses for this id
				$productObj->bonusIds = array (0); //set this as a single integer in an array (1) or a string of integers (123,456)
				break;
			case 23: // 3MONTH DISCOUNT KIT
				//process file
				$productObj->campaignId = 9;
				$productObj->nextPage = "/checkout/registration/thankyou.php";
				$productObj->listId = 35;
				$productObj->tags = "3MKITUP";
				$productObj->shippingIdDomestic = 8;
				$productObj->shippingIdInternational = 6;
				$productObj->shippingCostDomestic = 0;
				$productObj->shippingCostInternational = 0;
				$productObj->mpsId = 18;
				//Limelight
				$productObj->price = 397;
				$productObj->originalPrice = 497;
				//GA Naming Wiki
				$productObj->netRevenueEach = 150;
				$productObj->googleProductName = "F4P-3MK";
				$productObj->googleProductSKU = "PID23";
				$productObj->googleProductCategory = "1-PAY-397-DISCOUNT";
				$productObj->metaTitle = "Additional Food4Patriots 3 Month Food Supply $100 Off";
				$productObj->metaDescription = "Additional Food4Patriots 3 Month Food Supply $100 Off";
				//Other
				$productObj->pmaSku = null;
				$productObj->taxable = TRUE;
				$productObj->defaultQuantity = 1;
				$productObj->isBonus = FALSE;
				$productObj->hasBonuses = FALSE; //set this to trigger any bonuses for this id
				$productObj->bonusIds = array (0); //set this as a single integer in an array (1) or a string of integers (123,456)
				break;
			case 27: // 3MONTH DISCOUNT KIT
				//process file
				$productObj->campaignId = 9;
				$productObj->nextPage = "/checkout/oto/f4p-oto-d.php";
				$productObj->listId = 42;
				$productObj->tags = "FREEFOOD";
				$productObj->shippingIdDomestic = 20;
				$productObj->shippingIdInternational = 21;
				$productObj->shippingCostDomestic = 0;
				$productObj->shippingCostInternational = 0;
				$productObj->mpsId = 27;
				//Limelight
				$productObj->price = 0;
				$productObj->originalPrice = 0;
				//GA Naming Wiki
				$productObj->netRevenueEach = 0;
				$productObj->googleProductName = "F4P-72HRK";
				$productObj->googleProductSKU = "PID27";
				$productObj->googleProductCategory = "FREE-PLUS-SHIPPING";
				$productObj->metaTitle = "Food4Patriots FREE Survival Food Offer";
				$productObj->metaDescription = "Food4Patriots FREE Survival Food Offer";
				//Other
				$productObj->pmaSku = null;
				$productObj->taxable = TRUE;
				$productObj->defaultQuantity = 1;
				$productObj->isBonus = FALSE;
				$productObj->hasBonuses = FALSE; //set this to trigger any bonuses for this id
				$productObj->bonusIds = array (0); //set this as a single integer in an array (1) or a string of integers (123,456)
				break;
			case 40: // 1YEAR KIT
				//process file
				$productObj->campaignId = 9;
				$productObj->nextPage = "/checkout/registration/thankyou.php";
				$productObj->listId = 35;
				$productObj->tags = "1YRKIT";
				$productObj->shippingIdDomestic = 8;
				$productObj->shippingIdInternational = 6;
				$productObj->shippingCostDomestic = 0;
				$productObj->shippingCostInternational = 0;
				$productObj->mpsId = 40;
				//Limelight
				$productObj->price = 1997;
				$productObj->originalPrice = 1997;
				//GA Naming Wiki
				$productObj->netRevenueEach = 952;
				$productObj->googleProductName = "F4P-1YK";
				$productObj->googleProductSKU = "PID40";
				$productObj->googleProductCategory = "1-PAY-1997";
				$productObj->metaTitle = "Food4Patriots 1 Year Food Supply";
				$productObj->metaDescription = "Food4Patriots 1 Year Food Supply";
				//Other
				$productObj->pmaSku = null;
				$productObj->taxable = TRUE;
				$productObj->defaultQuantity = 1;
				$productObj->isBonus = FALSE;
				$productObj->hasBonuses = FALSE; //set this to trigger any bonuses for this id
				$productObj->bonusIds = array (0); //set this as a single integer in an array (1) or a string of integers (123,456)
				break;
			case 120: // 1YEAR KIT 3 PAYMENTS $597
				//process file
				$productObj->campaignId = 9;
				$productObj->nextPage = "/checkout/registration/thankyou.php";
				$productObj->listId = 35;
				$productObj->tags = "1YRKIT3PAYMENT";
				$productObj->shippingIdDomestic = 8;
				$productObj->shippingIdInternational = 6;
				$productObj->shippingCostDomestic = 0;
				$productObj->shippingCostInternational = 0;
				$productObj->mpsId = 40;
				//Limelight
				$productObj->price = 597;
				$productObj->originalPrice = 597;
				//GA Naming Wiki
				$productObj->netRevenueEach = 411;
				$productObj->googleProductName = "F4P-1YK";
				$productObj->googleProductSKU = "PID120";
				$productObj->googleProductCategory = "3-PAY-597";
				$productObj->metaTitle = "Food4Patriots 1 Year Food Supply 3 Payments";
				$productObj->metaDescription = "Food4Patriots 1 Year Food Supply 3 Payments";
				//Other
				$productObj->pmaSku = null;
				$productObj->taxable = TRUE;
				$productObj->defaultQuantity = 1;
				$productObj->isBonus = FALSE;
				$productObj->hasBonuses = FALSE; //set this to trigger any bonuses for this id
				$productObj->bonusIds = array (0); //set this as a single integer in an array (1) or a string of integers (123,456)
				break;
			case 128: // FRUIT VEGGIE SNACK KIT
				//process file
				$productObj->campaignId = 9;
				$productObj->nextPage = "/checkout/thankyou.php";
				$productObj->listId = 35;
				$productObj->tags = "3MKITSNACK";
				$productObj->shippingIdDomestic = 7;
				$productObj->shippingIdInternational = 6;
				$productObj->shippingCostDomestic = 0;
				$productObj->shippingCostInternational = 0;
				$productObj->mpsId = 128;
				//Limelight
				$productObj->price = 97;
				$productObj->originalPrice = 97;
				//GA Naming Wiki
				$productObj->netRevenueEach = 35;
				$productObj->googleProductName = "F4P-FVSK";
				$productObj->googleProductSKU = "PID128";
				$productObj->googleProductCategory = "1-PAY-97";
				$productObj->metaTitle = "Food4Patriots Fruit, Veggie, And Snack Kit";
				$productObj->metaDescription = "Food4Patriots Fruit, Veggie, And Snack Kit";
				//Other
				$productObj->pmaSku = null;
				$productObj->taxable = TRUE;
				$productObj->defaultQuantity = 1;
				$productObj->isBonus = FALSE;
				$productObj->hasBonuses = FALSE; //set this to trigger any bonuses for this id
				$productObj->bonusIds = array (0); //set this as a single integer in an array (1) or a string of integers (123,456)
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
