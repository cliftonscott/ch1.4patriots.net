<?php
$firstName = $_SESSION["customerDataArray"]["firstName"];
// SET PRODUCT ID
$_SESSION['productId'] = 120; //please keep as an integer
$_SESSION['quantity'] = '1';
$_SESSION['upsell'] = TRUE; //must stay a boolean
$_SESSION['pageReturn'] = '/checkout/order.php';
include_once("Product.php");
$productDataObj = Product::getProduct($_SESSION["productId"]);
include_once("template-top.php");
include_once ('template-header.php'); /*Add template-header-nav.php to add top menu*/
?>
<script src="/js/audio.js"></script>
<script language="javascript">
    $(document).ready(function() {

		$("#optin-form").validate({
    		rules: {
    			check1: {
					required: true
    			},
  			},
  			messages: { 
		  check1: '<div class="warning-check"></div>',
        },
		submitHandler: function(form) {
		 //optIn(); 
		 form.submit();
		}
    	});
		
	});
</script>
<div class="container-main">
	<div class="breadcrumb1">
	    <a>CHECKOUT</a>
	    <a class="current">ORDER CUSTOMIZATION</a>
	    <a>ORDER CONFIRMATION</a>
	</div>
<div class="container oto-width">
			<div>
				<div>
					<audio id="frankPaymentsAudioSrc" src="/media/audio/f4p-3pay.mp3" preload="auto" autoplay></audio>
				</div>
                <img id="frankPaymentsAudioControl" class="audioControl" style="float:left;" src="/assets/images/misc/speaker_off.gif" onclick="toggleAudio('frankPayments');">
				<h1 class="darkRed text-center">Was It The Price?</h1>
			</div>
			<div>
				<p><?php echo $preFill["firstName"];?>, people often email me, letting me know they want to grab their 1-Year Food4Patriots kit (before it's too late). The only reason they didn't is because of the price. I don't think price should EVER get in the way of your family's security.</p>
			    <p>So here's the deal... I'm offering you a payment plan on the 1-Year Food4Patriots kit... just $597 today plus 2 more monthly payments of $597. It's the exact same kit, and I'll ship it to you right away (I know you're good for the 2 additional payments).</p>
				<div class="text-center" style="margin-top:20px;"><img class="img-responsive center-block" src="/media/images/f4p/1-year-tote-06.jpg"  alt="1 Year Kit"></div>
				<div class="text-center "><h2 class="darkRed title-max-560 center-block">$597 Today Plus 2 Monthly Payments Of $597 Later</h2></div>
			</div>    
			<div>
                <form action="/checkout/process.php" method="post" accept-charset="utf-8" id="optin-form">
				<div class="text-center center-block">
					<input type="image" src="/assets/images/buttons/btn-orange-click-accept-02.jpg" name="submit" class="1yrupp img-responsive center-block" onClick="ga('send', 'event', 'downsell-2-f4p-1-yr-kit-3-payments', 'f4p-1-yr-kit-3-payments-accept', 'click-to-accept-bottom');"/>
				</div>
				<input type="hidden" name="quantity" id="quantity" value="1">
				<div class="terms">
					<div style="margin-right:5px;float: left;">
                            <input type="checkbox" id="check1" name="check1">
                            <img src="/assets/images/misc/yes_2.jpg" width="74" height="34" alt="Yes">
					</div>
					<div>I want to add the 1 Year Food4Patriots Kit to my order at the 1-time discount sale price of $597 today plus two more payments of $597 30 days apart. I will get FREE Shipping and 27 FREE Bonus Gifts including 4 of the  super-popular Lifestraw Personal Water Filters and over 22,000+ heirloom survival seeds.</div>
				</div>
                  
                  <div class="text-center" style="margin-top:20px;"><strong>OR</strong></div>
                </form>
                <div class="noThanks">
                    <a href="/checkout/thankyou.php" onClick="ga('send', 'event', 'downsell-2-f4p-1-yr-kit-3-payments', 'f4p-1-yr-kit-3-payments-decline', 'no-thanks-link-bottom');">No Thanks</a> – I want to give up this opportunity.<br />
                        I understand that I will not receive this special offer again.
                </div>
            
			</div>

	</div>
</div>
<script>
	$(document ).ready(function () {
	if(isMobile() === false) {
		toggleAudio('frankPayments');
	}
});
</script>
<?php include_once("template-bottom.php"); ?>