<?php
// SET PRODUCT ID
$_SESSION['productId'] = 230; //please keep as an integer
$_SESSION['quantity'] = 1;
include_once("Product.php");
//creates a product object that is available from every template
$productDataObj = Product::getProduct($_SESSION["productId"]);
//include template top AFTER the product information is set
include_once("template-top.php");
include_once ('template-header.php'); /*Add template-header-nav.php to add top menu*/
$offerUrl = url('/checkout/protein/index.php');

/*$variantsArray = array (
	"a", // Short Split Test
	"b", // Short Split Test
);
if($_GET["v"]) {
	if(in_array(trim($_GET["v"]),$variantsArray)) {
		$variation = trim($_GET["v"]);
	}
}*/

?>
	<div class="container-main">
		<div class="container">
			<?php include_once("content.php"); ?>
		</div>
	</div>
<?php
include_once("template-bottom.php");
?>