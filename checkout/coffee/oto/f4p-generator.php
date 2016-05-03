<?php
if($_GET["upgrade"] == 1 ) {
	$isUpgrade = TRUE;
}
if(($isUpgrade !== TRUE) && (!empty($_SESSION["customerDataArray"]["firstName"]))) {
	$firstName = $_SESSION["customerDataArray"]["firstName"];
	$_SESSION['upsell'] = TRUE; //must stay a boolean
} else {
	$firstName = "Fellow Patriot";
}

// SET PRODUCT ID
$_SESSION['productId'] = 162; //please keep as an integer

//check for inventory supply for Lion Energy Products
$productId = $_SESSION['productId'];
include_once("Inventory.php");
$inventoryObj = new Inventory();
$isLion = $inventoryObj->isLion($productId);
if($isLion) {
	$hasAllInventory = $inventoryObj->hasAllInventoryByPid($productId);
	if($hasAllInventory === false) {
		header("Location: " . url('/checkout/coffee/thankyou.php'));
		exit;
	}
}

$_SESSION['quantity'] = 1;
$maxQuantity = 1;

$_SESSION['pageReturn'] = '/checkout/order.php';
include_once("Product.php");
$productObj = new Product();

$productDataObj = $productObj->getProduct($_SESSION["productId"]);
$funnelData = $productObj->initFunnel("oto5");
$declineUrl = url($funnelData["declineUrl"]);

include_once("template-top.php");

if($customerDataObj->shippingCountry === "CA" || $customerDataObj->shippingState === "HI" || $customerDataObj->shippingState === "AK"){
	header("Location: " . url('/checkout/coffee/thankyou.php?'));
	exit;
}

include_once('template-header.php'); /*Add template-header-nav.php to add top menu*/
include_once("products/offers/f4p-generator.php");
include_once("template-bottom.php");