<?php
$firstName = $_SESSION["customerDataArray"]["firstName"];
// SET PRODUCT ID
$_SESSION['productId'] = 142; //please keep as an integer
$_SESSION['quantity'] = '1';
$_SESSION['upsell'] = TRUE; //must stay a boolean
$_SESSION['pageReturn'] = '/checkout/order.php';
include_once("Product.php");
$productDataObj = $productObj->getProduct($_SESSION["productId"]);
include_once("agile/template-top.php");
include_once ('template-header.php'); /*Add template-header-nav.php to add top menu*/
?>

<div class="container-main">
	<div class="breadcrumb1">
		<a>CHECKOUT</a>
		<a class="current">ORDER CUSTOMIZATION</a>
		<a>ORDER CONFIRMATION</a>
	</div>
<div class="container oto-width">
		<div>
			<h1 class="darkRed text-center">Was It The Price?</span></h1>
		</div>
		<div id="videobox" class="hidden-xs">
			<iframe src="//fast.wistia.net/embed/iframe/l4yipw8viz?videoFoam=false" allowtransparency="true" frameborder="0" scrolling="no" class="wistia_embed" name="wistia_embed" allowfullscreen mozallowfullscreen webkitallowfullscreen oallowfullscreen msallowfullscreen width="640" height="359"></iframe><script src="//fast.wistia.net/assets/external/iframe-api-v1.js"></script>
		</div>
		<div>
			<p><?php echo $firstName;?>, people often email me, letting me know they want to grab their Liberty Seed Vault (before it's too late).  The only reason they didn't is because of the price.  I don't think price should EVER get in the way of your family's security.</p>
			<p>So here's the deal...  I'm offering you a payment plan on the Liberty Seed Vault... just $23.50 today plus 1 more payment of $23.50 thirty days from today. It's the exact same Liberty Seed Vault, and I'll ship it to you right away (I know you're good for the  additional payment).</p
		</div>
		<div><img src="/media/images/ss4p/ss4p-lsv-spread-01.jpg" alt="Survival Seeds" class="img-responsive center-block" /></div>
		<div class="darkRed text-center h3">$23.50 Today Plus 1 More Payment Of $23.50 In 30 Days</div>
		<div>
			<div class="text-center">
				<a href="/checkout/process.php" title="Add to Order!"><img class="img-responsive center-block" src="/assets/images/buttons/btn-orange-click-accept-01.jpg" alt="Buy It Now!" border="0" /></a>
			</div>

			<div class="text-center" style="margin-top:20px;"><strong>OR</strong></div>

			<div class="noThanks">
				<a href="/checkout/oto/f4p-messenger-trial.php">No Thanks</a> – I want to give up this opportunity. I understand that I will not receive this special offer again.
			</div>
		</div>  

  </div>
</div>


<?php include_once("template-bottom.php"); ?>