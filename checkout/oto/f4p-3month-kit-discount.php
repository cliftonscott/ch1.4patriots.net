<?php
// was f4p-oto-c.php 
$firstName = $_SESSION["customerDataArray"]["firstName"];
// SET PRODUCT ID
$_SESSION['productId'] = 23; //please keep as an integer
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
          <h1 class="darkRed text-center">&quot;<?php echo $firstName;?>, Please Accept This $100 Discount On An Additional 3 Month Kit...&quot;</h1>
        </div>
        <div style="padding-bottom:20px;"><img class="img-responsive center-block"src="/media/images/f4p/f4p-3-month-kit-01.jpg" alt="3 Month Kit"/></div>
		<div>
			<p><?php echo $firstName;?>, one more thing... The folks in our warehouse have reserved your 3-Month Food4Patriot kit and are already busy getting it ready to ship to you.</p>
            <p>I understand a 1-Year Kit may be too much for you right now, so how about one more 3 Month Kit for $100.00 off?</p>
			<p>We can offer you this special 1-time offer because the folks in our warehouse are already busy getting your order ready for shipment and it's easy for them to add another 3-Month kit to your package.</p>
            <p>I want to do everything I can to help you build your food stockpile as quickly and easily as possible, so to thank you for becoming a customer today, I am offering you an exclusive $100.00 discount on another 3-Month Food4Patiots Kit if you act now. That drops the price to only $397 (plus you'll get Free Shipping plus all the other Free bonuses included with the 3 Month Kit).</p>
            <p><?php echo $firstName;?>, please accept this opportunity to get an additional 3-Month Food4Patriots Kit for only $397 and save $100 today.          Just click on the big orange "Click To Accept" button below.</p>
		
        <div>
			<div class="text-center">
				<a href="/checkout/process.php" title="Add to Order!" onClick="patriotTrack('click-to-accept-bottom');"><img class="img-responsive center-block" src="/assets/images/buttons/btn-orange-click-accept-01.jpg" alt="Buy It Now!" border="0" /></a>
			</div>
			<div class="text-center" style="margin-top:20px;"><strong>OR</strong></div>
		  
			<div class="noThanks">
  				<a href="/checkout/thankyou.php" onClick="patriotTrack('no-thanks-link');">No Thanks</a> – I want to give up this opportunity.<br>
                I understand that I will not receive this special offer again.
            </div>   
		</div>   
            
		</div>
</div>
    
<?php include_once("template-bottom.php"); ?>