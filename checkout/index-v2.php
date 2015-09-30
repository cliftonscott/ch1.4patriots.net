<?php
/*ini_set("error_reporting", E_ALL); // E_ALL or E_WARNING
ini_set("display_errors", TRUE); // TRUE or FALSE*/
$maxQuantity = 5;

$template["formType"] = "customerForm"; //designates that this is a form using customer-form.php as included form
// SET PRODUCT ID
// THIS IS SET TO THE 3 MONTH KIT FOR DEFAULT
$_SESSION['productId'] = 19; //please keep as an integer
$_SESSION['quantity'] = 1;
$template["floatingTimer"] = 20;
include_once("Product.php");
//creates a product object that is available from every template
$productDataObj = Product::getProduct($_SESSION["productId"]);
//include template top AFTER the product information is set

include_once("Analytics.php");
$analyticsObj = new Analytics();
include_once("Platform.php");
$platform = new Platform();
require_once("Meta.php");
$metaDataObj = new Meta();
require_once("Customer.php");
$customerObj = new Customer();
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
<html>
<head>
	<?php echo $metaDataObj->title;?>
	<?php echo $metaDataObj->description;?>
	<?php echo $metaDataObj->keywords;?>
	<link href="/assets/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="/assets/css/style-checkout-v2.css">
	<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700' rel='stylesheet' type='text/css'>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="/assets/js/bootstrap.min.js"></script>
	<script src="/js/audio.js"></script>

	<?php
	$isSecure = false;
	if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') {
		$isSecure = true;
	} elseif (!empty($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https' || !empty($_SERVER['HTTP_X_FORWARDED_SSL']) && $_SERVER['HTTP_X_FORWARDED_SSL'] == 'on') {
		$isSecure = true;
	}
	$REQUEST_PROTOCOL = $isSecure ? 'https' : 'http';
	?>

	<script src="/js/floating-1.12.js"></script>
	<?php
	if($template["floatingTimer"] > 0) {
		include_once("timer-floating.php");
	}
	if($template["exitPopType"] === "video") {
		include_once("exit-pop-video.php");
	}
	echo "\n<script src='/js/jquery.validate.min.js'></script>";
	//set this variable on a page that uses the customer-form.php template file to provide validation/states functions
	if($template["formType"] === "customerForm") {
		echo "\n<script src='/js/checkout-states.js'></script>";
		echo "\n<script src='/js/customer-form-validation.js'></script>";
	}
	?>
</head>
<body>
<?php include_once("analytics-google-ecom.php"); ?>
<script src="/js/audio-gb-v2.js"></script>
<script>
	/*
	 This function works in parallel with the setStateTax() function found in the
	 /templates/customer-form.php file
	 by changing the productId on the form, and then triggering setStateTax()
	 the form is recalculated based on an ajax call using the new productId
	 */
	function switchProduct(productId) {
		document.getElementById("productId").value = productId;
		setStateTax();
	}
</script>
<div id="LoadingDiv" style="display:none;">One Moment Please...<br />
	<img src="/assets/images/misc/progressbar.gif" class="displayed" alt="" />
</div>

<!--HEADER-->
<header>
	<div class="header-content">
		<img class="logo center-block" src="/media/images/checkout-v2/f4p-logo.png" />
		<a href='#csr' onclick='showCsrModal();'><img class="phone-contact hidden-xs hidden-sm" src="/media/images/checkout-v2/phone-contact.png" /></a>
		<?php
		if($template["floatingTimer"] > 0) {
			include_once("../templates/snippets/timer-box.html");
		}
		?>
	</div>
	<div class="group"></div>
	<div class="phone-band">
		<div class="phone-band-content">
			<p><em><i class="fa fa-phone"></i>Phone: 1-800-728-0008</em></p>
		</div>
	</div>
</header>

<!--MOBILE PRODUCT AREA-->
<div class="product-area-wrapper hidden-md hidden-lg">
	<div class="product-area-mobile-content">
		<div style="padding-bottom: 20px;">
			<h3 style="margin-top: 0; padding-top: 20px;">3-MONTH<br>FOOD SUPPLY</h3>
			<h4>DELUXE FOOD4PATRIOTS KIT</h4>
			<img src="/media/images/checkout-v2/f4p-3month-kit.png" class="img-responsive center-block">
		</div>
		<div style="padding-bottom: 20px; display: none;">
			<h3 style="margin-top: 0; padding-top: 20px;">4-WEEK<br>FOOD SUPPLY</h3>
			<h4>BASIC FOOD4PATRIOTS KIT</h4>
			<img src="/media/images/checkout-v2/f4p-4week-kit.png" class="img-responsive center-block">
		</div>
		<div style="padding-bottom: 20px; display: none;">
			<h3 style="margin-top: 0; padding-top: 20px;">1-WEEK<br>FOOD SUPPLY</h3>
			<h4>MINIMUM FOOD4PATRIOTS KIT</h4>
			<img src="/media/images/checkout-v2/f4p-1week-kit.png" class="img-responsive center-block">
		</div>
		<div class="quantity-mobile">
			<div class="row quantity-box-content">
				<div class="drop-down">
					<select>
						<option value="3-month">3-MONTH FOOD SUPPLY</option>
						<option value="4-week">4-WEEK FOOD SUPPLY</option>
						<option value="1-week">1-WEEK FOOD SUPPLY</option>
					</select>
				</div>
				<div class="col-lg-6 col-xs-6 quantity-box-left">
					<p><span style="line-height:1.2em">QUANTITY:</span></p>
					<p>PRICE:</p>
					<p>S&H:</p>
					<p>TOTAL:</p>
				</div>
				<div class="col-lg-6 col-xs-6 quantity-box-right">
					<p><select class="1-5"></select></p>
					<p>$497</p>
					<p>FREE</p>
					<p>$497</p>
				</div>
			</div>
		</div>
	</div>
</div>

<!--DESKTOP PRODUCT AREA-->
<div class="group"></div>
<div class="product-area-wrapper hidden-sm hidden-xs">
	<div class="product-area-content">
		<div class="container" style="width:1200px; margin: 0 auto;">
			<div class="tab-content">
				<div id="home" class="tab-pane fade in active">
					<div class="row">
						<div class="col-lg-6 col-md-6">
							<div style="margin-top: 25px;">
								<?php include_once ('customer-form-billing-v2.php'); ?>
							</div>
							<!--<h3>3-MONTH FOOD SUPPLY</h3>
							<h4>DELUXE FOOD4PATRIOTS KIT</h4>
							<img src="/media/images/checkout-v2/f4p-3month-kit.png" class="img-responsive center-block">-->
						</div>
						<div class="col-lg-5 col-md-5 hidden-sm hidden-xs include-column">
							<img src="/media/images/checkout-v2/free-shipping-truck.png" class="img-responsive shipping-truck hidden-sm hidden-xs" style="padding-top:25px;">
							<h5 class="hidden-sm hidden-xs">INCLUDES:</h5>
							<ul class="include-list hidden-sm hidden-xs">
								<li>450 Servings</li>
								<li>FREE Shipping</li>
								<li>FREE Survival Tool</li>
								<li>FREE Seeds Vault</li>
								<li>10 Items Sold Out After Crisis Report</li>
								<li>Water Survival Guide Report</li>
								<li>How to Cut Your Grocery Bill Report</li>
								<li>Survival Garden Guide Report</li>
							</ul>
							<!--<div class="quantity-box">
								<div class="row quantity-box-content">
									<div class="col-lg-6 col-xs-6 quantity-box-left">
										<p><span style="line-height:1.2em">QUANTITY:</span></p>
										<p>PRICE:</p>
										<p><span style="font-size:14px;">TAX:</span></p>
										<p>S&H:</p>
										<p>TOTAL:</p>
									</div>
									<div class="col-lg-6 col-xs-6 quantity-box-right">
										<p><select class="1-5"></select></p>
										<p>$497</p>
										<p><span style="font-size:14px;">$1.95</span></p>
										<p>FREE</p>
										<p>$497</p>
									</div>
								</div>
							</div>-->
						</div>
					</div>
				</div>
				<div id="menu1" class="tab-pane fade">
					<div class="row">
						<div class="col-lg-6 col-md-6">
							<div style="margin-top: 25px;">
								<?php include_once ('customer-form-shipping-v2.php'); ?>
							</div>
							<!--<h3>4-WEEK FOOD SUPPLY</h3>
							<h4>BASIC FOOD4PATRIOTS KIT</h4>
							<img src="/media/images/checkout-v2/f4p-4week-kit.png" class="img-responsive center-block">-->
						</div>
						<div class="col-lg-5 col-md-5 hidden-sm hidden-xs include-column">
							<img src="/media/images/checkout-v2/free-shipping-truck.png" class="img-responsive shipping-truck hidden-sm hidden-xs" style="padding-top:25px;">
							<h5 class="hidden-sm hidden-xs">INCLUDES:</h5>
							<ul class="include-list hidden-sm hidden-xs">
								<li>140 Servings</li>
								<li>FREE Shipping</li>
								<li>10 Items Sold Out After Crisis Report</li>
								<li>Water Survival Guide Report</li>
								<li>How to Cut Your Grocery Bill Report</li>
								<li>Survival Garden Guide Report</li>
							</ul>
							<!--<div class="quantity-box">
								<div class="row quantity-box-content">
									<div class="col-lg-6 col-xs-6 quantity-box-left">
										<p><span style="line-height:1.2em">QUANTITY:</span></p>
										<p>PRICE:</p>
										<p><span style="font-size:14px;">TAX:</span></p>
										<p>S&H:</p>
										<p>TOTAL:</p>
									</div>
									<div class="col-lg-6 col-xs-6 quantity-box-right">
										<p><select class="1-5"></select></p>
										<p>$197</p>
										<p><span style="font-size:14px;">$1.95</span></p>
										<p>FREE</p>
										<p>$197</p>
									</div>
								</div>
							</div>-->
						</div>
					</div>
				</div>
				<div id="menu2" class="tab-pane fade">
					<div class="row">
						<div class="col-lg-6 col-md-6">
							<h3>1-WEEK FOOD SUPPLY</h3>
							<h4>MINIMUM FOOD4PATRIOTS KIT</h4>
							<img src="/media/images/checkout-v2/f4p-1week-kit.png" class="img-responsive center-block">-
						</div>
						<div class="col-lg-5 col-md-5 hidden-sm hidden-xs include-column">
							<div style="padding-top:73px;"></div>
							<h5 class="hidden-sm hidden-xs">INCLUDES:</h5>
							<ul class="include-list hidden-sm hidden-xs">
								<li>36 Servings</li>
								<li>10 Items Sold Out After Crisis Report</li>
								<li>Water Survival Guide Report</li>
								<li>How to Cut Your Grocery Bill Report</li>
								<li>Survival Garden Guide Report</li>
							</ul>
							<!--<div class="quantity-box">
								<div class="row quantity-box-content">
									<div class="col-lg-6 col-xs-6 quantity-box-left">
										<p><span style="line-height:1.2em">QUANTITY:</span></p>
										<p>PRICE:</p>
										<p><span style="font-size:14px;">TAX:</span></p>
										<p>S&H:</p>
										<p>TOTAL:</p>
									</div>
									<div class="col-lg-6 col-xs-6 quantity-box-right">
										<p><select class="1-5"></select></p>
										<p>$67</p>
										<p><span style="font-size:14px;">$1.95</span></p>
										<p>$5.95</p>
										<p>$72.95</p>
									</div>
								</div>
							</div>-->
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!--DESKTOP PRODUCT AREA TABS-->
<div class="tabs-wrapper hidden-sm hidden-xs">
	<div class="tabs-content">
		<ul class="nav nav-pills">
			<li class="active"><a data-toggle="pill" href="#home"><span class="tab-product">3-MONTH FOOD SUPPLY</span><br><span class="tab-price">$497 - ($5/DAY)</span></a></li>
			<li><a data-toggle="pill" href="#menu1"><span class="tab-product">4-WEEK FOOD SUPPLY</span><br><span class="tab-price">$197 - ($7/DAY)</span></a></li>
			<li><a data-toggle="pill" href="#menu2"><span class="tab-product">1-WEEK FOOD SUPPLY</span><br><span class="tab-price">$67 - ($10/DAY)</span></a></li>
		</ul>
	</div>
</div>

<!--BUY BUTTON-->
<div class="buy-button-wrapper">
	<div class="buy-button-content">
		<div class="quantity-box hidden-sm hidden-xs">
			<div class="row quantity-box-content">
				<div class="col-lg-6 col-xs-6 quantity-box-left">
					<p><span style="line-height:1.2em">QUANTITY:</span></p>
					<p>PRICE:</p>
					<p><span style="font-size:14px;">TAX:</span></p>
					<p>S&H:</p>
					<p>TOTAL:</p>
				</div>
				<div class="col-lg-6 col-xs-6 quantity-box-right">
					<p><select class="1-5"></select></p>
					<p>$67</p>
					<p><span style="font-size:14px;">$1.95</span></p>
					<p>$5.95</p>
					<p>$72.95</p>
				</div>
			</div>
		</div>
		<a href="#" ><div class="buy-button">CLICK TO CONTINUE</div></a>
	</div>
</div>

<!--TESTIMONIALS-->
<div class="group"></div>
<div class="testimonial-wrapper">
	<div class="testimonial-content">
		<h1>WHAT PEOPLE ARE SAYING ABOUT FOOD4PATRIOTS </h1>
		<div class="testimonial-column">
			<div class="row testimonial-row">
				<div class="col-sm-2 testimonial-image">
					<img class="img-responsive center-block" src="/media/images/checkout-v2/profile-01.jpg">
				</div>
				<div class="col-sm-10 testimonial-text">
					<p>"I am a new customer and heard about your company from my brother. Praises to your customer service heroes! Their patience, kindness and care with my calls were like talking with my best friend. Thank you!" <span class="person">- Diana L.</span></p>
				</div>
			</div>
			<div class="row testimonial-row">
				<div class="col-sm-2 testimonial-image">
					<img class="img-responsive center-block" src="/media/images/checkout-v2/profile-02.jpg">
				</div>
				<div class="col-sm-10 testimonial-text">
					<p>"Hello Frank - this is Rolf K. and I am one of your very happy customers. The most important thing is your food tastes great. I've tasted 2 out of the 4 entr&eacute;es in one of the small packages and I now have a tub and three other small packages set away...and am feeling pretty good about it. Keep up the good work!" <span class="person">- Rolf K.</span></p>
				</div>
			</div>
			<div class="row testimonial-row">
				<div class="col-sm-2 testimonial-image">
					<img class="img-responsive center-block" src="/media/images/checkout-v2/profile-03.jpg">
				</div>
				<div class="col-sm-10 testimonial-text">
					<p>"My purchase of Food4Patriots has indeed brought me peace of mind...I particularly loved the choices in the different price and size ranges for the Food4Patriots product. The fact that it has a shelf life of 25 years, if it is properly stored, is an added plus! I intend to make a second purchase in the near future, as my budget allows because it just makes sense." <span class="person"><br class="hidden-xs">- Lynn G.</span></p>
				</div>
			</div>
			<div class="row testimonial-row">
				<div class="col-sm-2 testimonial-image">
					<img class="img-responsive center-block" src="/media/images/checkout-v2/profile-04.jpg">
				</div>
				<div class="col-sm-10 testimonial-text">
					<p>"All our orders were received in perfect condition and in containers that make storage and inventory easy to access when needed. Very organized with labeling, highly recommend ordering your product for friends and family and anyone who wants to look ahead and be prepared for the unexpected. Thanks!" <span class="person"> - Jeff W.</span></p>
				</div>
			</div>
		</div>
		<div class="testimonial-video-column">
			<div class="video-box">
				<a href="//fast.wistia.net/embed/iframe/opv3odaymw?popover=true" class="wistia-popover[height=406,playerColor=7b796a,width=720]"><img src="/media/images/checkout-v2/video-bg.jpg" /></a>
				<script charset="ISO-8859-1" src="//fast.wistia.com/assets/external/popover-v1.js"></script>
			</div>
			<a href="//fast.wistia.net/embed/iframe/yy5q5l29h0?popover=true" class="wistia-popover[height=360,playerColor=7b796a,width=640]"><img class="img-responsive center-block fb-testimonial" src="/media/images/checkout-v2/fb-testimonial-01.png"/></a>
			<script charset="ISO-8859-1" src="//fast.wistia.com/assets/external/popover-v1.js"></script>
			<img class="img-responsive center-block fb-testimonial" src="/media/images/checkout-v2/fb-testimonial-02.png"/>
		</div>
	</div>
</div>

<!--GLENN BECK-->
<div class="group"></div>
<div class="glenn-beck-wrapper">
	<div class="glenn-beck-content">
		<div class="row">
			<div class="col-sm-7">
				<div class="glenn-beck-callout">"Patriot Pantry meals: they make the cut because they are delicious, nutritious and good for 25 years."<br>- Glenn Beck</div>
				<div class="glenn-beck-caption">Glenn Beck (host of The Glenn Beck Show on radio, TV, and frequent guest on FoxNews), recommends Patriot Pantry, the survival food in Food4patriots Kits.</div>
			</div>
			<div class="col-sm-5 glenn-beck-img">
				<audio id="GBCheckoutAudioSrc" src="/media/audio/f4p-beck-testimonial-01.mp3" preload="auto"></audio>
				<img id="GBCheckoutAudioControl" class="audioControl gb-button" src="/media/images/checkout-v2/gb-button.png" onclick="toggleAudio('GBCheckout');">
			</div>
		</div>
	</div>
</div>

<!--WHATS INCLUDED MENU-->
<div class="group"></div>
<div class="whats-included-menu-wrapper">
	<div class="whats-included-menu-content">
		<h1 style="padding:20px 35px;">WHAT MEALS ARE INCLUDED?</h1>
		<ul class="nav nav-pills">
			<li class="active"><a data-toggle="pill" href="#menu3"><span class="tab-product">3-MONTH FOOD SUPPLY</span><br><span class="tab-price">$497 - ($5/DAY)</span></a></li>
			<li><a data-toggle="pill" href="#menu4"><span class="tab-product">4-WEEK FOOD SUPPLY</span><br><span class="tab-price">$197 - ($7/DAY)</span></a></li>
			<li><a data-toggle="pill" href="#menu5"><span class="tab-product">1-WEEK FOOD SUPPLY</span><br><span class="tab-price">$67 - ($10/DAY)</span></a></li>
		</ul>
	</div>
</div>


<!--WHATS INCLUDED-->
<div class="whats-included-wrapper">
	<div class="whats-included-content">
		<div class="container">
			<div class="tab-content">
				<div id="menu3" class="tab-pane fade in active">
					<div class="row" style="margin: 0 auto;">
						<div class="col-md-5 col-sm-12 col-xs-12">
							<h2>3-MONTH FOOD SUPPLY<br><span style="color:#777">450 SERVINGS, MAY INCLUDE:</span></h2>
							<div class="whats-included-list">
								<ul>
									<li>Blue Ribbon Creamy Chicken Rice (24)</li>
									<li>Cheesy Broccoli & Rice Soup (16)</li>
									<li>Chocolate Pudding (30)</li>
									<li>Country Cottage Mac & Cheese (16)</li>
									<li>Creamy Beef Stroganoff (16)</li>
									<li>Granny's Homestyle Potato Soup (24)</li>
									<li>Heartland's Best Mashed Potatoes (32)</li>
									<li>Honey Coated Banana Chips (16)</li>
									<li>Independence Hall Chicken Noodle Soup (8)</li>
									<li>Instant White Rice (20)</li>
									<li>Liberty Bell Potato Cheddar Soup (20)</li>
									<li>Maple Grove Oatmeal (56)</li>
									<li>Orange Drink Energy Mix (32)</li>
									<li>Settler's Whey Powdered Milk (48)</li>
									<li>Strawberry Fields Cream of Wheat (32)</li>
									<li>Summer's Best Corn Chowder (8)</li>
									<li>Traditional Fettuccine Alfredo (20)</li>
									<li>Traveler's Stew (24)</li>
									<li>Uncle Frank's Italian Lasagna (8)</li>
								</ul>
							</div>
						</div>
						<div class="col-md-5 food-grid hidden-xs hidden-sm">
							<div class="row">
								<div class="col-md-6 col-sm-6">
									<img class="img-responsive center-block" src="/media/images/checkout-v2/food/creamy-chicken-rice.jpg" style="width:100%;">
									<p>Blue Ribbon Creamy Chicken Rice</p>
								</div>
								<div class="col-md-6 col-sm-6">
									<img class="img-responsive center-block" src="/media/images/checkout-v2/food/cheesy-broccoli-soup.jpg" style="width:100%;">
									<p>Cheesy Broccoli & Rice Soup</p>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6 col-sm-6">
									<img class="img-responsive center-block" src="/media/images/checkout-v2/food/chocolate-pudding.jpg" style="width:100%;">
									<p>Chocolate Pudding</p>
								</div>
								<div class="col-md-6 col-sm-6">
									<img class="img-responsive center-block" src="/media/images/checkout-v2/food/mac-and-cheese.jpg" style="width:100%;">
									<p>Country Cottage Mac & Cheese</p>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6 col-sm-6">
									<img class="img-responsive center-block" src="/media/images/checkout-v2/food/beef-stroganoff.jpg" style="width:100%;">
									<p>Creamy Beef Stroganoff</p>
								</div>
								<div class="col-md-6 col-sm-6">
									<img class="img-responsive center-block" src="/media/images/checkout-v2/food/homestyle-potato-soup.jpg" style="width:100%;">
									<p>Granny's Homestyle Potato Soup</p>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6 col-sm-6">
									<img class="img-responsive center-block" src="/media/images/checkout-v2/food/mashed-potatoes.jpg" style="width:100%;">
									<p>Heartland's Best Mashed Potatoes</p>
								</div>
								<div class="col-md-6 col-sm-6">
									<img class="img-responsive center-block" src="/media/images/checkout-v2/food/banana-chips.jpg" style="width:100%;">
									<p>Honey Coated Banana Chips</p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div id="menu4" class="tab-pane fade">
					<div class="row" style="margin: 0 auto;">
						<div class="col-md-5 col-sm-12 col-xs-12">
							<h2>4-WEEK FOOD SUPPLY<br><span style="color:#777">140 SERVINGS, MAY INCLUDE:</span></h2>
							<div class="whats-included-list">
								<ul>
									<li>Blue Ribbon Creamy Chicken Rice (8)</li>
									<li>Cheesy Broccoli & Rice Soup (8)</li>
									<li>Chocolate Pudding (10)</li>
									<li>Heartland's Best Mashed Potatoes (8)</li>
									<li>Honey Coated Banana Chips (8)</li>
									<li>Independence Hall Chicken Noodle Soup (8)</li>
									<li>Instant White Rice (10)</li>
									<li>Liberty Bell Potato Cheddar Soup (8)</li>
									<li>Maple Grove Oatmeal (24)</li>
									<li>Orange Drink Energy Mix (8)</li>
									<li>Settler's Whey Powdered Milk (16)</li>
									<li>Strawberry Fields Cream of Wheat (8)</li>
									<li>Traveler's Stew (8)</li>
								</ul>
							</div>
						</div>
						<div class="col-md-5 food-grid hidden-xs hidden-sm">
							<div class="row">
								<div class="col-md-6 col-sm-6">
									<img class="img-responsive center-block" src="/media/images/checkout-v2/food/chicken-noodle-soup.jpg" style="width:100%;">
									<p>Independence Hall Chicken Noodle Soup</p>
								</div>
								<div class="col-md-6 col-sm-6">
									<img class="img-responsive center-block" src="/media/images/checkout-v2/food/white-rice.jpg" style="width:100%;">
									<p>Instant White Rice</p>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6 col-sm-6">
									<img class="img-responsive center-block" src="/media/images/checkout-v2/food/potato-soup.jpg" style="width:100%;">
									<p>Liberty Bell Potato Cheddar Soup</p>
								</div>
								<div class="col-md-6 col-sm-6">
									<img class="img-responsive center-block" src="/media/images/checkout-v2/food/oatmeal.jpg" style="width:100%;">
									<p>Maple Grove Oatmeal</p>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6 col-sm-6">
									<img class="img-responsive center-block" src="/media/images/checkout-v2/food/orange-energy-drink.jpg" style="width:100%;">
									<p>Orange Drink Energy Mix</p>
								</div>
								<div class="col-md-6 col-sm-6">
									<img class="img-responsive center-block" src="/media/images/checkout-v2/food/powdered-milk.jpg" style="width:100%;">
									<p>Settler's Whey Powdered Milk</p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div id="menu5" class="tab-pane fade">
					<div class="row" style="margin: 0 auto;">
						<div class="col-md-5 col-sm-12 col-xs-12">
							<h2>1-WEEK FOOD SUPPLY<br><span style="color:#777">36 SERVINGS, MAY INCLUDE:</span></h2>
							<div class="whats-included-list">
								<ul>
									<li>Blue Ribbon Creamy Chicken Rice (4)</li>
									<li>Heartland's Best Mashed Potatoes (4)</li>
									<li>Honey Coated Banana Chips (4)</li>
									<li>Country Cottage Mac & Cheese (4)</li>
									<li>Creamy Beef Stroganoff (4)</li>
									<li>Granny's Homestyle Potato Soup (4)</li>
									<li>Maple Grove Oatmeal (8)</li>
									<li>Traveler's Stew (8)</li>
								</ul>
							</div>
						</div>
						<div class="col-md-5 food-grid hidden-xs hidden-sm">
							<div class="row">
								<div class="col-md-6 col-sm-6">
									<img class="img-responsive center-block" src="/media/images/checkout-v2/food/mashed-potatoes.jpg" style="width:100%;">
									<p>Heartland's Best Mashed Potatoes</p>
								</div>
								<div class="col-md-6 col-sm-6">
									<img class="img-responsive center-block" src="/media/images/checkout-v2/food/banana-chips.jpg" style="width:100%;">
									<p>Honey Coated Banana Chips</p>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6 col-sm-6">
									<img class="img-responsive center-block" src="/media/images/checkout-v2/food/mac-and-cheese.jpg" style="width:100%;">
									<p>Country Cottage Mac & Cheese</p>
								</div>
								<div class="col-md-6 col-sm-6">
									<img class="img-responsive center-block" src="/media/images/checkout-v2/food/beef-stroganoff.jpg" style="width:100%;">
									<p>Creamy Beef Stroganoff</p>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6 col-sm-6">
									<img class="img-responsive center-block" src="/media/images/checkout-v2/food/homestyle-potato-soup.jpg" style="width:100%;">
									<p>Granny's Homestyle Potato Soup</p>
								</div>
								<div class="col-md-6 col-sm-6">
									<img class="img-responsive center-block" src="/media/images/checkout-v2/food/oatmeal.jpg" style="width:100%;">
									<p>Maple Grove Oatmeal</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!--WHATS INCLUDED BUY BUTTON-->
<div class="buy-button-wrapper">
	<div class="buy-button-content">
		<a href="#" ><div class="buy-button">CLICK TO CONTINUE</div></a>
	</div>
</div>

<!--GUARANTEES-->
<div class="group"></div>
<div class="guarantee-wrapper">
	<div class="group"></div>
	<div class="guarantee-content">
		<div class="row">
			<div class="col-sm-7 guarantees">
				<p><span class="guarantee-number">GUARANTEE #1:</span> This is a 100% money back guarantee. No questions asked. If for any reason, you're not satisfied with your Food4Patriots kit, just return it within 60 days of purchase and I'll refund 100% of your purchase.</p>
				<p><span class="guarantee-number">GUARANTEE #2:</span> This is an unheard of 300% money back guarantee. It's in addition to guarantee #1. If you open any of your Food4Patriots meals anytime in the next 25 years and find that your food has spoiled, you can return your entire Food4Patriots stockpile and I will triple your money back!</p>
			</div>
			<div class="col-sm-5 guarantee-seal">
				<img class="img-responsive center-block" src="/media/images/checkout-v2/satisfaction-seal.png">
			</div>
		</div>
	</div>
</div>

<!--FAQ-->
<div class="group"></div>
<div class="faq-wrapper">
	<div class="faq-content">
		<h1>FREQUENTLY ASKED QUESTIONS</h1>
		<div class="row">
			<div class="col-lg-12">
				<div class="panel-group" id="faqAccordion">
					<div class="panel panel-default">
						<a data-toggle="collapse" data-parent="#faqAccordion" href="#collapseTwo">
							<div class="panel-heading">
								<h4 class="panel-title">
									Q: How much food should I order?
								</h4>
							</div>
						</a>
						<div id="collapseTwo" class="panel-collapse collapse">
							<div class="panel-body">
								<p>We recommend that most folks shopping for survival food invest in at least one 3-month food kit. That's a solid start to your food stockpile and puts you in a good position for the most common disaster situations. In a crisis, your food will be worth more than gold and the 3-month kit allow you to take advantage of our lowest possible prices today plus get a boatload of free bonus gifts.</p>
							</div>
						</div>
					</div>
					<div class="panel panel-default">
						<a data-toggle="collapse" data-parent="#faqAccordion" href="#collapseThree">
							<div class="panel-heading">
								<h4 class="panel-title">
									Q: What is the best way to store this food?
								</h4>
							</div>
						</a>
						<div id="collapseThree" class="panel-collapse collapse">
							<div class="panel-body">
								<p>We pack the 4-week and 3-month kits in sturdy plastic totes that are waterproof, sturdy, and the perfect solution for long-term storage. All totes are designed to be able to stack nicely and can be stored covertly in your basement, garage, or conveniently in a kitchen cabinet. The 4-week kit comes in a tote which measures 18&quot; long x 12.63&quot; wide x 7.13&quot; high. The 3-month kit comes in two totes that are each: 25.75&quot; long x 18.37&quot; wide x 7.13&quot; high.</p>
							</div>
						</div>
					</div>
					<div class="panel panel-default">
						<a data-toggle="collapse" data-parent="#faqAccordion" href="#collapseFour">
							<div class="panel-heading">
								<h4 class="panel-title">
									Q: How long will this food last?
								</h4>
							</div>
						</a>
						<div id="collapseFour" class="panel-collapse collapse">
							<div class="panel-body">
								<p>We guarantee a 25 year shelf life for your food. Our food, stored properly never really expires, but after 25 years the nutritional value will slowly start to decline.</p>
							</div>
						</div>
					</div>
					<div class="panel panel-default">
						<a data-toggle="collapse" data-parent="#faqAccordion" href="#collapseFive">
							<div class="panel-heading">
								<h4 class="panel-title">
									Q: Where is this food made?
								</h4>
							</div>
						</a>
						<div id="collapseFive" class="panel-collapse collapse">
							<div class="panel-body">
								<p>Our food is made in an FDA approved and inspected facility right here in the United States. We source US-grown ingredients and the entire food production process happens right here in the good ole US of A!</p>
							</div>
						</div>
					</div>
					<div class="panel panel-default">
						<a data-toggle="collapse" data-parent="#faqAccordion" href="#collapseSix">
							<div class="panel-heading">
								<h4 class="panel-title">
									Q: How will this product be shipped to me and how quickly?
								</h4>
							</div>
						</a>
						<div id="collapseSix" class="panel-collapse collapse">
							<div class="panel-body">
								<p>Due to very high demand, our warehouse is currently packing and shipping an extremely large number of shipments. <strong>As of <?php echo date("m/d/Y"); ?>, inventory is available and when you order now you will instantly receive an order confirmation email.</strong> Our goal is to ship your order within the next 24-48 hours (weekends & holidays excluded). Rest assured, our warehouse staff will work hard to get your order out the door to you as quickly as possible!</p>
								<p>We will ship your order directly to your home or office using a premium carrier such as Fed Ex and you will have it within 5 to 7 business days of shipment. Products are shipped from Utah, USA and we will send you a shipment notification email with tracking number as soon as your order ships so that you can track it right to your door.</p>

								<!--  <p>We will ship your order directly to your home or office using a premium carrier such as Fed Ex and you will have it within 5 to 7 business days.  Our goal is to ship all orders within 1 business day. Products are shipped from Utah, USA and you will receive an order confirmation email plus a shipment notification email with tracking number once your order ships.</p> -->
							</div>
						</div>
					</div>
					<div class="panel panel-default">
						<a data-toggle="collapse" data-parent="#faqAccordion" href="#collapseSeven">
							<div class="panel-heading">
								<h4 class="panel-title">
									Q: How long will today's special pricing be available?
								</h4>
							</div>
						</a>
						<div id="collapseSeven" class="panel-collapse collapse">
							<div class="panel-body">
								<p>We are unable to guarantee today's pricing beyond today. Our pricing often changes due to the constantly changing prices of the high-quality, made-in-the-USA ingredients. Also, the recent attempt by FEMA and DHS to hoard survival food may result in decreased supply throughout the market. To guarantee our lowest pricing, be sure to secure your order today.</p>
							</div>
						</div>
					</div>
					<div class="panel panel-default">
						<a data-toggle="collapse" data-parent="#faqAccordion" href="#collapseEight">
							<div class="panel-heading">
								<h4 class="panel-title">
									Q: What if this product doesn't work for me?
								</h4>
							</div>
						</a>
						<div id="collapseEight" class="panel-collapse collapse">
							<div class="panel-body">
								<p>While we feel that Food4Patriots is the top-rated product in the emergency food industry, if for any reason at all you are unsatisfied with your purchase, just let us know within 60 days and we will refund 100% of your purchase without question. Plus you are protected with our unprecedented 300% money back guarantee if any of your food goes bad in the next 25 years.</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!--BADGES-->
<div class="group"></div>
<div class="badge-wrapper hidden-xs">
	<div class="badge-content">
		<div class="">
			<div class="row">
				<div class="col-sm-2 col-md-2"></div>
				<div class="col-sm-2 col-md-2 text-center">
					<a name="trustlink" href="http://secure.trust-guard.com/security/8491" rel="nofollow" target="_blank" onclick="var nonwin=navigator.appName!='Microsoft Internet Explorer'?'yes':'no'; window.open(this.href.replace(/https?/, 'https'),'welcome','location='+nonwin+',scrollbars=yes,width=517,height='+screen.availHeight+',menubar=no,toolbar=no'); return false;" oncontextmenu="var d = new Date(); alert('Copying Prohibited by Law - This image and all included logos are copyrighted by trust-guard \251 '+d.getFullYear()+'.'); return false;"><img name="trustseal" alt="Security Seals" style="border: 0;" src="//dw26xg4lubooo.cloudfront.net/seals/security/8491-large.gif" /></a>
				</div>
				<div class="col-sm-2 col-md-2" style="padding-bottom:20px;">
					<!--Norton security/seal-->
					<div>
						<table class="text-center center-block" width="135" border="0" cellpadding="2" cellspacing="0" title="Click to Verify - This site chose Symantec SSL for secure e-commerce and confidential communications.">
							<tr>
								<td width="135" align="center" valign="top"><script type="text/javascript" src="https://seal.verisign.com/getseal?host_name=secure.food4patriots.com&amp;size=M&amp;use_flash=NO&amp;use_transparent=NO&amp;lang=en"></script></td>
							</tr>
						</table>
					</div>
				</div>
				<div class="col-sm-2 col-md-2 text-center" style="padding-top: 13px;">
					<!--honesty online badge-->
					<div>
						<a href="https://honesteonline.com/members/consumerpage.php?company=12046&link=9869" target="_blank"><img src="https://honesteonline.com/HEOSealsNewNoDate/heosealimg.php?company=12046&size=2&link=9869" alt="HONESTe Seal - Click to verify before you buy!" border="0"style="margin-right:20px;"></a>
					</div>
				</div>
				<div class="col-sm-2 col-md-2 text-center">
					<img src="/assets/images/checkout/trustseals-usa-01.gif" width="130" height="82" alt="Trust Seals">
				</div>
				<div class="col-sm-2 col-md-2"></div>
			</div>
		</div>
	</div>
</div>

<!--FOOTER-->
<div class="group"></div>
<div class="footer-wrapper">
	<div class="footer-content">
		<div class="container footer">
			<div>
				<address>
					<strong>Food4Patriots</strong><br>
					4322 Harding Pike Suite 417, PMB 121<br>
					Nashville, TN 37205<br>
					1-800-728-0008
				</address>
			</div>
			<?php
			if(strpos($_SERVER["PHP_SELF"], "/oto/") === FALSE) {
				include_once("footer-links.php");
			}

			?>
			<div><br />Copyright &copy; <?php echo date("Y");?> Food4Patriots<strong>&reg;</strong> &dash; All rights reserved.<br /><br /></div>
			<div class="badge-4p">
				<img src="/assets/images/misc/4p-badge.png"/>
			</div>
		</div>
		<!-- /footer -->
	</div>
</div>



</body>
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
	$(function(){
		var $select = $(".1-5");
		for (i=1;i<=5;i++){
			$select.append($('<option></option>').val(i).html(i))
		}
	});
</script>
<script>
	function showCsrModal() {
		$('#csrModal').modal('show');
	}
	function hideCsrModal() {
		$('#csrModal').modal('hide');
	}
</script>
<style>
	#csrModal p {
		margin-bottom:7px;
	}
</style>
<div id="csrModal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" style="width:500px;height:300px;">
		<div class="modal-content" style="background-image:url(/assets/images/misc/timer-pop-01.jpg);">
			<div style="text-align:center;padding:10px;width:500px;height:300px;">
				<div class="glyphicon glyphicon-remove-circle" style="float:right;cursor:pointer;" onclick="hideCsrModal();"></div>
				<div style="position:relative;top:160px;width:300px;">
					<p><a class="btn btn-primary" href="javascript: olark('api.box.expand'); hideCsrModal();">Chat With Us</a></p>
					<p><a class="btn btn-success" href="/checkout/index.php">Return To Order Form</a></p>
				</div>
			</div>
		</div>
	</div>
</div>


</html>
