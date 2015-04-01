<?php

$variantsArray = array (
	"gb", // Glenn Beck
	"no-logo", // No logos/badges shown at the bottom
	"np-nologo", // No exit pop, and no logos/badges
	"np", // No exit pop
	"pu", // Pop Under
	"b", // Testimonials - FAQ - Guarantee
	"stansberry", // JV Partner Stansberry No Warning Intro
	"l1", // TEST LANDING PAGE 1 3/31/15
	"l2", // TEST LANDING PAGE 2 3/31/15
	"l3", // TEST LANDING PAGE 3 3/31/15
	"l4", // TEST LANDING PAGE 4 3/31/15
);
if($_GET["v"]) {
	if(in_array(trim($_GET["v"]),$variantsArray)) {
		$variation = trim($_GET["v"]);
	}
}

$pubArray = array (
	"100" => "Guns & Ammo",
	"101" => "American Hunter",
	"102" => "American Rifelman",
	"103" => "America's 1st Freedom",
);
if($_GET["pub"]) {
	if(array_key_exists(trim($_GET["pub"]),$pubArray)) {
		$pub = trim($_GET["pub"]);
	}
}

if($variation !== "np" & $variation !== "np-nologo") {
	$template["exitPopType"] = "video"; //designates that this should have an exit pop of type video
}

// SET PRODUCT ID
$_SESSION['productId'] = 162; //please keep as an integer
$_SESSION['quantity'] = 1;
include_once("Product.php");
//creates a product object that is available from every template
$productDataObj = Product::getProduct($_SESSION["productId"]);
//include template top AFTER the product information is set
include_once ('template-top.php');
include_once ('template-header.php'); /*Add template-header-nav.php to add top menu*/
$offerUrl = "/checkout/index.php" . $analyticsObj->queryString;
$platform->setCsrModalButtons("sample,video,letter");
?>
<script>
if (isMobile()) {
	document.location = "<?php echo $productDataObj->mobileLink ?>"; }
</script>
<script src="/js/audio.js"></script>
<script src="/js/jquery.timers-1.2.js" type="text/javascript"></script>
<script src="/js/jcookie.js" type="text/javascript"></script>
<script>
// Change these values for the content within the "buttons" div to appear at this time.
 
		$(document).ready(function(){

				if ($.cookie("sawbutton")) {
					var hours = 0;
					var minutes = 0;
					var seconds = 5;
				} else {
					var hours = 0;
					var minutes = 27;
					var seconds = 51;
				}

				// Start by converting hours to milliseconds
				var time = hours * 60 * 60 * 1000;
				// Add minutes converted to milliseconds and add to total time
				time += minutes * 60 * 1000;
				// Add seconds to total time after converting to milliseconds
				time += seconds * 1000;

				if ($.cookie("sawbutton")) {
					// If return visitor that saw button, show alt button
					$("#reserve").oneTime(time, function() {
							$("#reserve").css("display", "block");
							$("#reserve").oneTime(5000, function() {
									$("#reserve").css("display", "none");
									$("#buyButton").css("display", "block");
									$("#buyButton2").css("display", "block");
									$("#buyButton3").css("display", "block");
									$("#buyButton4").css("display", "block");
							   });

					});
				} else {
					// If visitor hasn't seen button yet, show default button
					$("#reserve").oneTime(time, function() {
							$("#reserve").css("display", "block");
							$("#reserve").oneTime(5000, function() {
									$("#reserve").css("display", "none");
									$("#buyButton").css("display", "block");
									$("#buyButton2").css("display", "block");
									$("#buyButton3").css("display", "block");
									$("#buyButton4").css("display", "block");
							   });
					});
				}
				setTimeout(function(){$.cookie("sawbutton", "1", { expires: 30 });}, 30000);
		});

</script>
<script>
/*
	This is the countdown timer, used for the visual display of the 'clock'.
	It uses a date object where the last three integers are hours, minutes, seconds.
	When the timer reaches zero it clears the timer object and calls a function
	to call the CSR Modal Window.

	This timer requires a block object (div) with an id of 'countDownTimer'.
 */
	var jsTimer = setInterval(function(){timerChange()},1000);
	timerDateObj = new Date(2014, 01, 01, 12, 39, 00);
//	timerDateObj = new Date(2014, 01, 01, 12, 1, 00);
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
<!--INCLUDE CONTENT-->
<?php
	if($variation === "l1") {
		include_once ('content-l1.php'); /*TEST LANDING PAGE 1 3/31/15*/
	}elseif($variation === "l2") {
		include_once ('content-l2.php'); /*TEST LANDING PAGE 2 3/31/15*/
	}elseif($variation === "l3") {
		include_once ('content-l3.php'); /*TEST LANDING PAGE 3 3/31/15*/
	}elseif($variation === "l4") {
		include_once ('content-l4.php'); /*TEST LANDING PAGE 4 3/31/15*/
	} else {
		include_once ('content.php'); /*CONTROL*/
	}
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

	<!-- Offer Conversion: Food4Patriots  -->
	<img src="http://trk.rebootmarketing.com/SL1S" width="1" height="1" />
	<!-- // End Offer Conversion -->
	<!-- Offer Conversion: Food4Patriots - No International -->
	<img src="http://trk.rebootmarketing.com/SL2i" width="1" height="1" />
	<!-- // End Offer Conversion -->

<?php
include_once("template-bottom.php");