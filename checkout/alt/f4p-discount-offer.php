<?php
$firstName = $_SESSION["customerDataArray"]["firstName"];
$billingStateName = $_SESSION["customerDataArray"]["billingStateName"];
// SET PRODUCT ID
$isUpgrade = TRUE;
$template["formType"] = "customerForm";

$_SESSION['quantity'] = '1';
$_SESSION['upsell'] = TRUE; //must stay a boolean
$_SESSION['pageReturn'] = '/checkout/order.php';
$_SESSION['3mDiscountSkip'] = TRUE; // Redirects If Already Offered 3 Month Discount
include_once("Product.php");
//creates a product object that is available from every template
$productObj = new Product();
$productDataObj = Product::getProduct($_SESSION["productId"]);
$funnelData = $productObj->initFunnel("checkout");

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
			<h1 class="darkRed text-center">We Want You Back... Get Up To $100.00 Off Food4Patriots Plus FREE Shipping With This One-Time Offer!</h1></div>
			<div>
				<p>Welcome back! You visited my site recently but you left before completing your purchase. </p>
				<p>I still really want you to help you get your food stockpile, protect your family and be more secure in these uncertain times. So as a <strong>special one-time offer that is only valid while you are on this page, you can get Food4Patriots for up to $100.00 off, plus get FREE Shipping and up to 6 FREE Bonus Gifts.</strong></p>
				<div style="padding-bottom:20px;">
					<h2 class="darkRed text-center">Here Are 3 Reasons Why You Need To Get Food4Patriots Right Now...</h2>
					<p><strong><span class="numberCircle">1</span> You Need More Food To Protect You And Your Family </strong></p>
					<p>You need more food to feed your family if a natural disaster like Katrina or Sandy hits... if a terrorist attack prevents trucks from hauling food… or if a panicked mob loots the grocery stores... By stocking up on non-perishable food now, not only you will have your own &ldquo;food insurance policy&rdquo; no matter what happens, you&rsquo;ll have enough to share with friends and loved ones so they can experience the same peace of mind.</p>
					<p><strong><span class="numberCircle">2</span> You Can Barter Your Food In Times Of Crisis</strong></p>
					<p>In a time of crisis, your food will be literally more valuable than gold and you will be able to barter your extra food for whatever you need. When the crisis hits, stores will shut down, farmers won&rsquo;t be able to feed their livestock, urban mobs will riot. Food will be incredibly valuable. Look at what happened in Germany after World War 1, when a pound of bread cost 3 BILLION marks! </p>
					<p><strong><span class="numberCircle">3</span> You Save Another $100.00 And Get FREE Shipping </strong></p>
					<p>You will get the best deal we have ever offered (and may never offer again) if you act now! It&rsquo;s a one-time discount sale price of $147 for the 4-week kit and $397 for the 3-month kit – that&rsquo;s a <strong>another $50.00 to $100.00 discount off the already-low price </strong>– but only if you act now.</p>
				</div>
<!--FORMS-->
	  <div>
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
							  <div class="row hidden">
								  <div class="col-xs-2"><strong>Qty:</strong></div>
								  <div class="col-xs-10"><select name="quantity" id="quantity_22" style="width:50px;margin-top:3px;margin-bottom:3px;" onchange="setStateTax(22);">
										  <?php for ($i=1; $i<=10; $i++){ echo "<option>". $i . "</option>"; }?>
									  </select></div>
							  </div>
							  <div class="row">
								  <div class="col-xs-2"><strong>Price:</strong></div>
								  <div id="subTotal_22" class="col-xs-10"></div>
							  </div>
							  <div id="shippingRow_22" class="row hidden">
								  <div class="col-xs-2"><strong>S&amp;H:</strong></div>
								  <div id="shippingAmount_22" class="col-xs-10 show"></div>
							  </div>
							  <div id="taxRow_22" class="row hidden">
								  <div class="col-xs-2"><strong>Tax:</strong></div>
								  <div id="taxAmount_22" class="col-xs-10 show"></div>
							  </div>
							  <div class="row hidden">
								  <div class="col-xs-2"><strong>Total:</strong></div>
								  <div id="totalAmount_22" class="col-xs-10"></div>
							  </div>

						  </div><!-- *PRODUCT INFO -->

						  <div class="text-center center-block">
							<a href="/order/22"><img src="/assets/images/buttons/btn-green-add-to-order-01.jpg" name="submit" class=" img-responsive center-block" onClick="" /></a>
						</div>
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
							  <div class="row hidden">
								  <div class="col-xs-2"><strong>Qty:</strong></div>
								  <div class="col-xs-10"><select name="quantity" id="quantity_23" style="width:50px;margin-top:3px;margin-bottom:3px;" onchange="setStateTax(23);">
										  <?php for ($i=1; $i<=10; $i++){ echo "<option>". $i . "</option>"; }?>
									  </select></div>
							  </div>
							  <div class="row">
								  <div class="col-xs-2"><strong>Price:</strong></div>
								  <div id="subTotal_23" class="col-xs-10"></div>
							  </div>
							  <div id="shippingRow_23" class="row hidden">
								  <div class="col-xs-2"><strong>S&amp;H:</strong></div>
								  <div id="shippingAmount_23" class="col-xs-10 show"></div>
							  </div>
							  <div id="taxRow_23" class="row hidden">
								  <div class="col-xs-2"><strong>Tax:</strong></div>
								  <div id="taxAmount_23" class="col-xs-10 show"></div>
							  </div>
							  <div class="row hidden">
								  <div class="col-xs-2"><strong>Total:</strong></div>
								  <div id="totalAmount_23" class="col-xs-10"></div>
							  </div>

						  </div><!-- *PRODUCT INFO -->

						<div class="text-center center-block">
							<a href="/order/23"><img src="/assets/images/buttons/btn-green-add-to-order-01.jpg" name="submit" class=" img-responsive center-block" onClick="" /></a>
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