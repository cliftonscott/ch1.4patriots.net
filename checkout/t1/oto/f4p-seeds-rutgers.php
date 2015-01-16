<?php
$firstName = $_SESSION["customerDataArray"]["firstName"];
// SET PRODUCT ID
$_SESSION['productId'] = 11; //please keep as an integer
$_SESSION['quantity'] = 1;
$maxQuantity = 1;

$_SESSION['pageReturn'] = '/checkout/order.php';
include_once("Product.php");
$productObj = new Product();

$productDataObj = $productObj->getProduct($_SESSION["productId"]);
$funnelData = $productObj->initFunnel("oto2");
$declineUrl = $funnelData["declineUrl"];

include_once("template-top.php");
include_once ('template-header.php'); /*Add template-header-nav.php to add top menu*/
?>

<div class="container-main">
	<div class="breadcrumb1">
		<a>CHECKOUT</a>
		<a class="current">ORDER CUSTOMIZATION</a>
		<a>ORDER CONFIRMATION</a>
	</div>
	<div class="container oto-width">
		<div>
			<h1 class="darkRed text-center"><?php echo $firstName;?><span class="titles">, Can I Give You 150 Heirloom Tomato Seeds... 100% FREE? </span></h1>
		</div>
		<div style="padding-bottom:20px;"><img class="img-responsive center-block"src="/media/images/ss4p/ss4p-rutgers-tomato.jpg" alt="Rutgers Tomato Seeds"/></div>
		<div class="caption text-center" style="padding-bottom:30px;"><em>Get 150 heirloom tomato "super-seeds" added to your order <br>
			absolutely FREE. <a href="/checkout/process.php" onClick="patriotTrack('click-to-accept-text');"><u>Click Here To Accept >></u></a></em><a href="../process.php" onClick="patriotTrack('click-to-accept-text');"><u></u></a>
		</div>
		<div>
			<p>Congratulations on  starting your emergency food stockpile! I know you&rsquo;ll sleep better at night knowing that you and your family are protected. </p>
			<p>The perfect complement to your food stockpile is a backyard garden. In a time of crisis or national emergency, fresh produce is one of the first things to disappear from the shelves. That's why I want to flat out GIVE you 150 heirloom tomato &quot;super seeds!”</p>
			<p>These aren't ordinary seeds... these are heirloom, non-genetically modified &ldquo;super survival seeds&rdquo; that are open-pollinated and can be grown, harvested, and replanted endlessly!</p>
			<p>Get over 150 Rutgers Tomato Survival Seeds&nbsp;<strong>FREE</strong>&nbsp;while supplies last!</p>

			<ul class="fa-ul margin-b-16">
				<li><i class="fa-li fa fa-check"></i>150+ survival seeds packed in a special triple-layered, re-sealable, re-usable Mylar packet designed to significantly increase the shelf life and viability of your heritage seeds.</li>
				<li><i class="fa-li fa fa-check"></i>The legendary Rutgers Tomato is an heirloom variety introduced in the 1930s and famous for its delicious taste, abundant nutrition and high germination rates.</li>
				<li><i class="fa-li fa fa-check"></i>100% Non-GMO, open-pollinated seeds from proud American farmers that you can harvest and plant endlessly. </li>
			</ul>
			<p><strong>Regularly priced at $9.95, FREE while supplies (limit 1 per household)</strong></p>

			<h2 class="darkRed text-center">It's 100% FREE... So What&rsquo;s The Catch?</h2>
			<p>The one thing I would ask is that you actually plant these seeds and take advantage of the opportunity to have your own delicious, heirloom-quality vegetables at your fingertips. And I would love it if you sent me pictures of your garden and let me know how they work out for you!</p>
			<p>Click the &quot;Accept&quot; button below to get your 150 heirloom tomato &quot;super seeds&quot; 100% FREE while supplies last.</p>

			<div>
				<div class="text-center">
					<a href="/checkout/process.php" title="Add to Order!"><img class="img-responsive center-block" src="/assets/images/buttons/btn-orange-click-accept-01.jpg" alt="Buy It Now!" border="0" /></a>
				</div>
				<div class="text-center" style="margin-top:20px;"><strong>OR</strong></div>

				<div class="noThanks">
					<a href="<?php echo $declineUrl;?>">No Thanks</a> – I want to give up this opportunity. I understand that I will not receive this special offer again.
				</div>
			</div>

		</div>
</div>


<?php include_once("template-bottom.php"); ?>