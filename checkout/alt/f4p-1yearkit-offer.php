<?php
/*
 * use session soldout multidimensional array to indicate sold out conditions and associated
 * variables
 */
//$_SESSION["soldout"]["flag"] = false; //this is the primary trigger
//$_SESSION["soldout"]["audio"] = null;
//$_SESSION["soldout"]["waitlist"] = false;
//if($_SESSION["soldout"]["flag"] !== true) {
//	$template["floatingTimer"] = 20; //minutes to pass to the timer / will not display if not greater than zero
//} else {
	$template["floatingTimer"] = 0; //minutes to pass to the timer / will not display if not greater than zero
//}


$template["formType"] = "customerForm"; //designates that this is a form using customer-form.php as included form
// SET PRODUCT ID
// THIS IS SET TO THE 3 MONTH KIT FOR DEFAULT
$_SESSION['productId'] = 40; //please keep as an integer
$_SESSION['quantity'] = 1;
$maxQuantity = 5;

include_once("Product.php");
//creates a product object that is available from every template
$productObj = new Product();
$productDataObj = $productObj->getProduct($_SESSION["productId"]);
$funnelData = $productObj->initFunnel("checkout");

//include template top AFTER the product information is set
include_once ('template-top.php');
?>
<?php include_once ('template-header.php'); /*Add template-header-nav.php to add top menu*/?> 

<div class="container-main">

<div id="content" style="display:block;">
<div class="container oto-width">
		<div><h1 class="darkRed text-center">Get The Brand-New 1-Year Food4Patriots Kit For $200.00 Off Plus FREE Shipping &amp; 27 FREE Bonus Gifts!</h1></div>
		<div class="text-center">
			<img class="img-responsive center-block" src="/media/images/f4p/f4p-1-year-kit-01.jpg" alt="Food4Patriots 1 Year Kit" style="margin-bottom:20px;">
			<span class="caption"><i>Save $200.00 when you order a 1-year kit,  plus get FREE Shipping, 4 FREE Survival Spring Personal Water Filters, 2 FREE brand-new Survival hard copy books, 4 FREE Liberty Seed Vaults, 4 FREE 11-in-1 Survival Tools and more!</i></span>
		</div>
		<div style="margin-top:50px;">
			<p>Even though the Year-End Fire Sale has ended, you can still purchase the Food4Patriots 1-year kit at a great discount.</p>
			<p>A lot of folks have told me that given the scary state of affairs in this country and the constant threat of natural disasters, they want more food. In fact, we have quite a few folks telling us, &ldquo;I&rsquo;ll take everything you&rsquo;ve got!&rdquo;</p>
			<p>I want to do everything I can to help you build your food stockpile as quickly and easily as possible, so to thank you for being a customer today, I am offering you an <strong>exclusive $200.00 discount</strong> on a 1-year Food4Patriots kit if you act now. But this special sale offer is ONLY for customers so if you&rsquo;re seeing this, then good news, you qualify!</p>
			<p>Plus I'll throw in <strong>FREE Shipping and 27 FREE bonus gifts worth $470.00 -- including 4 of the super-popular Survival Spring Personal Water Filters and over 22,000+ heirloom survival seeds</strong> -- just to make this a "no-brainer" for you!</p>
			<p>Would you like to accelerate your results by getting the 1-year Food4Patriots kit at a 1-time discount sale price of $1,997? (That&rsquo;s a $200.00 discount…you&rsquo;ll get 1 year&rsquo;s worth of food for just $1.11 per serving!)</p>
			<img class="img-responsive center-block" src="/media/images/f4p/f4p-testimonials-10.png" alt="L. Graeser's Testimonial" style="margin-bottom:20px;">
		</div>
</div>
<?php include("f4p-1year-glenbeck.html");?>
	<div style="text-align:center;">
		<a href="#" onclick="checkOut();"><img src="/assets/images/buttons/btn-green-add-to-cart-01.jpg" class="img-responsive center-block" alt="Add To Cart"></a>
	</div>
<?php include("f4p-1year-whatsincluded.html");?>
<div class="container oto-width">
	<h2 class="darkRed text-center">Check Out The Amazing FREE Bonuses You Can ONLY Get With The 1-Year Kit!</h2>
	<p>You’re going to get the “mother lode” of special bonuses that are ONLY available with the 1-year kit!</p>
