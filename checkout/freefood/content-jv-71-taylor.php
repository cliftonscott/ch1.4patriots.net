<?php
include_once("Platform.php");
$platform = new Platform();
require_once("Meta.php");
$metaDataObj = new Meta();
require_once("Customer.php");
$customerObj = new Customer();
require_once("MobileDetect.php");
$detect = new Mobile_Detect;
require_once("JavelinApi.php");
$javelinApi = JV::load();
if($customerDataObj = $customerObj->getStoredCustomer()) {
	$preFill["firstName"] = $customerDataObj->firstName;
	$preFill["lastName"] = $customerDataObj->lastName;
	$preFill["email"] = $customerDataObj->email;
	$preFill["phone"] = $customerDataObj->phone;
	$preFill["billing-address"] = $customerDataObj->billingAddress1;
	$preFill["billing-city"] = $customerDataObj->billingCity;
	$preFill["billing-country"] = $customerDataObj->billingCountry;
	$preFill["billing-state"] = $customerDataObj->billingState;
	$preFill["billing-state-name"] = $customerDataObj->billingStateName;
	$preFill["billing-zip"] = $customerDataObj->billingZip;
	$preFill["shipping-address"] = $customerDataObj->shippingAddress1;
	$preFill["shipping-city"] = $customerDataObj->shippingCity;
	$preFill["shipping-country"] = $customerDataObj->shippingCountry;
	$preFill["shipping-state"] = $customerDataObj->shippingState;
	$preFill["shipping-state-name"] = $customerDataObj->shippingStateName;
	$preFill["shipping-zip"] = $customerDataObj->shippingZip;
} elseif (!empty($_GET["email"])) {
	include("Limelight.php");
	$ll = new Limelight();
	$customerDataObj = $ll->getCustomerByEmail($_GET["email"]);
	$preFill["firstName"] = $customerDataObj->firstName;
	$preFill["lastName"] = $customerDataObj->lastName;
	$preFill["email"] = $customerDataObj->email;
	$preFill["phone"] = $customerDataObj->phone;
	$preFill["billing-address"] = $customerDataObj->billingAddress1;
	$preFill["billing-city"] = $customerDataObj->billingCity;
	$preFill["billing-country"] = $customerDataObj->billingCountry;
	$preFill["billing-state"] = $customerDataObj->billingState;
	$preFill["billing-state-name"] = $customerDataObj->billingStateName;
	$preFill["billing-zip"] = $customerDataObj->billingZip;
	$preFill["shipping-address"] = $customerDataObj->shippingAddress1;
	$preFill["shipping-city"] = $customerDataObj->shippingCity;
	$preFill["shipping-country"] = $customerDataObj->shippingCountry;
	$preFill["shipping-state"] = $customerDataObj->shippingState;
	$preFill["shipping-state-name"] = $customerDataObj->shippingStateName;
	$preFill["shipping-zip"] = $customerDataObj->shippingZip;
	$_SESSION["customerDataArray"] = (array)$customerDataObj;
}
$view->customer = $customerDataObj;
if(!empty($customerDataObj->shippingCity)) {
	$view->customer->shippingCityState = $customerDataObj->shippingCity . "X " . $customerDataObj->shippingStateName;
} else {
	$view->customer->shippingCityState = " your area";
}
?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
	<meta charset="UTF-8">
	<!--<meta http-equiv="X-UA-Compatible" content="IE=edge">-->
	<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE9">

	<title>4Patriots | Free + Shipping</title>

	<meta name='description' content=''>
	<meta name='keywords' content=''>
	<meta name="generator" content="" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<link href="/assets/css/bootstrap.css" rel="stylesheet">

	<link rel="shortcut icon" href="">
	<link href="/assets/css/styles-content-t.css" rel="stylesheet">
	<link href="/assets/css/styles-t.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="/assets/css/ie10-t.css" media="screen, projection"/><![endif]-->

	<link href='//fonts.googleapis.com/css?family=Allerta+Stencil' rel='stylesheet' type='text/css'>
	<link href='//fonts.googleapis.com/css?family=Oswald:400,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<link href='https://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,700,600,300,800' rel='stylesheet' type='text/css'>

	<script type="text/javascript" src="/assets/js/html5shiv.js"></script>
	<script type="text/javascript" src="/assets/js/respond.min.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
	<script src="/assets/js/common/bootstrap.min.js"></script>
	<script src="/assets/js/modernizr-2.5.2.js" type="text/javascript"></script>
	<script src="/assets/js/jquery.easing.min.js"></script>
	<script src="/assets/js/scrolling-nav.js"></script>
	<script src="<?php echo $REQUEST_PROTOCOL;?>://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
	<script src="/assets/js/common/bootstrap.min.js"></script>
	<script src="/js/patriot.js"></script>

	<script src='/js/checkout-states-jv-71-t.js'></script>

	<script>
		setInterval(function time() {
			var d = new Date();
			var hours = 23 - d.getHours();
			var min = 59 - d.getMinutes();
			if ((min + '').length == 1) {
				min = '0' + min;
			}
			var sec = 59 - d.getSeconds();
			if ((sec + '').length == 1) {
				sec = '0' + sec;
			}
			jQuery('#the-countdown p').html(hours + 'H : ' + min + 'M : ' + sec + 'S')
		}, 1000);
	</script>
	<style>
		/**/
		/* error state */
		/**/
		.sky-form .state-error input,
		.sky-form .state-error select,
		.sky-form .state-error select + i,
		.sky-form .state-error textarea,
		.sky-form .radio.state-error i,
		.sky-form .checkbox.state-error i,
		.sky-form .toggle.state-error i,
		.sky-form .toggle.state-error input:checked + i {
			background: #fff0f0;
		}

		/**/
		/* success state */
		/**/
		.sky-form .state-success input,
		.sky-form .state-success select,
		.sky-form .state-success select + i,
		.sky-form .state-success textarea,
		.sky-form .radio.state-success i,
		.sky-form .checkbox.state-success i,
		.sky-form .toggle.state-success i,
		.sky-form .toggle.state-success input:checked + i {
			background: #f0fff0;
		}
		.usertext p{
			font-family:Helvetica regular, Arial, sans-serif;
			font-size: 14px;
			line-height: 18px;
		}

		.arrowR{
			width:83px;
			position: absolute;
			margin-left: -40px;
			margin-top: 16px;
		}
		.arrowL{
			width:83px;
			position: absolute;
			margin-left: -43px;
			margin-top: 16px;
			-moz-transform: scaleX(-1);
			-o-transform: scaleX(-1);
			-webkit-transform: scaleX(-1);
			transform: scaleX(-1);
			filter: FlipH;
			-ms-filter: "FlipH";
		}

		.btn-2 {
			background: #ff9427 url(http://dev.pph.4patriots.net/assets/images/buttons/pattern-02-01.svg) no-repeat right top;
			-webkit-background-size: cover;
			-moz-background-size: cover;
			-o-background-size: cover;
			background-size: cover;  -webkit-border-radius: 9;
			-moz-border-radius: 9;
			border-radius: 9px;
			-webkit-box-shadow: 0px 3px 8px #666666;
			-moz-box-shadow: 0px 3px 8px #666666;
			box-shadow: 0px 3px 8px #666666;
			font-family: 'Oswald', sans-serif;
			color: #fff;
			font-size: 40px;
			letter-spacing: 3px;
			padding: 15px 31px 15px 31px;
			border: solid #FFDD00 6px;
			text-decoration: none;
			width:435px;
		}
		.btn-2:hover {
			background: #ef8220 url(http://dev.pph.4patriots.net/assets/images/buttons/pattern-02-02.svg) no-repeat right top;
			-webkit-background-size: cover;
			-moz-background-size: cover;
			-o-background-size: cover;
			background-size: cover;
			text-decoration: none;
			-webkit-tap-highlight-color: rgba(0,0,0,0);
			cursor:pointer;
		}
		.popover {
			max-width: 650px;
			width: auto;
		}
		.outLineBoxDarkBlue {
			margin-right: auto;
			margin-left: auto;
			padding: 20px;
			border: 2px solid #125597;
			margin-top: 20px;
			margin-bottom: 20px;
		}
		@import url('//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css');
		@import url('//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css');
		.panel-heading {
			cursor: pointer;
		}
		/* CSS Method for adding Font Awesome Chevron Icons */
		.accordion-toggle:after {
			/* symbol for "opening" panels */
			font-family:'FontAwesome';
			content:"\f146";
			float: right;
			color: inherit;
			margin-right: 2.75%;
		}
		.panel-heading.collapsed .accordion-toggle:after {
			/* symbol for "collapsed" panels */
			content:"\f0fe";
		}
		.safety{
			margin-bottom: 0;
		}
		.phone-number{
			background-color:transparent;
			text-align: right;
			margin-top: -20px;
			padding-top: 22px;
		}
		.phone-btn{
			background-color:transparent;
		}
		.stepone{
			margin-top: 82px;
		}
		a.scroll-link{
			text-decoration: none; /*for Chrome*/
		}
		.top-head-logo{
			float: left;
			padding-bottom: 5px;
		}
		.top-head-phone{
			padding-right: 0;
			margin-right: 0;
			float: right;
			font-size: 18px;
		}
		.securtiy-seals{
			padding: 10px 10px 10px 10px;
		}
		.mcafee{
			padding-top:11px;
			width: 100%;
		}
		.norton{
			padding-top:11px;
			padding-left: 3px;
			width: 100%;
		}
		.honest{
			padding-top:21px;
			padding-left:10px;
			width: 100%;
		}
		.trustusa{
			padding-top:10px;
			padding-left: 20px;
			height: 68px;
		}
		.btn.disabled,
		.btn[disabled],
		fieldset[disabled] .btn {
			cursor:default;
			filter: alpha(opacity=65);
			-webkit-box-shadow: none;
			box-shadow: none;
			opacity: 1.0;
		}
		@media (max-width: 1023px){
			.norton{
				padding-top: 13px;
			}

			.mcafee{
				padding-top:13px;
			}
			.trustusa{
				padding-left: 14.5px;
			}
		}
		@media (max-width: 997px){
			.form-fw{
				width: 100%;
			}
			.col-sm-push-4{
				float: none;
			}

			.safety{
				padding-bottom: 1px;
			}
			.stepone{
				margin-top: 0;
			}
			.securtiy-seals{
				padding: 10px 0 12px 0;
				text-align: center;
			}
			.mcafee{
				padding-top:11px;
				width: 105px;
			}
			.norton{
				padding-top:11px;
				padding-left: 0;
				width: 105px;
			}
			.honest{
				padding-top:19px;
				padding-left:0;
				width: 105px;
			}
			.trustusa{
				padding-top:10px;
				padding-left: 0;
				height: 68px;
			}
		}
		@media (max-width: 767px){
			.securtiy-seals{
				padding: 10px 0 10px 0;
				text-align: center;
			}
			.mcafee{
				padding-top:10px;
				width: 105px;
			}
			.norton{
				padding-top:0;
				width: 105px;
			}
			.honest{
				padding-top:10px;
				width: 105px;
			}
			.trustusa{
				padding-top:10px;
				height: 68px;
			}
			.phone-number{
				text-align: center;
			}
		}
		@media (max-width: 567px){
			.whats-included{
				width: 100%;
			}
			.arrowR{
				display:none;
			}
			.arrowL{
				display:none;
			}

			.btn-2 {
				width:100%;
			}
		}
		@media (max-width: 500px){
			.btn-2 {
				font-size:35px;
			}
		}
		@media (max-width: 460px){
			.btn-2 {
				font-size:30px;
			}
		}
		@media (max-width: 430px){
			.btn-2 {
				font-size:28px;
			}
		}
	</style>
