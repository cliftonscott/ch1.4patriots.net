<style>
	p{
		font-size: 15pt;
	}
</style>
<?php
//include template top AFTER the product information is set
include_once ('template-top.php');
?>
<?php include_once ('template-header.php'); /*Add template-header-nav.php to add top menu*/?>
	<div class="container-main">
		<div class="container oto-width">
			<div class="row">
				<div class="col-sm-12 col-md-12">
					<div>
						<p class="text-center"><i>Obama and his government cronies now have more<br class="hidden-xs"> power than ever before...</i></p>
						<h1 class="darkRed text-center">Are You And Your<br class="hidden-xs"> Family Prepared To<br class="hidden-xs"> Survive A Government<br class="hidden-xs"> Controlled Society?</h1>
					</div>
					<p>527, 197 people have taken the <strong><i>Government Survival Quiz.</i></strong> Start the quiz below to see if you & your family are prepared to survive if the government finally gets <strong>complete control</strong> of America...</p>
					<?php include_once("quiz-body.phtml");?>
					<p>In this FREE, <strong>33 second</strong> quiz you’ll get to see if you and your family are truly prepared to survive a major crisis such as a government takeover, economic collapse or even martial law.</p>
					<p>Most people think they’re prepared for these scenarios because they already have water, food, guns and a back-up generator stored in their house...</p>
					<p>But the truth is... that’s <strong>not enough</strong> to actually survive when chaos strikes.</p>
					<p>If you want to be totally self-reliant and able to protect your family when a crisis hits (without having to rely on the Federal government to take care of you) then do yourself a favor and take the FREE, 33 second, <strong>Government Survival Quiz</strong> below...</p>
					<p>Simply click the orange “Start The Quiz” button below to see if you and your family are truly prepared to survive a government gone wild...</p>
					<?php include_once("quiz-body-2.phtml");?>
					<p>This quiz is 100% FREE and takes only 33 seconds to complete. All answers are kept completely private and secure.</p>
					<img src="/media/images/misc/as-seen-advertised-on-01-grayscale.jpg" class="img-responsive center-block">
				</div>
			</div>
		</div>
		<?php
		include_once("template-bottom.php");
		?>
	</div>