</div>
<?php include("f4p-1year-bonus-survivalspring.html");?>
<?php include("f4p-1year-bonus-survivalbooks.html");?>
<?php include("f4p-1year-bonus-cards.html");?>
<div class="container oto-width">
	<h2 class="darkRed text-center">You Will Also Get FOUR More Sets Of All Of Your Original FREE Bonuses When You Take Advantage Of This Special Upgrade Offer! </h2>
	<p>Add to your own stockpile, keep at multiple locations or give to friends and loved ones so they can experience the same peace of mind. Your FREE bonuses include:</p>
</div>
<?php include("f4p-1year-bonus-seeds.html");?>
<?php include("f4p-1year-bonus-tool.html");?>
<?php include("f4p-1year-bonus-reports.html");?>

<div class="container oto-width">

			<h2 class="darkRed text-center">You Are 100% Protected By My Outrageous Double Guarantee.</h2>
			<div class="outLineBoxDarkBlue">
				<p><img src="/media/images/misc/seal-guarantee-satisfaction.jpg" alt="Guarantee #1" class="pull-left img-responsive media margin-t-20">
					<h3>Guarantee #1:</h3> This is a 100% money back guarantee. No questions asked. If for any reason, you&rsquo;re not 
					satisfied with your Food4Patriots kit, just return it within 60 days of purchase and I&rsquo;ll refund 100% of your purchase 
					price. If you try it and decide it&rsquo;s not as delicious and nutritious as I promised, you can have your money back for 
					any reason or no reason whatsoever. So there&rsquo;s absolutely no risk for you. You literally can&rsquo;t lose!</p>
				<div class="clearfix"></div>
			</div>

			<div class="outLineBoxDarkBlue">
				<p><img src="/media/images/misc/seal-guarantee-money.jpg" alt="Guarantee #2" class="pull-left img-responsive media margin-t-20">
				<h3>Guarantee #2:</h3> This is an unheard of 300% money back guarantee. It&rsquo;s in addition to guarantee #1. If you open any 
				of your Food4Patriots meals anytime <strong>in the next 25 years</strong> and find that your food has spoiled or gone bad, you 
				can return your entire Food4Patriots stockpile and I will <strong>triple</strong> your money back!</p>
				
				<p>That&rsquo;s how confident I am that this food will remain just as delicious and nutritious for the next 25 years as it is 
					on the day you buy it. Some of my friends said I was crazy to offer this double guarantee, but to be honest I&rsquo;m not 
					really worried about it, because I am so confident you&rsquo;re going to see the value in your Food4Patriots kit as soon 
					as you have it in your hands.</p>
			</div>

			<div><img class="img-responsive center-block" src="/media/images/f4p/f4p-testimonials-09.png" width="626" height="269" alt="Stacy's Testimonial"></div>

			<h2 class="darkRed title-max-600 center-block text-center">Get On The ‘Fast Track’ - Claim Your 1-Year
				Food4Patriots Kit For $1000.00 Off Right Now!</h2>

			<p>Now I understand that the 1-year Food4Patriots kit is the right choice for folks who are looking for the ultimate in food security. This kit plus all the bonuses is valued at over $3,000, but because you&rsquo;ve already taken the 1st step, and because I appreciate you putting your trust in us by being a customer, you can get your 1-year Food4Patriots kit today for just $1,997.</p>
				
			<p>You get a year&rsquo;s worth of delicious survival food for $1.11 per serving!</p>
			
			<p>Plus I'll throw in 27 FREE bonus gifts worth $800+ -- including 4 of the super-popular Survival Spring Personal Water Filters and over
				22,000+ heirloom survival seeds -- just to make this a "no-brainer" for you!</p>
				
			<p>I was only able to secure a limited quantity of these 1-year Food4Patriots kits and it&rsquo;s been one of our most frequent requests,
				so I don&rsquo;t know how long I&rsquo;m going to have them available. To make sure that you don&rsquo;t miss out on getting yours, 
				go ahead and click the big orange &ldquo;Click Here To Accept&rdquo; button below to add the 1-year Food4Patriots kit to your order
				today!</p>
				
			<p>The 1-year Food4Patriots kit will help secure your stockpile faster and protect you and your family from whatever crisis may come.
				You&rsquo;ll be on the &ldquo;fast track&rdquo; to securing the ultimate food stockpile.</p>
				
			<p>This is your last chance for this special 1-time discount, so you need to act now. To get your 1-year
				Food4Patriots kit at $1000.00 off, click the big green &ldquo;Add To Cart&rdquo; button below.</p>

			<div>
				<div><img class="img-responsive center-block" src="/media/images/f4p/f4p-1-year-kit-01.jpg"  alt="Food4Patriots 1 Year Kit"/></div>
				<div><img class="img-responsive center-block" src="/media/images/f4p/f4p-1year-value-chart-01.jpg" alt="Value Chart"/></div>
				<div class="text-center"><h2 id="save" class="darkRed">Act Today And Save Over $1000</h2></div>

				<a id="accept"></a>

				<div style="text-align:center;">
					<a href="#" onclick="checkOut();"><img src="/assets/images/buttons/btn-green-add-to-cart-01.jpg" class="img-responsive center-block" alt="Add To Cart"></a>
				</div>
				<div style="margin-top:20px;"><img class="img-responsive center-block"  src="/media/images/f4p/f4p-testimonials-07.png" alt="Food4Patriots Testimonial"></div>
				<div><img class="img-responsive center-block" src="/media/images/f4p/f4p-testimonials-02.png" alt="Food4Patriots Testimonial"></div>
			</div>
