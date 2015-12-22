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
<div class="container subheader" onclick="showProductModal()"></div>
<div class="container-main">
	<div class="container">
		<div class="row">
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
				<div id="buyButton" class="center-block text-center" style="display:none">
					<a href="<?php echo $offerUrl; ?>"><img class="img-responsive center-block" src="/assets/images/buttons/btn-orange-choose-kit-01.jpg" alt="Order Now!"></a>
				</div>
			</div>
			<div class="col-md-12">
				<div id="videobox">
					<?php
					if($variation === "pu") {
						?>
						<iframe src="//fast.wistia.net/embed/iframe/7lkd7964gi" allowtransparency="true" frameborder="0" scrolling="no" class="wistia_embed" name="wistia_embed" allowfullscreen mozallowfullscreen webkitallowfullscreen oallowfullscreen msallowfullscreen width="640" height="360"></iframe>
						<script src="//fast.wistia.net/assets/external/E-v1.js" async></script>
					<?php
					} elseif($vsl === "stansberry") {
					?>
						<iframe src="//fast.wistia.net/embed/iframe/gswb4vuajj?videoFoam=true" allowtransparency="true" frameborder="0" scrolling="no" class="wistia_embed" name="wistia_embed" allowfullscreen mozallowfullscreen webkitallowfullscreen oallowfullscreen msallowfullscreen width="640" height="388"></iframe>
						<script src="//fast.wistia.net/assets/external/E-v1.js"></script>
					<?php
					} elseif($vsl === "fs") {
					?>
						<!-- SPLIT JV-37 11/17/15-->
						<?php if (JV::in("37-infographic")) { ?>
						<iframe src="//fast.wistia.net/embed/iframe/zhacnz5eu2" allowtransparency="true" frameborder="0" scrolling="no" class="wistia_embed" name="wistia_embed" allowfullscreen mozallowfullscreen webkitallowfullscreen oallowfullscreen msallowfullscreen width="640" height="360"></iframe>
						<script src="//fast.wistia.net/assets/external/E-v1.js" async></script>
						<?php }else { ?>
						<iframe src="//fast.wistia.net/embed/iframe/0lf2bumkj0" allowtransparency="true" frameborder="0" scrolling="no" class="wistia_embed" name="wistia_embed" allowfullscreen mozallowfullscreen webkitallowfullscreen oallowfullscreen msallowfullscreen width="640" height="360"></iframe>
						<script src="//fast.wistia.net/assets/external/E-v1.js" async></script>
						<?php } ?>
					<?php
					}elseif($vsl === "3f") {
					?>
						<iframe src="//fast.wistia.net/embed/iframe/vnqcpflkl1" allowtransparency="true" frameborder="0" scrolling="no" class="wistia_embed" name="wistia_embed" allowfullscreen mozallowfullscreen webkitallowfullscreen oallowfullscreen msallowfullscreen width="640" height="360"></iframe>
						<script src="//fast.wistia.net/assets/external/E-v1.js" async></script>
					<?php
					}else {
					?>
						<iframe src="//fast.wistia.net/embed/iframe/voc8m0rg1a" allowtransparency="true" frameborder="0" scrolling="no" class="wistia_embed" name="wistia_embed" allowfullscreen mozallowfullscreen webkitallowfullscreen oallowfullscreen msallowfullscreen width="640" height="360"></iframe>
						<script src="//fast.wistia.net/assets/external/E-v1.js" async></script>
					<?php
					}
					?>
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