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
//set custom text for included template
$pageGreeting = $firstName . ", congratulations for making the great decision to get your Food4Patriots Coffee Kit today.";
$pageSentence1 = <<<EOD
A lot of folks have told me that while they love having their coffee kits on hand, they feel that it’s simply not
enough to ensure their safety if things went south… especially given the scary state of affairs in this country and
the constant threat of natural disasters. In fact, the most common question we get is, “What about food?”
EOD;

$pagePurchasedProduct = "This special sale offer is ONLY for customers who have already purchased the Food4Patriots Coffee kit.";
$pageShipping = "Because we're already going to be sending you your Food4Patriots Coffee";



// SET PRODUCT ID
$_SESSION['productId'] = 40; //please keep as an integer
$_SESSION['quantity'] = 1;
$maxQuantity = 5;

$_SESSION['pageReturn'] = '/checkout/order.php';
include_once("Product.php");
$productObj = new Product();

$productDataObj = $productObj->getProduct($_SESSION["productId"]);
$funnelData = $productObj->initFunnel("oto4");
$declineUrl = url($funnelData["declineUrl"]);

include_once("template-top.php");
include_once('template-header.php'); /*Add template-header-nav.php to add top menu*/

$noThanksLink = "/checkout/coffee/oto/f4p-1year-kit-payments.php";
include_once("products/offers/f4p-1year-kit.php");
include_once("template-bottom.php");