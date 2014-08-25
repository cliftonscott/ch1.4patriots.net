<?php
$firstName = $_SESSION["customerDataArray"]["firstName"];
// SET PRODUCT ID
$_SESSION['productId'] = 8; //please keep as an integer
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
              <h1 class="darkRed text-center"><?php echo $firstName;?><span class="titles">, Want To Buy 1 More And Get 1 <u>FREE</u>?</span></h1>
            </div>
            <div id="videobox" class="hidden-xs">
                <iframe src="https://fast.wistia.com/embed/iframe/58dp2ujmm4?autoPlay=true&fullscreenButton=false&playButton=false&playbar=false&playerColor=ffffff&smallPlayButton=false&version=v1&videoHeight=360&videoWidth=640" allowtransparency="true" frameborder="0" scrolling="no" class="wistia_embed" name="wistia_embed" width="640" height="360"></iframe>
            </div>
            <div style="padding-bottom:20px;"><img class="img-responsive center-block"src="/media/images/ss4p/ss4p-lsv-bogo-01.jpg" alt="Platinum Package"/></div>
            
            <div>
                <div class="terms">
                    <div style="margin-right:5px;float: left;"><img src="/assets/images/misc/yes-01.jpg" width="74" height="34" alt="Yes"></div>
                    <div style="line-height: 1.2;margin-bottom:30px;">I want to buy one more Liberty Seed Vault and I will <strong>get my 3rd one absolutely FREE</strong>! Plus I’ll get <strong>FREE Shipping &amp; Handling</strong>, FREE Shipment Insurance &amp; Lifetime Warranty Replacement Plan and my 100% Money Back Guarantee will be <strong>extended to 365 days</strong> so there's no risk.</div>
                </div>
                <div class="text-center center-block"> <a href="/checkout/process.php"><img src="/assets/images/buttons/btn-orange-click-accept-01.jpg" class="img-responsive center-block"/></a></div>
                <div class="text-center" style="margin-top:20px;"><strong>OR</strong></div>
                <div class="noThanks">
                    <a href="/checkout/oto/f4p-messenger-trial.php" onClick="">No Thanks</a> – I want to give up this opportunity.<br>
                    I understand that I will not receive this special offer again.
                </div>
                
            </div>           
        
    </div>
</div>
    

<?php include_once("template-bottom.php"); ?>