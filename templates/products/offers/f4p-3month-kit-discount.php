<div class="container-main">
	<div class="breadcrumb1">
		<a>CHECKOUT</a>
		<a class="current">ORDER CUSTOMIZATION</a>
		<a>ORDER CONFIRMATION</a>
	</div>
	<div class="container oto-width">
		<div>
			<h1 class="darkRed text-center title-max-610 center-block">Get $100.00 Off Food4Patriots 3-Month Supply Plus FREE Shipping With This One-Time Offer!</h1>
		</div>
		<div style="padding-bottom:20px;"><img class="img-responsive center-block"src="/media/images/f4p/f4p-3-month-kit-01.jpg" alt="3 Month Kit"/></div>
		<div>
			<p>Congratulations, Patriot! You’ve got a good start on your survival food stockpile with your free Food4Patriots Survival Coffee.</p>
			<p>I understand a 1-Year Kit may be too much for you right now, so how about one more 3 Month Kit for $100.00 off?</p>
			<p>We can offer you this special 1-time offer because the folks in our warehouse are already busy getting your order ready for shipment and it's easy for them to add another 3-Month kit to your package.</p>
			<p>I want to do everything I can to help you build your food stockpile as quickly and easily as possible, so to thank you for becoming a customer today, I am offering you an exclusive $100.00 discount on another 3-Month Food4Patiots Kit if you act now. That drops the price to only $397 (plus you'll get Free Shipping plus all the other Free bonuses included with the 3 Month Kit).</p>
			<p><?php echo $firstName;?>, please accept this opportunity to get an additional 3-Month Food4Patriots Kit for only $397 and save $100 today.          Just click on the big orange "Click To Accept" button below.</p>
		</div>
		<div>

			<?php
			if($isUpgrade) {
				?>
				<div class="text-center">
					<a href="<?php echo url("/order/" . $productDataObj->productId);?>" title="Add to Order!"><img class="img-responsive center-block" src="/assets/images/buttons/btn-orange-click-accept-01.jpg" alt="Buy It Now!" border="0" /></a>
				</div>
			<?php
			} else {
				?>
				<div class="text-center">
					<a href="<?php echo url("/checkout/process.php"); ?>" title="Add to Order!"><img class="img-responsive center-block" src="/assets/images/buttons/btn-orange-click-accept-01.jpg" alt="Buy It Now!" border="0" /></a>
				</div>
			<?php
			}
			?>
			<div class="text-center" style="margin-top:20px;"><strong>OR</strong></div>
			<div class="noThanks">
				<a href="<?php echo $declineUrl;?>">No Thanks</a> – I want to give up this opportunity. I understand that I will not receive this special offer again.
			</div>
		</div>
	</div>