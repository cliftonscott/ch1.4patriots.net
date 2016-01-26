<?php
if($_SESSION["soldout"]["flag"] === true) {
	include_once("sold-out-form.php");
} else {
	if(!$submitButtonSource) {
		$submitButtonSource = "/assets/images/buttons/btn-click-continue-green-01.png";
	}
?>
<script>
	function setStateTax() {
		pId = document.getElementById("productId").value;
		/*
		TODO Refactor uses of api library in FFP to use global 4Patriots API (when available)
		FFP-242 (original Jira issue)
		*/
		$.get("/api/product.php?pId=" + pId,function(data,status){
			quantity = document.getElementById("quantity").value;
			jsProductObj = JSON.parse(data);
			taxCountry = document.getElementById('billing-country').value.toLowerCase();
			if(taxCountry == "us") {
				shippingCost = jsProductObj.shippingCostDomestic;
			} else {
				shippingCost = jsProductObj.shippingCostInternational;
			}

			var shippingCostPerItem = jsProductObj.shippingCostPerItem;
			if (shippingCostPerItem === true) {
				shippingCost = shippingCost * quantity;
			}

			shippingAmount = document.getElementById('shippingAmount');
			if(shippingCost > 0) {
				shippingAmount.innerHTML = "$" + shippingCost.toFixed(2);
			} else {
				shippingAmount.innerHTML = "FREE";
			}
			/*
			TODO get tax values from tax class
			FFP-243 (original Jira issue)
			note that the taxes are calculated differently per state
			on one the tax calculation is based on just the item cost
			in the other it is the item cost plus the shipping,
			this means that we should move the calculation to the api
			and out of this switch statement
			 */
			taxState = document.getElementById('shipping-state').value.toLowerCase();
			if(taxState === "") {
				taxState = document.getElementById('billing-state').value.toLowerCase();
			}

			productPrice = jsProductObj.price * quantity;
			priceAmount = document.getElementById("priceAmount");
			priceAmount.innerHTML = "$" + productPrice.toFixed(2);
			productTitle = document.getElementById("productTitle");
			metaTitle = jsProductObj.metaTitle;
			productTitle.innerHTML = metaTitle;

			taxAmount = document.getElementById('taxAmount');
			totalAmount = document.getElementById('totalAmount');
			switch(taxState) {
				case "tennessee":
					tennesseeTax = (productPrice + shippingCost ) * .0925;
					taxAmount.innerHTML = "$" + tennesseeTax.toFixed(2);
					totalAmount.innerHTML = "$" + (productPrice + tennesseeTax + shippingCost).toFixed(2);
					toggleTaxRow("show");
					break;
				case "arizona":
					arizonaTax = productPrice * .0810;
					taxAmount.innerHTML = "$" + arizonaTax.toFixed(2);
					totalAmount.innerHTML = "$" + (productPrice + arizonaTax + shippingCost).toFixed(2);
					toggleTaxRow("show");
					break;
				default:
					taxAmount.innerHTML = "$0.00";
					totalAmount.innerHTML = "$" + (productPrice + shippingCost).toFixed(2);
					toggleTaxRow("hide");
					break;
			}
/////////////////////////////////////
//FFP-450
//TODO remove this
//TEMPORARY CODE FOR A VWO SPLIT TEST
//REMOVE WHEN CONTROL IS ACHEIVED

			jsOriginalPriceOverride = "<?php echo $vwoOriginalPrice;?>";

			if(jsOriginalPriceOverride > 0) {
				jsOriginalPrice = jsOriginalPriceOverride;
			} else {
				jsOriginalPrice = jsProductObj.originalPrice; //original value w/o override
			}
			if(jsProductObj.price == 0 && jsOriginalPrice > jsProductObj.price) {
				priceAmount.innerHTML = "<span style='text-decoration: line-through;font-weight:bold;'>$" + (jsOriginalPrice * quantity).toFixed(2) + "</span> <span style='color:red;font-weight:bold;'>FREE</span>";
			}
		});
	}
////////////////////////////////////
	
	function toggleTaxRow(toggle) {
		
		taxRow = document.getElementById("taxRow");
		
		if(toggle === "show") {
			taxRow.setAttribute("style", "display:block;visibility:visible;");
		} else {
			taxRow.setAttribute("style", "display:none;visibility:hidden;");

		}
	}
</script>
<div class="form-container" id="formcheck">
	<div id="secure-order-bar" class="text-center clearfix">
		<div class="pull-right"><img src="/assets/images/checkout/secure-order-lock-01.png" alt="Secure Checkout Lock" height="28"/></div>
		<div class="pull-left"><img src="/assets/images/checkout/secure-order-arrow-01.png" alt="Secure Checkout Arrow" height="28"/></div>
		<div>Secure Order Form</div>
	</div>
	
<?php
$_SESSION["upsell"] = FALSE;
$_SESSION["formReturn"] = $_SERVER["PHP_SELF"];
if($_SESSION['errorMessage'] != '') {
	include_once("error-message.php");
	unset($_SESSION['errorMessage']);
}
?>

	<form role="form" action="/checkout/process.php" method="post" accept-charset="utf-8" id="billing-form">
		<input type="hidden" name="productId" id="productId" value="<?php echo $productDataObj->productId;?>" onchange="setStateTax();">
	  <div class="form-group">
		<label for="firstName">First Name:</label>
		<input type="text" class="form-control" id="firstName" name="firstName" value="<?php echo $preFill['firstName'];?>">
	  </div>
	  <div class="form-group">
		<label for="lastName">Last Name:</label>
		<input type="text" class="form-control" id="lastName" name="lastName" value="<?php echo $preFill['lastName'];?>">
	  </div>
	  <div class="form-group">
		<label for="email">Email:</label>
		<input type="email" class="form-control" id="email" name="email" value="<?php echo $preFill['email'];?>">
	  </div>
	  <div class="form-group">
		<label for="phone">Phone:</label>
		<input type="tel" class="form-control" id="phone" name="phone" placeholder="optional" value="<?php echo $preFill['phone'];?>">
	  </div>
	  <div class="form-group">
		<label for="billing-address">Billing Address:</label>
		<input type="text" class="form-control" id="billing-address" name="billing-address" value="<?php echo $preFill['billing-address'];?>">
	  </div>
	  <div class="form-group">
		<label for="billing-city">City:</label>
		<input type="text" class="form-control" id="billing-city" name="billing-city" value="<?php echo $preFill['billing-city'];?>">
	  </div>
	  <div class="form-group">
		<label for="billing-country">Country:</label>
		<select class="form-control" id="billing-country" name="billing-country"  onchange="changeCountry('billing');">
			<option value="US">United States</option>
			<option value="CA">Canada</option>
		</select>
	  </div>
	  <div class="form-group">
		<label for="billing-state" id="billing-state-label">State:</label>
		<select class="form-control" id="billing-state" name="billing-state"  onchange="setStateTax();">
			<!--dynamically built w/ javascript-->
		</select>
		<input type="text" class="form-control" id="other-billing-state" name="other-billing-state" style="display:none;visibility:none;">
	  </div>
	  <div class="form-group">
		<label for="billing-zip">Zip:</label>
		<input type="text" class="form-control zip-field" id="billing-zip" name="billing-zip" value="<?php echo $preFill['billing-zip'];?>">
	  </div>
	  <div id="secure-guarantee">
		<div id="secure-guarantee-header">Shopping  Is Safe &amp; Secure - Guaranteed!</div>
		<div id="secure-guarantee-body" ><img src="/assets/images/checkout/secure-order-lock-02.png" width="39" height="39" alt="" class="pull-left"/>Secure credit card payment - this is a secure 256-bit SSL encrypted payment.</div>
	  </div>
	  <div class="checkbox">
		<label for="sameas" class="sameas-select sameas-sm">
		  <input type="checkbox" id="sameas" name="sameas" value="1" >
		  My Shipping Address Is Different
		</label>
	  </div>
	  <!-- *SHIPPING ADDRESS -->
	  <div id="shipaddd" style="display:none;">
	  <div class="form-group">
		<label for="shipping-address">Shipping Address:</label>
		<input type="text" class="form-control" id="shipping-address" name="shipping-address" value="<?php echo $preFill['shipping-address'];?>">
	  </div>
	  <div class="form-group">
		<label for="shipping-city">City:</label>
		<input type="text" class="form-control" id="shipping-city" name="shipping-city" value="<?php echo $preFill['shipping-city'];?>">
	  </div>
	  <div class="form-group">
		<label for="shipping-country">Country:</label>
		<select class="form-control" id="shipping-country" name="shipping-country"  onchange="changeCountry('shipping');">
			<option value="US">United States</option>
			<option value="CA">Canada</option>
		</select>
	  </div>
	  <div class="form-group">
		<label for="shipping-state" id="shipping-state-label">State:</label>
		<select class="form-control" id="shipping-state" name="shipping-state"  onchange="setStateTax();">
			<!--dynamically built w/ javascript-->
		</select>
		<input type="text" class="form-control" id="other-shipping-state" name="other-shipping-state" style="display:none;visibility:none;">
	  </div>
	  <div class="form-group">
		<label for="shipping-zip">Zip:</label>
		<input type="text" class="form-control zip-field" id="shipping-zip" name="shipping-zip" value="<?php echo $preFill['shipping-zip'];?>">
	  </div>
	  </div>
	  <!-- SHIPPING ADDRESS* -->
	  <div class="cc-align"><img src="/assets/images/checkout/credit-card.png" width="200" height="26" alt="Credit Cards Accepted"></div>
	  <div class="form-group">
		<label for="creditCardNumber">Card Number:</label>
		<input type="tel" class="form-control inspectletIgnore" id="creditCardNumber" name="creditCardNumber" value="">
	  </div>
	  <div class="form-inline expiration">
	  <div class="form-group">
		<label for="card_expires_on_month">Expiration:</label>
		<select class="form-control" id="card_expires_on_month" name="card_expires_on_month" >
			<option selected="selected" value="01">01 - January</option>
			<option value="02">02 - February</option>
			<option value="03">03 - March</option>
			<option value="04">04 - April</option>
			<option value="05">05 - May</option>
			<option value="06">06 - June</option>
			<option value="07">07 - July</option>
			<option value="08">08 - August</option>
			<option value="09">09 - September</option>
			<option value="10">10 - October</option>
			<option value="11">11 - November</option>
			<option value="12">12 - December</option>
		</select>

		<select class="form-control" id="card_expires_on_year" name="card_expires_on_year" >

				<?php
				//use php to calculate years into future and generate options
				$lastExpirationYear = date("y") + 10;
				for($year = date("y"); $year <= $lastExpirationYear;  $year++) {
					echo "<option value=" . $year . ">20" . $year . "</option>\n";
				}
				?>
				
		</select>
	  </div>
	  </div>
	  <div class="form-group">
		<label for="card-cvv2">
			CVV:<a href="#info" id="cvvPopover" rel="popover" class="btn ccv-tooltip" data-placement="bottom" data-toggle="tooltip">?</a></label>
		<input type="tel" class="form-control cvv2-field" id="card-cvv2" name="card-cvv2" value="">
	  </div>

		<!-- *PRODUCT INFO -->
		<div id="productInfo">
			<?php
			if($maxQuantity > 1) {
			?>
			<div class="row" style="margin-bottom: 10px;">
				<div class="col-xs-7 darkRed" style="margin-top:4px;">Choose Quantity:</div>
				<div class="col-xs-5">
						<div class="form-group">
							<select class="form-control pull-right" id="quantity" name="quantity" onchange="setStateTax();">
								<?php
								for ($i = 1; $i <= $maxQuantity; $i++) {
									echo "<option value='" . $i . "'>" . $i . "</option>";
								}
								?>
							</select>
						</div>
				</div>
			</div>
			<?php
				} else {
				?><input type="hidden" name="quantity" id="quantity" value="1">
			<?php
				}
			?>
			<div class="row">
				<div class="col-xs-2 darkRed"><strong>Item:</strong></div>
				<div class="col-xs-10" id="productTitle"></div>
			</div>
			<div class="row">
				<div class="col-xs-2 darkRed"><strong>Price:</strong></div>
				<div class="col-xs-10" id="priceAmount"></div>
			</div>
			<div class="row">
				<div class="col-xs-2 darkRed"><strong>S&amp;H:</strong></div>
				<div id="shippingAmount" class="col-xs-10"></div>
			</div>
			<div id="taxRow" class="row">
				<div class="col-xs-2 darkRed"><strong>Tax:</strong></div>
				<div id="taxAmount" class="col-xs-10 show"></div>
			</div>
			<div class="row">
				<div class="col-xs-2 darkRed"><strong>Total:</strong></div>
				<div id="totalAmount" class="col-xs-10">$</div>
			</div>

		</div><!-- *PRODUCT INFO -->

	  <div><input id="submitButton" type="image" src="<?php echo $submitButtonSource;?>" value="" class="start-now img-responsive center-block exit-safe gray-out" alt="Click To Continue"></div>
	</form>
</div>

<?php
if(isset($preFill)) {
?>
	<script>
		billingCountry = document.getElementById("billing-country");
		for(var z = 0; z < billingCountry.options.length; z++){
			opt = billingCountry.options[z].value;
			if(opt === "<?php echo $preFill["billing-country"];?>"){
				billingCountry.selectedIndex = z;
			}
		}
		changeCountry("billing");
		billingState = document.getElementById("billing-state");
		for(var z = 0; z < billingState.options.length; z++){
			opt = billingState.options[z].value;
			if(opt == '<?php echo $preFill["billing-state-name"];?>'){
				billingState.selectedIndex = z;
			}
		}
	</script>
<?php
} else {
	echo "<script>changeCountry('billing');</script>";
}

?>
<script>
	$(document ).ready(function () {
		$("#cvvPopover").popover({
			html:true,
			trigger: "hover",
			title:"Credit Verification Value (CVV):",
			content: "<img src=/assets/images/checkout/cvv2.png>"
			});
		setStateTax();
	});

	// Update 'State' label to match currently selected Country,
	// individually for both Billing and Shipping addresses.
	$('#shipping-country, #billing-country').change(function(){
		var country = $(this).val();
		var label = 'State';
		if (country == 'CA') {
			label = 'Province/Territory';
		}
		var labelName = $(this).attr('id').replace('country', 'state') + '-label';
		$('#' + labelName).html(label + ':');
	});

	$('#sameas').change(function(){
		changeCountry('shipping');
		if (this.checked) {
			$('#shipaddd').show('fast');
			billingAddress = $("#billing-address").val();
			//$('#shipping-address').val(billingAddress);
			
			billingCity = $("#billing-city").val();
			//$('#shipping-city').val(billingCity);
			
			billingState = $("#billing-state").val();
			$('#shipping-state').val(billingState);
			
			billingZip = $("#billing-zip").val();
			//$('#shipping-zip').val(billingZip);
			
			billingCountry = $("#billing-country").val();
			$('#shipping-country').val(billingCountry);

			$('#shipping-country').trigger('change');

		}else{
			$('#shipaddd').hide('fast');
			setStateTax();
		}
	});

	$('[placeholder]').focus(function() {
		var input = $(this);
		if (input.val() == input.attr('placeholder')) {
			input.val('');
			input.removeClass('placeholder');
		}
	}).blur(function() {
		var input = $(this);
		if (input.val() == '' || input.val() == input.attr('placeholder')) {
			input.addClass('placeholder');
			input.val(input.attr('placeholder'));
		}
	}).blur().parents('form').submit(function() {
		$(this).find('[placeholder]').each(function() {
			var input = $(this);
			if (input.val() == input.attr('placeholder')) {
				input.val('');
			}
		})
	});
</script>
<?php
}
?>
