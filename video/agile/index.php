<?php

// Define the current page name.
$page = "video";

// Bootstrap this application page.
include_once 'agile/bootstrap.php';

// Load the HTML head of this page.
include_once 'agile/head.php';

?>

<body>

	<div id="LoadingDiv" style="display:none;">One Moment Please...<br />
		<img src="/assets/images/misc/progressbar.gif" class="displayed" alt="" />
	</div>

	<div class="navbar navbar-default">
		<div class="container"><div class="navbar navbar-inverse navbar-static-top">
				<div class="navbar-header">
					<div class="navbar-brand"><img src='/assets/images/logo-small.png' alt='power4patriots' class='img-responsive'/></div>
				</div>
			</div>
		</div>
	</div>
	<div class="navbar-phone-contain">
		<div class="container nopadding">
			<div class="navbar-phone">
				<div id="phone-txt"><span class="glyphicon glyphicon-earphone"></span> Phone: 1-800-728-0008</div>
				<div id="phone-button"><button type="button" class="btn btn-primary"><a href="tel:1-800-728-0008"><span class="glyphicon glyphicon-earphone"></span> Phone: 1-800-728-0008</a></button></div>
			</div>
		</div>
	</div>
	<div class="container subheader"></div>

	<div class="container-main">

		<div class="row pad-20-b">

			<div class="col-md-12">
				<div class="center-block text-center">
					<?php
					if($variation === "quiz") {
						echo "<h1><strong>Your Quiz Results Show THIS Is The #1<br class='hidden-xs'> Item To Hoard... So Why Is FEMA<br class='hidden-xs'> Trying To Buy It All Up?</strong></h1>";
					} else {
						?>
						<?php
						if($_GET["pub"]) {
							echo "<div style='font-size:18pt;'>Special presentation for ". $pubArray[$pub] ." </div>";
						}elseif($variation == "gb") {
							echo "<div style='font-size:18pt;'>Special presentation for fans of Glenn Beck and TheBlaze...</div>";
						}
						?>
						<?php
						if($vsl === "fs") {
							?>
							<h1><strong>Obama’s Food Stamp “Time Bomb”<br> Is About To Explode</strong></h1>
							<?php
						}elseif($vsl === "3f") {
							?>
							<h1><strong>3 Foods NEVER To Eat<br> In A Crisis</strong></h1>
							<?php
						}else {
							?>
							<h1><strong>Why Was This Video Banned?</strong></h1>
							<?php
						}}
					?>
				</div>
			</div>
			<div class="col-md-12">
				<!-- Button Stuff -->
				<div id="buyButton" class="center-block text-center" style="display:none;">
					<a href="<?php echo $offerUrl; ?>"><img class="img-responsive center-block" src="/assets/images/buttons/btn-orange-choose-kit-01.jpg" alt="Order Now!"></a>
				</div>
			</div>

			<div class="col-md-12">
				<div id="videobox">
					<?php
					if($variation === "pu") {
						?>

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
						<!--<iframe src="//fast.wistia.net/embed/playlists/kxu9naj4y2?media_0_0%5BautoPlay%5D=true&media_0_0%5BcontrolsVisibleOnLoad%5D=false&version=v1&videoOptions%5BautoPlay%5D=true&videoOptions%5BfullscreenButton%5D=false&videoOptions%5Bplaybar%5D=false&videoOptions%5BplayerColor%5D=ffffff&videoOptions%5BsmallPlayButton%5D=false&videoOptions%5BvideoHeight%5D=360&videoOptions%5BvideoWidth%5D=640" allowtransparency="true" frameborder="0" scrolling="no" class="wistia_playlist" name="wistia_playlist" allowfullscreen mozallowfullscreen webkitallowfullscreen oallowfullscreen msallowfullscreen width="640" height="360"></iframe>-->
						<?php
					}
					?>
				</div>
			</div>

			<div id="view-vslfooter" class="view"></div>

		</div>

		<div id="view-foodimages" class="view-on-demand"></div>

	</div>

	<div id="view-footer" class="view"></div>

</body>

<?php include_once 'agile/scripts.php'; ?>

<script>

	window.onbeforeunload = grayOut;
	function grayOut(){
		var ldiv = document.getElementById('LoadingDiv');
		ldiv.style.display='block';
	}

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

<?php include_once 'agile/footer.php'; ?>