</div>
</div>

<!-- START ORDER FORM SECTION -->
<div id="checkoutForm" class="container" style="display:none;">

	<div class="row">
	<div class="col-sm-6 col-md-7">

	<!--START CHOOSE PRODUCT ACCORDIAN-->
	<div id="checkoutMenu" class="row">
		<div class="col-lg-12">
			<div class="panel-group" id="accordion">
				<div id="initial" class="panel panel-default">
					<a data-toggle="collapse" data-parent="#accordion" href="#chooseProductThree">
					<div class="panel-heading">
					<h4 class="panel-title">
						<div>1-Year Food Supply - $1997 <span class="gray13">($1.11/day)</span><span class="label label-primary pull-right hidden-xs hidden-sm"><i class="fa fa-check"></i> FREE SHIPPING!</span></div>
					</h4>
					</div>
					</a>
					<div id="chooseProductThree" class="panel-collapse collapse in">
						<div class="panel-body">
						<a href="#info" onclick="showProductModal()"><img src="/media/images/f4p/f4p-1-year-kit-02.jpg" class="img-responsive center-block"></a>
						<div class="nopadding">
							<div class="row">    
								<div class="col-sm-12 col-md-6 nopadding">
								  <div class="productList">
									<p class="text-center red17"><strong>1-Year Food <br>
								    Supply Includes:</strong></p>
									  <ul>
										<li>1,800 Servings <a href="#info" id="1yrPopover" rel="popover"  data-placement="bottom" data-toggle="tooltip" class="hidden-xs"><i class="fa fa-info-circle"></i></a></li>
										<li><strong>FREE</strong> Shipping</li>
										<li><strong>4 FREE</strong> Survival Tools <a href="#info" id="toolPopover" rel="popover"  data-placement="bottom" data-toggle="tooltip" class="hidden-xs"><i class="fa fa-info-circle"></i></a></li>
										<li><strong>4 FREE</strong> Seed Vaults <a href="#info" id="seedsPopover" rel="popover"  data-placement="bottom" data-toggle="tooltip" class="hidden-xs"><i class="fa fa-info-circle"></i></a></li>
										<li><strong>4 FREE</strong> <span style="letter-spacing:-.5px;">Survival Spring Filters <a href="#info" id="strawPopover" rel="popover"  data-placement="bottom" data-toggle="tooltip" class="hidden-xs"><i class="fa fa-info-circle"></i></a></span></li>
										<li><strong>FREE</strong> Playing Cards</li>
									  </ul>
									</div>
								</div> 
								<div class="col-sm-12 col-md-6 nopadding">
								  <div class="productList">
									<p class="text-center red17"><strong>FREE Hard Copy <br>
								    Bonus Reports</strong></p>
										<ul>
											<li>Survival 101: How to Bug Out</li>
											<li>Survive Urban Chaos</li>
											<li>10 Items Sold Out After Crisis</li>
											<li>Water Survival Guide</li>
											<li>How to Cut Your Grocery Bills</li>
											<li>Survival Garden Guide</li>
										</ul>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12">
									<p><strong>When you order Food4Patriots, you get:</strong></p>
									<ul>
										<li><strong>Great Tasting Food That&rsquo;s Easy To Prepare</strong> - Just Add Boiling Water, Simmer, And Serve In Less Than 20 Minutes!</li>
										<li><strong>&ldquo;Disaster-Proof&rdquo; Packaging</strong> - Mylar Pouches Keep Out Air, Moisture And Light To Keep The Food Nutritionally Sound And Tasting Great For Up To 25 Years.</li>
										<li><strong>Nutritional Value</strong> - Meets The Highest Standard Of The Long-Term Food Reserve Industry. Each Product Serving Is An Entire Cup For Children And Adults Alike. No Half-Size &ldquo;Kid Portions&rdquo; Here!<br></li>
										<li><strong>Minimal Storage Space</strong> - Our Kits Are More Compact Than Traditional Food Storage Systems And Allow You To Discreetly Save And Store In Less Space.</li>
									</ul>
								</div>
							</div>
						</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div> <!--END CHOOSE PRODUCT ACCORDIAN-->

	</div>

	<div class="col-sm-6 col-md-5">
		<div style="padding-top: 0px; */">
			<div class="row">
				<div class="col-lg-12">
					<?php include_once ('customer-form.php'); ?>
				</div>
			</div>
		</div>
	</div>
	</div>

	<div class="guaranteeBox">
		<p><img src="/assets/images/checkout/satisfaction-seal-02.png" alt="Frank" width="150" height="180" class="img-responsive pull-left"><strong><span class="brightBlue">Guarantee #1:</span></strong> This is a <strong>100% money back guarantee</strong>. No questions asked. If for any reason, you&rsquo;re not satisfied with your Food4Patriots kit, just return it within 60 days of purchase and I&rsquo;ll refund 100% of your purchase.            </p>
		<p>&nbsp;</p>
		<p><strong><span class="brightBlue">Guarantee #2:&nbsp;</span></strong>This is an unheard of 300% money back guarantee. It&rsquo;s in addition to guarantee #1.&nbsp;If you open any of your Food4Patriots meals anytime&nbsp;<strong>in the next 25 years</strong>&nbsp;and find that your food has spoiled, you can return your entire Food4Patriots stockpile and I will&nbsp;<strong>triple</strong>&nbsp;your money back!</p>       
	<div class="clearfix"></div>
	</div>

	<hr>

