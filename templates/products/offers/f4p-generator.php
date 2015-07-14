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
		$("#optin-form2").validate({
			rules: {
				check2: {
					required: true
				}
			},
			messages: {
				check2: '<div class="warning-check"></div>'
			},
			submitHandler: function(form) {
				//optIn();
				form.submit();
			}
		});
		$("#optin-form3").validate({
			rules: {
				check3: {
					required: true
				}
			},
			messages: {
				check3: '<div class="warning-check"></div>'
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
		var minutes = 31;
		var seconds = 17;
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
<div class="container-main">
<div class="breadcrumb1">
	<a>CHECKOUT</a>
	<a class="current">ORDER CUSTOMIZATION</a>
	<a>ORDER CONFIRMATION</a>
</div>
<div class="container oto-width">
<div><h1 class="text-center" style="font-size: 23pt;"><strong><span class="darkRed">FREE</span> Video Reveals <span class="darkRed">"Magic Bullet"</span> That Protects You 100% Against Blackouts, Power Failures &amp; The Crumbling Electric Grid</strong></h1>
</div>
<div id="videobox" class="hidden-xs margin-b-10">
	<iframe src="//fast.wistia.net/embed/iframe/ntwrexzc2n" allowtransparency="true" frameborder="0" scrolling="no" class="wistia_embed" name="wistia_embed" allowfullscreen mozallowfullscreen webkitallowfullscreen oallowfullscreen msallowfullscreen width="640" height="360"></iframe>
</div>
<div id="buyButton" style="padding-bottom:40px;display:none;">
	<form action="/checkout/process.php" method="post" accept-charset="utf-8" id="optin-form">
		<div class="text-center">
			<input type="image" src="/assets/images/buttons/btn-orange-click-accept-02.jpg" name="submit" class="img-responsive center-block" />
		</div>
		<div style="position:relative;margin-top:20px">
			<div style="margin-right:5px;float: left;">
				<input type="checkbox" id="check1" name="check1">
				<img src="/assets/images/misc/yes-01.jpg" width="74" height="34" alt="Yes">
			</div>
			<div>
				<div style="line-height: 1.2;">I want to add the Patriot Power Generator 1500 to my order at the 1-time discount sale price of $1997.  I will get FREE Shipping with my Generator, Solar Panel &amp; bonuses (a $200 value) as well as a 100% 365-day guarantee.</div>
			</div>
		</div>
	</form>
</div>
<div>
<p><?php echo $firstName;?>, do you know that your life, and the life of everyone you love, is hanging in the balance RIGHT NOW? </p>
<p>You and your family are literally one step away from a 21st century apocalypse.<strong></strong><br>
	While you go about your day, dark forces across the globe are at work 24/7 taking aim at our country&rsquo;s beating heart...</p>
<p>…targeting something critical to life as we know it that&rsquo;s so old, so under-protected, and so vulnerable, it&rsquo;s become our &quot;weakest link&quot;. </p>
<p>And it&rsquo;s shocking it hasn&rsquo;t been destroyed...<strong>YET.</strong></p>
<p>And I&rsquo;m not talking about terror attacks that are in the planning stages…</p>
<h2 class="darkRed text-center center-block title-max-560"><strong>&quot;I&rsquo;m Talking About Attacks That Are ALREADY HAPPENING.&quot;</strong></h2>
<p><img src="/media/images/ppg/ppg-oto-powerstation-01.jpg" class="img-responsive pull-right img-padding-left media">And yet somehow the government is managing to bury this terrifying threat, and what&rsquo;s worse, they&rsquo;re not doing anything to stop it.</p>
<p>If you want those you love to survive this all-too-real threat that&rsquo;s just around the corner, pay very close attention to this entire presentation...</p>
<p>If you leave this page, you'll be missing your opportunity to protect yourself and your family from this devastating disaster. </p>
<p>Still with me? Good. </p>
<p>That tells me something about you. </p>
<p>You're probably wondering what the heck happened to the America you grew up in...and how we ended up here in such a wreck of a once glorious nation. </p>
<p>With rampant unemployment, almost 50 million freeloaders on food stamps, and a government that wants to turn the USA into some socialist utopia. </p>
<p>There's a lot of scandals competing for attention...no thanks to the Obama administration. </p>
<p>Benghazi, the VA debacle, the IRS mess, you name it. </p>
<p>But the very foundation of our functioning society, our nation's power grid, barely gets any press. </p>
<p>And nothing else will matter if it goes under from a well-planned terrorist attack. </p>
<p>When the grid falls, everything we know, love, and cherish falls with it. </p>
<p>Because the truth is, losing the grid would be like watching our country have a heart attack&#8230; </p>
<p>&#8230;When the heart stops pumping, everything shuts down and the patient flatlines. </p>
<p>When a full-blown terrorist attack on the grid happens, (and it's not a question of "if" but "when", folks) inconvenience turns to a real-life horror movie... </p>
<h2 class="darkRed text-center">&quot;Except In This Case, There's No End In Sight.&quot;</h2>
<p>Our great country would be crippled in a matter of minutes, before our enemies even have boots on the ground. </p>
<p>Imagine your life frozen in time right at the moment the power fails...and that you'd begin to lose everything in that split-second. </p>
<p>Lights all over country would go out, throwing people into total darkness. </p>
<p>Your fridge, electric range, and microwave would be dead, and all the fresh food you had to keep cold would rot. </p>
<p><img src="/media/images/ppg/ppg-oto-no-heat-01.jpg" class="img-responsive pull-left img-padding-right media" >The canned and boxed food you had in the pantry would run out in a matter of days. </p>
<p>Your thermostat wouldn't work, making your house feel like an oven or a meat locker. </p>
<p>Plus, extremes in temperature can be life threatening to children, the elderly, or those who are weak or ill. </p>
<p>Your well couldn't pump any fresh water into your house. </p>
<p>And even if you don't have a well, a total grid failure means <strong>NO FRESH WATER supply to drink, cook or clean with, or let's face it, FLUSH.</strong> </p>
<p>It would quickly turn your home from a sanctuary into a haz-mat zone. </p>
<p>Garbage would pile up everywhere, attracting insects, rats, and plagues of disease. </p>
<p>And something that makes you realize how helpless you really are without power? </p>
<p>All your communication devices would be as useful as a tin-can telephone. </p>
<p>Nope - no smart phones, no iPads, no computers. </p>
<p>You'd be isolated and alone, cut off from your friends and family&#8230;or any form of help. </p>
<h2 class="darkRed text-center"><strong>&quot;The Simple Fact Is That EVERYTHING Would Just...STOP.&quot;</strong> </h2>
<p>Every store would be picked over and shelves completely emptied within hours. </p>
<p>Looters would make quick work of any remaining stock, to keep for themselves or sell at jacked-up prices to desperate people clamoring for supplies or food. </p>
<p>Forget stores...you couldn't even get to your money in your bank account to buy anything, anyway! </p>
<p>And credit cards? </p>
<p>They'd be worthless... about as valuable as the plastic they're made from. </p>
<p>Traffic lights would be toast, causing accidents and even deaths. </p>
<p>Hospitals may buy a fraction of time with a backup generator, but pretty soon, the bodies would start piling up. </p>
<p>Life-saving equipment such as monitors and defibrillators wouldn't work, meaning patients in ICU, on life support, and recovering from surgery would be the first to die. (Remember Katrina???) </p>
<p>Schools would basically cease to exist, and children would have to stay home. </p>
<p>Gas stations would be bone dry, and couldn't pump gas even if they had it without electricity. </p>
<p><img src="/media/images/ppg/ppg-oto-theft-01.jpg" class="img-responsive pull-right img-padding-left media">Police would be helpless as criminals roamed the streets like rabid dogs, unable to take or respond to 911 emergencies. </p>
<p>County jails and prisons couldn't contain their overflowing criminal populations and they'd leak back into society... </p>
<p>And soon robberies, rapes, murder and mayhem would rise to epidemic levels. </p>
<p>Society would quickly become a deadly free-for-all. </p>
<p>Sound like something out of a Stephen King novel? </p>
<p>Well, it isn't folks. This isn't some tin-foil hat wearing conspiracy theory. </p>
<h2 class="darkRed text-center"><strong>&quot;It Could Happen At Any Moment, And I've Got The Stone Cold Proof.&quot;</strong> </h2>
<p>Here's a frightening quote from Dr. Richard Andres, US National War College: </p>
<p><strong> <em> "A massive and well-coordinated cyber-attack on the electrical grid could devastate the economy and cause a large-scale loss of life." </em> </strong> </p>
<p>Just to show you how very hard terrorists are working to bring down the grid using nothing more than an Internet connection, check this out from Politico.com: </p>
<img src="/media/images/ppg/ppg-oto-polotico-01.jpg" class="img-responsive center-block margin-b-10"/>
<p><strong><em>"More than a dozen utilities said they constantly, sometimes on a DAILY BASIS, face attempted cyber-attacks. One utility said it was the target of about 10,000 cyber-attacks each month, according to the report." </em> </strong> </p>
<p>Here's another alarming story from Reuters: </p>
<img src="/media/images/ppg/ppg-oto-reuters-01.jpg" class="img-responsive center-block margin-b-10"/>
<p>&nbsp;</p>
<p><strong><em>"As recently as May, 2014, a little known branch of the DHS called ICS-CERT (Industrial Control Systems Cyber Emergency Response Team) reported an advanced cyber-attack on a US public utility". </em> </strong> </p>
<p>And you may have heard about the arrest of 5 Chinese hackers, reported by Fox News: </p>
<img src="/media/images/ppg/ppg-oto-fox-01.jpg"class="img-responsive center-block margin-b-10"/>
<p>&nbsp;</p>
<p>By now, I think it's clear to anyone with an ounce of common sense that our crumbling US power grid is considered fair game for terrorists&#8230; </p>
<p>&#8230;from every rogue, lawless state across the globe. </p>
<p>And the scariest part? </p>
<p>The attacks never stop. </p>
<p>Hackers are trying to bring down the grid 24/7. They don't ever take a holiday, folks. </p>
<p>And it's not just a cyber-attack we have to fear. </p>
<p><strong>Just recently, terrorist snipers FIRED on a Silicon Valley substation.</strong> You heard right. </p>
<p> The attack was so bold, former Chairman of the Federal Energy Regulatory Committee, Jon Wellinghoff, calls this attack <strong>"the most significant incident of domestic terrorism involving the grid that has ever occurred</strong>." </p>
<p>AND he's concerned an even LARGER ATTACK could be in our near future. </p>
<p>Even Col. Allen West, a highly decorated soldier and American hero, called it "a dry run" for future attacks. </p>
<h2 class="darkRed text-center">&quot;What Does This Really Mean?&quot;</h2>
<p>It means the terrorists are just getting started.<strong><em></em></strong> </p>
<p>And what do you think Obama and his cronies plan to do about these threats? </p>
<p>They probably have some sort of special team working on this 24/7, right? </p>
<p>WRONG. </p>
<p><img src="/media/images/ppg/ppg-oto-electricprices-01.jpg" class="img-responsive pull-left img-padding-right media" >Instead, he's going to jack up your electric bill and put more strain on our power grid, making the terrorists job that much easier. </p>
<p>I'm not kidding. </p>
<p>Obama and his EPA cronies have declared an all-out war on coal, which powers almost 40% of all the electricity we use. </p>
<p>Not only are your electricity rates going to go through the roof, this move by Obama will only help break the back of the grid by putting additional stress on it that it can't handle. </p>
<p>Our rogue President who's consistently trashed the Constitution is now going to put the American public in grave danger. </p>
<p>So much for protecting the citizens of this country. </p>
<p>Now, I know what I've already shared with you has probably got you pretty badly shaken up. </p>
<p>I don't like being the messenger of doom. I just think that it's important you fully realize what we're facing here. </p>
<p>In just a few moments, I'm going to share with you the one item that will restore your hope for the future...no matter what crisis with the grid is on the horizon. </p>
<p>So stick with me, friend, and I promise you'll be glad you did. </p>
<p>Before I get into that, though, we should talk about the true state of the American power grid. </p>
<p>Most people never think about it because up until now, it's worked okay. You flip a switch, and the light comes on. </p>
<p>But is it really that simple? And why would it be so easy for terrorists to bring down? </p>
<p>For 2013, the dying American power grid gets an alarming D+ from the American Society of Civil Engineers for infrastructure and ability to handle current and future demand. </p>
<p>Talk about being ripe for a crisis. </p>
<p>If you were to compare the grid to an American city, guess which one it would resemble the most? </p>
<p>With all its ruin and decay, without hesitating, I would say...<strong>Washington, D.C.</strong> </p>
<h2 class="darkRed text-center"><strong>&quot;Are You Scared Yet? You Should Be.&quot;</strong> </h2>
<p><img src="/media/images/ppg/ppg-oto-sandystorm-01.jpg" class="img-responsive pull-right img-padding-left media" >Case in point, the best example we have of how weak the grid really is happened just a couple of years ago, when the East Coast got pulverized by Superstorm Sandy. </p>
<p>This "Nor' Easter" packed such a wallop, <strong>it knocked out power to over 250,000 NYC residents!</strong> </p>
<p>I couldn't believe my eyes as I watched New Yorkers actually DUMPSTER DIVING for food after the storm, because they had no power and nothing to eat. </p>
<p>Talk about a slap in the face! </p>
<p>It wouldn't take much to shove us <strong>all</strong> into the nightmare of an extended blackout, from terrorism <strong><em>or</em></strong> extreme weather. </p>
<p>Take this past winter, which many people are calling "The Deep Freeze of the Century." </p>
<p>Record snow fall and Antarctic-like temperatures heaved additional stress on the grid that almost crippled it in America's Heartland. </p>
<p>This increased demand for electricity brought on by the "Polar Vortex" could have wiped out power for millions of people. </p>
<p>It was only the "heroic efforts by grid operators" that saved large parts of the country from total blackouts. </p>
<p>Another winter of subzero temperatures, ice and snow could spell disaster for communities all across the nation. </p>
<p>Phillip Moeller, head of the Federal Energy Regulatory Commission, states that, "the experience of this past winter indicates that the power grid is now already at the limit." </p>
<p>And it's only getting worse, thanks to Obama and the EPA. </p>
<p>Many Americans are blissfully ignorant; they can't even see the crisis that's headed right for us. Or maybe they just don't care&#8230; </p>
<p>For those folks, all I can say is "Good luck, you're going to need it." </p>
<p>But because you're here watching this video, I know that's not you. </p>
<p>You're not drinking the government Kool-Aid, and you know you've got to do whatever you can to protect your family. </p>
<p>I've learned over the years that if something's gotta be done, I've got to do it myself. </p>
<p>Just like you, I had to learn the lessons of self-reliance the hard way. </p>
<p>But, it's not just the government who's screwing things up with our weak power grid. </p>
<p><img src="/media/images/ppg/ppg-oto-uncle-01.jpg" class="img-responsive pull-left img-padding-right media" >You probably guessed by now that the power monopolies are as thick as thieves with the Feds, who supplies them an endless amount of cash, fat tax breaks, and regulation hell for the rest of us so they can force us to pay whatever the heck they want in rate hikes. </p>
<p>And for you and me, at least for the foreseeable future, it's just going to get worse. </p>
<p>Chances are, I bet we share the exact same red, white, and blue values. </p>
<p>We're Americans - we love our country, our history, and we believe in what America once was and could be again... </p>
<p>That's why we need to keep fighting. </p>
<p>And the only way to really do that and make it count? </p>
<p>By hitting Big Energy and government exactly where it hurts...their pocketbook. </p>
<p>It's a pretty bleak picture right now. </p>
<p>Soon, the burden on our already weak grid will become completely unsustainable. </p>
<p>Not to mention the fact that they're doing precisely NOTHING to harden the grid against the attacks that just keep coming. </p>
<h2 class="darkRed text-center">&quot;No Friends, If You Want To Survive The Coming Power Failures And Blackouts, The Bare-knuckled Truth Is That You Are Going To Have To Take Care Of It Yourself.&quot;</h2>
<p><img src="/media/images/ppg/ppg-oto-gasprices-01.jpg" class="img-responsive pull-left img-padding-right media" >Now, maybe you&rsquo;re thinking a backup generator would be just the ticket. But did you know that even a small generator with just enough juice to power a few appliances and lights costs over $70 a day to operate? </p>

<p><strong>That&rsquo;s over $500 a week…more than $25,000 a year!</strong></p>
<p>As a hard-working American, you probably don&rsquo;t have piles of cash like that stuffed into your mattress.</p>
<p>It takes a whopping 18 gallons of gasoline PER DAY to keep one of these generators running – talk about shocking! </p>
<p>We all know gas prices are currently approaching highway robbery…most places average $4.00 a gallon! Not to mention, when the power actually DOES go out, gas stations won&rsquo;t be charging their already ridiculous prices...they&rsquo;ll jack them up to reflect &quot;supply and demand&rdquo;...meaning they can charge whatever they want! $5, $6, even $10 a gallon – without blinking! So when you invest thousands of dollars in a gas generator, that&rsquo;s just the start…you&rsquo;ll have to pay through the nose just to keep the thing running. You stop paying, and it stops working.</p>
<p>Then there&rsquo;s the noise and pollution a generator makes…it&rsquo;s like advertising to any would-be looters, &quot;Hey, I&rsquo;ve got a generator, come and get it!&rdquo; <br> Don&rsquo;t kid yourself! When the bleep hits the fan, people will be trolling neighborhoods within a very short amount of time scouring for resources…food, water, and of course, power. </p>
<p>They will take what they want, and may even be armed. You certainly don&rsquo;t want to make yourself an easy target with a loud and stinky generator!</p>
<p>Plus, who wants to listen to that constant engine knock or breathe in all those smelly fumes? Not to mention having to keep a huge supply of flammable gasoline near your house at all times!</p>
<p>And the big question…</p>
<h2 class="darkRed text-center">&quot;What If You Can’t Get Any Gas Because The Stations Have Been Pumped Dry As A Bone?&quot;</h2>
<img src="/media/images/ppg/ppg-oto-riot-01.jpg" class="img-responsive pull-right img-padding-left media">
<p>Gas stations don&rsquo;t function without electricity, anyway!</p>
<p>What then? You&rsquo;d be SOL, that&rsquo;s what.</p>
<p>How about a natural gas generator? Well, sure! If you&rsquo;ve got an extra $10,000 to $30,000 burning a hole in your back pocket! </p>
<p>Because that&rsquo;s what it will cost to purchase one of these house-attached generators. Not to mention they are obscenely expensive to have professionally installed. And you can&rsquo;t take it with you if you have to bug out, either!</p>
<p>Nope…one strong storm will kill your power and your fancy generator in one fell swoop! Talk about a double whammy!</p>
<p>Clearly, any kind of traditional generator is not a great option and is out of reach for most folks.</p>
<p>So with the gasoline and natural gas generator out of the question, there has to be <strong>something</strong> else, right? </p>
<p>It&rsquo;s up to you to make sure your family has the electricity, food and warmth to keep them healthy, safe, and comfortable.</p>
<p>You need to know without a doubt, that when the things implode and the rest of the world is going berserk, your family will be secure, and that means being as energy independent as possible.</p>
<img src="/media/images/ppg/ppg-oto-looting-01.jpg" class="img-responsive pull-left img-padding-right media">
<p>You don&rsquo;t want to worry about our ancient and insecure power grid, which is dangling close to the edge of disaster.</p>
<p>You don&rsquo;t want to worry about a secret terror cell in some dark corner of the globe targeting already under-protected US electrical substations that might as well have a bright red bulls eye painted on their sides.</p>
<p>You don&rsquo;t want to have to resort to a gas guzzling or natural gas generator, which would require you to completely empty your bank account.</p>
<p>You don&rsquo;t want to worry about another Sandy or Katrina, wiping out power for days or weeks on end…leaving you and your family completely helpless…</p>
<p>You need to be sure you don&rsquo;t have to rely on any outside source to keep the lights on, appliances running, or your house warm or cool…</p>
<h2 class="darkRed text-center">&quot;So What’s The Answer?&quot;</h2>
<p><strong>The answer is having a way to harness the limitless and FREE energy from the sun, with a portable solar powered generator.</strong></p>
<p>Here&rsquo;s the truth, folks: You need to make your home a self-powered oasis…with a reliable, discreet, and MOBILE source of power.</p>
<p>No gas or propane required. Ever.</p>
<p>Think about it…letting go of the worry of what will happen to your family during an outage…and never again being at the mercy of a crumbling, weak, and unreliable power grid!</p>
<p>Hey… I didn&rsquo;t want other Americans to be kept chained up in fear of what might happen to them when the power goes out…or be at the mercy of our corrupt government&rsquo;s criminal negligence. So I took it upon myself to find a viable power-generating alternative that was reliable, discreet, and one you could take with you…anywhere!</p>
<p>Knowing there HAD to be something better out there, I searched high and low for just the right kind of solar powered generator.</p>
<p>One that could harness limitless FREE power from the sun…one that was powerful and could provide enough juice to keep vital devices running: lights, cell phones, laptops, tablets, small appliances, even a freezer and small fridge.</p>
<p>But most important? One that you could pack up in a matter of minutes, load into your car, truck, or RV, and get the heck out of dodge when a crisis hits.</p>
<p>I was completely frustrated by the lack of solutions on the market. So...</p>
<h2 class="darkRed text-center">&quot;I Finally Took Matters Into My Own Hands…&quot;</h2>
<p>I got in touch with a rogue engineer based in Utah who is just as passionate about this I am and 100 times more knowledgeable than me. This guy has spent years training as an engineer and has traveled all over the world for the past two decades, relentlessly researching the best way to generate and store the free power from the sun. </p>
<p>When I told him what I was trying to do, he got on board immediately...we got so worked up about the idea that we were both talking at once! I begged and pleaded, and he retreated to his lab for months of hard work.</p>
<p>Finally he had a design nailed down. And we found an innovative manufacturer who was willing to take chance on this idea. After months and months of tweaking and testing..</p>
<h2 class="darkRed text-center">&quot;I’m Proud To Introduce The Patriot Power Generator 1500.&quot;</h2>
<img src="/media/images/ppg/ppg-product-oto-01.jpg" class="img-responsive center-block">
<p>I can honestly tell you that you&rsquo;ll be stunned at how powerful and yet portable this complete generator is. It&rsquo;s got a state-of-the-art lithium-ion battery that charges completely using the included top of the line folding solar panel. At only 29 pounds, anybody can lift it and it fits neatly into almost any cargo space, ready to go at any time. </p>
<p>Compared to the alternatives, the Patriot Power Generator 1500 has so many advantages <strong>it&rsquo;s almost UNFAIR for it to even be on the market.</strong></p>
<p>Before I tell you more of the details, I keep coming back to this point…being able to have a power source like this that you can recharge ENDLESSLY, that will never run out of gas…and that you can keep safely and discreetly in your home OR grab it and go if you need to. This is true peace of mind for you and your family. </p>
<p>Just imagine…this one device could be the difference between being able to live through a crisis in safety and comfort, or having to scramble desperately to take care of even your family&rsquo;s most basic needs. Just think of all the ways you will use this:</p>
<ul>
	<li>Power your freezer, so you can have a long-lasting supply of food that&rsquo;s safe to eat, not to mention your slow cooker, toaster oven and even your coffee maker.</li>
	<li>Power enough lights for safety and comfort.</li>
	<li>Power your cell phones, computers, and radios so you can communicate with friends and family and stay informed.</li>
	<li>Power critical home medical devices, such as portable oxygen equipment, infusion pumps, CPAP machines, mobility devices and monitoring equipment.</li>
	<li>Power and electric blanket so you stay warm at night.</li>
	<li>And much more!</li>
</ul>
<p>Okay so…</p>
<h2 class="darkRed text-center">&quot;You Know It Isn’t A Matter Of IF You Need A Generator, But Which One?&quot;</h2>
<img src="/media/images/ppg/ppg-oto-checkmarks-01.jpg" class="img-responsive pull-left img-padding-right media">
<p>So let&rsquo;s take a moment here so you can understand why my <strong>Patriot Power Generator 1500 checks all the &quot;must have&rdquo; boxes to be the finest personal power source available on the market.</strong></p>
<p>First off, we all know that gasoline generators, the most common type on the market, will make a TON of noise and pollute the air with noxious fumes. They&rsquo;ll also DRAW UNWANTED ATTENTION when all hell is breaking loose outside, and marauders and looters are scanning your neighborhood for resources they can use for themselves.</p>
<p>And, with a true power grid failure (as in blackout), you&rsquo;re looking at entire systems breaking down…that means no gas, folks! It won&rsquo;t matter that you have a gas-powered generator if you can&rsquo;t supply it with the fuel it needs to work! It will be a 500 pound paper weight!</p>
<p>The Patriot Power Generator 1500 is much quieter than a gas/diesel generator, fume-free, discreet AND SAFE. There are no caustic, flammable chemicals or lead-acid batteries to worry you or your family. You can keep it right in your bedroom and still sleep like a baby.</p>
<p>Natural gas generators may be able to power your whole house, but guess what? If a storm flattens your residence, you&rsquo;re without your fancy generator AND the tens of thousands of dollars it costs to install!</p>
<p>The Patriot Power Generator 1500 is so simple to use, it&rsquo;s truly a &quot;plug and play&rdquo; generator. Even a child can easily use it.</p>
<h2 class="darkRed text-center">&quot;It Really IS As Easy As 1-2-3!&quot;</h2>
<img src="/media/images/ppg/ppg-oto-ppg-steps-01.jpg" class="img-responsive pull-right img-padding-left media">
<p><span class="brightBlue"><strong>Step 1:</strong></span> Unfold and set up your solar panel in the sunlight.</p>
<p><span class="brightBlue"><strong>Step 2:</strong></span> Plug the solar panel into the Patriot Power Generator 1500.</p>
<p><span class="brightBlue"><strong>Step 3:</strong></span> Plug in your electronic devices and enjoy free, abundant power from the sun!</p>
<p>The Patriot Power Generator 1500 offers up to 3,000 peak watts of clean, quiet, and totally FREE, renewable power – enough to power as many lights as you need for safety and comfort, your computer, TV, cell phone and even small appliances, like a small freezer or medical device – that will sustain your during a power outage caused by God knows what.</p>
<p>That&rsquo;s right – no additional costs ever – no gasoline, no propane – just the endless, FREE rays of the sun.<strong></strong></p>
<p>Not only that, but the Patriot Power Generator 1500 can hold a full battery charge for a staggering 6 months with only a 25% leak maximum – that&rsquo;s absolutely unheard of! </p>
<p>That means that you can &quot;set it and forget it&rdquo;…if a crisis hits you won&rsquo;t have to wait for it to charge. It will be good to go!</p>
<p>But I&rsquo;m saving the best for last. </p>
<p>As I&rsquo;ve said repeatedly throughout this entire presentation, any source of power is absolutely useless if you can&rsquo;t take it with you.</p>
<h2 class="darkRed text-center">&quot;That’s Why I Made Sure The Patriot Power Generator 1500 Was Small, Compact, AND Powerful.&quot;</h2>
<p>It weighs only 29 pounds, and at only 18&rdquo;L x 10&rdquo;W x 12&rdquo;H, is small enough to go anywhere with you. The compact size also means it&rsquo;s easy to store discreetly; no one needs to know you have a covert power source tucked away in your home. Don&rsquo;t be fooled by its small size, friends. This little generator packs a punch when it comes to delivering power. It can be fully charged in as little as 3.5 hours, and comes with a commercial grade, collapsible solar panel that folds up nice and easy.</p>
<p>I  always recommend to all of my friends and family to have a fully realized &quot;bug out&rdquo; plan. This is exactly what I envisioned when I came up with the Patriot Power Generator 1500. It&rsquo;s only a matter of time before a major event cripples the grid – and none of us knows if that will be for a few hours, days, or even weeks or longer!</p>
<p>But don&rsquo;t think you have to wait until the &quot;you-know-what&rdquo; hits the fan to take advantage of this little workhorse. Its small size, portability and ease of use make it perfect for camping, hunting and fishing trips, taking along on your next RV vacation, or even weekend tailgating. I bet you can picture literally a HUNDRED ways you will use and enjoy having an easy, free source of power!</p>
<p>We have to be prepared. And I&rsquo;ve thought of everything in this &quot;little generator that could&rdquo; so YOU don&rsquo;t have to…</p>
<p>Just so you can clearly see what makes my Patriot Power Generator 1500 head and shoulders above the rest, here it is &quot;up close and personal&rdquo;...</p>
<h2 class="darkRed text-center">&quot;Truth Is, My Generator’s Combination Of Features Gives It An Unfair Edge Over Its Competition...&quot;</h2>
<p> <strong>Lithium Ion Battery:</strong> my Patriot Power Generator 1500 contains a safe, state-of-the-art lithium-ion battery (this is the same kind of battery used in the iPhone). This is far superior to older, out of date lead acid batteries, which can leak caustic chemicals, causing a hazard to your family&rsquo;s health and safety. Plus they don&rsquo;t last nearly as long. </p>
<p> <strong>No assembly required:</strong> Your generator arrives already assembled and charged. You don&rsquo;t have to wait to try out your generator; you can start using it right away.</p>
<p> <strong>1000+ Life Cycles:</strong> This means you can fully drain and recharge your battery over 1,000 times, insuring a long life of peak performance and power when you need it. </p>
<p> <strong>The &quot;Triple Charge&rdquo; Advantage:</strong> Of course you can charge your generator using the included solar panels, but you can also charge it by plugging it into a wall outlet or by using a wind turbine.</p>
<p> <strong>3.5 Hour or Less Charge Time:</strong> It sounds incredible, but my Patriot Power Generator 1500 is fully charged and ready to go in just a few hours.</p>
<p> <strong>Holds a charge for up to 6 months:</strong> This generator requires virtually no maintenance. This means your generator is always ready when the lights go out...even if you aren&rsquo;t!</p>
<p> <strong>Up to 3,000 peak watts of power:</strong> Powers your cell phone, tablet, laptop, radio, several lights, and even small appliances and critical medical devices. With proper power management, you could power your freezer INDEFINITELY…you&rsquo;ll never have to worry about your food reserves going bad. </p>
<p> <strong>Multiple electrical outputs:</strong> There are 2 120 volt AC outlets (where you can plug in your standard issue 2 or 3 prong plug); 4 USB outlets for charging cell phones, tablets and other personal electronic devices; 1 12 volt DC outlet that you can use with a cigarette lighter adapter; and 1 12 volt Anderson Power Pole outlet, commonly used for emergency radio and CB units (for all you ham radio operators out there!). </p>
<p> <strong>Commercial grade, 100-watt solar panel cells manufactured by Bosch</strong> (a household name in electronics). This panel has a rugged, durable metal frame with reinforced corners…you don&rsquo;t need to worry about handling it with kid gloves! </p>
<p> <strong>The solar panel folds easily for discreet storage and transport anywhere</strong> and includes a sturdy carrying handle!</p>
<p> <strong>You can &quot;daisy-chain&rdquo; additional solar panels for even more power: </strong>You can easily connect additional solar panels to your generator to reduce charging time and power your devices even longer.</p>
<h2 class="darkRed text-center">&quot;So Let’s Talk About Reality Here.&quot;</h2>
<img src="/media/images/ppg/ppg-oto-sun-01.jpg" class="img-responsive pull-right img-padding-left media">
<p>You and I both know there are some things you simply can&rsquo;t put a price tag on…your family&rsquo;s safety and survival being the most important.</p>
<p>As you can see, for solutions that even come close to my Patriot Power Generator 1500, you could expect to pay $10,000 or more. But even though I could charge close to that, I simply in good conscience couldn&rsquo;t do that to my fellow hard-working, patriotic Americans.</p>
<p>Nope. I knew I had to offer the Patriot Power Generator 1500 at a price that wouldn&rsquo;t be completely out of reach for most folks.</p>
<p>So I&rsquo;m offering the Patriot Power Generator 1500 at an introductory price that will just basically cover the manufacturing costs and help me defray some of the research and development expenses. My friends think I&rsquo;m crazy to offer a state-of-the-art generator that&rsquo;s incredibly easy to operate at a discount, but it&rsquo;s because I feel that strongly about making sure you&rsquo;re secure.</p>
<p>For a very limited time and on a first-come, first-served basis, I am offering the Patriot Power Generator 1500 for the low price of $1997.</p>
<p>The Patriot Power Generator 1500 creates free electricity for you immediately and protects your family in case of a crisis. Isn&rsquo;t it worth the peace of mind to know you&rsquo;ve got the ONE thing – the GLUE – to keep your family&rsquo;s life together…no matter where you are?</p>
<p>You could be at home, or in your RV, cabin, or undisclosed, completely off the grid location…it DOESN&rsquo;T MATTER. <strong><em>If the sun is shining, you can charge your Patriot Power Generator 1500 for FREE. And it will power your critical devices 24 hours a day, 7 days a week, 365 days a year.</em></strong></p>
<p>Your decision today to ensure your family&rsquo;s survival with a clean and renewable power source that can go anywhere will allow you to focus on other areas of your bug out plan.</p>
<p>Remember…having a power source you can rely on is the foundation of any survival strategy. Without it, and you may as well be running a marathon on a darn treadmill.               		  </p>
<div class="margin-tb-50">
	<?php
	if($isUpgrade) {
		?>
		<div style="text-align:center;">
			<a href="/order/<?php echo $productDataObj->productId;?>"><img src="/assets/images/buttons/btn-orange-click-accept-02.jpg" name="submit" class="img-responsive center-block"></a>
		</div>
	<?php
	} else {
		?>
		<form action="/checkout/process.php" method="post" accept-charset="utf-8" id="optin-form2">
			<div style="text-align:center;">
				<input type="image" src="/assets/images/buttons/btn-orange-click-accept-02.jpg" name="submit" class="img-responsive center-block"/>
			</div>

			<div style="position:relative;margin 10 auto;">
				<div style="float:left;margin-right:5px;">
					<input type="checkbox" id="check2" name="check2">
					<img src="/assets/images/misc/yes-01.jpg" width="74" height="34" alt="Yes">
				</div>
				<div id="terms">I want to add the Patriot Power Generator 1500 to my order at the 1-time discount sale price of $1997.  I will get FREE Shipping with my Generator, Solar Panel &amp; bonuses (a $200 value) as well as a 100% 365-day guarantee.</div>
			</div>
		</form>
	<?php
	}
	?>
</div>
<div>
	<h2 class="darkRed text-center">&quot;To Make This A Truly Unbeatable Deal, I’m  Going To Add Some AMAZING Free Bonuses&quot;</h2>

	<div class="">
		<p><strong>Not one, not three, but TEN incredible FREE bonuses if you act now.</strong></p>
		<h3 class="darkRed text-center">Bonus #1: FREE SHIPPING (a $200 value!):</h3>
		<p><strong></strong> This is an incredibly valuable item, and I want to get it into your hands with the least amount of hassle and worry for you. Let me tell you, with state of the art technology like this, the Big Government regulators really make you jump through some serious hoops, but I&rsquo;ve &quot;dotted all the i&rsquo;s&rdquo; and &quot;crossed all the t&rsquo;s&rdquo; and fought through the red tape so you don&rsquo;t have to mess with it! Your Patriot Power Generator 1500 will be delivered right to your door in plain packaging that won&rsquo;t reveal the contents…it&rsquo;s totally covert. And it&rsquo;s all on my dime! And remember, it arrives fully assembled and charged, so it&rsquo;s ready to go as soon as you take it out of the box.</p>
	</div>
</div>
<div>
	<div>
		<img src="/media/images/ppg/ppg-product-cord-01.png"  style="margin-left:60px;margin-right:50px;" class="pull-left">
		<h3 class="darkRed text-center">Bonus #2: FREE 25 Foot Solar Panel Extension Cord (a $50 value):</h3>
		<p><strong></strong> Having this heavy duty extension cord for your solar panels means that your panels can be outside soaking up the sun while your actual generator is inside giving you much needed power!</p>
	</div>
	<div class="clearfix"></div>
</div>
<div>
	<img src="/media/images/ppg/ppg-product-book-01.jpg" class="img-responsive pull-left img-padding-right media">
	<h3 class="darkRed text-center">Bonus #3: &ldquo;Top 7 Reasons Why the Grid Will Fail&rdquo; (a $20 value): </h3>
	<p>In this report,<strong> </strong>learn exactly why our power grid is teetering on total collapse, and how to avoid the aftermath when it finally does! This is the information the government and the power companies DON&rsquo;T want you to see!</p>
</div>
<div class="clearfix"></div>
</div>
<div>
	<div>
		<img src="/media/images/ppg/ppg-product-book-02.jpg" class="img-responsive pull-left img-padding-right media">
		<h3 class="darkRed text-center">Bonus #4: &ldquo;The Blackout Response Guide&rdquo; (a $20 value): </h3>
		<p>Find out exactly what you can expect when a blackout hits, plus what you need to do beforehand to make sure you&rsquo;re prepared. Get the tips and tricks you need to keep your family safe and comfortable during the blackout, and what you can do after it&rsquo;s over to get life back to normal.</p>
	</div>
	<div class="clearfix"></div>
</div>
<div>
	<div>
		<img src="/media/images/ppg/ppg-product-book-03.jpg" class="img-responsive pull-left img-padding-right media">
		<h3 class="darkRed text-center">Bonus #5: &ldquo;Your Complete Power Failure Preparation Checklist&rdquo; <br>
			(a $20 value): </h3>
		<p>Now that you&rsquo;ve got your generator, make sure you have everything else you need to survive a crisis. You&rsquo;ll be surprised by the some of the common household items that can make a huge difference in a disaster situation!</p>
	</div>
	<div class="clearfix"></div>
</div>
<div>
	<div>
		<img src="/media/images/ppg/ppg-product-book-04.jpg" class="img-responsive pull-left img-padding-right media">
		<h3 class="darkRed text-center">Bonus #6: &ldquo;The 3 Hidden Dangers of the Smart Grid&rdquo; (a $20 value): </h3>
		<p>The government claims that so-called &ldquo;smart meters&rdquo; are going to help reduce energy use and lower costs. This report reveals what they&rsquo;re NOT telling you.</p>
		<p>The next three free bonuses are really my &ldquo;survival essentials,&rdquo; and I want to make sure you have them too.</p>
	</div>
	<div class="clearfix"></div>
</div>
<div>
	<div>
		<h3 class="darkRed text-center">Bonus #7: 72 Hour Survival Food Kit (a $27 value): </h3>
		<img src="/media/images/ppg/ppg-product-72hrkit-01.jpg"  class="img-responsive center-block margin-b-10">
		<p>You&rsquo;ll get<strong> </strong>a 72-hour emergency food kit packed in airtight packaging that&rsquo;s rated for 25 years of storage. That is 16 full servings of survival food, 3 days of complete meals. These meals are delicious, nutritious, easy to prepare and can literally save your life in a crisis.</p>
	</div>
	<div class="clearfix"></div>
</div>
<div>
	<div>
		<h3 class="darkRed text-center">Bonus #8: Survival Spring Personal Water Filter <br class="hidden-xs">(a $25 value):</h3>
		<p class="center"> <img src="/media/images/ppg/ppg-product-survival-spring-01.png" class="img-responsive center-block margin-b-10"></p>
		<p>This advanced water filter removes 99.999 percent of waterborne bacteria and parasites, and provides you with crystal-clear, life-giving water when no clean drinking water is available. It can be carried anywhere, since it weighs only two ounces. It contains no chemicals and no moving parts, and requires no electricity or batteries. </p>
	</div>
	<div class="clearfix"></div>
</div>
<div>
	<div>
		<img src="/media/images/ppg/ppg-product-tool-01.jpg" class="pull-left" class="img-responsive center-block margin-b-10">
		<h3 class="darkRed text-center">Bonus #9: Survival Multi-Tool (a $10 value):</h3>
		<p>This compact but powerful survival tool packs 11 functions into a tool no bigger than a credit card and fits right in your wallet, so you'll always have it handy. </p>
		<p>And one more, just for fun…</p>
	</div>
	<div class="clearfix"></div>
</div>
<div>
	<div>
		<img src="/media/images/ppg/ppg-product-cards-01.png" class="img-responsive pull-left img-padding-right media">
		<h3 class="darkRed text-center">Bonus #10:Power Playing Cards (a $10 value): </h3>
		<p>Even in the middle of a crisis, everyone needs something to relieve the tension and bring everyone together, and there&rsquo;s nothing like a deck of cards to provide hours of family entertainment. Plus, every playing card in this deck has a free tip about generating or conserving power.</p>

		<div class="clearfix"></div>
	</div>
</div>
<p>&nbsp;</p>
<div>
	<div>

		<h2 class="darkRed text-center">&quot;That&rsquo;s A Total Value Of Over <strong>$400</strong> … <br>
			And You’re Getting All 10 Bonuses Absolutely FREE!&quot;</h2>
		<h4><img src="/media/images/ppg/ppg-product-checkout-01.jpg" class="img-responsive center-block">
		</h4>
		<p>I am taking this deal one step further. Because I am a man on a mission to make sure every American has this kind of security, I am offering a...</p>
		<div class="clear"></div>
	</div>
</div>

<h2 class="darkRed text-center">&quot;365 Day, 100% Money-Back Guarantee On My Patriot Power Generator 1500&quot;</h2>
<img src="/media/images/ppg/ppg-oto-satisfaction-01.png" class="img-responsive pull-right img-padding-left media">
<p>Let me spell it out for you (you&rsquo;ll be floored by this!):</p>
<p>This is a 365 Day 100% money-back guarantee. I want you to try this in your home for a full year….really put it to the test. Charge it up and drain it multiple times…I want you to really get to know your generator and what it can do for you. If it doesn&rsquo;t do everything I say or if you&rsquo;re unsatisfied for any reason, return it and I&rsquo;ll give you your money back, <strong>no questions asked</strong>. <strong><em>You literally can&rsquo;t lose.</em></strong></p>
<p>Why I am offering this? Well, simply put, it&rsquo;s to demonstrate my level of confidence in the Patriot Power Generator 1500, and how simple it is to use. Most companies would choke on such a guarantee, but for me, it&rsquo;s just part of the way I want to do business – up front, honest, and ethical. <strong>The American Way.</strong></p>
<p>And please do not think you can get this generator anywhere else. You can&rsquo;t.</p>
<p>The Patriot Power Generator 1500 is NOT available from any store, website, or distributor. You can only get it here.</p>
<h2 class="darkRed text-center">&quot;Now, Here&rsquo;s The Most Important Part. My Supply On These Generators Is VERY LIMITED.&quot;</h2>
<p>I was only able to manufacture a small supply of these revolutionary generators, just under 300 in fact, and I am telling you the truth when I say I WILL RUN OUT…</p>
<p>AND QUICKLY. It takes 4 months to manufacture these state-of-the-art generators, so there will be a LONG wait for more units once we are sold out.</p>
<p>No pressure, but I need to give you fair warning on the supply situation. That&rsquo;s why you really do to need to act fast. </p>
<p>You can get your Patriot Power Generator 1500 in just a moment, but 1st...</p>
<h2 class="darkRed text-center">&quot;I Want You To Picture This In Your Mind...&quot;</h2>
<p>It&rsquo;s 8:47 AM and the &ldquo;you know what&rdquo; has just hit the fan. People are panicking. It&rsquo;s all over the radio and TV. A news anchor comes on the TV screen and in a shaky voice says &quot;We have reports of wide-spread power failures sweeping the area. The power here could go out at any moment. We are now in a state of emergency. I repeat, we are now in a state of…&quot;</p>
<img src="/media/images/ppg/ppg-oto-house-light.jpg" class="img-responsive center-block margin-b-10">
<p>The lights and TV blink out, and an eerie silence fills your home. </p>
<p>You turn on your portable AM radio and hear rumors of looting and other unrest. Panic is spreading and it&rsquo;s quickly becoming every man for himself.</p>
<p>You are safe at home with your family, thank goodness. But now your family is looking at you… &ldquo;What&rsquo;s going to happen?&rdquo; they ask. &ldquo;When will the power come back on?&rdquo; The look of fear in your family&rsquo;s eyes hits you like a punch to the gut. What are you going to tell your family? What have you done to prepare?</p>
<h2 class="darkRed text-center center-block title-max-560">&quot;Look, You Have Come To A Fork In The Road...&quot;</h2>
<p>It&rsquo;s entirely up to you which way you go.</p>
<p>If you don&rsquo;t take action to get your generator right now, you&rsquo;ll be in the same boat as the brainwashed masses who think &ldquo;everything is fine.&rdquo; And if a crisis hits and your family asks, &ldquo;When will the power come back on?&rdquo; your mouth will go dry and you&rsquo;ll feel powerless.</p>
<p>But what if you decide right now to secure your generator instead? Just imagine how much better you&rsquo;ll feel right away. And if a crisis hits and your family asks, &ldquo;When will the power come back on?&rdquo; you&rsquo;ll calmly reassure them that they&rsquo;re safe and they will have plenty of electricity to power the critical items. You can power the freezer… recharge cell phones and computers… keep critical medical devices going… and much more. </p>
<p>Your home will be a little island of light and warmth, even if it is dark everywhere else. Your generator will be a source of comfort and strength in the storm. Your family will think you&rsquo;re a hero… because you will BE a hero. Can&rsquo;t you just picture how that will feel?                        </p>
<h2 class="darkRed text-center">&quot;Listen, I Can’t Predict The Future.&quot;</h2>
<p>I don&rsquo;t know exactly when or how the next power grid disaster will hit. But from everything I see, it could be soon and it could be a big one. That&rsquo;s why I really want you to get your generator now. Click the &ldquo;Add To Cart&rdquo; button below. You&rsquo;ll be glad you did.</p>
<p>Remember, this generator makes free electricity from the sun. So even if I&rsquo;m wrong and everything turns out fine, then you&rsquo;ll still come out ahead and be able to generate free electricity to help reduce your power bill!</p>
<p>If you want to get real power independence &amp; security click on the button at the bottom of this page.</p>
<p>You&rsquo;ll be glad you did. This is about peace of mind, knowing that you and your family are well protected in the case of a blackout. Sounds good, right?</p>
<p>Click on the button below, and get your Patriot Power Generator 1500 rushed to you before they&rsquo;re all gone… and then rest assured knowing that you will be able to keep the lights on no matter what happens. Don&rsquo;t you deserve this?</p>
<p>To get your Patriot Power Generator 1500 rushed to you at this special price, plus the 10 FREE bonuses, click the big &quot;Get Started&quot; button below.</p>
<p>Folks, all the warning signs of a power grid disaster are blinking like the legendary neon lights of the Las Vegas strip. It couldn&rsquo;t be more obvious. It&rsquo;s not a question of if… it&rsquo;s a question of when. </p>
<p>So don&rsquo;t delay.</p>
<p class="text-center"><img src="/media/images/ppg/ppg-product-checkout-01.jpg" title="Patriot Power Generator" class="img-responsive center-block"></p>
<p>Click the &ldquo;Add To Cart&rdquo; button below now to get your Patriot Power Generator 1500 rushed to right away.</p>

</div>

<div class="container oto-width">

	<div>
		<a id="accept"></a>
		<?php
		if($isUpgrade) {
			?>
			<div style="text-align:center;">
				<a href="/order/<?php echo $productDataObj->productId;?>"><img src="/assets/images/buttons/btn-orange-click-accept-02.jpg" name="submit" class="img-responsive center-block"></a>
			</div>
		<?php
		} else {
			?>
			<form action="/checkout/process.php" method="post" accept-charset="utf-8" id="optin-form3">
				<div style="text-align:center;">
					<input type="image" src="/assets/images/buttons/btn-orange-click-accept-02.jpg" name="submit" class="img-responsive center-block"/>
				</div>

				<div style="position:relative;margin 10 auto;">
					<div style="float:left;margin-right:5px;">
						<input type="checkbox" id="check3" name="check3">
						<img src="/assets/images/misc/yes-01.jpg" width="74" height="34" alt="Yes">
					</div>
					<div id="terms">I want to add the Patriot Power Generator 1500 to my order at the 1-time discount sale price of $1997.  I will get FREE Shipping with my Generator, Solar Panel &amp; bonuses (a $200 value) as well as a 100% 365-day guarantee.</div>
				</div>
				<div class="text-center" style="margin-top:20px;"><strong>OR</strong></div>
			</form>
		<?php
		}
		?>
		<div class="noThanks">
			<a href="<?php echo $declineUrl;?>">No Thanks</a> – I want to give up this opportunity.<br />I understand that I will not receive this special offer again.
		</div>
	</div>

</div>
</div>
