<?php
$firstName = $_SESSION["customerDataArray"]["firstName"];
// SET PRODUCT ID
$_SESSION['productId'] = 39; //please keep as an integer
$_SESSION['quantity'] = '1';
$_SESSION['upsell'] = TRUE; //must stay a boolean
$_SESSION['pageReturn'] = '/checkout/order.php';
include_once("Product.php");
$productDataObj = Product::getProduct($_SESSION["productId"]);
include_once("template-top.php");
include_once ('template-header.php'); /*Add template-header-nav.php to add top menu*/
?>
<script language="javascript">
    $(document).ready(function() {

		$("#optin-form1").validate({
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
		
		$("#optin-form2").validate({
    		rules: {
    			check2: {
					required: true
    			},
  			},
  			messages: { 
		  check2: '<div class="warning-check"></div>',
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
		<h1 class="darkRed text-center"><?php echo $firstName;?>, Get 8 FREE Gifts + 1st Issue Of Patriot Alliance FREE?</h1>
	</div>
	<div><h4 class="text-center">Get <strong><u>8 FREE GIFTS</u></strong> When You Try <em>Patriot Alliance</em> <strong><u>FREE</u></strong> For 30 Days!</h4></div>
    <div>
    	<img class="img-responsive center-block"src="/media/images/pa/pa-messenger-03.jpg" alt="Patriot Alliance Messenger"/>
    	<p class="caption text-center center-block" style="max-width:500px;padding-bottom:20px;"><em>Get your 1st issue of the brand-new Patriot Alliance printed newsletter for FREE plus 8 FREE bonus gifts valued over $200.00 when you accept this special offer today!</em></p>
    </div>
    
    
	<div>
			<p><?php echo $firstName;?>, the Patriot Alliance is my brand-new printed newsletter – your own &ldquo;mini-survival guide&rdquo; printed in full-color and delivered right to your mailbox.</p>
            <p>It&rsquo;s awesome and I want to get it in your hands right away, even if I have to bribe the heck outta you with a bunch of free gifts. </p>
            <p>You get your 1st issue of the brand-new Patriot Alliance printed newsletter for FREE… plus get 8 FREE bonus gifts valued over $200… when you accept this special offer today!</p>
    
    <div class="margin-tb-20">
		<form action="/checkout/process.php" method="post" accept-charset="utf-8" id="optin-form1">
			<div class="text-center center-block">
				<input type="image" src="/assets/images/buttons/btn-orange-click-accept-01.jpg" name="submit" class="img-responsive center-block" onClick="_gaq.push(['_trackEvent', 'upsell3-alliance', 'alliance-trial-buy', 'click-to-accept-top',19.95, false]);"/>
			</div>
				<input type="hidden" name="quantity" id="quantity" value="1">
			<div class="terms">
				<div style="margin-right:5px;float: left;">
					<input type="checkbox" id="check1" name="check1">
					<img src="/assets/images/misc/yes-01.jpg" width="74" height="34" alt="Yes">
				</div>
				<div style="line-height: 1.2;"><span style="position:relative;text-align:left;margin-top:10px;width:600px;margin-right:auto;margin-left:auto;"> I understand and agree that after my FREE 30 day trial I will be charged $19.95 monthly until I cancel my subscription.</span></div>
			</div>
		</form>
    </div>
    
    <p>If the free 1st issue isn&rsquo;t enough to have you clicking on the big orange &ldquo;Click To Accept&rdquo; button, then these EIGHT free gifts worth over $200 will surely do the trick:</p>
    <p><span class="brightBlue"><strong>Bonus 1:</strong></span><strong> Patriot Alliance Collector Album ($20 value)</strong> -- This custom-embossed collector album is the perfect solution to protect and store your newsletters.</p>
    <p><span class="brightBlue"><strong>Bonus 2:</strong></span><strong> Patriot Alliance 11-in-1 Survival Tool ($20 value)</strong> -- A handy and fully functional 11-in-1 survival tool made of durable Stainless Steel that fits into your wallet and may save your life some day.</p>
    <p><span class="brightBlue"><strong>Bonus 3:</strong></span><strong> &ldquo;How to Hide Your Guns and Other Valuables&rdquo; Report ($27 Value)</strong> -- Discover the best techniques and locations for hiding your guns and valuables from all kinds of thieves... including Big Brother.</p>
    <p><span class="brightBlue"><strong>Bonus 4:</strong></span><strong> &ldquo;Retirement Security Secrets Revealed&rdquo; Report ($27 Value)</strong> -- Great tips and tricks that will allow you to amass enough of a nest egg to secure your retirement... even if you&rsquo;re starting late like me, or even if you&rsquo;re starting from zero like millions of other Baby Boomers.</p>
    <p><span class="brightBlue"><strong>Bonus 5:</strong></span><strong> &ldquo;The Government Is Spying on You&rdquo; Report ($27 Value) </strong>-- This report exposes the secret technologies the NSA is using to uncover private details of your personal life and how to protect yourself.</p>
    <p><span class="brightBlue"><strong>Bonus 6:</strong></span><strong> &ldquo;Surviving Obamacare&rdquo; Report ($27 Value)</strong> -- Get the knowledge you need to survive the rapid decline in our healthcare you&rsquo;re soon going to experience as soon as incompetent bureaucrats take over the management of our public healthcare system.</p>
    <p><span class="brightBlue"><strong>Bonus 7:</strong></span><strong> &ldquo;Prepping for Pets&rdquo; Report ($27 Value)</strong> -- Get a detailed checklist of everything you need to have on hand during a crisis to make sure all your pet&rsquo;s needs are covered. </p>
    <p><span class="brightBlue"><strong>Bonus 8:</strong></span><strong> Off Grid Living DVD ($19.95 Value)</strong> -- In this 75-minute DVD you&rsquo;ll get your very own one-on-one walk-through of a completely off-the-grid household so you can do the same thing.</p>
    <img class="img-responsive center-block margin-tb-20"src="/media/images/pa/pa-value-chart-01.jpg" alt="Patriot Alliance Messenger"/>
    <p>WHEW! That’s a lot of goodies... and you get it all FREE when you try the brand-new Patriot Alliance printed newsletter for FREE. It's just $19.95 per month thereafter.</p>
    <p>Get your 1st newsletter plus the 8 bonus gifts before they&rsquo;re gone – click the big orange &ldquo;Click To Accept&rdquo; button below. </p>
            
	<div>
		<form action="/checkout/process.php" method="post" accept-charset="utf-8" id="optin-form2">
			<div class="text-center center-block">
				<input type="image" src="/assets/images/buttons/btn-orange-click-accept-01.jpg" name="submit" class=" img-responsive center-block" onClick="_gaq.push(['_trackEvent', 'upsell3-alliance', 'alliance-trial-buy', 'click-to-accept-button',19.95, false]);" />
			</div>
				<input type="hidden" name="quantity" id="quantity" value="1">
			<div class="terms">
				<div style="margin-right:5px;float: left;">
					<input type="checkbox" id="check2" name="check2">
					<img src="/assets/images/misc/yes-01.jpg" width="74" height="34" alt="Yes">
				</div>
				<div style="line-height: 1.2;"><span style="position:relative;text-align:left;margin-top:10px;width:600px;margin-right:auto;margin-left:auto;"> I understand and agree that after my FREE 30 day trial I will be charged $19.95 monthly until I cancel my subscription.</span></div>
			</div>
                  
			<div class="text-center" style="margin-top:20px;"><strong>OR</strong></div>
	  </form>
	  <div class="noThanks">
		<a href="/checkout/thankyou.php" onClick="_gaq.push(['_trackEvent', 'upsell3-alliance', 'alliance-trial-decline', 'no-thanks-link',0, false]);">No Thanks</a> – I want to give up this opportunity.<br>
                I understand that I will not receive this special offer again.
            </div>
            
	</div>                       
    
  </div>
</div>
    

<?php include_once("template-bottom.php"); ?>