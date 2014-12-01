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
include_once("Product.php");
//creates a product object that is available from every template
$productDataObj = Product::getProduct($_SESSION["productId"]);
//include template top AFTER the product information is set
include_once ('template-top.php');
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
                	<div class="col-lg-12 text-center center-block hidden-xs" style="max-width:80%;">
                    	<iframe src="//fast.wistia.net/embed/iframe/looj1an302?videoFoam=true" allowtransparency="true" frameborder="0" scrolling="no" class="wistia_embed" name="wistia_embed" allowfullscreen mozallowfullscreen webkitallowfullscreen oallowfullscreen msallowfullscreen width="640" height="360"></iframe><script src="//fast.wistia.net/assets/external/iframe-api-v1.js"></script>
                    </div>
                    <div class="col-lg-12 margin-b-10">
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
	<div class="center">
		<div>
			<div style="color: #767676; font-style: normal; padding-left:50px;padding-right:50px;text-align:left;max-width:600px;margin-right:auto;margin-left:auto;margin-top:20px;">
				<p>Research References</p>
				<p style="font-size: 12px;">1. <em>Rutgers University.</em> “Reviving the Jersey Tomato.” 2014.<br>
					2. <em>Moskin, The New York Times</em>. “The Return of a Lost Jersey Tomato.” 2008.<br>
					3.<em> Dazio, North Jersey.</em> “Rutgers Team Works to Revive History's Sweet Jersey Tomato.” 2013.<br>
					4. <em>New Jersey Agricultural Experiment Station.</em> “What About the ‘Rutgers’ Tomato?” 2013.<br>
					5.<em> Daily Kos.</em> “Will The Real Rutgers Tomato Please Stand Up?” 2012.<br>
					6. <em>Urban Farmer.</em> “Rutger Tomato Seeds.” 2014.<br>
					7. <em>Span, New Jersey Monthly.</em> “Born Again: Rebirth of the Jersey Tomato.” 2014. <br>
				</p>
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
<?php include_once ('../../templates/footer.php'); ?>