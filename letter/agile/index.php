<?php

// Define the current page name.
$page = "letter";

// Bootstrap this application page.
include_once 'agile/bootstrap.php';

// Configure the Letter page.
$offerUrl = "/checkout/agile/index.php" . $analyticsObj->queryString;

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

	<!-- start of section 1 -->
	<section class="section dots-top">
		<div class="section-inner">
			<span class="head-dots"></span>
			<!-- start of block white -->
			<div class="white-bg">
				<div class="section1-header">
					<h2 class="dark-red">&quot;A Letter From The Feds That Chilled Me To The Bone...&quot;</h2>
					<p class="section-description">Not too long ago, FEMA went directly to my supplier and tried to buy up my entire stockpile of high-quality survival food. It sounds crazy, but I'll show you the exact letter they sent in a minute.</p>
					<p></p>
					<p>Revealing FEMA's plot could land me in hot water, but I think  <strong>you deserve to know exactly what they're doing.</strong></p>
					<p>Sounds fair, right?</p>
					<p>I'm about to show you undeniable proof that FEMA is on the hunt for as much survival food as they can grab in 24 hours.</p>
				</div>
				<div class="padding-all pad-bottom">
					<img data-src="/media/images/f4p/letter/f4p-letter-fema.jpg" src="/media/images/f4p/letter/blank.gif" width="320" height="241" class="media lazy has-bg right">
					<p><strong>&quot;I've got to tell you - it's really disturbing.&quot; </strong></p>
					<p>You can imagine that FEMA was willing to pay a pretty penny; the kind of money small businesses dream about in an economy like this. Money that would probably come with a nice, fat government contract.</p>
					<p><strong>The fact is - they must know something we don't.</strong></p>
					<p>My first thought was that they must be trying to control the supply. Control the food supply and you control the people. I mean, it worked for Stalin and Mao, right? Why not Obama?</p>
					<p><i>But then I dug deeper and I think the situation is even worse. </i></p>
					<div class="clear"></div>
				</div>
			</div>
			<div class="clear"></div>

			<div id="view-section-1" class="view view-give-2000"></div>

		</div>
	</section>

	<div id="view-section-2" class="view view-give-2000"></div>
	<div id="view-section-3" class="view view-give-2000"></div>

</body>

<?php include_once 'agile/scripts.php'; ?>

<script>

	window.onbeforeunload = grayOut;
	function grayOut(){
		var ldiv = document.getElementById('LoadingDiv');
		ldiv.style.display='block';
	}

	window.onload = function() {

		var viewService = new ViewService(
			function(name){
				$('.blue.button').attr('href', '<?php echo $offerUrl; ?>');

				$(".lazy").unveil(1000, function() {
					console.log('animate');
					$(this).animate({ opacity: 1 }, 300);
				});
			},
			function() {}
		);
	};

</script>

<?php include_once 'agile/footer.php'; ?>