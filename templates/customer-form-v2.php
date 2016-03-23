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
	<!-- JS Implementing Plugins -->
	<script src="/assets/js/jquery.validate.min.js"></script>
	<!-- JS Page Level -->
	<script type="text/javascript" src="/assets/js/validation.js"></script>
	<script type="text/javascript">
		jQuery(document).ready(function() {
			Validation.initValidation();
		});
	</script>
<div style="margin-bottom:15px" class="row" id="order-form">
	<?php
	$_SESSION["upsell"] = FALSE;
	$_SESSION["formReturn"] = $_SERVER["PHP_SELF"];
	if($_SESSION['errorMessage'] != '') {
		include_once("error-message.php");
		unset($_SESSION['errorMessage']);
	}
	?>
	<form role="form" action="<?php echo url('/checkout/process.php'); ?>" id="sky-form1" class="sky-form" method="post">
		<input type="hidden" name="productId" id="productId" value="<?php echo $productDataObj->productId;?>" onchange="setStateTax();">
		<div class="col-xs-6 form-fw stepone">
			<div class='form-row'>
				<div class="form-group col-xs-12">
					<h1 class="color-red dark"><em style="font-style: normal;font-size:25px">Step: 1</em></h1>
					<h2>Enter Contact Details</h2>
					<hr style="height:2px;background-color:#eee;color:#eee;border: 0 none;">
				</div>
			</div>
			<div class='form-row'>
				<div class="form-group col-sm-6 col-xs-6 col-md-6">
					<label for="firstName">First Name:</label>
					<input type="text" class="form-control" id="firstName" name="firstName" value="<?php echo $preFill['firstName'];?>">
				</div>
			</div>
			<div class='form-row'>
				<div class="form-group col-sm-6 col-xs-6 col-md-6">
					<label for="lastName">Last Name:</label>
					<input type="text" class="form-control" id="lastName" name="lastName" value="<?php echo $preFill['lastName'];?>">
				</div>
			</div>
			<div class='form-row'>
				<div class="form-group col-sm-6 col-xs-6 col-md-6">
					<label for="email">Email:</label>
					<input type="email" class="form-control" id="email" name="email" value="<?php echo $preFill['email'];?>">
				</div>
			</div>
			<div class='form-row'>
				<div class="form-group col-sm-6 col-xs-6 col-md-6">
					<label for="phone">Phone:</label>
					<input type="tel" class="form-control" id="phone" name="phone" placeholder="optional" value="<?php echo $preFill['phone'];?>">
				</div>
			</div>
			<div class='form-row'>
				<div class="form-group col-xs-12">
					<label for="billing-address">Billing Address:</label>
					<input type="text" class="form-control" id="billing-address" name="billing-address" value="<?php echo $preFill['billing-address'];?>">
				</div>
			</div>
			<div class='form-row'>
				<div class="form-group col-sm-6 col-xs-6 col-md-6">
					<label for="billing-city">City:</label>
					<input type="text" class="form-control" id="billing-city" name="billing-city" value="<?php echo $preFill['billing-city'];?>">
				</div>
			</div>
			<div class='form-row'>
				<div class="form-group col-sm-6 col-xs-6 col-md-6">
					<label class="control-label">Country</label>
					<select class="form-control" id="billing-country" name="billing-country"  onchange="changeCountry('billing');">
						<option value="US">United States</option>
						<option value="CA">Canada</option>
					</select>
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-sm-6 col-xs-6 col-md-6">
					<label for="billing-state" id="billing-state-label">State:</label>
					<select class="form-control" id="billing-state" name="billing-state"  onchange="setStateTax();">
					<!--dynamically built w/ javascript-->
					</select>
					<input type="text" class="form-control" id="other-billing-state" name="other-billing-state" style="display:none;visibility:none;">
				</div>
			</div>

			<div class='form-row'>
				<div class="form-group col-sm-6 col-xs-6 col-md-6">
					<label for="billing-zip">Zip:</label>
					<input type="text" class="form-control zip-field" id="billing-zip" name="billing-zip" value="<?php echo $preFill['billing-zip'];?>">
				</div>
			</div>

			<!--Shipping Address-->
			<div id="shipaddd">
				<script>
					$(function () {
						$('.ba').on('change', function () {
							var checked = $(this).prop('checked');
							$('.tex').prop('disabled', !checked);
						});
					});
				</script>
				<div class='form-row'>
					<div class="form-group col-xs-12">
						<input style="cursor: pointer;margin-bottom: 10px;" type="checkbox" class="ba" value=""> <em style="font-style: normal;color: #0c83e7">My Shipping Address Is Different Than Billing</em><br>
						<label for="shipping-city">City:</label>
						<input disabled type="text" class="form-control tex" id="shipping-address" name="shipping-address" value="<?php echo $preFill['shipping-address'];?>">
					</div>
				</div>

				<div class="form-group col-sm-6 col-xs-6 col-md-6">
					<label for="shipping-city">City:</label>
					<input disabled type="text" class="form-control tex" id="shipping-city" name="shipping-city" value="<?php echo $preFill['shipping-city'];?>">
				</div>
				<div class="form-group col-sm-6 col-xs-6 col-md-6">
					<label for="shipping-country">Country:</label>
					<select disabled class="form-control tex" id="shipping-country" name="shipping-country"  onchange="changeCountry('shipping');">
						<option value="US">United States</option>
						<option value="CA">Canada</option>
					</select>
				</div>
				<div class="form-row">
					<div class="form-group col-sm-6 col-xs-6 col-md-6">
						<label for="shipping-state" id="shipping-state-label">State:</label>
						<select disabled class="form-control tex" id="shipping-state" name="shipping-state"  onchange="setStateTax();">
							<option value="" selected="selected">Select State</option>
							<option value="AK">AK</option>
							<option value="AL">AL</option>
							<option value="AR">AR</option>
							<option value="AZ">AZ</option>
							<option value="CA">CA</option>
							<option value="CO">CO</option>
							<option value="CT">CT</option>
							<option value="DC">DC</option>
							<option value="DE">DE</option>
							<option value="FL">FL</option>
							<option value="GA">GA</option>
							<option value="HI">HI</option>
							<option value="IA">IA</option>
							<option value="ID">ID</option>
							<option value="IL">IL</option>
							<option value="IN">IN</option>
							<option value="KS">KS</option>
							<option value="KY">KY</option>
							<option value="LA">LA</option>
							<option value="MA">MA</option>
							<option value="MD">MD</option>
							<option value="ME">ME</option>
							<option value="MI">MI</option>
							<option value="MN">MN</option>
							<option value="MO">MO</option>
							<option value="MS">MS</option>
							<option value="MT">MT</option>
							<option value="NC">NC</option>
							<option value="ND">ND</option>
							<option value="NE">NE</option>
							<option value="NH">NH</option>
							<option value="NJ">NJ</option>
							<option value="NM">NM</option>
							<option value="NV">NV</option>
							<option value="NY">NY</option>
							<option value="OH">OH</option>
							<option value="OK">OK</option>
							<option value="OR">OR</option>
							<option value="PA">PA</option>
							<option value="RI">RI</option>
							<option value="SC">SC</option>
							<option value="SD">SD</option>
							<option value="TN">TN</option>
							<option value="TX">TX</option>
							<option value="UT">UT</option>
							<option value="VA">VA</option>
							<option value="VT">VT</option>
							<option value="WA">WA</option>
							<option value="WI">WI</option>
							<option value="WV">WV</option>
							<option value="WY">WY</option>
						</select>
						<input type="text" class="form-control tex" id="other-shipping-state" name="other-shipping-state" style="display:none;visibility:none;">
					</div>
				</div>
				<div class="form-group col-sm-6 col-xs-6 col-md-6">
					<label for="shipping-zip">Zip:</label>
					<input disabled type="text" class="form-control zip-field tex" id="shipping-zip" name="shipping-zip" value="<?php echo $preFill['shipping-zip'];?>">
				</div><!--End Shipping-->
			</div>
		</div>

		<!--Step 2-->
		<div class='hidden-xs' style='float:right;cursor:pointer;'><a href='#csr' onclick='showCsrModal();'><img src='http://chris01.4patriots.net/assets/images/misc/customer-service-rep-02.png' alt='Have Questions? Give Us A Call' class='img-responsive'/></a></div>
		<div style="background-color:#eeeeee;padding:0" class="col-xs-6 form-fw">
			<div class='form-row'>
				<div class="form-group col-xs-12">
					<h1 class="color-red dark"><em style="font-style: normal;font-size:25px">Step: 2</em></h1>
					<h2>Enter Payment Info</h2>
					<hr style="height:2px;background-color:#fff;color:#fff;border: 0 none;">
				</div>
			</div>
			<div class='form-row'>
				<div class='col-xs-12 form-group card'>
					<label name="creditcard">Card Number: <i class="fa fa-cc-mastercard"> <i class="fa fa-cc-visa"></i> <i class="fa fa-cc-discover"></i> </i> <i class="fa fa-cc-amex"></i></label>
					<input type="text" class="form-control inspectletIgnore card-number" id="creditCardNumber" name="creditCardNumber"value="">

				</div>
			</div>
			<div class='form-row'>
				<div class='col-xs-4 form-group cvc'>
					<label for="card-cvv2">CVV: <a href="#info" title="Credit Verification Value (CVV):" data-html="true" data-toggle="popover" data-trigger="hover" data-content="<img src='http://dev.sf4p.4patriots.net/assets/images/checkout/cvv2.png'/>" data-placement="bottom"><i style="font-size: 15px" class="fa fa-question-circle"></i></a></label>
					<input type="text" class="form-control cvv2-field" id="card-cvv2" name="card-cvv2" value="" placeholder='ex. 311'>
				</div>
				<div class='col-xs-4 form-group expiration'>
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
				</div>
				<div class='col-xs-4 form-group'>
					<label class='control-label'>Year:</label>
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
			<div class='form-row'>
				<div class='col-md-12'>
					<div style="width: 100%;font-size: 20px" class=''>
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
								<div class="col-xs-2"><strong>Item:</strong></div>
								<div class="col-xs-10" id="productTitle"></div>
							</div>
							<div class="row">
								<div class="col-xs-2"><strong>Price:</strong></div>
								<div class="col-xs-10" id="priceAmount"></div>
							</div>
							<div class="row">
								<div class="col-xs-2"><strong>S&amp;H:</strong></div>
								<div id="shippingAmount" class="col-xs-10"></div>
							</div>
							<div id="taxRow" class="row">
								<div class="col-xs-2"><strong>Tax:</strong></div>
								<div id="taxAmount" class="col-xs-10 show"></div>
							</div>
							<div class="row">
								<div class="col-xs-2"><strong>Total:</strong></div>
								<div id="totalAmount" class="col-xs-10">$</div>
							</div>
						</div><!-- *PRODUCT INFO -->
				</div>
			</div>
		</div>

		<div class='form-row'>
			<div style="margin:0 auto;padding-top:15px;padding-bottom:10px" class='col-md-12 form-group text-center'>
				<img class="arrowR" src="http://chris01.4patriots.net/assets/images/buttons/arrow-right.gif"><button style="margin-bottom: 10px;" type="button-2" class="btn-2" id="submitButton"><b>Click To Continue</b></button><img class="arrowL" src="http://chris01.4patriots.net/assets/images/buttons/arrow-right.gif">
			</div>
		</div>
		<div class='form-row'>
			<div style="margin:0 auto;padding-top:5px;background-color: #b4b4c7;" class='col-md-12 form-group text-center'>
				<h1 style="font-size: 18px">Shopping Is Safe & Secure - Guaranteed!</h1>
			</div>
			<div style=";padding-top: 15px;background-color: #cdcdda;" class='col-md-12 form-group text-center safety'>
				<p style="font-size: 15px;"><img src="http://dev.sf4p.4patriots.net/assets/images/checkout/secure-order-lock-02.png" width="30px"> Secure credit card payment - this is a secure 256-bit SSL encrypted payment.</p>
			</div>
		</div>
		<div class="row securtiy-seals">
			<div class="col-xs-6 col-sm-3"><a name="trustlink" href="http://secure.trust-guard.com/security/8491" rel="nofollow" target="_blank" onclick="var nonwin=navigator.appName!='Microsoft Internet Explorer'?'yes':'no'; window.open(this.href.replace(/https?/, 'https'),'welcome','location='+nonwin+',scrollbars=yes,width=517,height='+screen.availHeight+',menubar=no,toolbar=no'); return false;" oncontextmenu="var d = new Date(); alert('Copying Prohibited by Law - This image and all included logos are copyrighted by trust-guard \251 '+d.getFullYear()+'.'); return false;"><img class="trustguard" name="trustseal" alt="Security Seals" src="//dw26xg4lubooo.cloudfront.net/seals/security/8491-large.gif"/></a></div>
			<div class="col-xs-6 col-sm-3"><img class="norton" src="http://chris01.4patriots.net/assets/images/checkout/imgnortonsiteseal.png"></div>
			<!-- Add the extra clearfix for only the required viewport -->
			<div class="clearfix visible-xs-block"></div>
			<div class="col-xs-6 col-sm-3"><a href="https://honesteonline.com/members/consumerpage.php?company=12046&link=9869" target="_blank"><img class="honest" src="https://honesteonline.com/HEOSealsNewNoDate/heosealimg.php?company=12046&size=2&link=9869" alt="HONESTe Seal - Click to verify before you buy!"></a></div>
			<div class="col-xs-6 col-sm-3"><img class="trustusa" src="http://chris01.4patriots.net/assets/images/checkout/usa-seal.png" alt="Trust Seals"></div>
		</div>
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
