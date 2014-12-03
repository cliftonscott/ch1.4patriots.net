<script src="/js/zoommain.js"></script>
<style>
	.small { display: block; }
</style>

<script src="/js/audio.js"></script>
<script language="javascript">
	$(document).ready(function() {

		$("#optin-form").validate({
			rules: {
				check1: {
					required: true
				}
			},
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
		var minutes = 6;
		var seconds = 37;
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
			$("#terms").html('I want to add (' + quant + ') 1-Year Food4Patriots Coffee Kit to my order at the 1-time discount sale price of $' + subtot + ' plus $' + tax.toFixed(2) + taxedstate + ' for a total of $' + gtotal.toFixed(2) + '. I will get 600 servings of this amazing-tasting survival coffee with a 25-year shelf-life for just $0.16 per cup and FREE SHIPPING!');
		}else {
			$("#terms").html('I want to add (' + quant + ') 1-Year Food4Patriots Coffee Kit(s) to my order at the 1-time discount sale price of $' + gtotal.toFixed(0) + '. I will get 600 servings of this amazing-tasting survival coffee with a 25-year shelf-life for just $0.16 per cup and FREE SHIPPING!');
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
		<div><h1 class="darkRed text-center"><?php echo $firstName;?>, ***Title Needed***</h1>
		</div>
		<div id="videobox" class="hidden-xs">
			<iframe src="http://reboot.evsuite.com/RnJlZUNvZmZlZVZTTC1BaW1lZSBDT01QUkVTU0VELm1wNA==/?mode=iframe" width="660" height="380" frameborder="0" allowfullscreen></iframe>
		</div>
		<div id="buyButton" style="padding-bottom:40px;display:none;">
			<div class="text-center"><a href="#accept" onclick="$('#optin-form').validate().element('#check1');" class="1yrtop"><img src="/assets/images/buttons/btn-orange-click-accept-02.jpg" class="img-responsive center-block"/><div>Add To Cart $1997</div></a></div>
		</div>
		<div style="margin-top:50px;">
			<p><?php echo $pageGreeting;?></p>
			<p><em>But listen, there’s something more to ponder…</em></p>
			<p>The routine of enjoying that first cup of caffeinated goodness could be disrupted by a locomotive you never saw coming.</p>
			<p>That’s the thing about emergency situations…they never announce themselves before turning your world upside down. They just hit you like a derailed freight train.</p>
			<p>When that happens, you might be left blindsided without the familiar things you know and love the most…
			<p>Like your morning coffee.</p>
			<p>If there’s an extended crisis lasting weeks or God-forbid, even longer…what will you do then?</p>
			<p>Can you just imagine having to face a new horrible reality…without any of your daily, routine comforts?</p>
			<p>You’d be a ball of stress… and that wouldn’t help you one bit.</p>
			<img src="/media/images/misc/img-coffee-pouring.jpg" class="img-responsive pull-right img-padding-left media">
			<p>Wouldn’t it be great to have total peace of mind, knowing you won’t run out of your amazing survival coffee?</p>
			<p>Because the truth is, your 30-serving packet will only last you a week or so, especially if you’ve got more than one person drinking at least 2 cups or more a day.</p>
			<p>And let’s face it. There’s a reason 150 million Americans drink their java every day, and spend billions feeding their caffeine habit.</p>
		</div>
		<div style="margin-top:50px;">
			<h2 class="darkRed text-center">Coffee Is Literally The Fuel That Runs America.</h2>
			<p>I think the Patriots who dumped the tea in Boston Harbor 240 years ago were on to something…</p>
			<p><strong>The British could keep their stinking tea!</strong></p>
			<p>From Colonial times ‘til now, Americans are tried-and-true coffee drinkers, through and through.</p>
			<p>I certainly don’t know what the heck I’d do if my morning ritual of a piping-hot cup of coffee went away in a crisis situation… I’d probably turn into some sort of Grizzly bear.</p>
			<p>Caffeine withdrawal isn’t pretty… the headaches, irritability, and fatigue is absolutely for the birds. Been there, done that.</p>
			<p>And in any disaster, you want to make sure you’ve got what you need to stay awake and alert… because you never know what you might be facing around the corner…and quite frankly, your life could depend on it.</p>
			<p>Do you want to be dozing off while all hell is breaking loose outside?</p>
			<p>I didn’t think so!</p>
			<p>And remember, there won’t be any grocery stores open to get re-stocked on any supplies, including coffee. Their shelves will be stripped bare as a bone within hours when a crisis hits.</p>
			<p>And Starbucks? Forget about that - they certainly won’t be open – they’ll probably be ransacked like every other store by looters and criminals!</p>
			<p><em>(Think Ferguson, Missouri folks! There’s no shopping when riots have taken over your town!)</em></p>
			<p>So to be certain you’ve got plenty <em>(and I mean PLENTY!)</em> of coffee to get you through any catastrophe lasting days, weeks, or even months, I’m here to make you one heck of a special offer:</p>
		</div>
		<div style="margin-top:50px;">
			<h2 class="darkRed text-center">Introducing the Food4Patriots Coffee Kit</h2>
			<div>
					<img class="img-responsive center-block small" src="/media/images/f4p/f4p-coffee-kit-01.jpg"  alt="Food4Patriots Coffee Kit"/>
			</div>
			<p>I’m going to give you a whopping 600 servings of my delicious survival coffee – 100% Arabica, 100% Colombian, Non-GMO, and packaged to be fresh for 25 years… for just one small payment of $97.</p>
			<p><strong>That’s right. For only about .16 per cup, you will have a stockpile of the richest, best-tasting, most aromatic coffee available.</strong></p>
			<p>Compared to the $5.00 you’d shell out for just one foofy coffee drink from Starbucks, that’s mind-boggling!</p>
			<p>Now, I can almost hear the wheels turning in your head right now…</p>
			<p>You’re wondering…</p>
			<p>“How can I offer you the best coffee on the planet for merely pennies per serving?”</p>
			<p>Well, with some tough negotiation, I’ve been able to work out a super-special deal with my supplier for this amazing coffee. I don’t know how long I’ll be able to make this offer, or even how long my inventory will last.</p>
			<p>That’s why I’d suggest you jump on this opportunity, while there’s still time.</p>
			<p><strong>Here’s exactly what you’ll get:</strong></p>
			<ul>
			<li>600 servings of 100% Colombian, 100% Arabica (the finest beans on Earth) Non-GMO instant coffee – just add hot water!
				<li>Comes packaged in 10 space-age, triple layered, air-tight re-sealable Mylar pouches of 60 servings each to keep coffee super-fresh for 25 years!</li>
				<li>Coffee that goes straight from the tree, to the freeze-dryer, to package, to your cup!</li>
				<li>Also comes with discreet burlap bag and plastic tote that stacks & stores easily with your other food stockpiles and emergency supplies.</li>
				<li>FREE shipping and handling!</li>
			</ul>
			<p>Just to get an idea of what others are saying, here are some happy customers that are singing the praises of this revolutionary coffee:</p>
			<p><strong>Paul from LA says:</strong></p>
			<div class="testimonial" style="max-width:425px;"><i class="fa fa-quote-left fa-2x pull-left red-quote"></i><i class="fa fa-quote-right fa-2x pull-right red-quote"></i>
				<div class="testimonial-text" style="text-align:center;">
						<em>Best instant coffee that I have ever had.</em>
				</div>
			</div>
			<p><strong>Robert from FL raves:</strong></p>
			<div class="testimonial" style="max-width:425px;"><i class="fa fa-quote-left fa-2x pull-left red-quote"></i><i class="fa fa-quote-right fa-2x pull-right red-quote"></i>
				<div class="testimonial-text" style="text-align:center;">
						<em>It's better then my drip coffee I usually fix myself every day.</em>
				</div>
			</div>
			<p><strong>Thomas from OR couldn’t be happier:</strong></p>
			<div class="testimonial" style="max-width:425px;"><i class="fa fa-quote-left fa-2x pull-left red-quote"></i><i class="fa fa-quote-right fa-2x pull-right red-quote"></i>
				<div class="testimonial-text" style="text-align:center;">
						<em>This is the best coffee ever. It far exceeded my expectations.</em>
				</div>
			</div>
			<p><strong>And Kelly from MO loves the peace of mind this coffee gives her:</strong></p>
			<div class="testimonial" style="max-width:425px;"><i class="fa fa-quote-left fa-2x pull-left red-quote"></i><i class="fa fa-quote-right fa-2x pull-right red-quote"></i>
				<div class="testimonial-text" style="text-align:center;">
						<em>It will be a great source of comfort in bad times and <strong>a valuable barter item if economy collapses.</strong> Highly recommend!</em>
				</div>
			</div>
			<p>Look… just like Kelly said, there’s nothing quite like the comfort a steaming hot cup of coffee brings you. Or the fact you can use it to barter or trade for items you may need when the *bleep* hits the fan.</p>
			<p>The aroma while it’s brewing, that first taste of rich, full-bodied flavor, and of course, that little kick of caffeine to get you going in the morning!</p>
			<p>It’s the little things in life like coffee that gives us the most joy. Not gobs of money, fancy cars, big houses, or expensive vacations… nope, most of our happiness is wrapped up in the simple pleasures… like a strong, hot cup ‘o joe.</p>
			<p>Now imagine how important those small things become when a crisis hits… maybe it’s the power knocked out from a monster storm… or God knows what. Whatever the cause, you can’t get to the store, for food or anything else.</p>
			<p>Believe it or not, coffee can be an amazing equalizer in a crisis… it provides a familiar routine and a sense of calm and focus, even when everything else could be swirling in chaos.</p>
			<p>To get 600 servings of my great-tasting survival coffee for just $0.16 per cup click the <strong>“Click to Accept”</strong> button below:</p>
			<h2 class="darkRed text-center">And Just To Show You How Serious I Am, I'm Offering An Outrageous DOUBLE Guarantee!</h2>
			<div class="outLineBoxDarkBlue">
				<p><img src="/media/images/misc/seal-guarantee-satisfaction.jpg" alt="Guarantee #1" class="pull-left img-responsive media margin-t-20">
					<strong>Guarantee #1</strong> is a 100% money back guarantee. No questions asked. If for any reason, you’re not satisfied with your Food4Patriots Coffee Kit,
					just return it within 60 days of purchase and I’ll refund 100% of your purchase price. If you try it and decide it’s not as fresh and delicious
					as I promised, you can have your money back for any reason or no reason whatsoever. That way there’s absolutely no risk for you.</p>
				<div class="clearfix"></div>
			</div>
			<div class="outLineBoxDarkBlue">
				<p><img src="/media/images/misc/seal-guarantee-money.jpg" alt="Guarantee #2" class="pull-left img-responsive media margin-t-20" style="padding-right:">
					<strong>Guarantee #2</strong> is an unheard of 300% money back guarantee. If you open ANY of your coffee packs anytime in the next 25 years and find your coffee
					has spoiled or gone bad, you can return your entire stockpile and I will triple your money back! Does that sound fair to you?</p>
				<p>That’s how confident I am that this coffee will remain just as fresh and delicious for the next 25 years as it is on the day you buy it.</p>
			</div>
			<p>Oh, and don’t forget - because my survival coffee is good for an unbelievable 25 years (hey – you’ll have great-grandkids and your coffee will still be as fresh as the day you bought it!) you can stash it in your car, RV, or even leave a supply at your vacation home or cabin.</p>
			<p>This coffee goes anywhere, and makes a great addition to your bug out bag!</p>
			<p>Coffee that tastes this good and lasts 25 years doesn’t grow on trees, Friend… well, it kinda does but you get my point.</p>
			<p>You won’t find my coffee on eBay, or Amazon, Sam’s Club, or any places like that.</p>
			<p>Nope.</p>
			<p>So don’t wait…like I said, I have a limited supply of coffee. Once word gets around about this first-ever survival coffee, people will be clamoring for this offer and I will very likely run out…</p>
			<p>So just click the <strong>“Click to Accept”</strong> button below and we’ll rush you your 600-serving Food4Patriots Coffee Kit, the world’s best survival coffee, right away.</p>
			<p>Don’t wait… time’s ticking by and you never know when an emergency will hit… do yourself and your loved ones a favor, and be ready.</p>
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
									for ($i=1; $i<=5; $i++)
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
							<input type="checkbox" id="check1" name="check1">
							<img src="/assets/images/misc/yes-01.jpg" width="74" height="34" alt="Yes">
						</div>
						<div id="terms">I want to add the Food4Patriots Coffee Kit to my order at the 1-<span  style="letter-spacing:-.5px;">time discount sale price of $97. I will get 600 servings of this amazing-tasting survival coffee with a 25-year shelf-life for just $0.16 per cup and FREE SHIPPING!</span>
						</div>
					</div>
					<div class="text-center" style="margin-top:20px;"><strong>OR</strong></div>
				</form>
			<?php
			}
			?>
			<div class="noThanks">
				<a href="<?php echo $declineUrl;?>">No Thanks</a>, I'd rather pay $5 for a burnt Starbucks latte than <span  style="letter-spacing:-.5px;">$0.16 for a cup of coffee that has a guaranteed shelf-life of 25 years</span>
			</div>
			<div class="outLineBoxDarkBlue">
				<p><img src="/media/images/misc/seal-guarantee-satisfaction.jpg" alt="Guarantee #1" class="pull-left img-responsive media margin-t-20">
					<strong>Guarantee #1</strong> is a 100% money back guarantee. No questions asked. If for any reason, you’re not satisfied with your Food4Patriots Coffee Kit,
					just return it within 60 days of purchase and I’ll refund 100% of your purchase price. If you try it and decide it’s not as fresh and delicious
					as I promised, you can have your money back for any reason or no reason whatsoever. That way there’s absolutely no risk for you.</p>
				<div class="clearfix"></div>
			</div>
			<div class="outLineBoxDarkBlue">
				<p><img src="/media/images/misc/seal-guarantee-money.jpg" alt="Guarantee #2" class="pull-left img-responsive media margin-t-20" style="padding-right:">
					<strong>Guarantee #2</strong> is an unheard of 300% money back guarantee. If you open ANY of your coffee packs anytime in the next 25 years and find your coffee
					has spoiled or gone bad, you can return your entire stockpile and I will triple your money back! Does that sound fair to you?</p>
				<p>That’s how confident I am that this coffee will remain just as fresh and delicious for the next 25 years as it is on the day you buy it.</p>
			</div>
		</div>
	</div>
