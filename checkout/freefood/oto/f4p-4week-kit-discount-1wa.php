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
$funnelData = $productObj->initFunnel("F4P-OTO-4WK-1WA-DIS");
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
				<h1 class="darkRed text-center"><?php echo $firstName;?>, <span class="titles">Add A 4-Week Food<br class="hidden-xs"> Kit Today And Save $50.00?</span></h1>
			</div>
			<div style="padding-bottom:20px;"><img class="img-responsive center-block" src="/media/images/f4p/f4p-4-week-kit-07.jpg" alt="4 Week Food4Patriots Kit"/></div>
			<div>
				<p><?php echo $firstName;?>, congratulations for making the great decision to get the Food4Patriots 1-week kit.</p>
				<p>You&rsquo;ve taken an important step today to take charge, be more self-reliant and protect your family. I know you&rsquo;re going to sleep easier at night. The folks in our warehouse have reserved your order and they are already busy getting it ready to ship to you in <?php echo $shippingCity;?>.</p>
				<p>But before you move on, I've got a <strong>special one-time offer</strong> for you... </p>
				<p>A lot of folks have told me that while they love having the 1-week kit on hand, they know that it&rsquo;s simply not enough food… especially given the scary state of affairs in this country and the constant threat of natural disasters.</p>
				<p>I want to do everything I can to help you build your food stockpile as quickly and easily as possible, so to thank you for becoming a customer today, I am offering you an <strong>exclusive</strong> <strong>$50.00 discount (that&rsquo;s 25% off) on the 4-week food supply kit</strong> <strong>if you act now</strong>.</p>
				<p>But this special sale offer is only for customers who have already purchased our Food4Patriots 1-week kit. If you&rsquo;re seeing this, then good news, you qualify!</p>
				<p><?php echo $firstName;?>, would you like to accelerate your results by adding the 4-week Food4Patriots Kit to your order at a one-time discount sale price of $147 (that&rsquo;s a $50.00 discount and 25% off the already low price)?</p>
				<p class="text-center read-warning" style="max-width:100%;">Note: 72% of the people who see this page accept this special offer.</p>
				<?php
				if($isUpgrade) {
					?>
					<p class="text-center"><a href="/order/<?php echo $productDataObj->productId;?>" title="Add to Order!"><img src="/assets/images/buttons/btn-orange-click-accept-01.jpg" alt="Add To Order!" class="img-responsive center-block" /><strong style="font-size: 20px;"><span class="darkRedStrike">Add To Cart - $397</span><br>Add To Cart - $147</strong></a></p>
					<?php
				} else {
					?>
					<p class="text-center"><a href="/checkout/process.php" title="Add to Order!"><img src="/assets/images/buttons/btn-orange-click-accept-01.jpg" alt="Add To Order!" class="img-responsive center-block" /><strong style="font-size: 20px;"><span class="darkRedStrike">Add To Cart - $397</span><br>Add To Cart - $147</strong></a></p>
					<p class="text-center"><i>Click the button above if <a href="/checkout/process.php" title="Add to Order!" onClick=""><u>you're ready to accept the special offer now</u></a>, or read the rest of the page below and accept or decline the offer at the bottom of the page.</i></p>
					<?php
				}
				?>

				<?php include("f4p-4week-glenbeck.html");?>

				<div class="text-center"><img src="/media/images/f4p/f4p-testimonials-06.png" class="img-responsive center-block" alt="Testimonial"/></div>

				<?php include("f4p-4week-whatsincluded.html");?>

				<h2 class="darkRed text-center">Get FREE Shipping And Handling!</h2>
				<p><img src="/media/images/misc/free-shipping-burst-02.jpg" alt="FREE Shipping" width="181" class="pull-left">You&rsquo;ll get FREE Shipping and Handling on your 4-week Food4Patriots Kit when you upgrade today!</p>
				<p>Because we're already going to be sending you our 1-week kit to your address in <?php echo $shippingCity;?>, we can add the 4-week kit to the shipping box and save on fulfillment costs.</p>
				<p>Sure, the fact is that it DOES cost more in postage to ship you a much heavier box, but it&rsquo;s still a lot more efficient than sending 2 separate boxes. Everybody loves FREE Shipping and I want to pass along the savings to YOU to make it even easier to upgrade. </p>

				<h2 class="darkRed text-center">You Are 100% Protected By My<br class="hidden-xs"> Outrageous Double Guarantee</h2>
				<div class="outLineBoxDarkBlue">
					<p><img style="padding-right: 10px;"src="/media/images/misc/seal-guarantee-satisfaction.jpg" alt="Guarantee #1" class="pull-left img-responsive media margin-t-20"><h3>Guarantee #1:</h3> This is a 100% money back guarantee. No questions asked. If for any reason you&rsquo;re not satisfied with your Food4Patriots kit, just return it within 365 days of purchase and I&rsquo;ll refund 100% of your purchase price. If you try it and decide it&rsquo;s not as delicious and nutritious as I promised, you can have your money back for any reason, or no reason whatsoever. So there&rsquo;s absolutely no risk for you. You literally can&rsquo;t lose!</p>
					<div class="clearfix"></div>
				</div>
				<div class="outLineBoxDarkBlue">
					<p><img style="margin-bottom: 40px;padding-right: 10px;" src="/media/images/misc/seal-guarantee-money.jpg" alt="Guarantee #2" class="pull-left img-responsive media margin-t-20">
					<h3>Guarantee #2:</h3> This is an unheard of 300% money back guarantee. It&rsquo;s in addition to guarantee #1. If you open any
					of your Food4Patriots meals anytime <strong>in the next 25 years</strong> and find that your food has spoiled or gone bad, you
					can return your entire Food4Patriots stockpile and I will <strong>triple</strong> your money back!</p>

					<p>That&rsquo;s how confident I am that this food will remain just as delicious and nutritious for the next 25 years as it is
						on the day you buy it. Some of my friends said I was crazy to offer this double guarantee, but to be honest I&rsquo;m not
						really worried about it, because I am so confident you&rsquo;re going to see the value in your Food4Patriots kit as soon
						as you have it in your hands.</p>
				</div>

				<h2 class="darkRed text-center"><?php echo $firstName;?>, Get On The ‘Fast Track’ –<br class="hidden-xs"> Claim Your 4-Week Food4Patriots Kit<br class="hidden-xs"> For $50.00 Off Right Now! </h2>
				<p>Now I understand that the 4-week Food4Patriots kit is the right choice for most people. This kit normally sells for $197, but because you&rsquo;ve already taken the first step by getting the 1-week kit, and because I appreciate you putting your trust in us by being a customer, you can add the 4-week Food4Patriots kit today for just $147.</p>
				<p>That&rsquo;s $50.00 – a massive 25% savings – off the already-discounted price. </p>
				<p>I was only able to secure a limited quantity of these 4-week Food4Patriots kits and it&rsquo;s been our most popular upgrade, so I don&rsquo;t know how long I&rsquo;m going to have them available. To make sure that you don&rsquo;t miss out on getting yours, go ahead and click the big orange &ldquo;<strong>Click To Accept</strong>&rdquo; button below to add the 4-week Food4Patriots kit to your order today!</p>
				<p>The 4-week Food4Patriots kit will help secure your stockpile faster and protect you and your family from whatever crisis may come. You&rsquo;ll be on the &ldquo;fast track&rdquo; to securing your food stockpile.</p>
				<p><?php echo $firstName;?>, this is your last chance for this special one-time discount, so you need to act now. To get the 4-week Food4Patriots kit at $50.00 less than everybody else pays (that&rsquo;s 25% off), click the big orange &ldquo;<strong>Click To Accept</strong>&rdquo; button below.</p>
				<div>
					<?php
					if($isUpgrade) {
						?>
						<a name="upgrade-form"></a>
						<div class="text-center">
							<a href="/order/<?php echo $productDataObj->productId;?>" title="Add to Order!"><img class="img-responsive center-block" src="/assets/images/buttons/btn-orange-click-accept-01.jpg" alt="Buy It Now!" border="0" /><strong style="font-size: 20px;"><span class="darkRedStrike">Add To Cart - $397</span><br><u>Add To Cart - $147</u></strong></a>
						</div>
						<?php
					} else {
						?>
						<div class="text-center">
							<a href="/checkout/process.php" title="Add to Order!"><img class="img-responsive center-block" src="/assets/images/buttons/btn-orange-click-accept-01.jpg" alt="Buy It Now!" border="0" /><strong style="font-size: 20px;"><span class="darkRedStrike">Add To Cart - $397</span><br><u>Add To Cart - $147</u></strong></a>
						</div>

						<?php
					}
					?>
					<div class="text-center" style="margin-top:20px;"><strong>OR</strong></div>
					<div class="noThanks">
						<a href="<?php echo $declineUrl;?>">No Thanks</a> – I want to give up this opportunity.<br class="hidden-xs"> I understand that I will not receive this<br class="hidden-xs"> special offer again.
					</div>
				</div>
			</div>
		</div>

<?php include_once("template-bottom.php"); ?>