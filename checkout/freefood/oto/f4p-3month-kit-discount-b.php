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
// SET PRODUCT ID
$_SESSION['productId'] = 23; //please keep as an integer
$_SESSION['quantity'] = '1';
$_SESSION['upsell'] = TRUE; //must stay a boolean
$_SESSION['pageReturn'] = '/checkout/order.php';
//$_SESSION['nextPageOverride'] = '/checkout/thankyou.php'; // $nextPage set to 1 Year Kit in Product.php - Keeps From Looping
// Redirects If Already Offered 3 Month Discount
$_SESSION['3mDiscountSkip'] = TRUE;
include_once("Product.php");
$productObj = new Product();
$productDataObj = Product::getProduct($_SESSION["productId"]);
$funnelData = $productObj->initFunnel("F4P-OTO-2A-F4P-3MK");
$declineUrl = $funnelData["declineUrl"];
var_dump($funnelData);
include_once("template-top.php");
include_once ('template-header.php'); /*Add template-header-nav.php to add top menu*/
?>
	<script src="/js/audio.js"></script>
	<div class="container-main">
		<div class="breadcrumb1">
			<a>CHECKOUT</a>
			<a class="current">ORDER CUSTOMIZATION</a>
			<a>ORDER CONFIRMATION</a>
		</div>
		<div class="container oto-width">
			<div>
				<h1 class="darkRed text-center title-max-595 center-block">Get $100.00 Off Food4Patriots 3-Month Supply Plus FREE Shipping With This 1-Time Offer!</h1>
			</div>
			<div id="videobox" class="hidden-xs">
				<script type="text/javascript" src="https://reboot.evsuite.com/player/M21vdXBzZWxsMjI2MTVfY29tcHJlc3NlZC5tcDQ=/?container=evp-DCCKOWHMRF"></script><div id="evp-DCCKOWHMRF" data-role="evp-video" data-evp-id="M21vdXBzZWxsMjI2MTVfY29tcHJlc3NlZC5tcDQ="></div>
			</div>
			<div class="margin-tb-20">
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
			</div>
			<div>
				<p>You just got your own 4-week supply of food from Food4Patriots, and I'm super excited that you did.</p>
				<p>You've joined the ranks of people who aren't leaving their safety and their family's safety up to chance.</p>
				<p>And with the kind of shape our country is already in I don't blame you at all.</p>
				<p>I did notice one thing that I want to bring up just to make sure you're doing all you can.</p>
				<p>A lot of people have told me that getting their 4-week supply was a great first step, but they really wanted more. That 4 weeks was just their "starting point" and I get where they're coming from.</p>
				<p>4 weeks is really a *minimum* recommendation...</p>
				<p>I still really want you to help you get your food stockpile, protect your family and be more secure in these uncertain times. So as a <strong>special 1-time offer that is only valid while you are on this page, you can get Food4Patriots 3-month supply for $100.00 off, plus get FREE Shipping and 6 FREE Bonus Gifts</strong>, just for being a loyal customer.</p>
				<h2 class="darkRed text-center">Here Are 3 Reasons Why You Need To Get A 3-Month Food4Patriots Supply Right Now...</h2>
				<p><strong><span class="numberCircle">1</span> You Need More Food To Protect You &amp; Your Family </strong></p>
				<p>You need more food to feed your family if a natural disaster like Katrina or Sandy hits... if a terrorist attack prevents trucks from hauling food… or if a panicked mob loots the grocery stores... By stocking up on non-perishable food now, not only you will have your own &ldquo;food insurance policy&rdquo; no matter what happens, you&rsquo;ll have enough to share with friends and loved ones so they can experience the same peace of mind.</p>
				<p><strong><span class="numberCircle">2</span> You Can Barter Your Food In Times Of Crisis</strong></p>
				<p>In a time of crisis, your food will be literally more valuable than gold and you will be able to barter your extra food for whatever you need. When the crisis hits, stores will shut down, farmers won&rsquo;t be able to feed their livestock, urban mobs will riot. Food will be incredibly valuable. Look at what happened in Germany after World War One, when a pound of bread cost 3 BILLION marks! </p>
				<p><strong><span class="numberCircle">3</span> You Save Another $100.00 &amp; Get FREE Shipping </strong></p>
				<p>You will get the best deal we have ever offered (and may never offer again) if you act now! It’s a 1-time discount sale price of $397 for our 3-month kit – that’s <strong>another $100.00 discount off the already-low price</strong> – but only if you act now. This is the <strong>same exact 3-month kit (with the same free shipping and bonuses)</strong> that you just saw on the previous page at the full price of $497...but I'm knocking an extra $100 off today just to thank you for being a customer.</p>
				<p><span class="numberCircle"><strong>4</strong></span><strong> Glenn Beck Endorses This Survival Food & 3-Month Kits Are Flying Off The Shelves!</strong></p>
				<p>Glenn Beck, the well-known talk-show host and outspoken radio personality, has endorsed Patriot Pantry, the meals in all Food4Patriots kits as THE emergency food kits he recommends for his OWN family. While we’re grateful for Glenn’s support, the phone has been ringing off the hook and we’ve barely been able to keep up with the demand his endorsement has generated. We can’t guarantee we’ll still have 3-Month emergency food kits available so get yours TODAY while we still have them in stock!</p>

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
							<p>These meals are delicious, nutritious, and rated for 25 years of storage so they&rsquo;re perfect to stash in your pantry, car, or even office. Today I would like you to try some for yourself. Do your own homework. Try it. Taste it. </p>
							<p>- Glenn Beck</p>
						</div>
					</div>
				</div>
			</div>
			<div><img class="img-responsive center-block"src="/media/images/f4p/f4p-3-month-kit-02.jpg" alt="3 Month Kit"/></div>
			<div class="row">
				<div class="col-sm-12 col-md-1"></div>
				<div class="col-sm-12 col-md-5">
					<div class="productList">
						<p class="red17"><strong>3 Month Supply Includes:</strong></p>
						<ul>
							<li>450 Servings <a href="#info" id="3mkPopover" rel="popover"  data-placement="bottom" data-toggle="tooltip" class="hidden-xs"><i class="fa fa-info-circle"></i></a></li>
							<li><strong>FREE</strong> Shipping</li>
							<li><strong>FREE</strong> Survival Tool <a href="#info" id="toolPopover" rel="popover"  data-placement="bottom" data-toggle="tooltip" class="hidden-xs"><i class="fa fa-info-circle"></i></a></li>
							<li><strong>FREE</strong> Seed Vault <a href="#info" id="seedsPopover" rel="popover"  data-placement="bottom" data-toggle="tooltip" class="hidden-xs"><i class="fa fa-info-circle"></i></a></li>
						</ul>
					</div>
				</div>
				<div class="col-sm-12 col-md-5 nopadding">
					<div class="productList">
						<p class="red17"><strong>FREE Hard Copy Bonus Reports</strong></p>
						<ul>
							<li>10 Items Sold Out After Crisis</li>
							<li>Water Survival Guide</li>
							<li>How to Cut Your Grocery Bills</li>
							<li>Survival Garden Guide</li>
						</ul>
					</div>
				</div>
				<div class="col-sm-12 col-md-1"></div>
			</div>
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
			<div class="margin-t-20">
				<p>And don’t forget…when you order our Food4Patriots 3-month food supply, I’ll throw in 6 incredible bonuses absolutely FREE!</p>
				<p>First, I’ll automatically upgrade all four of your digital bonus reports included in your original order (10 Items Sold Out After Crisis, Water Survival Guide, How to Cut Your Grocery Bills, & the Survival Garden Guide) to full blown hard copies and ship directly to your door so you always have them ready when needed.</p>
				<div class="rcBoxR10">
					<h2 class="darkRed text-center">FREE Hard Copy Upgrades <br>To These Professionally Bound  Reports</h2>
					<div><img class="img-responsive center-block" src="/media/images/f4p/f4p-ebook-bonus-01.jpg" alt="Bonus 1" width="550" height="207" ></div>
				</div>
				<p>Next, I want to help you get to the next level of food independence and to do that I'm going to throw in one of my Liberty Seed Vaults.</p>
				<div class="rcBoxR10">
					<h2 class="darkRed text-center">FREE Liberty Seed Vault</h2>
					<p>More than 5,640 survival seeds from 22 varieties of hardy and delicious heirloom seeds passed down from our forefathers. No GMO crap or hybrids here. Sealed in an airtight container rated for 5+ years of storage.</p>
					<p>All the seeds are re-harvestable and can be re-grown over and over again giving you 1000's of pounds of fresh, nutrient dense food… for literally pennies per pound. Enough to last your family a lifetime.</p>
					<p>These survival seeds are the perfect companion to your survivalfood stockpile. Some companies charge over $200 for seeds that don't even come close to the quality I'm giving you today.</p>
					<div class="row">
						<div class="col-sm-12 col-md-5 "><img src="/media/images/ss4p/ss4p-lsv-single-bluebg.jpg" alt="Survival Seeds" class="img-responsive center-block" /></div>
						<div class="col-sm-12 col-md-7 center-block" style="font-size: 14px;">
							<ul class="fa-ul" style="max-width: 350px;margin-right: auto;margin-left: auto;">
								<li><i class="fa-li fa fa-check"></i>Blue Lake Bush Bean - over 150 seeds </li>
								<li><i class="fa-li fa fa-check"></i>Califovrnia Wonder Bell Pepper - over 70 seeds </li>
								<li><i class="fa-li fa fa-check"></i>Marketmore Cucumber - over 150 seeds </li>
								<li><i class="fa-li fa fa-check"></i>Scarlet Nantes Carrot - over 800 seeds </li>
								<li><i class="fa-li fa fa-check"></i>Parris Island Cos Romaine Lettuce - over 900 seeds </li>
								<li><i class="fa-li fa fa-check"></i>Golden Acre Cabbage - over 530 seeds </li>
								<li><i class="fa-li fa fa-check"></i>Detroit Dark Red Beet - over 260 seeds </li>
								<li><i class="fa-li fa fa-check"></i>Lincoln Shell Sweat Pea - over 100 seeds </li>
								<li><i class="fa-li fa fa-check"></i>Beefsteak Tomato - over 180 seeds </li>
								<li><i class="fa-li fa fa-check"></i>Champion Radish - over 320 seeds </li>
								<li><i class="fa-li fa fa-check"></i>Green Sprouting Broccoli - over 500 seeds </li>
								<li><i class="fa-li fa fa-check"></i>Waltham Butternut Winter Squash - over 100 seeds</li>
								<li><i class="fa-li fa fa-check"></i>Bloomsdale Long Standing Spinach - over 260 seeds </li>
								<li><i class="fa-li fa fa-check"></i>Yellow Sweet Spanish Onion - over 145 seeds</li>
								<li><i class="fa-li fa fa-check"></i>Black Turtle Bean – over 70 seeds </li>
								<li><i class="fa-li fa fa-check"></i>Stowell's Evergreen Sweet Corn - over 250 seeds </li>
								<li><i class="fa-li fa fa-check"></i>Hales Best Cantaloupe - over 70 seeds </li>
								<li><i class="fa-li fa fa-check"></i>Snowball Cauliflower - over 285 seeds </li>
								<li><i class="fa-li fa fa-check"></i>Black Beauty Zucchini - over 50 seeds </li>
								<li><i class="fa-li fa fa-check"></i>Crimson Sweet Watermelon - over 60 seeds </li>
								<li><i class="fa-li fa fa-check"></i>Dwarf Blue Curled Scotch Kale - over 250 seeds </li>
								<li><i class="fa-li fa fa-check"></i>Pinto Bean - over 85 seeds </li>
							</ul>
						</div>
					</div>
				</div>
				<p>And last, but certainly not least - I'm going to send you our compact and powerful 11-in-1 survival tool. You never know what you're going to run into in a survival situation. This little tool just might save the day. 11 full functions in a tool that will fit handily in your wallet.</p>
				<div class="rcBoxR10">
					<h2 class="darkRed text-center">FREE 11-in-1 Survival Tools</h2>
					<p>Each one of these amazing tools could be a real life-saver, yet they are no bigger than a credit card so you’ll always have it handy.</p>
					<div><img class="img-responsive center-block" src="/media/images/bonuses/bonus-multi-tool-04.jpg" alt="Multi Tool Bonus"></div>
				</div>
				<p>So that's a full $100 bucks right off the top of our 3-month supply of Food4Patriots survival food, free shipping AND 6 awesome bonuses.</p>
				<p>All for you today. I think that's about the best deal I can make you.</p>
				<p>Just click the link the button below and I’ll send you your goodies right away.</p>
			</div>
			<div><img class="img-responsive center-block"src="/media/images/f4p/f4p-3-month-kit-02.jpg" alt="3 Month Kit"/></div>
			<div class="row">
				<div class="col-sm-12 col-md-1"></div>
				<div class="col-sm-12 col-md-5">
					<div class="productList">
						<p class="red17"><strong>3 Month Supply Includes:</strong></p>
						<ul>
							<li>450 Servings <a href="#info" id="3mkPopover2" rel="popover"  data-placement="bottom" data-toggle="tooltip" class="hidden-xs"><i class="fa fa-info-circle"></i></a></li>
							<li><strong>FREE</strong> Shipping</li>
							<li><strong>FREE</strong> Survival Tool <a href="#info" id="toolPopover2" rel="popover"  data-placement="bottom" data-toggle="tooltip" class="hidden-xs"><i class="fa fa-info-circle"></i></a></li>
							<li><strong>FREE</strong> Seed Vault <a href="#info" id="seedsPopover2" rel="popover"  data-placement="bottom" data-toggle="tooltip" class="hidden-xs"><i class="fa fa-info-circle"></i></a></li>
						</ul>
					</div>
				</div>
				<div class="col-sm-12 col-md-5 nopadding">
					<div class="productList">
						<p class="red17"><strong>FREE Hard Copy Bonus Reports</strong></p>
						<ul>
							<li>10 Items Sold Out After Crisis</li>
							<li>Water Survival Guide</li>
							<li>How to Cut Your Grocery Bills</li>
							<li>Survival Garden Guide</li>
						</ul>
					</div>
				</div>
				<div class="col-sm-12 col-md-1"></div>
			</div>
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
			<div>
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
					<h3>Guarantee #2:</h3> This is an unheard of 300% money back guarantee. It&rsquo;s in addition to guarantee #1. If you open any of your Food4Patriots meals anytime <strong>in the next 25 years</strong> and find that your food has spoiled or gone bad, you can return your entire Food4Patriots stockpile and I will <strong>triple</strong> your money back!</p>
					<p>That&rsquo;s how confident I am that this food will remain just as delicious and nutritious for the next 25 years as it is on the day you buy it. Some of my friends said I was crazy to offer this double guarantee, but to be honest I&rsquo;m not really worried about it, because I am so confident you&rsquo;re going to see the value in your Food4Patriots kit as soon as you have it in your hands.</p>
				</div>
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
				<div class="text-center" style="margin-top:20px;"><strong>OR</strong></div>
				<div class="noThanks">
					<a href="<?php echo $declineUrl;?>">No Thanks</a> – I want to give up this opportunity. I understand that I will not receive this special offer again.
				</div>
			</div>
			<div>
				<img class="img-responsive center-block margin-tb-20" src="/media/images/f4p/f4p-testimonials-13.jpg" alt="Food4Patriots Testimonial">
				<img class="img-responsive center-block margin-tb-20" src="/media/images/f4p/f4p-testimonials-14.jpg" alt="Food4Patriots Testimonial">
			</div>
		</div>
		<script>
			$(document ).ready(function () {
				$("#3mkPopover").popover({
					html:true,
					trigger: 'hover',
					title:"3 Month Kit May Include:",
					content: function() {
						return $('#3mk').html();
					},
				});

			});
			$(document ).ready(function () {
				$("#toolPopover").popover({
					html:true,
					trigger: 'hover',
					title:"11-in-1 Survival Tool",
					content: "<img src=/media/images/ppg/ppg-bonus-tool-01.jpg>"
				});

			});
			$(document ).ready(function () {
				$("#seedsPopover").popover({
					html:true,
					trigger: 'hover',
					title:"Liberty Seed Vault",
					content: function() {
						return $('#lsv').html();
					},
				});

			});
			$(document ).ready(function () {
				$("#3mkPopover2").popover({
					html:true,
					trigger: 'hover',
					title:"3 Month Kit May Include:",
					content: function() {
						return $('#3mk').html();
					},
				});

			});
			$(document ).ready(function () {
				$("#toolPopover2").popover({
					html:true,
					trigger: 'hover',
					title:"11-in-1 Survival Tool",
					content: "<img src=/media/images/ppg/ppg-bonus-tool-01.jpg>"
				});

			});
			$(document ).ready(function () {
				$("#seedsPopover2").popover({
					html:true,
					trigger: 'hover',
					title:"Liberty Seed Vault",
					content: function() {
						return $('#lsv').html();
					},
				});

			});
		</script>
		<div id="3mk" style="display:none;">
			<?php include_once("f4p-product-info-3mk.html"); ?>
		</div>
		<div id="lsv" style="display:none;">
			<?php include_once("f4p-product-info-seeds-bonus.html"); ?>
		</div>
<?php include_once("template-bottom.php"); ?>