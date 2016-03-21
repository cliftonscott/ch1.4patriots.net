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

	<link href="http://chris01.4patriots.net/assets/css/bootstrap.css" rel="stylesheet">

	<link rel="shortcut icon" href="">
	<link href="http://chris01.4patriots.net/assets/css/styles-content.css" rel="stylesheet">
	<link href="http://chris01.4patriots.net/assets/css/styles-letter-fw.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="http://chris01.4patriots.net/assets/css/styles-letter-ie10-fw.css" media="screen, projection"/><![endif]-->

	<link href='//fonts.googleapis.com/css?family=Allerta+Stencil' rel='stylesheet' type='text/css'>
	<link href='//fonts.googleapis.com/css?family=Oswald:400,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<link href='https://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,700,600,300,800' rel='stylesheet' type='text/css'>

	<script type="text/javascript" src="/assets/js/html5shiv.js"></script>
	<script type="text/javascript" src="/assets/js/respond.min.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
	<script src="http://chris01.4patriots.net/assets/js/bootstrap.min.js"></script>
	<script src="http://chris01.4patriots.net/assets/js/modernizr-2.5.2.js" type="text/javascript"></script>
	<script src="http://chris01.4patriots.net/assets/js/jquery.easing.min.js"></script>
	<script src="http://chris01.4patriots.net/assets/js/scrolling-nav.js"></script>
	<script src="<?php echo $REQUEST_PROTOCOL;?>://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
	<script src="/assets/js/common/bootstrap.min.js"></script>
	<script src="/js/patriot.js"></script>

	<!--TODO only pull in if we need the exit confirm-->
	<script src="/js/floating-1.12.js"></script>
	<?php
	echo "\n<script src='/js/jquery.validate.min.js'></script>";
	//set this variable on a page that uses the customer-form.php template file to provide validation/states functions
	if($template["formType"] === "customerForm") {
		echo "\n<script src='/js/checkout-states.js'></script>";
		echo "\n<script src='/js/customer-form-validation.js'></script>";
	}
	?>
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
		.arrowR{
			width:83px;
			position: absolute;
			margin-left: -40px;
			margin-top: 16px;
		}
		.arrowL{
			width:83px;
			position: absolute;
			margin-left: -40px;
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
			text-align: right;
			margin-top: -20px;
			padding-top: 22px;
		}
		.phone-btn{
			background-color:#B90003;
		}
		.stepone{
			margin-top: 82px;
		}
		a.scroll-link{
			text-decoration: none; /*for Chrome*/
		}
		.securtiy-seals{
			padding: 10px 10px 10px 10px;
		}
		.trustguard{
			padding-top:10px;
			width: 100%;
		}
		.norton{
			padding-top:11px;
			width: 100%;
		}
		.honest{
			padding-top:19px;
			width: 100%;
		}
		.trustusa{
			padding-top:10px;
			width: 100%;
			height: 68px;
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
				padding: 10px 0 10px 0;
				text-align: center;
			}
			.trustguard{
				padding-top:10px;
				width: 105px;
			}
			.norton{
				padding-top:11px;
				width: 105px;
			}
			.honest{
				padding-top:19px;
				width: 105px;
			}
			.trustusa{
				padding-top:10px;
				width: 105px;
				height: 68px;
			}
		}
		@media (max-width: 767px){
			.securtiy-seals{
				padding: 10px 0 10px 0;
				text-align: center;
			}
			.trustguard{
				padding-top:0;
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
				width: 105px;
				height: 68px;
			}
			.phone-number{
				text-align: center;
			}
		}
		@media (max-width: 567px){
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
	<section style="margin-bottom: -30px; padding-bottom: 0;" class="section-dark-blue">
		<div class="section-inner">
			<div class="row pad-15-t">
				<div class="top-head"><p>ACT NOW, Before It's Too Late!</p></div>
				<div id="the-countdown"><p></p></div>
			</div>
		</div>
	</section>
	<div style="background-color: #B90003">
		<div class="row section-inner">
			<div class="phone-number navbar-phone-contain">
				<div id="phone-txt"><span class="glyphicon glyphicon-earphone"></span> Phone: 1-800-728-0008</div>
				<div id="phone-button"><button type="button" class="btn phone-btn"><a href="tel:1-800-728-0008"><span class="glyphicon glyphicon-earphone"></span> Phone: 1-800-728-0008</a></button></div>
			</div>
		</div>
	</div>

	<section class="section-1">
		<div class="section-inner">
			<div class="grad-white-brown pad-15-t pad-15-b">
				<h2 style="text-align: center;font-size: 50px;line-height: 60px" class="color-red dark">WARNING: Free Survival Food is Almost Gone…</h2>
			</div>
		</div>
	</section>

	<section class="section-2">
		<div class="section-inner">
			<div class="block bg-white">
				<div class="pad-15-t pad-10-b">
					<div class="row">
						<div class="wistia_responsive_padding" style="position:relative; margin-bottom: 20px">
							<div class="wistia_responsive_wrapper">
								<div class="wistia_responsive_padding" style="padding:56.25% 0 0 0;position:relative;"><div class="wistia_responsive_wrapper" style="height:100%;left:0;position:absolute;top:0;width:100%;"><iframe src="//fast.wistia.net/embed/iframe/f1958k8cul?videoFoam=true" allowtransparency="true" frameborder="0" scrolling="no" class="wistia_embed" name="wistia_embed" allowfullscreen mozallowfullscreen webkitallowfullscreen oallowfullscreen msallowfullscreen width="100%" height="100%"></iframe></div></div>
							</div>
						</div>
						<div class="block text-center btn-width"><a href="#" class="green button big btn-width scroll-link" data-id="order-form">YES… Send My FREE Survival Food Kit</a></div>

					</div>

					<h2 style="text-align: center" class="color-black dark pad-10-t">The Rush is on as Thousands Claim FREE Food4Patriots <br class="hidden-xs">72-Hour Survival Food Kits!
					</h2>
					<div class="pad-30-b medium-size700">
						<img style="width: 100%" class="img-responsive center-block pad-20-t" src="http://dev.sw4p.4patriots.net/media/images/app/app-pro-product-image-05.jpg" alt="Alexapure Pro"/>
					</div>
					<div class="row text-center">
						<div class="col-xs-6 col-sm-4 whole-thing2"><img class="pad-10-b" style="width:50px" src="http://chris01.4patriots.net/assets/images/misc/oct_icon.svg"><h4 class="pad-10-b">25-Year Shelf Life</h4><p>Space-age resealable Mylar packaging keeps our food fresh for 25 years or more.</p></div>
						<div class="col-xs-6 col-sm-4 whole-thing2"><img class="pad-10-b" style="width:50px" src="http://chris01.4patriots.net/assets/images/misc/oct_icon.svg"><h4 class="pad-10-b">Easy to Prepare</h4><p>Just add boiling water and stir. Wait a few minutes and enjoy<br class="hidden-xs"> a great meal.</p></div>
						<!-- Optional: clear the XS cols if their content doesn't match in height -->
						<div class="clearfix visible-xs-block"></div>
						<div class="col-xs-6 col-sm-4 whole-thing2"><img class="pad-10-b" style="width:50px" src="http://chris01.4patriots.net/assets/images/misc/oct_icon.svg"><h4 class="pad-10-b">Guaranteed Delicious</h4><p>Love our foods or return ‘em within 365 days for your Full<br class="hidden-xs"> Money Back.</p></div>
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
				<p>This is delicious, nutritious, &ldquo;super survival food&rdquo; and it could save your life in a disaster!</p>
				<p>No one knows where the next crisis will hit&hellip; or when.</p>
				<p>But when it does hit, finding food could be near-impossible as food stores are quickly sold out or have their shelves stripped bare by hungry mobs.</p>
				<p>You don&rsquo;t want your family standing in line with thousands of desperate strangers like those poor folks had to in Hurricane Katrina &ndash; or be forced to dig through dumpsters like New Yorkers did during Superstorm Sandy.</p>
			</div>
		</div>
	</section>

	<section class="section-3">
		<div class="section-inner">
			<div class=" pad-30">
				<h2 style="text-align: center" class="color-red dark">Act Now. Claim Your FREE 72-hour survival Food <br class="hidden-xs"> Kit While They Are Still Available</h2>
			</div>
		</div>
	</section>

	<section class="section-2">
		<div class="section-inner">
			<p class="pad-30-t">Giving away survival food for free has never been done before. And the response has been overwhelming! Our supply of 72-hour kits that we can give away is rapidly disappearing, so fast action is absolutely necessary to avoid disappointment.</p>
			<p>The regular price of our 72-hour survival food kit is $27.00 plus shipping. But right now it’s yours FREE. All we ask is you help cover the low shipping cost.</p>
			<h2 style="text-align: center" class="color-red dark">Here’s what our satisfied customers have to say:</h2>
			<p style="text-align:center;font-size:15px"><em>Over the years, we’ve received countless messages from customers, telling us<br class="hidden-xs"> how much the enjoy Food4Patriots survival foods:</em></p>
			<p></p>
			<div class="medium-size700 pad-10-b">
				<div class="mock-outer ">
					<div class="mock-inner">
						<div class="fb-group-picrow">
							<img src="https://www.govloop.com/wp-content/uploads/avatars/15079/924239b448927b76e24ab278a9c08d84-bpthumb.jpeg">
							<div class="fb-group-text">
								<h5 class="fbh5"><b>Colleen <em>Carter</em></b></h5>
								<span class="fb-group-date">August 11 at 9:15am &#183; <i class="fa fa-user"></i></span>
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
							<img src="https://www.govloop.com/wp-content/uploads/avatars/15079/924239b448927b76e24ab278a9c08d84-bpthumb.jpeg">
							<div class="fb-group-text">
								<h5 class="fbh5"><b>Linda <em>Peters</em></b></h5>
								<span class="fb-group-date">July 21 at 3:47pm &#183; <i class="fa fa-user"></i></span>
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
							<img src="https://www.govloop.com/wp-content/uploads/avatars/15079/924239b448927b76e24ab278a9c08d84-bpthumb.jpeg">
							<div class="fb-group-text">
								<h5 class="fbh5"><b>Herron <em>Dedrick</em></b></h5>
								<span class="fb-group-date">May 15 at 10:08am &#183; <i class="fa fa-user"></i></span>
							</div>
						</div>
						<div class="usertext">
							<p>I now feel very secure in the event of an emergency that might cut off food distribution channels. Also, in the event that our economy crashes (not if, but when… Again, thank you for what you have put together to help folks like me.</p>
						</div>
						<div class="mock-title-cap-text">Like &#183; Comment &#183; Share</div>
					</div>
				</div>
				<div class="mock-outer">
					<div class="mock-inner">
						<div class="fb-group-picrow">
							<img src="https://www.govloop.com/wp-content/uploads/avatars/15079/924239b448927b76e24ab278a9c08d84-bpthumb.jpeg">
							<div class="fb-group-text">
								<h5 class="fbh5"><b>Andy <em>Kinard</em></b></h5>
								<span class="fb-group-date">July 1 at 11:33am &#183; <i class="fa fa-user"></i></span>
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
				<h2 style="text-align: center" class="color-red dark">You Can Enjoy Your FREE Survival Food Tonight... <br class="hidden-xs">Or 25 Years From Now</h2>
			</div>
		</div>
	</section>

	<section style="padding-bottom: 30px" class="section-2">
		<div class="section-inner">
			<div class="medium-size700 pad-30-t-b">
				<img style="width: 100%" class="img-responsive center-block" src="http://dev.sw4p.4patriots.net/media/images/app/app-pro-product-image-05.jpg" alt="Alexapure Pro"/>
			</div>
			<div>
				<p>All Food4Patriots survival food is made from the finest local-grown ingredients, prepared and packaged with pride in the USA!</p>
				<p>And thanks to advanced Mylar packaging, our foods are guaranteed to taste as good in 25 years as they do today.&nbsp;</p>
				<p>Every 72-hour kit that&rsquo;s being given away contains four servings each of such familiar dishes as:</p>
				<?php include("f4p-72hour-kit-whatsincluded.html");?>
				<p>They’re made with award-winning recipes. Your family will enjoy meals much like those they’re eating now.</p>
				<div class="outLineBoxDarkBlue">
					<p><img style="margin-top: 3%" src="/media/images/misc/seal-guarantee-satisfaction.jpg" alt="Guarantee #1" class="pull-left img-responsive media">
					<p style="margin-top: 5.5%"><strong>Every purchase protected by our 365-Day Full Money Back Guarantee!</strong> You can feel completely confident that your Food4Patriots survival food will meet or exceed your expectations. Go ahead and try our products. If for any reason – or no reason at all – you are not completely satisfied, simply return your survival food within 365 days for a full refund. You literally can’t lose!</p>
					<div class="clearfix"></div>
				</div>
				<div class="clearfix"></div>
				<p>There&rsquo;s a lot going on in the world to be concerned about &ndash; terrorist attacks, earthquakes, tornadoes, economic unrest, and so much more.</p>
				<p>You owe it to your family to prepare now for uncertain days ahead.</p>
				<p>A free Food 4Patriots 72-hour survival food kit is the ideal way to get started on or add to a survival food stockpile. All we ask is that you pay a small $9.95 fee to offset the shipping cost.</p>
				<p><strong>Regularly priced at $27.00 plus shipping, now FREE while supplies last </strong>(limit one per household, just cover postage)<strong>&nbsp;--&nbsp;</strong>get yours now before it&rsquo;s gone!</p>
			</div>
			<div class="pad-30-b">
				<div class="block text-center btn-width"><a href="#" class="green button big btn-width scroll-link" data-id="order-form">YES… Send My FREE Survival Food Kit</a></div>
			</div>
			<div style="margin-bottom:15px" class="row" id="order-form">
				<div class="col-xs-6 form-fw stepone">
					<form accept-charset="UTF-8" action="/" class="require-validation " data-cc-on-file="false" data-stripe-publishable-key="pk_bQQaTxnaZlzv4FnnuZ28LFHccVSaj" id="payment-form" method="post">
						<div class='form-row'>
							<div class="form-group col-xs-12">
								<h1 class="color-red dark"><em style="font-style: normal;font-size:25px">Step: 1</em></h1>
								<h2>Enter Contact Details</h2>
								<hr style="height:2px;background-color:#eee;color:#eee;border: 0 none;">
							</div>
						</div>
						<div class='form-row'>
							<div class="form-group col-sm-6 col-xs-6 col-md-6 required">
								<label class="control-label">First Name</label>
								<input class='form-control fname' size='4' type='text'>
							</div>
						</div>
						<div class='form-row'>
							<div class="form-group col-sm-6 col-xs-6 col-md-6 required">
								<label class="control-label">Last Name</label>
								<input class='form-control lname' size='4' type='text'>
							</div>
						</div>
						<div class='form-row'>
							<div class="form-group col-sm-6 col-xs-6 col-md-6 required">
								<label class="control-label">E-mail</label>
								<input class='form-control email' size='4' type='text'>
							</div>
						</div>
						<div class='form-row'>
							<div class="form-group col-sm-6 col-xs-6 col-md-6">
								<label class="control-label">Phone</label>
								<input class='form-control' size='4' type='text' placeholder="Optional">
							</div>
						</div>
						<div class='form-row'>
							<div class="form-group col-xs-12 required">
								<label class="control-label">Billing Address</label>
								<input class='form-control address' size='4' type='text'>
							</div>
						</div>
						<div class='form-row'>
							<div class="form-group col-sm-6 col-xs-6 col-md-6">
								<label class="control-label">City</label>
								<input class='form-control city' size='4' type='text'>
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-sm-6 col-xs-6 col-md-6">
								<label class="control-label">State</label>
								<select id="state" name="state" class="form-control state">
									<option value="" selected="selected">Select State</option>
									<option value="AK">AK</option>
									<option value="AL">AL</option>
									<option value="AR">AR</option>
									<option value="AZ">AZ</option>
									<option value="CA">CA</option>
									<option value="CO">CO</option>
									<option value="CT">CT</option>
									<option value="DC">DC</option>
									<option value="DE">DE</option>
									<option value="FL">FL</option>
									<option value="GA">GA</option>
									<option value="HI">HI</option>
									<option value="IA">IA</option>
									<option value="ID">ID</option>
									<option value="IL">IL</option>
									<option value="IN">IN</option>
									<option value="KS">KS</option>
									<option value="KY">KY</option>
									<option value="LA">LA</option>
									<option value="MA">MA</option>
									<option value="MD">MD</option>
									<option value="ME">ME</option>
									<option value="MI">MI</option>
									<option value="MN">MN</option>
									<option value="MO">MO</option>
									<option value="MS">MS</option>
									<option value="MT">MT</option>
									<option value="NC">NC</option>
									<option value="ND">ND</option>
									<option value="NE">NE</option>
									<option value="NH">NH</option>
									<option value="NJ">NJ</option>
									<option value="NM">NM</option>
									<option value="NV">NV</option>
									<option value="NY">NY</option>
									<option value="OH">OH</option>
									<option value="OK">OK</option>
									<option value="OR">OR</option>
									<option value="PA">PA</option>
									<option value="RI">RI</option>
									<option value="SC">SC</option>
									<option value="SD">SD</option>
									<option value="TN">TN</option>
									<option value="TX">TX</option>
									<option value="UT">UT</option>
									<option value="VA">VA</option>
									<option value="VT">VT</option>
									<option value="WA">WA</option>
									<option value="WI">WI</option>
									<option value="WV">WV</option>
									<option value="WY">WY</option>
								</select>
							</div>
						</div>
						<div class='form-row'>
							<div class="form-group col-sm-6 col-xs-6 col-md-6">
								<label class="control-label">Zip</label>
								<input class='form-control' size='4' type='text'>
							</div>
						</div>
						<div class='form-row'>
							<div class="form-group col-sm-6 col-xs-6 col-md-6">
								<label class="control-label">Country</label>
								<select id="country" name="country" class="form-control">
									<option value="" selected="selected">Select Country</option>
									<option value="CA">Canada</option>
									<option value="US">United States</option>
								</select>
							</div>
						</div>
						<div class='form-row'>
							<div class="form-group col-xs-12 required">
								<input style="cursor: pointer;margin-bottom: 10px;" type="checkbox" id="desel" value=""> <em style="font-style: normal;color: #0c83e7">My Shipping Address Is The Same As Billing</em><br>
								<label class="control-label">Shipping Address</label>
								<input class='form-control address' size='4' type='text' disabled>
							</div>
						</div>
						<div class='form-row'>
							<div class="form-group col-sm-6 col-xs-6 col-md-6">
								<label class="control-label">City</label>
								<input class='form-control city' size='4' type='text' disabled>
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-sm-6 col-xs-6 col-md-6">
								<label class="control-label">State</label>
								<select name="state" class="form-control state" disabled>
									<option value="" selected="selected">Select State</option>
									<option value="AK">AK</option>
									<option value="AL">AL</option>
									<option value="AR">AR</option>
									<option value="AZ">AZ</option>
									<option value="CA">CA</option>
									<option value="CO">CO</option>
									<option value="CT">CT</option>
									<option value="DC">DC</option>
									<option value="DE">DE</option>
									<option value="FL">FL</option>
									<option value="GA">GA</option>
									<option value="HI">HI</option>
									<option value="IA">IA</option>
									<option value="ID">ID</option>
									<option value="IL">IL</option>
									<option value="IN">IN</option>
									<option value="KS">KS</option>
									<option value="KY">KY</option>
									<option value="LA">LA</option>
									<option value="MA">MA</option>
									<option value="MD">MD</option>
									<option value="ME">ME</option>
									<option value="MI">MI</option>
									<option value="MN">MN</option>
									<option value="MO">MO</option>
									<option value="MS">MS</option>
									<option value="MT">MT</option>
									<option value="NC">NC</option>
									<option value="ND">ND</option>
									<option value="NE">NE</option>
									<option value="NH">NH</option>
									<option value="NJ">NJ</option>
									<option value="NM">NM</option>
									<option value="NV">NV</option>
									<option value="NY">NY</option>
									<option value="OH">OH</option>
									<option value="OK">OK</option>
									<option value="OR">OR</option>
									<option value="PA">PA</option>
									<option value="RI">RI</option>
									<option value="SC">SC</option>
									<option value="SD">SD</option>
									<option value="TN">TN</option>
									<option value="TX">TX</option>
									<option value="UT">UT</option>
									<option value="VA">VA</option>
									<option value="VT">VT</option>
									<option value="WA">WA</option>
									<option value="WI">WI</option>
									<option value="WV">WV</option>
									<option value="WY">WY</option>
								</select>
							</div>
						</div>
						<div class='form-row'>
							<div class="form-group col-sm-6 col-xs-6 col-md-6">
								<label class="control-label">Zip</label>
								<input class='form-control' size='4' type='text' disabled>
							</div>
						</div>
						<div class='form-row'>
							<div class="form-group col-sm-6 col-xs-6 col-md-6">
								<label class="control-label">Country</label>
								<select id="country" name="country" class="form-control" disabled >
									<option value="" selected="selected">Select Country</option>
									<option value="CA">Canada</option>
									<option value="US">United States</option>
								</select>
							</div>
						</div>
					</form>
				</div>
				<div class='hidden-xs' style='float:right;cursor:pointer;'><a href='#csr' onclick='showCsrModal();'><img src='http://chris01.4patriots.net/assets/images/misc/customer-service-rep-02.png' alt='Have Questions? Give Us A Call' class='img-responsive'/></a></div>
				<div style="background-color:#eeeeee;padding:0" class="col-xs-6 form-fw"><script src='https://js.stripe.com/v2/' type='text/javascript'></script>
					<form accept-charset="UTF-8" action="/" class="require-validation" data-cc-on-file="false" data-stripe-publishable-key="pk_bQQaTxnaZlzv4FnnuZ28LFHccVSaj" id="payment-form" method="post">
						<div style="margin:0;padding:0;display:inline">
							<input name="utf8" type="hidden" value="✓" />
							<input name="_method" type="hidden" value="PUT" />
							<input name="authenticity_token" type="hidden" value="qLZ9cScer7ZxqulsUWazw4x3cSEzv899SP/7ThPCOV8=" />
						</div>
						<div class='form-row'>
							<div class="form-group col-xs-12">
								<h1 class="color-red dark"><em style="font-style: normal;font-size:25px">Step: 2</em></h1>
								<h2>Enter Payment Info</h2>
								<hr style="height:2px;background-color:#fff;color:#fff;border: 0 none;">
							</div>
						</div>
						<div class='form-row'>
							<div class='col-xs-12 form-group required'>
								<label class='control-label'>Name on Card</label>
								<input class='form-control' size='4' type='text'>
							</div>
						</div>
						<div class='form-row'>
							<div class='col-xs-12 form-group card required'>
								<label class='control-label'>Card Number <i class="fa fa-cc-mastercard"> <i class="fa fa-cc-visa"></i> <i class="fa fa-cc-discover"></i> </i> <i class="fa fa-cc-amex"></i></label>
								<input autocomplete='off' class='form-control card-number' size='20' type='text'>
							</div>
						</div>
						<div class='form-row'>
							<div class='col-xs-4 form-group cvc required'>
								<label class='control-label'>CVC</label>
								<a href="#info" title="Credit Verification Value (CVV):" data-html="true" data-toggle="popover" data-trigger="hover" data-content="<img src='http://dev.sf4p.4patriots.net/assets/images/checkout/cvv2.png'/>" data-placement="bottom"><i style="font-size: 15px" class="fa fa-question-circle"></i></a>
								<input autocomplete='off' class='form-control card-cvc' placeholder='ex. 311' size='4' type='text'>
							</div>
							<div class='col-xs-4 form-group expiration required'>
								<label class='control-label'>Expiration</label>
								<input class='form-control card-expiry-month' placeholder='MM / YYYY' size='6' type='text'>
							</div>
							<div class='col-xs-4 form-group expiration required'>
								<label class='control-label'>Quantity</label>
								<select id="quantity" name="quantity" class="form-control">
									<option value="01">
										1
									</option>
									<option value="02">
										2
									</option>
									<option value="03">
										3
									</option>
								</select>
							</div>
						</div>
						<div class='form-row'>
							<div class='col-md-12'>
								<div style="width: 100%;font-size: 20px" class='total'>
									Item:<span class='productid'><strong> Product Name</strong></span><br>
									Price:<span class='amount'> $0.00</span><br>
									S&H:<span class='shipping'> <s>$9.95</s> <strong class="color-red dark">FREE</strong></span><br>
									Total:<span class='total'> $9.95</span><br>
								</div>
							</div>
						</div>
						<div class='form-row'>
							<div style="margin:0 auto;padding-top:15px;padding-bottom:10px" class='col-md-12 form-group text-center'>
								<img class="arrowR" src="http://chris01.4patriots.net/assets/images/buttons/arrow-right.gif"><button style="margin-bottom: 10px;" type="button-2" class="btn-2"><b>Click To Continue</b></button><img class="arrowL" src="http://chris01.4patriots.net/assets/images/buttons/arrow-right.gif">
							</div>
						</div>
						<div class='form-row'>
							<div style="margin:0 auto;padding-top:5px;background-color: #b4b4c7;" class='col-md-12 form-group text-center'>
								<h1 style="font-size: 18px">Shopping Is Safe & Secure - Guaranteed!</h1>
							</div>
							<div style=";padding-top: 15px;background-color: #cdcdda;" class='col-md-12 form-group text-center safety'>
								<p style="font-size: 15px;"><img src="http://dev.sf4p.4patriots.net/assets/images/checkout/secure-order-lock-02.png" width="30px"> Secure credit card payment - this is a secure 256-bit SSL encrypted payment.</p>
							</div>
						</div>
						<div class="row securtiy-seals">
							<div class="col-xs-6 col-sm-3"><a name="trustlink" href="http://secure.trust-guard.com/security/8491" rel="nofollow" target="_blank" onclick="var nonwin=navigator.appName!='Microsoft Internet Explorer'?'yes':'no'; window.open(this.href.replace(/https?/, 'https'),'welcome','location='+nonwin+',scrollbars=yes,width=517,height='+screen.availHeight+',menubar=no,toolbar=no'); return false;" oncontextmenu="var d = new Date(); alert('Copying Prohibited by Law - This image and all included logos are copyrighted by trust-guard \251 '+d.getFullYear()+'.'); return false;"><img class="trustguard" name="trustseal" alt="Security Seals" src="//dw26xg4lubooo.cloudfront.net/seals/security/8491-large.gif"/></a></div>
							<div class="col-xs-6 col-sm-3"><img class="norton" src="http://chris01.4patriots.net/assets/images/checkout/imgnortonsiteseal.png"></div>

							<!-- Add the extra clearfix for only the required viewport -->
							<div class="clearfix visible-xs-block"></div>

							<div class="col-xs-6 col-sm-3"><a href="https://honesteonline.com/members/consumerpage.php?company=12046&link=9869" target="_blank"><img class="honest" src="https://honesteonline.com/HEOSealsNewNoDate/heosealimg.php?company=12046&size=2&link=9869" alt="HONESTe Seal - Click to verify before you buy!"></a></div>
							<div class="col-xs-6 col-sm-3"><img class="trustusa" src="http://chris01.4patriots.net/assets/images/checkout/usa-seal.png" alt="Trust Seals"></div>
						</div>
						<div class='form-row'>
							<div class='col-md-12 error form-group hide'>
								<div style="margin-top: 5px;margin-bottom: 0px;" class='alert-danger alert'>
									Please correct the errors and try again.
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
	</section>
	<section class="section-2">
		<div class="section-inner">
			<div class="medium-size700">
				<div class="mock-outer ">
					<div class="mock-inner">
						<div class="fb-group-picrow">
							<img src="https://www.govloop.com/wp-content/uploads/avatars/15079/924239b448927b76e24ab278a9c08d84-bpthumb.jpeg">
							<div class="fb-group-text">
								<h5 class="fbh5"><b>Matt <em>Grout</em></b></h5>
								<span class="fb-group-date">May 3 at 1:19pm &#183; <i class="fa fa-user"></i></span>
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
							<img src="https://www.govloop.com/wp-content/uploads/avatars/15079/924239b448927b76e24ab278a9c08d84-bpthumb.jpeg">
							<div class="fb-group-text">
								<h5 class="fbh5"><b>Luther <em>Cauthen</em></b></h5>
								<span class="fb-group-date">November 20 at 10:05am &#183; <i class="fa fa-user"></i></span>
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
				<div class="block text-center btn-width"><a href="#" class="green button big btn-width scroll-link" data-id="order-form">Claim Your Free Product Now</a></div>
			</div>
		</div>
		<div class="priority-lists">
			<h2 style="font-size: 30px" class="color-red dark section-inner pad-10-b">Frequently Asked Questions:</h2>
			<div class="panel-group" id="accordion">
				<div style="border-radius: 0" class="panel panel-default section-inner">
					<div class="panel-heading collapsed" data-toggle="collapse" data-parent="#accordion" data-target="#faq1">
						<p style="font-size: 20px;color: #0c83e7" class="panel-title accordion-toggle section-inner"><strong>Q: Where is your food made?</strong></p>
					</div>
					<div id="faq1" class="panel-collapse collapse">
						<div class="panel-body">
							<div style="padding-left:20px" class="row"><p>Our food is made in an FDA approved and inspected facility right here in the United States. We source US-grown ingredients and the entire food production process happens right here in the good ole US of A!</p></div>
						</div>
					</div>
				</div>
				<div style="border-radius: 0" class="panel panel-default section-inner">
					<div class="panel-heading collapsed"   data-toggle="collapse" data-parent="#accordion" data-target="#faq2">
						<p style="font-size: 20px;color: #0c83e7" class="panel-title accordion-toggle section-inner"><strong>Q: Where can I find the ingredients/nutritional information for each food?</strong></p>
					</div>
					<div id="faq2" class="panel-collapse collapse">
						<div class="panel-body">
							<div style="padding-left:20px" class="row"><p>We are pleased to provide you with a full list of each and every ingredient used to make our foods. We have even included the full nutritional information as well. <a href="/media/pdf/Food4Patriots-Ingredients.pdf" target="_blank">Download the full list here.</a></p></div>
						</div>
					</div>
				</div>
				<div style="border-radius: 0" class="panel panel-default section-inner">
					<div class="panel-heading collapsed" data-toggle="collapse" data-parent="#accordion" data-target="#faq3">
						<p style="font-size: 20px;color: #0c83e7" class="panel-title accordion-toggle section-inner"><strong>Q: What is the shelf life of Food4Patriots?</strong></p>
					</div>
					<div id="faq3" class="panel-collapse collapse">
						<div class="panel-body">
							<div style="padding-left:20px" class="row"><p>Dehydrated food, stored properly (airtight and at room temperature or below) never really expires, but after 25 years the nutritional value will slowly start to decline. For that reason we guarantee a 25 year shelf life.</p></div>
						</div>
					</div>
				</div>
				<div style="border-radius: 0" class="panel panel-default section-inner">
					<div class="panel-heading collapsed" data-toggle="collapse" data-parent="#accordion" data-target="#faq4">
						<p style="font-size: 20px;color: #0c83e7" class="panel-title accordion-toggle section-inner"><strong>Q: Where can I go to get other customer's real opinions on Food4Patriots products?</strong></p>
					</div>
					<div id="faq4" class="panel-collapse collapse">
						<div class="panel-body">
							<div style="padding-left:20px;padding-right: 10px" class="row"><p>We host a website where many of our customers have left honest reviews about their purchases for you to see. You can find it by <a href="http://food4patriotsreview.com" target="_blank">clicking here.</a></p></div>
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
<?php include_once ('template-bottom.php'); ?>

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

<script>
	$(function() {
		$('form.require-validation').bind('submit', function(e) {
			var $form         = $(e.target).closest('form'),
				inputSelector = ['input[type=email]', 'input[type=password]',
					'input[type=text]', 'input[type=file]',
					'textarea'].join(', '),
				$inputs       = $form.find('.required').find(inputSelector),
				$errorMessage = $form.find('div.error'),
				valid         = true;

			$errorMessage.addClass('hide');
			$('.has-error').removeClass('has-error');
			$inputs.each(function(i, el) {
				var $input = $(el);
				if ($input.val() === '') {
					$input.parent().addClass('has-error');
					$errorMessage.removeClass('hide');
					e.preventDefault(); // cancel on first error
				}
			});
		});
	});

	$(function() {
		var $form = $("#payment-form");

		$form.on('submit', function(e) {
			if (!$form.data('cc-on-file')) {
				e.preventDefault();
				Stripe.setPublishableKey($form.data('stripe-publishable-key'));
				Stripe.createToken({
					number: $('.card-number').val(),
					cvc: $('.card-cvc').val(),
					exp_month: $('.card-expiry-month').val(),
					exp_year: $('.card-expiry-year').val()
				}, stripeResponseHandler);
			}
		});

		function stripeResponseHandler(status, response) {
			if (response.error) {
				$('.error')
					.removeClass('hide')
					.find('.alert')
					.text(response.error.message);
			} else {
				// token contains id, last4, and card type
				var token = response['id'];
				// insert the token into the form so it gets submitted to the server
				$form.find('input[type=text]').empty();
				$form.append("<input type='hidden' name='reservation[stripe_token]' value='" + token + "'/>");
				$form.get(0).submit();
			}
		}
	})
</script>
<script>
	$('#desel').on('click', function(e){
		$('input').attr('disabled', false);
		$('select').attr('disabled', false);
	})
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


