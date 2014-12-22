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
$_SESSION['productId'] = 40; //please keep as an integer
$_SESSION['quantity'] = 1;
$maxQuantity = 5;
include_once("Product.php");
$productObj = new Product();

//creates a product object that is available from every template
$productDataObj = $productObj->getProduct($_SESSION["productId"]);
$funnelData = $productObj->initFunnel("checkout");

//include template top AFTER the product information is set
include_once ('template-top.php');
$platform->setCsrOrderFormUrl("/checkout/1year-firesale/index.php");
?>
<?php include_once ('template-header.php'); /*Add template-header-nav.php to add top menu*/?>

<script src="/js/audio.js"></script>

<div class="container-main">

<div id="content" style="display:block;">
<div class="container oto-width">
		<div><h1 class="darkRed text-center">Get The Brand-New 1-Year Food4Patriots Kit For $200.00 Off Plus FREE Shipping &amp; 27 FREE Bonus Gifts!</h1></div>
		<div class="text-center">
			<img class="img-responsive center-block" src="/media/images/f4p/f4p-1-year-kit-01.jpg" alt="Food4Patriots 1 Year Kit" style="margin-bottom:20px;">
			<span class="caption"><i>Save $700.00 when you order a 1 Year Kit,  plus get FREE Shipping, 4 FREE Lifestraw Personal Water Filers, 2 FREE brand-new Survival hard copy books, 4 FREE Liberty Seed Vaults, 4 FREE 11-in-1 Survival Tools and more!</i></span>
		</div>
		<div style="margin-top:50px;">
			<p>Thank you for being a Food4Patriots customer! I hope that you love you love your Food4Patriots kit and have been sleeping easier at night knowing that you are more prepared for whatever may happen.</p>
			<p>I've got a special "customers only" offer for you...</p>
			<p>A lot of folks have told me that given the scary state of affairs in this country and the constant threat of natural disasters, they want more food. In fact, we have quite a few folks telling us, &ldquo;I&rsquo;ll take everything you&rsquo;ve got!&rdquo;</p>
			<p>I want to do everything I can to help you build your food stockpile as quickly and easily as possible, so to thank you for being a customer today, I am offering you an <strong>exclusive $200.00 discount</strong> on a ONE YEAR Food4Patriots kit if you act now. But this special sale offer is ONLY for customers so if you&rsquo;re seeing this, then good news, you qualify!</p>
			<p>Plus I'll throw in <strong>FREE Shipping and 27 FREE bonus gifts worth $470.00 -- including 4 of the super-popular Lifestraw Personal Water Filters and over 22,000+ heirloom survival seeds</strong> -- just to make this a "no-brainer" for you!</p>
			<p>Would you like to accelerate your results by getting the 1 Year Food4Patriots Kit at a 1-time discount sale price of $1,497? (That&rsquo;s a $700.00 discount…you&rsquo;ll get 1 year&rsquo;s worth of food for just $1.11 per serving!)</p>
			<img class="img-responsive center-block" src="/media/images/f4p/f4p-testimonials-15.jpg" alt="Erik's Testimonial" style="margin-bottom:20px;">
		</div>
