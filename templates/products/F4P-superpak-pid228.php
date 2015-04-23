<?php
// DEFINE PRODUCT
$_SESSION['productId'] = 228;
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
#belcher-box .timer-box {
	float: right;
	height: 230px;
	width: 360px;
	/* [disabled]background: #ffffff; */
	/* [disabled]border: 1px solid #000000; */
	margin-left: 10px;
	margin-bottom: 5px;
	margin-top: 15px;
	text-align: center;
}
#belcher-box .timer-box a {
	/* [disabled]text-shadow: 2px 2px #000000; */
	text-decoration: none;
	/* [disabled]font-family:Times, "New York", serif; */
	color: #ff0000;
	font-size: 4em;
}
#belcher-box .timer-box a #timer {
	position: relative;
	top: -110px;
	height: 65px;
	left: 81px;
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
			$('.timer-bg').css({"background-color":"red"});
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

		jsKitCost = 397;

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
if(!empty($customerDataObj->firstName)) {
	$offerName = $customerDataObj->firstName;
} else {
	$offerName = "Fellow Patriot";
}

?>
	<a name="exclusive-offer"></a>
	<div id="belcher-box" class="hidden-xs">
		<div class="box-title">Exclusive Offer for Food4Patriots Customers...</div>
		<div class="box-body">
			<div class="timer-bg">
				<div>OFFER EXPIRES IN: <span id="timer">10:00</span></div>
			</div>
			<p><?php echo $offerName;?>, you've done a great job today to make sure your family has enough high-quality survival food when a crisis hits.</p>
			<p>And because you’ve shown yourself to be the kind of person who isn’t going to wait for disaster to strike and leave you helpless and weak, I’m going to do you one better and help you <strong>BOOST the nutrition, taste and variety of your food stockpile...</strong></p>
			<div>
				<h1 class="text-center darkRed">Food4Patriots SuperPak</h1>
				<a id="fancybox-veggies" href="javascript:void();" onclick="showTimerModal();">
					<img src="/media/images/f4p/f4p-product-img-typ-superpak-01.jpg" class="img-responsive center-block" alt="3 Month Food Supply">
				</a>
			</div>
			<p><strong><i>Click the big green “Add To Order” button below in the next 10 minutes (before our warehouse finalizes your shipping details)</i></strong> and we’ll add our energy-boosting Food4Patriots SuperPak to your order today for <strong>$50 off the normal price</strong> of $447. Your SuperPak includes:</p>
			<ul class="fa-u">
				<li>24 servings of freeze-dried beef and chicken </li>
				<li>56 servings of protein-rich red, black and pinto beans</li>
				<li>114 servings of tasty veggies, fruits, snacks and desserts</li>
				<li>600 servings of the world's first ever 100% Columbian survival coffee</li>
			</ul>
			<p>You'll get 794 servings of high-quality meats, proteins, fruits, veggies and coffee to take your stockpile to the next level.</p>
			<p>This offer is exclusive ONLY to Food4Patriots customers and it’s likely this will be the <span style="color:red;font-weight:bold;">only time you see it at this special price.</span></p>
			<p><strong>So click the “Add To Order” button below to add YOUR energy-boosting Food4Patriots SuperPak to your order now for the ridiculously low price of $397.</strong></p>
			<p class="text-center"><i>An additional $397 will be added to your credit card (free shipping). Remember, all orders are backed by our double-your-money-back guarantee and are 100% refundable.</i></p>
			<form action="/checkout/process.php" method="post" accept-charset="utf-8" id="optin-form">
				<input type="hidden" name="quantity" id="quantity" value="1">
				<p style="text-align:center;">
					<input id="veggieSubmitButton" type="image" src="/assets/images/buttons/btn-green-add-to-order-01.jpg" name="submit" class="fvskit"/>
				</p>
			</form>
			<p id="orderSummary" style="text-align:center;"></p>
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
		<div class="modal-content" style="background-image:url(/media/images/f4p/f4p-product-img-typ-superpak-details.jpg);background-size: 700px;background-repeat: no-repeat;background-position: bottom;">
			<div style="text-align:center;padding:10px;width:700px;height:750px;">
				<div class="glyphicon glyphicon-remove-circle" style="float:right;cursor:pointer;" onclick="hideTimerModal();"></div>
			</div>
		</div>
	</div>
</div>
<?php
}
?>