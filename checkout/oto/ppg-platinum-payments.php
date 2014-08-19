<?php
$firstName = $_SESSION["customerDataArray"]["firstName"];
// SET PRODUCT ID
$_SESSION['productId'] = 166; //please keep as an integer
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
				<audio id="frankPaymentsAudioSrc" src="/media/audio/ppg-platinum-downsell-audio-01.mp3" preload="auto"></audio>
			</div>
			<img id="frankPaymentsAudioControl" class="audioControl" style="float:left;" src="/assets/images/misc/speaker_off.gif" onclick="toggleAudio('frankPayments');">
				<h1 class="darkRed text-center">Was It The Price?</h1>
		</div>        
        <div>
          <p><?php echo $firstName;?>, I&rsquo;ve had some concerned Patriots contact me to let me know they really, really want to get maximum power and protection for their Patriot Power Generator 1500 with my Platinum Upgrade option.</p>
          <p>The only reason they didn't is because of the price. I don't think price should EVER get in the way of your family's security.</p>
<p>So here's the deal - I'm offering you a payment plan on the Platinum Upgrade... just $497 today plus $497 in 30 days. It's the exact same Platinum Upgrade you saw on the previous page, and I'll ship it to you right away (I know you're good for the additional payment).</p>
            <div><img class="img-responsive center-block"src="/media/images/ppg/ppg-product-platinum-01.jpg" alt="Platinum Package"/></div>
            <div class="text-center"><h2 class="darkRed">$497 Today Plus $497 In 30 Days.</h2></div>
            <div>
                <form action="/checkout/process.php" method="post" accept-charset="utf-8" id="optin-form">
				<div class="text-center center-block">
					<input type="image" src="/assets/images/buttons/btn-orange-click-accept-01.jpg" name="submit" class=" img-responsive center-block" onClick="ga('send', 'event', 'downsell-1-ppg-platinum-2-payments', 'ppg-platinum-2-payments-accept', 'click-to-accept-bottom');"/>
				</div>
				<input type="hidden" name="quantity" id="quantity" value="1">
				<div class="terms">
					<div style="margin-right:5px;float: left;">
                            <input type="checkbox" id="check1" name="check1">
                            <img src="/assets/images/misc/yes_2.jpg" width="74" height="34" alt="Yes">
					</div>
					<div>I want to add the Platinum Upgrade to my order at the 1-time discount sale price of $497 today and $497 in 30 days. I will get FREE Shipping with my EMP Bag and Solar Panel.</div>
				</div>
                  
                  <div class="text-center" style="margin-top:20px;"><strong>OR</strong></div>
                </form>
                <div class="noThanks">
                <a href="/checkout/oto/ppg-1year.php" onClick="ga('send', 'event', 'downsell-1-ppg-platinum-2-payments', 'ppg-platinum-2-payments-decline', 'no-thanks-link-bottom');">No Thanks</a> – I want to give up this opportunity.<br>
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