</div>
<div class="container oto-width">
	<h2 class="darkRed text-center">Here Are 4 Reasons Why You Need To Get The One Year Food4Patriots Kit Right Now...</h2>
	<p><span class="numberCircle"><strong>1</strong></span><strong> You Need More Food To Protect You & Your Family </strong></p>
	<p>You need more food to feed your family if a natural disaster like Katrina or Sandy hits ... if a terrorist attack prevents trucks from hauling food… or if a panicked mob loots the grocery stores throughout . By stocking up on non-perishable food now, not only you will have your own “food insurance policy” no matter what happens, you’ll have enough to share with friends and loved ones so they can experience the same peace of mind.</p>
	<p><span class="numberCircle"><strong>2</strong></span><strong> You Can Barter Your Food In Times Of Crisis</strong></p>
	<p>In a time of crisis, your food will be literally more valuable than gold and you will be able to barter your extra food for whatever you need. When the crisis hits, stores will shut down, farmers won’t be able to feed their livestock, urban mobs will riot. Food will be incredibly valuable. Look at what happened in Germany after World War I, when a pound of bread cost 3 BILLION marks!</p>
	<p><span class="numberCircle"><strong>3</strong></span><strong> You Save $700.00 & Get FREE Shipping & Get 27 FREE Bonus Gifts Worth Over $800!</strong></p>
	<p>You will get a great deal if you act now! <?php echo $pagePurchasedProduct;?> It&rsquo;s a 1-time discount sale price of $1497 –  plus <strong>FREE</strong> Shipping plus 27 <strong>FREE</strong> gifts worth $800.00 (more details below) – but only if you act now.</p>
	<p><span class="numberCircle"><strong>4</strong></span><strong> Glenn Beck Endorses This Survival Food & 1-Year Kits Are Flying Off The Shelves!</strong></p>
	<p>Glenn Beck, the well-known talk-show host and outspoken radio personality, has endorsed Patriot Pantry, the meals in all Food 4 Patriots kits as THE emergency food kits he recommends for his OWN family. While we’re grateful for Glenn’s support, the phone has been ringing off the hook and we’ve barely been able to keep up with the demand his endorsement has generated. We can’t guarantee we’ll still have 1-year emergency food kits available so get yours TODAY while we still have them in stock!</p>
	<h2 class="darkRed text-center">Glenn Beck Uses THIS Survival Emergency Food to Protect His Own Family</h2>
	<div class="johnson-box-01">
		<div class="row">
			<div class="col-sm-12 col-md-12">
				<div class="pull-left hidden-xs" style="margin-right:25px;width:198px;">
					<img src="/media/images/f4p/f4p-glen-beck-07.png" width="198" height="198" alt="Glen Beck Food4Patriots" />
					<div style="font-size: 13px;">
						<div style="float:left;">
							<audio id="beckAudioSrc" src="/media/audio/f4p-beck-testimonial-02.mp3" preload="auto">Your browser does not support HTML5 Audio</audio>
						</div>
						<img id="beckAudioControl" src="/assets/images/misc/speaker_off.gif" class="audioControl" onclick="toggleAudio('beck');">Listen to Glenn.
					</div>
				</div>
				<div style="font-size: 25px; margin-top: 20px; font-weight: bold;line-height: 25px;margin-bottom: 30px;">&quot;How Long Would You Last If The Grocery Stores Ceased To Exist?&quot;</div>
				<p>Dear Friends,</p>
				<p>How long would you last if the grocery stores ceased to exist? </p>
				<p>I know this sounds like a crazy question but it&rsquo;s actually not. </p>
				<p>After Hurricane Sandy hit, grocery stores were closed, 1000s of people were without access to food and help from the government was painfully slow as it always is. </p>
				<p>Don&rsquo;t let it happen to you. You never know what tomorrow might bring.</p>
				<p>I&rsquo;d like to advise you to keep emergency food on hand and I recommend Patriot Pantry emergency survival food. That&rsquo;s what I have in my home to protect my family. </p>
				<p>These meals are delicious, nutritious, and rated for 25 years of storage so they&rsquo;re perfect today I would like you to try some for yourself. Do your own homework. Try it. Taste it. </p>
				<p>- Glenn Beck</p>
			</div>
		</div>
	</div>
