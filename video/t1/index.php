<?php

if (!isset($_SERVER['HTTPS']) || !$_SERVER['HTTPS']) {
	$url = 'https://' . $_SERVER['HTTP_HOST']
		. $_SERVER['REQUEST_URI'];
	header('Location: ' . $url);
	exit;
}

$variantsArray = array (
	"gb", // Glenn Beck
	"no-logo", // No logos/badges shown at the bottom
	"b", // Testimonials - FAQ - Guarantee
);
if($_GET["v"]) {
	if(in_array(trim($_GET["v"]),$variantsArray)) {
		$variation = trim($_GET["v"]);
	}
}

$template["exitPopType"] = null; //designates that this should have an exit pop of type video

// SET PRODUCT ID
$_SESSION['productId'] = 162; //please keep as an integer
$_SESSION['quantity'] = 1;
include_once("Product.php");
//creates a product object that is available from every template
$productDataObj = Product::getProduct($_SESSION["productId"]);
//include template top AFTER the product information is set
include_once ('template-top.php');
include_once ('template-header.php'); /*Add template-header-nav.php to add top menu*/
$offerUrl = "https://secure.food4patriots.com/checkout/t1/index.php" . $analyticsObj->queryString;
$platform->setCsrModalButtons("sample,video,letter");
?>
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
					$("#buyButton").oneTime(time, function() {
						$("#buyButton").css("display", "block");
					});
				} else {
					// If visitor hasn't seen button yet, show default button
					$("#buyButton").oneTime(time, function() {
						$("#buyButton").css("display", "block");
					});
				}
				setTimeout(function(){$.cookie("sawbutton", "1", { expires: 30 });}, 30000);
		});

</script>

<div class="container subheader-text hidden-xs" onclick="showProductModal()">
	<div>
		<div class="clearfix">
			<div class="row">
				<div class="col-sm-7 nopadding hidden-sm"><img src="/media/images/f4p/f4p-video-header-food-01.jpg" class="img-responsive pull-right"></div>
				<div class="col-sm-7 nopadding visible-sm"><img src="/media/images/f4p/f4p-video-header-food-02.jpg" class="img-responsive center-block"></div>
				<div class="col-sm-5 nopadding">
					<div id="food-benefits" class="hidden-xs">
						<ul>
							<li><strong>Protects</strong> You & Your Family In A Crisis</li>
							<li><strong>25-Year</strong> Shelf Life, "Disaster-Proof" Packaging</li>
							<li>Tastes <strong>Great</strong>, Nutritious & Easy To Prepare</li>
							<li><strong>Covert</strong> Stackable Storage Bins</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="container subheader-text-bottom"></div>
