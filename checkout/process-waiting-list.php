<?php
$listId = intval($_POST["listId"]);
include_once("Customer.php");
$customerObj = new Customer();
$customerObj->setCustomerFromPost();
$customerDataObj = $customerObj->getStoredCustomer();

$productDataObj = new stdClass();
$productDataObj->tags = "PPGInterest";
$productDataObj->listId = $listId;

//==============================================================================================================//
//set auto-responders
$stepTimerStart = microtime(true);
if(!empty($listId)) {
	include_once("Autoresponder.php");
	$autoResponder = new Autoresponder();
	$postAutoResponder = $autoResponder->postSale($productDataObj, $customerDataObj);
}
$stepTimerStop = microtime(true);
$stepTime = round($stepTimerStop - $stepTimerStart, 4);
$stepTimeLog[] = $stepTime . " :: Post to OAP";
//==============================================================================================================//

if($postAutoResponder->success === true) {
	$_SESSION["soldout"]["waitlist"] = true;
}
header("Location: /checkout/index.php");