</div>
	<div class="container oto-width">
		<h2 class="darkRed text-center">What's Included?</h2>

		<p>The 1 Year Food Supply kit provides one adult with a whopping 1,800 servings of healthy, delicious storable food, drinks and snacks for 12 months.</p>
		<p>Packaged in convenient and lightweight 4-serving Mylar pouches, our low-heat dehydrated food seals in the flavor and high-nutritional value. Simple and easy to prepare…. just boil water, pour in the food, simmer for 10 to 15 minutes and serve up a great meal.</p>

		<p>Here’s some of what’s included in your 1 Year Food4Patriots Kit:</p>
	</div>
	<div class="container-fluid oto-width">
		<div class="row text-center">
			<div class="col-xs-6 col-sm-4 col-md-4">
				<img class="img-responsive center-block thumbnail" src="/media/images/f4p/food/apple-cinnamon-oatmeal.jpg"  alt="Mountain Man Granola">
				<div class="caption">Apple Orchard Oatmeal <br>
					(128 servings)</div>
			</div>
			<div class="col-xs-6 col-sm-4 col-md-4">
				<img class="img-responsive center-block thumbnail" src="/media/images/f4p/food/creamy-potato-soup.jpg"  alt="Mountain Man Granola">
				<div class="caption">Granny's <span class="hidden-xs">Homestyle</span> Potato Soup (80 servings)</div>
			</div>
			<div class="col-xs-6 col-sm-4 col-md-4">
				<img class="img-responsive center-block thumbnail" src="/media/images/f4p/food/pasta-fagioli-soup.jpg"  alt="Traveler's Stew">
				<div class="caption">Traveler's Stew <br>
					(32 servings)</div>
			</div>
			<div class="col-xs-6 col-sm-4 col-md-4">
				<img class="img-responsive center-block thumbnail" src="/media/images/f4p/food/whey-milk2.jpg"  alt="Powdered Milk">
				<div class="caption">Powdered Milk <br>
					(320 servings)</div>
			</div>
			<div class="col-xs-6 col-sm-4 col-md-4">
				<img class="img-responsive center-block thumbnail" src="/media/images/f4p/food/chicken-noodle-soup.jpg"  alt="Independence Hall Chicken Noodle Soup">
				<div class="caption">Chicken Noodle <br>
					Soup (32 servings)</div>
			</div>
			<div class="col-xs-6 col-sm-4 col-md-4">
				<img class="img-responsive center-block thumbnail" src="/media/images/f4p/food/white-rice.jpg"  alt="White Rice">
				<div class="caption">Instant White Rice <br>
					(80 servings)</div>
			</div>
			<div class="col-xs-6 col-sm-4 col-md-4">
				<img class="img-responsive center-block thumbnail" src="/media/images/f4p/food/cheddar-broccoli-soup.jpg"  alt="Broccoli &amp; Cheese Soup">
				<div class="caption">Broccoli &amp; Cheese <br>
					Soup (32 servings)</div>
			</div>
			<div class="col-xs-6 col-sm-4 col-md-4">
				<img class="img-responsive center-block thumbnail" src="/media/images/f4p/food/heartland-mashed-potatoes.jpg"  alt="Heartland's Best Mashed Potatoes">
				<div class="caption">Heartland's Best Mashed <br>
					Potatoes (128 servings)</div>
			</div>
			<div class="col-xs-6 col-sm-4 col-md-4">
				<img class="img-responsive center-block thumbnail" src="/media/images/f4p/food/cheesy-chicken-rice-casserole.jpg"  alt="Blue Ribbon Cheesy Chicken Rice">
				<div class="caption">Blue Ribbon Cheesy Rice <br>
					(128 servings)</div>
			</div>
			<div class="col-xs-6 col-sm-4 col-md-4">
				<img class="img-responsive center-block thumbnail" src="/media/images/f4p/food/chocolate-pudding.jpg"  alt="Chocolate Pudding">
				<div class="caption">Chocolate Pudding<br>
					(120 servings)</div>
			</div>
			<div class="col-xs-6 col-sm-4 col-md-4">
				<img class="img-responsive center-block thumbnail" src="/media/images/f4p/food/potato-cheddar-soup.jpg"  alt="Liberty Bell Potato Cheddar Soup">
				<div class="caption">Liberty Bell Potato Cheddar <br>
					Soup (96 servings)</div>
			</div>
			<div class="col-xs-6 col-sm-4 col-md-4">
				<img class="img-responsive center-block thumbnail" src="/media/images/f4p/food/chicken-alfredo-pasta.jpg"  alt="Creamy Chicken Alfredo">
				<div class="caption"><span class="hidden-xs">Creamy</span> Chicken Alfredo<br>
					(80 servings)</span></div>
			</div>
			<div class="col-xs-6 col-sm-4 col-md-4">
				<img class="img-responsive center-block thumbnail" src="/media/images/f4p/food/beef-stroganoff.jpg"  alt="Creamy Beef Stroganoff">
				<div class="caption">Creamy Beef Stroganoff <br>
					(64 servings)</div>
			</div>
			<div class="col-xs-6 col-sm-4 col-md-4">
				<img class="img-responsive center-block thumbnail" src="/media/images/f4p/food/tropical-fruit-medley.jpg"  alt="Mixed Fruit Blend">
				<div class="caption">Mixed Fruit Blend<br>
					(64 servings)</div>
			</div>
			<div class="col-xs-6 col-sm-4 col-md-4">
				<img class="img-responsive center-block thumbnail" src="/media/images/f4p/food/white-cheddar-shells2.jpg"  alt="White Cheddar Pasta">
				<div class="caption">White Cheddar Pasta <br>
					(64 servings)</div>
			</div>

		</div>
		<p>Every time you eat one of these meals you can rest-assured you are eating healthy, delicious food
			and saving a lot of money. Your meals are as delicious and nutritious tonight as they will be in
			25 years.</p>
		<div class="rcBoxR15 center-block text-center">
			<div>
				<audio id="rolfAudioSrc" src="/media/audio/f4p-testimonial-06.mp3" preload="auto">Your browser does not support HTML5 Audio</audio>
			</div>
			<div class="pull-right"><img id="rolfAudioControl" class="audioControl pull-right" src="/assets/images/misc/speaker_off.gif" onclick="toggleAudio('rolf');"></div>
			<div class="center-block"><strong>&quot;Your food tastes great!&quot; <br>
					(Rolf K. Audio Testimonial) </strong></div>
			<div><img class="img-responsive center-block" src="/media/images/misc/img-play-to-listen.png" alt=""/>
			</div>
		</div>
	</div>
	<div class="container oto-width">
		<h2 class="darkRed text-center">Get FREE Shipping & Handling!</h2>
		<p><img src="/media/images/misc/free-shipping-burst-01.png" alt="FREE Shipping" width="181" height="104" class="pull-left">You&rsquo;ll get FREE Shipping &amp; Handling on your 1-Year Food4Patriots Kit when you upgrade today!</p>
		<p>Because we're already going to be sending you a 3-month kit, we can add the 1-Year kit to the shipping box and save on fulfillment costs. Sure, the fact is that it DOES cost more in postage to ship you a much heavier box, but it&rsquo;s still a lot more efficient than sending 2 separate shipments. Everybody loves FREE Shipping and I want to pass along the savings to YOU to make it even easier to upgrade.</p>
		<div style="text-align:center;">
			<a href="#" onclick="checkOut();"><img src="/assets/images/buttons/btn-green-add-to-cart-01.jpg" class="img-responsive center-block" alt="Add To Cart">Add to Cart - $1497</a>
		</div>
	</div>
