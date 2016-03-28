<?php
include_once("Platform.php");
$platform = new Platform();
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
	header("Location: " . url($nextPage));
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

if($product->getFunnel()) {
	//FUNNEL REDIRECT TO NEXT PAGE
	$currentStep = $product->getStep();
	$funnelData = $product->initFunnel($currentStep, $productId);
	if (isset($funnelData["googleBrand"]) && $funnelData["googleBrand"] !== null) {
		$productDataObj->googleBrand = $funnelData["googleBrand"];
	}
	if (isset($funnelData["price"]) && $funnelData["price"] !== null) {
		$productDataObj->price = $funnelData["price"];
		$productDataObj->isCustomPrice = true;
	}
	if (isset($funnelData["netRevenueEach"]) && $funnelData["netRevenueEach"] !== null) {
		$productDataObj->netRevenueEach = $funnelData["netRevenueEach"];
	}
}
if($_SESSION["customTemplate"]["price"] > 0) {
	$productDataObj->price = $_SESSION["customTemplate"]["price"];
	$productDataObj->isCustomPrice = true;
	unset($_SESSION["customTemplate"]["price"]);
}

var_dump($productDataObj); exit;

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
	//set customer data object
	$customerObj->setCustomerFromPost();
}
//get stored customer data object
$customerDataObj = $customerObj->getStoredCustomer();
//if($customerDataObj === false) {
//	$log = Dblog::setDblog("failed to retrieve customer data obj","CustomerObj");
//} else {
//	$log = Dblog::setDblog("successfully retrieved customer data obj","CustomerObj");
//}

$stepTimerStop = microtime(true);
$stepTime = round($stepTimerStop - $stepTimerStart, 4);
$stepTimeLog[] = $stepTime . " :: Process form data & get customerObj";
//==============================================================================================================//
//==============================================================================================================//
//check for inventory supply for Lion Energy Products
include_once("Inventory.php");
$inventoryObj = new Inventory();
$isLion = $inventoryObj->isLion($productId);
if($isLion) {
	$hasAllInventory = $inventoryObj->hasAllInventoryByPid($productId);
	if($hasAllInventory === false) {
		$nextPage = $_SESSION["formReturn"];
		unset($_SESSION["formReturn"]);
		$nextPage = "/checkout/outofstock.php";
		header("Location: " . url($nextPage));
	}
}
$stepTimerStop = microtime(true);
$stepTime = round($stepTimerStop - $stepTimerStart, 4);
$stepTimeLog[] = $stepTime . " :: Check inventory";
//==============================================================================================================//
//==============================================================================================================//
//post purchase to LL
$stepTimerStart = microtime(true);
//set return values
include_once("Limelight.php");
$limelight = new Limelight();

$postLimelight = $limelight->postSale($saleDataObj->getSale(), $productDataObj, $analyticsObj);

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
	header("Location: " . url($nextPage));
	////NOT PROCESSED ANY FURTHER
	exit;
}
$saleDataObj->setOrderId($postLimelight->orderId);
$saleDataObj->setCustomerId($postLimelight->customerId);
$saleDataObj->setLimelight($postLimelight->success);

$devLog["orderId"] = "LL OrderId: " . $postLimelight->orderId;

$myDevLog.= "LL Results:<br>";
$myDevLog.= "Start " . date("Y-m-d h:i:s") . "<br>";
$myDevLog.= "ipaddress:" . $_SESSION['ipaddress'] . "<br>";
$myDevLog.= "productId:" . $productDataObj->productId . "<br>";
$myDevLog.= "firstName:" . $customerDataObj->firstName . "<br>";
$myDevLog.= "email:" . $customerDataObj->email . "<br>";
//$myDevLog.= "lastName:" . $customerDataObj->lastName . "<br>";
$myDevLog.= "SID:" . $analyticsObj->subId . "<br>";
$myDevLog.= "LL CustomerId:" . $postLimelight->customerId . "<br>";
$myDevLog.= "LL OrderId:" . $postLimelight->orderId . "<br>";
//$myDevLog.= "LL Order Response String:" . $postLimelight->serverResponse . "<br>";

$stepTimerStop = microtime(true);
$stepTime = round($stepTimerStop - $stepTimerStart, 4);
$stepTimeLog[] = $stepTime . " :: Post to Limelight :: " . $postLimelight->success;

