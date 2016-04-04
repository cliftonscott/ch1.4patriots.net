<?php
include_once ('template-header.php'); /*Add template-header-nav.php to add top menu*/
$submitButtonSource = "/assets/images/buttons/btn-orange-click-continue-03.jpg";
?>
<style>
	p{
		margin: 8px;
	}
	em{
		color: transparent;
		text-shadow: 0 0 5px rgba(0,93,158,1.0);
		font-style:normal;
	}
	.fb-group-picrow img{
		direction: ltr;
		display: block;
		font-family: helvetica, arial, 'lucida grande', sans-serif;
		font-size: 12px;
		height: 50px;
		line-height: 17px;
		text-align: left;
		/*width: 50px;*/
		float:left;
		padding-right:8px;
	}
	.mock-outer{
		background-color: rgb(255, 255, 255);
		border-bottom-color: rgb(208, 209, 213);
		border-bottom-left-radius: 3px;
		border-bottom-right-radius: 3px;
		border-bottom-style: solid;
		border-bottom-width: 1px;
		border-image-outset: 0px;
		border-image-repeat: stretch;
		border-image-slice: 100%;
		border-image-source: none;
		border-image-width: 1;
		border-left-color: rgb(223, 224, 228);
		border-left-style: solid;
		border-left-width: 1px;
		border-right-color: rgb(223, 224, 228);
		border-right-style: solid;
		border-right-width: 1px;
		border-top-color: rgb(229, 230, 233);
		border-top-left-radius: 3px;
		border-top-right-radius: 3px;
		border-top-style: solid;
		border-top-width: 1px;
		color: rgb(20, 24, 35);
		display: block;
		font-family: helvetica, arial, 'lucida grande', sans-serif;
		font-size: 12px;
		height: auto;
		line-height: 17;
		margin: 10px auto;
		padding: 12px;
		text-align: left;
		max-width: 700px;
		word-wrap: break-word;
	}

	.mock-inner{
		direction: ltr;
		display: block;
	}

	.usertext{
		color: rgb(20, 24, 35);
		direction: ltr;
		display: inline;
		font-size: 14px;
		font-weight: normal;
		height: auto;
		line-height: 20px;
		margin-bottom: 0px;
		margin-left: 0px;
		margin-right: 0px;
		margin-top: 0px;
		text-align: left;
		width: auto;
		word-wrap: break-word;

	}
	.mock-title-cap-text{
		color:#005D9E;
		direction: ltr;
		display: block;
		font-size: 12px;
		line-height: 11px;
		margin-top:30px;
		overflow-x: hidden;
		overflow-y: hidden;
		text-align: left;
		text-overflow: ellipsis;
		white-space: nowrap;
		width: 100%;
		word-wrap: break-word;
	}
	.fb-group-picrow{
		color: rgb(20, 24, 35);
		direction: ltr;
		display: block;
		font-family: helvetica, arial, 'lucida grande', sans-serif;
		font-size: 12px;
		height: 40px;
		line-height: 17px;
		margin-bottom: 25px;
		text-align: left;
	}
	.fbh5{
		color:#005D9E;
		direction: ltr;
		display: block;
		font-family: helvetica, arial, 'lucida grande', sans-serif;
		font-size: 14px;
		font-weight: normal;
		height: 19px;
		line-height: 20px;
		margin-bottom: 2px;
		margin-left: 0px;
		margin-right: 0px;
		margin-top: 0px;
		overflow-x: hidden;
		overflow-y: hidden;
		padding-bottom: 0px;
		padding-left: 0px;
		padding-right: 22px;
		padding-top: 0px;
		text-align: left;
		/*width: 86px;*/
	}
	.fb-group-text{
		color: rgb(20, 24, 35);
		direction: ltr;
		display: block;
		font-family: helvetica, arial, 'lucida grande', sans-serif;
		font-size: 12px;
		height: 40px;
		line-height: 17px;
		text-align: left;
		width: 100%;
		word-wrap: break-word;
	}
	.fb-group-date{
		color: rgb(145, 151, 163);
		direction: ltr;
		display: inline;
		font-family: helvetica, arial, 'lucida grande', sans-serif;
		font-size: 12px;
		font-weight: normal;
		height: auto;
		line-height: 17px;
		text-align: left;
		width: auto;
	}

	@media screen and (max-width: 768px) {
		.mock-outer{ width: 90%;}
	}
</style>