</head>
	<body>
		<?php include_once("ga-data-layer.php"); ?>

		<?php if($platformCountDownToDate) { ?>
			<div id="endofDateCountDown"></div>
		<?php } ?>
		<div id="LoadingDiv" style="display:none;">One Moment Please...<br />
			<img src="/assets/images/misc/progressbar.gif" width="220" height="19" class="displayed" alt="" />
		</div>
		<div style="margin-top: -90px" id="wrapper">
			<section style="margin-top: -10px" class="grad-white-brown">
				<div class="section-inner">
					<div class="row pad-15-t">
						<div class="top-head-logo"><img src="/assets/images/logo-small.png" width="150" alt="food4patriots" class="img-responsive center-block"></div>
						<div class="top-head-phone btn disabled hidden-xs"><span><i class="fa fa-phone"></i></span> Phone: 1-800-598-5012</div>
					</div>
				</div>
			</section>

			<section style="margin-bottom: -30px; padding-bottom: 0;">
				<div class="section-inner">
					<div class="row pad-15-t">
						<div class="top-head"><p>ACT NOW, Before It's Too Late!</p></div>
						<div id="the-countdown"><p></p></div>
					</div>
				</div>
			</section>
			<section class="section-2">
				<div class="section-inner">
					<div class="block bg-white">
						<div class="pad-10-b">
							<div class=" pad-15-t pad-15-b">
								<h2 style="text-align: center;font-size: 50px;line-height: 60px" class="color-red dark">WARNING: Free Survival Food is Almost Gone…</h2>
							</div>
							<div class="row">
								<div class="wistia_responsive_padding" style="position:relative; margin-bottom:0">
									<div class="wistia_responsive_wrapper">
										<div class="wistia_responsive_padding" style="padding:56.25% 0 0 0;position:relative;"><div class="wistia_responsive_wrapper" style="height:100%;left:0;position:absolute;top:0;width:100%;"><iframe src="//fast.wistia.net/embed/iframe/f1958k8cul?videoFoam=true" allowtransparency="true" frameborder="0" scrolling="no" class="wistia_embed popoverhide" name="wistia_embed" allowfullscreen mozallowfullscreen webkitallowfullscreen oallowfullscreen msallowfullscreen width="100%" height="100%"></iframe></div></div>
									</div>
								</div>
								<div class="block text-center btn-width" onclick="$('#firstName').focus();"><a href="#" class="green button big btn-width scroll-link" data-id="order-form">YES… Send My FREE Survival Food Kit</a></div>
							</div>

							<h2 style="text-align: center" class="color-black dark pad-10-t">The Rush is on as Thousands Claim FREE <br class="hidden-xs"> Food4Patriots 72-Hour Survival Food Kits!
							</h2>
							<div class="pad-30-b medium-size700">
								<img style="width: 100%" class="img-responsive center-block pad-20-t" src="/media/images/f4p/f4p-72-hour-kit-06-700x523.png" alt="Alexapure Pro"/>
							</div>
							<div class="row text-center">
								<div class="col-xs-6 col-sm-4 whole-thing2"><img class="pad-10-b" style="width:55px" src="/assets/images/misc/25-year-shelf-life.svg"><h4 class="pad-10-b">25-Year Shelf Life</h4><p>Space-age resealable Mylar packaging keeps our food fresh for 25 years or more.</p></div>
								<div class="col-xs-6 col-sm-4 whole-thing2"><img class="pad-10-b" style="width:55px" src="/assets/images/misc/easy-to-prepare.svg"><h4 class="pad-10-b">Easy to Prepare</h4><p>Just add boiling water and stir. Wait a few minutes and enjoy<br class="hidden-xs"> a great meal.</p></div>
								<!-- Optional: clear the XS cols if their content doesn't match in height -->
								<div class="clearfix visible-xs-block"></div>
								<div class="col-xs-6 col-sm-4 whole-thing2"><img class="pad-10-b" style="width:55px" src="/assets/images/misc/guaranteed-delicious.svg"><h4 class="pad-10-b">Guaranteed Delicious</h4><p>Love our food or return it within 365 days for your Full<br class="hidden-xs"> Money Back.</p></div>
							</div>
						</div>
					</div>
				</div>
			</section>

			<section class="section-3">
				<div class="section-inner">
					<div class=" pad-30">
						<h2 style="text-align: center" class="color-red dark">This is no Ordinary Food… Not by A Long Shot</h2>
					</div>
				</div>
			</section>

			<section class="section-2">
				<div class="section-inner">
					<div class="pad-30-t-b">
						<p>This is delicious, nutritious, &ldquo;<strong>super survival food</strong>&rdquo; and it could save your life in a disaster!</p>
						<p>No one knows where the next crisis will hit&hellip; or when.</p>
						<p>But when it does hit, finding food could be near-impossible as food stores are quickly sold out or have their shelves stripped bare by hungry mobs.</p>
						<p>You don&rsquo;t want your family standing in line with thousands of desperate strangers like those poor folks had to in Hurricane Katrina &ndash; or be forced to dig through dumpsters like New Yorkers did during Superstorm Sandy.</p>
					</div>
				</div>
			</section>

			<section class="section-3">
				<div class="section-inner">
					<div class=" pad-30">
						<h2 style="text-align: center" class="color-red dark">Act Now. Claim Your FREE 72-Hour Survival Food <br class="hidden-xs"> Kit While it is Still Available</h2>
					</div>
				</div>
			</section>

			<section class="section-2">
				<div class="section-inner">
					<p class="pad-30-t">Giving away survival food for free has never been done before. And the response has been overwhelming! Our supply of 72-hour kits that we can give away is rapidly disappearing, so fast action is absolutely necessary to avoid disappointment.</p>
					<p>The regular price of our 72-hour survival food kit is $27.00 plus shipping and handling. But right now it’s yours <strong>FREE</strong>. All we ask is you help cover the low shipping cost.</p>

					<h2 style="text-align: center" class="color-red dark">Here’s What Our Satisfied Customers Have to Say:</h2>
					<p></p>
					<p>Over the years, we’ve received countless messages from customers, telling us how much they enjoy Food4Patriots survival foods:</p>
					<p></p>
					<div class="medium-size700 pad-10-b">
						<div class="mock-outer ">
							<div class="mock-inner">
								<div class="fb-group-picrow">
									<img src="/media/images/misc/img-testimonial-diana.jpg">
									<div class="fb-group-text">
										<h5 class="fbh5"><b>Colleen <em>Carter</em></b></h5>
										<span class="fb-group-date">January 11 at 9:15am &#183; <i class="fa fa-user"></i></span>
									</div>
								</div>
								<div class="usertext">
									<p>I am very happy with all the survival foods I have purchased & their prices are very reasonable & they are also non-GMO. Taste great & they are healthy for your body… "Food 4 Patriots" is the way to get the best for your money!!!!</p>
								</div>
								<div class="mock-title-cap-text">Like &#183; Comment &#183; Share</div>
							</div>
						</div>
						<div class="mock-outer">
							<div class="mock-inner">
								<div class="fb-group-picrow">
									<img src="/media/images/misc/img-testimonial-lynn.jpg">
									<div class="fb-group-text">
										<h5 class="fbh5"><b>Linda <em>Peters</em></b></h5>
										<span class="fb-group-date">March 21 at 3:47pm &#183; <i class="fa fa-user"></i></span>
									</div>
								</div>
								<div class="usertext">
									<p>I just wanted to take a few minutes to thank you for your integrity and sharing in our (my husband, daughter, and I) values for America. "One Nation Under God " is our determined vision for the United States. I pray that we will never need to use this food for crisis, but I am glad we are establishing a preparation foundation.</p>
								</div>
								<div class="mock-title-cap-text">Like &#183; Comment &#183; Share</div>
							</div>
						</div>
						<div class="mock-outer ">
							<div class="mock-inner">
								<div class="fb-group-picrow">
									<img src="/media/images/misc/img-testimonial-rolf.jpg">
									<div class="fb-group-text">
										<h5 class="fbh5"><b>Herron <em>Dedrick</em></b></h5>
										<span class="fb-group-date">January 15 at 10:08am &#183; <i class="fa fa-user"></i></span>
									</div>
								</div>
								<div class="usertext">
									<p>I now feel very secure in the event of an emergency that might cut off food distribution channels. Also, in the event that our economy crashes not if, but when… Again, thank you for what you have put together to help folks like me.</p>
								</div>
								<div class="mock-title-cap-text">Like &#183; Comment &#183; Share</div>
							</div>
						</div>
						<div class="mock-outer">
							<div class="mock-inner">
								<div class="fb-group-picrow">
									<img src="/media/images/misc/img-testimonial-jeff.jpg">
									<div class="fb-group-text">
										<h5 class="fbh5"><b>Andy <em>Kinard</em></b></h5>
										<span class="fb-group-date">February 1 at 11:33am &#183; <i class="fa fa-user"></i></span>
									</div>
								</div>
								<div class="usertext">
									<p>Thank you for what you are doing, and for your generosity. Is there a way that I can inform my two children, my two brothers and both of my sisters-in-law about this offer?… Not trying to be greedy, just better prepared... May the Lord richly bless you.</p>
								</div>
								<div class="mock-title-cap-text">Like &#183; Comment &#183; Share</div>
							</div>
						</div>
					</div>
				</div>
			</section>

			<section class="section-3">
				<div class="section-inner">
					<div class=" pad-30">
						<h2 style="text-align: center" class="color-red dark">You Can Enjoy Your FREE Survival Food Tonight... <br class="hidden-xs">OR 25 Years From Now</h2>
					</div>
				</div>
			</section>

			<section style="padding-bottom: 30px" class="section-2">
				<div class="section-inner">
					<div class="medium-size700 pad-30-t-b">
						<img style="width: 100%" class="img-responsive center-block" src="/media/images/f4p/f4p-72-hour-kit-04.jpg" alt="Alexapure Pro"/>
					</div>
					<p>All Food4Patriots survival food is made from the finest local-grown ingredients, prepared and packaged with pride in the USA!</p>
					<p>And thanks to advanced Mylar packaging, our foods are guaranteed to taste as good in 25 years as they do today.&nbsp;</p>
					<p>Every 72-hour kit that&rsquo;s being given away contains four servings each of such familiar dishes as:</p>
					<?php include("f4p-72hour-kit-whatsincluded.html");?>
					<p>They’re made with award-winning recipes. Your family will enjoy meals much like those they’re eating now.</p>
					<p>And the best part about Food4Patriots meals, is that they are quick and easy to make. <script charset="ISO-8859-1" src="//fast.wistia.com/assets/external/E-v1.js" async></script><span class="wistia_embed wistia_async_1ljg134yzq popover=true popoverAnimateThumbnail=true popoverContent=link" style="display:inline"><a href="#" onclick="wistiaPause()">Click here</a></span> to see the Traveler’s Stew being prepared. </p>
					<p>And just to make this a complete no-brainer for you...</p>
					<h2 style="text-align: center" class="color-red dark pad-15-b">You Are 100% Protected by My Outrageous<br class="hidden-xs"> 365-Day Full Money Back Guarantee</h2>
					<div class="outLineBoxDarkBlue">
						<p><img style="margin-top: 3%" src="/media/images/misc/seal-guarantee-satisfaction.jpg" alt="Guarantee #1" class="pull-left img-responsive media">
						<p style="margin-top: 5.5%"><strong>Every purchase protected by our 365-Day Full Money Back Guarantee!</strong> You can feel completely confident that your Food4Patriots survival food will meet or exceed your expectations. Go ahead and try our products. If for any reason – or no reason at all – you are not completely satisfied, simply return your survival food within 365 days for a full refund. You literally can’t lose!</p>
						<div class="clearfix"></div>
					</div>
					<div class="clearfix"></div>
					<p>There&rsquo;s a lot going on in the world to be concerned about &ndash; terrorist attacks, earthquakes, tornadoes, economic unrest, and so much more.</p>
					<p>You owe it to your family to prepare now for uncertain days ahead.</p>
					<p>A free Food 4Patriots 72-hour survival food kit is the ideal way to get started on or add to a survival food stockpile.</p>
					<p><strong>Regularly priced at $27.00 plus shipping and handling, now FREE while supplies last </strong>(limit one per household, just cover shipping and handling)<strong>&nbsp;--&nbsp;</strong>get yours now before it&rsquo;s gone!</p>
					<div class="pad-30-b">
						<div class="block text-center btn-width" onclick="$('#firstName').focus();"><a href="#" class="green button big btn-width scroll-link" data-id="order-form">YES… Send My FREE Survival Food Kit</a></div>
					</div>
					<?php include_once ('customer-form-v2.php'); ?>
				</div>
			</section>

			<section class="section-2">
				<div class="section-inner">
					<div class="medium-size700">
						<div class="mock-outer ">
							<div class="mock-inner">
								<div class="fb-group-picrow">
									<img src="/media/images/misc/img-testimonial-matt.jpg">
									<div class="fb-group-text">
										<h5 class="fbh5"><b>Matt <em>Grout</em></b></h5>
										<span class="fb-group-date">March 3 at 1:19pm &#183; <i class="fa fa-user"></i></span>
									</div>
								</div>
								<div class="usertext">
									<p>For a long time I was thinking about food storage without the chemically induced garbage (MRE) they sell to people. I know it must have taken a lot of hard work, time, effort, and dedication to bring this product about... looking forward to purchasing more product after I get and eat some to test it with my friends... Thanks again for the piece of mind.</p>
								</div>
								<div class="mock-title-cap-text">Like &#183; Comment &#183; Share</div>
							</div>
						</div>
						<div style="margin-bottom: 40px" class="mock-outer">
							<div class="mock-inner">
								<div class="fb-group-picrow">
									<img src="/media/images/misc/img-testimonial-luther.jpg">
									<div class="fb-group-text">
										<h5 class="fbh5"><b>Luther <em>Cauthen</em></b></h5>
										<span class="fb-group-date">February 20 at 10:05am &#183; <i class="fa fa-user"></i></span>
									</div>
								</div>
								<div class="usertext">
									<p>I love your product... It allows me the feeling of being self-reliant to know my wife and I have the ability to survive an event of emergency… I would rather have something and not need it than to need something and not have it... I have recommended this product to several friends and family.</p>
								</div>
								<div class="mock-title-cap-text">Like &#183; Comment &#183; Share</div>
							</div>
						</div>
					</div>
					<div class="outLineBoxDarkBlue">
						<p><img style="margin-top: 3%" src="/media/images/misc/seal-guarantee-satisfaction.jpg" alt="Guarantee #1" class="pull-left img-responsive media">
						<p style="margin-top: 5.5%"><strong>Every purchase protected by our 365-Day Full Money Back Guarantee!</strong> You can feel completely confident that your Food4Patriots survival food will meet or exceed your expectations. Go ahead and try our products. If for any reason – or no reason at all – you are not completely satisfied, simply return your survival food within 365 days for a full refund. You literally can’t lose!</p>
						<div class="clearfix"></div>
					</div>
					<h2 style="text-align: center" class="color-red dark pad-30-t-b">Don’t Be Disappointed – Claim Your FREE Food4Patriots 72-Hour<br class="hidden-xs"> Survival Food Kit Before They’re All Gone!</h2>
					<div class="pad-30-b">
						<div class="block text-center btn-width" onclick="$('#firstName').focus();"><a href="#" class="green button big btn-width scroll-link" data-id="order-form">YES… Send My FREE Survival Food Kit</a></div>
					</div>
				</div>
				<div style="background-color: #f8f8f8" class="priority-lists pad-30-t-b">
					<h2 style="font-size: 30px" class="color-red dark section-inner pad-10-b">Frequently Asked Questions:</h2>
					<div class="panel-group" id="accordion">
						<div style="border-radius: 0" class="panel panel-default section-inner">
							<div class="panel-heading collapsed" data-toggle="collapse" data-parent="#accordion" data-target="#faq1">
								<p style="font-size: 20px;color: #0c83e7" class="panel-title accordion-toggle section-inner"><strong>Q: Where is your food made?</strong></p>
							</div>
							<div id="faq1" class="panel-collapse collapse">
								<div style="background-color: #f8f8f8" class="panel-body">
									<div style="padding-left:20px;" class="row"><p>Our food is made in an FDA approved and inspected facility right here in the United States. We source US-grown ingredients whenever possible and the entire food production process happens right here in the good ole US of A!</p></div>
								</div>
							</div>
						</div>
						<div style="border-radius: 0" class="panel panel-default section-inner">
							<div class="panel-heading collapsed"   data-toggle="collapse" data-parent="#accordion" data-target="#faq2">
								<p style="font-size: 20px;color: #0c83e7" class="panel-title accordion-toggle section-inner"><strong>Q: Where can I find the ingredients/nutritional information for each food?</strong></p>
							</div>
							<div id="faq2" class="panel-collapse collapse">
								<div style="background-color: #f8f8f8" class="panel-body">
									<div style="padding-left:20px" class="row"><p>We are pleased to provide you with a full list of each and every ingredient used to make our foods. We have even included the full nutritional information as well. <a href="/media/pdf/Food4Patriots-Ingredients.pdf" target="_blank">Download the full list here.</a></p></div>
								</div>
							</div>
						</div>
						<div style="border-radius: 0" class="panel panel-default section-inner">
							<div class="panel-heading collapsed" data-toggle="collapse" data-parent="#accordion" data-target="#faq3">
								<p style="font-size: 20px;color: #0c83e7" class="panel-title accordion-toggle section-inner"><strong>Q: What is the shelf life of Food4Patriots?</strong></p>
							</div>
							<div id="faq3" class="panel-collapse collapse">
								<div style="background-color: #f8f8f8" class="panel-body">
									<div style="padding-left:20px" class="row"><p>Dehydrated food, stored properly (airtight and at room temperature or below) never really expires, but after 25 years the nutritional value will slowly start to decline. For that reason we guarantee a 25 year shelf life.</p></div>
								</div>
							</div>
						</div>
						<div style="border-radius: 0" class="panel panel-default section-inner">
							<div class="panel-heading collapsed" data-toggle="collapse" data-parent="#accordion" data-target="#faq4">
								<p style="font-size: 20px;color: #0c83e7" class="panel-title accordion-toggle section-inner"><strong>Q: Where can I go to get other customer's real opinions on Food4Patriots products?</strong></p>
							</div>
							<div id="faq4" class="panel-collapse collapse">
								<div style="background-color: #f8f8f8" class="panel-body">
									<div style="padding-left:20px;padding-right: 10px" class="row"><p>We host a website where many of our customers have left honest reviews about their purchases for you to see. You can find it by <a href="http://food4patriotsreview.com" target="_blank">clicking here.</a></p></div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="container-fluid" style="background-color: #eee;padding: 20px; border-top: 1px solid #EFEFEF;">
					<div class="row center-block" style="max-width: 980px;">
						<div class="col-sm-3 col-md-3" style="padding-bottom:20px;">
							<!--Norton security/seal-->
							<div class="text-center">
								<!--<table class="text-center center-block" width="135" border="0" cellpadding="2" cellspacing="0" title="Click to Verify - This site chose Symantec SSL for secure e-commerce and confidential communications.">
								   <tr>
									  <td width="135" align="center" valign="top"><script type="text/javascript" src="https://seal.verisign.com/getseal?host_name=secure.food4patriots.com&amp;size=M&amp;use_flash=NO&amp;use_transparent=NO&amp;lang=en"></script></td>
								   </tr>
								</table>-->
								<a href="https://sealinfo.websecurity.norton.com/splash?form_file=fdf/splash.fdf&dn=secure.food4patriots.com&lang=en" target="_blank"><img src="/assets/images/checkout/secure-seal-norton.png" style="max-width: 125px;margin-top:10px;" alt="Trust Seals"></a>
							</div>
						</div>
						<div class="col-sm-3 col-md-3  text-center" style="padding-top: 20px;">
							<!--honesty online badge-->
							<div>
								<a href="https://honesteonline.com/members/consumerpage.php?company=12046&link=9869" target="_blank"><img src="https://honesteonline.com/HEOSealsNewNoDate/heosealimg.php?company=12046&size=2&link=9869" alt="HONESTe Seal - Click to verify before you buy!" border="0"></a>
							</div>
						</div>
						<div class="col-sm-3 col-md-3 text-center">
							<img src="/assets/images/checkout/secure-seal-made-usa.png" width="91" height="82" alt="Trust Seals" style="margin-top: 6px;">
						</div>
						<div class="col-sm-3 col-md-3 text-center" style="padding-top: 10px;">
							<!--<script src="https://cdn.ywxi.net/js/inline.js?w=120"></script>-->
							<a href="https://www.mcafeesecure.com/verify?host=secure.food4patriots.com" target="_blank"><img src="/assets/images/checkout/secure-seal-mcafee.png" width="129" height="59" alt="Trust Seals" style="margin-top: 6px;"></a>
						</div>
					</div>
				</div>
			</section>
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
								<p><a class="btn btn-primary" href="javascript: olark('api.box.expand'); hideCsrModal();">Chat With Us</a></p><p><a class="btn btn-success" onclick="hideCsrModal();">Return To Order Form</a></p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php include_once ('footer.php'); ?>
		<!--<script data-cfasync="false" type='text/javascript'>/*<![CDATA[*/window.olark||(function(c){var f=window,d=document,l=f.location.protocol=="https:"?"https:":"http:",z=c.name,r="load";var nt=function(){
		      f[z]=function(){
		         (a.s=a.s||[]).push(arguments)};var a=f[z]._={
		      },q=c.methods.length;while(q--){(function(n){f[z][n]=function(){
		         f[z]("call",n,arguments)}})(c.methods[q])}a.l=c.loader;a.i=nt;a.p={
		         0:+new Date};a.P=function(u){
		         a.p[u]=new Date-a.p[0]};function s(){
		         a.P(r);f[z](r)}f.addEventListener?f.addEventListener(r,s,false):f.attachEvent("on"+r,s);var ld=function(){function p(hd){
		         hd="head";return["<",hd,"></",hd,"><",i,' onl' + 'oad="var d=',g,";d.getElementsByTagName('head')[0].",j,"(d.",h,"('script')).",k,"='",l,"//",a.l,"'",'"',"></",i,">"].join("")}var i="body",m=d[i];if(!m){
		         return setTimeout(ld,100)}a.P(1);var j="appendChild",h="createElement",k="src",n=d[h]("div"),v=n[j](d[h](z)),b=d[h]("iframe"),g="document",e="domain",o;n.style.display="none";m.insertBefore(n,m.firstChild).id=z;b.frameBorder="0";b.id=z+"-loader";if(/MSIE[ ]+6/.test(navigator.userAgent)){
		         b.src="javascript:false"}b.allowTransparency="true";v[j](b);try{
		         b.contentWindow[g].open()}catch(w){
		         c[e]=d[e];o="javascript:var d="+g+".open();d.domain='"+d.domain+"';";b[k]=o+"void(0);"}try{
		         var t=b.contentWindow[g];t.write(p());t.close()}catch(x){
		         b[k]=o+'d.write("'+p().replace(/"/g,String.fromCharCode(92)+'"')+'");d.close();'}a.P(2)};ld()};nt()})({
		      loader: "static.olark.com/jsclient/loader0.js",name:"olark",methods:["configure","extend","declare","identify"]});
		   /* custom configuration goes here (www.olark.com/documentation) */
		   olark.identify('2445-700-10-6057');/*]]>*/</script><noscript><a href="https://www.olark.com/site/2445-700-10-6057/contact" title="Contact us" target="_blank">Questions? Feedback?</a> powered by <a href="http://www.olark.com?welcome" title="Olark live chat software">Olark live chat software</a></noscript>
		end olark code -->
		<script>
			function wistiaPlay() {
				window._wq = window._wq || [];
				_wq.push({ "f1958k8cul": function(video) {
					video.play();
				}});
			}
			function wistiaPause() {
				window._wq = window._wq || [];
				_wq.push({ "f1958k8cul": function(video) {
					video.pause();
				}});
			}
		</script>
		<script>
			window.onbeforeunload = grayOut;
			function grayOut(){
				var ldiv = document.getElementById('LoadingDiv');
				ldiv.style.display='block';
			}
		</script>
		<script>
			$(document).ready(function(){
				$('[data-toggle="popover"]').popover();
			});
		</script>
		<script>
			var _gscq = _gscq || [];
			_gscq.push(['language', navigator.language]);
			(function() {
				var gscw = document.createElement('script');
				gscw.type = 'text/javascript'; gscw.async = true;
				gscw.src = '//widgets.getsitecontrol.com/9972/script.js';
				var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(gscw, s);
			})();
		</script>

		<script type="text/javascript">
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

		<!-- begin olark code -->
		<script data-cfasync="false" type='text/javascript'>/*<![CDATA[*/window.olark||(function(c){var f=window,d=document,l=f.location.protocol=="https:"?"https:":"http:",z=c.name,r="load";var nt=function(){
				f[z]=function(){
					(a.s=a.s||[]).push(arguments)};var a=f[z]._={
				},q=c.methods.length;while(q--){(function(n){f[z][n]=function(){
					f[z]("call",n,arguments)}})(c.methods[q])}a.l=c.loader;a.i=nt;a.p={
					0:+new Date};a.P=function(u){
					a.p[u]=new Date-a.p[0]};function s(){
					a.P(r);f[z](r)}f.addEventListener?f.addEventListener(r,s,false):f.attachEvent("on"+r,s);var ld=function(){function p(hd){
					hd="head";return["<",hd,"></",hd,"><",i,' onl' + 'oad="var d=',g,";d.getElementsByTagName('head')[0].",j,"(d.",h,"('script')).",k,"='",l,"//",a.l,"'",'"',"></",i,">"].join("")}var i="body",m=d[i];if(!m){
					return setTimeout(ld,100)}a.P(1);var j="appendChild",h="createElement",k="src",n=d[h]("div"),v=n[j](d[h](z)),b=d[h]("iframe"),g="document",e="domain",o;n.style.display="none";m.insertBefore(n,m.firstChild).id=z;b.frameBorder="0";b.id=z+"-loader";if(/MSIE[ ]+6/.test(navigator.userAgent)){
					b.src="javascript:false"}b.allowTransparency="true";v[j](b);try{
					b.contentWindow[g].open()}catch(w){
					c[e]=d[e];o="javascript:var d="+g+".open();d.domain='"+d.domain+"';";b[k]=o+"void(0);"}try{
					var t=b.contentWindow[g];t.write(p());t.close()}catch(x){
					b[k]=o+'d.write("'+p().replace(/"/g,String.fromCharCode(92)+'"')+'");d.close();'}a.P(2)};ld()};nt()})({
				loader: "static.olark.com/jsclient/loader0.js",name:"olark",methods:["configure","extend","declare","identify",]});
			/* custom configuration goes here (www.olark.com/documentation) */
			olark.identify('2445-700-10-6057');/*]]>*/
		</script>
		<noscript>
			<a href="https://www.olark.com/site/2445-700-10-6057/contact" title="Contact us" target="_blank">Questions? Feedback?</a> powered by <a href="http://www.olark.com?welcome" title="Olark live chat software">Olark live chat software</a>
		</noscript>
		<!-- end olark code -->
	</body>
</html>