</div> 
<script>
function checkOut(){
	document.getElementById("content").style.display='none';
	document.getElementById("checkoutForm").style.display='block';
}
$('#initial').find('.panel-heading').addClass("active-panel");
$('#accordion > .panel').on('show.bs.collapse', function (e) {
		$(this).find('.panel-heading').addClass("active-panel");
});
$('#accordion > .panel').on('hide.bs.collapse', function (e) {
		$(this).find('.panel-heading').removeClass('active-panel');
});
	$(document ).ready(function () {
		$("#1yrPopover").popover({
			html:true,
			trigger: 'hover',
			title:"1-Year Kit May Include:",
			content: function() {
				return $('#1yr').html();
			},
		});

	});
	$(document ).ready(function () {
		$("#strawPopover").popover({
			html:true,
			trigger: 'hover',
			title:"4 Survival Spring Personal Water Filters:",
			content: "<img src=/media/images/w4p/w4p-survivalspring-02.jpg>"
		});

	});
	$(document ).ready(function () {
		$("#toolPopover").popover({
			html:true,
			trigger: 'hover',
			title:"4 11-in-1 Survival Tool",
			content: "<img src=/media/images/bonuses/bonus-multi-tool-02.jpg>"
		});

	});
	$(document ).ready(function () {
		$("#seedsPopover").popover({
			html:true,
			trigger: 'hover',
			title:"4 Liberty Seed Vaults",
			content: function() {
				return $('#lsv').html();
			},
		});

	});
</script>
<script>
	function showProductModal() {
		$('#productModal').modal('show');
	}
	function hideProductModal() {
		$('#productModal').modal('hide');
	}
</script>
<div id="productModal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="glyphicon glyphicon-remove-circle" style="float:right;cursor:pointer;padding:10px;" onclick="hideProductModal();"></div>
			<img class="img-responsive center-block" src="/media/images/f4p/f4p-1-year-kit-03.jpg">
		</div>
	</div>
</div>
<div id="1yr" style="display:none;">
	<?php include_once("f4p-product-info-1yr.html"); ?>
</div>
<div id="lsv" style="display:none;">
	<?php include_once("f4p-product-info-seeds-bonus.html"); ?>
</div>
<?php include_once ('template-bottom.php'); ?>
