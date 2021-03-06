<?php
$badgeInvert = true;
?>
<link rel="stylesheet" href="/assets/css/styles-freefood.css">
<script src="/js/audio.js"></script>
<script src="/assets/js/video/jquery.timers-1.2.js"></script>
<script src="/assets/js/video/jcookie.js"></script>
<script>
	// Change these values for the content within the "buttons" div to appear at this time.
	$(document).ready(function(){
		if ($.cookie("sawbutton")) {
			var hours = 0;
			var minutes = 0;
			var seconds = 5;
		} else {
			var hours = 0;
			var minutes = 9;
			var seconds = 55;
		}
		// Start by converting hours to milliseconds
		var time = hours * 60 * 60 * 1000;
		// Add minutes converted to milliseconds and add to total time
		time += minutes * 60 * 1000;
		// Add seconds to total time after converting to milliseconds
		time += seconds * 1000;
		if ($.cookie("sawbutton")) {
			// If return visitor that saw button, show alt button
			$("#buyButton").oneTime(time, function() {
				$("#buyButton").css("display", "block");
			});
		} else {
			// If visitor hasn't seen button yet, show default button
			$("#buyButton").oneTime(time, function() {
				$("#buyButton").css("display", "block");
			});
		}
		setTimeout(function(){$.cookie("sawbutton", "1", { expires: 30 });}, 30000);
	});
</script>
<style>
	.navbar, .navbar-phone-contain, .breadcrumb1 {
		visibility: hidden;
		display:none;
	}
	body {
		background-color: #E7E7E7;
	}
	.contentlist li {
		font-size:15pt!important;
		margin: 0 0 20px!important;
	}
	li {
		font-size:12pt!important;
		margin: 0!important;
	}
	.footer {
		color: black;
	}
	.summary li {
		margin-bottom:0!important;
		font-size:12pt!important;
	}
	.red17 {
		margin-bottom:10px;
		font-size: 13pt!important;
	}
	.productList {
		margin-top:0;
		margin-bottom:5px;
	}
