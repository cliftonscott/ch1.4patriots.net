<?php
$submitButtonSource = "/assets/images/buttons/btn-orange-click-continue-03.jpg";
?>
<style>
	body{background-color: #ffffff; font-size:14pt;}
	.container-main, .container {
		max-width: 980px;
	}
	/* Button 3 */
	.btn-3 {
		border: none;
		border-radius:9px;
		background: #67BC07;
		color:#fff;
		font-weight: bolder;
		font-size:31px;
		letter-spacing: 1px;
		padding: 10px 25px;
		text-decoration: none;
	}
	.btn-3:hover {
		background: #007C39;
		color:#fff;
		cursor:pointer;
		-webkit-tap-highlight-color: rgba(0,0,0,0);
	}
	.guarantee-text{
		font-size: 17px;
		color: #696969;
		margin-top: 5px;
	}
	.blue-check{font-weight: bold; font-size:18px;  padding-left: 3em}
	.blue-check li{margin: 10px 0}
	.blue-check .fa-check{color:#003F9A; margin-top: -12px;}
	u.underline-red{ -moz-text-decoration-color: red; /* Code for Firefox */
		text-decoration-color: red;}
	.topbanner{font-size: 2em; font-weight: normal;line-height: 1.2;}
	.topbanner u {
		color: #AD0808;
	}
	.topbanner2{font-size: 2em; font-style: italic;color: #808080;}
	#secure-order-bar{background-color: #0f6ea6; background-image: none;    border: 1px solid #0f6ea6;}
	.navbar-default {
		background-image:none; border: 0px}
	.navbar{min-height: 0}
	.navbar .container{padding-top: 0}
	hr.short{margin-bottom: 0;
		margin-top:0;max-width: 980px}
	.video-row{padding-right: 0;padding-left: 0}
	.container.footer{background-color: #011839; margin-bottom: 0; max-width:100%}
	.topTimer{background-color: orange}
	.panel-title {font-size: 14pt;}
	em{
		color: transparent;
		text-shadow: 0 0 5px rgba(0,93,158,1.0);
		font-style:normal;
	}
	em .fb-dropdown{
		float:right;
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
	.nopaddinglg{padding: inherit !important;}

	@media screen and (max-width: 768px) {
		.mock-outer{ width: 90%;}
		.topbanner{font-size: 2.2em; font-weight: bold;line-height: 1.2;}
	}

	@media screen and (max-width: 992px) {
		.nopaddinglg{padding: 0 15px !important;}
		.topbanner{font-size: 2.2em; font-weight: bold;line-height: 1.2;}
	}

	@media screen and (max-width: 1200px) {
		.nopaddinglg{padding: 0 15px !important;}
		.topbanner{font-size: 2.2em; font-weight: bold;line-height: 1.2;}
	}

	#popupTimer {
		margin: 0 auto;
		color: #000;
		text-align: center;
		top: 0;
		z-index: 999999;
		display: none;
		width: 100%;
		background-color: orange;
	}
	.arrow_box {
		position: relative;
		background: #289428;
		border: 2px solid #00780c;
		margin: 7px 80px;
		padding: 21px;
		font-size: 16px;
		color: white;
		text-align: center;
		font-weight: 600;
		border-radius: 6px;
		left: 291px;
		max-width: 280px;
	}
	.arrow_box:after, .arrow_box:before {
		left: 100%;
		top: 50%;
		border: solid transparent;
		content: " ";
		height: 0;
		width: 0;
		position: absolute;
		pointer-events: none;
	}

	.arrow_box:after {
		border-color: rgba(40, 148, 40, 0);
		border-left-color: #289428;
		border-width: 20px;
		margin-top: -20px;
	}
	.arrow_box:before {
		border-color: rgba(0, 120, 12, 0);
		border-left-color: #00780c;
		border-width: 23px;
		margin-top: -23px;
	}
	#ctaShipping{
		float: left;
		margin: 3px 0 0 -656px;
	}

</style>



</div>
</div>

<div class="container-fluid" style="background-color: #f7f7f7">
	<div class="row">
		<div class="col-xs-12 text-center" style="padding: 6px 0;">
			<span class="topbanner"><strong><u>WARNING</u></strong>: Free Survival Food is Almost Gone…</span>
		</div>
	</div>
	<hr class="short">
</div>

<div class="container-main">
	<div class="container">
		<div class="row">
			<div class="col-sm-6 col-md-7 nopaddinglg nomargin">
				<div class="row ">
					<div id="vsl" class="col-lg-12 text-center center-block hidden-xs">
						<script src="//fast.wistia.net/assets/external/E-v1.js" async></script>
						<div class="wistia_responsive_padding" style="padding:56.25% 0 0 0;position:relative;"><div class="wistia_responsive_wrapper wistia_embed" id="wistia_f1958k8cul" style="height:100%;left:0;position:absolute;top:0;width:100%;"><iframe src="//fast.wistia.net/embed/iframe/f1958k8cul?videoFoam=true" allowtransparency="true" frameborder="0" scrolling="no" class="wistia_embed" name="wistia_embed" allowfullscreen mozallowfullscreen webkitallowfullscreen oallowfullscreen msallowfullscreen width="100%" height="100%"></iframe></div></div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12 col-lg-12 nopadding">
						<img src="/assets/images/logo-small.png" width="384" height="103" alt="food4patriots" class="img-responsive center-block" style="max-width: 286px;">
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="text-center center-block" style="max-width: 85%; line-height: 1.3;padding: 5px 0;">This isn&rsquo;t ordinary food... this is delicious, nutritious, good for 25 years &ldquo;super survival food&rdquo; that could literally save your life in a disaster. And today only it’s yours FREE!</div>

					</div>
				</div>
				<div class="row center-block" style="margin: 15px 0;">
					<div class="col-sm-12 nopadding">
						<ul class="fa-ul blue-check">
							<li><i class="fa-li fa fa-check fa-2x"></i> 16 Servings of Great-tasting Survival Food  <a href="#info" id="72hrPopover" rel="popover" data-placement="bottom" data-toggle="tooltip" class="hidden-xs"><i class="fa fa-info-circle"></i></a></li>
							<li><i class="fa-li fa fa-check fa-2x"></i> Packaged In Airtight, Re-sealable Mylar Pouches</li>
							<li><i class="fa-li fa fa-check fa-2x"></i> Quick And Easy To Prepare - Just Add Boiling Water!</li>
							<li><i class="fa-li fa fa-check fa-2x"></i> 100% Satisfaction Guarantee</li>
							<li><i class="fa-li fa fa-check fa-2x"></i> Proudly Packaged in the USA!</li>
						</ul>
					</div>
				</div>
				<div class="clearfix"></div>
				<div class="row">
					<div class="col-sm-12">
						<img src="/assets/images/checkout/satisfaction-seal-03.jpg" alt="Frank" width="99" height="84" class="img-responsive pull-left">
						<p class="guarantee-text text-center"><strong>365-Day Full Money Back Guarantee</strong> – If at any time during the next year – for any reason – you are not satisfied with your Food4Patriots survival food, simply return it for a full refund.</p>
					</div>
				</div>
			</div>
			<div class="col-sm-6 col-md-5">
				<?php include_once ('customer-form.php'); ?>
				<div id="ctaShipping" class="hidden-xs hidden-sm" style="display:none;">
					<div class="arrow_box"><i class="fa fa-truck fa-3x pull-left"></i>Where should we ship your FREE food?</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="container-fluid" style="background-color: #f8f8f8;padding: 20px; border-top: 1px solid #EFEFEF;">
	<div class="row center-block" style="max-width: 980px;">
		<div class="col-sm-3 col-md-3" style="padding-bottom:20px;">
			<!--Norton security/seal-->
			<div class="text-center">
				<table class="text-center center-block" width="135" border="0" cellpadding="2" cellspacing="0" title="Click to Verify - This site chose Symantec SSL for secure e-commerce and confidential communications.">
					<tr>
						<td width="135" align="center" valign="top"><script type="text/javascript" src="https://seal.verisign.com/getseal?host_name=secure.food4patriots.com&amp;size=M&amp;use_flash=NO&amp;use_transparent=NO&amp;lang=en"></script></td>
					</tr>
				</table>
				<!--<img src="/assets/images/checkout/secure-seal-norton.png" style="max-width: 125px;margin-top:10px;" alt="Trust Seals">-->
			</div>
		</div>
		<div class="col-sm-3 col-md-3  text-center" style="padding-top: 20px;">
			<!--honesty online badge-->
			<div>
				<a href="https://honesteonline.com/members/consumerpage.php?company=12046&link=9869" target="_blank"><img src="https://honesteonline.com/HEOSealsNewNoDate/heosealimg.php?company=12046&size=2&link=9869" alt="HONESTe Seal - Click to verify before you buy!" border="0"></a>
			</div>
		</div>
		<div class="col-sm-3 col-md-3 text-center">
			<img src="/assets/images/checkout/secure-seal-made-usa.png" width="91" height="82" alt="Trust Seals" style="margin-top: 6px;">
		</div>
		<div class="col-sm-3 col-md-3 text-center" style="padding-top: 10px;">
			<script src="https://cdn.ywxi.net/js/inline.js?w=120"></script>
			<!--<img src="/assets/images/checkout/secure-seal-mcafee.jpg" width="129" height="59" alt="Trust Seals" style="margin-top: 6px;">-->
		</div>
	</div>
</div>

<div class="container-fluid">
	<div class="row" style="background-color:#0058a2;">
		<div class="col-sm-12">
			<h2 class="text-center" style="color: white; font-weight: bold; font-size: 33px; letter-spacing: 1px;">Hurry, This FREE Offer Won't Last Long!</h2>
		</div>
	</div>
	<div class="row" style="background-color: #efefef">
		<div class="container"
		<div class="col-sm-12" style="padding: 35px;">
			<img class="img-responsive pull-right" style="margin: 0 0 20px 20px;" src="/media/images/f4p/f4p-food-table-01.jpg" width="350" height="221" alt="Food4Patriots 72 Food Kit Meals">
			<p>There&rsquo;s a lot going on in the world to be concerned about – terrorist attacks, earthquakes, tornadoes, economic unrest, and so much more. You owe it to your family to prepare now for uncertain days ahead.</p>
			<p>For sure, no one knows where the next crisis will hit… or when. But when it does hit, finding food could be near-impossible as stores are quickly sold out or have their shelves stripped bare by hungry mobs.</p>
			<p>You don&rsquo;t want your family standing in line with thousands of desperate strangers like those poor folks had to in Hurricane Katrina – or be forced to dig through dumpsters like New Yorkers did during Superstorm Sandy. You owe it to them to make sure they&rsquo;ll have all the food they need when they need it… no matter what.</p>
			<p>A free Food 4Patriots 72-hour survival food kit is the ideal way to get started on or add to a survival food stockpile. The regular price is $27.00 plus shipping. But right now it&rsquo;s yours FREE. All we ask is you help cover the low shipping and handling cost.</p>
			<img class="img-responsive pull-left" src="/media/images/f4p/f4p-72-hour-kit-03.jpg" width="400" height="256" alt="Food4Patriots 72 Food Kit Packets">
			<p>Every 72-hour kit contains four servings each of such familiar dishes as Liberty Bell Potato Cheddar Soup, Blue Ribbon Creamy Chicken Rice, Travelers Stew, and the American favorite – Granny&rsquo;s Homestyle Potato Soup. Our survival foods contain no harmful chemicals, GMOs or added MSG. and are prepared with award-winning recipes, so they&rsquo;re loaded with flavor!</p>
			<p>Thanks to advanced Mylar packaging, all our foods are guaranteed to taste as good in 25 years as they do today. You can enjoy your FREE survival food tonight… or 25 years from now! While others are searching for whatever food they can find, your family can be enjoying meals much like those they&rsquo;re eating now.</p>
			<p>Giving away survival food for free has never been done before. And the response to this offer has been overwhelming! Our supply of 72-hour kits that we can give away is rapidly disappearing, so fast action is absolutely necessary to avoid disappointment. Click the big button below now! </p>
			<div class="text-center margin-b-10">
				<button class="btn-3" onclick="$('#firstName').focus();hideVSL();">YES... I Want My FREE Survival Food Kit!</button>
			</div>
		</div>
	</div>
</div>

<div class="container-fluid" style="background-color: #F8F8F8;border: 1px solid #EFEFEF;">
	<div class="container">
		<div class="row" style="padding: 20px 0;">
			<div class="col-sm-12 col-md-6">
				<div class="mock-outer ">
					<div class="mock-inner">
						<div class="fb-group-picrow">
							<img src="/media/images/misc/img-testimonial-diana.jpg">
							<div class="fb-group-text">
								<h5 class="fbh5"><b>Colleen <em>Carter</em></b></h5>
								<span class="fb-group-date">February 11 at 9:15am &#183; <i class="fa fa-user"></i></span>
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
								<span class="fb-group-date">March 15 at 10:08am &#183; <i class="fa fa-user"></i></span>
							</div>
						</div>
						<div class="usertext">
							<p>I now feel very secure in the event of an emergency that might cut off food distribution channels. Also, in the event that our economy crashes (not if, but when… Again, thank you for what you have put together to help folks like me.</p>
						</div>
						<div class="mock-title-cap-text">Like &#183; Comment &#183; Share</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="container-main">
	<div class="container">
		<h2 class="text-center">Frequently Asked Questions</h2>

		<div class="row">
			<div class="col-lg-12">
				<div class="panel-group" id="faqAccordion">
					<div class="panel panel-default">
						<a data-toggle="collapse" data-parent="#faqAccordion" href="#collapseFour">
							<div class="panel-heading">
								<h4 class="panel-title">
									Q: How long will this food last?
								</h4>
							</div>
						</a>
						<div id="collapseFour" class="panel-collapse collapse">
							<div class="panel-body">
								<p>We guarantee a 25 year shelf life for your food. Our food, stored properly never really expires, but after 25 years the nutritional value will slowly start to decline.</p>
							</div>
						</div>
					</div>
					<div class="panel panel-default">
						<a data-toggle="collapse" data-parent="#faqAccordion" href="#collapseFive">
							<div class="panel-heading">
								<h4 class="panel-title">
									Q: Where is this food made?
								</h4>
							</div>
						</a>
						<div id="collapseFive" class="panel-collapse collapse">
							<div class="panel-body">
								<p>Our food is made in an FDA approved and inspected facility right here in the United States. We source US-grown ingredients and the entire food production process happens right here in the good ole US of A!</p>
							</div>
						</div>
					</div>
					<div class="panel panel-default">
						<a data-toggle="collapse" data-parent="#faqAccordion" href="#collapseSix">
							<div class="panel-heading">
								<h4 class="panel-title">
									Q: How will this product be shipped to me and how quickly?
								</h4>
							</div>
						</a>
						<div id="collapseSix" class="panel-collapse collapse">
							<div class="panel-body">
								<p>Due to unprecedented demand, our warehouse is currently processing an extremely large number of shipments. We anticipate being able to ship your order within 7-10 days. Rest assured, we are working hard to get your order out the door to you as quickly as possible!</p>
								<p>We will ship your order directly to your home or office using a premium carrier such as Fed Ex and you will have it within 5 to 7 business days of shipment. Products are shipped from Utah, USA and you will receive an order confirmation email plus a shipment notification email with tracking number once your order ships.</p>
							</div>
						</div>
					</div>
					<div class="panel panel-default">
						<a data-toggle="collapse" data-parent="#faqAccordion" href="#collapseSeven">
							<div class="panel-heading">
								<h4 class="panel-title">
									Q: How long will today's special pricing be available?
								</h4>
							</div>
						</a>
						<div id="collapseSeven" class="panel-collapse collapse">
							<div class="panel-body">
								<p>We are unable to guarantee today’s pricing beyond today. Our pricing often changes due to the constantly changing prices of the high-quality, made-in-the-USA ingredients. Also, the recent attempt by FEMA and DHS to hoard survival food may result in decreased supply throughout the market. To guarantee our lowest pricing, be sure to secure your order today.</p>
							</div>
						</div>
					</div>
					<div class="panel panel-default">
						<a data-toggle="collapse" data-parent="#faqAccordion" href="#collapseEight">
							<div class="panel-heading">
								<h4 class="panel-title">
									Q: What if this product doesn’t work for me?
								</h4>
							</div>
						</a>
						<div id="collapseEight" class="panel-collapse collapse">
							<div class="panel-body">
								<p>While we feel that Food4Patriots is the top-rated product in the emergency food industry, if for any reason at all you are unsatisfied with your purchase, just let us know within 60 days and we will refund 100% of your purchase without question. Plus you are protected with our unprecedented 300% money back guarantee if any of your food goes bad in the next 25 years.</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>
</div>
<div class="container-fluid" style="background-color: #f8f8f8;padding: 20px; border-top: 1px solid #EFEFEF;">
	<div class="row center-block" style="max-width: 980px;">
		<div class="col-sm-3 col-md-3" style="padding-bottom:20px;">
			<!--Norton security/seal-->
			<div class="text-center">
				<table class="text-center center-block" width="135" border="0" cellpadding="2" cellspacing="0" title="Click to Verify - This site chose Symantec SSL for secure e-commerce and confidential communications.">
					<tr>
						<td width="135" align="center" valign="top"><script type="text/javascript" src="https://seal.verisign.com/getseal?host_name=secure.food4patriots.com&amp;size=M&amp;use_flash=NO&amp;use_transparent=NO&amp;lang=en"></script></td>
					</tr>
				</table>
				<!--<img src="/assets/images/checkout/secure-seal-norton.png" style="max-width: 125px;margin-top:10px;" alt="Trust Seals">-->
			</div>
		</div>
		<div class="col-sm-3 col-md-3  text-center" style="padding-top: 20px;">
			<!--honesty online badge-->
			<div>
				<a href="https://honesteonline.com/members/consumerpage.php?company=12046&link=9869" target="_blank"><img src="https://honesteonline.com/HEOSealsNewNoDate/heosealimg.php?company=12046&size=2&link=9869" alt="HONESTe Seal - Click to verify before you buy!" border="0"></a>
			</div>
		</div>
		<div class="col-sm-3 col-md-3 text-center">
			<img src="/assets/images/checkout/secure-seal-made-usa.png" width="91" height="82" alt="Trust Seals" style="margin-top: 6px;">
		</div>
		<div class="col-sm-3 col-md-3 text-center" style="padding-top: 10px;">
			<script src="https://cdn.ywxi.net/js/inline.js?w=120"></script>
			<!--<img src="/assets/images/checkout/secure-seal-mcafee.jpg" width="129" height="59" alt="Trust Seals" style="margin-top: 6px;">-->
		</div>
	</div>
</div>
<script>
	$(document ).ready(function () {
		$("#72hrPopover").popover({
			html:true,
			trigger: "hover",
			title:"72 Hour Kit May Include:",
			content: function() {
				return $("#72hr").html();
			}
		});
	});
	function hideVSL(){
		$("#ctaShipping").css("display", "block");
	}
</script>
<div id="72hr" style="display:none;">
	<img src="/media/images/f4p/f4p-72-hour-kit-03.jpg" style="max-width: 270px;margin-top:10px;" alt="72 Hour Kit">
	<ul class="fa-ul popul">
		<li><i class="fa-li fa fa-caret-right"></i>Liberty Bell Potato Cheddar Soup (4)</li>
		<li><i class="fa-li fa fa-caret-right"></i>Blue Ribbon Cheesy Rice (4)</li>
		<li><i class="fa-li fa fa-caret-right"></i>Traveler's Stew (4)</li>
		<li><i class="fa-li fa fa-caret-right"></i>Granny's Home Style Potato Soup (4)</li>
	</ul>
</div>

<div class="container-fluid">
	<?php $platform->renderCsrModal();?>
</div> <!--end div from opening file-->
<?php
?>
<!-- /main-container -->
<?php
include_once('footer.php');
include_once("chat-olark.php");
?>
<script>
	window.onbeforeunload = grayOut;
	function grayOut(){
		var ldiv = document.getElementById('LoadingDiv');
		ldiv.style.display='block';
	}
</script>
<!-- <?php echo $analyticsObj->serverId; ?> -->
<?php JV::establishClickGoalService(); ?>
</body>
</html>
</div>