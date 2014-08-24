<?php
$firstName = $_SESSION["customerDataArray"]["firstName"];
// SET PRODUCT ID
$_SESSION['productId'] = 164; //please keep as an integer
$_SESSION['quantity'] = '1';
$_SESSION['upsell'] = TRUE; //must stay a boolean
$_SESSION['pageReturn'] = '/checkout/order.php';
include_once("Product.php");
$productDataObj = Product::getProduct($_SESSION["productId"]);
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
          <h1 class="darkRed text-center">&quot;<?php echo $firstName;?>, Double Your Power, Charge 2X Faster…and Protect Yourself From the #1 Most Deadly Threat&quot;</h1>
        </div>
        <div id="videobox" class="hidden-xs">
			<iframe src="//fast.wistia.net/embed/iframe/m1kcfcm5tn?videoFoam=true" allowtransparency="true" frameborder="0" scrolling="no" class="wistia_embed" name="wistia_embed" width="640" height="352"></iframe><script src="//fast.wistia.net/assets/external/iframe-api-v1.js"></script>
		</div>
  <div>
            <p><?php echo $firstName;?>, I&rsquo;d like to personally congratulate you on taking action and getting the state-of-the-art Patriot Power Generator 1500. You&rsquo;re going to absolutely love it and the peace of mind it will give you and your family.          </p>
          <div style="padding-bottom:20px;"><img class="img-responsive center-block"src="/media/images/ppg/ppg-product-platinum-02.jpg" alt="Platinum Package"/></div>
          <p class="text-center">Click the &ldquo;CLICK TO ACCEPT&rdquo; button below.</p>
<div>
        <form action="/checkout/process.php" method="post" accept-charset="utf-8" id="optin-form2">
				<div class="text-center center-block">
					<input type="image" src="/assets/images/buttons/btn-orange-click-accept-01.jpg" name="submit" class=" img-responsive center-block" onClick="ga('send', 'event', 'upsell-1-ppg-platinum-upgrade', 'ppg-platinum-upgrade-accept', 'click-to-accept-bottom');" />
				</div>
				<input type="hidden" name="quantity" id="quantity" value="1">
				<div class="terms">
					<div style="margin-right:5px;float: left;">
                            <input type="checkbox" id="check2" name="check2">
                            <img src="/assets/images/misc/yes_2.jpg" width="74" height="34" alt="Yes">
					</div>
				  <div style="line-height: 1.2;">I want to add the Platinum Upgrade to my order at the 1-time discount sale price of $997.  I will get FREE Shipping with my EMP Bag and Solar Panel (a $100 value) as well as a 365-day guarantee and 3-year extended warranty.</div>
				</div>
                  
                  <div class="text-center" style="margin-top:20px;"><strong>OR</strong></div>
      </form>
                <div class="noThanks">
                <a href="/checkout/oto/ppg-platinum-payments.php" onClick="ga('send', 'event', 'upsell-1-ppg-platinum-upgrade', 'ppg-platinum-upgrade-decline', 'no-thanks-link-bottom');">No Thanks</a> – I want to give up this opportunity.<br>
                I understand that I will not receive this special offer again.
            </div>
            
	</div>
            
            
    
  </div>
    </div>
    

<?php include_once("template-bottom.php"); ?>