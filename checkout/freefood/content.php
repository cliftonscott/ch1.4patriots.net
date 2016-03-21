<?php
include_once ('template-header.php'); /*Add template-header-nav.php to add top menu*/
$submitButtonSource = "/assets/images/buttons/btn-orange-click-continue-01.png";
if(isset($_GET["fullprice"]) || $_SESSION["fullprice"]) {
	$_SESSION["customTemplate"]["price"] = 27;
}
?>
<style>
	p{
		margin: 8px;
	}
</style>

<div class="container-main">

	<div class="container">

		<div class="row">
			<div class="col-sm-6 col-sm-push-6 col-md-7 col-md-push-5 nopadding">
				<div style="padding-top: 0px;">
					<div class="row">
						<div class="col-lg-12">
							<h2 class="red21 text-center nomargin"><strong>WARNING: 73-Hour Survival Kits Are Almost Gone...</strong></h2>
						</div>
						<div class="col-lg-12 text-center center-block hidden-xs">
							<div class="wistia_responsive_padding" style="padding:56.25% 0 0 0;position:relative;"><div class="wistia_responsive_wrapper" style="height:100%;left:0;position:absolute;top:0;width:100%;"><iframe src="//fast.wistia.net/embed/iframe/f1958k8cul?videoFoam=true" allowtransparency="true" frameborder="0" scrolling="no" class="wistia_embed" name="wistia_embed" allowfullscreen mozallowfullscreen webkitallowfullscreen oallowfullscreen msallowfullscreen width="100%" height="100%"></iframe></div></div>
						</div>
						<div class="col-lg-12 margin-b-10">
							<p>All Food4Patriots survival food is made in the USA from the finest ingredients and is rated for 25 years of storage. And it’s yours for just $27 (plus the cost of postage) while supplies last!</p>
							<p>Get 16 servings of family-favorite dishes: Liberty Bell Potato Cheddar Soup, Blue Ribbon Creamy Chicken Rice, Travelers Stew, and Granny's Homestyle Potato Soup. Here&rsquo;s exactly what you&rsquo;ll get:</p>
							<ul>
								<li>Instantly protects you and your family from going hungry in a disaster</li>
								<li>Simple to prepare: just add boiling water, simmer, and serve</li>
								<li>Space-age Mylar pouches keep out air, moisture and light to keep your food fresh and delicious</li>
								<li>Rushed to your door via USPS First Class Mail</li>
							</ul>
							<p>For just $27.00 plus shipping,while supplies last (limit one per household), you can get 72-hours worth of food preparedness!</p>
						</div>
						<div class="col-lg-12 text-center hidden-xs">
							<img src="/assets/images/buttons/btn-order-now-green-left-01.png" alt="Frank" class="img-responsive center-block">
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-6 col-sm-pull-6 col-md-5 col-md-pull-7">
				<?php include_once ('customer-form.php'); ?>
			</div>
		</div>

		<div class="guaranteeBox">
			<p><img src="/assets/images/checkout/satisfaction-seal-02.png" alt="Frank" width="150" height="180" class="img-responsive pull-left"><strong><span class="brightBlue">Guarantee #1:</span></strong> This is a <strong>100% money back guarantee</strong>. No questions asked. If for any reason you’re not satisfied with your Food4Patriots kit, just return it within 365 days of purchase and I’ll refund 100% of your purchase.</p>
			<p>&nbsp;</p>
			<p><strong><span class="brightBlue">Guarantee #2:&nbsp;</span></strong>This is an unheard of 300% money back guarantee. It&rsquo;s in addition to guarantee #1.&nbsp;If you open any of your Food4Patriots meals anytime&nbsp;<strong>in the next 25 years</strong>&nbsp;and find that your food has spoiled, you can return your entire Food4Patriots stockpile and I will&nbsp;<strong>triple</strong>&nbsp;your money back!</p>
			<div class="clearfix"></div>
		</div>

		<hr>

	</div>

<?php include_once ('template-bottom.php'); ?>