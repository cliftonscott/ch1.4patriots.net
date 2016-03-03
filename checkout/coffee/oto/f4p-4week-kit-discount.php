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
$shippingCity = $_SESSION["customerDataArray"]["shippingCity"];
// SET PRODUCT ID
$_SESSION['productId'] = 22; //please keep as an integer
$_SESSION['quantity'] = '1';
$_SESSION['pageReturn'] = '/checkout/order.php';
include_once("Product.php");
$productObj = new Product();

$productDataObj = $productObj->getProduct($_SESSION["productId"]);
$funnelData = $productObj->initFunnel("oto3");
$declineUrl = url($funnelData["declineUrl"]);

include_once("template-top.php");
include_once('template-header.php'); /*Add template-header-nav.php to add top menu*/
include_once("products/offers/f4p-4week-kit-discount.php");
include_once("template-bottom.php");
?>