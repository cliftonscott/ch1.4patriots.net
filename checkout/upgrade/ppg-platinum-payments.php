<?php
$firstName = "Fellow Patriot";
// SET PRODUCT ID
$_SESSION['productId'] = 166; //please keep as an integer
$_SESSION['quantity'] = '1';
$_SESSION['upgrade'] = TRUE;
$_SESSION['pageReturn'] = '/checkout/order.php';
include_once("Product.php");
$productDataObj = Product::getProduct($_SESSION["productId"]);
include_once("template-top.php");
include_once ('template-header.php'); /*Add template-header-nav.php to add top menu*/
?>
<script src="/js/audio.js"></script>

<div class="container-main">
	<div class="breadcrumb1">
	    <a>CHECKOUT</a>
	    <a class="current">ORDER CUSTOMIZATION</a>
	    <a>ORDER CONFIRMATION</a>
	</div>
<div class="container oto-width">
        <div>
			<div>
				<audio id="frankPaymentsAudioSrc" src="/media/audio/ppg-platinum-downsell-audio-01.mp3" preload="auto" autoplay></audio>
			</div>
			<img id="frankPaymentsAudioControl" class="audioControl" style="float:left;" src="/assets/images/misc/speaker_off.gif" onclick="toggleAudio('frankPayments');">
				<h1 class="darkRed text-center">Was It The Price?</h1>
		</div>        
        <div>
          <p>Hey there Friend...hold up just a minute, would you?</p>
            <p>I&rsquo;ve had some concerned Patriots contact me to let me know they really, really want to get maximum power and protection for their Patriot Power Generator 1500 with my Platinum Upgrade option.</p>
            <div><img class="img-responsive center-block"src="/media/images/ppg/ppg-product-platinum-01.jpg" alt="Platinum Package"/></div>
            <p>With all the turmoil hitting our country left and right, they know time is short to get prepared.<br>
              Trouble is, even the deeply discounted price is just a bit too much of a stretch money-wise.</p>
            <p>Friend, I know exactly how they feel. Maybe this is what you&rsquo;re thinking, too.</p>
            <p>Because I am determined to help as many families as I possibly can with this offer, I am going to do something a little...well, crazy, to be perfectly blunt.<br>
              <br>
              Even though it&rsquo;s going to cost me more in the short run, I&rsquo;m going to offer you a payment arrangement that will take the stress out of upgrading to the Platinum system. </p>
            <p><strong><em>For today only, I&rsquo;ll cut your Platinum Upgrade payment down by half…</em></strong></p>
            <p><strong><em>You&rsquo;ll get the exact same Platinum Upgrade as you saw on the previous page (which includes the additional solar panel and EMP Bag) for just $497 today, and one more payment of $497 in a month, 30 days from now.</em></strong>              </p>
            <p>No interest, no hidden fees, no games.</p>
            <p>So if it&rsquo;s just the price holding you back from offering your family the ultimate in portable, reliable power and protection, now&rsquo;s your chance to put your fears to rest. </p>
          <p>Listen, I know times are tough. I&rsquo;ve faced quite a few of those &ldquo;downturns&rdquo; myself. We&rsquo;ve all got to take care of our families. Now you can do that with my very simple payment plan.</p>
          <p>I trust you, Friend. I know you just need a little breathing room. So, that&rsquo;s what I&rsquo;m offering with this one-time payment plan – you can upgrade to the Patriot Power Generator 1500 Platinum Package with just one payment of $497 today and one more in thirty days. Simple. Honest. </p>
            <p>No tricks or fine print.</p>           
            <p><strong><em>Go ahead and click the &ldquo;CLICK TO ACCEPT&rdquo; button now, so I can ship you your Platinum Upgrade of a full size solar panel and state-of-the-art EMP bag today, while I still have them available.</em></strong></p>         
            <p>Do it now – your family is counting on you to be their shelter from the storm.
            </p>
            
            <div>
                <form action="/checkout/order.php" method="post" accept-charset="utf-8" id="optin-form">
				<div class="text-center center-block">
					<input type="image" src="/assets/images/buttons/btn-orange-click-accept-01.jpg" name="submit" class=" img-responsive center-block" onClick="patriotTrack('no-payments-6-months');"/>
				</div>
				<input type="hidden" name="quantity" id="quantity" value="1">
                  
                  <div class="text-center" style="margin-top:20px;"><strong>OR</strong></div>
                </form>
                <div class="noThanks">
                <a href="/checkout/thankyou.php" onclick="patriotTrack('no-thanks-link');">No Thanks</a> – I want to give up this opportunity.<br>
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