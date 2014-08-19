<style>
#belcher-box {
	width: 100%;
	display: block;
	margin-top: 30px;
	margin-bottom: 40px;
	font-size: 16px;
	background: #eeeeee;
	box-shadow: 2px 2px 15px 4px #C6C6C6;
	-webkit-box-shadow: 2px 2px 15px 4px #C6C6C6;
	border-bottom-left-radius: 15px;
	border-bottom-right-radius: 15px;
}
#belcher-box .box-title {
	padding: 10px;
	font-weight: bold;
	letter-spacing: 2px;
	font-size: 1.1em;
	border: 2px solid #777777;
	background-color: #777777;
	color: #FFFFFF;
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
</style>
<script type="text/javascript" src="/js/fancyb/jquery.fancybox.js?v=2.1.5"></script>
<link rel="stylesheet" type="text/css" href="/js/fancyb/jquery.fancybox.css?v=2.1.5" media="screen" />
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
		
		jsKitCost = 27;

		orderSummaryParagraph = document.getElementById("orderSummary");
		jsQuantityInput = document.getElementById("quantity")
		if(jsQuantityInput.options) {
			jsQuantity = jsQuantityInput.options[jsQuantityInput.selectedIndex].value;
		} else {
			jsQuantity = jsQuantityInput.value;
		}
		
		if(jsQuantity == 1) {
			jsSummaryText = "Add 1 vault to my order for $" + jsKitCost + ".";
		} else {
			jsTotal = (jsQuantity * jsKitCost);
			jsSummaryText = "Add " + jsQuantity + " vaults to my order for $" + jsKitCost + " each (total $" + jsTotal + ").";
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
<div id="belcher-box">
	<div class="box-title">Exclusive Offer for Our Customers...</div>
	<div class="box-body">
		<div class="timer-box">
			<a id="fancybox-veggies" href="javascript:void();" onclick="showTimerModal();"><img src="/media/images/p4p/P4P-platinum-package-01.jpg" width="360" height="230" alt="3 Month Food Supply">
			<div id="timer" style="top:-135px;">10:00</div></a>
			</div>
		<p><?php echo $offerName;?>, 
			Waiting on content <a href="https://jira4patriots.atlassian.net/browse/PPG-105">PPG-105</a>. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
			</p>
		
		<p><b>Click the big, green ‘Add to Order’ button below in the next 10 minutes (before our warehouse finalizes your 
			shipping details)</b> and we’ll add our <i>Medicinal Herb Garden</i> for just one additional payment of <b>$27 
				per garden vault (free shipping)</b>.</p>
				
		<p>The <i>Medicinal Herb Garden</i> contains only the highest quality, open-pollinated heirloom flower and herb 
			seeds that are <b>100% Non-GMO</b>.</p>
			
		<p>Your <i>Medicinal Herb Garden</i> is also packed in a convenient durable metal storage can with re-sealable, 
			reusable triple-layered foil seed packets that are dried & <b>sealed airtight</b> for <u>longer seed shelf 
				life.</u></p>
				
		<p>Furthermore, each <i>Medicinal Herb Garden</i> comes with 10 different varieties of easy-to-grow plants including:</p>
		
		<ul>
			<li>Echinacea Purple Coneflower (130+ Seeds / Packet)</li>
			<li>Cayenne Long Red Thin Hot Pepper (90+ Seeds / Packet)</li>
			<li>Borage (130+ Seeds / Packet)</li>
			<li>Pleurisy Root (50+ Seeds / Packet)</li>
			<li>Nettle (150+ Seeds / Packet)</li>
			<li>Mad-dog Skullcap (50+ Seeds / Packet)</li>
			<li>Culver’s Root (200+ Seeds / Packet)</li>
			<li>Hyssop (150+ Seeds / Packet)</li>
			<li>Lemon Balm (400+ Seeds / Packet)</li>
			<li>Catnip (250+ Seeds / Packet)</li>
		</ul>
		
		<p>This offer is exclusive ONLY to trusted Patriots who’ve <b>grabbed their FREE Rutgers Tomato Heirloom Seeds</b> 
			and it’s likely this will be the <u>only time</u> you see the <i>Medicinal Herb Garden</i> <span style="color:#CC0000;font-weight:bold;">
				this special price.</span> </p>
		
		<p>You’ve come this far to ensure the safety and well-being of your loved ones, wouldn’t you want to take the next step and include this critical component in your long-term emergency preparedness plans?</p>
		
		<p><b>Click the big, green 'Add to Order'</b> button below now.</p>
		
		<p class="notification">An additional $27.00 per Medicinal Herb Garden will be added to your credit card (free shipping). Remember, all orders are backed by our double-your-money-back guarantee and are 100% refundable.</p>
		
		<form action="/checkout/process.php" method="post" accept-charset="utf-8" id="optin-form">
<?php
if($typUpsellMaxQuantity > 1) {
	?>
		<p class="center">How many Medicinal Herb Garden vaults would you like to add to your order?<br>
		<select name="quantity" id="quantity" onchange="changeKitQuantity();">
			<?php
			for($qty=1; $qty <= $typUpsellMaxQuantity; $qty++) {
				echo "<option value='" . $qty . "'>" . $qty . "</option>\n";
			}
			?>
		</select>	
	<?php
} else {
	?>
		<input type="hidden" name="quantity" id="quantity" value="1">
	<?php	
}
?>
		</p>
			
		<!--
		//-->
		<p style="text-align:center;">
		<input id="veggieSubmitButton" type="image" src="/assets/images/buttons/btn-green-add-to-order-01.jpg" name="submit" class="fvskit" onClick="_gaq.push(['_trackEvent', 'Medicinal Herb Add On', 'clicked-add-to-order-button', 'Upsell at Thank You',0, false]);"/>
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
	<div class="modal-dialog modal-lg" style="width:700px;height:500px;">
		<div class="modal-content" style="background-image:url(/media/images/p4p/P4P-platinum-package-01.jpg);">
			<div style="text-align:center;padding:10px;width:700px;height:500px;">
				<div class="glyphicon glyphicon-remove-circle" style="float:right;cursor:pointer;" onclick="hideTimerModal();"></div>
			</div>
		</div>
	</div>
</div>