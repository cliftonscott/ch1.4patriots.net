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
		self::setFunnel();
	}
	
	function getProduct($productId) {

		$productObj = new stdClass();

		//TODO move these vars to the Platform.php library
		$productObj->offerLink = "/checkout/index.php";
		$productObj->exitLink = "/letter/index.php";
		$productObj->mobileLink = "/letter/index.php";
		$productObj->trialLink = "/checkout/alt/f4p-free-food-offer.php";
		
		//TODO ensure there is a variable here
		$productObj->productId = intval($productId);
		switch($productObj->productId) {

			case 7: //Liberty Seed Vault
				//process file
				$productObj->campaignId = 6;
				$productObj->nextPage = "/checkout/oto/f4p-seeds-bogo.php";
				$productObj->listId = 14;
				$productObj->tags = "f4pseeds";
				$productObj->shippingIdDomestic = 7;
				$productObj->shippingIdInternational = 6;
				$productObj->shippingCostDomestic = 0;
				$productObj->shippingCostInternational = 0;
				$productObj->mpsId = 7;
				//Limelight
				$productObj->price = 47;
				$productObj->isCustomPrice = true;
				$productObj->originalPrice = 67;
				//GA Naming Wiki
				$productObj->netRevenueEach = 23;
				$productObj->googleProductName = "SS4P-LSV";
				$productObj->googleProductSKU = "PID7";
				$productObj->googleProductCategory = "1-PAY-47";
				$productObj->metaTitle = "Food4Patriots Liberty Seed Vault";
				$productObj->metaDescription = "Food4Patriots Liberty Seed Vault";
				//Other
				$productObj->pmaSku = null;
				$productObj->taxable = TRUE;
				$productObj->defaultQuantity = 1;
				$productObj->isBonus = FALSE;
				$productObj->hasBonuses = FALSE; //set this to trigger any bonuses for this id
				$productObj->bonusIds = array (0); //set this as a single integer in an array (1) or a string of integers (123,456)
				break;
			case 8: //Liberty Seed Vault BOGO
				//process file
				$productObj->campaignId = 6;
				$productObj->nextPage = "/checkout/oto/f4p-messenger-trial.php";
				$productObj->listId = 25;
				$productObj->tags = "f4pseeds2";
				$productObj->shippingIdDomestic = 7;
				$productObj->shippingIdInternational = 6;
				$productObj->shippingCostDomestic = 0;
				$productObj->shippingCostInternational = 0;
				$productObj->mpsId = 8;
				//Limelight
				$productObj->price = 47;
				$productObj->isCustomPrice = true;
				$productObj->originalPrice = 67;
				//GA Naming Wiki
				$productObj->netRevenueEach = 33;
				$productObj->googleProductName = "SS4P-LSV";
				$productObj->googleProductSKU = "PID8";
				$productObj->googleProductCategory = "BOGO";
				$productObj->metaTitle = "Liberty Seed Vault Buy 1 More Get 1 More Free";
				$productObj->metaDescription = "Liberty Seed Vault Buy 1 More Get 1 More Free";
				//Other
				$productObj->pmaSku = null;
				$productObj->taxable = TRUE;
				$productObj->defaultQuantity = 1;
				$productObj->isBonus = FALSE;
				$productObj->hasBonuses = FALSE; //set this to trigger any bonuses for this id
				$productObj->bonusIds = array (0); //set this as a single integer in an array (1) or a string of integers (123,456)
				break;
			case 11: //Rutgers Free Seeds
				//process file
				$productObj->campaignId = 6;
				$productObj->nextPage = "/checkout/oto/f4p-seeds.php";
				$productObj->listId = 38;
				$productObj->tags = "RUTGERSUP";
				$productObj->shippingIdDomestic = 5;
				$productObj->shippingIdInternational = 6;
				$productObj->shippingCostDomestic = 0;
				$productObj->shippingCostInternational = 0;
				$productObj->mpsId = 11;
				//Limelight
				$productObj->price = 0;
				$productObj->originalPrice = 0;
				//GA Naming Wiki
				$productObj->netRevenueEach = 0;
				$productObj->googleProductName = "SS4P-RUTGERS";
				$productObj->googleProductSKU = "PID11";
				$productObj->googleProductCategory = "FREE";
				$productObj->metaTitle = "Food4Patriots Free Rutgers Tomato Seeds";
				$productObj->metaDescription = "Food4Patriots Free Rutgers Tomato Seeds";
				//Other
				$productObj->pmaSku = null;
				$productObj->taxable = TRUE;
				$productObj->defaultQuantity = 1;
				$productObj->isBonus = FALSE;
				$productObj->hasBonuses = FALSE; //set this to trigger any bonuses for this id
				$productObj->bonusIds = array (0); //set this as a single integer in an array (1) or a string of integers (123,456)
				break;
			case 17: //main product - 72 Hour Kit
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
				$productObj->nextPage = "/checkout/oto/f4p-4week-kit-discount-a.php";
				break;
			case 18: //main product - 4 Week Kit
				$productObj->pmaSku = null;
				$productObj->price = 197;
				$productObj->originalPrice = 197;
				$productObj->shippingIdDomestic = 8;
				$productObj->shippingIdInternational = 6;
				$productObj->shippingCostDomestic = 0;
				$productObj->shippingCostInternational = 0;
				$productObj->mpsId = 18;
				$productObj->campaignId = 9;
				$productObj->netRevenueEach = 115;
				$productObj->taxable = TRUE;
				$productObj->listId = 35;
				$productObj->tags = "4WKIT";
				$productObj->googleProductName = "F4P-4WK";
				$productObj->googleProductSKU = "PID18";
				$productObj->googleProductCategory = "1-PAY-197";
				$productObj->metaTitle = "Food4Patriots 4 Week Food Supply";
				$productObj->metaDescription = "Food4Patriots 4 Week Food Supply";
				$productObj->defaultQuantity = 1;
				$productObj->defaultImage = "/media/images/f4p/f4p-4-week-kit-02.jpg";
				$productObj->isBonus = FALSE;
				$productObj->hasBonuses = FALSE; //set this to trigger any bonuses for this id
				$productObj->bonusIds = array (0); //set this as a single integer in an array (1) or a string of integers (123,456)
				$productObj->nextPage = "/checkout/oto/f4p-4week-kit-discount-b.php";
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
				$productObj->nextPage = "/checkout/oto/f4p-1year-kit.php";
				break;
			case 22: // 4WEEK DISCOUNT KIT
				//process file
				$productObj->campaignId = 9;
				$productObj->nextPage = "/checkout/oto/f4p-seeds-rutgers.php";
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
				$productObj->netRevenueEach = 67;
				$productObj->googleProductName = "F4P-4WK";
				$productObj->googleProductSKU = "PID22";
				$productObj->googleProductCategory = "1-PAY-147-DISCOUNT";
				$productObj->metaTitle = "Additional Food4Patriots 4 Week Food Supply $50 Off";
				$productObj->metaDescription = "Additional Food4Patriots 4 Week Food Supply $50 Off";
				$productObj->defaultImage = "/media/images/f4p/f4p-4-week-kit-02.jpg";
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
				$productObj->nextPage = "/checkout/oto/f4p-1year-kit.php";
				$productObj->listId = 35;
				$productObj->tags = "3MKITUP";
				$productObj->shippingIdDomestic = 8;
				$productObj->shippingIdInternational = 6;
				$productObj->shippingCostDomestic = 0;
				$productObj->shippingCostInternational = 0;
				$productObj->mpsId = 19;
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
				$productObj->defaultImage = "/media/images/f4p/f4p-3-month-kit-02.jpg";
				//Other
				$productObj->pmaSku = null;
				$productObj->taxable = TRUE;
				$productObj->defaultQuantity = 1;
				$productObj->isBonus = FALSE;
				$productObj->hasBonuses = FALSE; //set this to trigger any bonuses for this id
				$productObj->bonusIds = array (0); //set this as a single integer in an array (1) or a string of integers (123,456)
				break;
			case 27: // FREEFOOD
				//process file
				$productObj->campaignId = 9;
				$productObj->nextPage = "/checkout/oto/f4p-choose-3m-4w-kit.php";
				$productObj->listId = 42;
				$productObj->tags = "FREEFOOD";
				$productObj->shippingIdDomestic = 20;
				$productObj->shippingIdInternational = 21;
				$productObj->shippingCostDomestic = 1.95;
				$productObj->shippingCostInternational = 0;
				$productObj->mpsId = 27;
				//Limelight
				$productObj->price = 0;
				$productObj->originalPrice = 9.95;
				//GA Naming Wiki
				$productObj->netRevenueEach = 0;
				$productObj->googleProductName = "F4P-72HRK";
				$productObj->googleProductSKU = "PID27";
				$productObj->googleProductCategory = "FREE-PLUS-SHIPPING";
				$productObj->metaTitle = "Food4Patriots FREE Food Offer";
				$productObj->metaDescription = "Food4Patriots FREE Survival Food Offer";
				//Other
				$productObj->pmaSku = null;
				$productObj->taxable = TRUE;
				$productObj->defaultQuantity = 1;
				$productObj->isBonus = FALSE;
				$productObj->hasBonuses = FALSE; //set this to trigger any bonuses for this id
				$productObj->bonusIds = array (0); //set this as a single integer in an array (1) or a string of integers (123,456)
				break;
			case 31: //Patriot Alliance Messenger Trial Bonuses
				//process file
				$productObj->campaignId = 5;
				$productObj->nextPage = null;
				$productObj->listId = null;
				$productObj->tags = null;
				$productObj->shippingIdDomestic = 5;
				$productObj->shippingIdInternational = 21;
				$productObj->shippingCostDomestic = 0;
				$productObj->shippingCostInternational = 0;
				$productObj->mpsId = null;
				//Limelight
				$productObj->price = 0;
				$productObj->originalPrice = 0;
				//GA Naming Wiki
				$productObj->netRevenueEach = 0;
				$productObj->googleProductName = null;
				$productObj->googleProductSKU = null;
				$productObj->googleProductCategory = null;
				$productObj->metaTitle = null;
				$productObj->metaDescription = null;
				//Other
				$productObj->pmaSku = null;
				$productObj->taxable = TRUE;
				$productObj->defaultQuantity = 1;
				$productObj->isBonus = TRUE;
				$productObj->hasBonuses = FALSE; //set this to trigger any bonuses for this id
				$productObj->bonusIds = array (0); //set this as a single integer in an array (1) or a string of integers (123,456)
				break;
			case 39: //Patriot Alliance Messenger Trial
				//process file
				$productObj->campaignId = 4;
				$productObj->nextPage = "/checkout/thankyou.php";
				$productObj->listId = 43;
				$productObj->tags = "boughtpamtrial";
				$productObj->shippingIdDomestic = 5;
				$productObj->shippingIdInternational = 21;
				$productObj->shippingCostDomestic = 0;
				$productObj->shippingCostInternational = 0;
				$productObj->mpsId = null;
				//Limelight
				$productObj->price = 0;
				$productObj->originalPrice = 19.95;
				//GA Naming Wiki
				$productObj->netRevenueEach = 25;
				$productObj->googleProductName = "PA-MESSENGER";
				$productObj->googleProductSKU = "PID39";
				$productObj->googleProductCategory = "30-DAY-TRIAL";
				$productObj->metaTitle = "Patriot Alliance Messenger Trial Subscription";
				$productObj->metaDescription = "Patriot Alliance Messenger Trial Subscription";
				//Other
				$productObj->pmaSku = null;
				$productObj->taxable = TRUE;
				$productObj->defaultQuantity = 1;
				$productObj->isBonus = FALSE;
				$productObj->hasBonuses = TRUE; //set this to trigger any bonuses for this id
				$productObj->bonusIds = array (31); //set this as a single integer in an array (1) or a string of integers (123,456)
				break;
			case 40: // 1YEAR KIT
				//process file
				$productObj->campaignId = 9;
				$productObj->nextPage = "/checkout/oto/f4p-generator.php";
				$productObj->listId = 35;
				$productObj->tags = "1YRKIT";
				$productObj->shippingIdDomestic = 8;
				$productObj->shippingIdInternational = 6;
				$productObj->shippingCostDomestic = 0;
				$productObj->shippingCostInternational = 0;
				$productObj->mpsId = 40;
				//Limelight
				$productObj->price = 1997;
				$productObj->originalPrice = 2997;
				//GA Naming Wiki
				$productObj->netRevenueEach = 950;
				$productObj->googleProductName = "F4P-1YK";
				$productObj->googleProductSKU = "PID40";
				$productObj->googleProductCategory = "1-PAY-1997";
				$productObj->metaTitle = "Food4Patriots 1 Year Food Supply";
				$productObj->metaDescription = "Foood4Patriots 1 Year Food Supply";
				$productObj->defaultImage = "/media/images/f4p/f4p-1-year-kit-01.jpg";
				//Other
				$productObj->pmaSku = null;
				$productObj->taxable = TRUE;
				$productObj->defaultQuantity = 1;
				$productObj->isBonus = FALSE;
				$productObj->hasBonuses = FALSE; //set this to trigger any bonuses for this id
				$productObj->bonusIds = array (0); //set this as a single integer in an array (1) or a string of integers (123,456)
				break;
			case 92: //main product - 1 Week Kit
				$productObj->pmaSku = null;
				$productObj->price = 67;
				$productObj->originalPrice = 67;
				$productObj->shippingIdDomestic = 24;
				$productObj->shippingIdInternational = 19;
				$productObj->shippingCostDomestic = 5.95;
				$productObj->shippingCostInternational = 5.95;
				$productObj->mpsId = 92;
				$productObj->campaignId = 9;
				$productObj->netRevenueEach = 42;
				$productObj->taxable = TRUE;
				$productObj->listId = 35;
				$productObj->tags = "1WKKIT";
				$productObj->googleProductName = "F4P-1WK";
				$productObj->googleProductSKU = "PID92";
				$productObj->googleProductCategory = "1-PAY-67";
				$productObj->metaTitle = "Food4Patriots 1 Week Food Supply";
				$productObj->metaDescription = "Food4Patriots 1 Week Food Supply";
				$productObj->defaultQuantity = 1;
				$productObj->isBonus = FALSE;
				$productObj->hasBonuses = FALSE; //set this to trigger any bonuses for this id
				$productObj->bonusIds = array (0); //set this as a single integer in an array (1) or a string of integers (123,456)
				$productObj->nextPage = "/checkout/oto/f4p-4week-kit-discount-a.php";
				break;
			case 120: // 1YEAR KIT 3 PAYMENTS $597
				//process file
				$productObj->campaignId = 9;
				$productObj->nextPage = "/checkout/thankyou.php";
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
				$productObj->netRevenueEach = 525;
				$productObj->googleProductName = "F4P-1YK";
				$productObj->googleProductSKU = "PID120";
				$productObj->googleProductCategory = "3-PAY-597";
				$productObj->metaTitle = "Food4Patriots 1 Year Food Supply 3 Payments";
				$productObj->metaDescription = "Food4Patriots 1 Year Food Supply 3 Payments";
				$productObj->defaultImage = "/media/images/f4p/f4p-1-year-tote-01.jpg";
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
			case 142: //Liberty Seed Vault $23.50 X 2
				//process file
				$productObj->campaignId = 6;
				$productObj->nextPage = "/checkout/oto/f4p-messenger-trial.php";
				$productObj->listId = 39;
				$productObj->tags = "F4PSEEDS23UP";
				$productObj->shippingIdDomestic = 7;
				$productObj->shippingIdInternational = 6;
				$productObj->shippingCostDomestic = 0;
				$productObj->shippingCostInternational = 0;
				$productObj->mpsId = 7;
				//Limelight
				$productObj->price = 23.50;
				$productObj->originalPrice = 67;
				//GA Naming Wiki
				$productObj->netRevenueEach = 23.50;
				$productObj->googleProductName = "SS4P-LSV";
				$productObj->googleProductSKU = "PID142";
				$productObj->googleProductCategory = "2-PAY-23";
				$productObj->metaTitle = "Food4Patriots Liberty Seed Vault";
				$productObj->metaDescription = "Food4Patriots Liberty Seed Vault";
				//Other
				$productObj->pmaSku = null;
				$productObj->taxable = TRUE;
				$productObj->defaultQuantity = 1;
				$productObj->isBonus = FALSE;
				$productObj->hasBonuses = FALSE; //set this to trigger any bonuses for this id
				$productObj->bonusIds = array (0); //set this as a single integer in an array (1) or a string of integers (123,456)
				break;
			case 162: //Patriot Power Generator
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
				$productObj->googleProductName = "PPG-GENERATOR";
				$productObj->googleProductSKU = "PID162";
				$productObj->googleProductCategory = "1-PAY-1997";
				$productObj->metaTitle = "Patriot Power Generator 1500";
				$productObj->metaDescription = "Patriot Power Generator 1500 - Plus Bonuses";
				$productObj->defaultQuantity = 1;
				$productObj->hasBonuses = TRUE; //set this to trigger any bonuses for this id
				$productObj->bonusIds = array (170); //set this as a single integer in an array (1) or a string of integers (123,456)
				$productObj->nextPage = "/checkout/oto/f4p-generator-platinum.php";
				$productObj->soldOutPage = "/checkout/thankyou.php";
				break;
			case 174: //Patriot Power Generator 2 Pay
				$productObj->pmaSku = null;
				$productObj->price = 997;
				$productObj->originalPrice = 997;
				$productObj->shippingIdDomestic = 26;
				$productObj->shippingIdInternational = null; //no international sales
				$productObj->shippingCostDomestic = 0;
				$productObj->shippingCostInternational = 0; //no international sales
				$productObj->mpsId = null; //used for MPS
				$productObj->campaignId = 16;
				$productObj->netRevenueEach = 393;
				$productObj->taxable = TRUE;
				$productObj->listId = 55;
				$productObj->tags = "ppg1500pmt";
				$productObj->googleProductName = "PPG-GENERATOR";
				$productObj->googleProductSKU = "PID174";
				$productObj->googleProductCategory = "2-PAY-997";
				$productObj->metaTitle = "Patriot Power Generator 1500";
				$productObj->metaDescription = "Patriot Power Generator 1500 - Plus Bonuses";
				$productObj->defaultQuantity = 1;
				$productObj->hasBonuses = TRUE; //set this to trigger any bonuses for this id
				$productObj->bonusIds = array (170); //set this as a single integer in an array (1) or a string of integers (123,456)
				$productObj->nextPage = "/checkout/thankyou.php";
				$productObj->soldOutPage = "/checkout/thankyou.php";
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
				$productObj->googleProductName = "";
				$productObj->googleProductSKU = "PID170";
				$productObj->googleProductCategory = "";
				$productObj->metaTitle = "Patriot Power Generator 1500 - Bonuses";
				$productObj->metaDescription = "Patriot Power Generator 1500 - Bonuses";
				$productObj->defaultQuantity = 1;
				$productObj->isBonus = TRUE;
				$productObj->nextPage = null; //bonuses don't use a next page
				break;
			case 164: //Patriot Power Generator Platinum Upgrade
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
				$productObj->googleProductName = "PPG-PLATINUM";
				$productObj->googleProductSKU = "PID164";
				$productObj->googleProductCategory = "1-PAY-997";
				$productObj->metaTitle = "PPG Platinum Upgrade";
				$productObj->metaDescription = "Patriot Power Generator Platinum Upgrade";
				$productObj->defaultQuantity = 1;
				$productObj->nextPage = "/checkout/thankyou.php";
				$productObj->soldOutPage = "/checkout/thankyou.php";
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
				$productObj->googleProductName = "PPG-PLATINUM";
				$productObj->googleProductSKU = "PID166";
				$productObj->googleProductCategory = "2-PAY-497";
				$productObj->metaTitle = "PPG Platinum Upgrade - 2 Easy Payment Plan";
				$productObj->metaDescription = "PPG Platinum Upgrade - 2 Easy Payment Plan";
				$productObj->defaultQuantity = 1;
				$productObj->nextPage = "/checkout/thankyou.php";
				$productObj->soldOutPage = "/checkout/thankyou.php";
				break;
			case 182: // Coffee Offer
				//process file
				$productObj->campaignId = 9;
				$productObj->nextPage = "/checkout/thankyou.php";
				$productObj->listId = 66;
				$productObj->tags = "COFFEE600";
				$productObj->shippingIdDomestic = 7;
				$productObj->shippingIdInternational = 6;
				$productObj->shippingCostDomestic = 0;
				$productObj->shippingCostInternational = 0;
				$productObj->mpsId = 182;
				//Limelight
				$productObj->price = 97;
				$productObj->originalPrice = 97;
				//GA Naming Wiki
				$productObj->netRevenueEach = 44;
				$productObj->googleProductName = "F4P-C600";
				$productObj->googleProductSKU = "PID182";
				$productObj->googleProductCategory = "1-PAY-97";
				$productObj->metaTitle = "Food4Patriots Coffee - 600 Servings";
				$productObj->metaDescription = "Food4Patriots Coffee - 600 Servings";
				//Other
				$productObj->pmaSku = null;
				$productObj->taxable = TRUE;
				$productObj->defaultQuantity = 1;
				$productObj->isBonus = FALSE;
				$productObj->hasBonuses = FALSE; //set this to trigger any bonuses for this id
				$productObj->bonusIds = array (0); //set this as a single integer in an array (1) or a string of integers (123,456)
				break;
			case 194: // Free Coffee Offer
				//process file
				$productObj->campaignId = 9;
				$productObj->nextPage = "/checkout/thankyou.php";
				$productObj->listId = 65;
				$productObj->tags = "FREECOFFEE";
				$productObj->shippingIdDomestic = 5;
				$productObj->shippingIdInternational = 6;
				$productObj->shippingCostDomestic = 1.95;
				$productObj->shippingCostInternational = 1.95;
				$productObj->mpsId = 194;
				//Limelight
				$productObj->price = 0;
				$productObj->originalPrice = 9.95;
				//GA Naming Wiki
				$productObj->netRevenueEach = 0;
				$productObj->googleProductName = "F4P-C30";
				$productObj->googleProductSKU = "PID194";
				$productObj->googleProductCategory = "FREE-PLUS-SHIPPING";
				$productObj->metaTitle = "Food4Patriots FREE Survival Coffee";
				$productObj->metaDescription = "Food4Patriots Free Survival Coffee Offer";
				//Other
				$productObj->pmaSku = null;
				$productObj->taxable = TRUE;
				$productObj->defaultQuantity = 1;
				$productObj->isBonus = FALSE;
				$productObj->hasBonuses = FALSE; //set this to trigger any bonuses for this id
				$productObj->bonusIds = array (0); //set this as a single integer in an array (1) or a string of integers (123,456)
				break;
			case 196: // Not-free Coffee Offer
				//process file
				$productObj->campaignId = 9;
				$productObj->nextPage = "/checkout/thankyou.php";
				$productObj->listId = null;
				$productObj->tags = "30COFFEE";
				$productObj->shippingIdDomestic = 20;
				$productObj->shippingIdInternational = 21;
				$productObj->shippingCostDomestic = 1.95;
				$productObj->shippingCostInternational = 1.95;
				$productObj->mpsId = 194;
				//Limelight
				$productObj->price = 9.95;
				$productObj->originalPrice = 9.95;
				//GA Naming Wiki
				$productObj->netRevenueEach = 0;
				$productObj->googleProductName = "F4P-C30";
				$productObj->googleProductSKU = "PID196";
				$productObj->googleProductCategory = "1-PAY-10";
				$productObj->metaTitle = "Food4Patriots 30 SERVING Survival Coffee Offer";
				$productObj->metaDescription = "Food4Patriots 30 SERVING Survival Coffee Offer";
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

	function loadFunnelData() {

		$funnelData["freecoffee"] = array(
			"checkout" => array (
				"nextUrl" => "/checkout/coffee/oto/f4p-coffee-deluxe.php",
				"declineUrl" => "/checkout/coffee/oto/f4p-coffee-deluxe.php",
			),
			"oto1" => array (
				"nextUrl" => "/checkout/coffee/oto/f4p-1year-kit.php?b=true",
				"declineUrl" => "/checkout/coffee/oto/f4p-1year-kit.php",
			),
//			"oto1" => array (
//				"nextUrl" => "/checkout/coffee/oto/f4p-choose-3m-4w-kit.php",
//				"declineUrl" => "/checkout/coffee/oto/f4p-choose-3m-4w-kit.php",
//			),
			"oto2" => array (
				"pidVariableNextUrl" => true,
				18 => array (
					"nextUrl" => "/checkout/coffee/oto/f4p-4week-kit-discount.php",
				),
				19 => array (
					"nextUrl" => "/checkout/coffee/oto/f4p-1year-kit.php",
				),
				"declineUrl" => "/checkout/coffee/oto/f4p-choose-3m-4w-kit-discount.php",
			),
			"oto2b" => array (
				"nextUrl" => "/checkout/coffee/thankyou.php",
				"declineUrl" => "/checkout/coffee/thankyou.php",
			),
			"oto3" => array (
				"nextUrl" => "/checkout/coffee/thankyou.php",
				"declineUrl" => "/checkout/coffee/thankyou.php",
			),
			"oto4" => array (
				"nextUrl" => "/checkout/coffee/oto/f4p-generator.php",
				"declineUrl" => "/checkout/coffee/oto/f4p-1year-kit-payments.php",
			),
			"oto4b" => array (
				"nextUrl" => "/checkout/coffee/thankyou.php",
				"declineUrl" => "/checkout/coffee/oto/f4p-3month-kit-discount.php",
			),
			"oto4c" => array (
				"nextUrl" => "/checkout/coffee/thankyou.php",
				"declineUrl" => "/checkout/coffee/thankyou.php",
			),
			"oto5" => array (
				"nextUrl" => "/checkout/coffee/oto/f4p-generator-platinum.php",
				"declineUrl" => "/checkout/coffee/oto/f4p-generator-payments.php",
			),
			"oto5b" => array (
				"nextUrl" => "/checkout/coffee/thankyou.php",
				"declineUrl" => "/checkout/coffee/thankyou.php",
			),
			"oto6" => array (
				"nextUrl" => "/checkout/coffee/thankyou.php",
				"declineUrl" => "/checkout/coffee/thankyou.php",
			),
		);

		/*
		 * ============================================
		 * t1 Google Funnel
		 * ============================================
		*/

		$funnelData["t1"] = array(
			"checkout" => array (
				"pidVariableNextUrl" => true,
				92 => array (
					"nextUrl" => "/checkout/t1/oto/f4p-4week-kit-discount-a.php",
				),
				18 => array (
					"nextUrl" => "/checkout/t1/oto/f4p-4week-kit-discount-b.php",
				),
				19 => array (
					"nextUrl" => "/checkout/t1/oto/f4p-1year-kit.php",
				),
				"declineUrl" => null,
			),
			"oto1a" => array (
				"nextUrl" => "/checkout/t1/oto/f4p-seeds-rutgers.php",
				"declineUrl" => "/checkout/t1/oto/f4p-seeds-rutgers.php",
			),
			"oto1b" => array (
				"nextUrl" => "/checkout/t1/oto/f4p-seeds-rutgers.php",
				"declineUrl" => "/checkout/t1/oto/f4p-seeds-rutgers.php",
			),
			"oto1c" => array (
				"nextUrl" => "/checkout/t1/oto/f4p-generator.php",
				"declineUrl" => "/checkout/t1/oto/f4p-1year-kit-payments.php",
			),
			"oto2" => array (
				"nextUrl" => "/checkout/t1/oto/f4p-seeds.php",
				"declineUrl" => "/checkout/t1/oto/f4p-messenger-trial.php",
			),
			"oto2a" => array (
				"nextUrl" => "/checkout/t1/thankyou.php",
				"declineUrl" => "/checkout/t1/thankyou.php",
			),
			"oto2b" => array (
				"nextUrl" => "/checkout/t1/thankyou.php",
				"declineUrl" => "/checkout/t1/f4p-3month-kit-discount.php",
			),
			"oto2c" => array (
				"nextUrl" => "/checkout/t1/thankyou.php",
				"declineUrl" => "/checkout/t1/thankyou.php",
			),
			"oto3" => array (
				"nextUrl" => "/checkout/t1/oto/f4p-seeds-bogo.php",
				"declineUrl" => "/checkout/t1/oto/f4p-messenger-trial.php",
			),
			"oto4" => array (
				"nextUrl" => "/checkout/t1/oto/f4p-messenger-trial.php",
				"declineUrl" => "/checkout/t1/oto/f4p-messenger-trial.php",
			),
			"oto4a" => array (
				"nextUrl" => "/checkout/t1/oto/f4p-generator-platinum.php",
				"declineUrl" => "/checkout/t1/oto/f4p-generator-payments.php",
			),
			"oto4b" => array (
				"nextUrl" => "/checkout/t1/oto/thankyou.php",
				"declineUrl" => "/checkout/t1/oto/thankyou.php",
			),
			"oto5" => array (
				"nextUrl" => "/checkout/t1/oto/thankyou.php",
				"declineUrl" => "/checkout/t1/oto/thankyou.php",
			),

		);

		return $funnelData;

	}

	function getFunnelData($funnel, $step) {

		$data = self::loadFunnelData();
		$funnelData = $data[$funnel][$step];
		return $funnelData;

	}

	function setFunnel() {

		$validFunnels = array (
			"/checkout/coffee/" => "freecoffee",
			"/checkout/t1/" => "t1",
		);

		$currentPath = $_SERVER["PHP_SELF"];

		foreach($validFunnels as $path => $funnel) {
			if(stripos($currentPath,$path) > -1) {
				$_SESSION["Funnel"]["name"] = $funnel;
			}
		}

	}

	function setStep($step) {
		$_SESSION["Funnel"]["step"] = $step;
		return true;
	}

	function getStep() {
		$step = $_SESSION["Funnel"]["step"];
		return $step;
	}

	function getFunnel() {
		if(isset($_SESSION["Funnel"])) {
			$results = $_SESSION["Funnel"];
		} else {
			$results = false;
		}

		return $results;
	}

	function initFunnel($step) {

		$currentFunnel = self::getFunnel();

		$initData = self::getFunnelData($currentFunnel["name"],$step);

		self::setStep($step);
		return $initData;
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
