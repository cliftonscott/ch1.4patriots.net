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
$_SESSION['productId'] = 164; //please keep as an integer
$_SESSION['quantity'] = '1';
$_SESSION['upsell'] = TRUE; //must stay a boolean
$_SESSION['pageReturn'] = '/checkout/order.php';
include_once("Product.php");
$productDataObj = Product::getProduct($_SESSION["productId"]);
include_once("Inventory.php");
$inventory = Inventory::hasInventory(162);
if($inventory->success !== true) {
	header("Location: " . $productDataObj->soldOutPage);
	exit;
}
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

			$("#optin-form2").validate({
				rules: {
					check2: {
						required: true
					},
				},
				messages: {
					check2: '<div class="warning-check"></div>',
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
			<h1 class="darkRed text-center">&quot;<?php echo $firstName;?>, Double Your Power, Charge 2X Faster…and Protect Yourself From the #1 Most Deadly Threat&quot;</h1>
		</div>
		<div id="videobox" class="hidden-xs">
			<iframe src="//fast.wistia.net/embed/iframe/m1kcfcm5tn?videoFoam=true" allowtransparency="true" frameborder="0" scrolling="no" class="wistia_embed" name="wistia_embed" width="640" height="352"></iframe><script src="//fast.wistia.net/assets/external/iframe-api-v1.js"></script>
		</div>
		<div>
			<p><?php echo $firstName;?>, I&rsquo;d like to personally congratulate you on taking action and getting the state-of-the-art Patriot Power Generator 1500. You&rsquo;re going to absolutely love it and the peace of mind it will give you and your family. </p>
			<p>Because you made a smart decision today, you and your family will have an oasis of light and warmth no matter what happens to our crumbling power grid.</p>
			<img class="img-responsive pull-left img-padding-right media" src="/media/images/ppg/ppg-oto-warehouse-01.jpg"/>
			<p>A Patriot Power Generator 1500 has been reserved for you, and our team in the warehouse is already preparing it for shipment to your front door. In about 15 minutes, you&rsquo;ll get an email confirmation of your order details.</p>
			<p>Because you&rsquo;ve taken this important step today, I&rsquo;m going to show you how you can effectively double the power of your Patriot Power Generator 1500 and cut the charging time in half…and most importantly – protect it from a catastrophic EMP (Electro-Magnetic-Pulse) attack!</p>
			<p>I&rsquo;ll get to that in just a moment. First, I really need to tell you beyond a shadow of a doubt what a life-altering decision you&rsquo;ve made today...one that could very well save your life as well as those you love. </p>
			<p>This isn&rsquo;t just about keeping the lights on or your cell phone charged...it&rsquo;s about survival in a crisis. </p>
			<p>You deserve to be congratulated for saying, <em>&ldquo;I&rsquo;m not waiting...my family&rsquo;s well-being is too important to leave to chance,&rdquo;</em> because you understood that securing a reliable power source in the wake of a total grid failure is entirely up to you…and you took action.</p>
			<p>Now, let me get back to that simple yet powerful question I want to ask you:</p>
			<h2 class="darkRed text-center"><strong><em>How would you like to effectively DOUBLE THE POWER of your Patriot Power Generator 1500 by being able to charge it two times faster…PLUS protect your generator from a disastrous EMP attack? </em></strong></h2>
			<p>You&rsquo;d be interested in that, right? </p>
			<p>A lot of fellow patriots have told me that the Patriot Power Generator1500 is so critical to their family&rsquo;s safety and security that they would really like to boost its effectiveness and protect it against the ONE deadly threat that could render it (and the entire power grid, for that matter) completely useless… an EMP.            </p>
			<p>What&rsquo;s an EMP? An EMP is an electro-magnetic discharge that fries circuits and electronics within seconds. </p>
			<p>NASA and other scientists fear that solar flares and solar storms could cause an EMP that would result in a nation-wide blackout and throw our country back to the dark ages. But naturally occurring solar disasters are just the tip of the EMP iceberg…</p>
			<img class="img-responsive pull-right img-padding-left media" src="/media/images/ppg/ppg-oto-emp-01.jpg"/>
			<p>An EMP bomb is considered by many experts to be the <strong>#1 most deadly threat to America</strong>. They&rsquo;re relatively easy for terrorists to build and an attack could happen without any sign or warning. </p>
			<p>According to a blue-ribbon federal commission of scientific and military experts, an EMP attack could result in &ldquo;unprecedented cascading failures of our major infrastructures&rdquo;. </p>
			<p>FOX News reports that an EMP &ldquo;could destroy America&rsquo;s defenses, leaving the U.S. in a technology world equivalent to the 1800s.&rdquo; And Former CIA Director James Woolsey warns that an EMP attack could kill 9 out of every 10 Americans. </p>
			<p>The EMP threat to America is real and potentially catastrophic.  While the U.S. military has been preparing for such an attack, including recently building a $44 million dollar EMP bunker in Alaska, the civilian power grid is wide-open to attack and completely vulnerable. </p>
			<p>There&rsquo;s been nothing you could do to protect yourself from this threat… until now.</p>
			<p>Let&rsquo;s face it, your Patriot Power Generator 1500 is pretty much bulletproof, but an EMP is the ONE thing that could knock it (and everything else) offline for good.      </p>
			<h2 class="darkRed text-center center-block title-max-600"><strong>Introducing The Patriot Power Generator 1500 PLATINUM UPGRADE</strong>    </h2>
			<p>When it comes to your family, I know you want the peace of mind that PEAK power in the least amount of time, on top of ultimate EMP protection would provide. </p>
			<p>Am I right?</p>
			<p>That&rsquo;s why I&rsquo;m proud to introduce my Patriot Power Generator 1500 <strong>Platinum Upgrade</strong> today.</p>
			<p>Please understand, though…this one-time offer is ONLY available <strong>right here, right now</strong> for customers who have already purchased the Patriot Power Generator 1500. </p>
			<p>And you need to understand that if you pass this one up, you won&rsquo;t be able to get this deal anywhere else.</p>
			<p class="text-center read-warning">Please read the rest of the page below and accept or decline the offer at the bottom of the page.</p>
			<p>&nbsp;</p>
			<h3 class="text-center center-block"><strong>Here’s What You’ll Get When You Upgrade Today</strong>    </h3>
			<div class="rcBoxR10">
				<h2 class="darkRed text-center center-block title-max-600"><strong>100-Watt Folding Solar Panel</strong></h2>
				<p><strong>First, you&rsquo;ll get an additional commercial-grade, 100-watt, folding solar panel which, by itself, would cost you an extra $597. </strong></p>
				<div><img class="img-responsive center-block" src="/media/images/ppg/ppg-product-platinum-panel-01.jpg"></div>
				<p>Just like your first panel, its solar cells are manufactured by Bosch (a household name in high-quality electronics), and it has a rugged, durable metal frame with reinforced corners. This is not a fragile piece of equipment…it&rsquo;s built to be tough.</p>
				<p>This additional solar panel will:</p>
				<ul class="fa-ul">
					<li><i class="fa-li fa fa-check"></i>Effectively double your power INSTANTLY by cutting your charging time IN HALF</li>
					<li><i class="fa-li fa fa-check"></i>Give your family much needed ADDED PROTECTION </li>
					<li><i class="fa-li fa fa-check"></i>Fold easily for discreet storage and has a sturdy carrying handle for transport anywhere </li>
					<li><i class="fa-li fa fa-check"></i>Easily &ldquo;daisy-chain&rdquo; with your existing panel and generator…set it up in seconds!</li></ul></div>
			<div class="rcBoxR10">
				<h2 class="darkRed text-center center-block title-max-600"><strong>Military-Grade EMP Bag</strong></h2>
				<p><strong>2nd, you&rsquo;ll also get an advanced MILITARY-GRADE EMP bag that will protect your generator or other critical electronics from a deadly EMP attack, a $897 value.</strong></p>
				<div><img class="img-responsive center-block" src="/media/images/ppg/ppg-product-platinum-empbag-01.jpg"></div>
				<p><strong>This break-through EMP bag: </strong></p>
				<ul class="fa-ul">
					<li><i class="fa-li fa fa-check"></i>Has been designed to withstand lightening, solar flares, and yes, even a full-scale EMP attack</li>
					<li><i class="fa-li fa fa-check"></i>Is painstakingly constructed with a revolutionary woven copper mesh inner core surrounded by waterproof ballistic nylon.</li>
					<li><i class="fa-li fa fa-check"></i>Passes military testing standard MIL-STD-461F RS-105 (50kV/m^2 Transient Electromagnetic Field Radiated Susceptibility Test)</li>
					<li><i class="fa-li fa fa-check"></i>Blocks the frequencies produced by an EMP and conducts high voltages around the bag, protecting your generator inside.</li>
					<li><i class="fa-li fa fa-check"></i>This technology has been proven by Tesla Coil testing, with voltages that can reach upward of 1 million volts.</li>
					<li><i class="fa-li fa fa-check"></i>Insures that your generator is protected from natural or man-made EMP disasters…and that it will be ready and waiting when you need it most.</li>
				</ul>
				<p>Until now, only the military had access to this technology. As far as I know, this is the only product of its kind available to civilians that meets stringent military standards.</p>
			</div>
			<p>Picture this, folks...it&rsquo;s a few months or even a year down the road...</p>
			<p>Suddenly, the whole world goes berserk. A world-wide EMP event has wiped out power for millions. </p>
			<p>But you&rsquo;re protected…</p>
			<p>How <strong><em>safe and secure </em></strong>would you feel knowing that you&rsquo;ve got as much power as you need to weather the crisis?</p>
			<p>Plus, doubling the speed of recharging your generator doesn&rsquo;t mean doubling the space you need! Your additional folding solar panel and EMP bag are just as portable and space-friendly as your Patriot Power Generator 1500 – and can fit compactly and covertly in your home, RV, truck or car for easy transport to wherever you&rsquo;re going. </p>
			<p>So even if you only have 5 minutes to &ldquo;lock, load and go&rdquo;...you won&rsquo;t be slowed down at all.</p>
			<p>I want to make this a really easy decision for you, so if you act now to get the Platinum Upgrade, I&rsquo;m going to give you a $500 discount off of the regular price AND give you FREE SHIPPING.</p>
			<h2 class="darkRed text-center center-block title-max-600"><strong>YOU SAVE AN UNBELIEVABLE $500 PLUS You Get FREE Shipping!</strong></h2>
			<p>That&rsquo;s right, effectively double your power by cutting your charge time in half...and protect it all against a deadly EMP.<strong></strong></p>
			<p>So here&rsquo;s the deal…You can get the Platinum Upgrade, including the additional 100-watt folding solar panel and the military-grade EMP bag for just one additional payment of $997, with FREE SHIPPING.          </p>
			<p>You&rsquo;ve already made a great decision with your purchase of the Patriot Power Generator 1500. You&rsquo;ll be sleeping well at night, not worried about power outages from storms, grid failures, or anything else Mother Nature or man-made chaos can throw at you. </p>
			<p>But when it comes to your family, I know you want <strong>MAXIMUM POWER...AND MAXIMUM PROTECTION.</strong></p>
			<p>That&rsquo;s exactly what you&rsquo;ll get when you get the Platinum Upgrade today.</p>
			<div style="padding-bottom:20px;"><img class="img-responsive center-block"src="/media/images/ppg/ppg-product-platinum-01.jpg" alt="Platinum Package"/></div>
			<p class="text-center">Click the &ldquo;CLICK TO ACCEPT&rdquo; button below to claim your Platinum Upgrade now.</p>

			<div style="padding-bottom:20px;">
				<form action="/checkout/process.php" method="post" accept-charset="utf-8" id="optin-form">
					<div class="text-center center-block">
						<input type="image" src="/assets/images/buttons/btn-orange-click-accept-01.jpg" name="submit" class=" img-responsive center-block" onClick="ga('send', 'event', 'upsell-1-ppg-platinum-upgrade', 'ppg-platinum-upgrade-accept', 'click-to-accept-first-button');" />
					</div>
					<input type="hidden" name="quantity" id="quantity" value="1">
					<div class="terms">
						<div style="margin-right:5px;float: left;">
							<input type="checkbox" id="check1" name="check1">
							<img src="/assets/images/misc/yes-01.jpg" width="74" height="34" alt="Yes">
						</div>
						<div style="line-height: 1.2;">I want to add the Platinum Upgrade to my order at the 1-time discount sale price of $997.  I will get FREE Shipping with my EMP Bag and Solar Panel (a $100 value) as well as a 365-day guarantee and 3-year extended warranty.</div>
					</div>
				</form>
			</div>

			<h2 class="darkRed text-center">365 Day IRON CLAD GUARANTEE</h2>
			<p>And to give you even greater peace of mind, I&rsquo;m going to also give you a 365 day, 100% no-nonsense, no gimmicks money back guarantee! </p>
			<p>Take 365 days form time of purchase to try it for yourself. If you decide for any reason that it&rsquo;s not for you, we will gladly give you a refund if you return it.</p>
			<p>Yes, you read that right, you get a full year money-back guarantee.</p>
			<p>But wait, there&rsquo;s more.</p>
			<p>In addition to giving you a $500 discount and free shipping, I&rsquo;m ALSO going to throw in... </p>
			<h2 class="darkRed text-center">Shipment Insurance AND A 3 Year Extended Warranty…For EVERYTHING! </h2>
			<p>Yup, you heard that right. Your <strong>ENTIRE</strong> purchase will be covered, including:</p>
			<ul class="fa-ul">
				<li><i class="fa-li fa fa-check-square"></i><strong>Your Patriot Power Generator 1500</strong></li>
				<li><i class="fa-li fa fa-check-square"></i><strong>Your first 100-watt solar panel</strong></li>
				<li><i class="fa-li fa fa-check-square"></i><strong>Your second 100-watt solar panel</strong></li>
				<li><i class="fa-li fa fa-check-square"></i><strong>Your EMP bag</strong></li>
			</ul>
			<div style="padding-bottom:20px;padding-top:20px;"><img class="img-responsive center-block"src="/media/images/ppg/ppg-product-platinum-gen-01.jpg" alt="Platinum Package"/></div>
			<p>Here&rsquo;s how it works. If your package is lost or damaged in transit OR if any of your equipment malfunctions during normal use for the next three years, we&rsquo;ll send you a FREE replacement right away. Your investment will be insured and protected with this free bonus.</p>
			<p>I was only able to produce a very limited quantity of these Platinum Upgrades, so I don&rsquo;t know how long I&rsquo;m going to have them available at the preferred customer discount price of $997. </p>
			<p>To make sure that you don&rsquo;t miss out on getting yours, go to the <strong>&ldquo;Click to Accept&rdquo;</strong> button below to add the Patriot Power Generator Platinum Upgrade to your order now.</p>
			<p>This Platinum Upgrade will maximize your results and protect your investment.</p>
			<p>Please understand, I&rsquo;m not trying to pressure you, but once these are gone, they&rsquo;re GONE...and it&rsquo;ll be at least 5 long months before I MIGHT get more in stock...IF I can even get more!</p>
			<p>It&rsquo;s a painstaking manufacturing process for all the components, especially the EMP bag which has copper mesh that has to be woven BY HAND.</p>
			<p>Who knows when a catastrophe might be barreling down on you like an F5 tornado...it could be 5 years, 5 days or 5 minutes from now…but what I do know is that when it hits, most people will be helpless, afraid, and completely at the mercy of fate. </p>
			<h2 class="darkRed text-center center-block title-max-560">Will You Be One Of Them? Or Will You Be Prepared?</h2>
			<p>Remember, this Platinum Upgrade is NOT AVAILABLE in any store, on any website, or from any distributor. You&rsquo;re not going to find this on eBay, my friend. </p>
			<p>When you leave this page, this offer will be gone forever.</p>
			<p>Click the &ldquo;Click to Accept&rdquo; button NOW to secure your upgrade<strong> </strong>and get the peace of mind you can&rsquo;t put a price tag on.<strong></strong></p>
			<p>DO IT NOW while there&rsquo;s still time – before my supply is wiped out and you miss your chance!</p>
			<div style="padding-bottom:20px;"><img class="img-responsive center-block"src="/media/images/ppg/ppg-product-platinum-02.jpg" alt="Platinum Package"/></div>
			<p class="text-center">Click the &ldquo;CLICK TO ACCEPT&rdquo; button below.</p>
			<div>
				<form action="/checkout/process.php" method="post" accept-charset="utf-8" id="optin-form2">
					<div class="text-center center-block">
						<input type="image" src="/assets/images/buttons/btn-orange-click-accept-01.jpg" name="submit" class=" img-responsive center-block" onClick="ga('send', 'event', 'upsell-1-ppg-platinum-upgrade', 'ppg-platinum-upgrade-accept', 'click-to-accept-bottom');" />
					</div>
					<input type="hidden" name="quantity" id="quantity" value="1">
					<div class="terms">
						<div style="margin-right:5px;float: left;">
							<input type="checkbox" id="check2" name="check2">
							<img src="/assets/images/misc/yes-01.jpg" width="74" height="34" alt="Yes">
						</div>
						<div style="line-height: 1.2;">I want to add the Platinum Upgrade to my order at the 1-time discount sale price of $997.  I will get FREE Shipping with my EMP Bag and Solar Panel (a $100 value) as well as a 365-day guarantee and 3-year extended warranty.</div>
					</div>

					<div class="text-center" style="margin-top:20px;"><strong>OR</strong></div>
				</form>
				<div class="noThanks">
					<a href="/checkout/thankyou.php" onClick="ga('send', 'event', 'upsell-1-ppg-platinum-upgrade', 'ppg-platinum-upgrade-decline', 'no-thanks-link-bottom');">No Thanks</a> – I want to give up this opportunity.<br>
					I understand that I will not receive this special offer again.
				</div>

			</div>



		</div>
	</div>


<?php include_once("template-bottom.php"); ?>