<div class="container-main">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="center-block text-center">
					<?php
					if($variation == "gb") {
						echo "<div style='font-size:18pt;'>Special presentation for fans of Glenn Beck and TheBlaze...</div>";
					}
					?>
					<h1><strong>I Couldn't Believe FEMA Tried This!<br class="hidden-xs">
					(Then He Showed Me Proof</strong>)</h1></div>
			</div>
			<div class="col-md-12">
				<div id="videobox">
					<script type="text/javascript" src="https://reboot.evsuite.com/player/RjRQLTIuMy1PZmZlci02NDB4MzYwLXNob3J0LTAyLW9wdGltaXplZC02NyBWRVJTSU9OIENPTVBSRVNTRUQubXA0/?responsive=1&autoResponsive=1&container=evp-P0TZK4GVTE"></script><div id="evp-P0TZK4GVTE" data-role="evp-video" data-evp-id="RjRQLTIuMy1PZmZlci02NDB4MzYwLXNob3J0LTAyLW9wdGltaXplZC02NyBWRVJTSU9OIENPTVBSRVNTRUQubXA0"></div>
				</div>
			<div class="col-md-12">
				<!-- Button Stuff -->
				<div id="buyButton" class="center-block text-center" style="display:none">
					<a href="<?php echo $offerUrl; ?>"><img class="img-responsive center-block" src="/assets/images/buttons/btn-orange-choose-kit-01.jpg" alt="Order Now!"></a>
				</div>
			</div>
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
		<?php
		if($variation == "b") { ?>
		<!--Testimonials-->
		<div style="margin: 90px auto 0 auto;"></div>
		<div id="testimonials-checkout" class="center-block" style="max-width:95%;">
				<div class="section-header"><h4>What People Are Saying About Food4Patriots</h4></div>
				<div class="row" style="padding-bottom: 0;">
					<div class="col-sm-12 col-sm-7">
						<div style="text-align: center;font-size: 31px;padding-top: 30px;">"Patriot Pantry meals: they make the cut because they are delicious, nutritious and good for 25 years."<br>-- Glenn Beck <audio id="beckCheckoutAudioSrc" src="/media/audio/f4p-beck-testimonial-01.mp3" preload="auto"></audio><img id="beckCheckoutAudioControl" class="audioControl" src="/assets/images/misc/speaker_off.gif" onclick="toggleAudio('beckCheckout');"></div>
					</div>
					<div class="col-sm-12 col-sm-5"><img src="/media/images/f4p/f4p-glenn-beck-01.jpg" class="img-responsive"></div>
				</div>
				<div class="row">
					<div class="col-sm-12 col-sm-3"></div>
					<div class="col-sm-12 col-sm-9"><strong>Diana L.</strong> - “I am a new customer and heard about your company from my brother. Praises to your customer service heroes! Their patience, kindness and care with my calls were like talking with my best friend. Thank you!”</div>
				</div>
				<div class="row">
					<div class="col-sm-12 col-sm-3"></div>
					<div class="col-sm-12 col-sm-9"><strong>Paul B.</strong> - “Just received my 3 month supply. Everything looks great and the storage boxes are easy to store and handle. Hope I don’t have to use this soon but it’s nice to know I have it if I need it. Thank you very much and I would recommend this to anyone looking for long-term food storage.”</div>
				</div>
				<div class="row">
					<div class="col-sm-12 col-sm-3"></div>
					<div class="col-sm-12 col-sm-9"><strong>Rolf K.</strong> - “Hello Frank – this is Rolf K. and I am one of your very happy customers. The most important thing is your food tastes great. I’ve tasted 2 out of the 4 entrées in one of the small packages and I now have a tub and three other small packages set away…and am feeling pretty good about it. Keep up the good work! ”</div>
				</div>
				<div class="row">
					<div class="col-sm-12 col-sm-3"></div>
					<div class="col-sm-12 col-sm-9"><strong>Lynn G.</strong> - “My purchase of Food4Patriots has indeed brought me peace of mind…I particularly loved the choices in the different price and size ranges for the Food4Patriots product. The fact that it has a shelf life of 25 years, if it is properly stored, is an added plus! I intend to make a second purchase in the near future, as my budget allows because it just makes sense.”</div>
				</div>
				<div class="row">
					<div class="col-sm-12 col-sm-3"></div>
					<div class="col-sm-12 col-sm-9"><strong>Jeff W.</strong> - “All our orders were received in perfect condition and in containers that make storage and inventory easy to access when needed. Very organized with labeling, highly recommend ordering your product for friends and family and anyone who wants to look ahead and be prepared for the unexpected. Thanks!”</div>
				</div>
				<div class="row">
					<div class="col-sm-12 col-sm-3"></div>
					<div class="col-sm-12 col-sm-9"><strong>Bob R.</strong> - “They were just fantastic, the customer service. That gal in there is just great. That’s why I got another year for each one of us, got three more years. I said, ‘Okay, well, if they’re going to stand behind their product and its good and everything, I’m going to buy it’…They're just fantastic. It’s a great product.”</div>
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
		<?php } ?>
	</div>
<!-- Header Food Images -->
<div id="productModal" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-sm" style="width: 417px;">
		<div class="modal-content">
			<div class="glyphicon glyphicon-remove-circle" style="float:right;cursor:pointer;padding:10px;z-index:1001;" onclick="hideProductModal();"></div>
			<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
				<!-- Wrapper for slides -->
				<div class="carousel-inner">
					<div class="item active">
					<img src="/media/images/f4p/food/f4p-header-almond-coconut-granola.jpg" alt="Patriot Power Generator">
					<div class="carousel-caption"></div>
				</div>
				<div class="item">
					<img src="/media/images/f4p/food/f4p-header-white-cheddar-shells.jpg" alt="Patriot Power Deluxe">
					<div class="carousel-caption"></div>
				</div>
				<div class="item">
					<img src="/media/images/f4p/food/f4p-header-cheesy-chicken-rice-casserole.jpg" alt="Patriot Power Accesories">
					<div class="carousel-caption"></div>
				</div>
				<div class="item">
					<img src="/media/images/f4p/food/f4p-header-chili-and-dumplings.jpg" alt="Patriot Power Accesories">
					<div class="carousel-caption"></div>
				</div>
				</div>
				<!-- Controls -->
				<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
				<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
			</div>
		</div>
	</div>
</div>
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