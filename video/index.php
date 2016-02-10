<?php

// Define the current page name.
$page = "video";
// END TEST //

$isSecure = false;
if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') {
	$isSecure = true;
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https' || !empty($_SERVER['HTTP_X_FORWARDED_SSL']) && $_SERVER['HTTP_X_FORWARDED_SSL'] == 'on') {
	$isSecure = true;
}
if($isSecure ) {
	$nonSecureHost = $_SERVER["HTTP_HOST"];
	$nonSecurePath = $_SERVER["REQUEST_URI"];
	header("Location: http://" . $nonSecureHost . $nonSecurePath);
	exit;
}

$templateArray = array (
	"null", // Template Variations
);
if($_GET["t"]) {
	if(in_array(trim($_GET["t"]),$templateArray)) {
		$templateDesign = trim($_GET["t"]);
	}
}
$variantsArray = array (
	"gb", // Glenn Beck
	"no-logo", // No logos/badges shown at the bottom
	"np-nologo", // No exit pop, and no logos/badges
	"np", // No exit pop
	"pu", // Pop Under
	"quiz", // Quiz
);
if($_GET["v"]) {
	if(in_array(trim($_GET["v"]),$variantsArray)) {
		$variation = trim($_GET["v"]);
	}
}
$vslArray = array (
	"stansberry", // JV Partner Stansberry No Warning Intro
	"fs", // 3.1 Food Stamp Hook
	"3f", // 3.1 3 Foods Hook

);
if($_GET["vsl"]) {
	if(in_array(trim($_GET["vsl"]),$vslArray)) {
		$vsl = trim($_GET["vsl"]);
	}
}
$pubArray = array (
	"100" => "fans of Guns & Ammo",
	"101" => "fans of American Hunter",
	"102" => "fans of American Rifleman",
	"103" => "fans of America's 1st Freedom",
	"104" => "subscribers of Uncommon Wisdom Daily",
	"105" => "subscribers of Palm Beach Daily",
	"106" => "subscribers of National Self Reliance Association",
	"107" => "subscribers of Health Sciences Institute",
	"108" => "Sovereign Investor Daily readers",
	"109" => "subscribers of Barton Publishing",
	"110" => "subscribers of Laissez Faire Today",
	"111" => "Dr. Sears&#39; Readers",
	"112" => "subscriber of The Oxford Club",
	"113" => "subscribers of House Calls",
);
if($_GET["pub"]) {
	if(array_key_exists(trim($_GET["pub"]),$pubArray)) {
		$pub = trim($_GET["pub"]);
	}
}

if($variation !== "np" & $variation !== "np-nologo" & $vsl !== "fs" & $vsl !== "3f") {
	$template["exitPopType"] = "video"; //designates that this should not have an exit pop of type video
}

/*USES MOBILE DETECT TO REDIRECT*/
require_once("MobileDetect.php");
$detect = new Mobile_Detect;

if ($vsl != "3f" && $vsl != "fs" && ($detect->isMobile())) {
	header('Location: /letter/index.php');
	exit();
};
/*END MOBILE REDIRECT*/


// SET PRODUCT ID
$_SESSION['productId'] = 162; //please keep as an integer
$_SESSION['quantity'] = 1;
include_once("Product.php");
//creates a product object that is available from every template
$productDataObj = Product::getProduct($_SESSION["productId"]);
//include template top AFTER the product information is set

/*SPLIT JV-38 11/20/15 TEST CALLED - NEEDS REDESIGNED*/
include_once("agile/template-top.php");
/*END TEST*/

include_once ('template-header.php'); /*Add template-header-nav.php to add top menu*/
$offerUrl = "/checkout/index.php" . $analyticsObj->queryString;
$platform->setCsrModalButtons("sample,video,letter");
?>

<script>
/*
	This is the countdown timer, used for the visual display of the 'clock'.
	It uses a date object where the last three integers are hours, minutes, seconds.
	When the timer reaches zero it clears the timer object and calls a function
	to call the CSR Modal Window.

	This timer requires a block object (div) with an id of 'countDownTimer'.
 */
	var jsTimer = setInterval(function(){timerChange()},1000);

	timerDateObj = new Date(2014, 01, 01, 12, 48, 00);51;

	function timerChange() {
		time = timerDateObj.getTime();
		newTime = time - 1000;
		timerDateObj.setTime(newTime);
		m = timerDateObj.getMinutes();
		s = timerDateObj.getSeconds();
		if(s < 10) {
			s = "0" + s;
		}
		$("#countDownTimer").html(m + ":" + s);
		if(parseInt(s) + parseInt(m) == 0) {
			clearInterval(jsTimer);
			showCsrModal();
		}
	}
</script>
<!--INCLUDE CONTENT - ADD IF STATEMENT TO SWITCH CONTENT -->
<?php
	// SPLIT JV-56 ALL DEVICES 2/12/16
	if (JV::in("56-VSL4")) {
		include_once('content-jv-56-vsl4.php'); /*JV-56 SPLIT*/
	}else{
		include_once('content.php'); /*CONTROL*/
	};
?>
<!--INCLUDE CONTENT-->
<script>
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
</script>

<?php
include_once("template-bottom.php");