<?php
// SPLIT JV-38 11/20/15 //
// Define the current page name.
$page = "letter";
// END TEST //

// SET PRODUCT ID
$_SESSION['productId'] = 162; //please keep as an integer
$_SESSION['quantity'] = 1;
include_once("Product.php");
//creates a product object that is available from every template
$productDataObj = Product::getProduct($_SESSION["productId"]);
//include template top AFTER the product information is set

/*SPLIT JV-38 11/20/15 TEST CALLED - NEEDS REDESIGNED*/
include_once("agile/template-top.php");
/*END TEST*/

include_once ('template-header.php'); /*Add template-header-nav.php to add top menu*/
$offerUrl = "/checkout/index.php" . $analyticsObj->queryString;

?>

<div id="wrapper">
	<?php include_once("food/content.php"); /*temporary include until platform changes can be made*/?>
</div>