<?php
if($_SESSION["soldout"]["waitlist"] !== true) {
?>
<div class="form-container" id="formcheck">
	<div id="secure-order-bar" class="text-center clearfix">
		<div class="pull-right"><img src="/assets/images/checkout/secure-order-lock-01.png" alt="Secure Checkout Lock" height="28"/></div>
		<div class="pull-left"><img src="/assets/images/checkout/secure-order-arrow-01.png" alt="Secure Checkout Arrow" height="28"/></div>
		<div>Secure Order Form</div>
	</div>
	<div style="padding:10px;color:maroon;">
	  <p>Well, friend, it’s happened. </p>
	  <p>I knew demand was going to be high, but whoa! Even I’m surprised by how many people lined up to claim their very own Patriot Power Generator 1500.</p>
	  <p>Unfortunately, my newest product is so revolutionary, I’ve actually sold out of every last unit I had in stock.</p>
	  <p>Don’t fret, though. My team is working ‘round the clock building more Patriot Power Generators as we speak. </p>
	  <p>To be 100% sure your family is safe from blackouts,<strong> add your name and email to my Power Patriot Generator 1500 waiting list below</strong> and you’ll be notified via email the same day we get them in the warehouse so you’ll be the first in line to claim your very own “portable life insurance policy.”</p>
	  <p>Do it now, before I sell out – AGAIN.</p>
	  <p>-Frank Bates</p>
	</div>

	<form role="form" action="/checkout/process-waiting-list.php" method="post" accept-charset="utf-8" id="billing-form">
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
		<div><input type="hidden" name="listId" value="62"></div>
		<div><input type="image" src="/assets/images/buttons/btn-orange-click-join-01.png" value="" onclick="exitConfirmation=true;ga('send', 'event', 'checkout', 'power-generator-buy', 'click-to-continue');" id="get_started" class="start-now img-responsive center-block" alt="Click To Continue"></div>
	</form>
</div>
<?php
} else {
?>
	<div class="form-container" id="formcheck">
		<div style="padding:10px;color:maroon;">Thank you, you are now on the Patriot Power Generator 1500 waiting list. I hope to send out an update very soon!</div>
	</div>
<?php
}
?>
<script>
	$(document).ready(function() {
		$("#billing-form").validate({
			rules: {
				"email": {
					required: true,
					email: true
				},
				"firstName": {
					required: true
				},
				"lastName": {
					required: true
				}
			},
			messages: {
				"email": "",
				"firstName": null,
				"lastName": ""
			}
		});
	});
</script>