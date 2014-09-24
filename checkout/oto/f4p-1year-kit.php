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
$_SESSION['productId'] = 40; //please keep as an integer
$_SESSION['quantity'] = '1';

$_SESSION['pageReturn'] = '/checkout/order.php';
include_once("Product.php");
$productDataObj = Product::getProduct($_SESSION["productId"]);
include_once("template-top.php");
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
<script>
	function productChange(){
		  if ('<?php echo $customerDataObj->billingState;?>' == 'AZ') {
			taxrate = .0810;
			taxedstate = " AZ (8.10%) sales tax";
		  }else if ('<?php echo $customerDataObj->billingState;?>' == 'TN') {
			taxrate = .0925;
			taxedstate = ' TN (9.25%) sales tax';
		  }else {
			var taxrate = 0;
			taxedstate = '';
		  }
		  
		  price = 1997;
			e = document.getElementById("quantity");
			quant = e.options[e.selectedIndex].value;
			discount = 1000 * quant;
			$("#save").html('Act Today And Save Over $' + discount);
			subtot = price * quant;
			tax = taxrate * subtot;
			gtotal = tax + subtot;
			if (taxrate != 0){
			$("#terms").html('I want to add (' + quant + ') 1 Year Food4Patriots Kit to my order at the 1-time discount sale price of $' + subtot + ' plus $' + tax.toFixed(2) + taxedstate + ' for a total of $' + gtotal.toFixed(2) + '. I will get FREE Shipping and 27 FREE Bonus Gifts including 4 of the super-popular Lifestraw Personal Water Filters and over 22,000+ heirloom survival seeds per kit.');
			}else {
				$("#terms").html('I want to add (' + quant + ') 1 Year Food4Patriots Kit(s) to my order at the 1-time discount sale price of $' + gtotal.toFixed(0) + '. I will get FREE Shipping and 27 FREE Bonus Gifts including 4 of the super-popular Lifestraw Personal Water Filters and over 22,000+ heirloom survival seeds per kit.');
			}
			
	}
</script>
<div class="container-main">
	<div class="breadcrumb1">
		<a>CHECKOUT</a>
		<a class="current">ORDER CUSTOMIZATION</a>
		<a>ORDER CONFIRMATION</a>
	</div>
<div class="container oto-width">
		<div><h1 class="darkRed text-center"><?php echo $firstName;?>, Act Now And Save An Additional $1000 (Today Only)</h1>
		</div>
		<div id="videobox" class="hidden-xs">
			<iframe src="//fast.wistia.net/embed/iframe/p5l8v3n48p?videoFoam=true" allowtransparency="true" frameborder="0" scrolling="no" class="wistia_embed" name="wistia_embed" width="640" height="352"></iframe><script src="//fast.wistia.net/assets/external/iframe-api-v1.js"></script>
		</div>
		<div style="margin-top:50px;">
			<p><?php echo $firstName;?>, congratulations for making the great decision to get the 3-month Food4Patriots kit. </p>
			<p>You&rsquo;ve taken an important step today to take charge, be more self-reliant and protect your family. I know you&rsquo;re going to sleep easier at night. The folks in our warehouse have reserved your order and they are already busy getting it ready to ship to you in <?php echo $shippingCity;?>.</p>
		  <p>But before you move on, I've got a <strong>special 1-time offer</strong> for you... </p>
			<p>A lot of folks have told me that while they love having the 3-month kit on hand, they feel that it&rsquo;s simply not enough food… especially given the scary state of affairs in this country and the constant threat of natural disasters. In fact, we have quite a few folks telling us, &ldquo;I&rsquo;ll take everything you&rsquo;ve got!&rdquo;</p>
			<img class="img-responsive center-block" src="/media/images/f4p//f4p-testimonials-10.png" alt="L. Graeser's Testimonial" style="margin-bottom:20px;">
		</div>
		<div>
			<p>I want to do everything I can to help you build your food stockpile as quickly and easily as possible, so to thank you for becoming a customer today, I am offering you an&nbsp;<strong>exclusive $1000.00 discount on a ONE YEAR Food4Patriots kit if you act now</strong>. But this special sale offer is ONLY for customers so if you&rsquo;re seeing this, then good news, you qualify!</p>
			<p>Plus I'll throw in <strong>FREE Shipping and 27 FREE bonus gifts worth $470.00</strong> -- including 4 of the super-popular Lifestraw Personal Water Filters and over 22,000+ heirloom survival seeds -- just to make this a "no-brainer" for you!</p>
			<p><?php echo $firstName;?>, would you like to accelerate your results by adding the 1 Year Food4Patriots Kit to your order at a 1-time discount sale price of $1,997? (That&rsquo;s a $1,000.00 discount with all the free goodies…you&rsquo;ll get 1 year&rsquo;s worth of food for just $1.11 per serving!)</p>

		  <p class="text-center read-warning">Please read the rest of the page below and accept or decline the offer at the bottom of the page.</p>
	</div>
