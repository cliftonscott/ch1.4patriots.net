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
				$productObj->listId = 24;
				$productObj->tags = "LL, f4pseeds";
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
				$productObj->googleProductSku = "PID7";
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
				$productObj->tags = "LL, f4pseeds2";
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
				$productObj->googleProductSku = "PID8";
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
				$productObj->tags = "LL, RUTGERSUP";
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
				$productObj->googleProductSku = "PID11";
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
				$productObj->tags = "LL, 72HKIT";
				$productObj->googleProductName = "F4P-72HRK";
				$productObj->googleProductSku = "PID17";
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
				$productObj->tags = "LL, 4WKIT";
				$productObj->googleProductName = "F4P-4WK";
				$productObj->googleProductSku = "PID18";
				$productObj->googleProductCategory = "1-PAY-197";
				$productObj->metaTitle = "Food4Patriots 4 Week Food Supply";
				$productObj->metaDescription = "Food4Patriots 4 Week Food Supply";
				$productObj->defaultQuantity = 1;
				$productObj->defaultImage = "/media/images/f4p/f4p-4-week-kit-02.jpg";
				$productObj->isBonus = FALSE;
				$productObj->hasBonuses = FALSE; //set this to trigger any bonuses for this id
				$productObj->bonusIds = array (0); //set this as a single integer in an array (1) or a string of integers (123,456)
				$productObj->nextPage = "/checkout/oto/f4p-3month-kit-discount-b.php";
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
				$productObj->tags = "LL, 3MKIT";
				$productObj->googleProductName = "F4P-3MK";
				$productObj->googleProductSku = "PID19";
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
				$productObj->nextPage = "/checkout/thankyou.php";
				$productObj->listId = 35;
				$productObj->tags = "LL, 4WKITUP";
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
				$productObj->googleProductSku = "PID22";
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
				$productObj->tags = "LL, 3MKITUP";
				$productObj->shippingIdDomestic = 7;
				$productObj->shippingIdInternational = 6;
				$productObj->shippingCostDomestic = 0;
				$productObj->shippingCostInternational = 0;
				$productObj->mpsId = 19;
				//Limelight
				$productObj->price = 397;
				$productObj->originalPrice = 497;
				//GA Naming Wiki
				$productObj->netRevenueEach = 132.79;
				$productObj->googleProductName = "F4P-3MK";
				$productObj->googleProductSku = "PID23";
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
				$productObj->tags = "LL, FREEFOOD";
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
				$productObj->googleProductSku = "PID27";
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
				$productObj->googleProductSku = null;
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
				$productObj->tags = "LL, boughtpamtrial";
				$productObj->shippingIdDomestic = 5;
				$productObj->shippingIdInternational = 5;
				$productObj->shippingCostDomestic = 0;
				$productObj->shippingCostInternational = 0;
				$productObj->mpsId = null;
				//Limelight
				$productObj->price = 0;
				$productObj->originalPrice = 19.95;
				//GA Naming Wiki
				$productObj->netRevenueEach = 25;
				$productObj->googleProductName = "PA-MESSENGER";
				$productObj->googleProductSku = "PID39";
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
				$productObj->tags = "LL, 1YRKIT";
				$productObj->shippingIdDomestic = 7;
				$productObj->shippingIdInternational = 6;
				$productObj->shippingCostDomestic = 0;
				$productObj->shippingCostInternational = 0;
				$productObj->mpsId = 40;
				//Limelight
				$productObj->price = 1997;
				$productObj->originalPrice = 2997;
				//GA Naming Wiki
				$productObj->netRevenueEach = 880.01;
				$productObj->googleProductName = "F4P-1YK";
				$productObj->googleProductSku = "PID40";
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
				$productObj->tags = "LL, 1WKKIT";
				$productObj->googleProductName = "F4P-1WK";
				$productObj->googleProductSku = "PID92";
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
				$productObj->tags = "LL, 1YRKIT3PAYMENT";
				$productObj->shippingIdDomestic = 7;
				$productObj->shippingIdInternational = 6;
				$productObj->shippingCostDomestic = 0;
				$productObj->shippingCostInternational = 0;
				$productObj->mpsId = 40;
				//Limelight
				$productObj->price = 597;
				$productObj->originalPrice = 597;
				//GA Naming Wiki
				$productObj->netRevenueEach = 449.95;
				$productObj->googleProductName = "F4P-1YK";
				$productObj->googleProductSku = "PID120";
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
				$productObj->tags = "LL, FVSNACK";
				$productObj->shippingIdDomestic = 7;
				$productObj->shippingIdInternational = 6;
				$productObj->shippingCostDomestic = 0;
				$productObj->shippingCostInternational = 0;
				$productObj->mpsId = 128;
				//Limelight
				$productObj->price = 97;
				$productObj->originalPrice = 97;
				//GA Naming Wiki
				$productObj->netRevenueEach = 33.26;
				$productObj->googleProductName = "F4P-FVSK";
				$productObj->googleProductSku = "PID128";
				$productObj->googleProductCategory = "1-PAY-97";
				$productObj->metaTitle = "Fruit, Veggie and Snack Mix";
				$productObj->metaDescription = "Food4Patriots Fruit, Veggie and Snack Mix";
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
				$productObj->tags = "LL, F4PSEEDS23UP";
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
				$productObj->googleProductSku = "PID142";
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
				$productObj->ffhId = 162; //used for FFH integration
				$productObj->campaignId = 16;
				$productObj->netRevenueEach = 698.65;
				$productObj->taxable = TRUE;
				$productObj->listId = 55;
				$productObj->tags = "LL, ppg1500";
				$productObj->googleProductName = "PPG-GENERATOR";
				$productObj->googleProductSku = "PID162";
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
				$productObj->ffhId = 162; //used for FFH integration
				$productObj->campaignId = 16;
				$productObj->netRevenueEach = 506.37;
				$productObj->taxable = TRUE;
				$productObj->listId = 55;
				$productObj->tags = "LL, ppg1500pmt";
				$productObj->googleProductName = "PPG-GENERATOR";
				$productObj->googleProductSku = "PID174";
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
				$productObj->googleProductSku = "PID170";
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
				$productObj->ffhId = 164; //used for FFH integration
				$productObj->campaignId = 16;
				$productObj->netRevenueEach = 540.63;
				$productObj->taxable = TRUE;
				$productObj->listId = 56;
				$productObj->tags = "LL, ppgDeluxe";
				$productObj->googleProductName = "PPG-PLATINUM";
				$productObj->googleProductSku = "PID164";
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
				$productObj->ffhId = 164; //used for FFH integration
				$productObj->campaignId = 16;
				$productObj->netRevenueEach = 448;
				$productObj->taxable = TRUE;
				$productObj->listId = 57;
				$productObj->tags = "LL, ppgDeluxe2pay";
				$productObj->googleProductName = "PPG-PLATINUM";
				$productObj->googleProductSku = "PID166";
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
				$productObj->tags = "LL, COFFEE600";
				$productObj->shippingIdDomestic = 5;
				$productObj->shippingIdInternational = 6;
				$productObj->shippingCostDomestic = 0;
				$productObj->shippingCostInternational = 0;
				$productObj->mpsId = 182;
				//Limelight
				$productObj->price = 97;
				$productObj->originalPrice = 97;
				//GA Naming Wiki
				$productObj->netRevenueEach = 36.21;
				$productObj->googleProductName = "F4P-C600";
				$productObj->googleProductSku = "PID182";
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
				$productObj->tags = "LL, FREECOFFEE";
				$productObj->shippingIdDomestic = 5;
				$productObj->shippingIdInternational = 6;
				$productObj->shippingCostDomestic = 1.95;
				$productObj->shippingCostInternational = 1.95;
				$productObj->shippingCostPerItem = true;
				$productObj->mpsId = 194;
				//Limelight
				$productObj->price = 0;
				$productObj->originalPrice = 12.95;
				//GA Naming Wiki
				$productObj->netRevenueEach = 0;
				$productObj->googleProductName = "F4P-C30";
				$productObj->googleProductSku = "PID194";
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
				$productObj->tags = "LL, 30COFFEE";
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
				$productObj->googleProductSku = "PID196";
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
			case 228: // SuperPak
				//process file
				$productObj->campaignId = 9;
				$productObj->nextPage = "/checkout/thankyou.php";
				$productObj->listId = null;
				$productObj->tags = "LL, SUPERPAK";
				$productObj->shippingIdDomestic = 26;
				$productObj->shippingIdInternational = 6;
				$productObj->shippingCostDomestic = 0;
				$productObj->shippingCostInternational = 0;
				$productObj->mpsId = 228;
				//Limelight
				$productObj->price = 397;
				$productObj->originalPrice = 450;
				//GA Naming Wiki
				$productObj->netRevenueEach = 196;
				$productObj->googleProductName = "F4P-SUPERPAK";
				$productObj->googleProductSku = "PID228";
				$productObj->googleProductCategory = "1-PAY-397";
				$productObj->metaTitle = "Food4Patriots - Meat & Protein Kit";
				$productObj->metaDescription = "Food4Patriots - Meat & Protein Kit";
				//Other
				$productObj->pmaSku = null;
				$productObj->taxable = TRUE;
				$productObj->defaultQuantity = 1;
				$productObj->isBonus = FALSE;
				$productObj->hasBonuses = FALSE; //set this to trigger any bonuses for this id
				$productObj->bonusIds = array (0); //set this as a single integer in an array (1) or a string of integers (123,456)
				break;

			case 230: // Meat & Protein
				//process file
				$productObj->campaignId = 9;
				$productObj->nextPage = "/checkout/protein/thankyou.php";
				$productObj->listId = 35;
				$productObj->tags = "LL, F4PMeatProteinKit";
				$productObj->shippingIdDomestic = 7;
				$productObj->shippingIdInternational = 6;
				$productObj->shippingCostDomestic = 0;
				$productObj->shippingCostInternational = 0;
				$productObj->mpsId = 230;
				//Limelight
				$productObj->price = 147;
				$productObj->originalPrice = 147;
				//GA Naming Wiki
				$productObj->netRevenueEach = 57.88;
				$productObj->googleProductName = "F4P-PROTEIN";
				$productObj->googleProductSku = "PID230";
				$productObj->googleProductCategory = "1-PAY-147";
				$productObj->metaTitle = "Food4Patriots - Meat & Protein Kit";
				$productObj->metaDescription = "Food4Patriots - Meat & Protein Kit";
				//Other
				$productObj->pmaSku = null;
				$productObj->taxable = TRUE;
				$productObj->defaultQuantity = 1;
				$productObj->isBonus = FALSE;
				$productObj->hasBonuses = FALSE; //set this to trigger any bonuses for this id
				$productObj->bonusIds = array (0); //set this as a single integer in an array (1) or a string of integers (123,456)
				break;

			/*
			 * ============================================
			 * Alexapure Pro Product Data
			 * ============================================
			 *
			 * This product data supports the 1-Year Firesale
			 * funnel, which offers PIDs 253, 257, and 258.
			 *
			 * ============================================
			*/
			case 253: //Alexapure Pro
				$productObj->pmaSku = null;
				$productObj->dynamicPricing = true;
				$productObj->campaignId = 14;
				$productObj->price = 197;
				$productObj->originalPrice = 197;
				$productObj->shippingIdDomestic = 7;
				$productObj->shippingIdInternational = 6;
				$productObj->shippingCostDomestic = 0;
				$productObj->shippingCostInternational = 0;
				$productObj->mpsId = 253;
				$productObj->netRevenueEach = 82;
				$productObj->taxable = TRUE;
				$productObj->listId = 999;
				$productObj->tags = "LL, boughtAPP";
				//GA Naming Wiki
				$productObj->googleProductName = "W4P-APP";
				$productObj->googleProductSku = "PID253";
				$productObj->googleProductCategory = "1-PAY-197";
				$productObj->metaTitle = "Alexapure Pro";
				$productObj->metaDescription = "Alexapure Pro";
				$productObj->defaultQuantity = 1;
				$productObj->defaultImage = null;
				$productObj->isBonus = FALSE;
				$productObj->hasBonuses = FALSE; //set this to trigger any bonuses for this id
				$productObj->bonusIds = array (0); //set this as a single integer in an array (1) or a string of integers (123,456)
				break;
			case 257: //Alexapure Filter - 1 Pack
				$productObj->pmaSku = null;
				$productObj->dynamicPricing = true;
				$productObj->campaignId = 14;
				$productObj->price = 99.95;
				$productObj->originalPrice = 99.95;
				$productObj->shippingIdDomestic = 7;
				$productObj->shippingIdInternational = 6;
				$productObj->shippingCostDomestic = 0;
				$productObj->shippingCostInternational = 0;
				$productObj->mpsId = 257;
				$productObj->netRevenueEach = 54;
				$productObj->taxable = TRUE;
				$productObj->listId = 999;
				$productObj->tags = "LL, boughtAPF";
				//GA Naming Wiki
				$productObj->googleProductName = "W4P-APF1";
				$productObj->googleProductSku = "PID257";
				$productObj->googleProductCategory = "1-PAY-197";
				$productObj->metaTitle = "Alexapure Filter - 1 Pack";
				$productObj->metaDescription = "Alexapure Filter - 1 Pack";
				$productObj->defaultQuantity = 1;
				$productObj->defaultImage = null;
				$productObj->isBonus = FALSE;
				$productObj->hasBonuses = FALSE; //set this to trigger any bonuses for this id
				$productObj->bonusIds = array (0); //set this as a single integer in an array (1) or a string of integers (123,456)
				break;
			case 258: //Alexapure Filter - 3 Pack
				$productObj->pmaSku = null;
				$productObj->dynamicPricing = true;
				$productObj->campaignId = 14;
				$productObj->price = 277;
				$productObj->originalPrice = 277;
				$productObj->shippingIdDomestic = 7;
				$productObj->shippingIdInternational = 6;
				$productObj->shippingCostDomestic = 0;
				$productObj->shippingCostInternational = 0;
				$productObj->mpsId = 258;
				$productObj->netRevenueEach = 146;
				$productObj->taxable = TRUE;
				$productObj->listId = 999;
				$productObj->tags = "LL, boughtAPF";
				//GA Naming Wiki
				$productObj->googleProductName = "W4P-APF3";
				$productObj->googleProductSku = "PID258";
				$productObj->googleProductCategory = "1-PAY-197";
				$productObj->metaTitle = "Alexapure Filter - 3 Pack";
				$productObj->metaDescription = "Alexapure Filter - 3 Pack";
				$productObj->defaultQuantity = 1;
				$productObj->defaultImage = null;
				$productObj->isBonus = FALSE;
				$productObj->hasBonuses = FALSE; //set this to trigger any bonuses for this id
				$productObj->bonusIds = array (0); //set this as a single integer in an array (1) or a string of integers (123,456)
				break;
			/* ============================================
			 * End Of Alexapure Pro Product Data
			 * ============================================ */

			/*
			 * ============================================
			 * JV-55 1 Month - 2 Month - 3 Month Split
			 * ============================================
			 *
			 * This product data supports JV-55 Split
			 *
			 * ============================================
			*/
			case 277: //main product - 1 Month Kit
				$productObj->pmaSku = null;
				$productObj->price = 197;
				$productObj->originalPrice = 197;
				$productObj->shippingIdDomestic = 7;
				$productObj->shippingIdInternational = 6;
				$productObj->shippingCostDomestic = 0;
				$productObj->shippingCostInternational = 0;
				$productObj->mpsId = 277;
				$productObj->campaignId = 9;
				$productObj->netRevenueEach = 116;
				$productObj->taxable = TRUE;
				$productObj->listId = 35;
				$productObj->tags = "LL, 1MKIT";
				$productObj->googleProductName = "F4P-1MK";
				$productObj->googleProductSku = "PID277";
				$productObj->googleProductCategory = "1-PAY-197";
				$productObj->metaTitle = "Food4Patriots 1 Month Food Supply";
				$productObj->metaDescription = "Food4Patriots 1 Month Food Supply";
				$productObj->defaultQuantity = 1;
				$productObj->defaultImage = "/media/images/f4p/f4p-4-week-kit-02.jpg";
				$productObj->isBonus = FALSE;
				$productObj->hasBonuses = FALSE; //set this to trigger any bonuses for this id
				$productObj->bonusIds = array (0); //set this as a single integer in an array (1) or a string of integers (123,456)
				$productObj->nextPage = "/checkout/oto/f4p-3month-kit-discount-b.php";
				break;
			case 278: //main product - 2 Month Kit
				$productObj->pmaSku = null;
				$productObj->price = 397;
				$productObj->originalPrice = 397;
				$productObj->shippingIdDomestic = 7;
				$productObj->shippingIdInternational = 6;
				$productObj->shippingCostDomestic = 0;
				$productObj->shippingCostInternational = 0;
				$productObj->mpsId = 278;
				$productObj->campaignId = 9;
				$productObj->netRevenueEach = 244.55;
				$productObj->taxable = TRUE;
				$productObj->listId = 35;
				$productObj->tags = "LL, 2MKIT";
				$productObj->googleProductName = "F4P-2MK";
				$productObj->googleProductSku = "PID278";
				$productObj->googleProductCategory = "1-PAY-397";
				$productObj->metaTitle = "Food4Patriots 2 Month Food Supply";
				$productObj->metaDescription = "Food4Patriots 2 Month Food Supply";
				$productObj->defaultQuantity = 1;
				$productObj->defaultImage = "/media/images/f4p/f4p-2-month-kit-01.jpg";
				$productObj->isBonus = FALSE;
				$productObj->hasBonuses = FALSE; //set this to trigger any bonuses for this id
				$productObj->bonusIds = array (0); //set this as a single integer in an array (1) or a string of integers (123,456)
				$productObj->nextPage = "/checkout/oto/f4p-3month-kit-discount-b.php";
				break;
			/* ============================================
			 * End Of 1M/2M Product Data
			 * ============================================ */
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
				"declineUrl" => "/checkout/t1/oto/f4p-3month-kit-discount.php",
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
				"nextUrl" => "/checkout/t1/thankyou.php",
				"declineUrl" => "/checkout/t1/thankyou.php",
			),
			"oto5" => array (
				"nextUrl" => "/checkout/t1/thankyou.php",
				"declineUrl" => "/checkout/t1/thankyou.php",
			),

		);

