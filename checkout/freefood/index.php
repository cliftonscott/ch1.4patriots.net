<?php
/*
 * use session soldout multidimensional array to indicate sold out conditions and associated
 * variables
 */
$template["floatingTimer"] = 0; //minutes to pass to the timer / will not display if not greater than zero
$template["formType"] = "customerForm"; //designates that this is a form using customer-form.php as included form
// SET PRODUCT ID
// THIS IS SET TO THE 3 MONTH KIT FOR DEFAULT
$_SESSION['productId'] = 17; //please keep as an integer
$_SESSION['quantity'] = 1;
include_once("Product.php");


if($_SESSION["soldout"]["flag"] !== true) {
	$template["floatingTimer"] = 20; //minutes to pass to the timer / will not display if not greater than zero
} else {
	$template["floatingTimer"] = 0; //minutes to pass to the timer / will not display if not greater than zero
}
//creates a product object that is available from every template
$productObj = new Product();
$productDataObj = Product::getProduct($_SESSION["productId"]);
$funnelData = $productObj->initFunnel("checkout");

//include template top AFTER the product information is set
include_once ('template-top.php');
?>
<?php //include_once ('template-header.php'); /*Add template-header-nav.php to add top menu*/?>

<style>
	body{background-color: #ffffff}
	/* Button 3 */
	.btn-3 {
		border: none;
		border-radius:9px;
		background: #5fb760;
		color:#fff;
		font-family: impact;
		font-size:45px;
		padding: 17px 21px 17px 21px;
		text-decoration: none;
		text-shadow: 3px 2px 2px rgba(0,0,0,0.7);
	}
	.btn-3:hover {
		background: #007C39;
		color:#fff;
		cursor:pointer;
		-webkit-tap-highlight-color: rgba(0,0,0,0);
	}
	.blue-check{font-weight: bold; font-size:18px;  padding-left: 3em}
	.blue-check li{margin-bottom: 10px}
	.blue-check .fa-check{color:blue}
	u.underline-red{ -moz-text-decoration-color: red; /* Code for Firefox */
		text-decoration-color: red;}
	.topbanner{font-size: 2.5em}
	.topbanner2{font-size: 2em}
	#secure-order-bar{background-color: #0f6ea6; background-image: none;    border: 1px solid #0f6ea6;}
	.navbar-default {
		background-image:none; border: 0px}
	.navbar{min-height: 0}
	.navbar .container{padding-top: 0}
	hr.short{margin-bottom: 0;
		margin-top:0;}
	.video-row{padding-right: 0;padding-left: 0}
	.container.footer{background-color: #011839; margin-bottom: 0; max-width:100%}
	.topTimer{background-color: orange}
	/* Extra small devices (phones, less than 768px) */
	/* No media query since this is the default in Bootstrap */

	/* Small devices (tablets, 768px and up) */
	@media (min-width: @screen-sm-min) { .nopaddingsm{padding: 0px !important;}}

	/* Medium devices (desktops, 992px and up) */
	@media (min-width: @screen-md-min) {  }

	/* Large devices (large desktops, 1200px and up) */
	@media (min-width: @screen-lg-min) { }

	#popupTimer {
		margin: 0 auto;
		color: #000;
		text-align: center;
		position: fixed;
		top: 0;
		z-index: 999999;
		display: none;
		width: 100%;
		background-color: orange;
	}

</style>
<script>
	$(document).ready(function() {
		$('#popupTimer').delay(3000).fadeIn(400);
	});
</script>


</div>
</div>
<div class="container-fluid " id="popupTimer">
	<div class="col-xs-12 text-center">
		<p style="font-size:20px;margin-bottom: 0">Low Inventory Warning #PID811: Site admin has been notified. Reserved inventory for current session expires in <span id="theTime" class="timeClass">19:28</span>...</p>
	</div>
</div>

<div class="container-fluid" style="background-color: #f7f7f7">
	<div class="row">
		<div class="col-xs-12 text-center">
			<span class="topbanner"><strong><u>FREE FOOD!</u></strong> Guaranteed To Last 25 Years!</span>
		</div>
	</div>

	<div class="row">
		<div class="col-xs-12 text-center">
			<span class="topbanner2"><i>“This Shit Is <br class="hidden-sm hidden-md hidden-lg" />
					<span style="color:red">Fan</span>-<span style="color:green">Fucking</span>-<span style="color:fuchsia">Tastic</span>...”<br class="hidden-sm hidden-md hidden-lg" />
					- Paul N.</i></span>
		</div>
	</div>
	<hr class="short">

</div>
</div>

<div class="container-main">

	<div class="container">
		<div class="row">



			<div class="col-sm-6 col-sm-push-6 col-md-7 col-md-push-0 nopaddingsm">
				<div style="padding-top: 0px;">
					<div class="row ">
						<div class="col-lg-12 text-center center-block hidden-xs nopaddingsm">
							<script src="//fast.wistia.net/assets/external/E-v1.js" async></script>
							<script type="text/javascript" src="https://reboot.evsuite.com/player/ZnJlZS1mb29kLXZzbC12Mi1maW5hbDA2MTQubXA0/?responsive=1&autoResponsive=1&container=evp-f1958k8cul"></script><div id="evp-f1958k8cul" data-role="evp-video" data-evp-id="ZnJlZS1mb29kLXZzbC12Mi1maW5hbDA2MTQubXA0"></div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12 col-lg-12 margin-b-10 nopaddingsm">

							<div class="col-sm-6 col-sm-offset-3 margin-b-10">
								<img src="/assets/images/logo-small.png" width="384" height="103" alt="power4patriots" class="img-responsive center-block">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12 nopaddingsm">
							<p class="text-center">This isn&rsquo;t ordinary food... this is delicious, nutritious, good for 25 years &ldquo;super survival food&rdquo; that could literally save your life in a disaster!</p>
						</div>
					</div>
					<div class="row center-block margin-b-10">
						<div class="col-sm-12 nopaddingsm">
							<ul class="fa-ul blue-check">
								<li><i class="fa-li fa fa-check"></i> 16 Servings of Great-tasting Survival Food</li>
								<li><i class="fa-li fa fa-check"></i> Packaged In Airtight, Re-sealable Mylar Pouches </li>
								<li><i class="fa-li fa fa-check"></i> Quick And Easy To Prepare </li>
								<li><i class="fa-li fa fa-check"></i> 100% Money Back Guarentee</li>
								<li><i class="fa-li fa fa-check"></i> <u class="underline-red">FREE!</u> (Just Cover $9.95 Postage) </li>
							</ul>
						</div>
					</div>
					<div class="clearfix"></div>
					<div class="row margin-t-20 ">
						<div class="col-sm-12 nopaddingsm">
							<p><img src="/assets/images/checkout/satisfaction-seal-01.png" alt="Frank" width="150" class="img-responsive pull-left"><strong><span class="brightBlue">Guarantee #1:</span></strong> This is a <strong>100% money back guarantee</strong>. No questions asked. If for any reason you&rsquo;re not satisfied with your Food4Patriots kit, just return it within 60 days of purchase and I&rsquo;ll refund 100% of your purchase.            </p>

						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-6 col-sm-pull-6 col-md-5 col-md-pull-0 nopaddingsm">
				<?php include_once ('customer-form.php'); ?>
				<div class="row">

					<div class="col-xs-4 col-xs-offset-1 col-sm-4 col-sm-offset-2 ">
						<img src="/assets/images/checkout/trustseals-usa-01.gif" width="130" height="82" alt="Trust Seals" class="center-block">
						<!--<div>
							<table class="text-center center-block" width="135" border="0" cellpadding="2" cellspacing="0" title="Click to Verify - This site chose Symantec SSL for secure e-commerce and confidential communications.">
								<tr>
									<td width="135" align="center" valign="top"><script type="text/javascript" src="https://seal.verisign.com/getseal?host_name=secure.food4patriots.com&amp;size=M&amp;use_flash=NO&amp;use_transparent=NO&amp;lang=en"></script></td>
								</tr>
							</table>
						</div>-->
					</div>
					<div class="col-xs-4 col-sm-4  ">
						<img src="/assets/images/checkout/trustseals-usa-01.gif" width="130" height="82" alt="Trust Seals">
						<!--<script src="https://cdn.ywxi.net/js/inline.js?w=120"></script>-->
					</div>
				</div>

			</div>
		</div>
	</div>
</div>
<div class="container-fluid">



	<div class="row" style="background-color:#0058a2;">
		<div class="col-sm-12">
			<h2 class="text-center" style="color:white">Hurry, This FREE Offer Won't Last Long! </h2>
		</div>

	</div>
	<div class="row" style="background-color: #efefef">

		<div class="container"
		<div class="col-sm-12">
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
			<img class="img-responsive media pull-right" src="/media/images/f4p/food/lasagna.jpg" width="200" height="133" alt="Mountain Man Granola">
			<p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>

			<p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p>

			<p>Dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p>
			<img class="img-responsive media pull-left" src="/media/images/f4p/72hr-pouches-275x160.png"  alt="Liberty Bell Potato Cheddar Soup">
			<p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.dolor sit amet, consectetur, adipisci velit, sed.</p>

			<p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. </p>
			<div class="text-center margin-b-10">
				<button class="btn-3">Claim Your FREE Food Now!! <i style="font-size:60px;"  class="fa fa-angle-double-right"></i></button>
			</div>

		</div>
	</div>


</div>

</div>
<div class="container-main">

	<div class="container">
		<h2 class="text-center">Frequently Asked Questions</h2>

		<?php include_once ('snippets/faq-accordian.html'); ?>
	</div>
</div>
<div class="container-fluid">
	<?php include_once ('template-bottom.php'); ?>
</div>
