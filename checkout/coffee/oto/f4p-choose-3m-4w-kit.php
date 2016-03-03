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

$billingStateName = $_SESSION["customerDataArray"]["billingStateName"];
// SET PRODUCT ID
//$_SESSION['productId'] = 164; //please keep as an integer
//$_SESSION['quantity'] = '1';
$_SESSION['upsell'] = TRUE; //must stay a boolean
$_SESSION['pageReturn'] = '/checkout/order.php';
include_once("Product.php");
$productObj = new Product();

$productDataObj = $productObj->getProduct($_SESSION["productId"]);
$funnelData = $productObj->initFunnel("oto2");
$declineUrl = url($funnelData["declineUrl"]);

//************************************************************************//
//todo ideally this whole section will wrap into some platform libraries that are easy to use
//todo for now use the vars below to change the dynamic content in the final template

$pageGreeting = "<p>" . $firstName . ", this is Franks Bates, founder of Food4Patriots, and I just wanted to say ";
$pageGreeting.= "CONGRATULATIONS for claiming your FREE Survival Coffee today.</p>";

//************************************************************************//



include_once("template-top.php");
include_once('template-header.php'); /*Add template-header-nav.php to add top menu*/
include_once("products/offers/f4p-choose-3m-4w-kit.php");
include_once("template-bottom.php");
?>