/*
 * ============================================
 * Meat & Protein Funnel
 * ============================================
*/

		$funnelData["protein"] = array(

			"checkout" => array (
				"googleBrand" => "F4P-PROTEIN",
				"nextUrl" => "/checkout/protein/oto/f4p-3month-kit-discount.php",
				"declineUrl" => null,
			),
			"oto1" => array (
				"googleBrand" => "F4P-PROTEIN",
				"nextUrl" => "/checkout/protein/oto/f4p-1year-kit.php",
				"declineUrl" => "/checkout/protein/oto/f4p-messenger-trial.php",
			),
			"oto1b" => array (
				"googleBrand" => "F4P-PROTEIN",
				"nextUrl" => "/checkout/protein/thankyou.php",
				"declineUrl" => "/checkout/protein/thankyou.php",
			),
			"oto2" => array (
				"googleBrand" => "F4P-PROTEIN",
				"nextUrl" => "/checkout/protein/thankyou.php",
				"declineUrl" => "/checkout/protein/oto/f4p-1year-kit-payments.php",
			),
			"oto2b" => array (
				"googleBrand" => "F4P-PROTEIN",
				"nextUrl" => "/checkout/protein/thankyou.php",
				"declineUrl" => "/checkout/protein/thankyou.php",
			),
		);
