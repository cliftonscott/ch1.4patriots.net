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
$_SESSION['productId'] = 23; //please keep as an integer
$_SESSION['quantity'] = '1';
$_SESSION['upsell'] = TRUE; //must stay a boolean
$_SESSION['pageReturn'] = '/checkout/order.php';
$_SESSION['nextPageOverride'] = '/checkout/thankyou.php'; // $nextPage set to 1 Year Kit in Product.php - Keeps From Looping
// Redirects If Already Offered 3 Month Discount
if($_SESSION['3mDiscountSkip'] === TRUE) {
	unset($_SESSION['3mDiscountSkip']);
	header("Location: /checkout/thankyou.php");
}
include_once("Product.php");
$productObj = new Product();

$productDataObj = $productObj->getProduct($_SESSION["productId"]);
$funnelData = $productObj->initFunnel("oto4c");
$declineUrl = $funnelData["declineUrl"];

include_once("template-top.php");
include_once('template-header.php'); /*Add template-header-nav.php to add top menu*/
include_once("products/offers/f4p-3month-kit-discount.php");
include_once("template-bottom.php");