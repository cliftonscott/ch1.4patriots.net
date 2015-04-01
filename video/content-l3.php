<style>
	body {
		background-repeat: no-repeat;
		background-position: center center fixed;
		background-attachment: fixed;
		-webkit-background-size: cover;
		-moz-background-size: cover;
		-o-background-size: cover;
		background-size: cover;
		background-color: #000000;
	}
	body {
		background-color: transparent;
	}
	.navbar, .navbar-phone-contain {
		display: none;
	}
	.container-main {
		background: transparent;
	}
</style>

<div class="container-main">
	<div class="container">
		<div class="row">
			<div style="margin: 34px 0;">
			</div>
			<div class="col-md-12">
				<!-- Button Stuff -->
				<div id="buyButton" class="center-block text-center" style="display:none">
					<a href="<?php echo $offerUrl; ?>"><img class="img-responsive center-block" src="/assets/images/buttons/btn-orange-choose-kit-01.jpg" alt="Order Now!"></a>
				</div>
			</div>
			<div class="col-md-12">
				<div id="videobox">
					<iframe src="//fast.wistia.net/embed/iframe/bcrluwywnq" allowtransparency="true" frameborder="0" scrolling="no" class="wistia_embed" name="wistia_embed" allowfullscreen mozallowfullscreen webkitallowfullscreen oallowfullscreen msallowfullscreen width="640" height="360"></iframe><script src="//fast.wistia.net/assets/external/E-v1.js" async></script>
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
	<script>
		function loadBG(){
			document.getElementById("background-img").style.backgroundImage="url(/assets/images/video-lander/img-background-riot.jpg)";
		}
		window.onload=loadBG();
	</script>