/*
 * ============================================
 * Fruit & Veggie Funnel
 * ============================================
*/

		$funnelData["fruitveggie"] = array(

			"checkout" => array (
				"googleBrand" => "F4P-FVSK",
				"tags" => "FVSNACK",
				"nextUrl" => "/checkout/fruitveggie/oto/f4p-3month-kit-discount.php",
				"declineUrl" => null,
			),
			"oto1" => array (
				"googleBrand" => "F4P-FVSK",
				"tags" => "FVSNACK",
				"nextUrl" => "/checkout/fruitveggie/oto/f4p-1year-kit.php",
				"declineUrl" => "/checkout/fruitveggie/oto/f4p-messenger-trial.php",
			),
			"oto1b" => array (
				"googleBrand" => "F4P-FVSK",
				"nextUrl" => "/checkout/fruitveggie/thankyou.php",
				"declineUrl" => "/checkout/fruitveggie/thankyou.php",
			),
			"oto2" => array (
				"googleBrand" => "F4P-FVSK",
				"nextUrl" => "/checkout/fruitveggie/thankyou.php",
				"declineUrl" => "/checkout/fruitveggie/oto/f4p-1year-kit-payments.php",
			),
			"oto2b" => array (
				"googleBrand" => "F4P-FVSK",
				"nextUrl" => "/checkout/fruitveggie/thankyou.php",
				"declineUrl" => "/checkout/fruitveggie/thankyou.php",
			),
		);

