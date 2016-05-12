<script>
	/*
	 This is the countdown timer, used for the visual display of the 'clock'.
	 It uses a date object where the last three integers are hours, minutes, seconds.
	 When the timer reaches zero it clears the timer object and calls a function
	 to call the CSR Modal Window.

	 This timer requires a block object (div) with an id of 'countDownTimer'.
	 */
	var jsTimer = setInterval(function(){timerChange()},1000);

	timerDateObj = new Date(2014, 01, 01, 12, 50, 00);51;

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
<script>
	// Change these values for the content within the "buttons" div to appear at this time.

	$(document).ready(function(){

		if ($.cookie("sawbutton")) {
			var hours = 0;
			var minutes = 0;
			var seconds = 5;
		} else {
			var hours = 0;
			var minutes = 33;
			var seconds = 42;
		}
		<?php
		//Conditionally changes the timer values
		if($_GET["poptimers"] == "false") {
			echo "var hours = 0;\n";
			echo "var minutes = 0;\n";
			echo "var seconds = 0;\n";
		}
		?>
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
					$(".content").css("display", "block");
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
					$(".content").css("display", "block");
				});
			});
		}
		setTimeout(function(){$.cookie("sawbutton", "1", { expires: 30 });}, 30000);
	});
</script>
<div class="container subheader" onclick="showProductModal()"></div>
<div class="container-main">
	<div class="container">
		<div class="row hoverride">
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
					<a href="<?php echo $offerUrl; ?>"><button type="button-1" class="btn-1">Choose My Kit</button></a>
					<p style="color:#002287;">(This Takes You To The Product Options Page)</p>
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
					} elseif($vsl === "fs") {
					?>
						<iframe src="//fast.wistia.net/embed/iframe/0lf2bumkj0" allowtransparency="true" frameborder="0" scrolling="no" class="wistia_embed" name="wistia_embed" allowfullscreen mozallowfullscreen webkitallowfullscreen oallowfullscreen msallowfullscreen width="640" height="360"></iframe>
						<script src="//fast.wistia.net/assets/external/E-v1.js" async></script>
					<?php
					}elseif($vsl === "3f") {
					?>
						<iframe src="//fast.wistia.net/embed/iframe/vnqcpflkl1" allowtransparency="true" frameborder="0" scrolling="no" class="wistia_embed" name="wistia_embed" allowfullscreen mozallowfullscreen webkitallowfullscreen oallowfullscreen msallowfullscreen width="640" height="360"></iframe>
						<script src="//fast.wistia.net/assets/external/E-v1.js" async></script>
					<?php
					}else {
					?>
						<iframe src="//fast.wistia.net/embed/iframe/0iq8lvxtsh" allowtransparency="true" frameborder="0" scrolling="no" class="wistia_embed" name="wistia_embed" allowfullscreen mozallowfullscreen webkitallowfullscreen oallowfullscreen msallowfullscreen width="640" height="360"></iframe>
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
						<a href="<?php echo $offerUrl; ?>"><button type="button-1" class="btn-1">Choose My Kit</button></a>
						<p style="color:#002287;">(This Takes You To The Product Options Page)</p>
					</div>
				</div>
			</div>
		</div>
		
		<div class="content" style="display: none;">
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
			<style>
					p{
						font-size: 15pt !important;
					}
					blockquote{
						margin: 5px;
					}
					h1{
						font-size: 36px;
						font-family: Tahoma,Verdana,Arial,Helvetica,sans-serif;
						margin-top: 20px;
						margin-bottom: 25px;
						font-weight: 700;
						line-height: 1.1;
					}

					h2 {
						font-size: 30px;
						font-family: Tahoma,Verdana,Arial,Helvetica,sans-serif;
						margin-top: 20px;
						margin-bottom: 25px;
						font-weight: 700;
						line-height: 1.1;
						color: inherit;
					}
					img{
						margin-bottom: 10px;
					}

					/* =============================================================================
				   Lists
				   ========================================================================== */
					ul {
						list-style-image:none;
					}

					ul li{
						margin: 0 25px;
						font-size: 16px;
					}

					.fa-check {
						color: #34C901;
					}
				</style>
			<!--4.0 LETTER GOES HERE-->
			<?php include("../letter/food/content.php"); ?>
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
					<div id="video-references">
						<div>Research References</div>
						<p style="font-size: 12px !important;">
							1. <em>Fox News.</em> &ldquo;Americans May Soon Be Able to Get Food Stamps By Phone.&rdquo; 2015.<br>
							2. <em>Fox News</em>. &ldquo;Most states waiving work requirements for food stamps, despite improving job market.&rdquo; 2015.<br>
							3. <em>Wall Street Journal</em>. Vilsack, T. &ldquo;A Half-Baked GOP Plan for Food Stamps.&rdquo; 2015.<br>
							4. <em>Wall Street Journal</em>. Bovard, B. &ldquo;How the Feds Distort Their 'Food Insecurity' Numbers.&rdquo; 2014.<br>
							5. <em>BreitBart</em>. Hall, W.  &ldquo;14 Million More on Food Stamps Under Obama.&rdquo; 2014.<br>
							6. <em>Fox News</em>. Lott, J. &ldquo;Baltimore riots and the price of protest.&rdquo; 2015.<br>
							7. <em>Fox News.</em> &ldquo;FEMA can't account for up to $4.56M Sandy fuel funds.&rdquo; 2015.<br>
							8. <em>Fox News</em>. Chiaramonte, P. &ldquo;Black Lives' leader defends looting in Yale lecture.&rdquo; 2015.<br>
							9. <em>Wall Street Journal</em>. Riley, J. &ldquo;The Lawbreakers of Baltimore—and Ferguson.&rdquo; 2015.<br>
							10. <em>Wall Street Journal</em>. McWhirter, C. &ldquo;Protesters Turn Out in U.S. Cities Following Ferguson Decision.&rdquo; 2015.<br>
							11. <em>Natural News</em>. Heyes, J.D. &ldquo;Why did Obama nationalize the U.S. food supply with executive order 13603?.&rdquo; 2015.<br>
							12. <em>Fox News</em>. &ldquo; FEMA asking disabled, elderly residents to repay aid from superstorm Sandy.&rdquo; 2015.<br>
							13. <em>Before It&rsquo;s News</em>. &ldquo;Disaster Looms: FEMA Scrambles to Stockpile Food Reserves.&rdquo; 2015.<br>
							14. CBS News. Reid, C. &ldquo;In the Dark of Power Grid Security.&rdquo; 2015.<br>
							15. <em>AARP</em>. Green, C. &ldquo;A Conversation With Ted Koppel The former 'Nightline' anchor talks about cyberterrorism and lessons learned over his long career.&rdquo; 2015.<br>
							16. <em>The Telegraph</em>. Lean, G. &ldquo;There's a food crisis coming. Are we ready?.&rdquo; 2015.<br>
							17. <em>Fox News</em>. &ldquo;New Reports of looting in Baltimore as national guard join police in patrolling streets.&rdquo; 2015.<br>
							18. <em>Washington Examiner.</em> Bedard, P. &ldquo;New Isis threat: America&rsquo;s electric grid; blackout could kill 9 of 10&rdquo;. 2014.
						</p>

					</div>
					<!-- End References -->
				</div>
			</div>
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