//==============================================================================================================//
//==============================================================================================================//
//reduce inventory for Lion Products
$stepTimerStart = microtime(true);
$isLion = $inventoryObj->isLion($productId);
if($isLion) {
	$subtractInventory = $inventoryObj->subtractAllInventoryByPid($productId, $quantity);
	if($subtractInventory->success === false) {
		//do something because one of the subtractions failed
		//todo send an email if the subtraction fails
	}
}
$stepTimerStop = microtime(true);
$stepTime = round($stepTimerStop - $stepTimerStart, 4);
$stepTimeLog[] = $stepTime . " :: Subtract from Inventory :: " . $subtractInventory->success;

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
$stepTimeLog[] = $stepTime . " :: Post Bonus Items to Limelight :: " . $bonusLimelight->success;
//==============================================================================================================//
//==============================================================================================================//
//post purchase to 4Patriots Api
$stepTimerStart = microtime(true);

include_once("PatriotsApi.php");
$patriotsApi = new PatriotsApi();
$patriotsApi->setOrderId($postLimelight->orderId);
$patriotsApi->setCustomerId($postLimelight->customerId);
$postPatriotsApi = $patriotsApi->postSale($saleDataObj->getSale(), $productDataObj, $customerDataObj, $analyticsObj);
if($postPatriotsApi->success === TRUE) {
	//successfully posted to mps

} else {
	//post not receive
}
// TODO: Update this MPS functionality.
$saleDataObj->setMps($postPatriotsApi->success);


$stepTimerStop = microtime(true);
$stepTime = round($stepTimerStop - $stepTimerStart, 4);
$stepTimeLog[] = $stepTime . " :: Post to 4Patriots Api :: " . $postPatriotsApi->success;
//==============================================================================================================//
//==============================================================================================================//
//post purchase to FFH (if applicable)
if($platform->isApiEnabled("ffh") === true) {
	$stepTimerStart = microtime(true);
	if($productDataObj->ffhId > 0) {
		include_once("Ffh.php");
		$ffh = new Ffh();
		$ffh->setOrderId($postLimelight->orderId);
		$ffh->setQuantity($quantity);
		$postFfh = $ffh->postSale($productDataObj, $customerDataObj);
		if($postFfh->success === TRUE) {
			$myDevLog.="FFH Results:<br>";
			$myDevLog.="Successfully posted to FFH<br>";
			$myDevLog.=$postFfh->ffhOrderNumber . "<br>";
		} else {
			$myDevLog.="FFH Results:<br>";
			$myDevLog.="Failed to post to FFH<br>";
			$myDevLog.="FFH Error: " . $postFfh->ffhError . "<br>";
		}
		$saleDataObj->setFfh($postFfh->success);
	}
	$stepTimerStop = microtime(true);
	$stepTime = round($stepTimerStop - $stepTimerStart, 4);
	$stepTimeLog[] = $stepTime . " :: Post to FFH :: " . $postFfh->success;
}

//==============================================================================================================//
//==============================================================================================================//
//post purchase to YellowHammer if an sspdata exists in Analytics
$stepTimerStart = microtime(true);

if(!empty($analyticsObj->sspData)) {
	include_once("Yellowhammer.php");
	$yellowHammer = new Yellowhammer();
	$yellowHammerSaleObj = $saleDataObj->getSale();
	$orderRevenue = $productDataObj->netRevenueEach * $yellowHammerSaleObj->quantity;
	$postYellowHammer = $yellowHammer->postSale($yellowHammerSaleObj,$orderRevenue);

	if($postYellowHammer->success === FALSE) {
		//TODO send email to dev w/ results of failure because we did not successfully post to YH
	}
	$saleDataObj->setYellowHammer($postYellowHammer->success);

	$myDevLog.= "YH Results:<br>";
	$myDevLog.= "Start " . date("Y-m-d h:i:s") . "<br>";
	$myDevLog.= "ipaddress:" . $_SESSION['ipaddress'] . "<br>";
	$myDevLog.= "netRevenue:" . $productDataObj->netRevenueEach . "<br>";
	$myDevLog.= "quantity:" . $quantity . "<br>";
	$myDevLog.= "YH Revenue:" . $orderRevenue . "<br>";
	$myDevLog.= "YH URL:" . $postYellowHammer->hasOffersUrl . "<br>";
	$myDevLog.= "YH Order Response String:" . $postYellowHammer->serverResponse . "<br>";
}

$stepTimerStop = microtime(true);
$stepTime = round($stepTimerStop - $stepTimerStart, 4);
$stepTimeLog[] = $stepTime . " :: Post to YellowHammer :: " . $postYellowHammer->success;

//==============================================================================================================//
//==============================================================================================================//
//post purchase to VWO if an vwoGoalId exists in Analytics
$stepTimerStart = microtime(true);