</div>
<?php include("f4p-1year-glenbeck.html");?>
<?php include("f4p-1year-whatsincluded.html");?>
<div class="container oto-width">
	<h2 class="darkRed text-center">Get FREE Shipping & Handling!</h2>

			<p><img src="/media/images/misc/free-shipping-burst-01.png" alt="FREE Shipping" width="181" height="104" class="pull-left">You&rsquo;ll get FREE Shipping &amp; Handling on your 1 Year Food4Patriots Kit when you upgrade today!</p>
			<p>Because we're already going to be sending you a 3-month kit, we can add the 1Year kit to the shipping box and save on fulfillment costs. Sure, the fact is that it DOES cost more in postage to ship you a much heavier box, but it&rsquo;s still a lot more efficient than sending 2 separate shipments. Everybody loves FREE Shipping and I want to pass along the savings to YOU to make it even easier to upgrade.</p>

	<h2 class="darkRed text-center">Check Out The Amazing FREE Bonuses<br>You Can ONLY Get With The 1 Year Kit!</h2>
	
	<p>You&rsquo;re going to get the &ldquo;mother lode&rdquo; of special bonuses  ONLY available with the 1 Year Kit!</p>
</div>
<?php include("f4p-1year-bonus-lifestraw.html");?>
<?php include("f4p-1year-bonus-survivalbooks.html");?>
<?php include("f4p-1year-bonus-cards.html");?>
<div class="container oto-width">
	<h2 class="darkRed text-center">You Will Also Get FOUR More Sets Of All Of Your Original FREE Bonuses When 
		You Take Advantage Of This Special Upgrade Offer! 
</h2>
	
	<p>Add to your own stockpile, keep at multiple locations or give to friends and loved ones so they can 
		experience the same peace of mind. Your FREE bonuses include:</p>
</div>
<?php include("f4p-1year-bonus-seeds.html");?>
<?php include("f4p-1year-bonus-tool.html");?>
<?php include("f4p-1year-bonus-reports.html");?>


