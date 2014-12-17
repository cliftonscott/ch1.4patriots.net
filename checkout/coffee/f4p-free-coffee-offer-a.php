<?php
/*
 * use session soldout multidimensional array to indicate sold out conditions and associated
 * variables
 */
$template["floatingTimer"] = 0; //minutes to pass to the timer / will not display if not greater than zero
$template["formType"] = "customerForm"; //designates that this is a form using customer-form.php as included form
// SET PRODUCT ID
// THIS IS SET TO THE 3 MONTH KIT FOR DEFAULT
$_SESSION['productId'] = 194; //please keep as an integer
$_SESSION['quantity'] = 1;
$maxQuantity = 2;
include_once("Product.php");
$productObj = new Product();

$submitButtonSource = "/assets/images/buttons/btn-rush-free-coffee-01.png";

$productDataObj = $productObj->getProduct($_SESSION["productId"]);
$funnelData = $productObj->initFunnel("checkout");

//include template top AFTER the product information is set
include_once ('template-top.php');
$platform->setCsrOrderFormUrl("/checkout/coffee/f4p-free-coffee-offer.php");


?>
<?php include_once ('template-header.php'); /*Add template-header-nav.php to add top menu*/?>


<div class="container-main">

<div class="container">

	<div class="row">
		<div class="col-sm-6 col-sm-push-6 col-md-7 col-md-push-5 nopadding">
			<div style="padding-top: 0px; padding-right:20px;">
				<div class="row">
					<div class="col-lg-12">
						<h2 class="red21 text-center nomargin"><strong>WARNING: Free Survival Coffee<br>Is Almost Gone...</strong></h2>
					</div>

	<div class="col-lg-12 text-center center-block hidden-xs" style="text-align:center;max-width:80%;float:none !important;">
						<script type="text/javascript" src="//reboot.evsuite.com/player/RnJlZUNvZmZlZVZTTC1BaW1lZSBDT01QUkVTU0VELm1wNA==/?responsive=1&autoResponsive=1&container=evp-J9E01DERU8"></script><div id="evp-J9E01DERU8" data-role="evp-video" data-evp-id="RnJlZUNvZmZlZVZTTC1BaW1lZSBDT01QUkVTU0VELm1wNA=="></div>
					</div>
					<div class="col-lg-12 margin-b-10 coffee-checkout">
						<p>Be one of the first to experience the rich, robust taste of the only 25-year shelf life survival coffee available today! You won’t believe its incredibly smooth taste and tantalizing aroma.</p>
						<p>Get 30 servings of my survival coffee <strong>FREE</strong> (just cover shipping + handling) while supplies last! Here’s exactly what you’ll get:</p>
						<ul>
							<li>30 mouth-watering servings of the first-ever survival coffee packed in a special triple-layered, re-sealable, re-usable Mylar packet with an amazing 25-year shelf life!</li>
							<li>This survival coffee tastes great and is easy to make. Just add hot water!</li>
							<li>100% Colombian non-GMO Arabica coffee beans go from tree, to freeze-dryer, to package, to your cup. It doesn’t get any fresher than this, folks!</li>
							<li>Shipped right to your door via USPS First Class Mail.</li>
						</ul>
						<p><strong>Regularly priced at $9.95, FREE while supplies last (just cover shipping + handling) –</strong> claim your coffee before someone else does!</p>
					</div>
					<div class="col-lg-12 text-center hidden-xs">
						<img src="/assets/images/buttons/btn-order-now-orange-left-01.png" alt="Frank" class="img-responsive center-block">
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-6 col-sm-pull-6 col-md-5 col-md-pull-7">
			<?php include_once ('customer-form.php'); ?>
		</div>
	</div>
	<div style="padding-top:40px;">
		<div class="row">
			<div class="col-sm-6 col-md-6"><img class="img-responsive center-block" src="/media/images/f4p/f4p-testimonials-18.jpg" /></div>
			<div class="col-sm-6 col-md-6"><img class="img-responsive center-block" src="/media/images/f4p/f4p-testimonials-19.jpg" /></div>
		</div>
	</div>
	<!-- Start References -->
	<?php include("snippets/checkout-coffee-references.html");?>
	<!-- End References -->

</div>
<?php
include_once("template-bottom.php");
?>