<?php
// SET PRODUCT ID
$_SESSION['productId'] = 162; //please keep as an integer
$_SESSION['quantity'] = 1;
include_once("Product.php");
//creates a product object that is available from every template
$productDataObj = Product::getProduct($_SESSION["productId"]);
//include template top AFTER the product information is set
include_once("template-top.php");
include_once ('template-header.php'); /*Add template-header-nav.php to add top menu*/
$offerUrl = "https://secure.food4patriots.com/checkout/index.php" . $analyticsObj->queryString;

?>
<link href="/assets/css/styles-letter.css" rel="stylesheet" type="text/css">

<link href='https://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,700,600,300,800' rel='stylesheet' type='text/css'>

<div id="wrapper">
	<?php include_once("content.php"); ?>
</div>
