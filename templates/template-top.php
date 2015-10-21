<?php
include_once("Analytics.php");
$analyticsObj = new Analytics();
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

// SPLIT JV-24 10/19/15
if (JV::in("24-letter")) {
	if ($_SERVER["PHP_SELF"] === "/video/index.php"){
		// Redirect Tablet To Letter
		if($detect->isTablet() ){
			header('Location: /letter/index.php');
			exit();
		}
	}
}
// END TEST
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<!--<meta http-equiv="X-UA-Compatible" content="IE=edge">-->
		<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE9">
		<?php echo $metaDataObj->title;?>
		<?php echo $metaDataObj->description;?>
		<?php echo $metaDataObj->keywords;?>
		<meta name="generator" content="Bootply" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link href="/assets/css/bootstrap.css" rel="stylesheet">
		<link rel="shortcut icon" href="/favicon.ico">
		<link href="/assets/css/styles.css" rel="stylesheet">
		<link href="/assets/css/styles-content.css" rel="stylesheet">
		<?php
		if(strpos($_SERVER["PHP_SELF"],"quiz") > 0) {
			echo "<link href='/assets/css/quiz.css' rel='stylesheet'>\n";
			echo "<script type='text/javascript' src='/js/quiz.js'></script>\n";
		}
		$isSecure = false;
		if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') {
			$isSecure = true;
		} elseif (!empty($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https' || !empty($_SERVER['HTTP_X_FORWARDED_SSL']) && $_SERVER['HTTP_X_FORWARDED_SSL'] == 'on') {
			$isSecure = true;
		}
		$REQUEST_PROTOCOL = $isSecure ? 'https' : 'http';
		?>
		<link href="<?php echo $REQUEST_PROTOCOL;?>://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
		<!--[if lt IE 9]>
			<script src="<?php echo $REQUEST_PROTOCOL;?>://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<!--Internet Explorer 9,8,7,....-->
		<!--[if lte IE 9]><link rel="stylesheet" type="text/css" href="/assets/css/ie10.css"/><![endif]-->
		<!--Internet Explorer 10-->

		<!--Internet Explorer Cross Browsing Ends-->
		<!--Enable HTML 5 Elements and Media Queries-->
		<!--[if lte IE 9]>
		<script type="text/javascript" src="/assets/js/html5shiv.js"></script>
		<script type="text/javascript" src="/assets/js/respond.min.js"></script>
		<![endif]-->


		<script src="<?php echo $REQUEST_PROTOCOL;?>://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
		<script src="/assets/js/bootstrap.min.js"></script>
		<script src="/js/patriot.js"></script>

		<!--TODO only pull in if we need the exit confirm-->
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
	<body id="background-img">
	<?php include_once("ga-data-layer.php"); ?>

	<?php
	if($platformCountDownToDate) {
	?>
	<div id="endofDateCountDown"></div>
	<?php
	}
	?>
	<div id="LoadingDiv" style="display:none;">One Moment Please...<br />
		<img src="/assets/images/misc/progressbar.gif" class="displayed" alt="" />
	</div>
<div class="navbar navbar-default">
	<div class="container">