/*
 * ============================================
 * Coffee 600 Funnel
 * ============================================
*/

		$funnelData["coffee600"] = array(



			"CHECKOUT" => array (
//				"productIds" = array(182),
				"googleBrand" => "F4P-COFFEE600",
				"nextUrl" => "/checkout/coffee600/oto/f4p-3month-kit-discount.php",
				"declineUrl" => "/checkout/coffee600/f4p-coffee-trial.php",
			),
			"OTO-C600-1-3MK" => array (
//				"productIds" = array(23),
				"googleBrand" => "F4P-COFFEE600",
				"nextUrl" => "/checkout/coffee600/oto/f4p-1year-kit.php",
				"declineUrl" => "/checkout/coffee600/oto/f4p-messenger-trial.php",
			),
			"OTO-C600-2D-PA" => array (
//				"productIds" = array(39),
				"googleBrand" => "F4P-COFFEE600",
				"nextUrl" => "/checkout/coffee600/thankyou.php",
				"declineUrl" => "/checkout/coffee600/thankyou.php",
			),
			"OTO-C600-2A-1YK" => array (
//				"productIds" = array(40),
				"googleBrand" => "F4P-COFFEE600",
				"nextUrl" => "/checkout/coffee600/thankyou.php",
				"declineUrl" => "/checkout/coffee600/oto/f4p-1year-kit-payments.php",
			),
			"OTO-C600-3D-1YKP" => array (
//				"productIds" = array(120),
				"googleBrand" => "F4P-COFFEE600",
				"nextUrl" => "/checkout/coffee600/thankyou.php",
				"declineUrl" => "/checkout/coffee600/thankyou.php",
			),
			"OTO-C600-TYP" => array (
//				"productIds" = array(230),
				"googleBrand" => "F4P-COFFEE600",
				"nextUrl" => "/checkout/coffee600/thankyou.php",
				"declineUrl" => "/checkout/coffee600/thankyou.php",
			),
			"TRIAL" => array (
//				"productIds" = array(194),
				"googleBrand" => "F4P-COFFEE600",
				"nextUrl" => "/checkout/coffee600/oto/f4p-3month-kit-discount.php",
				"declineUrl" => null,
			),

		);

