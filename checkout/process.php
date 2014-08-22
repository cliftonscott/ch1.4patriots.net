<?php
include_once("Dblog.php");
$startProcessTime = microtime(true);

//==============================================================================================================//
//==============================================================================================================//
//create an analytics object to track the tracking
$stepTimerStart = microtime(true);
include_once("Analytics.php");
$analyticsObj = new Analytics();

$stepTimerStop = microtime(true);
$stepTime = round($stepTimerStop - $stepTimerStart, 4);
$stepTimeLog[] = $stepTime . " :: Create analyticsObj";
//==============================================================================================================//
//==============================================================================================================//
//get/create a data object where we can store values related to this single sale
include_once("Sale.php");
$saleDataObj = new Sale();

//--------------------------------------------------------------------------------------------------------------//
//set the productId
if($_POST["productId"]) {
	$productId = intval($_POST["productId"]);
} elseif ($_SESSION["productId"]) {
	$productId = intval($_SESSION["productId"]);
} else {
	//the productId must be explicitly set by either a post or by session variable
	$nextPage = "/checkout/index.php";
	//header("Location: " . $nextPage);
	exit;
}
//create sale object
$saleDataObj->setProductId($productId);

//==============================================================================================================//
//==============================================================================================================//
$stepTimerStart = microtime(true);
//set product data object
include_once("Product.php");
$product = new Product();
$productDataObj = $product->getProduct($productId);

$stepTimerStop = microtime(true);
$stepTime = round($stepTimerStop - $stepTimerStart, 4);
$stepTimeLog[] = $stepTime . " :: Create productObj";

//--------------------------------------------------------------------------------------------------------------//
//set the quantity
if($_POST["quantity"]) {
	$quantity = intval($_POST["quantity"]);
} elseif ($_SESSION["quantity"]) {
	$quantity = intval($_SESSION["quantity"]);
} else {
	$quantity = $productDataObj->defaultQuantity;
}
$saleDataObj->setQuantity($quantity);

//==============================================================================================================//
//==============================================================================================================//
//process form and set customer data object
$stepTimerStart = microtime(true);
include_once("Customer.php");
$customerObj = new Customer();
if($_SESSION["upsell"] !== TRUE) {
	//test for PO Box type adddresses
	$poTest = $customerObj->isPOB($_POST["billing-address"]);
	if($poTest === TRUE) {
		$_SESSION["errorMessage"] = "Sorry, we are unable to ship this item to a PO Box. Please use a street address.";
		$nextPage = $_SESSION["formReturn"];
		unset($_SESSION["formReturn"]);
		header("Location: " . $nextPage);
		exit;
	} else {
		//setCustomer
		$customerObj->setCustomerFromPost();
	}
}
//get and set customer data object
$customerDataObj = $customerObj->getStoredCustomer();

$stepTimerStop = microtime(true);
$stepTime = round($stepTimerStop - $stepTimerStart, 4);
$stepTimeLog[] = $stepTime . " :: Process form data & get customerObj";
//==============================================================================================================//
//==============================================================================================================//
//post purchase to LL
$stepTimerStart = microtime(true);
//set return values
include_once("Limelight.php");
$limelight = new Limelight();

$postLimelight = $limelight->postSale($saleDataObj->getSale(), $productDataObj, $customerDataObj, $analyticsObj);

if($postLimelight->responseCode !== 100) {
	//transactioned failed to post to limelight
	switch($postLimelight->responseCode) {
		case 342: //the card has expired
			$_SESSION["errorMessage"] = $postLimelight->errorMessage;
			$nextPage = $_SESSION["formReturn"];
			unset($_SESSION["formReturn"]);
			break;
		case 800: //transaction was declined
			$_SESSION["errorMessage"] = $postLimelight->errorMessage;
			$nextPage = $_SESSION["formReturn"];
			//TODO create email/text/olark messaging to CSR in event of decline
			break;
		default:
			$_SESSION["errorMessage"] = $postLimelight->errorMessage;
			$nextPage = $_SESSION["formReturn"];
			break;
	}
	unset($_SESSION["formReturn"]);
	header("Location: " . $nextPage);
	////NOT PROCESSED ANY FURTHER
	exit;
}
$saleDataObj->setOrderId($postLimelight->orderId);
$saleDataObj->setCustomerId($postLimelight->customerId);
$saleDataObj->setLimelight($postLimelight->success);