</style>
<div class="container-main">
	<div class="breadcrumb1">
		<a>CHECKOUT</a>
		<a class="current">ORDER CUSTOMIZATION</a>
		<a>ORDER CONFIRMATION</a>
	</div>
	<div class="container">
		<div style="margin:0 auto; max-width: 750px;">
			<img src="/assets/images/misc/stop-sign.png" class="img-responsive pull-left img-padding-right" style="max-width:188px;">
			<p class="darkRed" style="padding: 11px 0 0 0;">Do Not Close This Page, Your Order Is Not Complete! <br class="hidden-xs"><u>Please Customize Your Order</u> <br class="hidden-xs"><span style="color:#000;">Do not hit the "Back" button, as it will cause errors in your order.</span></p>
		</div>
		<div class="col-md-12 hidden-sm hidden-md hidden-lg">
			<div class="center-block text-center">
				<h1><strong>Breaking News:<br />
						FEMA Hates This (#1 Item To Hoard)</strong></h1>
			</div>
		</div>
		<div class="col-md-12 margin-b-20 hidden-xs">
			<div id="videobox">
				<iframe src="//fast.wistia.net/embed/iframe/1xvjeubn1j?seo=false" allowtransparency="true" frameborder="0" scrolling="no" class="wistia_embed" name="wistia_embed" allowfullscreen mozallowfullscreen webkitallowfullscreen oallowfullscreen msallowfullscreen width="640" height="390"></iframe>
				<script src="//fast.wistia.net/assets/external/E-v1.js" async></script>
			</div>
		</div>

		<div class="content margin-t-20" id="content" style="padding-bottom:0!important;">
			<div id="buyButton" class="center-block text-center" style="display:none;">
				<a href="" class="scroll-link" data-id="order-form"><button type="button-1" class="btn-1">Choose My Kit</button></a>
				<p style="color:#002287;">(This Takes You To The Kit Options)</p>
			</div>
			<div class="container oto-width">
				<p>This is your <span style="text-decoration: underline;">ONE chance</span> to upgrade your order!</p>
				<p>I&rsquo;m going to make you a special offer right now that you won&rsquo;t see again, so read this very carefully.</p>
				<p>Because of the uncertain times we&rsquo;re living in &mdash; the government isn&rsquo;t exactly what I&rsquo;d call stable &mdash; and because our survival food is second to none in the industry&hellip; our stock is in high demand and gets depleted very quickly.</p>
				<p>You just proved you know which end is up by grabbing your free food today.</p>
				<p>But remember, the <strong>absolute bare-minimum supply</strong> you need to have on hand is 72 hours. And a crisis &ndash; natural or manmade &ndash; could last much longer.</p>
				<p>If you&rsquo;re interested in upgrading, then I suggest that you don&rsquo;t wait.</p>
				<p>There are three great options for you to choose from when you upgrade your order today, although one of them is far and away our most popular (I&rsquo;ll tell you which one, in just a second).</p>
				<p>Here&rsquo;s what you get when you add the full-sized to your order today.</p>
				
				<h2 class="darkRed text-center">Food4Patriots 1-Week, <br class="hidden-sm">4-Week and 3-Month Kits</h2>
				<p><strong>Food4Patriots </strong>survival food is specifically designed to save your life in a disaster. It&rsquo;s delicious, nutritious, made in the USA from the finest ingredients, and rated for 25 years of storage.</p>
				<p>You can add a <strong>1-week, 4-week or 3-month kit </strong>to your current order on this page (down below). Each kit in this special offer has some great bonuses I&rsquo;m throwing in for you today.</p>
				<div class="rcBoxR10">
					<h2 class="darkRed text-center">FREE Gift #1 – Top 10 Items Sold Out After <br class="hidden-sm">A Crisis ($19.95 value)</h2>
					<img class="img-responsive pull-left img-padding-right media" src="/media/images/bonuses/f4p-10-items-after-crisis.png" alt="">
					<p>In this report you'll learn the 10 items you absolutely need to hoard. If you miss this you'll be forced to go without them in a crisis. </p>
					<p>In this 12-page report you'll also learn how to snag them on the cheap, sort them securely, and pump out every ounce of nutrition they have to offer.</p>
				</div>
				<div class="rcBoxR10">
				<h2 class="darkRed text-center">FREE Gift #2 – The Water Survival Guide <br class="hidden-sm">($19.95 value)</h2>
					<img class="img-responsive pull-left img-padding-right media" style="padding-bottom:30px;" src="/media/images/bonuses/f4p-the-water-survival-guide.png" alt="">
					<p>Look, without clean water you can't prepare a scrap of food. You've got to have this report to complete your preps. This down-and-dirty guide will show you desperate-times water sources and filtration techniques to keep your family from going thirsty. It'll also walk you through the basics of water storage and tricks to easily grab water in an emergency.</p>
				</div>
				<div class="rcBoxR10">
				<h2 class="darkRed text-center">FREE Gift #3 – The Survival Garden Guide <br class="hidden-sm">($19.95 value)</h2>
					<img class="img-responsive pull-left img-padding-right media" style="padding-bottom:30px;" src="/media/images/bonuses/f4p-survival-garden-guide.png" alt="">
					<p>A long-term food stockpile works best when you can add in some delicious, mouth-watering fruits and veggies from your garden. In this 21-page report you get insider info on outdoor gardens, indoor gardens, freezing, and long-term storage.</p>
					<p>After reading it, you&rsquo;ll feel safe knowing that you&rsquo;ve got a blueprint for taking care of yourself and your loved ones &ndash; it&rsquo;s like "food insurance" so your family can get an almost endless supply of fresh picked produce and canned delicacies.</p>
				</div>
				<div class="rcBoxR10">
					<h2 class="darkRed text-center">FREE Gift #4 – How To Cut Your Grocery <br class="hidden-sm">Bills In Half ($19.95 Value)</h2>
					<img class="img-responsive pull-left img-padding-right media" src="/media/images/bonuses/f4p-cutting-grocery-bill-in-half.png" alt="">
					<p>It's sad to see how much most Americans are forced to spend every time they go to the grocery store. Odds are you've seen an increase in spending too. Well it doesn't have to be like that. </p>
					<p>To help out I'm going to show you my down-and-dirty tricks to getting the best deal&hellip; and no, it&rsquo;s not just about clipping coupons!</p>
				</div>
				<p>Each kit comes with the special digital bonuses I showed you&hellip; trust me, you&rsquo;re going to love having them at-the-ready.</p>
				<div class="">
					<h2 class="darkRed text-center">FREE Shipping, Too?</h2>
					<img class="img-responsive pull-left img-padding-right media" src="/assets/images/misc/free-ship-burst.png" alt="" style="margin-top: -15px;">
					<p>Not only that, when you order the <strong>4-week kit</strong> or the <strong>3-month kit</strong>, you&rsquo;ll unlock an <strong>EXTRA </strong>free gift. </p>
					<p>My personal favorite&hellip; FREE shipping (up to a $40 value).</p>
					<div class="clearfix"></div>
				</div>
				<h2 class="darkRed text-center">Even More FREE Bonus Gifts When You Upgrade to the 3-Month Kit!</h2>
				<p>Now here&rsquo;s where things get really interesting and why I can hardly keep these kits in stock&hellip;</p>
				<p>When you order the 3-month kit (our MOST popular kit by far!) you’ll not only get FREE SHIPPING but we’ll also upgrade your 4 digital bonus reports to hardcover version and deliver them directly to your door so you have them in hand rather than on your computer.</p>
				<p>But that’s not all…when you upgrade to the Food4Patriots 3-month Kit we’ll also throw in the following bonuses FREE as a part of your order:</p>
				<div class="rcBoxR10">
					<h2 class="darkRed text-center">Liberty Seed Vault</h2>
					<img class="img-responsive pull-left img-padding-right media" style="padding-bottom:20px;"  src="/media/images/ss4p/ss4p-lsv-new.png" alt="">
					<p style="letter-spacing:-.1px;">The Liberty Seed Vault has more than 5,340 survival seeds from 22 varieties of hardy and delicious heirloom plants passed down from our forefathers.</p>
					<p>No GMO crap or hybrids &ndash; these are cream-of-the-crop seeds sealed in heavy-duty foil envelopes and packed in an airtight storage vault &ndash; the perfect start to your survival food garden.</p>
					<p>And you get this Liberty Seed Vault, a $47 value, FREE when you add the 3-month kit to your order today.</p>
				</div>
				<div class="rcBoxR10">
					<h2 class="darkRed text-center">11-in-1 Multi-Tool</h2>
					<p>Plus, I&rsquo;ll also send you a handy 11-in-1 multi-tool that you can fit right in your wallet. Another $9.95 value&hellip; yours free when you order the 3-month kit.</p>
					<img class="img-responsive center-block media" style="padding-bottom:10px;" src="/media/images/bonuses/bonus-multi-tool-04.jpg" alt="">
				</div>
				<p>Now in addition to the food kits and all the free gifts, I&rsquo;m also going to back your order with 2&nbsp;IRONCLAD guarantees so that you don&rsquo;t risk a single penny.</p>

				<h2 class="darkRed text-center">Your Order Is Backed By BOTH Of Our 100%<br class="hidden-sm"> and 300% Money-Back Guarantees</h2>
				<div class="outLineBoxDarkBlue">
					<img class="img-responsive pull-left img-padding-right media" style="margin-top:0;" src="/assets/images/misc/satisfaction-100.jpg" alt="">
					<p>So I am giving you a 100% money-back guarantee for 365 days with no questions asked. Here&rsquo;s how it works: if for any reason you're not satisfied with your Food4Patriots kit, just return it within 365 days (that&rsquo;s a full year) of purchase and we'll refund 100% of your purchase price.</p>
					<p>That way there's absolutely no risk for you. And you can keep the free reports as gifts for giving Food4Patriots a try.</p>
				</div>
				<div class="outLineBoxDarkBlue">
					<img class="img-responsive pull-left img-padding-right media" style="margin-top:0;"d src="/assets/images/misc/satisfaction-300.jpg" alt="">
					<p>This is an unheard of 300% money back guarantee. It&rsquo;s in addition to guarantee #1.&nbsp;If you open any of your Food4Patriots meals anytime&nbsp;<strong>in the next 25 years</strong>&nbsp;and find that your food has spoiled, you can return your entire Food4Patriots stockpile and I will&nbsp;<strong>triple</strong>&nbsp;your money back!</p>
				</div>
				<p><span class="darkRed">REMINDER:</span>&nbsp; These kits routinely sell out and because we source our ingredients from local farmers all over this great country, it takes some time for us to get restocked. If you&rsquo;re ready to upgrade your food supply I highly suggest doing it today and taking advantage of one of these great offers.</p>
				<p>Chances are, we will sell out soon.</p>
				<p>I&rsquo;ve had MANY men and women email me after we have run out to see if I could &ldquo;pull some strings&rdquo; and get them a fresh supply of food, but I just can&rsquo;t do it.</p>
				<p>Once we&rsquo;re out of stock, you&rsquo;re out of luck until the next harvest comes in and we can replenish our shelves. </p>

				<h2 class="darkRed text-center">So Here’s What You Need To Do Now…</h2>
				<p>Simply select the kit that works for you and click the big, orange <strong>“Click to Accept”</strong> button below.</p>
				<p>Remember, you&rsquo;ll get the best deal (and&nbsp;<strong>ALL THE FREE GIFTS</strong>)​ when you select our most popular option, the 3-month supply.</p>
				<p>You &rsquo;ll also get&nbsp;<strong>FREE shipping</strong>&nbsp;​on your order, rushed right to your door via UPS.</p>
				<p>If you&rsquo;re sick of...</p>
				<ul class="contentlist">
					<li>Worrying about your family&rsquo;s well-being in a crisis</li>
					<li>Not knowing where your food might come from in an emergency</li>
					<li>Wondering if you have enough, or the right kind of food on hand</li>
					<li>Always second guessing your preparations&hellip;</li>
				</ul>
				<p>Then&nbsp;<strong>y​ou owe it to yourself</strong>&nbsp;to add a long-term Food4Patriots survival food kit to your order right now.</p>
				<p>Simply select the kit that works for you and click the big, orange <strong>“Click to Accept”</strong> button below and we&rsquo;ll add it to your order.</p>
				<p style="margin-bottom:0;">Keep in mind, this is first come, first served and this is the only time you&rsquo;ll see this special offer.</p>

			</div>
		</div>
	</div>
	<div class="container oto-width">
		<link rel="stylesheet" href="/assets/css/bootstrap-select.min.css">
		<script src="/assets/js/bootstrap-select.min.js"></script>
		<style>
			.container .bootstrap-select li {
				margin-bottom: 5px;
			}
			.bootstrap-select .btn, .bootstrap-select li {
				font-weight: bold;
				font-size: 12pt;
			}
			.bootstrap-select .btn:hover, .btn:focus {
				color: #000000;
			}
			@media screen and (max-width: 550px){
				.btn-2{
					font-size: 21px;
				}
		</style>
		<script>
			$('.selectpicker').selectpicker({
				style: 'btn-info',
				size: 4
			});
			if( /Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent) ) {
				$('.selectpicker').selectpicker('mobile');
			}

			function productChange(whichSelect){
				selectedProductId = parseInt(whichSelect);
				buttonPrice = document.getElementById('buttonPrice');
				switch(selectedProductId) {
					case 19:
						document.getElementById('3mk').style.display = 'block';
						document.getElementById('4wk').style.display = 'none';
						document.getElementById('1wk').style.display = 'none';
						document.getElementById('charity').style.display = 'block';
						buttonPrice.innerHTML = "Add To Cart - $497";
						$('#3mk').goTo();
						break;
					case 18:
						document.getElementById('3mk').style.display = 'none';
						document.getElementById('4wk').style.display = 'block';
						document.getElementById('1wk').style.display = 'none';
						document.getElementById('charity').style.display = 'none';
						buttonPrice.innerHTML = "Add To Cart - $197";
						$('#4wk').goTo();
						break;
					case 92:
						document.getElementById('3mk').style.display = 'none';
						document.getElementById('4wk').style.display = 'none';
						document.getElementById('1wk').style.display = 'block';
						document.getElementById('charity').style.display = 'none';
						buttonPrice.innerHTML = "Add To Cart - $67";
						$('#1wk').goTo();
						break;
				}
			}
			(function($) {
				$.fn.goTo = function() {
					$('html, body').animate({
						scrollTop: $(this).offset().top + 'px'
					}, 'fast');
					return this; // for chaining...
				}
			})(jQuery);
		</script>
		<div id="order-form" style="padding:10px;">
			<div id="3mk">
				<div class="row nomargin">
					<div class="text-center">
						<img src="/media/images/f4p/f4p-3month-bonuses-veggies-totes-title-dealburst-560x436.jpg" class="center-block img-responsive">
					</div>
				</div>
				<div class="row nomargin">
					<div class="col-md-1"></div>
					<div class="col-sm-12 col-md-5 nopadding">
						<div class="productList">
							<p class="text-center red17"><strong>3 Month Supply Includes:</strong></p>
							<ul class="summary">
								<li>450 Servings <a href="#info" id="3mkPopover" rel="popover" data-placement="bottom" data-toggle="tooltip" class="hidden-xs"><i class="fa fa-info-circle"></i></a></li>
								<li><strong>FREE</strong> Shipping</li>
								<li><strong>FREE</strong> Survival Tool <a href="#info" id="toolPopover" rel="popover" data-placement="bottom" data-toggle="tooltip" class="hidden-xs"><i class="fa fa-info-circle"></i></a></li>
								<li><strong>FREE</strong> Seed Vault <a href="#info" id="seedsPopover" rel="popover" data-placement="bottom" data-toggle="tooltip" class="hidden-xs"><i class="fa fa-info-circle"></i></a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-12 col-md-5 nopadding">
						<div class="productList">
							<p class="text-center red17"><strong>FREE Hardcopy Bonus Reports:</strong></p>
							<ul class="summary">
								<li>10 Items Sold Out After Crisis</li>
								<li>Water Survival Guide</li>
								<li>How to Cut Your Grocery Bills</li>
								<li>Survival Garden Guide</li>
							</ul>
						</div>
					</div>
					<div class="col-md-1"></div>
				</div>
				<div class="text-center" style="font-size:28px;font-weight:bold;line-height:1.25;">
					<strike style="color:red"><span style='color:black'>$804.00</span></strike>
					<span style="color:#003399;">$497 - Free Shipping</span>
				</div>
				<p class="text-center" style="color:#003399;margin-bottom:0;font-size:12pt!important;">($5 Per Day)</p>
			</div>
			<div id="4wk" style="display:none;">
				<div class="row nomargin">
					<div class="text-center">
						<img src="/media/images/f4p/f4p-4week-bonuses-totes-title-560x331.jpg" class="img-responsive center-block">
					</div>
				</div>
				<div class="row">
					<div class="col-md-1"></div>
					<div class="col-sm-12 col-md-5 nopadding">
						<div class="productList">
							<p class="text-center red17"><strong>4 Week Supply Includes:</strong></p>
							<ul class="summary" style="margin-left: 64px;">
								<li>140 Servings <a href="#info" id="4wkPopover" rel="popover" data-placement="bottom" data-toggle="tooltip" class="hidden-xs"><i class="fa fa-info-circle"></i></a></li>
								<li><strong>FREE</strong> Shipping</li>
							</ul>
						</div>
					</div>
					<div class="col-sm-12 col-md-5 nopadding">
						<div class="productList">
							<p class="text-center red17"><strong>FREE Bonus Reports (Digital):</strong></p>
							<ul class="summary">
								<li>10 Items Sold Out After Crisis</li>
								<li>Water Survival Guide</li>
								<li>How to Cut Your Grocery Bills</li>
								<li>Survival Garden Guide</li>
							</ul>
						</div>
					</div>
					<div class="col-md-1"></div>
				</div>
				<div class="text-center" style="font-size:28px;font-weight:bold;line-height:1.2;">
					<strike style="color:red"><span style='color:black'>$268.00</span></strike>
					<span style="color:#003399;">$197 - Free Shipping</span>
				</div>
				<p class="text-center" style="color:#003399;margin-bottom:0;font-size:12pt!important;">($7 Per Day)</p>
			</div>
			<div id="1wk" style="display:none;">
				<div class="row nomargin">
					<div class="text-center">
						<img src="/media/images/f4p/f4p-1week-title-560x331.jpg" class="img-responsive center-block">
					</div>
				</div>
				<div class="row">
					<div class="col-md-1"></div>
					<div class="col-sm-12 col-md-5 nopadding">
						<div class="productList">
							<p class="text-center red17"><strong>1 Week Supply Includes:</strong></p>
							<ul class="summary" style="margin-left: 64px;">
								<li>40 Servings <a href="#info" id="1wkPopover" rel="popover" data-placement="bottom" data-toggle="tooltip" class="hidden-xs"><i class="fa fa-info-circle"></i></a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-12 col-md-5 nopadding">
						<div class="productList">
							<p class="text-center red17"><strong>FREE Bonus Reports (Digital):</strong></p>
							<ul class="summary">
								<li>10 Items Sold Out After Crisis</li>
								<li>Water Survival Guide</li>
								<li>How to Cut Your Grocery Bills</li>
								<li>Survival Garden Guide</li>
							</ul>
						</div>
					</div>
					<div class="col-md-1"></div>
				</div>
				<div class="text-center" style="font-size:28px;font-weight:bold;line-height:1.2;">
					<span style="color:#003399;">$67 + $5.95 Shipping</span>
				</div>
				<p class="text-center" style="color:#003399;margin-bottom:0;font-size:12pt!important;">($10 Per Day)</p>
			</div>

			<form method="post" action="<?php echo url('/checkout/process.php'); ?>" id="order-process">
				<div class="text-center center-block">
					<input id="taxState_92" type="hidden" value="<?php echo strtolower($billingStateName);?>">
					<label for="productId" style="font-size: 11pt;display: block;margin: 10px 0 0">Choose Your Kit:</label>
					<select class="selectpicker show-menu-arrow" data-width="auto" name="productId" id="productId" style="margin:20px auto;" onchange="productChange(this.value);">
						<option value="19">3-Month Supply</option>
						<option value="18">4-Week Supply</option>
						<option value="92">1-Week Supply</option>
					</select>
					<div style="margin:0 auto;padding: 10px 0 17px 0">
						<div class="text-center">
							<a href="javascript:{};" onclick="document.getElementById('order-process').submit(); return false;" title="Add to Order!"><img class="img-responsive center-block" src="/assets/images/buttons/btn-orange-click-accept-02.jpg" alt="Buy It Now!" border="0" /><span id="buttonPrice" style="font-size: 20px;font-weight: bold;">Add To Cart - $497</span></a>
						</div>
					</div>
				</div>
			</form>
			<img class="img-responsive center-block" id="charity" src="/assets/images/checkout/f4p-charity-banner.jpg" width="530" height="118" alt=""/>
		</div>

		<?php include_once("testimonials/fb-testimonial-bob.html"); ?>
		<?php include_once("testimonials/fb-testimonial-brian.html"); ?>
		<p class="text-center" style="padding-top:20px;"><strong>OR</strong></p>
	</div>

	<div style="font-size: 20px; max-width:580px;" class="noThanks">
		<a  onclick="showDeclineModal();">No Thanks</a> – I don’t want to get better results and more peace of mind with the full-sized Food4Patriots Survival Food Kits.
	</div>
	<div class="container oto-width">
		<div class="outLineBoxDarkBlue">
			<img class="img-responsive pull-left img-padding-right media" style="margin-top:0;" src="/assets/images/misc/satisfaction-100.jpg" alt="">
			<p>So I am giving you a 100% money-back guarantee for 365 days with no questions asked. Here&rsquo;s how it works: if for any reason you're not satisfied with your Food4Patriots kit, just return it within 365 days (that&rsquo;s a full year) of purchase and we'll refund 100% of your purchase price.</p>
			<p>That way there's absolutely no risk for you. And you can keep the free reports as gifts for giving Food4Patriots a try.</p>
		</div>
		<div class="outLineBoxDarkBlue">
			<img class="img-responsive pull-left img-padding-right media" style="margin-top:0;"d src="/assets/images/misc/satisfaction-300.jpg" alt="">
			<p>This is an unheard of 300% money back guarantee. It&rsquo;s in addition to guarantee #1.&nbsp;If you open any of your Food4Patriots meals anytime&nbsp;<strong>in the next 25 years</strong>&nbsp;and find that your food has spoiled, you can return your entire Food4Patriots stockpile and I will&nbsp;<strong>triple</strong>&nbsp;your money back!</p>
		</div>
		<div><h4 class="darkRed">Frequently Asked Questions:</h4></div>
		<?php include_once ('snippets/faq-accordian-1wk.html'); ?>
	</div>

	<!--- Decline Modal ---->
	<div >
		<script>
			function showDeclineModal() {
				$('#declineModal').modal('show');
			}
			function hideDeclineModal() {
				$('#declineModal').modal('hide');
			}
			function acceptModal() {
				hideDeclineModal();
				document.querySelector('#order-form').scrollIntoView();
			}
		</script>
		<style>
			#declineModal p {
				margin-bottom:7px;
			}
			.button {
				border: none;
				width: 100%;
				background: #5fb760;
				color: #fff;
				padding: 15px;
				border-radius:.5em;
				text-decoration: none;
			}

			.button:hover {
				background: #489c48;
				cursor:pointer;
				-webkit-tap-highlight-color: rgba(0,0,0,0);
			}
		</style>
		<div id="declineModal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg" style="max-width:620px;">
				<div class="modal-content" >
					<div class="modal-body">
						<div class="glyphicon glyphicon-remove-circle" style="float:right;cursor:pointer;" onclick="hideDeclineModal();"></div>
						<div style="padding:10px;">
							<div class="row">
								<div class="col-xs-12">
									<h3 class="text-center"><span class="darkRed">WAIT!</span> This is your final opportunity to claim your exclusive discount on your Food4Patriots kit and you MUST CONFIRM you are permanently giving up this one­-time special offer!!</h3>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-12">
									<p>I understand that these kits are flying off the shelves and may sell out any time.</p>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-12">
									<p>Yes, I am giving up my chance to get this “stockpiler’s dream” that could feed my entire family in the event of a crisis or emergency situation.</p>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-12">
									<p>I accept that by declining this offer, I may never see the Food4Patriots kits at these prices ever again.</p>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-12">
									<div class="text-center" style="padding:20px;"><a href="<?php echo $declineUrl;?>">No thanks, I’ll take my chances. Give another patriot my kit(s).</a></div>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-12">
									<button id="modalAccept" class="button" onclick="acceptModal();" style="font-size: 19px">I Changed My Mind! Send Me Back to the Page so I Can Add A <br />Food4Patriots Kit to My Order Now!</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end decline modal -->

	<div id="productModal" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-sm" style="width: 417px;">
			<div class="modal-content">
				<div class="glyphicon glyphicon-remove-circle" style="float:right;cursor:pointer;padding:10px;z-index:1001;" onclick="hideProductModal();"></div>
				<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
					<div class="carousel-inner">
						<div class="item active">
							<img src="/media/images/f4p/food/f4p-header-almond-coconut-granola.jpg" alt="Patriot Power Generator">
							<div class="carousel-caption"></div>
						</div>
						<div class="item">
							<img src="/media/images/f4p/food/f4p-header-white-cheddar-shells.jpg" alt="Patriot Power Deluxe">
							<div class="carousel-caption"></div>
						</div>
						<div class="item">
							<img src="/media/images/f4p/food/f4p-header-cheesy-chicken-rice-casserole.jpg" alt="Patriot Power Accesories">
							<div class="carousel-caption"></div>
						</div>
						<div class="item">
							<img src="/media/images/f4p/food/f4p-header-chili-and-dumplings.jpg" alt="Patriot Power Accesories">
							<div class="carousel-caption"></div>
						</div>
					</div>

					<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
					<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
				</div>
			</div>
		</div>
	</div>
	<script>
		$('#initial').find('.panel-heading').addClass("active-panel");
		$('#accordion > .panel').on('show.bs.collapse', function (e) {
			$(this).find('.panel-heading').addClass("active-panel");
		});
		$('#accordion > .panel').on('hide.bs.collapse', function (e) {
			$(this).find('.panel-heading').removeClass('active-panel');
		});
		$('#accordion .panel-heading').on('click',function(e){
			if($(this).parents('.panel').children('.panel-collapse').hasClass('in')){
				e.stopPropagation();
			}
		});
		function showFEMAModal() {
			$('#FEMAModal').modal('show');
		}
		function hideFEMAModal() {
			$('#FEMAModal').modal('hide');
		}
		function showProductModal() {
			$('#productModal').modal('show');
		}
		function hideProductModal() {
			$('#productModal').modal('hide');
		}
		$(document).ready(function(){
			$('#mcarousel-example-generic').carousel({
				interval: 5000
			})
		});
		/* ----- Popovers---- */
		$(document ).ready(function () {
			$("#1wkPopover").popover({
				html:true,
				trigger: 'hover',
				title:"1 Week Kit May Include:",
				content: function() {
					return $('#1wkt').html();
				},
			});
		});
		$(document ).ready(function () {
			$("#4wkPopover").popover({
				html:true,
				trigger: 'hover',
				title:"4 Week Kit May Include:",
				content: function() {
					return $('#4wkt').html();
				},
			});
		});
		$(document ).ready(function () {
			$("#3mkPopover").popover({
				html:true,
				trigger: 'hover',
				title:"3 Month Kit May Include:",
				content: function() {
					return $('#3mkt').html();
				}
			});
		});
		$(document ).ready(function () {
			$("#reportsPopover").popover({
				html:true,
				trigger: 'hover',
				title:"4 FREE Written Reports",
				content: "<img src=/media/images/bonuses/f4p-written-reports-01.jpg>"
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
				content: "<img src=/media/images/ss4p/ss4p-lsv-spread-03.jpg style='width: 300px;'>" + "More than 5,640 survival seeds from 22 varieties of hardy and delicious heirloom seeds passed down from our forefathers.",
			});
		});
		/* ---- Scroll to ID ------ */
		$(document).ready(function() {
			// navigation click actions
			$('.scroll-link').on('click', function(event){
				event.preventDefault();
				var sectionID = $(this).attr("data-id");
				scrollToID('#' + sectionID, 750);
			});
			// scroll to top action
			$('.scroll-top').on('click', function(event) {
				event.preventDefault();
				$('html, body').animate({scrollTop:0}, 'slow');
			});
			// mobile nav toggle
			$('#nav-toggle').on('click', function (event) {
				event.preventDefault();
				$('#main-nav').toggleClass("open");
			});
		});
		// scroll function
		function scrollToID(id, speed){
			var offSet = 50;
			var targetOffset = $(id).offset().top - offSet;
			var mainNav = $('#main-nav');
			$('html,body').animate({scrollTop:targetOffset}, speed);
			if (mainNav.hasClass("open")) {
				mainNav.css("height", "1px").removeClass("in").addClass("collapse");
				mainNav.removeClass("open");
			}
		}
		if (typeof console === "undefined") {
			console = {
				log: function() { }
			};
		}
	</script>
	<script>
		function showCsrModal() {
			$('#csrModal').modal('show');
		}
		function hideCsrModal() {
			$('#csrModal').modal('hide');
		}
	</script>
	<style>#csrModal p{margin-bottom:7px;}</style>
	<div id="csrModal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" style="width:500px;height:300px;">
			<div class="modal-content" style="background-image:url(/assets/images/misc/timer-pop-01.jpg);">
				<div style="text-align:center;padding:10px;width:500px;height:300px;">
					<div class="glyphicon glyphicon-remove-circle" style="float:right;cursor:pointer;" onclick="hideCsrModal();"></div>
					<div style="position:relative;top:160px;width:300px;">
						<p><a class="btn btn-primary" href="/checkout/alt/f4p-free-food-offer.php">Try A Free Sample</a></p><p><a class="btn btn-success" href="/video/index.php">Return To Video</a></p><p><a class="btn btn-success" href="/letter/index.php">Read A Description</a></p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php include("security-seals.php")?>
</div>
<script>
	window.onbeforeunload = grayOut;
	function grayOut(){
		var ldiv = document.getElementById('LoadingDiv');
		ldiv.style.display='block';
	}
</script>
<div id="1wkt" style="display:none;">
	<?php include_once("f4p-product-info-1wk.html"); ?>
</div>
<div id="4wkt" style="display:none;">
	<?php include_once("f4p-product-info-4wk.html"); ?>
</div>
<div id="3mkt" style="display:none;">
	<?php include_once("f4p-product-info-3mk.html"); ?>
</div>
<?php include_once ("footer.php")?>
