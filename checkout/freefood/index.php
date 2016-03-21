<?php
/*
 * use session soldout multidimensional array to indicate sold out conditions and associated
 * variables
 */
$template["floatingTimer"] = 0; //minutes to pass to the timer / will not display if not greater than zero
$template["formType"] = "customerForm"; //designates that this is a form using customer-form.php as included form
// SET PRODUCT ID
// THIS IS SET TO THE 3 MONTH KIT FOR DEFAULT
$_SESSION['productId'] = 17; //please keep as an integer
$_SESSION['quantity'] = 1;
include_once("Product.php");


if($_SESSION["soldout"]["flag"] !== true) {
	$template["floatingTimer"] = 15; //minutes to pass to the timer / will not display if not greater than zero
} else {
	$template["floatingTimer"] = 0; //minutes to pass to the timer / will not display if not greater than zero
}
//creates a product object that is available from every template
$productObj = new Product();
$productDataObj = Product::getProduct($_SESSION["productId"]);
$funnelData = $productObj->initFunnel("checkout");

require_once("JavelinApi.php");
$javelinApi = JV::load();

//include template top AFTER the product information is set
/*include_once ('template-top.php');*/

// SPLIT JV-71 ALL DEVICES 3/21/16
if (JV::in("71-t")) {
	include_once('content-jv-71-taylor.php');
}elseif(JV::in("71-j")) {
	include_once ('template-top.php');
	include_once('content-jv-71-jeremy.php');
}else{
	include_once ('template-top.php');
	include_once('content.php'); /*CONTROL*/
};

?>