if(!empty($analyticsObj->vwoGoalId)) {
	include_once("Vwo.php");
	$vwo = new Vwo();
	$vwoSaleObj = $saleDataObj->getSale();
	$vwoRevenue = $productDataObj->netRevenueEach * $vwoSaleObj->quantity;


	$postVWO = $vwo->postSale($vwoRevenue);



	if($postVWO->success === FALSE) {
		//TODO send email to dev w/ results of failure because we did not successfully post to YH
	}
	$saleDataObj->setVwo($postVWO->success);

	$myDevLog.= "VWO Results:<br>";
	$myDevLog.= "Start " . date("Y-m-d h:i:s") . "<br>";
	$myDevLog.= "ipaddress:" . $_SESSION['ipaddress'] . "<br>";
	$myDevLog.= "netRevenue:" . $productDataObj->netRevenueEach . "<br>";
	$myDevLog.= "quantity:" . $quantity . "<br>";
	$myDevLog.= "VWO Revenue:" . $vwoRevenue . "<br>";
	$myDevLog.= "VWO URL:" . $postVWO->hasOffersUrl . "<br>";
	$myDevLog.= "VWO Order Response String:" . $postVWO->serverResponse . "<br>";


	$vwoLogText.= "VWO Results:<br>";
	$vwoLogText.= "Start " . date("Y-m-d h:i:s") . "<br>";
	$vwoLogText.= "ipaddress:" . $_SESSION['ipaddress'] . "<br>";
	$vwoLogText.= "netRevenue:" . $productDataObj->netRevenueEach . "<br>";
	$vwoLogText.= "quantity:" . $quantity . "<br>";
	$vwoLogText.= "VWO Revenue:" . $vwoRevenue . "<br>";
	$vwoLogText.= "VWO URL:" . $postVWO->hasOffersUrl . "<br>";
	$vwoLogText.= "VWO Order Response String:" . $postVWO->serverResponse . "<br>";

	$vwoLog = Dblog::setDblog($vwoLogText,"VWO Postback");
} else {
	$vwoLogText = "no vwoGoalId found";
	$vwoLog = Dblog::setDblog($vwoLogText,"VWO Postback");
}

$stepTimerStop = microtime(true);
$stepTime = round($stepTimerStop - $stepTimerStart, 4);
$stepTimeLog[] = $stepTime . " :: Post to VWO :: " . $postVWO->success;

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
$stepTimeLog[] = $stepTime . " :: Post to OAP :: " . $postAutoResponder->success;
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
$stepTimeLog[] = $stepTime . " :: Save sale to internal database :: " . $postPatriots->success;
//==============================================================================================================//
//==============================================================================================================//
//end timer and report elapsed time just before the redirect

foreach($stepTimeLog as $step) {
	$stepText .= $step . "<BR>";
}
$stepText .= "======<br>";


//$dblog = Dblog::setDblog($myDevLog,"DevLog");

$saleArray = (array) $saleDataObj;
foreach ($saleArray as $k => $v) {
	$saleInfo .= $k . "=>" . $v . "<br>";
}

$dblog = Dblog::setDblog($saleInfo,"saleObj");

$endProcessTime = microtime(true);
$elapsedProcesstime = $endProcessTime - $startProcessTime;
$stepText .= $elapsedProcesstime . " :: Total process time (" . getenv("4PAT_SERVER_NAME") . ")";
$dblog = Dblog::setDblog($stepText,"PROCESS TIMES<br>" . $postLimelight->orderId);



if($product->getFunnel()) {
	//FUNNEL REDIRECT TO NEXT PAGE
	$currentStep = $product->getStep();
	$funnel = $product->initFunnel($currentStep);
	if($funnel["pidVariableNextUrl"] === true) {
		header("Location: " . url($funnel[$productId]["nextUrl"]));
	} else {
		header("Location: " . url($funnel["nextUrl"]));
	}
} else {
	//NON-FUNNEL REDIRECT TO NEXT PAGE
	if(($customerDataObj->billingCountry !== "US") && ($customerDataObj->billingCountry !== "CA")) {
		header("Location: " . url('/checkout/thankyou.php'));
		exit;
	} else {
		if(!empty($_SESSION['nextPageOverride'])) {
			header("Location: " . url($_SESSION['nextPageOverride']));
			unset($_SESSION['nextPageOverride']);
		}elseif(!empty($productDataObj->nextPage)) {
			header("Location: " . url($productDataObj->nextPage));
		} else {
			header("Location: " . url('/checkout/thankyou.php'));
		}
	}
}

//==============================================================================================================//
//==============================================================================================================//
?>
