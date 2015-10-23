<?php
/*
|--------------------------------------------------------------------------
| VSL Configuration
|--------------------------------------------------------------------------
|
| This main checkout page is configured before bootstrapping
| the application.
|
*/
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
	"wp", // White Paper Template
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

// SET PRODUCT ID
$_SESSION['productId'] = 162; //please keep as an integer
$_SESSION['quantity'] = 1;
include_once("Product.php");
//creates a product object that is available from every template
$productDataObj = Product::getProduct($_SESSION["productId"]);

// Define the current page name.
$page = "video";

// Bootstrap this application page.
include_once 'agile/bootstrap.php';

// Finish configuring VSL.
$offerUrl = "/checkout/agile/index.php" . $analyticsObj->queryString;
$platform->setCsrModalButtons("sample,video,letter");

// Send all mobile traffic to the Letter page immediately.
if($vsl != "3f" && $vsl != "fs") {
	if ($detect->isMobile() && !$detect->isTablet()) {
		header("Location: /letter/agile/index.php" . $analyticsObj->queryString); exit;
	}
}

// Load the HTML head of this page.
include_once 'agile/head.php';
?>

<body>
	<?php include_once("ga-data-layer.php"); ?>
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
				<div id="phone-txt"><img class="icon-phone" src="/assets/images/misc/phone.svg" /> Phone: 1-800-728-0008</div>
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

			<div class="col-md-12">
				<div id="reserve" style="display:none;">
					<div class="text-center center-block"><img src="/assets/images/misc/loading-01.gif" width="600" height="205" alt=""/> </div>
				</div>
				<!-- Button Stuff -->
				<div id="buyButton2" class="center-block text-center" style="display:none">
					<h2 class="darkRed" style="margin-top: 5px; margin-bottom:0px;"><strong>Act fast! Your reservation and discount <br> are guaranteed until...</strong></h2>
					<div id="countDownTimer"></div>
					<a href="<?php echo $offerUrl; ?>"><img class="img-responsive center-block" src="/assets/images/buttons/btn-orange-choose-kit-01.jpg" alt="Order Now!"></a>
				</div>
			</div>
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<!-- Start of Advertise Pop Up Code -->
						<?php
						if($variation !== "no-logo" && $variation !== "np-nologo") {
							include("snippets/as-seen-on-tv.html");
						}
						?>
						<!-- End of Advertise Pop Up Code -->
						<!-- Start References -->
						<?php include("snippets/video-references.html");?>
						<!-- End References -->
					</div>
				</div>
			</div>
			<?php if($variation == "b") { ?>
				<!--Testimonials-->
				<div style="margin: 0 auto 0 auto;"></div>
				<div id="testimonials-checkout" class="center-block" style="max-width:95%;">
					<div class="section-header">
						<div class="section-header-bg">
							<h4><i class="fa fa-comments"></i>  What People Are Saying About Food4Patriots</h4>
						</div>
					</div>
					<div class="row" style="padding-bottom: 0;background-color: #f7f7f7;">
						<div class="col-xs-12 col-sm-7">
							<div style="text-align: center;font-size: 31px;">
								"Patriot Pantry meals: they make the cut because they are delicious, nutritious and good for 25 years."<br>- Glenn Beck <audio id="beckCheckoutAudioSrc" src="/media/audio/f4p-beck-testimonial-01.mp3" preload="auto"></audio><img id="beckCheckoutAudioControl" class="audioControl" src="/assets/images/misc/speaker_off.gif" onclick="toggleAudio('beckCheckout');">
								<div class="video-ref-test" style="padding-bottom: 0;">Glenn Beck (host of The Glenn Beck Show on radio, TV, and frequent guest on FoxNews), recommends Patriot Pantry, the survival food in Food4patriots Kits</div>
							</div>
						</div>
						<div class="col-xs-12 col-sm-5"><img src="/media/images/f4p/f4p-glenn-beck-01.jpg" class="img-responsive"></div>
					</div>
					<div class="row">
						<div class="col-xs-12 col-sm-3"><img src="/media/images/misc/img-testimonial-diana.jpg" class="img-responsive center-block"></div>
						<div class="col-xs-12 col-sm-9"><i>&quot;I am a new customer and heard about your company from my brother. Praises to your customer service heroes! Their patience, kindness and care with my calls were like talking with my best friend. Thank you!&quot;</i><strong> - Diana L.</strong> </div>
					</div>
					<div class="row" style="background-color: #f7f7f7;">
						<div class="col-xs-12 col-sm-3"><img src="/media/images/misc/img-testimonial-rolf.jpg" class="img-responsive center-block"></div>
						<div class="col-xs-12 col-sm-9"><i>&quot;Hello Frank – this is Rolf K. and I am one of your very happy customers. The most important thing is your food tastes great. I’ve tasted 2 out of the 4 entrées in one of the small packages and I now have a tub and three other small packages set away…and am feeling pretty good about it. Keep up the good work!&quot;</i><strong> - Rolf K.</strong></div>
					</div>
					<div class="row">
						<div class="col-xs-12 col-sm-3"><img src="/media/images/misc/img-testimonial-lynn.jpg" class="img-responsive center-block"></div>
						<div class="col-xs-12 col-sm-9"><i>&quot;My purchase of Food4Patriots has indeed brought me peace of mind…I particularly loved the choices in the different price and size ranges for the Food4Patriots product. The fact that it has a shelf life of 25 years, if it is properly stored, is an added plus! I intend to make a second purchase in the near future, as my budget allows because it just makes sense.&quot;</i><strong> - Lynn G.</strong></div>
					</div>
					<div class="row" style="background-color: #f7f7f7;">
						<div class="col-xs-12 col-sm-3"><img src="/media/images/misc/img-testimonial-jeff.jpg" class="img-responsive center-block"></div>
						<div class="col-xs-12 col-sm-9"><i>&quot;All our orders were received in perfect condition and in containers that make storage and inventory easy to access when needed. Very organized with labeling, highly recommend ordering your product for friends and family and anyone who wants to look ahead and be prepared for the unexpected. Thanks!&quot;</i><strong> - Jeff W.</strong></div>
					</div>
					<div id="buyButton3" style="display:none">
						<div class="text-center"><a href="<?php echo $offerUrl; ?>"><img class="img-responsive center-block" src="/assets/images/buttons/btn-orange-choose-kit-01.jpg" alt="Order Now!"></a></div>
					</div>
				</div>
				<!--FAQ-->
				<hr>
				<div style="margin: 30px auto 0 auto;max-width:95%;">
					<h4 class="darkRed">Frequently Asked Questions:</h4>
					<?php include_once ('snippets/faq-accordian-1wk.html'); ?>
				</div>
				<!--Guarantee-->
				<hr>
				<?php include_once ('snippets/f4p-guarantees-checkout.html'); ?>
				<hr>
				<div id="buyButton4" style="display:none">
					<div class="text-center"><a href="<?php echo $offerUrl; ?>"><img class="img-responsive center-block" src="/assets/images/buttons/btn-orange-choose-kit-01.jpg" alt="Order Now!"></a></div>
					<hr>
				</div>
				<div class="video-ref-test"><p>LEGAL DISCLAIMER: Although not guaranteed, every effort has been made to accurately represent our products and their potential. In accordance with the latest FTC guidelines, we want to make it explicitly clear that the testimonials and customer letters we have received are exceptional results, don't apply to the average purchaser and are not intended to represent or guarantee that anyone will achieve the same or similar results. The generally expected performance of our products in regards to any specific application has not been scientifically validated and we cannot and will not make any promises in regards to your specific results. Furthermore, all testimonials are real testimonials from real customers though the images have been modified to protect their privacy.</p></div>
			<?php } ?>




		</div>

		<div id="view-foodimages" class="view-on-demand"></div>

	</div>

	<div id="view-footer" class="view-unveil view-unveil-100"></div>

