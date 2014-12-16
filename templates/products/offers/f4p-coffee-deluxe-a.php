<script src="/js/zoommain.js"></script>
<style>
	.small { display: block; }
</style>

<script src="/js/audio.js"></script>
<script language="javascript">
	$(document).ready(function() {

		$("#optin-form").validate({
//			rules: {
//				check1: {
//					required: true
//				}
//			},
			messages: {
				check1: '<div class="warning-check"></div>'
			},
			submitHandler: function(form) {
				//optIn();
				form.submit();
			}
		});

	});
</script>
<script type="text/javascript">
	// Change these values for the content within the "buttons" div to appear at this time.
	$(document).ready(function(){

		var hours = 0;
		var minutes = 3;
		var seconds = 45;
		// Start by converting hours to milliseconds
		var time = hours * 60 * 60 * 1000;

		// Add minutes converted to milliseconds and add to total time
		time += minutes * 60 * 1000;
		// Add seconds to total time after converting to milliseconds
		time += seconds * 1000;

		setTimeout(function() {
			$("#buyButton").css("display", "block");
		}, time);

	});
</script>
<script>
	function productChange(){
		if ('<?php echo $customerDataObj->billingState;?>' == 'AZ') {
			taxrate = .0810;
			taxedstate = " AZ (8.10%) sales tax";
		}else if ('<?php echo $customerDataObj->billingState;?>' == 'TN') {
			taxrate = .0925;
			taxedstate = ' TN (9.25%) sales tax';
		}else {
			var taxrate = 0;
			taxedstate = '';
		}

		price = 97;
		e = document.getElementById("quantity");
		quant = e.options[e.selectedIndex].value;
		discount = 1000 * quant;
		$("#save").html('Act Today And Save Over $' + discount);
		subtot = price * quant;
		tax = taxrate * subtot;
		gtotal = tax + subtot;
		if (taxrate != 0){
			$("#terms").html('I want to add the Food4Patriots Coffee Kit to my order at the 1-time discount sale price of $' + subtot + ' plus $' + tax.toFixed(2) + taxedstate + ' for a total of $' + gtotal.toFixed(2) + ' with FREE SHIPPING. Each kit contains 600 servings of this amazing-tasting survival coffee with a 25-year shelf-life for just $0.16 per cup.');
		}else {
			$("#terms").html('I want to add the Food4Patriots Coffee Kit to my order at the 1-time discount sale price of $' + gtotal.toFixed(0) + ' with FREE SHIPPING. Each kit contains 600 servings of this amazing-tasting survival coffee with a 25-year shelf-life for just $0.16 per cup.');
		}
	}
</script>
<?php

if(!$pageGreeting) {
	$pageGreeting = ""; // add default greeting here // override this default in the calling template
}

