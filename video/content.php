<script>
	// Change these values for the content within the "buttons" div to appear at this time.

	$(document).ready(function(){

		if ($.cookie("sawbutton")) {
			var hours = 0;
			var minutes = 0;
			var seconds = 5;
		} else {
			var hours = 0;
			var minutes = 27;
			var seconds = 51;
		}
		<?php
		//Conditionally changes the timer values
		if($_GET["poptimers"] == "false") {
			echo "var hours = 0;\n";
			echo "var minutes = 0;\n";
			echo "var seconds = 0;\n";
		}
		?>
		// Start by converting hours to milliseconds
		var time = hours * 60 * 60 * 1000;
		// Add minutes converted to milliseconds and add to total time
		time += minutes * 60 * 1000;
		// Add seconds to total time after converting to milliseconds
		time += seconds * 1000;

		if ($.cookie("sawbutton")) {
			// If return visitor that saw button, show alt button
			$("#reserve").oneTime(time, function() {
				$("#reserve").css("display", "block");
				$("#reserve").oneTime(5000, function() {
					$("#reserve").css("display", "none");
					$("#buyButton").css("display", "block");
					$("#buyButton2").css("display", "block");
					$(".content").css("display", "block");
				});

			});
		} else {
			// If visitor hasn't seen button yet, show default button
			$("#reserve").oneTime(time, function() {
				$("#reserve").css("display", "block");
				$("#reserve").oneTime(5000, function() {
					$("#reserve").css("display", "none");
					$("#buyButton").css("display", "block");
					$("#buyButton2").css("display", "block");
					$(".content").css("display", "block");
				});
			});
		}
		setTimeout(function(){$.cookie("sawbutton", "1", { expires: 30 });}, 30000);
	});
