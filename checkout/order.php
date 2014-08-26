<?php
if(empty($_SESSION['productId'])) {
	$_SESSION['productId'] = 148; //please keep as an integer	
}
include_once("Product.php");
$productDataObj = Product::getProduct($_SESSION["productId"]);
$template["formType"] = "customerForm"; //designates that this is a form using customer-form.php as included form
include_once("template-top.php");
include_once ('template-header.php'); /*Add template-header-nav.php to add top menu*/
?>
<div class="container-main">
	<div class="breadcrumb1">
        <a>CHECKOUT</a>
        <a class="current">ORDER CUSTOMIZATION</a>
        <a>ORDER CONFIRMATION</a>
    </div>
    <div class="container">
		<div class="row">
            <div class="col-sm-6 col-md-7">
              <div class="center-block text-center">
              	<div>
<?php
if($_SESSION['upgrade'] == TRUE) {
	$_SESSION["upgrade"] = FALSE;
	//use only values available in the Product.php file OR use only generic text, non-product specific
?>
					<p class="text-success h3">
						<?php echo $productDataObj->metaTitle; ?>
					</p>
					<p>
						<?php echo $productDataObj->metaDescription; ?>
					</p>
					

<?php
} else {
?>
					<h2 class="text-danger">There was a problem processing your order for the special offer:</h3>
					<p class="text-success h3">
						<?php echo $productDataObj->metaTitle; ?>
					</p>
					<p>
						<?php echo $productDataObj->metaDescription; ?>
					</p>
					<p><u><strong>Don't worry!</strong></u><strong> If you have another method for payment, you can enter it and still receive the special offer!</strong></p>

<?php
}
?>

				</div>
              </div>
            </div>
            <div class="col-sm-6 col-md-5">
                <?php include_once ('customer-form.php'); ?>
            </div>
		</div>
	</div>
</div>
<?php
include_once("template-bottom.php");