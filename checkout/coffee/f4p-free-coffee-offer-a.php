<?php
/*
 * use session soldout multidimensional array to indicate sold out conditions and associated
 * variables
 */
$template["floatingTimer"] = 0; //minutes to pass to the timer / will not display if not greater than zero
$template["formType"] = "customerForm"; //designates that this is a form using customer-form.php as included form
// SET PRODUCT ID
// THIS IS SET TO THE 3 MONTH KIT FOR DEFAULT
$_SESSION['productId'] = 194; //please keep as an integer
$_SESSION['quantity'] = 1;
$maxQuantity = 3;
include_once("Product.php");
$productObj = new Product();

$submitButtonSource = "/assets/images/buttons/btn-rush-free-coffee-01.png";

$productDataObj = $productObj->getProduct($_SESSION["productId"]);
$funnelData = $productObj->initFunnel("checkout");

//include template top AFTER the product information is set
include_once ('template-top.php');
$platform->setCsrOrderFormUrl("/checkout/coffee/f4p-free-coffee-offer-a.php");
?>
<?php include_once ('template-header.php'); /*Add template-header-nav.php to add top menu*/?> 

<div class="container-main">

<div class="container">

	<div class="row">
        <div class="col-sm-6 col-sm-push-6 col-md-7 col-md-push-5 nopadding">
    		<div style="padding-top: 0px; padding-right:20px;">
                <div class="row">
                	<div class="col-lg-12">
                    	<h2 class="red21 text-center nomargin"><strong>WARNING: Free Survival Coffee<br>Is Almost Gone...</strong></h2>
                	</div>
                	<div class="col-lg-12 text-center center-block hidden-xs" style="max-width:80%;float:none !important;">
		                <script type="text/javascript" src="//reboot.evsuite.com/player/RnJlZUNvZmZlZVZTTC1UaW1teTIgQ09NUFJFU1NFRC5tcDQ=/?responsive=1&autoResponsive=1&container=evp-HP2L5FX5DZ"></script><div id="evp-HP2L5FX5DZ" data-role="evp-video" data-evp-id="RnJlZUNvZmZlZVZTTC1UaW1teTIgQ09NUFJFU1NFRC5tcDQ="></div>              </div>
                    <div class="col-lg-12 margin-b-10 coffee-checkout">
						<p>This is no ordinary coffee - this is 100% pure, 100% GMO Free, 100% Colombian and 100% Arabica coffee harvested at the very peak of freshness!</p>
						<p>  Get your 30 pouches (30 FULL Servings) <strong>FREE</strong> (just cover shipping + handling) while supplies last! Here’s exactly what you’ll get:</p>
						<ul>
                            <li>30 full servings of this delicious coffee packed in a special triple-layered, re-sealable, re-usable Mylar packet designed to significantly increase the shelf life of your survival coffee!</li>
                            <li>A full 25-year guaranteed shelf life unequalled and unmatched by any other survival coffee</li>
                            <li>Processed at the peak of freshness for a robust and incredible flavor</li>
                            <li>Shipped right to your door via USPS 1st Class Mail.</li>
						</ul>
						<strong>Regularly priced at $9.95, FREE while supplies (just cover shipping + handling) –</strong> claim your coffee before someone else does!
					</div>
                    <div class="col-lg-12 text-center hidden-xs">
                    	<img src="/assets/images/buttons/btn-order-now-orange-left-01.png" alt="Frank" class="img-responsive center-block">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-sm-pull-6 col-md-5 col-md-pull-7">
            <?php include_once ('customer-form.php'); ?>
        </div>
	</div>
	<div style="padding-top:40px;">
	<div class="row">
		<div class="col-sm-6 col-md-6"><img class="img-responsive center-block" src="/media/images/f4p/f4p-testimonials-18.jpg" /></div>
		<div class="col-sm-6 col-md-6"><img class="img-responsive center-block" src="/media/images/f4p/f4p-testimonials-19.jpg" /></div>
	</div>
</div>
	<div class="center">
		<div>
			<div class="references">
				<p>Research References</p>
				<p style="font-size: 12px; line-height:1.25;">
					1. <em>Harvard School of Public Health.</em> “Coffee By the Numbers.” 2010.<br>
					2. Fernau, <em>USA Today.</em> “Coffee Grinds Fuel for the Nation.” 2013. <br>
					3.  National Coffee Association. “2014 National Coffee Drinking Trends.” 2014.<br>
					4. Nagourney, <em>The New York Times.</em> “Vital Signs: Aging; A Pick-Me-Up for Sagging Mental Acuity.” 2002.<br>
					5. Ferdman, <em>The Washington Post.</em> “Almost Half of the World Actually Prefers Instant Coffee.” 2014.<br>
					6. Baldwin, <em>The Atlantic.</em> “Arabica vs. Robusta: No Contest.” 2009.<br>
					7. Grush, <em>Fox News.</em> “Increasing Daily Coffee Consumption May Protect Against Type 2 Diabetes.” 2014.<br>
					8. Arnette, <em>The National Institutes of Health (NIH).</em> “Coffee May Boost Learning Potential.” 2012.<br>
					9. Kilmas, <em>The Blaze.</em> “Is Coffee Good or Bad for You?” 2014.
			</div>
		</div>

		<table width="70%" style="margin-right:auto;margin-left:auto;margin-bottom:20px;">
			<tr style="text-align:center;">
				<td><a name="trustlink" href="http://secure.trust-guard.com/security/8491" rel="nofollow" target="_blank" onclick="var nonwin=navigator.appName!='Microsoft Internet Explorer'?'yes':'no'; window.open(this.href.replace(/https?/, 'https'),'welcome','location='+nonwin+',scrollbars=yes,width=517,height='+screen.availHeight+',menubar=no,toolbar=no'); return false;" oncontextmenu="var d = new Date(); alert('Copying Prohibited by Law - This image and all included logos are copyrighted by trust-guard \251 '+d.getFullYear()+'.'); return false;"><img name="trustseal" alt="Security Seals" style="border: 0;" src="//dw26xg4lubooo.cloudfront.net/seals/security/8491-large.gif" /></a></td>
				<td>  <a href="https://honesteonline.com/members/consumerpage.php?company=12046&link=9869"
						 target="_blank"><img src="https://honesteonline.com/HEOSealsNewNoDate/heosealimg.php?company=12046&size=2&link=9869"
											  alt="HONESTe Seal - Click to verify before you buy!" border="0"></a></td>
				<td><img src="/assets/images/checkout/trustseals-usa-01.gif" width="110" height="82" alt="Made In The USA"></td>
			</tr>
		</table>
	</div>
   
</div>
	</div>
<?php
include_once("template-bottom.php");
?>