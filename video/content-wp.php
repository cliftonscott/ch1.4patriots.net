<style>
	body, .container-main{
		background: #FFF url("/assets/images/misc/paperbg.jpg") repeat !important;
	}
	.navbar, .navbar-default, .navbar-phone-contain {
		display: none !important;
	}
	.footer {
		color: #797979 !important;
	}
	button[type=button]{
		width:100%;
		border:none;
		background-color:#818181;
		color:#ffffff;
		font-family: 'droid-serif', Georgia, Times, 'Times New Roman', serif;
		font-size: 1.25em;
		line-height: 1.3em;
		padding:0.55em 20px 0.5em;
		cursor:pointer;
	}
	button[type=button]:hover{
		background-color:#db4d4d;
		-webkit-tap-highlight-color: rgba(0,0,0,0);
	}
	/* Button 1 */
	.btn-1 {
		background:#FADC57 url("/assets/images/buttons/btn-pattern-choose-kit-01-01.svg") no-repeat right top;
		-webkit-background-size: cover;
		-moz-background-size: cover;
		-o-background-size: cover;
		background-size: cover;
		-webkit-border-radius: 9;
		-moz-border-radius: 9;
		border-radius: 9px;
		-webkit-box-shadow: 0px 3px 8px #666666;
		-moz-box-shadow: 0px 3px 8px #666666;
		box-shadow: 0px 3px 8px #666666;
		font-family: Arial;
		color: #00175C;
		font-size: 55px;
		padding: 20px 40px 20px 40px;
		border: solid #ff0000 3px;
		text-decoration: none;
		width:600px;
		margin:15px 0px 15px 0px;
	}
	.btn-1:hover {
		background: #F69725 url("/assets/images/buttons/btn-pattern-choose-kit-01-02.svg") no-repeat right top;
		-webkit-background-size: cover;
		-moz-background-size: cover;
		-o-background-size: cover;
		background-size: cover;
		-webkit-tap-highlight-color: rgba(0,0,0,0);
		cursor:pointer;
	}

	@media screen and (max-width: 550px) {
		.btn-1 {
			width:450px;
		}
	}
</style>
<div class="container-main">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="center-block text-center">
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
						<h1 class="darkRed margin-tb-20"><strong>Obama’s Food Stamp “Time Bomb”<br> Is About To Explode</strong></h1>
					<?php
					}elseif($vsl === "3f") {
						?>
						<h1 class="darkRed margin-tb-20"><strong>3 Foods NEVER To Eat<br> In A Crisis</strong></h1>
					<?php
					}else {
						?>
						<h1 class="darkRed margin-tb-20"><strong>Why Was This Video Banned?</strong></h1>
					<?php
					}
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
						<iframe src="//fast.wistia.net/embed/iframe/voc8m0rg1a" allowtransparency="true" frameborder="0" scrolling="no" class="wistia_embed" name="wistia_embed" allowfullscreen mozallowfullscreen webkitallowfullscreen oallowfullscreen msallowfullscreen width="640" height="360"></iframe><script src="//fast.wistia.net/assets/external/E-v1.js" async></script>
						<script type="text/javascript">
							window.addEventListener("focus", function(event)
								{ startTimer(); }
								, false);
						</script>
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
		<div class="container margin-tb-20">
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
	</div>