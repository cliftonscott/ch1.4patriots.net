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
$_SESSION['productId'] = 22; //please keep as an integer
$_SESSION['quantity'] = '1';
$_SESSION['pageReturn'] = '/checkout/order.php';
include_once("Product.php");
$productObj = new Product();
$productDataObj = Product::getProduct($_SESSION["productId"]);
$funnelData = $productObj->initFunnel("F4P-OTO-4WK-3MA-DIS");
$declineUrl = $funnelData["declineUrl"];

include_once("template-top.php");
include_once ('template-header.php'); /*Add template-header-nav.php to add top menu*/
?>
<style>
	body{
		font-size: 20px;
	}
	p{
		font-size: 20px;
	}
</style>
	<script src="/js/audio.js"></script>
	<div class="container-main">
		<div class="breadcrumb1">
			<a>CHECKOUT</a>
			<a class="current">ORDER CUSTOMIZATION</a>
			<a>ORDER CONFIRMATION</a>
		</div>
		<div class="container oto-width">
			<div>
				<h1 class="darkRed text-center"><?php echo $firstName;?><span class="titles">, Want To Get Another 4-week kit For $50 Off? </span></h1>
			</div>
			<div style="padding-bottom:20px;"><img class="img-responsive center-block"src="/media/images/f4p/f4p-4-week-kit-07.jpg" alt="4 Week Food4Patriots Kit"/></div>
			<div>
				<p><?php echo $firstName;?>, once again, congratulations for making the great decision to get the 4-week Food4Patriots kit.</p>
				<p>I know you declined the previous offer of getting a 3-month Food4Patriots kit at $100 off. Maybe you felt the $397 was simply too much to invest in survival food at one time. I totally understand…but I also want to make sure I do everything I can to help you build your food stockpile as quickly and easily as possible.</p>
				<p>So to thank you for becoming a customer today, I am offering you an <strong>exclusive $50.00 discount (that’s 25% off)</strong> on an additional 4-week kit.</p>
				<p>That’s right, you can get ONE MORE 4-week Food4Patriots kit for just $147 if you act now.</p>
				<p>Look, I want to help you get where you need to be with your food stockpile…but without breaking the bank to get there.</p>
				<p>So fellow Patriot, would you like to accelerate your results by adding an additional 4-week Food4Patriots kit to your order at a one-time discount sale price of $147 (that’s a $50.00 discount and 25% off the already low price)?</p>
				<p class="text-center read-warning" style="max-width:100%;">Note: 72% of the people who see this page accept this special offer.</p>

				<?php
				if($isUpgrade) {
					?>
					<div class="text-center">
						<a href="<?php echo url("/order/" . $productDataObj->productId);?>" title="Add to Order!"><img class="img-responsive center-block" src="/assets/images/buttons/btn-orange-click-accept-01.jpg" alt="Buy It Now!" border="0" /></a>
					</div>
					<?php
				} else {
					?>

					<div class="text-center">
						<a href="<?php echo url("/checkout/process.php"); ?>" title="Add to Order!"><img class="img-responsive center-block" src="/assets/images/buttons/btn-orange-click-accept-01.jpg" alt="Buy It Now!" border="0" /></a>
					</div>


					<?php
				}
				?>
				<div class="text-center" style="margin-top:20px;"><strong>OR</strong></div>
				<div class="noThanks">
					<a href="<?php echo $declineUrl;?>">No Thanks</a> – I want to give up this opportunity. I understand that I will not receive this special offer again.
				</div>
			</div>
		</div>
	</div>

<?php include_once("template-bottom.php"); ?>