?>
<div class="container-main">
	<div class="breadcrumb1">
		<a>CHECKOUT</a>
		<a class="current">ORDER CUSTOMIZATION</a>
		<a>ORDER CONFIRMATION</a>
	</div>
	<div class="container oto-width">
		<div><h1 class="darkRed text-center">Survival Coffee May Be More Valuable Than Gold In A Crisis...</h1>
		</div>
		<div id="videobox" class="hidden-xs">
			<iframe src="http://reboot.evsuite.com/Q29mZmVlX09UTzFfNjAwU2VydmluZ19UaW1teV9DT01QUkVTU0VELm1wNA==/?mode=iframe" style="max-width:642px;" width="660" height="380" frameborder="0" allowfullscreen></iframe>
		</div>
		<div id="buyButton" class="hidden-button-coffee" style="display:none;">
			<div class="text-center"><a href="#accept" onclick="$('#optin-form').validate().element('#check1');" class="1yrtop"><img src="/assets/images/buttons/btn-orange-click-accept-02.jpg" class="img-responsive center-block"/><div>Add To Cart $97</div></a></div>
		</div>
		<div style="margin-top:50px;">
			<p><strong>Congratulations on placing your order with us today.</strong></p>
			<p>Your free 30 servings of Food 4 Patriots survival coffee is on its way to you.</p>
			<p>But I need to tell you about something before your order is 100% processed.</p>
			<p>Here’s the problem: you don’t know when a crisis may actually occur.</p>
			<p>There have been giant snowstorms in the northeast and the Ebola scare was enough to put anyone on edge. Especially smart patriots like you.</p>
			<p>Now, you’ve proven that you’re a true God fearing American patriot who can see the handwriting on the wall and you’ve taken the first step by getting your free coffee today.</p>
			<p>There’s nothing more comforting and American than being able to sip a cup of fresh hot delicious coffee, and in the event of an emergency it’s a direct part of your “normal” routine.</p>
			<p>And keep in mind; this is the highest quality coffee we could source on the planet. No GMO’s, all 100% coffee, with absolutely zero additional “fillers”, additives or preservatives.</p>
			<p>It’s also 100% Colombian and 100% Arabica, arguably the finest coffee plants on the planet today.</p>
			<p>Harvested at the peak of freshness then immediately roasted to perfection, freeze dried and put in our specially designed Mylar packages designed to ensure safe keeping for at least 25 FULL years.</p>
			<p>You’ve got a full 30 cups coming to you, but I also want you to think about something for just a second.</p>
			<img src="/media/images/misc/img-coffee-pouring.jpg" class="img-responsive pull-right img-padding-left media">
			<p>Imagine you wake up one morning and flip on the television and you find complete chaos.</p>
			<p><em>Something terrible has happened, and you don’t even know what yet.</em></p>
			<p>Through the smoke and the crowds on television you see battered reporters trying to make sense of what just happened. You see mobs of people who have taken to the streets in violent gangs starting to loot stores in your city or town.</p>
			<p>You don’t know the scale of the event, and you don’t know when… or if it will end.</p>
			<p>Your family, scared out of their wits, comes into the room with you and looks to you for guidance…</p>
			<p>And at that moment the power goes out.</p>
			<p>Now, like I said before, you’re a smart patriot, or you wouldn’t be seeing this right now. You’re a planner.</p>
			<p>But, even though you’ve planned for something, have you really honestly covered all the bases?</p>
			<p>You probably even have a supply of food in storage, and backup supplies like candles and batteries and a source of clean water.</p>
			<p>But I think you might be missing one more thing.</p>
			<p>And that’s… more coffee.</p>
			<p>Let me tell you why. You’re not the only one who loves a cup of coffee in the morning. It’s you and about 150 million other people in this country who have at least a cup or two in the morning.</p>
			<p>And I’m deadly serious about this next part…</p>
			<p>If a food shortage or natural disaster does occur, <strong>coffee might just save your life,</strong> especially if you’re the only one who has any.</p>
			<p>It’s the last part that’s really important here. If a crisis like the one I described does take place, stores will run out of almost ALL supplies in as little as 72 short hours.</p>
			<p>You can bet that coffee will be gone before that. If you have a decent stockpile of it, you might just be the only person within a hundred miles or more that has any at all.</p>
			<p>That makes it a whole lot more valuable. All the way back to its origins in Yemen in the early 13th century coffee has been an incredible commodity.</p>
			<p>If you find yourself in a crisis situation, coffee is easily one of the best possible things to be in possession of, to use for barter or trade for other necessities that you may not have on hand.</p>
			<p>So here’s what I’m going to do for you today.</p>
			<p>Since you were one of the people who immediately saw the value of our Food 4 Patriots free coffee offer… I’m going to give you something even better.</p>
			<p>At the bottom of this page there’s a button that says <strong>“Click to Accept.”</strong></p>
			<p>When you click it, I’ll add my Food 4 Patriots Coffee Kit to your order for just one additional payment of $97.00.</p>
			<p>Let me tell you what you’re going to get here...</p>
			<div>
					<img class="img-responsive center-block small" src="/media/images/f4p/f4p-coffee-kit-01.jpg"  alt="Food4Patriots Coffee Kit"/>
			</div>
			<p>It’s an additional 600 full servings of the good stuff.</p>
			<p>That’s just $.16 per serving of the same 100% pure Colombian coffee, 100% Non-GMO and 100% Arabica, straight from the tree to the roaster to the freeze dryer and into your cup. (Compare that to your $5.00 latte from your local Starbucks!)</p>
			<p>Not only that, it tastes GREAT – our super fast processing keeps this coffee incredibly fresh and robust… just look at what some of our happy customers have said about it:</p>

			<div class="testimonial"><i class="fa fa-quote-left fa-2x pull-left red-quote"></i>
				<div class="testimonial-text">
					<em>WOW! What a concept! Tell you what! When there's no more rubber to hit the road with, maybe no fuel to move the machinery and things are lookin pretty skimpy, it just might save the day (of something MUCH MORE IMPORTANT), to have some hot Java handy......to drink OR to barter with!
					Can't go wrong with a deal like this! Hot Java to Go-Jo!</em>
					-<strong> Rebecca, from Bonners Ferry, ID</strong></div>
				<i class="fa fa-quote-right fa-2x pull-right red-quote-no-audio"></i></div>

			<div class="testimonial"><i class="fa fa-quote-left fa-2x pull-left red-quote"></i>
				<div class="testimonial-text">
					<em>I got my coffee order today & opened a pack & had a cup of the coffee & it's the best coffee I have had in a long time. As a matter of fact, I have had 4 cups of the coffee as it's better then my drip coffee I usually fix myself every day.
						I'll be drinking this coffee every day from now on so I guess Ill have to order another supply to keep for emergency coffee rations.</em>
					-<strong> Robert, from Titusville, FL</strong></div>
				<i class="fa fa-quote-right fa-2x pull-right red-quote-no-audio"></i></div>

			<div class="testimonial"><i class="fa fa-quote-left fa-2x pull-left red-quote"></i>
				<div class="testimonial-text">
					<em>We've bought about 30 lbs of green coffee beans but I wasn't thrilled with having to roast the beans and then grind them to the right consistency.  We tried the sample pack and now I have 30 lbs of green coffee beans for barter. We love Starbucks house blend and while this doesn't taste like that it's a darn good substitute and during a SHTF scenario is much easier to prepare (goes without saying)</em>
					-<strong> Elizabeth, from North Carolina</strong></div>
				<i class="fa fa-quote-right fa-2x pull-right red-quote-no-audio"></i></div>

			<p>And there are plenty more happy customers where they came from.</p>
			<p>In this offer you’ll be getting, 10 full pouches (60 servings each) sealed into the specially designed triple-layered, re-sealable, re-usable Mylar packet that will significantly increase the shelf life and viability of your survival coffee.</p>
			<p>Then we put it all in a handy burlap sack, inside of an additional watertight plastic storage container for easy stacking.</p>
			<p>You may not ever need to use it in a crisis and I hope that’s the case, if so… you get to enjoy it all by yourself, and believe me you’re going to love it!</p>
			<p>Keep in mind, this offer is exclusive ONLY to people who just ordered our 30 cup offer, and that means you.  This will be <strong>the only time you see it at this incredible price.</strong></p>
			<p>Oh, and I’ll gladly pay the shipping, that’s on me, it’s the least I can do to get this into your hands today.</p>
			<p>And one last thing… like everything other product we sell, you get my outrageous double guarantee which goes a little something like this:</p>
			<div class="outLineBoxDarkBlueCoffee">
				<div style="vertical-align: center;"><p><img src="/media/images/misc/seal-guarantee-satisfaction.jpg" alt="Guarantee #1" class="pull-left img-responsive media" style="padding-right:10px;">
					<strong>Guarantee #1 –</strong> A 100%, no questions asked full Money Back Guarantee. If for ANY reason you’re not delighted
					with your Food4Patriots Coffee purchase, just return it within 60 days and I’ll give you every cent of your money back.</p></div>
			</div>
			<div class="betweenGuarantees" style="max-width:600px;" style="margin-bottom">
				And then there's...
			</div>
			<div class="outLineBoxDarkBlueCoffee">
				<div style="vertical-align: center;"><p><img src="/media/images/misc/seal-guarantee-money.jpg" alt="Guarantee #2" class="pull-left img-responsive media" style="padding-right:10px;">
				<strong>Guarantee #2 –</strong> (This is where my accountants think I might have lost it a little) This is my completely unheard of
					300% money back GUARANTEE. And it’s on TOP of guarantee #1… if at any time in the next 25 years you open one of your packets of coffee and find that it’s been compromised,
					or has gone bad… you can return the entire batch and I’ll give you triple your money back.</p></div>
			</div>
			<p>That’s about the best I can do to prove just how much I stand behind this product and its quality.</p>
			<p>That’s all I’ve got.</p>
			<p>Believe it or not, coffee can be an amazing equalizer in a crisis… it provides a familiar routine and a sense of calm and focus, even when everything else could be swirling in chaos.</p>
			<p>Get your additional supply right away, Click the <strong>“Click to Accept”</strong> button below now:</p>
		</div>
	</div>

	<div class="container oto-width">
		<div>
			<!--				<div><img class="img-responsive center-block" src="/media/images/f4p/f4p-1-year-kit-01.jpg"  alt="Food4Patriots 1-Year Kit"/></div>-->
			<div>
					<img class="img-responsive center-block small" src="/media/images/f4p/f4p-coffee-kit-02.jpg"  alt="Food4Patriots Coffee Kit"/>
			</div>
			<a id="accept"></a>
			<?php
			if($isUpgrade) {
				?>
				<div style="text-align:center;">
					<a href="/order/<?php echo $productDataObj->productId;?>"><img src="/assets/images/buttons/btn-orange-click-accept-02.jpg" name="submit" class="img-responsive center-block" onClick="ga('send', 'event', 'upsell-2-f4p-1-yr-kit', 'f4p-1-yr-kit-accept', 'click-to-accept-bottom');"></a>
				</div>
			<?php
			} else {
				?>
				<form action="/checkout/process.php" method="post" accept-charset="utf-8" id="optin-form">
					<div style="text-align:center;">
						<input type="image" src="/assets/images/buttons/btn-orange-click-accept-02.jpg" name="submit" class="img-responsive center-block 1yearbuy" onClick="ga('send', 'event', 'upsell-2-f4p-1-yr-kit', 'f4p-1-yr-kit-accept', 'click-to-accept-bottom');"/>
					</div>

					<div>
						<table  style="margin-right:auto;margin-left:auto;" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<td><div style="text-align: left;margin-right:10px;"><strong>Quantity:</strong></div></td>
								<td><span style="text-align:center;padding-top:10px;padding-bottom:10px;">
								<select name="quantity" id="quantity" style="width:50px;margin-top:3px;margin-bottom:3px;" onchange="productChange();">
									<?php
									if(!$maxQuantity) {
										$maxQuantity = 5;
									}
									for ($i=1; $i<=$maxQuantity; $i++)
									{
										echo "<option>". $i . "</option>";
									}
									?>
								</select>
								</span></td>
							</tr>
						</table>
					</div>

					<div style="position:relative;text-align:left;margin-top:10px;max-width:600px;margin-right:auto;margin-left:auto;">
						<div style="float:left;margin-right:5px;">
<!--							<input type="checkbox" id="check1" name="check1">-->
							<img src="/assets/images/misc/yes-01.jpg" width="74" height="34" alt="Yes">
						</div>
						<div id="terms"></div>
						<script>
							productChange();
						</script>
					</div>
					<div class="text-center" style="margin-top:20px;"><strong>OR</strong></div>
				</form>
			<?php
			}
			?>
			<div class="noThanks" style="max-width:600px;">
				<a href="<?php echo $declineUrl;?>">No Thanks</a>, I'd rather pay $5.00+ for a burnt Starbucks latte than $0.16 for a cup of delicious coffee that has a guaranteed shelf-life of 25 years
			</div>
			<div class="outLineBoxDarkBlueCoffee">
				<div style="vertical-align: center;"><p><img src="/media/images/misc/seal-guarantee-satisfaction.jpg" alt="Guarantee #1" class="pull-left img-responsive media" style="padding-right:10px;">
						<strong>Guarantee #1 –</strong> A 100%, no questions asked full Money Back Guarantee. If for ANY reason you’re not delighted
						with your Food4Patriots Coffee purchase, just return it within 60 days and I’ll give you every cent of your money back.</p></div>
			</div>
			<div class="outLineBoxDarkBlueCoffee" style="min-height:240px;">
				<div style="vertical-align: center;"><p><img src="/media/images/misc/seal-guarantee-money.jpg" alt="Guarantee #2" class="pull-left img-responsive media" style="padding-right:10px;">
						<strong>Guarantee #2 –</strong> This is my completely unheard of
						300% money back GUARANTEE. And it’s on TOP of guarantee #1… if at any time in the next 25 years you open one of your packets of coffee and find that it’s been compromised,
						or has gone bad… you can return the entire batch and I’ll give you triple your money back.</p></div>
			</div>
		</div>
	</div>