<div class="container oto-width">


			<h2 class="darkRed text-center">You Are 100% Protected By My Outrageous Double Guarantee.</h2>
			<div class="outLineBoxDarkBlue">
				<p><img src="/media/images/misc/seal-guarantee-satisfaction.jpg" alt="Guarantee #1" width="250" height="189" class="pull-left img-responsive media">
					<h3>Guarantee #1:</h3> This is a 100% money back guarantee. No questions asked. If for any reason, you&rsquo;re not 
					satisfied with your Food4Patriots kit, just return it within 60 days of purchase and I&rsquo;ll refund 100% of your purchase 
					price. If you try it and decide it&rsquo;s not as delicious and nutritious as I promised, you can have your money back for 
					any reason or no reason whatsoever. So there&rsquo;s absolutely no risk for you. You literally can&rsquo;t lose!</p>
				<div class="clearfix"></div>
			</div>

			<div class="outLineBoxDarkBlue">
				<p><img src="/media/images/misc/seal-guarantee-money.jpg" alt="Guarantee #2" width="250" height="192" class="pull-left img-responsive media">
				<h3>Guarantee #2:</h3> This is an unheard of 300% money back guarantee. It&rsquo;s in addition to guarantee #1. If you open any 
				of your Food4Patriots meals anytime <strong>in the next 25 years</strong> and find that your food has spoiled or gone bad, you 
				can return your entire Food4Patriots stockpile and I will <strong>triple</strong> your money back!</p>
				
				<p>That&rsquo;s how confident I am that this food will remain just as delicious and nutritious for the next 25 years as it is 
					on the day you buy it. Some of my friends said I was crazy to offer this double guarantee, but to be honest I&rsquo;m not 
					really worried about it, because I am so confident you&rsquo;re going to see the value in your Food4Patriots kit as soon 
					as you have it in your hands.</p>
			</div>

			<div><img class="img-responsive center-block" src="/media/images/f4p/f4p-testimonials-09.png" width="626" height="269" alt="Stacy's Testimonial"></div>

			<h2 class="darkRed title-max-600 center-block text-center"><?php echo $firstName;?>, Get On The ‘Fast Track’ - Claim Your 1 Year
				Food4Patriots Kit For $1000.00 Off Right Now!</h2>

			<p>Now I understand that the 1 Year Food4Patriots kit is the right choice for folks who are looking for the ultimate in food security. This kit plus all the bonuses is valued at over $3,000, but because you&rsquo;ve already taken the 1st step, and because I appreciate you putting your trust in us by being a customer, you can get your 1 Year Food4Patriots kit today for just $1,997.</p>
				
			<p>You get a year&rsquo;s worth of delicious survival food for $1.11 per serving!</p>
			
			<p>Plus I'll throw in 27 FREE bonus gifts worth $800+ -- including 4 of the super-popular Lifestraw Personal Water Filters and over 
				22,000+ heirloom survival seeds -- just to make this a "no-brainer" for you!</p>
				
			<p>I was only able to secure a limited quantity of these 1 Year Food4Patriots kits and it&rsquo;s been one of our most frequent requests, 
				so I don&rsquo;t know how long I&rsquo;m going to have them available. To make sure that you don&rsquo;t miss out on getting yours, 
				go ahead and click the big orange &ldquo;Click Here To Accept&rdquo; button below to add the 1 Year Food4Patriots Kit to your order 
				today!</p>
				
			<p>The 1 Year Food4Patriots kit will help secure your stockpile faster and protect you and your family from whatever crisis may come. 
				You&rsquo;ll be on the &ldquo;fast track&rdquo; to securing the ultimate food stockpile.</p>
				
			<p><?php echo $firstName;?>, this is your last chance for this special 1-time discount, so you need to act now. To get your 1 Year 
				Food4Patriots kit at $1000.00 off, click the big orange &ldquo;Click Here To Accept&rdquo; button below.</p>

			<div>
				<div><img class="img-responsive center-block" src="/media/images/f4p/f4p-1-year-kit-01.jpg"  alt="Food4Patriots 1 Year Kit"/></div>
				<div><img class="img-responsive center-block" src="/media/images/f4p/value-chart-3.jpg" alt="Value Chart"/></div>
				<div class="text-center"><h2 id="save" class="darkRed">Act Today And Save Over $1000</h2></div>

				<a id="accept"></a>
				<?php
				if($isUpgrade) {
					?>
					<div style="text-align:center;">
						<a href="/order/<?php echo $productDataObj->productId;?>"><img src="/assets/images/buttons/btn-orange-click-accept-02.jpg" name="submit" class="img-responsive center-block" onClick="ga('send', 'event', 'upsell-2-f4p-1-yr-kit', 'f4p-1-yr-kit-accept', 'click-to-accept-bottom');"></a>
					</div>
					<?php
				} else {
				?>
				<form action="/checkout/process.php" method="post" accept-charset="utf-8" id="optin-form">
					<div style="text-align:center;">
						<input type="image" src="/assets/images/buttons/btn-orange-click-accept-02.jpg" name="submit" class="img-responsive center-block" onClick="ga('send', 'event', 'upsell-2-f4p-1-yr-kit', 'f4p-1-yr-kit-accept', 'click-to-accept-bottom');"/>
					</div>

					<div>
						<table  style="margin-right:auto;margin-left:auto;" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<td><div style="text-align: left;margin-right:10px;"><strong>Quantity:</strong></div></td>
								<td><span style="text-align:center;padding-top:10px;padding-bottom:10px;">
								<select name="quantity" id="quantity" style="width:50px;margin-top:3px;margin-bottom:3px;" onchange="productChange();">
								  <?php
								for ($i=1; $i<=5; $i++)
								  {
								  echo "<option>". $i . "</option>";
									  }
								 ?>
								</select>
								</span></td>
							</tr>
						</table>
					</div>

					<div style="position:relative;text-align:left;margin-top:10px;max-width:600px;margin-right:auto;margin-left:auto;">
						<div style="float:left;margin-right:5px;">
							<input type="checkbox" id="check1" name="check1">
							<img src="/assets/images/misc/yes-01.jpg" width="74" height="34" alt="Yes">
						</div>
						<div id="terms">I want to add the 1 Year Food4Patriots Kit to my order at the 1-time discount sale price of $1,997.
							I will get FREE Shipping and 27 FREE Bonus Gifts including 4 of the super-popular Lifestraw Personal Water Filters
							and over 22,000+ heirloom survival seeds
						</div>
					</div>
					<div style="margin-top:20px;">
						<img class="img-responsive center-block"  src="/media/images/f4p/f4p-testimonials-07.png" alt="Food4Patriots Testimonial">
					</div>
					<div>
						<img class="img-responsive center-block" src="/media/images/f4p/f4p-testimonials-02.png" alt="Food4Patriots Testimonial">
					</div>
					<div class="text-center" style="margin-top:20px;"><strong>OR</strong></div>
				</form>
					<?php
					}
					?>
				<div class="noThanks">
					<a href="/checkout/oto/f4p-1year-kit-payments.php">No Thanks</a> – I want to give up this opportunity.<br />I understand that I will not receive this special offer again.
				</div>
			</div>
</div>

<?php
include_once("template-bottom.php");