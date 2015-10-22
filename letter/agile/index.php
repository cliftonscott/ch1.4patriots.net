<?php

/*
|--------------------------------------------------------------------------
| Bootstrap
|--------------------------------------------------------------------------
|
| Bootstrap this application page.
|
*/
include_once("Analytics.php");
$analyticsObj = new Analytics();
//include_once("Platform.php");
//$platform = new Platform();
//require_once("Meta.php");
//$metaDataObj = new Meta();
//require_once("Customer.php");
//$customerObj = new Customer();
//require_once("MobileDetect.php");
//$detect = new Mobile_Detect;
//require_once("JavelinApi.php");
//$javelinApi = JV::load();

include_once 'AssetManager.php';
$assets = new AssetManager("video", true);



?>
<!doctype html>
<html lang="">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="apple-touch-icon" href="apple-touch-icon.png">

	<!-- Place favicon.ico in the root directory -->


	<!-- Latest compiled and minified CSS. -->
	<?php $assets->css(); ?>

</head>
<body>

<div id="view-header" class="view" style="height: 219px;"></div>

<div class="container-main">
	<div class="container">

		<div class="row">

			<div id="view-vslheader" class="view"></div>

			<div class="col-md-12">
				<div id="videobox">
					<?php
					if($variation === "pu") {
						?>
						<iframe src="//fast.wistia.net/embed/iframe/voc8m0rg1a" allowtransparency="true" frameborder="0" scrolling="no" class="wistia_embed" name="wistia_embed" allowfullscreen mozallowfullscreen webkitallowfullscreen oallowfullscreen msallowfullscreen width="640" height="360"></iframe><script src="//fast.wistia.net/assets/external/E-v1.js" async></script>
					<?php
					} elseif($vsl === "stansberry") {
					?>
						<iframe src="//fast.wistia.net/embed/iframe/gswb4vuajj?videoFoam=true" allowtransparency="true" frameborder="0" scrolling="no" class="wistia_embed" name="wistia_embed" allowfullscreen mozallowfullscreen webkitallowfullscreen oallowfullscreen msallowfullscreen width="640" height="388"></iframe><script src="//fast.wistia.net/assets/external/E-v1.js"></script>
					<?php
					} elseif($vsl === "fs") {
					?>
						<iframe src="//fast.wistia.net/embed/iframe/0lf2bumkj0" allowtransparency="true" frameborder="0" scrolling="no" class="wistia_embed" name="wistia_embed" allowfullscreen mozallowfullscreen webkitallowfullscreen oallowfullscreen msallowfullscreen width="640" height="360"></iframe><script src="//fast.wistia.net/assets/external/E-v1.js" async></script>
					<?php
					}elseif($vsl === "3f") {
					?>
						<iframe src="//fast.wistia.net/embed/iframe/vnqcpflkl1" allowtransparency="true" frameborder="0" scrolling="no" class="wistia_embed" name="wistia_embed" allowfullscreen mozallowfullscreen webkitallowfullscreen oallowfullscreen msallowfullscreen width="640" height="360"></iframe><script src="//fast.wistia.net/assets/external/E-v1.js" async></script>
					<?php
					}else {
					?>
						<iframe src="//fast.wistia.net/embed/iframe/voc8m0rg1a" allowtransparency="true" frameborder="0" scrolling="no" class="wistia_embed" name="wistia_embed" allowfullscreen mozallowfullscreen webkitallowfullscreen oallowfullscreen msallowfullscreen width="640" height="360"></iframe><script src="//fast.wistia.net/assets/external/E-v1.js" async></script>
						<?php
					}
					?>
				</div>
			</div>

			<div id="view-vslfooter" class="view"></div>

		</div>

	</div>

	<div id="view-foodimages" class="view-on-demand"></div>

</div>

<div id="view-footer" class="view"></div>

</body>

<!-- Latest compiled and minified JavaScript -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

<!-- Load the application JS. -->
<?php $assets->js(); ?>

<script>
	window.onload = function() {

		var viewService = new ViewService();
		viewService.done(function() {

			/*
			 |--------------------------------------------------------------------------
			 | Countdown Timer
			 |--------------------------------------------------------------------------
			 |
			 | This is the countdown timer, used for the visual display of the 'clock'.
			 | It uses a date object where the last three integers are hours, minutes, seconds.
			 | When the timer reaches zero it clears the timer object and calls a function
			 | to call the CSR Modal Window.
			 |
			 | This timer requires a block object (div) with an id of 'countDownTimer'.
			 |
			 */
			var jsTimer = setInterval(function(){timerChange()},1000);

			timerDateObj = new Date(2014, 01, 01, 12, 48, 00);

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

			/*
			 |--------------------------------------------------------------------------
			 | CTA Reveal
			 |--------------------------------------------------------------------------
			 |
			 |
			 |
			 */
			if ($.cookie("sawbutton")) {
				var hours = 0;
				var minutes = 0;
				var seconds = 2;
			} else {
				var hours = 0;
				var minutes = 0;
				var seconds = 2;
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

			/*
			 |--------------------------------------------------------------------------
			 | Product Modal And Carousel
			 |--------------------------------------------------------------------------
			 |
			 |
			 |
			 */
			function showProductModal() {
				$('#productModal').modal('show');
			}
			function hideProductModal() {
				$('#productModal').modal('hide');
			}
			$('.subheader').click(function(){
				viewService.load($('#view-foodimages'), function() {
					showProductModal();
				});
			});
			$(document).ready(function() {
				$('#mcarousel-example-generic').carousel({
					interval: 5000
				})
			});

		});

	};
</script>

</html>