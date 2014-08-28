<?php
$firstName = $_SESSION["customerDataArray"]["firstName"];
$billingStateName = $_SESSION["customerDataArray"]["billingStateName"];
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
<!--FORMS-->
	  <div class="container">
		  <div class="row">
			  <div class="col-sm-12 col-md-6">
				  <div class="rcBoxR15-red-dot-border">
					  <form action="/checkout/process.php" method="post" accept-charset="utf-8" id="order-process1">
						  <input name="productId" type="hidden" value="22">
						  <input id="taxState_22" type="hidden" value="<?php echo strtolower($billingStateName);?>">
						  <input id="productData[22]" type="hidden" value="{'productId':22,'price':147,'shipping':0,'originalPrice':197}">
						  <img src="/media/images/f4p/f4p-4-week-kit-02.jpg" alt="4 Week Kit" class="img-responsive center-block" />
						  <ul>
							  <li>140 Servings <a href="#info" id="4wkPopover" rel="popover"  data-placement="bottom" data-toggle="tooltip" class="hidden-xs"><i class="fa fa-info-circle"></i></a></li>
							  <li>$7 Per Day</li>
							  <li><strong>FREE Shipping</strong></li>
							  <li><strong>4 FREE Digital Bonus Reports</strong></li>
						  </ul>

						  <!-- *PRODUCT INFO -->
						  <div id="productInfoOTO">
							  <div class="row">
								  <div class="col-xs-2"><strong>Qty:</strong></div>
								  <div class="col-xs-10">1<input type="hidden" id="quantity_22" name="quantity" value="1"></div>
							  </div>
							  <div class="row">
								  <div class="col-xs-2"><strong>Price:</strong></div>
								  <div id="subTotal_22" class="col-xs-10"></div>
							  </div>
							  <div id="shippingRow_22" class="row">
								  <div class="col-xs-2"><strong>S&amp;H:</strong></div>
								  <div id="shippingAmount_22" class="col-xs-10 show"></div>
							  </div>
							  <div id="taxRow_22" class="row">
								  <div class="col-xs-2"><strong>Tax:</strong></div>
								  <div id="taxAmount_22" class="col-xs-10 show"></div>
							  </div>
							  <div class="row">
								  <div class="col-xs-2"><strong>Total:</strong></div>
								  <div id="totalAmount_22" class="col-xs-10"></div>
							  </div>

						  </div><!-- *PRODUCT INFO -->

						  <div class="text-center center-block">
							  <input type="image" src="/assets/images/buttons/btn-green-add-to-order-01.jpg" name="submit" class=" img-responsive center-block" onClick="" />
						  </div>
					  </form>
				  </div>
			  </div>
			  <div class="col-sm-12 col-md-6">
				  <div class="rcBoxR15-red-dot-border">
					  <form action="/checkout/process.php" method="post" accept-charset="utf-8" id="order-process2">
						  <input name="productId" type="hidden" value="23">
						  <input id="taxState_23" type="hidden" value="<?php echo strtolower($billingStateName);?>">
						  <input id="productData[23]" type="hidden" value="{'productId':23,'price':397,'shipping':0,'originalPrice':497}">
						  <img src="/media/images/f4p/f4p-3-month-kit-02.jpg" alt="3 Month Kit" class="img-responsive center-block" />
						  <ul>
							  <li><strong></strong>450 Servings <a href="#info" id="3mkPopover" rel="popover"  data-placement="bottom" data-toggle="tooltip" class="hidden-xs"><i class="fa fa-info-circle"></i></a></li>
							  <li>$5 Per Day</li>
							  <li><strong>FREE Shipping</strong></li>
							  <li><strong>FREE</strong> Survival Tool <a href="#info" id="toolPopover" rel="popover"  data-placement="bottom" data-toggle="tooltip" class="hidden-xs"><i class="fa fa-info-circle"></i></a></li>
							  <li><strong>FREE</strong> Seed Vault <a href="#info" id="seedsPopover" rel="popover"  data-placement="bottom" data-toggle="tooltip" class="hidden-xs"><i class="fa fa-info-circle"></i></a></li>
							  <li><strong>4 FREE <span class="underline">Hard Copy</span> Bonus Reports</strong></li>
						  </ul>

						  <!-- *PRODUCT INFO -->
						  <div id="productInfoOTO">
							  <div class="row">
								  <div class="col-xs-2"><strong>Qty:</strong></div>
								  <div class="col-xs-10">1<input type="hidden" id="quantity_23" name="quantity" value="1"></div>
							  </div>
							  <div class="row">
								  <div class="col-xs-2"><strong>Price:</strong></div>
								  <div id="subTotal_23" class="col-xs-10"></div>
							  </div>
							  <div id="shippingRow_23" class="row">
								  <div class="col-xs-2"><strong>S&amp;H:</strong></div>
								  <div id="shippingAmount_23" class="col-xs-10 show"></div>
							  </div>
							  <div id="taxRow_23" class="row">
								  <div class="col-xs-2"><strong>Tax:</strong></div>
								  <div id="taxAmount_23" class="col-xs-10 show"></div>
							  </div>
							  <div class="row">
								  <div class="col-xs-2"><strong>Total:</strong></div>
								  <div id="totalAmount_23" class="col-xs-10"></div>
							  </div>

						  </div><!-- *PRODUCT INFO -->

						  <div class="text-center center-block">
							  <input type="image" src="/assets/images/buttons/btn-green-add-to-order-01.jpg" name="submit" class=" img-responsive center-block" onClick="" />
						  </div>
					  </form>
				  </div>
			  </div>
		  </div>
	  </div>
<!--END FORMS-->
            
    
  </div>
    </div>
<script>
	$(document ).ready(function () {
		$("#4wkPopover").popover({
			html:true,
			trigger: 'hover',
			title:"4 Week Kit May Include:",
			content: function() {
				return $('#4wk').html();
			},
		});

	});
	$(document ).ready(function () {
		$("#3mkPopover").popover({
			html:true,
			trigger: 'hover',
			title:"3 Month Kit May Include:",
			content: function() {
				return $('#3mk').html();
			},
		});

	});
	$(document ).ready(function () {
		$("#toolPopover").popover({
			html:true,
			trigger: 'hover',
			title:"11-in-1 Survival Tool",
			content: "<img src=/media/images/ppg/ppg-bonus-tool-01.jpg>"
		});

	});
	$(document ).ready(function () {
		$("#seedsPopover").popover({
			html:true,
			trigger: 'hover',
			title:"Liberty Seed Vault",
			content: function() {
				return $('#lsv').html();
			},
		});

	});
</script>
<script src="/js/set-state-tax-multi-pid.js"></script>
<script>
	setStateTax(22);
	setStateTax(23);
</script>
<div id="4wk" style="display:none;">
	<?php include_once("f4p-product-info-4wk.html"); ?>
</div>
<div id="3mk" style="display:none;">
	<?php include_once("f4p-product-info-3mk.html"); ?>
</div>
<div id="lsv" style="display:none;">
	<?php include_once("f4p-product-info-seeds-bonus.html"); ?>
</div>
<?php include_once("template-bottom.php"); ?>