</body>

<?php include_once 'agile/scripts.php'; ?>

<script>

	window.onbeforeunload = grayOut;
	function grayOut(){
		var ldiv = document.getElementById('LoadingDiv');
		ldiv.style.display='block';
	}

	window.onload = function() {

		var viewService = new ViewService(function() {

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
					$('.glyphicon-remove-circle').click(hideProductModal);
				});
			});
			$(document).ready(function() {
				$('#mcarousel-example-generic').carousel({
					interval: 5000
				})
			});

			/*
			 |--------------------------------------------------------------------------
			 | Exit Pop
			 |--------------------------------------------------------------------------
			 |
			 |
			 |
			 */
			(function() {
				setTimeout(function() {
					var __redirect_to = '<?php echo "/letter/agile/index.php" . $analyticsObj->queryString; ?>';//

					var _tags = ['button', 'input', 'a'], _els, _i, _i2;
					for(_i in _tags) {
						_els = document.getElementsByTagName(_tags[_i]);
						for(_i2 in _els) {
							if((_tags[_i] == 'input' && _els[_i2].type != 'button' && _els[_i2].type != 'submit' && _els[_i2].type != 'image') || _els[_i2].target == '_blank') continue;
							_els[_i2].onclick = function() {window.onbeforeunload = function(){};}
						}
					}
					setTimeout(function() {
						window.onbeforeunload = function() {
							setTimeout(function() {
								window.onbeforeunload = function() {};
								setTimeout(function() {
									document.location.href = __redirect_to;
								}, 500);
							},5);
							return 'W A I T!!! \n\n******************************************************* \nHate Videos? CLICK THE ***STAY ON PAGE*** BUTTON in the NEXT Window to READ THE "WRITTEN REPORT"*\n\n*******************************************************';
						}
					}, 500);
				}, 5000);
			})();

		});

	};
</script>

<?php include_once 'agile/footer.php'; ?>