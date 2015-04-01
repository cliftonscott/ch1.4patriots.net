<style>
body {
	background-color: #FFF;
}
.navbar, .navbar-phone-contain {
	display: none;
}
.container-main {
	background: transparent;
}
.footer {
	color: #848484;
}
#videobox {
	max-width: 744px;
	max-height: 429px;
	background-color: transparent;
	margin-right: auto;
	margin-left: auto;
	overflow: hidden;
	border: 12px solid #E7E7E7;
}
</style>

<div class="container-main">
	<div class="container">
		<div class="row">
			<div class="text-center center-block" style="margin: 34px 0;">
				<h1><strong>Why Was This Video Banned?</strong></h1>
			</div>
			<div class="col-md-12">
				<!-- Button Stuff -->
				<div id="buyButton" class="center-block text-center" style="display:none">
					<a href="<?php echo $offerUrl; ?>"><img class="img-responsive center-block" src="/assets/images/buttons/btn-orange-choose-kit-01.jpg" alt="Order Now!"></a>
				</div>
			</div>
			<div class="col-md-12">
				<div id="videobox">
					<iframe src="//fast.wistia.net/embed/iframe/bcrluwywnq" allowtransparency="true" frameborder="0" scrolling="no" class="wistia_embed" name="wistia_embed" allowfullscreen mozallowfullscreen webkitallowfullscreen oallowfullscreen msallowfullscreen width="720" height="405"></iframe><script src="//fast.wistia.net/assets/external/E-v1.js" async></script>
				</div>
				<div class="col-md-12">
					<!-- Button Stuff -->
					<div id="reserve" style="display:none;"></div>
					<div id="buyButton2" class="center-block text-center" style="display:none">
						<a href="<?php echo $offerUrl; ?>"><img class="img-responsive center-block" src="/assets/images/buttons/btn-orange-choose-kit-01.jpg" alt="Order Now!"></a>
					</div>
				</div>
			</div>
		</div>

	</div>
	<div style="margin: 350px 0"></div>