$devLog["orderId"] = "LL OrderId: " . $postLimelight->orderId;

$myDevLog.= "LimeLight Results:<br>";
$myDevLog.= "Start " . date("Y-m-d h:i:s") . "<br>";
$myDevLog.= "ipaddress:" . $_SESSION['ipaddress'] . "<br>";
$myDevLog.= "productId:" . $productDataObj->productId . "<br>";
$myDevLog.= "firstName:" . $customerDataObj->firstName . "<br>";
$myDevLog.= "email:" . $customerDataObj->email . "<br>";
$myDevLog.= "lastName:" . $customerDataObj->lastName . "<br>";
$myDevLog.= "SID:" . $analyticsObj->subId . "<br>";
$myDevLog.= "LL CustomerId:" . $postLimelight->customerId . "<br>";
$myDevLog.= "LL OrderId:" . $postLimelight->orderId . "<br>";
$myDevLog.= "LL Order Response String:" . $postLimelight->serverResponse . "<br>";

$stepTimerStop = microtime(true);
$stepTime = round($stepTimerStop - $stepTimerStart, 4);
$stepTimeLog[] = $stepTime . " :: Post to Limelight";
//==============================================================================================================//
//==============================================================================================================//
//handle bonus productIds by looking for attributes in the productObject
$stepTimerStart = microtime(true);
if($productDataObj->hasBonuses === TRUE) {
	foreach ($productDataObj->bonusIds as $bonusId) {
		$bonusProductDataObj = $product->getProduct($bonusId);
		$bonusLimelight = $limelight->postSale($saleDataObj->getSale(), $bonusProductDataObj, $customerDataObj, $analyticsObj);
		//TODO log if this function reports false / the only reason it might would be for a transaction failure or inability to contact the remote server
	}
}
$stepTimerStop = microtime(true);
$stepTime = round($stepTimerStop - $stepTimerStart, 4);
$stepTimeLog[] = $stepTime . " :: Post Bonus Items to Limelight";
//==============================================================================================================//
//==============================================================================================================//
//post purchase to MPS (if applicable)
$stepTimerStart = microtime(true);
if($productDataObj->mpsId > 0) {
	include_once("Mps.php");
	$mps = new Mps();
	$mps->setOrderId($postLimelight->orderId);
	$mps->setCustomerId($postLimelight->customerId);
	$postMps = $mps->postSale($productDataObj, $customerDataObj);
	//TODO get w/ MPS and create better error plans
	//TODO currently MPS is returning an error string due to something wrong on their end
	//TODO consequently we can't complete this error checking until resolve.
	if($postMps->success === TRUE) {
		//successfully posted to mps
	} else {
		//post not receive
	}
	$saleDataObj->setMps($postMps->success);
}

$stepTimerStop = microtime(true);
$stepTime = round($stepTimerStop - $stepTimerStart, 4);
$stepTimeLog[] = $stepTime . " :: Post to MPS";
//==============================================================================================================//
//==============================================================================================================//
//post purchase to CPV
$stepTimerStart = microtime(true);
//TODO: see class Cpv.php for additional todos for CPV lab
include_once("Analytics.php");
$analyticsObj = new Analytics();

if(!empty($analyticsObj->subId)) {
	$subId = $analyticsObj->subId;
} elseif (!empty($analyticsObj->affSub2)) {
	$subId = $analyticsObj->affSub2;
}

if($subId !== null) {
	include_once("Cpv.php");
	$cpv = new Cpv();
	$cpvSaleObj = $saleDataObj->getSale();
	$cpvRevenue = $productDataObj->netRevenueEach * $cpvSaleObj->quantity;
	$postCpv = $cpv->postSale($subId, $cpvRevenue);
	//TODO: improve results checking here
	if($postCpv->success === TRUE) {
		//successfully posted to cpv
	} else {
		//post not received
	}
	$saleDataObj->setCpv($postCpv->success);
}