</script>
<div class="container subheader" onclick="showProductModal()"></div>
<div class="container-main">
	<div class="container">
		<div class="row hoverride">
			<div class="col-md-12">
				<div class="center-block text-center">
					<?php
					if($variation === "quiz") {
						echo "<h1><strong>Your Quiz Results Show THIS Is The #1<br class='hidden-xs'> Item To Hoard... So Why Is FEMA<br class='hidden-xs'> Trying To Buy It All Up?</strong></h1>";
					} else {
						?>
						<?php
						if($_GET["pub"]) {
							echo "<div style='font-size:18pt;'>Special presentation for ". $pubArray[$pub] ." </div>";
						}elseif($variation == "gb") {
							echo "<div style='font-size:18pt;'>Special presentation for fans of Glenn Beck and TheBlaze...</div>";
						}
						?>
						<?php
						if($vsl === "fs") {
							?>
							<h1><strong>Obama’s Food Stamp “Time Bomb”<br> Is About To Explode</strong></h1>
							<?php
						}elseif($vsl === "3f") {
							?>
							<h1><strong>3 Foods NEVER To Eat<br> In A Crisis</strong></h1>
							<?php
						}else {
							?>
							<h1><strong>Why Was This Video Banned?</strong></h1>
							<?php
						}}
					?>
				</div>
			</div>
			<div class="col-md-12">
				<!-- Button Stuff -->
				<div id="buyButton" class="center-block text-center" style="display:none">
					<a href="<?php echo $offerUrl; ?>"><button type="button-1" class="btn-1">Choose My Kit</button></a>
					<p style="color:#002287;">(This Takes You To The Product Options Page)</p>
				</div>
			</div>
			<div class="col-md-12">
				<div id="videobox">
					<?php
					if($variation === "pu") {
						?>
						<iframe src="//fast.wistia.net/embed/iframe/7lkd7964gi" allowtransparency="true" frameborder="0" scrolling="no" class="wistia_embed" name="wistia_embed" allowfullscreen mozallowfullscreen webkitallowfullscreen oallowfullscreen msallowfullscreen width="640" height="360"></iframe>
						<script src="//fast.wistia.net/assets/external/E-v1.js" async></script>
					<?php
					} elseif($vsl === "stansberry") {
					?>
						<iframe src="//fast.wistia.net/embed/iframe/gswb4vuajj?videoFoam=true" allowtransparency="true" frameborder="0" scrolling="no" class="wistia_embed" name="wistia_embed" allowfullscreen mozallowfullscreen webkitallowfullscreen oallowfullscreen msallowfullscreen width="640" height="388"></iframe>
						<script src="//fast.wistia.net/assets/external/E-v1.js"></script>
					<?php
					} elseif($vsl === "fs") {
					?>
						<iframe src="//fast.wistia.net/embed/iframe/0lf2bumkj0" allowtransparency="true" frameborder="0" scrolling="no" class="wistia_embed" name="wistia_embed" allowfullscreen mozallowfullscreen webkitallowfullscreen oallowfullscreen msallowfullscreen width="640" height="360"></iframe>
						<script src="//fast.wistia.net/assets/external/E-v1.js" async></script>
					<?php
					}elseif($vsl === "3f") {
					?>
						<iframe src="//fast.wistia.net/embed/iframe/vnqcpflkl1" allowtransparency="true" frameborder="0" scrolling="no" class="wistia_embed" name="wistia_embed" allowfullscreen mozallowfullscreen webkitallowfullscreen oallowfullscreen msallowfullscreen width="640" height="360"></iframe>
						<script src="//fast.wistia.net/assets/external/E-v1.js" async></script>
					<?php
					}else {
					?>
						<iframe src="//fast.wistia.net/embed/iframe/voc8m0rg1a" allowtransparency="true" frameborder="0" scrolling="no" class="wistia_embed" name="wistia_embed" allowfullscreen mozallowfullscreen webkitallowfullscreen oallowfullscreen msallowfullscreen width="640" height="360"></iframe>
						<script src="//fast.wistia.net/assets/external/E-v1.js" async></script>
						<?php
					}
					?>
				</div>
				<div class="col-md-12">
					<div id="reserve" style="display:none;">
						<div class="text-center center-block"><img src="/assets/images/misc/loading-01.gif" width="600" height="205" alt=""/> </div>
					</div>
					<!-- Button Stuff -->
					<div id="buyButton2" class="center-block text-center" style="display:none">
						<h2 class="darkRed" style="margin-top: 5px; margin-bottom:0px;"><strong>Act fast! Your reservation and discount <br> are guaranteed until...</strong></h2>
						<div id="countDownTimer"></div>
						<a href="<?php echo $offerUrl; ?>"><button type="button-1" class="btn-1">Choose My Kit</button></a>
						<p style="color:#002287;">(This Takes You To The Product Options Page)</p>
					</div>
				</div>
			</div>
		</div>

		<div class="content" style="display: none;">
			<!-- start of section 1 -->
			<section class="section dots-top">
				<div class="section-inner">
					<!-- start of block white -->
					<div class="white-bg">
						<div class="section1-header">
							<h2 class="dark-red">&quot;A Letter From The Feds That Chilled Me To The Bone...&quot;</h2>
							<p class="section-description">Not too long ago, FEMA went directly to my supplier and tried to buy up my entire stockpile of high-quality survival food. It sounds crazy, but I'll show you the exact letter they sent in a minute.</p>
							<p></p>
							<p>Revealing FEMA's plot could land me in hot water, but I think  <strong>you deserve to know exactly what they're doing.</strong></p>
							<p>Sounds fair, right?</p>
							<p>I'm about to show you undeniable proof that FEMA is on the hunt for as much survival food as they can grab in 24 hours.</p>
						</div>
						<div class="padding-all pad-bottom">
							<img src="/media/images/f4p/letter/f4p-letter-fema.jpg" width="320" height="241" class="media has-bg right">
							<p><strong>&quot;I've got to tell you - it's really disturbing.&quot; </strong></p>
							<p>You can imagine that FEMA was willing to pay a pretty penny; the kind of money small businesses dream about in an economy like this. Money that would probably come with a nice, fat government contract.</p>
							<p><strong>The fact is - they must know something we don't.</strong></p>
							<p>My first thought was that they must be trying to control the supply. Control the food supply and you control the people. I mean, it worked for Stalin and Mao, right? Why not Obama?</p>
							<p><i>But then I dug deeper and I think the situation is even worse. </i></p>
							<div class="clear"></div>
						</div>
					</div>
					<div class="clear"></div>

					<!-- start of brown block -->
					<div class="brown-bg">
						<div class="block-header-brown"><!-- 0 padding on bottom -->
							<h3 class="color-red">&quot;I Have Proof... They Know Something We Don’t&quot;</h3>
						</div>
						<div class="inner block-header-brown"><!-- 0 padding on bottom -->
							<img src="/media/images/f4p/letter/f4p-letter-president1.jpg" width="336" height="208" class="media right">
							<p>I think that FEMA knows something we don't and is worried that they see a full-scale disaster about to hit. And I think I found the factors that will trigger it.</p>
							<p>Before I talk about these warning signs, you need to see the actual letter FEMA sent my supplier so <strong>you can see the proof with your own eyes and make up your own mind.</strong></p>
							<p>It's been all over the Internet. Facebook and even some big radio programs like Alex Jones picked up this story. It seems like everyone is just plain shocked that FEMA would send a letter like this.</p>
							<p><strong>Here's what happened:</strong> FEMA wrote to my partner, Matt, over at the warehouse and wanted to know exactly how many.. Well, maybe I should just let Matt show you the proof since he was the one who received the letter...</p>
							<div class="text-center">
								<img src="/media/images/f4p/letter/f4p-letter-fema-letter-1.jpg" width="500" height="443" alt="FEMA letter" class="img-responsive center-block">
							</div>
							<p style="text-align: center;" class="caption">100% Genuine letter from FEMA... demanding to know how much<br class="hidden-sm hidden-xs"> food we can ship and how fast!</p>
							<div class="blockquote-1">
								<p>"Thanks Frank. Well, it was kind of crazy to get a letter from FEMA. I don't mean to sound paranoid, but FEMA is asking some questions that make me pretty nervous.</p>
								<p>The FEMA and the Department of Homeland Security demanded to know</p>
								<ul style="font-style: italic; padding-top: 15px; margin-left: 20px">
									<li><strong>How much</strong> of emergency food we can deliver immediately.</li>
									<li><strong>How many</strong> food kits we&rsquo;ve got on hand...  (With the government&rsquo;s power to seize supplies in a quote &ldquo;state of emergency&rdquo;, I don&rsquo;t think I want to answer this)</li>
									<li><strong>If we can ship</strong> dedicated truckloads <em>(that means a truck heading straight for FEMA with nothing but survival food just for them)</em> by the pallet – and how many pallets we could cram in each truck</li>
								</ul>
								<p>And the strangest question of all – if we worked like mad men, <strong>how much emergency food could we produce in 24 hours...</strong></p>
								<br><br>
								<p>I gotta tell you, Frank, I'm real concerned. This letter is proof that FEMA wants our emergency survival food. They don't want anyone to know it, and they want to take immediate delivery.</p>
								<br><br>
								<p>And let's not forget the most important part of this - why the sudden urgency? What do they know that we don't?”</p>
							</div>
							<p></p>
							<p>I hear you, Matt. From the sounds of it, something big is about to happen and it's no wonder that our food is literally flying off the shelves. It makes sense, doesn't it? </p>
							<div class="dots-snake">
								<div class="dots-img">1</div>
							</div>
							<h3 class="color-red pad-30-b" style="text-align: right;">&quot;You Should Know That FEMA Won’t Get <br>1 Single Emergency Food Kit From Us.&quot;</h3>
							<img style="" src="/media/images/f4p/letter/f4p-letter-section1-block2-img2.png" width="423" height="472" class="media-contain left img-responsive">
							<p>This is truly an urgent situation, but don't worry - you should know that <strong>FEMA and Homeland Security won't get one single emergency food kit from us.</strong></p>
							<p>Why?</p>
							<p>Because we don&rsquo;t believe that these critical emergency food kits should be in the hands of the government, <strong>stored in some secret warehouse and with the rest of us left with table scraps in a crisis.</strong></p>
							<p>Because we understand that without this food many patriots will be <strong>downright helpless in a disaster.</strong></p>
							<p>Because our goal is to <strong>get this life-saving food into the hands of people like you</strong> and me as quick as possible.</p>
							<p>Sounds good, right?</p>
							<p>But with FEMA competing for the exact meals you are, there's no time to waste, and here's why:</p>
							<p>Like my buddy Matt told me, even though we decided not to sell to FEMA, <i>it's only a matter of time before they find some other company who will.</i></p>
							<p>And when they do, it will almost certainly create a shortage of the raw ingredients that we use for our kits, especially because we refuse to replace our high-quality made-in-America food ingredients with foreign stuff, raising prices and making survival food completely unavailable at any price.</p>

							<h3 class="color-red pad-30-t-b">&quot;But That's Not The Only Danger That Could <br>Snatch Your Food Stockpile Out Of Your Hands.&quot;</h3>
							<p>Heck, we've had a rush of people taking advantage of our special "Fire Sale" offer to grab their food kits to protect their family.</p>
							<p>Now to be blunt, this is a first-come-first-serve opportunity and <strong>because of all the controversy, I cannot guarantee supply forever.</strong></p>
							<p>Which means if we run out before you have a chance to claim your kit, I'm sorry, but you'll just have to wait and hope we can get more in before something really bad hits.</p>

							<h3 class="color-red pad-30-t-b text-center">&quot;Frankly, I Was Startled By The Staggering Demand&quot;</h3>
							<p>Over the last few weeks, my warehouse has been shipping out more truckloads of food packed to the brim than I've ever seen. Which is great if you've already put your order in.</p>
							<div class="media-contain right full-right text-center">
								<img src="/media/images/f4p/letter/f4p-letter-truck.jpg" width="500" height="318" class="img-responsive">
								<div class="caption">Our trucks are packed to the brim and shipping<br class="hidden-sm hidden-xs"> more survival food than ever before!</div>
							</div>
							<p>But the bad news is, if you're just hearing about these food kits for the first time, then you're already behind the 8-ball and need to act fast before they're all gone.</p>
							<p>Fortunately, as soon as FEMA said they wanted to take all my food, I put in an extra-large order for more food in anticipation of whatever the government is so urgently preparing for.</p>
							<p>So depending on how much food you need, you can get my Food4Patriots kits for as low as $1.11 per serving.</p>
							<div class="media-contain left full-left text-center">
								<img src="/media/images/f4p/letter/f4p-letter-production-line.jpg" width="500" height="318" class="img-responsive">
								<div class="caption">Our production facility is working around the clock right now to<br class="hidden-sm hidden-xs"> meet the increased demand. </div>
							</div>
							<p>And we're doing everything we can to accelerate packing and shipping so we can rush your kit to you as soon as you order it.</p>
							<p>I'm going to keep doing this as long as I can. I hope we can help patriots all across the United States feel protected in case of disaster for years to come.</p>
							<div class="clear"></div>
						</div>
					</div>

					<!-- start of white block -->
					<div class="block bg-white">
						<div class="block-header-blue"><!-- 20 margin on top -->
							<h3 class="color-blue" style="text-align: right;">&quot;But Here's Why This Fire Sale Could End <br>In A Matter Of Days...&quot;</h3>
						</div>
						<div class="padding-all">
							<img src="/media/images/f4p/letter/f4p-letter-empty-shelves.jpg" width="288" height="239" class="media has-bg left full-left" style="margin-bottom:10px;">
							<p>First, Matt could run out of the raw ingredients needed to get these kits produced.</p>
							<p>I'd be shocked if FEMA stopped looking for suppliers just because we turned them down. And there are companies a whole lot bigger than us that can buy up all the ingredients.</p>
							<p>Second, and I hope the government never gets to this point, part of me thinks that FEMA might have wanted to know how much food we've got in stock in case they ever decided to take it!</p>

							<h3 class="color-red pad-40-t pad-30-b">&quot;With A Stroke Of Obama’s Pen, Food Confiscation Could<br class="hidden-sm hidden-xs"> Start… Tomorrow!&quot;</h3>
							<p>The fact is, they could walk in and seize every single kit of food we've got in our warehouse at the drop of a hat.</p>
							<p>All it would take is President Obama declaring a "state of emergency". </p>
							<div class="media-contain right full-right text-center">
								<img src="/media/images/f4p/letter/f4p-letter-obama-02.jpg" width="438" height="239" class="img-responsive">
								<div class="caption">That’s right...Obama can seize your<br class="hidden-sm hidden-xs"> food with the stroke of his pen.</div>
							</div>
							<p>The actual term for this “legal confiscation” is the <strong>“National Defense Resources Preparedness Act.”</strong> All he needs is his phone and his pen and food confiscation could begin…tomorrow.</p>
							<p>But the real thing that keeps me up most nights?  <i>It’s the way FEMA wanted to know how many meals we could ship out in 24 hours.</i></p>
							<p>It makes me think they know something that we don't…and it could happen soon.</p>
							<p>That brings us to the third reason this offer could grind to a halt. </p>
							<p></p>

							<h3 class="color-red pad-30-t-b" style="text-align: right;">&quot;If You Don’t Prepare, The Horror Of A FEMA Camp<br class="hidden-sm hidden-xs"> Could Be In Your Future...&quot;</h3>
							<p>I can't tell the future, but from everything I've seen, the U.S. could be on the brink of a major disaster. If I'm wrong, life will go on like normal, and I'll happily admit that I was off my rocker.</p>
							<div class="media-contain left full-left text-center">
								<img src="/media/images/f4p/letter/f4p-letter-fema-camp.jpg" width="428" height="239" class="img-responsive">
								<div class="caption">FEMA camps are breeding grounds for<br class="hidden-sm hidden-xs"> filthy conditions and violent crime!</div>
							</div>
							<p>But if I'm right, this could force our friends and neighbors into FEMA camps. And you probably already know a FEMA camp isn’t anywhere you’d want you or your family to end up.</p>
							<p>They make an old-style Soviet gulag sound like a day at the beach.</p>
							<p>Think I’m kidding? Just imagine the bleak living conditions folks had to endure in one of those Godforsaken places after Hurricane Katrina and Superstorm Sandy.</p>
							<p>Things like:</p>
							<ul style="margin-left: 20px">
								<li>Bitter cold or blistering heat from living in a tent with no insulation...</li>
								<li>Inadequate food… (just think about those New Yorkers dumpster diving for food after Superstorm Sandy...rifling through disgusting TRASH, scraping off bugs and dirt, just to find anything remotely edible! And that was only three days after the storm!)</li>
								<li>Crime, from robbery to assault to rape and worse... (remember those first few days post-Katrina? Even the police were afraid to be out on the street!)</li>
								<li>The Feds refusing to let folks return to their homes or even leave and FEMA agents in your personal business, watching your every move. It would feel like you’re in prison…just for the crime of being unprepared!</li>
							</ul>
							<p>The media will be turned away, forbidden from filming inside the camps.</p>
							<div class="media-contain right full-right text-center">
								<img src="/media/images/f4p/letter/f4p-letter-handcuffed-man.jpg" width="428" height="237" class="img-responsive">
								<div class="caption">Don’t even think about resisting, or you’ll be<br class="hidden-sm hidden-xs"> silenced…your property taken…or even worse… </div>
							</div>
							<p>And if YOU tried to show the world a glimpse of the hell you were living through inside? They’ll outright just take your phone or other mobile devices!</p>
							<p>No warning, questions, or giving back your confiscated property.</p>
							<p>And the list goes on. You want to avoid that kind of nightmare, right? Of course you do...</p>
							<p>Now let’s talk about some basic facts.</p>

							<h3 class="color-red pad-30-t-b">&quot;Obama Knows: Control the Food Supply, Control the People...&quot;</h3>
							<p>Just like governments have understood for centuries, if you control the food supply, you control the people.</p>
							<p>After all, there's no way to live without food and water, which is exactly why you need to have your own personal food stockpile.</p>
							<span style="color: #000" class="more"><i>But here's the catch...</i><span class="dots-down"></span></span>
							<p></p>
							<div class="clear"></div>
						</div>
					</div>

					<!-- start of white block -->
					<div class="block flat-brown">
						<h3 class="color-red pad-30 pad-60-t" style="text-align: center;">&quot;If You Stockpile The Wrong Foods You Could Be Setting<br class="hidden-sm hidden-xs"> Up Your Family To Starve&quot; </h3>
						<div class="padding-all">
							<p>It sounds harsh, but the truth is most people are giving themselves a false sense of security. </p>
							<p>Maybe it's by...</p>
							<ul style="margin-left: 20px">
								<li><strong>Buying terrible-tasting MREs.</strong> Depending on where you buy them from, they could be nearly expired. </li>
								<li><strong>Getting disgusting so-called “survival” foods</strong> that are packed with cheap fillers and are high in salt, MSG and preservatives.</li>
							</ul>
							<p>Remember that guy that ate nothing but McDonald’s every meal for a month straight? He started off healthy and by the time it was over, he was nearly ready to keel over! </p>
							<p>The bottom line is if you make any of the million-and-one mistakes while you're designing your food stockpile, your family won't just pay for it with unhealthy eating. </p>
							<p><strong>It can cripple their hope.</strong></p>
							<p>Imagine you've got an entire stockpile of food you think will feed your family just fine in a crisis.</p>
							<p>How would you feel to find it crawling with maggots, roaches, and rats when you need it?</p>
							<p>Or that your canned goods are expired and infected with deadly bacteria like botulism?</p>
							<div class="media-contain right full-right text-center">
								<img src="/media/images/f4p/letter/f4p-letter-canfood-maggots.jpg" width="426" height="237" class="img-responsive">
								<div class="caption">How’d you like to be starving, only to open a can of…BUGS!<br class="hidden-sm hidden-xs"> This happens ALL THE TIME and can happen to you</div>
							</div>
							<p>Your survival plan would be ruined, and you’d have to tell your starving family:</p>
							<p><i>“There’s nothing to eat.”</i></p>
							<p>That’d feel pretty awful, wouldn’t it? By then, your only choice would be starvation… or a dreaded government-run FEMA camp.</p>
							<p>And like Ronald Reagan once said… the 10 most terrifying words you’ll ever hear are:</p>
							<p><i>“I’m from the government, and I’m here to help you.”</i></p>
							<p>And there’s something else to consider.</p><p></p>

							<h3 class="color-red pad-30-b" style="text-align: right">&quot;Total Anarchy When 47 Million Freeloaders Can’t<br class="hidden-sm hidden-xs"> Get Their Government Handouts!&quot;</h3>
							<p>Under Obama, the number of Americans on the government dole has increased from around a little over 27 million in 2008 to <strong>47 million</strong> today – that’s just about 15% of the whole damn country! </p>
							<p>They don’t call him the “Food Stamp President” for nothing! Now, of course you and I were raised to help others in need.</p>
							<p>The difference was, people had pride back then… they wanted gainful employment, the ability to go to work each day, and make enough to feed and clothe their families and put a roof over their head.</p>
							<p><i>Nowadays it’s an entirely different story.</i></p>
							<p>We’ve all heard of “The Greatest Generation” (this was my Dad and his buddies), The Baby Boomers, Generation X, …but now, we have to contend with “Generation Entitlement.”</p>
							<p>And folks, it really doesn’t have much to do with age. It’s a mindset.</p>
							<p><strong>It’s the belief that the country owes you a living for just existing and breathing air.</strong></p>
							<p>Just like that surfer that made the news in California, living it up on YOUR taxpayer dime, buying LOBSTER with his food stamp card and proud of the fact he’s a good-for-nothing bum! </p>
							<p>He’d much rather play “rock star” than get a job and earn a respectable living, like other hard-working Americans. It’s losers like him that really get my blood boiling. Just look at him!</p>
							<div class="media-contain left full-left text-center">
								<img src="/media/images/f4p/letter/f4p-letter-welfare-troll.jpg" width="422" height="237" class="img-responsive">
								<div class="caption">This bum thinks you should foot his<br class="hidden-sm hidden-xs"> grocery bill…so he can play “rock star!”</div>
							</div>
							<p>These are the kind of people that my Grandpa used to say “always want something for nothing.”</p>
							<p>And our socialist-in-chief and his minions are all too happy to provide it… because it keeps them and their kind in power, election after election.</p>
							<p><strong>Which brings me to my next point...</strong></p>
							<p>What do you think is going to happen when the real crap hits the industrial-sized fan, and 47 million people, or one-sixth of the population, can’t get their handouts?</p>
							<div class="clear"></div>
						</div>
					</div>

					<!-- start of blue block with flag -->
					<div class="block bg-blue bg-flag">
						<h3 class="color-blue medium-size700 pad-30-t-b " style="text-align: center;">&quot;It’s Not IF Disaster Strikes… It’s WHEN.&quot;</h3>
						<div class="inner medium-size pad-30-b">
							<p>When a disaster hits and FEMA completely drops the ball (as usual!), it could spark riots and looting just like Katrina… except this time on an explosive, massive scale.</p>
							<p>It can be a crisis from crazy weather that produces monster storms...</p>
							<p>A terrorist attack on our crumbling power grid...</p>
							<p>Another outbreak of Ebola, this time causing a nationwide pandemic… (remember that even healthcare workers in hazmat suits got infected, folks!)</p>
							<p>...or any other kind of hellish scenario.</p>
							<p>There’s no way to tell when it will hit. But it IS coming.</p>
							<p>Heck, we’ve already seen a record amount of violence and looting this year… and we aren’t even in a full on crisis… YET!</p>
							<div style="padding-bottom: 10px" ">
							<img src="/media/images/f4p/letter/f4p-letter-looters.jpg" class="img-responsive center-block" width="422" height="237" />
						</div>
						<p style="text-align: center;" class="caption">Looters would be rampant… just like Ferguson or Baltimore...</p>
						<p>Which is why I want you to really think about this...</p>
						<p>Think about the disaster footage you’re seeing on the news these days, pretty much 24/7.</p>
						<p><strong>How long before the disaster is at YOUR front door?</strong></p>
						<p>Hordes of desperate people roaming the streets of YOUR town. Grocery stores picked over and shelves stripped bare.</p>
						<p>Get the picture?</p>
						<p>Because this is the reality we are looking at when the next big crisis happens.</p>
						<p>At no time in history have we had so many people as dependent on government as we do today. It’s a ticking time bomb… 47 million people strong.</p>
						<p>Do I really have your attention now?</p>
						<div class="clear"></div>
					</div>
				</div>
				<!-- start of flat brown block -->
				<div class="block flat-brown">
					<h3 class="color-red pad-30 text-center">&quot;There’s Not A Second to Waste...&quot;</h3>
					<div class="padding-no-top">
						<p>It’s painfully obvious you’ve got to act… and fast… if you’re going to protect your loved ones from toxic hunger and food riots in a full-blown crisis that last days, weeks, or even longer.</p>
						<p>I’ve made it my personal mission to help as many true American Patriots become as “food independent” as possible, so we never have to be at the mercy of some Federal bureaucrat, standing in line to beg for whatever rations the Obama regime sees fit to dole out.</p>
						<p>So this is what I did…</p>
						<h3 class="color-red pad-30 text-center">&quot;I Decided to Stop Worrying&quot;</h3>
						<p>My partner Matt and I put together our own survival food kit containing only cream of the crop food, made 100% in the U.S.A.</p>
						<p>I wanted only the absolutely best tasting meals that provided the most nutrition for breakfast, lunch, and dinner and that were useful for the long haul.</p>
						<p>That means they had to be conveniently packed in airtight containers that would be easy to conceal, move and store for more than just a couple of years.</p>
						<p>I’m talking decades, folks.</p>
						<div><img src="/media/images/f4p/letter/f4p-letter-kit-tote-01.jpg" width="868" height="550" style="margin-top: -50px" class="img-responsive center-block"  alt="Food4Patriots Kit"/></div>
						<p style="text-align: center;" class="caption">Our packaging ensures our food stays fresh and delicious for<br class="hidden-sm hidden-xs"> decades – guaranteed for 25 years!</p>
						<p>After months of work and research, we finally cooked up our first batch, and I knew we had something nobody else did: American-made food that I'd be happy to feed my own kids and grandkids.</p>
						<p>The food was delicious, easy to store long-term, and best of all, it was packaged right here in the U.S. of A.</p>
						<p>That’s why we decided to call it Food4Patriots!</p>
						<p>Plus, it didn't have any of those harmful chemicals or genetically modified ingredients, no MSG, and no mystery “Frankenfood.”</p>
						<div class="clear"></div>
					</div>
					<div class="clear"></div>
				</div>
			</section>
			<!-- start of section 2 -->
			<section class="section">
				<div class="section-inner">
					<div class="block flat-brown">
						<div class="block-header grad-red">
							<h2 class="color-light-brown" style="text-align: center; padding: 10px 0;">&quot;But To Be Honest, We Were Worried<br>That This Was Too Good To Be True.&quot; </h2>
						</div>
						<div class="padding-all ">
							<p>After putting it all together, I had to give myself a reality check. This was amazing! But was it going to cost an arm and a leg?</p>
							<p><strong>The short answer was… no.</strong></p>
							<img src="/media/images/f4p/letter/f4p-letter-food1.jpg" width="250" height="255"  class="media left" style="margin-bottom:10px;margin-top:5px">
							<p>I’ll explain why in just a minute (the answer is so simple you won’t believe it!).</p>
							<p>The survival food we make for you doesn't cut any corners. You'll understand what I mean when you see exactly how your meals are made.</p>
							<p><strong>First, we take 100% non-GMO</strong> fruits and veggies as a starting point. </p>
							<p>Our food is <u>made in America.</u> Not assembled from Chinese imported ingredients. Grown, harvested, and made here in the land of the free and home of the brave.</p>
							<p>Next, we combine these top-quality ingredients <strong>using prize-winning recipes.</strong> In fact, many of the recipes we use have won independent taste tests. </p>
						</div>
						<h3 class="color-red pad-30 no-pad-top">&quot;Space-Age Mylar Packaging Keeps Our Food Fresh… For 25 Years!&quot;</h3>
						<div class="padding-no-top">
							<p>To keep our meals as fresh as the day we package them, we seal them up in convenient airtight pouches that make it easy for you to prepare.</p>
							<p><i>And here is another of the big things my buddy Matt does differently...</i></p>
							<div class="media-contain right full-right text-center">
								<img src="/media/images/f4p/letter/f4p-letter-production-line-02.jpg" width="500" height="318" class="img-responsive">
								<div class="caption"></div>
							</div>
							<p>Some manufacturers freeze-dry their food (which is hideously expensive for you), while other manufacturers use the cheaper rapid dehydration method that sucks out all the water but also pulls out nutrients and flavor with it.</p>
							<p>My meals are made with our unique "Low Heat Dehydration" method.</p>
							<p>So the flavor and nutrition stays locked in and it lasts every bit as long as freeze-dried without costing you a fortune.</p>
							<p><strong>Can you see now why our food has been called “The Stockpiler's Dream?” </strong></p>
							<div class="media-contain left full-left text-center">
								<img src="/media/images/f4p/letter/f4p-letter-fettuccine-alfredo.jpg" width="422" height="222" class="img-responsive">
								<div class="caption">Creamy Fettuccine Alfredo is just one of the delicious<br class="hidden-sm hidden-xs"> meals that you’ll savor...</div>
							</div>
							<p>But there's one more critical step before your food is finished. </p>
							<p>It takes a $150,000 machine to package these meals to the highest industry standards.</p>
							<p>It works like this: space-age Mylar pouches are blasted clean with CO2 gas, and then the container is packed to the brim with a hefty helping of your delicious food. This gets any leftover oxygen out so food won't spoil and in fact is guaranteed for an amazing <strong>25 years</strong> of shelf life.  </p>
							<p>That’s right: <strong>25 years!</strong></p>
							<p>And it’s not just the packaging. We go through a 17-step quality control and lab testing procedure for each and every batch of our survival food to ensure that the flavor, nutrition and storage life meets our highest standards.</p>
							<p>See how much better that is for you and your family? But don’t take my word for it…</p>
							<p></p>
							<div class="clear"></div>
						</div>
					</div>
					<div class="block bg-white">
						<h3 class="color-blue pad-30" style="text-align: center;">“But You Don’t Have To Take My Word For It...”</h3>
						<div class="padding-no-top">
							<p>Coast to coast, people are telling me they love Food4Patriots superior taste and convenience.</p>
							<p>See how Chloe, one of our happy customers, was convinced she made the right choice as soon as she took her first bite. She said, and I quote:</p>
							<div style="margin-top: -10px;margin-bottom: 20px"><img src="/media/images/f4p/f4p-testimonial-31.jpg" width="630" height="207" class="img-responsive center-block" /></div>
							<p>Most folks who have gotten a Food4Patriots kit have been ecstatic with the long-term packaging, taste, and how easy it is to store.</p>
							<p>Here’s a note from Wanda, a lifelong Girl Scout, who’s always been preparing for emergencies. See why she chose Food4Patriots as her best option for long-term food security:</p>
							<div style="margin-top: -10px;margin-bottom: 20px"><img src="/media/images/f4p/f4p-testimonial-30.jpg" width="630" height="200" class="img-responsive center-block"/></div>
							<p>Especially now that FEMA's come knocking, I’m on a mission to get as many life-saving food kits to as many American families as possible.</p>
							<p>Sometimes I get a letter from a customer that reminds me just how critical this is.</p>
							<p>Donna told me about the agony of losing everything, and how having a Food4Patriots stockpile now gives her the priceless peace of mind she needs to cope.</p>
							<p>Here are her own words:</p>
							<div style="margin-top: -10px;margin-bottom: 20px"><img src="/media/images/f4p/f4p-testimonial-32.jpg" width="630" height="552" class="img-responsive center-block"/></div>
							<p>I have to tell you, this really hit me right in the gut. THIS is why we’re doing this, folks. We’re really making a difference in people’s lives!</p>
							<div class="clear"></div>
						</div>
					</div>
					<!-- start of flat brown block -->
					<div class="block flat-brown">
						<h3 class="color-red pad-30 pad-60-t" style="text-align: center;">&quot;Just To Remind You, It’s A 100% First-Come,<br class="hidden-sm hidden-xs"> First-Serve Basis.&quot; </h3>
						<div class="inner medium-size800 padding-no-top">
							<p>We can’t predict how long we’ll be able to offer these survival food kits as low as $1.11 per serving.</p>
							<p>Look, I'd rather you get your own personal food stockpile than see Homeland Security hoard them.</p>
							<p>Since these are clearing out fast I'll be ordering as many as I can. But if this new FEMA demand drains up all the raw ingredients, there may be no way of restocking - indefinitely.</p>
							<p>Keep in mind we have over 106,321 customers who have already taken us up on “The Stockpiler’s Dream.”</p>
							<div class="text-center">
								<a href="<?php echo $offerUrl; ?>"><button type="button-1" class="btn-1">Choose My Kit</button></a>
								<p style="color:#002287;">(This Takes You To The Product Options Page)</p>
								<div class="clear"></div>
							</div>
							<p>So, why is our food flying off the shelves?</p>
						</div>
					</div>
					<div class="block bg-white">
						<h3 class="color-blue pad-30" style="text-align: center;">“A Snap to Prepare – Even a Kid Could Do It!”</h3>
						<div class="padding-no-top">
							<p><strong>First, this is delicious food that you can prepare in three simple steps.</strong></p>
							<p>You don't have to worry about cooking complex recipes when you're stuck in a disaster. You can make these meals in less than 20 minutes with no hassle. </p>
							<p>Just add your packet of food to boiling water...</p>
							<p>Simmer...</p>
							<p>And serve!</p>
							<p>Can you picture how easy this is? It's so simple even kids can make them.</p>
							<p>And don't worry, you'll get a whole slew of choices for breakfast, lunch, and dinner so you don't get stuck eating the same thing day in and day out.</p>
							<p>One of the questions most people have is, "What kind of food will I get to eat?" I know what you’re worried about… that we’re talking about bland, tasteless mush. But that couldn’t be further from the truth.</p>
							<div style="margin-bottom: 10px"><img src="/media/images/f4p/letter/f4p-letter-food2.jpg" width="500" height="116" class="img-responsive center-block"/></div>
							<p style="text-align: center;" class="caption">You'll get a whole slew of choices for breakfast, lunch, and dinner.</p>
							<p>I've picked some of my favorites to give you variety. Here's a list of just a few of the choices:</p>
							<ul style="margin-left: 20px">
								<li>Mountain Man Granola</li>
								<li>Apple Orchard Oatmeal</li>
								<li>Granny's Home Style Potato Soup</li>
								<li>Blue Ribbon Cheesy Rice (My kids actually beg me to make this one all the time!)</li>
								<li>Heartland’s Best Mashed Potatoes</li>
								<li>Creamy Beef Stroganoff</li>
							</ul>
							<p>And just to prove we’re on the level about how great this food really tastes, we did a secret taste test with the good folks over at The Blaze, the world’s most popular conservative news website.</p>
							<p>They loved the taste so much, they had no idea it was “survival food!”</p>
						</div>
					</div>
					<div class="block flat-brown">
						<div class="padding-no-top">
							<h3 class="color-red pad-30 pad-60-t" style="text-align: center;">&quot;Mouthwatering Freshness And Taste...<br class="hidden-sm hidden-xs"> Even After 25 Years!&quot;</h3>
							<p><strong>Second, you get my guaranteed "disaster-proof" packaging.</strong></p>
							<p>I may not have used "showy" packaging for expensive branding, but I did make sure it's military-grade sturdy stuff and can stand up to the crazy things that happen in a crisis.</p>
							<p>This food has a shelf life of up to 25 years, so you have complete peace of mind for the long term.</p>
							<img src="/media/images/f4p/letter/f4p-letter-food-packets.jpg" width="500" height="342" class="img-responsive center-block"/>
							<p style="text-align: center;" class="caption">Meals as fresh as the day we package them… no matter when you need them.</p>
							<p>I've used Mylar pouches, the same material used in NASA's space suits. This means you'll keep all the air, moisture, and light out of the package.</p>
							<p>It'll also keep the food nutritionally sound and tasting great. So when you need your food stockpile it'll be guaranteed to be as fresh as the day you bought it.</p>
						</div>
					</div>
					<div class="block bg-white">
						<div class="padding-no-top">
							<h3 class="color-red pad-30 pad-60-t" style="text-align: center;">&quot;Nutrition You’ll Need When Normal Life<br class="hidden-sm hidden-xs"> Becomes A Thing Of The Past...&quot;</h3>
							<p><strong>Third, you get food jam-packed with nutritional value.</strong></p>
							<p>Since I had a chance to go direct to the supplier to build this kit, I was able to throw out all the filler and poor-quality ingredients other guys stuff into their meals. All the food you'll receive is at the peak of the long-term food reserve industry.</p>
							<p>Loren is just one of our happy customers who loves the convenience:</p>
							<div style="margin-top: -10px;margin-bottom: 20px"><img src="/media/images/f4p/f4p-testimonial-33.jpg" width="630" height="176" class="img-responsive center-block"/></div>
							<p>But here's the other important part: you don't have to settle for smaller serving sizes for kids.</p>
							<p>Some people use kids’ meals to skimp on the amount of food they give you. In Food4Patriots, kids get a full adult-size portion without getting charged extra.</p>
						</div>
					</div>
					<div class="block flat-brown">
						<div class="padding-no-top">
							<h3 class="color-red pad-30 pad-60-t" style="text-align: center;">&quot;Survival Food That Doesn’t Scream...<br class="hidden-sm hidden-xs"> ‘Here’s My Food, Come Take It!&quot;</h3>
							<p><strong>Finally, you get an easy-to-store package that takes up minimal space.</strong></p>
							<p>Nobody wants to cram their house full of clunky food packages.</p>
							<p>So many food storage containers are ultra-bulky and come in a slew of awkward shapes and sizes, which makes it difficult to discreetly store food reserves in the average American home.</p>
							<div><img src="/media/images/f4p/letter/f4p-letter-storage-totes.jpg" width="541" height="342" class="img-responsive center-block"/></div>
							<p style="text-align: center;" class="caption">The sturdy totes are discreet – so no one will know you have a secret stash of high-quality survival food… except you.</p>
							<p>I've selected the most compact kits I could find so you can store them without any extra hassle. They're sturdy, waterproof, and stack easily.</p>
							<p>Since we both know a major food emergency could strike any time, these critical characteristics will give you instant peace of mind when your food package arrives.</p>
							<p>No more worrying about what you'd have to do, or having to rely on the government.</p>
							<p>Heck, you'll have the exact same stuff they wanted to buy!</p>
							<p>Take a look at this checklist showing you exactly how Food4Patriots stacks up against other methods of stockpiling food. You’ll see right away how there’s no comparison:</p>
							<div style="margin-bottom: 10px"><img src="/media/images/f4p/letter/f4p-letter-infograph.jpg" width="643" height="342" class="img-responsive center-block"/></div>
							<p style="text-align: center;" class="caption">Don’t make the mistake of stockpiling inferior products that are going<br class="hidden-sm hidden-xs"> to backfire and disappoint when you need them most.</p>
							<p>And it’s not just our 106,321 customers who are praising Food4Patriots to the skies… celebrities and survival experts are recommending “the perfect survival food solution.”</p>
							<p>Customers and experts agree: Food4Patriots really IS the perfect survival food solution! Even Glenn Beck sings the praises of Food4Patriots survival food.</p>
							<div class="johnson-box-01">
								<div class="row">
									<div class="col-sm-12 col-md-12">
										<div class="pull-left hidden-xs" style="margin-right:25px;width:198px;">
											<img src="/media/images/f4p/f4p-glen-beck-07.png" width="198" height="198" alt="Glenn Beck Food4Patriots" />
											<div style="font-size: 13px;">
												<div style="float:left;">
													<audio id="beckAudioSrc" src="/media/audio/f4p-beck-testimonial-02.mp3" preload="auto">Your browser does not support HTML5 Audio</audio>
												</div>
												<img id="beckAudioControl" src="/assets/images/misc/speaker_off.gif" width="36" height="36" class="audioControl" onclick="toggleAudio('beck');">Listen to Glenn.
											</div>
										</div>
										<p>Dear Friends,</p>
										<p>"These meals are delicious, nutritious, and rated for 25 years of storage. I would like you to try some for yourself. Do your own homework. Try it. Taste it."</p>
										<p>- Glenn Beck</p>
									</div>
								</div>
							</div>
							<p>The fact is, you get what you pay for and you can't expect this kind of quality to come cheap.</p>
							<p>Now here's the problem: if you're like most people, you don't have that kind of cash lying around...</p>
							<p><strong>But Matt and I found a way to make this work...</strong> and it’s dead simple. We buy in bulk.</p>
							<p>Now just to give you some perspective, a bulk order costs tens of thousands of dollars and is a decade of food for my family of four. My first thought was...</p>
							<p><strong>“We just don't need that much food.”</strong></p>
							<p>But I figured if I could get this information out to people like you, you'd want to grab the same discount I got and would claim your own food package.</p>
							<p>That way I wouldn't be stuck with a big bill for more food than we could ever eat.</p>
							<p>Click the orange button below to choose your kit.</p>
							<div class="text-center">
								<a href="<?php echo $offerUrl; ?>"><button type="button-1" class="btn-1">Choose My Kit</button></a>
								<p style="color:#002287;">(This Takes You To The Product Options Page)</p>
								<img src="/media/images/f4p/letter/f4p-letter-credid-cards.png" width="198" height="22"/><br><br>
								<span class="small gray">Order Online Any Time<br>24 Hours a Day / 7 Days a Week / 365 Days a Year</span><br>
								<img src="/media/images/f4p/letter/f4p-letter-mcaffe.png" width="197" height="52"/><br>
								<div class="clear"></div>
							</div>
						</div>
					</div>
					<div class="block bg-white">
						<div class="padding-no-top">
							<h3 class="color-red pad-30 pad-60-t" style="text-align: center;">&quot;Confession: Survival Food This Good Won’t<br class="hidden-sm hidden-xs"> Always Be This Cheap&quot;</h3>
							<p>But I've got a confession to make about this delicious food - it won't always be this cheap. In fact, imagine what will happen when you see the headlines.</p>
							<p><strong><i>"Food prices skyrocketing. Grain shortage forces farms to close and cows starve."</i></strong></p>
							<p>Since the Food4Patriots package is made from honest-to-goodness ingredients produced by farmers here in the U.S. of A., when a crisis hits it'll automatically skyrocket the prices of this kit.</p>
							<p>Farms will shut down and their livestock will go hungry. Grain shortages will drive bread to $10, $25, even $100 per loaf.</p>
							<h3 class="color-red pad-30" style="text-align: center;">&quot;Looters Scouring the Streets Looking for Victims...&quot;</h3>
							<p>When a crisis hits, stores will be hit by angry urban swarms demanding food and other supplies.</p>
							<p>Just think, people stampede for toys on sale on Black Friday at Walmart. When they and their children are starving because they didn't prepare, riots and roving mobs are almost certain.</p>
							<div style="margin-bottom: 10px"><img src="/media/images/f4p/letter/f4p-letter-mob.jpg" width="422" height="235" class="img-responsive center-block"/></div>
							<p style="text-align: center;" class="caption">Desperate mobs will troll neighborhoods… looking to steal your food!</p>
							<p>Get the picture?</p>
							<p>Now the last thing I want happening is someone to give up their chance to claim their Food4Patriots package because they couldn't afford it.</p>
							<span class="more">The fact is... <span class="dots-down"></span></span>
							<div class="clear"></div>
						</div>
					</div>
					<!-- start of flat brown block -->
					<div class="block flat-brown">
						<h3 class="color-red pad-30 pad-60-t" style="text-align: center;">&quot;Food Stockpiles Shouldn’t Only Be For Well-Off Americans&quot; </h3>
						<div class="inner medium-size800 padding-no-top">
							<p> I know most people couldn't afford to spend $5,000, $10,000, or even $30,000 on a stockpile which is why the biggest question a lot of people probably have right now is, "How much does it cost?"</p>
							<p>I feel like you can't put a price on food independence and the peace of mind that gives.</p>
							<p>Now I know every family is different and there's no one-size-fits-all survival food solution.</p>
							<p>So I've put together different Food4Patriots kits based on servings to feed one adult, and you can customize your kit to keep your family healthy and happy, for as low as $1.11 per serving.</p>
							<p><strong>You can pick the exact food kits that’ll work for you and your family.</strong></p>
							<p>No need to buy less or more than you will actually use, so nothing goes to waste.</p>
							<p>It’s easy to see why we’ve shipped our food kits to over 106,321 American Patriots just like yourself, and why the number continues to grow every day; it’s because this is truly an exceptional value.</p>
							<p>Paula readily admits she’s ecstatic with Food4Patriots. She exclaims:</p>
							<div style="margin-top: -10px;margin-bottom: 20px"><img src="/media/images/f4p/f4p-testimonial-34.jpg" width="630" height="207" class="img-responsive center-block"/></div>
							<p>Here’s Rom’s take on Food4Patriots and its quality, storage life, and the fact he can take it with him wherever he goes:</p>
							<div style="margin-top: -10px;margin-bottom: 20px"><img src="/media/images/f4p/f4p-testimonial-35.jpg" width="630" height="210" class="img-responsive center-block"/></div>
							<p>Food4Patriots is so good, Joe is even making it part of his regular meal plan! Joe talks about treating himself to a Food4Patriots “gourmet meal” anytime for a low cost and with a better variety of options he can find at his local grocery! He says:</p>
							<div style="margin-top: -10px;margin-bottom: 20px"><img src="/media/images/f4p/f4p-testimonial-36.jpg" width="630" height="241" class="img-responsive center-block"/></div>
							<p>These are not anonymous, paid, fake reviews, folks. Only real Food4Patriots customers can review a food kit they purchased.</p>
							<p><strong>You see how this really is the perfect survival food solution? </strong></p>
							<p>To get on the road to food independence, just click the button to claim your kit now.</p>
							<div class="block txt-center">
								<div class="inner pad-30">
									<a href="<?php echo $offerUrl; ?>"><button type="button-1" class="btn-1">Choose My Kit</button></a>
									<p style="color:#002287;">(This Takes You To The Product Options Page)</p>
									<br/>
									<img src="/media/images/f4p/letter/f4p-letter-credid-cards.png" width="198" height="22"/>
									<br/><br/>
									<span class="small gray">Order online. Any Country. Any Time<br/>24 Hours a Day / 7 Days a Week / 365 Days a Year</span>
									<br/>
									<img src="/media/images/f4p/letter/f4p-letter-mcaffe.png" width="197" height="52"/>
									<br/>
									<div class="clear"></div>
								</div>
							</div>
							<p>When you choose Food4Patriots, you’re choosing to join 106,321 patriots who have decided to take charge and take their survival into their own hands.</p>
							<p>As you can see we’re no fly-by-night operation. No sir.</p>
							<p>Once you become a Food4Patriots customer, you become part of our family, and we’ll make sure you’re treated right.  Our friendly customer service team is standing by to help you anytime, ready to help answer all your questions about our amazing survival food.</p>
							<p>Here’s a recent snapshot we took so you can see we’re real people – Americans – not some 800 number being routed over to some foreign basement call center in India or the Philippines, forced to talk with someone named “Bob” with an accent you can barely understand.</p>
							<div style="margin-bottom: 10px"><img src="/media/images/f4p/letter/f4p-letter-customer-service-team.jpg" width="421" height="235" class="img-responsive center-block"/></div>
							<p style="text-align: center;" class="caption">We’re real true blue American Patriots…just like YOU!</p>
							<p>With us, you’ll only be dealing with Josh, Bonnie, Ray, Lisa and other tried and true American Patriots just like you.</p>
						</div>
					</div>
			</section>
			<!-- start of section 3 -->
			<section class="section">
				<div class="section-inner">
					<div class="block bg-white">
						<div class="block-header grad-white-brown">
							<h2 class="dark-red" style="text-align: center;">&quot;I’m Going To Add 4 FREE Bonuses To Sweeten The Pot.&quot;</h2>
						</div>
						<div class="padding-50-top">
							<p>At this point I know you’re probably champing at the bit to get your hands on this food, but just to make this a complete no-brainer for you, <strong>I'm also offering four incredible FREE bonuses if you act now.</strong></p>
							<div>
								<img src="/media/images/f4p/letter/f4p-letter-eBook-10-items-after-crisis.jpg" width="187" height="180" alt="Bonus 1"  class="media left img-responsive">
								<div style="padding-top:0px;">
									<p><strong class="titles3">Free Bonus #1 - Top 10 Items Sold Out After a Crisis:</strong> In this report you'll learn the 10 items you absolutely need to hoard. If you miss this you'll be forced to go without them in a crisis. You'll also learn how to snag them on the cheap, sort them securely, and pump out every ounce of nutrition they have to offer.</p>
								</div>
							</div>
							<div class="clearfix"></div>
							<div>
								<img style="padding-bottom: 10px" src="/media/images/f4p/letter/f4p-letter-eBook-the-water-survival-guide.jpg" width="187" height="180" alt="Bonus 1" class="media left img-responsive">
								<div style="padding-top:0px;">
									<p><strong class="titles3">Free Bonus #2 - The Water Survival Guide:</strong> Look, without clean water you can't prepare a scrap of food. You've got to have this to complete your stockpile. Not to mention the fact dehydration can hit in as little as 7 hours and turn a full-grown man into a whimpering child. This down-and-dirty guide will show you desperate-times only water sources to keep your family from going thirsty. It'll also walk you through the basics of water storage, how to find a source and tricks to easily grab water in an emergency.</p>
								</div>
							</div>
							<div class="clearfix"></div>
							<div>
								<img src="/media/images/f4p/letter/f4p-letter-eBook-the-survival-garden-guide.jpg" width="187" height="180" alt="Bonus 1"  class="media left img-responsive">
								<div style="padding-top:0px;">
									<p><strong class="titles3">Free Bonus #3 - The Survival Garden Guide:</strong> A long-term food stockpile works best when you can add in some succulent and well-preserved fruits and veggies. In this guide you get the lowdown on outdoor gardens, indoor gardens, freezing, and long-term storage. This is like "food insurance" so your family can eat fresh-picked produce or delicious home-canned delicacies even in a disaster.</p>
								</div>
							</div>
							<div class="clearfix"></div>
							<div>
								<img src="/media/images/f4p/letter/f4p-letter-eBook-cut-grocery-bills-half.jpg" width="187" height="180" alt="Bonus 1"  class="media left img-responsive">
								<div style="padding-top:0px;">
									<p><strong class="titles3">Free Bonus #4 - How to Cut Your Grocery Bills in Half:</strong> It's sad to see how much most Americans are forced to spend every time they go to the grocery store. Odds are you've seen an increase in spending, too. Well it doesn't have to be like that. To help out I'm going to show you my down-and-dirty tricks to getting the best deal…this goes a lot further than clipping coupons!</p>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="dots-snake small-gap">
								<div class="dots-img2">1</div>
							</div>
							<p>And when you click the button below you'll see a couple of special deals I just added so you can get an even longer-term supply of survival food for as little as $1.11 per serving.</p>
							<p>This is what I personally recommend for the ultimate in food security, plus some extra special bonus gifts that aren't available to everyone.</p>
							<p>It's not cheap to put together survival food of this quality, but I want anyone to be able to afford to have food independence and be protected from the coming crisis.</p>
							<div class="clear"></div>
						</div>
					</div>
					<!-- start of blue block with flag -->
					<div class="grad-red pad-40-t-b">
						<h2 class="color-white" style="text-align: center;">"An Outrageous DOUBLE Guarantee You Won’t Find<br class="hidden-sm hidden-xs"> Anyplace Else – That’s How Serious I Am!"</h2>
					</div>
					<div class="block bg-blue bg-flag ">
						<div class=" pad-30  ">
							<img src="/media/images/f4p/letter/f4p-letter-section6-block1-img1.png" width="410" height="250" class="media right no-marg-bot absolute img-responsive">
							<p><span class="titles3"><strong>Guarantee #1:</strong></span><strong>&nbsp; </strong>is a 100% money back guarantee, no questions asked. If, for any reason, you're not satisfied with your Food4Patriots Kit, just return it within 60 days of purchase and I'll refund 100% of your purchase price. If you try it and decide it's not as delicious and nutritious as I promised, you can have your money back for any reason or no reason whatsoever. That way there's absolutely no risk for you.</p>
							<p><strong><span class="titles3">Guarantee #2:&nbsp;</span></strong>is an unheard of 300% money back guarantee. If you open your Food4Patriots meals anytime in the next 25 years and find your food has spoiled or gone bad, you can return your entire Food4Patriots stockpile and I will triple your money back!</p>
							<p>Does that sound fair to you? That's how confident I am that this food will remain just as delicious and nutritious for the next 25 years as it is on the day you buy it.</p>
						</div>
					</div>

					<!-- start of flat brown block -->
					<div class="padding-50-top">
						<p>It may sound crazy to offer this double guarantee, but to be honest I'm not really worried about it.</p>
						<p><strong>Here's why:</strong> I'm so confident you're going to see the value in your Food4Patriots kit as soon as you have it in your hands. You'll want to keep it and enjoy every bite of the delicious food.</p>
						<p>But whether you choose to start dipping into your Food4Patriots stockpile right away to stretch your food dollars, or you decide to keep it under lock and key so you're ready for any kind of crisis, you need to know one thing...</p>
						<p>By claiming your Food4Patriots Kit you made the decision not just to get food to feed your family in a disaster, you've made the decision to get peace of mind.</p>
						<p>Food4Patriots customer Jan was thrilled with the shelf life, and the discreet, compact packaging too. Here’s exactly what she said:</p>
						<div style="margin-top: -10px;margin-bottom: 20px"><img src="/media/images/f4p/f4p-testimonial-37.jpg" width="630" height="247" class="img-responsive center-block"/></div>
						<p>Can you picture how good it's going to feel to have this security and independence? Heck, if you've got an elderly friend or family member nearby you can get a kit for them so you don't have to worry if they're eating or not in a disaster.</p>
						<p>Now a last reminder, don't worry, there's no pressure to claim your Food4Patriots kit. In fact, if you don't want it, you can step aside. No hard feelings.</p>
						<p>There are plenty of other people who are dead set on preparing right now and they see that with all the uncertainty and warning signs we’re seeing on a daily basis, time is running out.</p>
						<h3 class="color-red pad-30-b" style="text-align: center;">&quot;Look, You Have Come To A Fork In The Road And It’s<br class="hidden-sm hidden-xs"> Entirely Up To You Which Way You Go&quot; </h3>
						<p>But if you're serious about your family's stockpile and want to get real food independence and security, <strong>click on the orange “Choose My Kit” button</strong> you see at the bottom of this page.</p>
						<p>You'll be glad you did.</p>
						<p>This is about peace of mind, knowing that you and your family are well protected in the case of food shortages and natural disasters. Sounds good, right? </p>
						<p>Click on the button below and get your Food4Patriots stockpile rushed to you before they're all gone, and then rest assured knowing that you will be able to feed your family well into the future no matter what happens.</p>
						<p><strong>Don't you deserve this? </strong></p>
						<p>To get your Food4Patriots kit rushed to you at this special price, plus the four free bonus reports, click the big orange “Choose My Kit” button at the end of this page.</p>
						<h3 class="color-red pad-30-b" style="text-align: center;">&quot;One Final Warning Before It’s Too Late...&quot;</h3>
						<p>If you decide to claim your package, there is something you should know about.</p>
						<p><strong>It's a danger I call 25-year stockpile greed.</strong></p>
						<p>When a food crisis strikes there are really two groups of people: the people who prepared, and the people who didn't.</p>
						<p>If you've read this far my guess is you're someone who's going to prepare. But let me warn you - the rest of the world may very well be greedy for your stockpile.</p>
						<p>Especially now that we know that FEMA wants to hoard these meals too.</p>
						<p><i>It's easy to imagine.</i></p>
						<p>If they run out of food for their children, they'll be willing to take anyone's food to get them fed. And unless you have a covert stockpile, your name could very well make it on that list.</p>
						<p>To keep your Food4Patriots order under the radar, we ship it in normal unmarked packaging. There are no flashy logos, advertisements or emblems on the outside. Not even the postman will know what you're getting.</p>
						<p><strong>Click the “Choose My Kit” button down below to get started.</strong> Don't leave empty handed! You can get a kit with three square meals a day for as little as $1.11 per serving. Are you ready to get started?</p>
						<p>Claim your Food4Patriots package now. Click the big orange “Choose My Kit” button below.</p>
						<div class="text-center">
							<a href="<?php echo $offerUrl; ?>"><button type="button-1" class="btn-1">Choose My Kit</button></a>
							<p style="color:#002287;">(This Takes You To The Product Options Page)</p>
							<img src="/media/images/f4p/letter/f4p-letter-credid-cards.png" width="198" height="22"/><br><br>
							<span class="small gray">Order Online Any Time<br>24 Hours a Day / 7 Days a Week / 365 Days a Year</span><br>
							<img src="/media/images/f4p/letter/f4p-letter-mcaffe.png" width="197" height="52"/><br>
							<div class="clear"></div>
						</div>
					</div>

					<!-- start of flat brown block -->
					<div class="block flat-brown">
						<h3 class="color-red pad-40-t" style="text-align: center;">&quot;You Can Get Your Food4Patriots Kit In Just A Moment,<br class="hidden-sm hidden-xs"> But First, Picture This In Your Mind...&quot;</h3>
						<div class="padding-all">
							<p>It's 9:07 AM and the "you know what" has just hit the fan. People are panicking. It's all over the radio and TV.</p>
							<p>A news anchor comes on the TV screen and in a shaky voice says, "We are in a state of emergency. I repeat, we are now in a state of emergency."</p>
							<p>The 47 million freeloaders spoon-fed by "big government" are marching in the streets. There are rumors of looting. In fact there's a mob at your local grocery store. Like a swarm of locusts, the mob completely cleans out the grocery store in less than two hours, leaving the shelves completely bare.</p>
							<p>Panic is spreading and it's quickly becoming every man for himself.</p>
							<p>You're safe at home with your family, thank goodness. But now your family is looking at you. "What's going to happen?" they ask. And then your spouse pulls you close and whispers in your ear, "What are we going to eat?"</p>
							<div class="clear"></div>
						</div>
					</div>

					<!-- start of flat dark brown block -->
					<div class="block flat-brown dark has-bot-dots">
						<div class="padding-all">
							<p>Act now, and you’ll never have to worry about how you’re going to answer that question. Your food stockpile will be a source of comfort and strength in the storm. Your family will think you're a hero, because you will BE a hero. Can't you just picture how that will feel?</p>
							<div class="clear"></div>
						</div>
						<span class="dots-down-section"></span>
					</div>
				</div>
			</section>

			<!-- start of section 4 -->
			<section class="section">
				<div class="section-inner">
					<div class="block bg-white">
						<div class="block-header">
							<h2 class="dark-red">&quot;Look, You Have Come To A Fork In The Road And It's Entirely Up To You Which Way You Go.&quot;</h2>
							<div class="section-description">
								<img src="/media/images/f4p/letter/f4p-letter-f4p-disasters.jpg" width="240" height="333" class="media right" style="margin-bottom:10px;">
								<p>Look, I can’t make it any plainer than this.</p>
								<p>You’re at a crossroads. You can either take action NOW and be able to feed your family in a crisis, or you can be one of the hordes of helpless idiots clamoring for a crust of bread when everything collapses.</p>
								<p><strong>One thing is clear… you’ve got to make a choice.</strong></p>
								<p>Be sure to make the right one.</p>
								<p>Click the button below. You'll be glad you did. Remember, this is delicious food good for 25 years of storage.</p>
								<p>So even if I'm wrong and everything turns out fine, then you'll still come out ahead with your food stockpile because if you don't need it, just eat it!</p>
								<p>To claim your Food4Patriots kit at this special price, plus your FREE bonuses, click the “Choose My Kit” button now.</p>
							</div>
						</div>
					</div>
				</div>
			</section>

			<!-- start of section 5 -->
			<section class="full-width">
				<div class="section-inner">
					<div class="bg-light bg-flag">
						<div class="padding-60-top">
							<h2 class="color-red large"><strong>Choose My Kit Now!</strong></h2><br>
							<a href="<?php echo $offerUrl; ?>"><button type="button-1" class="btn-1">Choose My Kit</button></a>
							<p style="color:#002287;">(This Takes You To The Product Options Page)</p>
							<img src="/media/images/f4p/letter/f4p-letter-credid-cards.png" width="198" height="22"/><br><br>
							<span class="small gray">Order Online Any Time<br>24 Hours a Day / 7 Days a Week / 365 Days a Year</span><br>
							<img src="/media/images/f4p/letter/f4p-letter-mcaffe.png" width="197" height="52"/><br>
							<div class="clear"></div>
						</div>
					</div>
					<div class="bg-light-dark">
						<div class="padding-all"><a href="https://honesteonline.com/members/consumerpage.php?company=12046&link=9869"target="_blank"><img src="https://honesteonline.com/HEOSealsNewNoDate/heosealimg.php?company=12046&size=2&link=9869"alt="HONESTe Seal - Click to verify before you buy!" border="0"style="margin-right:20px;"></a><a name="trustlink" href="http://secure.trust-guard.com/security/8491" rel="nofollow" target="_blank" onClick="var nonwin=navigator.appName!='Microsoft Internet Explorer'?'yes':'no'; window.open(this.href.replace(/https?/, 'https'),'welcome','location='+nonwin+',scrollbars=yes,width=517,height='+screen.availHeight+',menubar=no,toolbar=no'); return false;" oncontextmenu="var d = new Date(); alert('Copying Prohibited by Law - This image and all included logos are copyrighted by trust-guard \251 '+d.getFullYear()+'.'); return false;"><img name="trustseal" alt="Security Seals" style="border: 0;" src="//dw26xg4lubooo.cloudfront.net/seals/security/8491-large.gif" /></a><br/><br/>
						</div>
					</div>
				</div>
			</section>
		</div>
	</div>

	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<!-- Start of Advertise Pop Up Code -->
				<?php
				if($variation !== "no-logo" && $variation !== "np-nologo") {
					include("snippets/as-seen-on-tv.html");
				}
				?>
				<!-- End of Advertise Pop Up Code -->
				<!-- Start References -->
				<?php include("snippets/video-references.html");?>
				<!-- End References -->
			</div>
		</div>
	</div>


	<!-- Header Food Images -->
	<div id="productModal" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-sm" style="width: 417px;">
			<div class="modal-content">
				<div class="glyphicon glyphicon-remove-circle" style="float:right;cursor:pointer;padding:10px;z-index:1001;" onclick="hideProductModal();"></div>
				<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
					<!-- Wrapper for slides -->
					<div class="carousel-inner">
						<div class="item active">
							<img src="/media/images/f4p/food/f4p-header-almond-coconut-granola.jpg" alt="Patriot Power Generator">
							<div class="carousel-caption"></div>
						</div>
						<div class="item">
							<img src="/media/images/f4p/food/f4p-header-white-cheddar-shells.jpg" alt="Patriot Power Deluxe">
							<div class="carousel-caption"></div>
						</div>
						<div class="item">
							<img src="/media/images/f4p/food/f4p-header-cheesy-chicken-rice-casserole.jpg" alt="Patriot Power Accesories">
							<div class="carousel-caption"></div>
						</div>
						<div class="item">
							<img src="/media/images/f4p/food/f4p-header-chili-and-dumplings.jpg" alt="Patriot Power Accesories">
							<div class="carousel-caption"></div>
						</div>
					</div>
					<!-- Controls -->
					<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
					<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
				</div>
			</div>
		</div>
	</div>