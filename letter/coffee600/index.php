<?php
// SET PRODUCT ID
$_SESSION['productId'] = 182; //please keep as an integer
$_SESSION['quantity'] = 1;
include_once("Product.php");
//creates a product object that is available from every template
$productDataObj = Product::getProduct($_SESSION["productId"]);
//include template top AFTER the product information is set
include_once("template-top.php");
include_once ('template-header.php'); /*Add template-header-nav.php to add top menu*/
$offerUrl = url('/checkout/coffee600/index.php');

/*$variantsArray = array (
	"timmy", // Timmy Version
);
if($_GET["v"]) {
	if(in_array(trim($_GET["v"]),$variantsArray)) {
		$variation = trim($_GET["v"]);
	}
}*/

?>
	<div class="container-main">
		<?php
		include_once("content-timmy.php");
		?>
	</div>
<?php
include_once("template-bottom.php");
?>


