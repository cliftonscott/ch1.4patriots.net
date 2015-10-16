<?php
$variantsArray = array (
	"quizv2", // Clean Back Ground
);
if($_GET["v"]) {
	if(in_array(trim($_GET["v"]),$variantsArray)) {
		$variation = trim($_GET["v"]);
		$_SESSION["variation"] = $variation;
	}
}
?>
<style>
	p{
		font-size: 15pt;
	}
</style>
<?php
//include template top AFTER the product information is set
include_once ('template-top.php');
?>
<!-- SPLIT JV-22 10/16/15-->
<?php
if (JV::in("22-quizv2")) {
	$_SESSION["variation"] = "quizv2";
}
?>
<!--/// End Test///-->
<?php if ($_SESSION["variation"] === "quizv2"): ?>
<style>
	p{
		font-size: 14pt;
	}
	#background-img{
		background: url(/assets/images/video-lander/img-background-police.jpg) no-repeat center center fixed;
		-webkit-background-size: cover;
		-moz-background-size: cover;
		-o-background-size: cover;
		background-size: cover;
	}
	.navbar {
		margin-top: 25px;
		background-color: transparent;
		border-radius: 0px;
		margin-bottom: 0px;
		max-width: 958px;
		margin-right: auto;
		margin-left: auto;
		border: none;
	}

	.navbar-default {
		background-image: none;
		border-bottom-color: transparent;
		border: none;
	}
	.container-main {
		border-radius: 10px;
	}
	h1{
		font-family: 'Oswald', sans-serif;
	}
</style>
<link href='https://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'>
<?php endif; ?>
<?php if ($_SESSION["variation"] === "quizv2"): ?>
	<div class="container-main">
		<div class="container oto-width">
			<div class="row">
				<div class="col-sm-12 col-md-12">
					<div>
						<h1 class="darkRed text-center">Are You And Your Family <u>Prepared</u> To Survive A Government Controlled Society?</h1>
					</div>
					<p>527,197 people have taken the <strong><i>Government Survival Quiz.</i></strong> Start the quiz below to see if you and your family are prepared to survive if the government finally gets <strong>complete control</strong> of America...</p>
					<p>In this FREE, <strong>33 second</strong> quiz you&#39;ll get to see if you and your family are truly prepared to survive a major crisis such as a government takeover, economic collapse or even martial law.</p>
					<p>Most people think they&#39;re prepared for these scenarios because they already have water, food, guns and a back-up generator stored in their house...</p>
					<p>But the truth is... that&#39;s <strong>not enough</strong> to actually survive when chaos strikes.</p>
					<p>Simply click the orange <strong>&#34;Start The Quiz&#34;</strong> button below to see if you and your family are truly prepared to survive a government gone wild...</p>
					<div id="start-quiz">
						<img style="width: 100px;margin-top: -15px" src="/media/images/misc/arrow-l-animated.gif">
						<a href="quiz.php"><button class="start-btn" style="margin-top:8px; margin-bottom:20px; font-weight:bold;">Start The Quiz</button></a>
						<img style="width: 100px;margin-top: -15px"  src="/media/images/misc/arrow-l-animated.gif" class="img-flip">
					</div>
					<p><i>This quiz is 100% FREE and takes only 33 seconds to complete. All answers are kept completely private and secure.</i></p>
				</div>
			</div>
		</div>
<?php else: ?>
		<div class="container-main">
			<div class="container oto-width">
				<div class="row">
					<div class="col-sm-12 col-md-12">
						<div>
							<h1 class="darkRed text-center">Are You And Your Family <u>Prepared</u><br class="hidden-xs"> To Survive A Government<br class="hidden-xs"> Controlled Society?</h1>
						</div>
						<p>527,197 people have taken the <strong><i>Government Survival Quiz.</i></strong> Start the quiz below to see if you and your family are prepared to survive if the government finally gets <strong>complete control</strong> of America...</p>
						<div id="start-quiz">
							<img style="width: 100px;margin-top: -15px" src="/media/images/misc/arrow-l-animated.gif">
							<a href="quiz.php"><button class="start-btn" style="margin-top:8px; margin-bottom:20px; font-weight:bold;">Start The Quiz</button></a>
							<img style="width: 100px;margin-top: -15px"  src="/media/images/misc/arrow-l-animated.gif" class="img-flip">
						</div>
						<p>In this FREE, <strong>33 second</strong> quiz you&#39;ll get to see if you and your family are truly prepared to survive a major crisis such as a government takeover, economic collapse or even martial law.</p>
						<p>Most people think they&#39;re prepared for these scenarios because they already have water, food, guns and a back-up generator stored in their house...</p>
						<p>But the truth is... that&#39;s <strong>not enough</strong> to actually survive when chaos strikes.</p>
						<p>If you want to be totally self-reliant and able to protect your family when a crisis hits (without having to rely on the Federal Government to take care of you) then do yourself a favor and take the FREE, 33 second, <strong>Government Survival Quiz</strong> below...</p>
						<p>Simply click the orange <strong>&#34;Start The Quiz&#34;</strong> button below to see if you and your family are truly prepared to survive a government gone wild...</p>
						<div id="start-quiz">
							<img style="width: 100px;margin-top: -15px" src="/media/images/misc/arrow-l-animated.gif">
							<a href="quiz.php"><button class="start-btn" style="margin-top:8px; margin-bottom:20px; font-weight:bold;">Start The Quiz</button></a>
							<img style="width: 100px;margin-top: -15px"  src="/media/images/misc/arrow-l-animated.gif" class="img-flip">
						</div>
						<p><i>This quiz is 100% FREE and takes only 33 seconds to complete. All answers are kept completely private and secure.</i></p>
						<img style="padding-top: 10px;" src="/media/images/misc/quiz-as-seen-advertised-on-01-grayscale.jpg" class="img-responsive center-block">
					</div>
				</div>
			</div>
<?php endif; ?>
		<?php
		include_once("template-bottom.php");
		?>
	</div>