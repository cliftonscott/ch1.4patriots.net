<?php
// Define the current page name.
$page = "letter";

// SET PRODUCT ID
$_SESSION['productId'] = 162; //please keep as an integer
$_SESSION['quantity'] = 1;
include_once("Product.php");
//creates a product object that is available from every template
$productDataObj = Product::getProduct($_SESSION["productId"]);
//include template top AFTER the product information is set
include_once("agile/template-top.php");

include_once ('template-header.php'); /*Add template-header-nav.php to add top menu*/
$offerUrl = url('/checkout/index.php');
?>

<div id="wrapper">
	<?php
		echo '<div class="container-main">';
		include_once('food/content-v4.php'); /*F4P 4.0 Letter Content*/
		echo '</div>';
		include_once("template-bottom.php");
	?>
</div>