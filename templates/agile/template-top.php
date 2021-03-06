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

// Allow the page type to revert to OTO as default.
if (! isset($page) || !$page) {
$page = "oto";
}

// Allow the asset manager to resolve assets for this page.
include_once 'AssetManager.php';
$assets = new AssetManager($page);

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
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<?php echo $metaDataObj->title;?>
	<?php echo $metaDataObj->description;?>
	<?php echo $metaDataObj->keywords;?>
	<meta name="generator" content="Bootply" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="format-detection" content="telephone=no">
	<link rel="shortcut icon" href="/favicon.ico">
	<!-- Latest compiled and minified CSS. -->
	<?php $assets->css(); ?>
	<?php if ($page === "letter" || $page == "video"): ?>
		<link href='https://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,700,600,300,800' rel='stylesheet' type='text/css'>
	<?php endif; ?>

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
	<?php if ($page == "checkout"): ?><link href="<?php echo $REQUEST_PROTOCOL;?>://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet"><?php endif; ?>
	<?php if ($page == "oto"): ?><link href="<?php echo $REQUEST_PROTOCOL;?>://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet"><?php endif; ?>

	<!-- Load the application JS. -->
	<script src="<?php echo $REQUEST_PROTOCOL;?>://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
	<?php $assets->js(); ?>

	<?php if (preg_match('~MSIE|Internet Explorer~i', $_SERVER['HTTP_USER_AGENT']) || (strpos($_SERVER['HTTP_USER_AGENT'], 'Trident/7.0; rv:11.0') !== false)) { ?>
		<script src="<?php echo $REQUEST_PROTOCOL;?>://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<link rel="stylesheet" type="text/css" href="/assets/css/ie10.css"/>
		<script type="text/javascript" src="/assets/js/html5shiv.js"></script>
		<script type="text/javascript" src="/assets/js/respond.min.js"></script>
	<?php } ?>

	<?php
	if($template["floatingTimer"] > 0) {
		include_once("timer-floating.php");
	}
	if($template["exitPopType"] === "video") {
		include_once("exit-pop-video.php");
	}
	?>
	<?php if (JV::in("66-geo")): /*JV-66 MOBILE ONLY GEOTARGETING*/?>
	<script type='text/javascript' src='https://www.geolify.com/geojavascript.php?id=12428'></script>
	<?php endif ?>
</head>
<body>
<?php include_once("ga-data-layer.php"); ?>

<div id="LoadingDiv" style="display:none;">One Moment Please...<br />
	<img src="/assets/images/misc/progressbar.gif" width="220" height="19" class="displayed" alt="" />
</div>
<div class="navbar navbar-default">
	<div class="container">