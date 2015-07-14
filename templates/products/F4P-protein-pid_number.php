<?php
// DEFINE PRODUCT
$_SESSION['productId'] = 128;
$_SESSION["quantity"] = 1;
include_once("Customer.php");
if(Customer::havePurchased($_SESSION['productId']) !== TRUE) {
	include_once("Product.php");
	$productDataObj = Product::getProduct($_SESSION["productId"]);
?>
<style>
#belcher-box {
	width: 100%;
	display: block;
	margin-top: 30px;
	margin-bottom: 40px;
	font-size: 16px;
	background: #eeeeee;
	border-radius: 15px;
}
#belcher-box .box-title {
	padding: 10px;
	font-weight: bold;
	letter-spacing: 2px;
	font-size: 1.1em;
	border: 2px solid #777777;
	background-color: #777777;
	color: #FFFFFF;
	border-top-left-radius: 15px;
	border-top-right-radius: 15px;
}
#belcher-box .box-body {
	padding: 10px;
	border-right: 2px solid #777777;
	border-bottom: 2px solid #777777;
	border-left: 2px solid #777777;
	border-bottom-left-radius: 15px;
	border-bottom-right-radius: 15px;
}
#belcher-box .bold {
	font-weight:bold;
}
#belcher-box .red {
	color:#ff0000;
}
#belcher-box .small {
	font-size:.9em;
	font-style:italic;
	text-align:center;
}

#belcher-box p.notification {
	padding-left:50px;
	padding-right:50px;
	text-align:center;
	font-style:italic;
}
.timer-bg {
	background-color: #E7B906;
	padding: 4px;
	margin: 0 0 10px 0;
	color: #FFF;
	font-weight: bold;
	text-align: center;
	font-size: 27pt;
}
</style>
<script>
//setInterval(function(timerChange),1000);
var jsTimer = setInterval(function(){timerChange()},1000);
</script>
<script>
	timerDateObj = new Date(2014, 01, 01, 12, 10, 00);

	function timerChange() {
		time = timerDateObj.getTime();
		newTime = time - 1000;
		timerDateObj.setTime(newTime);
		m = timerDateObj.getMinutes();
		s = timerDateObj.getSeconds();
		if(s < 10) {
			s = "0" + s;
		}
		$("#timer").html(m + ":" + s);
		if(parseInt(s) + parseInt(m) == 0) {
			changeVeggieSubmitButton();
			clearInterval(jsTimer);
		}
	}

	function changeVeggieSubmitButton() {
		vsb = document.getElementById("veggieSubmitButton");
		vsb.src = "/assets/images/buttons/btn-red-expired-01.png";
		vsb.style.cursor = "default";
		vsf=  document.getElementById("optin-form");
		vsf.action = "javascript: expired()";
	}

	function expired() {
		//alert("This offer has expired!");
		//this intentionally does nothing, it's kind of like that page that is left blank
	}

	function changeKitQuantity() {

		jsKitCost = 147;

		orderSummaryParagraph = document.getElementById("orderSummary");
		jsQuantityInput = document.getElementById("quantity")
		if(jsQuantityInput.options) {
			jsQuantity = jsQuantityInput.options[jsQuantityInput.selectedIndex].value;
		} else {
			jsQuantity = jsQuantityInput.value;
		}

		if(jsQuantity == 1) {
			jsSummaryText = "Add 1 kit to my order for $" + jsKitCost + ".";
		} else {
			jsTotal = (jsQuantity * jsKitCost);
			jsSummaryText = "Add " + jsQuantity + " kits to my order for $" + jsKitCost + " each (total $" + jsTotal + ").";
		}
		jsState = "<?php echo $_SESSION["State"];?>";
		switch(jsState) {
			case "TN":
				jsTaxRate = .0925;
				jsTax = jsQuantity * jsKitCost * jsTaxRate;
				jsTax = jsTax.toFixed(2);
				jsTaxMessage = "<br><span style='font-style:italic;color:#999999;font-size:.8em;'>(plus $" + jsTax + " Tennessee sales tax of 9.25%)</span>";
				orderSummaryParagraph.innerHTML = jsSummaryText + jsTaxMessage;
			break;
			case "AZ":
				jsTaxRate = .0810;
				jsTax = jsQuantity * jsKitCost * jsTaxRate;
				jsTax = jsTax.toFixed(2);
				jsTaxMessage = "<br><span style='font-style:italic;color:#999999;font-size:.8em;'>(plus $" + jsTax + " Arizona sales tax of 8.1%)</span>";
				orderSummaryParagraph.innerHTML = jsSummaryText + jsTaxMessage;
			break;
			default:
				orderSummaryParagraph.innerHTML = jsSummaryText;
			break;
		}
	}
