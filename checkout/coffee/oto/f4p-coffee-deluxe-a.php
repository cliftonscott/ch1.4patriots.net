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
$_SESSION['productId'] = 182; //please keep as an integer
$_SESSION['quantity'] = 1;
$maxQuantity = 5;

$_SESSION['pageReturn'] = '/checkout/order.php';
include_once("Product.php");
$productObj = new Product();

$productDataObj = $productObj->getProduct($_SESSION["productId"]);
$funnelData = $productObj->initFunnel("oto1");
$declineUrl = $funnelData["declineUrl"];

$pageGreeting = "<strong>Congratulations, " . $firstName . "!</strong> Your 30-serving FREE survival coffee trial packet is on its way to you, and will be at your front door in no time flat. Soon you’ll be sipping a freshly brewed cup by the fire, at your kitchen table, or even on the road in your travel mug. Well done.";

include_once("template-top.php");
include_once('template-header.php'); /*Add template-header-nav.php to add top menu*/
include_once("products/offers/f4p-coffee-deluxe-a.php");
include_once("template-bottom.php");