<div class="container-main">

	<div class="container">

		<div class="row">
			<div style="font-size: 14px" class="col-sm-6 col-sm-push-6 col-md-7 col-md-push-5 nopadding">
				<div style="padding-top: 0px;">
					<div style="padding: 10px" class="row">
						<div class="col-lg-12">
							<h2 style="font-size: 19px" class="red21 text-center nomargin"><strong>WARNING: Free Survival Food is Almost Gone</strong></h2>
						</div>
						<div class="col-lg-12 text-center center-block hidden-xs">
							<iframe src="//fast.wistia.net/embed/iframe/f1958k8cul" allowtransparency="true" frameborder="0" scrolling="no" class="wistia_embed" name="wistia_embed" allowfullscreen mozallowfullscreen webkitallowfullscreen oallowfullscreen msallowfullscreen width="440" height="248"></iframe>
							<script src="//fast.wistia.net/assets/external/E-v1.js" async></script>
						</div>
						<div class="col-lg-12 margin-b-10">
							<p>This isn&rsquo;t ordinary food... it&rsquo;s delicious, nutritious, &ldquo;super survival food&rdquo; that could save your life in a disaster!</p>
							<p>&nbsp;All Food4Patriots survival food is made in the USA from the finest ingredients and is rated for 25 years of storage. And it&rsquo;s yours<?php if(isset($_GET["fullprice"]) || $_SESSION["fullprice"]) : ?> for just $27 (plus the cost of postage + handling)<?php else: ?> <strong> FREE</strong> (just cover postage + handling)<?php endif ?> while supplies last!&nbsp;</p>
							<p>Get 16 servings of family-favorite dishes: Liberty Bell Potato Cheddar Soup, Blue Ribbon Creamy Chicken Rice, Traveler's Stew, and Granny's Home Style Potato Soup. Here&rsquo;s exactly what you&rsquo;ll get:</p>
							<ul>
								<li>&ldquo;Disaster-Proof packaging&rdquo;&hellip; a military-grade Mylar pouch keeps out air, moisture and light to keep your food nutritionally sound and tasting great for up to 25 years</li>
								<li>Instantly protects you and your family from going hungry in a disaster&hellip; store in your home, car, office or give to a friend or family member</li>
								<li>Simple to prepare - just add boiling water, simmer, and serve in 15 min</li>
								<li>Rushed right to your door via First Class USPS mai.</li>
							</ul>
							<?php if(isset($_GET["fullprice"]) || $_SESSION["fullprice"]) :?>
								<p>For just $27.00 plus shipping,while supplies last (limit one per household), you can get 72-hours worth of food preparedness!</p>
							<?php else: ?>
								<p><strong>Regularly priced at $27.00 plus shipping, today it&rsquo;s <strong class="darkRed">FREE</strong> while supplies last </strong>(limit one per household, just cover postage + handling).</p>
							<?php endif ?>
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

		<div class="guaranteeBox" style="max-width:700px;">
			<div class="row">
				<div class="col-md-3">
					<img src="/assets/images/checkout/satisfaction-seal-01.png" alt="Frank" class="img-responsive pull-left" style="margin-top:10px;">
				</div>
				<div class="col-md-9">
					<p><strong><span class="brightBlue">365-Day 100% Money-Back Guarantee:</span></strong> This is a <strong>100% money back guarantee</strong>. No questions asked. If for any reason you’re not satisfied with your Food4Patriots kit, just return it within 365 days of purchase and I’ll refund 100% of your purchase. There is absolutely no risk for you.</p>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>

		<div class="row" style="padding: 20px 0;">
			<div class="col-sm-12 col-md-6">
				<div class="mock-outer ">
					<div class="mock-inner">
						<div class="fb-group-picrow">
							<img src="/media/images/misc/img-testimonial-diana.jpg">
							<div class="fb-group-text">
								<h5 class="fbh5"><b>Colleen <em>Carter</em></b></h5>
								<span class="fb-group-date">August 11 at 9:15am &#183; <i class="fa fa-user"></i></span>
							</div>
						</div>
						<div class="usertext">
							<p>I am very happy with all the survival foods I have purchased & their prices are very reasonable & they are also non-GMO. Taste great & they are healthy for your body… "Food 4 Patriots" is the way to get the best for your money!!!!</p>
						</div>
						<div class="mock-title-cap-text">Like &#183; Comment &#183; Share</div>
					</div>
				</div>
			</div>
			<div class="col-sm-12 col-md-6">
				<div class="mock-outer">
					<div class="mock-inner">
						<div class="fb-group-picrow">
							<img src="/media/images/misc/img-testimonial-rolf.jpg"">
							<div class="fb-group-text">
								<h5 class="fbh5"><b>Herron <em>Dedrick</em></b></h5>
								<span class="fb-group-date">May 15 at 10:08am &#183; <i class="fa fa-user"></i></span>
							</div>
						</div>
						<div class="usertext">
							<p>I now feel very secure in the event of an emergency that might cut off food distribution channels. Also, in the event that our economy crashes not if, but when… Again, thank you for what you have put together to help folks like me.</p>
						</div>
						<div class="mock-title-cap-text">Like &#183; Comment &#183; Share</div>
					</div>
				</div>
			</div>
		</div>

		<hr>

	</div>

<?php include_once ('template-bottom.php'); ?>