</script>
<section>
<?php
$offerName = $_SESSION["firstName"];
?>
	<a name="exclusive-offer"></a>
	<div id="belcher-box" class="hidden-xs">
		<div class="box-title">A Special One-Time-Only Offer for Fruit and Veggie Snack Pack Customer...</div>
		<div class="box-body">
			<p>Congratulations, Patriot! You’ve decided, <strong>“I’m not waiting in fear of the next disaster, I’m taking action!”</strong> And guess what? You’ve done just that with your order of the Fruit and Veggie Snack Pack.</p>
			<p>You’re in an elite group – among only seven percent of Americans who are prepared for a crisis. How’d you like to protect your family even more? You can! Just <strong>fortify your survival food stash with another vital source of nutrition – meat and protein!</strong></p>
			<h1 class="darkRed text-center title-max-590 center-block">Food4Patriots Meat and Protein Kit</h1>
			<div class="timer-bg">
				<div>OFFER EXPIRES IN: <span id="timer">10:00</span></div>
				<a id="fancybox-veggies" href="javascript:void();" onclick="showTimerModal();"><img src="/media/images/f4p/f4p-product-img-protein-04-01.jpg" width="100%" alt="3 Month Food Supply"></a>
			</div>
			<h1></h1>
			<p><b>Click the big, green "Add to Order" button below in the next 10 minutes (before our warehouse finalizes your shipping details)</b> and we’ll add our Meat and Protein Kit to your order today for the special price of just $147 and give you free shipping!</p>
			<p>Your Meat and Protein Kit comes packaged in airtight Mylar pouches and tucked into a space-saving four-gallon tote, all with a staggering 25-year shelf life!</p>
			<p>Time is short, Friend. <strong>This ONE-TIME OFFER is reserved only for Food4Patriots Fruit and Veggie Snack Pack customers, and we can’t offer it at this low price again.</strong></p>
			<p>The time for talk is over. Now, it’s now time to act.</p>
			<p><strong>So click the green “Add To Order” button now, to add the Meat and Protein Kit to your order before we run out!</strong></p>
			<p class="small">An additional $147 will be added to your credit card (free shipping). Remember, all orders are backed by our double-your-money-back guarantee and are 100% refundable.</p>
			<form action="/checkout/process.php" method="post" accept-charset="utf-8" id="optin-form">
				<input type="hidden" name="quantity" id="quantity" value="1">
				<p style="text-align:center;">
					<input id="veggieSubmitButton" type="image" src="/assets/images/buttons/btn-green-add-to-order-01.jpg" name="submit" class="fvskit" onClick="_gaq.push(['_trackEvent', 'Snack Pack Food Add On', 'clicked-add-to-order-button', 'Upsell at Thank You',0, false]);"/>
				</p>
			</form>
			<p id="orderSummary" style="text-align:center;">Add 1 kit to my order for $147.</p>
			<script>changeKitQuantity();</script>
		</div>
	</div>
</section>
<script>
	function showTimerModal() {
		$('#timerModal').modal('show');
	}
	function hideTimerModal() {
		$('#timerModal').modal('hide');
	}
</script>
<div id="timerModal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" style="width:700px;height:750px;">
		<div class="modal-content" style="background-image:url(/media/images/f4p/f4p-protein-mix-details-01.jpg);background-size: 700px;background-repeat: no-repeat;background-position: bottom;">
			<div style="text-align:center;padding:10px;width:700px;height:750px;">
				<div class="glyphicon glyphicon-remove-circle" style="float:right;cursor:pointer;" onclick="hideTimerModal();"></div>
			</div>
		</div>
	</div>
</div>
<?php
}
?>