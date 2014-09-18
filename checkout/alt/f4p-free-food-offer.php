<?php
/*
 * use session soldout multidimensional array to indicate sold out conditions and associated
 * variables
 */
//$_SESSION["soldout"]["flag"] = false; //this is the primary trigger
//$_SESSION["soldout"]["audio"] = null;
//$_SESSION["soldout"]["waitlist"] = false;
if($_SESSION["soldout"]["flag"] !== true) {
	$template["floatingTimer"] = 20; //minutes to pass to the timer / will not display if not greater than zero
} else {
	$template["floatingTimer"] = 0; //minutes to pass to the timer / will not display if not greater than zero
}


$template["formType"] = "customerForm"; //designates that this is a form using customer-form.php as included form
// SET PRODUCT ID
// THIS IS SET TO THE 3 MONTH KIT FOR DEFAULT
$_SESSION['productId'] = 27; //please keep as an integer
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
        <div class="col-sm-6 col-md-5">
            <?php include_once ('customer-form.php'); ?>
        </div>
        <div class="col-sm-6 col-md-7 nopadding">
    		<div class="container">
                <div class="row">
                	<div class="col-lg-12">
                    	<h2 class="red21 text-center nomargin"><strong>WARNING: Free Survival Food Is Almost Gone...</strong></h2>
                	</div>
                	<div class="col-lg-12 text-center">
                    	<iframe name="wistia_embed" width="426" height="240" src="https://fast.wistia.net/embed/iframe/looj1an302?autoPlay=true&amp;fullscreenButton=false&amp;playButton=false&amp;playbar=false&amp;playerColor=ffffff&amp;smallPlayButton=false&amp;version=v1&amp;videoHeight=240&amp;videoWidth=426" allowtransparency="true" frameborder="0" scrolling="no"></iframe>
                    </div>
                    <div class="col-lg-12">
						<p>This isn&rsquo;t ordinary food... this is delicious, nutritious, good for 25 years &ldquo;super survival food&rdquo; that could literally save your life in a disaster! <br>
                        <br>
                        Get 4 full servings of <em>Frank's 5-Star Minestrone</em> rated for up to 25 years of long-term storage <strong>FREE</strong> (just cover postage) while supplies last! Here&rsquo;s exactly what you&rsquo;ll get:</p>
						<ul>
                            <li>&ldquo;Disaster-Proof packing&rdquo;… a military-grade Mylar pouch keeps out air, moisture and light to keep your food nutritionally sound and tasting great for up to 25 years</li>
                            <li>Instantly protects you and your family from going hungry in a disaster… store in your home, car, office or give to a friend or family member</li>
                            <li>Simple to prepare -- just add boiling water, simmer &amp; serve in about 15 min</li>
                            <li>Rushed right to your door via USPS 1st Class Mail </li>
						</ul>
						<strong>Regularly priced at $9.95, today it&rsquo;s FREE while supplies (limit 1 per household, just cover postage)&nbsp;&nbsp;--&nbsp;</strong>get yours right now before they&rsquo;re gone! 
					</div>
                    <div class="col-lg-12 text-center">
                    	<img src="/assets/images/buttons/btn-order-now-green-left-01.png" alt="Frank" class="img-responsive center-block">
                    </div>
                </div>
            </div>
        </div>
	</div>
  
  <div class="guaranteeBox">
            <p><img src="/assets/images/checkout/satisfaction-seal-02.png" alt="Frank" width="150" height="180" class="img-responsive pull-left"><strong><span class="brightBlue">Guarantee #1:</span></strong> This is a <strong>100% money back guarantee</strong>. No questions asked. If for any reason, you&rsquo;re not satisfied with your Food4Patriots kit, just return it within 60 days of purchase and I&rsquo;ll refund 100% of your purchase.            </p>
            <p>&nbsp;</p>
            <p><strong><span class="brightBlue">Guarantee #2:&nbsp;</span></strong>This is an unheard of 300% money back guarantee. It&rsquo;s in addition to guarantee #1.&nbsp;If you open any of your Food4Patriots meals anytime&nbsp;<strong>in the next 25 years</strong>&nbsp;and find that your food has spoiled, you can return your entire Food4Patriots stockpile and I will&nbsp;<strong>triple</strong>&nbsp;your money back!</p>       
  			<div class="clearfix"></div>
  </div>
  
  <hr>
   
</div> 

<?php include_once ('template-bottom.php'); ?>