/*
 * ============================================
 * 1-Year Firesale Funnel
 * ============================================
*/

		$funnelData["1year-firesale"] = array(

			"MAIN" => array (
				"googleBrand" => "F4P-1YFIRE",
				"tags" => "1YRKIT",
				"price" => 1497.00,
				"customPrice" => 1497.00,
				"netRevenueEach" => 531.55,
				"nextUrl" => "/checkout/1year-firesale/oto/f4p-app.php",
				"declineUrl" => null,
			),
			"OTO1" => array (
				"googleBrand" => "F4P-1YFIRE",
				"nextUrl" => "/checkout/1year-firesale/oto/f4p-apf.php",
				"declineUrl" => "/checkout/1year-firesale/thankyou.php",
			),
			"OTO2" => array (
				"googleBrand" => "F4P-1YFIRE",
				"nextUrl" => "/checkout/1year-firesale/thankyou.php",
				"declineUrl" => "/checkout/1year-firesale/thankyou.php",
			),
			"TYP" => array (
				"googleBrand" => "F4P-1YFIRE",
				"nextUrl" => "/checkout/1year-firesale/thankyou.php",
				"declineUrl" => "/checkout/1year-firesale/thankyou.php",
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
			"/checkout/protein/" => "protein",
			"/checkout/fruitveggie/" => "fruitveggie",
			"/checkout/coffee600/" => "coffee600",
			"/checkout/1year-firesale" => "1year-firesale"
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