<div class="container oto-width">
	<h2 class="darkRed text-center">Check Out The Amazing FREE Bonuses You Can ONLY Get With The 1 Year Kit!</h2>
	<p>You’re going to get the “mother lode” of special bonuses that are ONLY available with the 1 Year Kit!</p>
</div>
<?php include("f4p-1year-bonus-lifestraw.html");?>
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

			<div><img class="img-responsive center-block" src="/media/images/f4p/f4p-testimonials-16.jpg" alt="Peter's Testimonial"></div>

			<h2 class="darkRed title-max-600 center-block text-center">Get On The ‘Fast Track’ - Claim Your 1 Year
				Food4Patriots Kit Plus Bonuses For $1,500.00 Off Right Now! </h2>

			<p>Now I understand that the 1 Year Food4Patriots kit is the right choice for folks who are looking for the ultimate in food security. This kit plus all the bonuses is valued at over $3,000, but because you&rsquo;ve already taken the 1st step, and because I appreciate you putting your trust in us by being a customer, you can get your 1 Year Food4Patriots kit today for just $1,497.</p>
				
			<p>You get a year&rsquo;s worth of delicious survival food for less than $1.11 per serving!</p>
			
			<p>Plus I'll throw in 27 FREE bonus gifts worth $800+ -- including 4 of the super-popular Lifestraw Personal Water Filters and over 
				22,000+ heirloom survival seeds -- just to make this a "no-brainer" for you!</p>
				
			<p>I was only able to secure a limited quantity of these 1 Year Food4Patriots kits and it&rsquo;s been one of our most frequent requests, 
				so I don&rsquo;t know how long I&rsquo;m going to have them available. To make sure that you don&rsquo;t miss out on getting yours, 
				go ahead and click the big orange &ldquo;Click Here To Accept&rdquo; button below to add the 1 Year Food4Patriots Kit to your order 
				today!</p>
				
			<p>The 1 Year Food4Patriots kit will help secure your stockpile faster and protect you and your family from whatever crisis may come. 
				You&rsquo;ll be on the &ldquo;fast track&rdquo; to securing the ultimate food stockpile.</p>
				
			<p>This is your last chance for this special 1-time discount, so you need to act now. To get your 1 Year 
				Food4Patriots kit at $700.00 off, click the big green &ldquo;Add To Cart&rdquo; button below.</p>

			<div>
				<div><img class="img-responsive center-block" src="/media/images/f4p/f4p-1-year-kit-01.jpg"  alt="Food4Patriots 1 Year Kit"/></div>
				<div><img class="img-responsive center-block" src="/media/images/f4p/f4p-1year-value-chart-01.jpg" alt="Value Chart"/></div>
				<div class="text-center"><h2 id="save" class="darkRed">Act Today And Save Over $1000</h2></div>

				<a id="accept"></a>

				<div style="text-align:center;">
					<a href="#" onclick="checkOut();"><img src="/assets/images/buttons/btn-green-add-to-cart-01.jpg" class="img-responsive center-block" alt="Add To Cart">Add to Cart - $1497</a>
				</div>
				<div style="margin-top:20px;">
					<img class="img-responsive center-block"  src="/media/images/f4p/f4p-testimonials-07b.jpg" alt="Food4Patriots Testimonial">
				</div>
				<div>
					<img class="img-responsive center-block" src="/media/images/f4p/f4p-testimonials-17.jpg" alt="Food4Patriots Testimonial">
				</div>
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
						<div>1 Year Food Supply - $1497 <span class="gray13">($1.11/day)</span><span class="label label-primary pull-right hidden-xs hidden-sm"><i class="fa fa-check"></i> FREE SHIPPING!</span></div>
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
									<p class="text-center red17"><strong>1 Year Food <br>
								    Supply Includes:</strong></p>
									  <ul>
										<li>1,800 Servings <a href="#info" id="1yrPopover" rel="popover"  data-placement="bottom" data-toggle="tooltip" class="hidden-xs"><i class="fa fa-info-circle"></i></a></li>
										<li><strong>FREE</strong> Shipping</li>
										<li><strong>4 FREE</strong> Survival Tools <a href="#info" id="toolPopover" rel="popover"  data-placement="bottom" data-toggle="tooltip" class="hidden-xs"><i class="fa fa-info-circle"></i></a></li>
										<li><strong>4 FREE</strong> Seed Vaults <a href="#info" id="seedsPopover" rel="popover"  data-placement="bottom" data-toggle="tooltip" class="hidden-xs"><i class="fa fa-info-circle"></i></a></li>
										<li><strong>4 FREE</strong> LifeStraw Filters <a href="#info" id="strawPopover" rel="popover"  data-placement="bottom" data-toggle="tooltip" class="hidden-xs"><i class="fa fa-info-circle"></i></a></li>
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
			title:"1 Year Kit May Include:",
			content: function() {
				return $('#1yr').html();
			},
		});

	});
	$(document ).ready(function () {
		$("#strawPopover").popover({
			html:true,
			trigger: 'hover',
			title:"4 LifeStraw Personal Water Filters:",
			content: "<img src=/media/images/w4p/w4p-lifestraw-02.jpg>"
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
