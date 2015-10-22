<?php

// Define the current page name.
$page = "letter";

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

	<header id="head" class="clearfix has-absolute-img">
		<div class="absolute-flag">
			<img src="/media/images/f4p/letter/f4p-letter-head-flag.png" width="1639" height="587" >
		</div>

		<div class="head-mid">
			<div class="mobile"></div>
			<div class="holder">
				<div class="mobile-wrap">
					<span class="color-black">Breaking News: </span>
					<h1><span class="semi-bold">FEMA Hates This (#1 Item To Hoard)</span></h1>
				</div>
			</div>
		</div>

		<div class="head-bot">
			<div class="holder">
				<div class="intro-content">
					<div class="inner">
						<strong>Dear Fellow Patriot,</strong><br/><br/>
						<p><i>We all know a crisis is coming. What's going to happen when disaster strikes? Are you prepared to feed your family?</i></p>
						<p><i>I don't know about you, but I'm sure not counting on the government to help me. In fact, they may be behind disappearing food stockpiles all over the country...</i></p>
						<span class="semi-bold"><strong><i>...and I've got the proof.</i></strong></span>
					</div>
				</div>
			</div>
		</div>

		<div class="absolute-holder">
			<div class="absolute-img"></div>
		</div>

		<div class="head-logos">
			<div class="holder">
				<img src="/media/images/misc/as-seen-advertised-on-01-grayscale.jpg" width="678" height="99" class="img-responsive center-block">
			</div>
		</div>
	</header>

	<?php $offerUrl = "https://secure.food4patriots.com/checkout/index.php" . $analyticsObj->queryString; ?>

	<div id="view-section-1" class="view-unveil view-give-2000"></div>
	<div id="view-section-2" class="view-unveil view-give-2000"></div>
	<div id="view-section-3" class="view-unveil view-give-2000"></div>

</body>

<?php include_once 'agile/scripts.php'; ?>

<script>

	window.onbeforeunload = grayOut;
	function grayOut(){
		var ldiv = document.getElementById('LoadingDiv');
		ldiv.style.display='block';
	}

	window.onload = function() {

		var pageBehavior = function() {
			$(".lazy").unveil(1500, function() {
				$(this).load(function() {
					this.style.opacity = 1;
				});
			});
		};

		var viewService = new ViewService(pageBehavior);

	};

</script>

<?php include_once 'agile/footer.php'; ?>