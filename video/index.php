<?php
/*
 * temporary redirect while sold out

header("Location: /checkout/index.php");
exit;
 */

$template["exitPopType"] = "video"; //designates that this should have an exit pop of type video
// SET PRODUCT ID
$_SESSION['productId'] = 162; //please keep as an integer
$_SESSION['quantity'] = 1;
include_once("Product.php");
//creates a product object that is available from every template
$productDataObj = Product::getProduct($_SESSION["productId"]);
//include template top AFTER the product information is set
include_once ('template-top.php');
include_once ('template-header.php'); /*Add template-header-nav.php to add top menu*/
?>
<script>
if (isMobile()) {
	document.location = "<?php echo $productDataObj->mobileLink ?>"; }
</script>
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
					var minutes = 51; 
					var seconds = 27;
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
<div class="container subheader"></div>
<div class="container-main">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="center-block text-center">
				  <h1><strong>I Couldn't Believe FEMA Tried This!<br>
				  (Then He Showed Me Proof</strong>)</h1></div>
			</div>
			<div class="col-md-12">
				<!-- Button Stuff -->
				<div id="buyButton" class="center-block text-center" style="display:none">
					<a href="<?php echo $productDataObj->offerLink; ?>" onClick="ga('send', 'event', 'free-video', 'food-stockpile-buy', 'click-to-accept');"><img class="img-responsive center-block" src="/assets/images/buttons/btn-orange-choose-kit-01.jpg" alt="Order Now!"></a>
				</div>
			</div>
			<div class="col-md-12">
				<div id="videobox">
				   <script type="text/javascript" src="http://reboot.evsuite.com/player/RjRQLTIuMy1PZmZlci02NDB4MzYwLXNob3J0LTAyLW9wdGltaXplZC5tcDQ=/?container=evp-E4UVAU3GCE"></script><div id="evp-E4UVAU3GCE" data-role="evp-video" data-evp-id="RjRQLTIuMy1PZmZlci02NDB4MzYwLXNob3J0LTAyLW9wdGltaXplZC5tcDQ="></div>
				</div>
			<div class="col-md-12">
				<div id="reserve" style="display:none;">
					<div class="text-center center-block"><img src="/assets/images/misc/loading-01.gif" width="600" height="205" alt=""/> </div>
				</div>
				<!-- Button Stuff -->
				<div id="buyButton2" class="center-block text-center" style="display:none">
					<h2 class="darkRed"><strong>Act fast! Your reservation and discount <br> are guaranteed until...</strong></h2>
				  <div id="countDownTimer"></div>
					<a href="<?php echo $productDataObj->offerLink; ?>" onClick="ga('send', 'event', 'free-video', 'food-stockpile-buy', 'click-to-accept');"><img class="img-responsive center-block" src="/assets/images/buttons/btn-orange-choose-kit-01.jpg" alt="Order Now!"></a>
				</div>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<!-- Start of Advertise Pop Up Code -->
				<?php include("snippets/as-seen-on-tv.html");?>
				<!-- End of Advertise Pop Up Code -->
				<!-- Start References -->
				<?php include("snippets/video-references.html");?>
				<!-- End References -->

			</div>
			<div class="col-md-12">

			</div>
		</div>
	</div>
</div>
<?php
include_once("template-bottom.php");