<?php
// For 3mo Discount Split Test
if($_GET["upgrade"] == 1 ) {
	$isUpgrade = TRUE;
}
if(($isUpgrade !== TRUE) && (!empty($_SESSION["customerDataArray"]["firstName"]))) {
	$firstName = $_SESSION["customerDataArray"]["firstName"];
	$_SESSION['upsell'] = TRUE; //must stay a boolean
} else {
	$firstName = "Fellow Patriot";
}
$shippingCity = $_SESSION["customerDataArray"]["shippingCity"];
// SET PRODUCT ID
$_SESSION['productId'] = 23; //please keep as an integer
$_SESSION['quantity'] = '1';
$_SESSION['pageReturn'] = '/checkout/order.php';

// Redirects If Already Offered 3 Month Discount
if($_SESSION['3mDiscountSkip'] === TRUE) {
	unset($_SESSION['3mDiscountSkip']);
	header("Location: " . url('/checkout/freefood/thankyou.php'));
}

include_once("Product.php");
$productObj = new Product();
$productDataObj = Product::getProduct($_SESSION["productId"]);
$funnelData = $productObj->initFunnel("F4P-OTO-3MK-1YA-DIS");
$declineUrl = $funnelData["declineUrl"];

include_once("template-top.php");
include_once ('template-header.php'); /*Add template-header-nav.php to add top menu*/
?>
<style>
	p{
		font-size: 20px;
	}
</style>
	<div class="container-main">
	<div class="breadcrumb1">
		<a>CHECKOUT</a>
		<a class="current">ORDER CUSTOMIZATION</a>
		<a>ORDER CONFIRMATION</a>
	</div>
	<div class="container oto-width">
		<div>
			<h1 class="darkRed text-center">&quot;<?php echo $firstName;?>, Please Accept This $100 Discount On An Additional<br class="hidden-xs"> 3-Month Kit...&quot;</h1>
		</div>
		<div style="padding-bottom:20px;padding-top: 10px"><img class="img-responsive center-block" src="/media/images/f4p/f4p-3-month-kit-10.jpg" alt="3 Month Kit"/></div>
		<div>
			<p><?php echo $firstName;?>, one more thing... The folks in our warehouse have reserved your 3-Month Food4Patriots kit and are already busy getting it ready to ship to you.</p>
			<p>I understand a 1-year kit may be too much for you right now, so how about one more 3-Month Kit for $100.00 off?</p>
			<p>We can offer you this special one-time offer because the folks in our warehouse are already busy getting your order ready for shipment and it's easy for them to add another 3-Month kit to your package.</p>
			<p>I want to do everything I can to help you build your food stockpile as quickly and easily as possible, so to thank you for becoming a customer today, <strong>I am offering you an exclusive $100.00 discount on another 3-Month Food4Patriots Kit if you act now</strong>. That drops the price to only $397 (plus you'll get Free Shipping plus all the other Free bonuses included with the 3-Month Kit).</p>
			<p><?php echo $firstName;?>, please accept this opportunity to get an additional 3-Month Food4Patriots Kit for only $397 and save $100 today. Just click on the big orange "<strong>Click To Accept</strong>" button below.</p>
		</div>
		<div>
			<?php
			if($isUpgrade) {
				?>
				<div class="text-center">
					<a href="/order/<?php echo $productDataObj->productId;?>" title="Add to Order!"><img class="img-responsive center-block" src="/assets/images/buttons/btn-orange-click-accept-01.jpg" alt="Buy It Now!" border="0" /><strong style="font-size: 20px;"><span class="darkRedStrike">Add To Cart - $497</span><br>Add To Cart - $397</strong></a>
				</div>
				<?php
			} else {
				?>
				<div class="text-center">
					<a href="/checkout/process.php" title="Add to Order!"><img class="img-responsive center-block" src="/assets/images/buttons/btn-orange-click-accept-01.jpg" alt="Buy It Now!" border="0" /><strong style="font-size: 20px;"><span class="darkRedStrike">Add To Cart - $497</span><br>Add To Cart - $397</strong></a>
				</div>
				<?php
			}
			?>
			<div class="text-center" style="margin-top:20px;font-size: 20px"><strong>OR</strong></div>
			<div style="font-size: 20px" class="noThanks">
				<a href="<?php echo $declineUrl;?>">No Thanks</a> – I want to give up this opportunity.<br class="hidden-xs"> I understand that I will not receive this<br class="hidden-xs"> special offer again.
			</div>
		</div>
	</div>

<?php include_once("template-bottom.php"); ?>