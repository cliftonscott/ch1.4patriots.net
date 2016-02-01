<?php
if($_GET["upgrade"] == 1 ) {
	$isUpgrade = TRUE;
}
if(($isUpgrade !== TRUE) && (!empty($_SESSION["customerDataArray"]["firstName"]))) {
	$firstName = $_SESSION["customerDataArray"]["firstName"];
	$_SESSION['upsell'] = TRUE; //must stay a boolean
} else {
	$firstName = "Fellow Patriot";
}
// SET PRODUCT ID
$_SESSION['productId'] = 174; //please keep as an integer
$_SESSION['quantity'] = '1';
$_SESSION['upsell'] = TRUE; //must stay a boolean
$_SESSION['pageReturn'] = '/checkout/order.php';
include_once("Product.php");
$productObj = new Product();
$productDataObj = Product::getProduct($_SESSION["productId"]);
$funnelData = $productObj->initFunnel("F4P-OTO#3-3D-PPG-GEN-PAY");
$declineUrl = $funnelData["declineUrl"];

//check for inventory supply for Lion Energy Products
$productId = $_SESSION['productId'];
include_once("Inventory.php");
$inventoryObj = new Inventory();
$isLion = $inventoryObj->isLion($productId);
if($isLion) {
	$hasAllInventory = $inventoryObj->hasAllInventoryByPid($productId);
	if($hasAllInventory === false) {
		header("Location: /checkout/thankyou.php");
		exit;
	}
}
include_once("agile/template-top.php");
include_once ('template-header.php'); /*Add template-header-nav.php to add top menu*/
?>
<script src="/js/audio.js"></script>
<script language="javascript">
	$(document).ready(function() {

		$("#optin-form").validate({
			rules: {
				check1: {
					required: true
				},
			},
			messages: {
		  check1: '<div class="warning-check"></div>',
		},
		submitHandler: function(form) {
		 //optIn(); 
		 form.submit();
		}
		});
		
	});
</script>
<div class="container-main">
	<div class="breadcrumb1">
		<a>CHECKOUT</a>
		<a class="current">ORDER CUSTOMIZATION</a>
		<a>ORDER CONFIRMATION</a>
	</div>
<div class="container oto-width">
		<div>
			<div>
				<audio id="frankPaymentsAudioSrc" src="/media/audio/ppg-generator-downsell-audio-01.mp3" preload="auto" autoplay></audio>
			</div>
			<img id="frankPaymentsAudioControl" class="audioControl" style="float:left;" src="/assets/images/misc/speaker_on.gif" onclick="toggleAudio('frankPayments');">
				<h1 class="darkRed text-center">Was It The Price?</h1>
		</div>
		<div>
			<p><?php echo $firstName;?>, I’ve had a number of anxious Patriots desperately reach out to me to secure their own Patriot Power Generator 1500 while I still had them in stock…but they just weren’t able to swing the upfront cost all at once. </p>
			<p>I don't think price should EVER get in the way of your family's security. So here's the deal - I'm offering you a payment plan on the Patriot Power Generator 1500 today. </p>
			<p>Just click the “Click to Accept” button below and I’ll ship your Patriot Power Generator 1500 (and all the bonuses you saw on the previous page) for just one payment of $997 today and another payment of $997 in 30 days.</p>
			<div style="padding-bottom:20px;"><img class="img-responsive center-block"src="/media/images/ppg/ppg-product-checkout-01.jpg" alt="Patriot Power Generator"/></div>
			<h3 class="text-center darkRed">$997 Today Plus $997 In 30 Days</h3>

		<div>
<?php
if($isUpgrade) {
?>
	<div class="text-center center-block">
		<a href="/order/<?php echo $productDataObj->productId;?>"><img src="/assets/images/buttons/btn-orange-click-accept-01.jpg" name="submit" class=" img-responsive center-block"/></a>
	</div>
	<?php
} else {
	?>
		<form action="/checkout/process.php" method="post" accept-charset="utf-8" id="optin-form">
			<div class="text-center center-block">
				<input type="image" src="/assets/images/buttons/btn-orange-click-accept-01.jpg" name="submit" class="img-responsive center-block" />
			</div>
				<input type="hidden" name="quantity" id="quantity" value="1">
			<div class="terms">
				<div style="margin-right:5px;float: left;">
					<input type="checkbox" id="check1" name="check1">
						<img src="/assets/images/misc/yes-01.jpg" width="74" height="34" alt="Yes">
				</div>
				<div style="line-height: 1.2;">I want to add the Patriot Power Generator 1500 to my order at the 1-time discount sale price of $997 today and $997 in 30 days. I will get FREE Shipping with my Generator, Solar Panel &amp; bonuses (a $200 value) as well as a 100% 365-day guarantee.</div>
				</div>

				<div class="text-center" style="margin-top:20px;"><strong>OR</strong></div>
	  </form>

	<?php
}
	?>
			<div class="noThanks">
				<a href="<?php echo $declineUrl;?>">No Thanks</a> – I want to give up this opportunity. I understand that I will not receive this special offer again.</div>
		</div>

	</div>
</div>


<?php include_once("template-bottom.php"); ?>