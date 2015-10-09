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
$offerUrl = "/checkout/coffee600/index.php" . $analyticsObj->queryString;

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
		<!-- SPLIT JV-16 9/17/15-->
		<?php
		if (JV::in("20-aimee")) {
			include_once("content-aimee.php");
		}else{
			include_once("content-timmy.php");
		}
		?>
		<!--/// End Test///-->
	</div>
<?php
include_once("template-bottom.php");
?>