$stepTimerStop = microtime(true);
$stepTime = round($stepTimerStop - $stepTimerStart, 4);
$stepTimeLog[] = $stepTime . " :: Post to CPV";

//==============================================================================================================//
//==============================================================================================================//
//post purchase to hasoffers if an offerId and clickId have been captured
$stepTimerStart = microtime(true);

if((!empty($analyticsObj->offerId)) && (!empty($analyticsObj->clickId))) {

	include_once("Hasoffers.php");
	$hasOffers = new Hasoffers();
	$hasOffersRevenue = $productDataObj->netRevenueEach * $quantity;
	$postHasOffers = $hasOffers->postSale($productDataObj->productId, $analyticsObj->offerId, $analyticsObj->clickId, $hasOffersRevenue);
	if($postHasOffers->success === FALSE) {
		//TODO send email to dev w/ results of failure because we did not successfully post to HO
	}
	$saleDataObj->setHasOffers($postHasOffers->success);

	$myDevLog = "Start " . date("Y-m-d h:i:s") . "<br>";
	$myDevLog.= "ipaddress:" . $_SESSION['ipaddress'] . "<br>";
	$myDevLog.= "netRevenue:" . $productDataObj->netRevenueEach . "<br>";
	$myDevLog.= "quantity:" . $quantity . "<br>";
	$myDevLog.= "HO Revenue:" . $hasOffersRevenue . "<br>";
	$myDevLog.= "HO URL:" . $postHasOffers->hasOffersUrl . "<br>";
	$myDevLog.= "HO Order Response String:" . $postHasOffers->serverResponse . "<br>";
}

$stepTimerStop = microtime(true);
$stepTime = round($stepTimerStop - $stepTimerStart, 4);
$stepTimeLog[] = $stepTime . " :: Post to HasOffers";
//==============================================================================================================//
//==============================================================================================================//
//set auto-responders
$stepTimerStart = microtime(true);
if(!empty($productDataObj->listId)) {
	include_once("Autoresponder.php");
	$autoResponder = new Autoresponder();
	$postAutoResponder = $autoResponder->postSale($productDataObj, $customerDataObj);
	$saleDataObj->setAutoResponder($postAutoResponder->success);

}
$stepTimerStop = microtime(true);
$stepTime = round($stepTimerStop - $stepTimerStart, 4);
$stepTimeLog[] = $stepTime . " :: Post to OAP";
//==============================================================================================================//
//==============================================================================================================//
//post purchase and status of other postings to internal db
include_once("Sale.php");
$stepTimerStart = microtime(true);
include_once("Patriots.php");
$patriots = new Patriots();
$postPatriots = $patriots->postSale($saleDataObj->getSale(), $customerDataObj);
$saleDataObj->setPatriots($postPatriots->success);

$stepTimerStop = microtime(true);
$stepTime = round($stepTimerStop - $stepTimerStart, 4);
$stepTimeLog[] = $stepTime . " :: Save sale to internal database";
//==============================================================================================================//
//==============================================================================================================//
//end timer and report elapsed time just before the redirect

foreach($stepTimeLog as $step) {
	$stepText .= $step . "<BR>";
}
$stepText .= "======<br>";

$dblog = Dblog::setDblog($myDevLog,"DevLog");

$saleArray = (array) $saleDataObj;
foreach ($saleArray as $k => $v) {
	$saleInfo .= $k . "=>" . $v . "<br>";
}

$dblog = Dblog::setDblog($saleInfo,"saleObj");

$endProcessTime = microtime(true);
$elapsedProcesstime = $endProcessTime - $startProcessTime;
$stepText .= $elapsedProcesstime . " :: Total process time (" . getenv("DESIGNATION") . ")";
$dblog = Dblog::setDblog($stepText,"PROCESS TIMES<br>" . $postLimelight->orderId);


//redirect to next page
if(($customerDataObj->billingCountry !== "US") && ($customerDataObj->billingCountry !== "CA")) {
	header("Location: thankyou.php");
	exit;
} else {
	if(!empty($productDataObj->nextPage)) {
		header("Location: " . $productDataObj->nextPage);
	} else {
		header("Location: thankyou.php");
	}
}

//==============================================================================================================//
//==============================================================================================================//
?>
