<?php
if($_GET["upgrade"] == 1 ) {
	$isUpgrade = TRUE;
}
if(($isUpgrade !== TRUE) && (!empty($_SESSION["customerDataArray"]["firstName"]))) {
	$firstName = $_SESSION["customerDataArray"]["firstName"];
	$_SESSION['upsell'] = TRUE; //must stay a boolean
} else {
	$firstName = "Fellow Patriot";
}
// Define the current page name.
$page = "oto";
$billingStateName = $_SESSION["customerDataArray"]["billingStateName"];
// SET PRODUCT ID
//$_SESSION['productId'] = 164; //please keep as an integer
//$_SESSION['quantity'] = '1';
$_SESSION['upsell'] = TRUE; //must stay a boolean
$_SESSION['pageReturn'] = '/checkout/order.php';
include_once("Product.php");
$productObj = new Product();
$productDataObj = Product::getProduct($_SESSION["productId"]);
$funnelData = $productObj->initFunnel("F4P-OTO-MAIN-OFFER");
$declineUrl = $funnelData["declineUrl"];
include_once("template-top.php");
include_once ('template-header.php'); /*Add template-header-nav.php to add top menu*/
?>
<link rel="stylesheet" href="/assets/css/styles-freefood.css">
<script src="/js/audio.js"></script>
<script src="/assets/js/video/jquery.timers-1.2.js"></script>
<script src="/assets/js/video/jcookie.js"></script>
<script>
	// Change these values for the content within the "buttons" div to appear at this time.
	$(document).ready(function(){
		if ($.cookie("sawbutton")) {
			var hours = 0;
			var minutes = 0;
			var seconds = 5;
		} else {
			var hours = 0;
			var minutes = 33;
			var seconds = 23;
		}
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
<div class="container-main">
	<div class="breadcrumb1">
		<a>CHECKOUT</a>
		<a class="current">ORDER CUSTOMIZATION</a>
		<a>ORDER CONFIRMATION</a>
	</div>
	<div class="container">
		
		<div class="col-md-12 hidden-xs">
			<div class="center-block text-center">
				<h1><strong>Why Was This Video Banned?</strong></h1>
			</div>
		</div>
		<div class="col-md-12 hidden-sm hidden-md hidden-lg">
			<div class="center-block text-center">
				<h1><strong>Breaking News:<br />
						FEMA Hates This (#1 Item To Hoard)</strong></h1>
			</div>
		</div>
		<div class="col-md-12 margin-b-20 hidden-xs">
			<div id="videobox">
				<iframe src="//fast.wistia.net/embed/iframe/rznrw6fhcj" allowtransparency="true" frameborder="0" scrolling="no" class="wistia_embed" name="wistia_embed" allowfullscreen mozallowfullscreen webkitallowfullscreen oallowfullscreen msallowfullscreen width="640" height="360"></iframe>
				<script src="//fast.wistia.net/assets/external/E-v1.js" async></script>
			</div>
			<div class="col-md-12">
				<div id="reserve" style="display:none;">
				</div>
				<div id="buyButton2" class="center-block text-center" style="display:none">
					<a href="" class="scroll-link" data-id="order-form"><button type="button-1" class="btn-1">Choose My Kit</button></a>
					<p style="color:#002287;">(This Takes You To The Kit Options)</p>
				</div>
			</div>
		</div>
		<div class="content margin-t-20" >
			<div class="container oto-width">
				<p>We all know a crisis is coming. What's going to happen when disaster strikes? Are you prepared to feed your family?</p>
				<p>I don't know about you, but I'm sure not counting on the government to help me. In fact, they may be behind disappearing food stockpiles all over the country; and I've got the proof.</p>

				<h2 class="darkRed text-center">A Letter From The Feds That Chilled<br class="hidden-sm"> Me To The Bone...</h2>
				<p>Not too long ago, FEMA went directly to my supplier and tried to buy up my entire stockpile of high-quality survival food. It sounds crazy, but I'll show you the exact letter they sent in a minute.</p>
				<p>Revealing their plot could land me in hot water, but I think you deserve to know <strong>exactly what they're doing.</strong></p>
				<p>I'm about to show you undeniable proof that the government is on the hunt for as much survival food as they can grab in 24 hours, and I've got to tell you - <strong>it's really disturbing.</strong></p>

				<h2 class="darkRed text-center">It Makes You Wonder If They Know<br class="hidden-sm"> Something We Don't</h2>


				<img class="img-responsive pull-right img-padding-left" src="/media/images/f4p/letter/f4p-letter-hillary-obama-01.jpg" alt="">



				<p>My first thought was that they must be trying to control the supply. Control the food supply and you control the people. I mean, it worked for Stalin and Mao, right? Why not Obama or Hillary?&nbsp;</p>
				<p>But then I dug deeper and I think the situation is even worse. I think that the government knows something we don't and is worried that they see a full-scale disaster about to hit. And I think I found the factors that will trigger it.</p>
				<h2 class="darkRed text-center">I Have Proof... They Do Know Something<br class="hidden-sm"> We Don’t Know</h2>
				<p>Before I talk about these warning signs, you need to see the actual letter FEMA sent my supplier so you can see the proof with your own eyes and make up your own mind.</p>
				<p>It's been all over the Internet. Facebook and even some big radio programs like Alex Jones picked up this story. It seems like everyone is just plain shocked that a government agency would send a letter like this.</p>
				<p>Here's what happened: FEMA wrote to my partner, Matt, over at the warehouse and wanted to know exactly how many...&nbsp;</p>
				<p>Well, maybe I should just let Matt tell you about it, since he was the one who received the letter that proves it...</p>

				<a onclick="showFEMAModal()" ><img src="/media/images/f4p/letter/f4p-letter-fema-letter-2.jpg" alt="FEMA letter" class="img-responsive center-block"></a>
				<div id="FEMAModal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-lg" style="">
						<div class="modal-content" style="">
							<img src="/media/images/f4p/letter/f4p-letter-fema-letter-2-707x626.jpg" alt="FEMA letter" class="img-responsive center-block">
						</div>
					</div>
				</div>
				<p style="text-align: center;line-height:1.0" class="caption"><em style="font-size: 15px;font-style: normal;">100% Genuine letter from FEMA... demanding to know how much<br class="hidden-sm hidden-xs"> food we can ship and how fast!</em></p>
				<blockquote style="font-size:16px;border: none;margin-bottom: 20px;background-color:lightgrey;border-radius: 15px;">
					<p><em>&ldquo;Thanks Frank. Well, it was kind of crazy to get this letter from FEMA. I don't mean to sound paranoid, but they were asking some questions that make me pretty nervous.</em></p>
					<p><em>FEMA and the Department of Homeland Security demanded to know:</em></p>
					<ul>
						<li style="font-size: 20px"><strong><em>How much emergency food we can deliver immediately.</em></strong></li>
						<li style="font-size: 20px"><strong><em>How many food kits we've got on hand</em></strong><em> (remember with the government's power to seize supplies in a "state of emergency" I don't think I want to answer this). </em></li>
						<li style="font-size: 20px"><strong><em>If we can ship dedicated truckloads</em></strong><em> (that means a truck heading straight for FEMA with nothing but survival food just for them) by the pallet, and how many pallets we could cram in each truck.</em><em>&nbsp;</em></li>
					</ul>
					<p><em>And the strangest question of all, if we worked like mad men, <strong>how much emergency food could we produce in 24 hours?</strong></em></p>
					<p><em>I gotta tell you, Frank, I'm real concerned. This letter is proof that FEMA wants our emergency survival food. They don't want anyone to know it, and they want to take immediate delivery.</em></p>
					<p><em>And let's not forget the most important part of this - why the sudden urgency? What do they know that we don't?&rdquo; </em></p>
				</blockquote>
				<p>I hear you, Matt. From the sounds of it, something big is about to happen and it's no wonder that our food is literally flying off the shelves. It makes sense, doesn't it?</p>

				<h2 class="darkRed text-center">You Should Know That FEMA Won’t Get Even One Single Emergency Food Kit From Us</h2>
				<img style="margin-bottom: 40px;margin-top: 8px" class="img-responsive pull-left img-padding-right" src="/media/images/f4p/letter/f4p-letter-emergency-food-02.jpg" alt="">
				<p>This is truly an urgent situation, but don't worry - you should know Matt and I refuse to respond to their demands. Why?</p>
				<p>Because we don't believe that these critical emergency food kits should be in the hands of the government, <strong>stored in some secret warehouse and with the rest of us left with table scraps in a crisis</strong>.</p>
				<p>Because we understand that without non-perishable food like this, many folks will be <strong>downright helpless and dependent on the government in an emergency</strong>.</p>
				<p>And finally, because we&rsquo;re worried that revealing confidential information about our survival food business could put us on some secret list the government keeps in case they want to seize it in the future.</p>
				<p>Now, I realize that some folks might consider that a bit paranoid, but the truth is the government DOES has the power to confiscate critical supplies in a crisis, and Matt and I sure don&rsquo;t want to be a big fat target for them. Better safe than sorry.</p>
				<p>But with the government trying to buy up survival food, there's no time to waste, and here's why: like&nbsp;Matt told me, even though we decided not to sell to FEMA, it's only a matter of time before they find some other company who will.</p>
				<p>And when they do, it will almost certainly create a shortage of the raw ingredients that we use, especially because we refuse to replace our high-quality made-in-America food ingredients with foreign stuff. A shortage will mean rising&nbsp;prices and&nbsp;could even make survival food completely unavailable at any price.</p>

				<h2 class="darkRed text-center">But that's Not the Only Danger that Could Snatch Your Food Stockpile Out of Your Hands</h2>
				<p>Heck, we've had a rush of people taking advantage of our special "fire sale" offer to grab their food kits to protect their family.&nbsp;</p>
				<p>Now to be blunt, this is a first-come-first-serve opportunity and because of all the controversy, <strong>I cannot guarantee supply forever</strong>. Which means if we run out before you have a chance to claim your kit, I'm sorry, but you'll just have to wait and hope we can get more in before something really bad hits.</p>

				<h2 class="darkRed text-center">You've Seen the Evidence, You Know the Situation is Serious</h2>
				<img class="img-responsive center-block margin-tb-20" style="width: 100%" src="/media/images/f4p/letter/f4p-letter-breaking-news.jpg" alt="">
				<p>ISIS terrorists inside our country&hellip; <strong>a government that takes more and more away from people who worked hard to earn it</strong> (and gives it to those who want "something for nothing&rdquo;) &hellip; and a history of botched responses to natural disasters &mdash; it all proves we can't rely on the government in a crisis.&nbsp;</p>
				<p>That may explain why so many folks are taking action right now to stockpile the #1 item needed in a crisis&hellip; <strong>survival food</strong>.&nbsp;</p>
				<p>Don&rsquo;t worry, I&rsquo;ll explain exactly what survival food is and why it&rsquo;s so different than normal grocery-store food in just a minute. &nbsp;&nbsp;</p>
				<img class="img-responsive pull-right img-padding-left" src="/media/images/f4p/letter/f4p-letter-food-truck.jpg" alt="">
				<p>In the meantime, I have to tell you that for the last few weeks, my warehouse has been shipping out more truckloads packed to the brim with survival food than I've ever seen.</p>
				<p>So I put in an extra-large order to our American farmers and suppliers for more food, and we are working around the clock right now to meet the increased demand.</p>
				<p>And we're doing everything we can to accelerate packing and shipping so we can rush your kit to you as soon as you order it.</p>
				<p>I'm going to keep doing this as long as I can. I hope we can help folks all across the country get peace of mind and know that they&rsquo;re protected in case of disaster for years to come. We&rsquo;ve seen enough to know that something bad can happen, and it&rsquo;s plain common sense to prepare, just in case.</p>

				<h2 class="darkRed text-center">But Here's Why This Fire Sale Could<br class="hidden-xs"> End in a Matter of Days</h2>
				<p>First, Matt could run out of the raw ingredients needed to get these kits produced. I'd be shocked if FEMA stopped looking for suppliers just because we turned them down. And there are companies a whole lot bigger than us that can buy up all the ingredients.</p>
				<p>Second, and I hope the government never gets to this point, part of me thinks that the government might have wanted to know how much food we've got in stock in case they ever decided to take it. The fact is, they could walk in and seize every single kit of food we've got in our warehouse at the drop of a hat. All it would take is the president declaring a "state of emergency.&rdquo;</p>

				<h2 class="darkRed text-center">With A Stroke Of Obama’s Pen, Food Confiscation Could Start… Tomorrow</h2>
				<img style="margin-bottom: 40px;margin-top: 8px" class="img-responsive pull-left img-padding-right" src="/media/images/f4p/letter/f4p-letter-obama-01.jpg" alt="">
				<p>The actual justification for this &ldquo;legal confiscation&rdquo; is the <strong>&ldquo;National Defense Resources Preparedness Act.&rdquo; </strong>Obama actually expanded the government&rsquo;s power to seize survival food with his recent Executive Order 16303. Now, all the president needs is a pen and food confiscation could indeed begin as soon as tomorrow.</p>
				<p>But the real thing that keeps me up at night? The way FEMA wanted to know how many meals we could ship out in 24 hours. That&rsquo;s a really specific question that sounds urgent. It makes me even more convinced they know something that we don't. Just watch the news and you&rsquo;ll see plenty of evidence that <strong>things are headed in the wrong direction. </strong></p>
				<h2 class="darkRed text-center">If You Don’t Prepare, The Horror Of A FEMA Camp Could Be In Your Future...</h2>
				<p>Look, I can't tell the future, but from everything I've seen, the U.S. could be on the brink of a major disaster. If I'm wrong, life will go on like normal, and I'll happily admit that I was off my rocker. But if I'm right, this could force our friends and neighbors into FEMA camps. And you probably already know <strong>a FEMA camp isn&rsquo;t anywhere you&rsquo;d want you or your family to end up</strong>. They make an old-style Soviet gulag sound like a day at the beach.</p>
				<p>Think I&rsquo;m kidding? Remember the bleak living conditions folks had to endure in one of those Godforsaken places after Hurricane Katrina and Superstorm Sandy?</p>
				<p>Things like:</p>
				<blockquote style="font-size: 16px;border: none">
					<p><i class="fa fa-check"></i> <strong>Bitter cold or blistering heat</strong> from living in a tent with no insulation&hellip;&nbsp;</p>
					<img class="img-responsive pull-right img-padding-left" src="/media/images/f4p/letter/f4p-letter-dumpster-diving.jpg" alt="">
					<p><i class="fa fa-check"></i> <strong>Inadequate food</strong> - (think about those New Yorkers dumpster diving for food after Superstorm Sandy... rifling through disgusting TRASH, scraping off bugs and dirt, just to find anything remotely edible! And that was only three days after the storm!)</p>
					<p><i class="fa fa-check"></i> <strong>Crime</strong> - from robbery to assault to rape and worse. (Remember those first few days post-Katrina? Even the police were afraid to be out on the street!)</p>
					<p><i class="fa fa-check"></i> <strong>The Feds refusing to let folks return to their homes or even leave. </strong>Imagine having FEMA agents in your personal business, watching your every move. It would feel like you&rsquo;re in prison&hellip; just for the crime of being unprepared! The media turned away, forbidden from filming inside the camps.</p>
				</blockquote>
				<p>And the list goes on. You want to avoid that kind of nightmare, right? Of course you do.</p>
				<p>Now let&rsquo;s talk about some basic facts.&nbsp;</p>
				<p>Obama Knows: <strong>Control the Food Supply, Control the People&hellip;</strong></p>
				<p>Just like governments have understood for centuries, if you control the food supply, you control the people. After all, there's no way to live without food and water, which is exactly why you need to have your own personal survival food stockpile.</p>
				<p>But here's the catch&hellip;</p>

				<h2 class="darkRed text-center">If You Stockpile The Wrong Foods, You Could Be Setting Up Your Family To Starve</h2>
				<p>It sounds harsh, but some people are giving themselves a false sense of security.</p>
				<p>Maybe it&rsquo;s by buying huge bags of rice and beans that only last for a year or two before you have to eat &lsquo;em or throw &lsquo;em out. Or maybe it&rsquo;s by buying terrible-tasting MREs loaded with chemicals that can make you sick.</p>
				<p>Imagine you've got a stockpile of food you THINK will feed your family just fine in a crisis. How would you feel to find it crawling with maggots, roaches, and rats? Or that <strong>your canned goods are expired and infected with deadly bacteria like botulism</strong>?</p>
				<img style="margin-top: 8px" class="img-responsive pull-left img-padding-right" src="/media/images/f4p/letter/f4p-letter-moldy-cans.jpg" alt="">
				<p>Your survival plan would be ruined, and you&rsquo;d have to tell your hungry family:</p>
				<p>&ldquo;<em>Sorry, there&rsquo;s nothing to eat</em>.&rdquo;</p>
				<p>That&rsquo;d feel pretty awful, wouldn&rsquo;t it?</p>
				<p>Your only choices would be to go hungry&hellip; or to check-in to a dreaded government-run FEMA camp.</p>
				<p>And there&rsquo;s something else to consider.</p>

				<h2 class="darkRed text-center">Total Anarchy When 47 Million Freeloaders Can’t Get Their Government Handouts</h2>
				<img style="margin-top: 8px" class="img-responsive pull-right img-padding-left" src="/media/images/f4p/letter/f4p-letter-info-graph.jpg" alt="">
				<p>Since 2008 when Obama took office, the number of Americans on the government dole has increased from around a little over 27 million to 47 million today &ndash; that&rsquo;s just about <strong>15% of the whole damn country</strong>! They don&rsquo;t call him the &ldquo;Food Stamp President&rdquo; for nothing!</p>
				<p>Now, of course you and I were raised to help others in need. The difference was, people had pride back then&hellip; they wanted gainful employment, the ability to go to work each day, and make enough to feed and clothe their families and put a roof over their head.</p>
				<p>Nowadays when you look at the younger generation, it&rsquo;s an entirely different story.</p>
				<p>We&rsquo;ve all heard of &ldquo;The Greatest Generation&rdquo; (this was my Dad and his buddies), The Baby Boomers, Generation X&hellip; but now, we have to contend with &ldquo;Generation Entitlement&rdquo;.</p>
				<p>And folks, it really doesn&rsquo;t have much to do with age. It&rsquo;s a mindset. It&rsquo;s the belief that <strong>the country owes you a living for just existing and breathing air</strong>.</p>
				<p>Just like that surfer that made the news in California, living it up on your taxpayer dime, buying LOBSTER with his food stamp card and even proud of the fact he&rsquo;s a good-for-nothing bum!</p>
				<img style="margin-bottom: 40px;margin-top: 8px" class="img-responsive pull-left img-padding-right" src="/media/images/f4p/letter/f4p-letter-welfare-troll.jpg" alt="">
				<p>He&rsquo;d much rather play &ldquo;rock star&rdquo; than get a job and earn a respectable living, like other hard-working Americans. It&rsquo;s losers like him that really get my blood boiling.</p>
				<p>These are the kind of people that my Grandpa used to say &ldquo;always want something for nothing.&rdquo;</p>
				<p>And our socialist-in-chief and the rest of the politicians are all too happy to provide it&hellip; because it keeps them and their kind in power, election after election. Just look at Obama and Hillary.</p>
				<p>The government takes more and more from the haves, who have worked HARD for everything they earned&hellip; and gives to the have nots, most of whom are freeloaders who did NOTHING to earn it.</p>

				<h2 class="darkRed text-center">It’s Not IF Disaster Strikes… It’s WHEN</h2>
				<p>Which brings me to my next point. What do you think&rsquo;s going to happen when the &ldquo;you know what&rdquo; hits the industrial sized fan, and 47 million people, or &#8537; of the population, can&rsquo;t get their handouts? If a disaster hits and FEMA completely drops the ball (as usual!), <strong>it could spark riots and looting just like Katrina </strong>&ndash; except this time on an explosive, massive scale.</p>
				<img style="margin-bottom: 0;margin-top: 8px" class="img-responsive pull-left img-padding-right" src="/media/images/f4p/letter/f4p-letter-powerline-bent.jpg" alt="">
				<p>It can be a crisis from crazy weather that produces monster storms&hellip;</p>
				<p>An ISIS terrorist attack on our crumbling power grid as predicted by news anchor Ted Koppel in his book <em>Lights Out</em>&hellip;</p>
				<br class="hidden-xs">
				<p>Another outbreak of Ebola, this time causing a nationwide pandemic&hellip; (remember that even healthcare workers in hazmat suits got infected, folks!)</p>
				<p>Or any other kind of hellish scenario.</p>
				<p>There&rsquo;s no way to tell when it will hit. But it is coming. Heck, we&rsquo;ve already seen a record amount of violence and looting in places like Ferguson and Baltimore&hellip;and we aren&rsquo;t even in a full on crisis&hellip; YET!</p>

				<h2 class="darkRed text-center">I Want You To Really Think About This...</h2>
				<p>Think about the disaster footage you’re seeing on the news these days, pretty much 24-7. How long before the disaster is at YOUR front door… hordes of desperate people roaming the streets of YOUR town… grocery stores picked over and shelves stripped bare?</p>
				<img style="margin-top: 8px" class="img-responsive pull-right img-padding-left" src="/media/images/f4p/letter/f4p-letter-looters.jpg" alt="">
				<p>Get the picture? Because this is the reality we are looking at when the next big crisis happens.</p>
				<p>At no time in history have we had so many people as dependent on government as we do today. <strong>It&rsquo;s a ticking time bomb&hellip; 47 million people strong</strong>.</p>
				<p>These days, people want what THEY think they&rsquo;re entitled to&hellip; and they&rsquo;ll take away what we&rsquo;ve worked hard to earn.</p>
				<p>People who rely on the government have their heads deep in the sand.</p>
				<p>You need to look out for yourself and for your family&hellip; because no one else will &shy;&mdash; certainly not the politicians in D.C.</p>

				<h2 class="darkRed text-center">There’s Not A Second to Waste...</h2>
				<p>It&rsquo;s painfully obvious that you&rsquo;ve got to act fast to protect your loved ones from the many dangers of a full-blown crisis that could last days, weeks, or even longer.&nbsp;</p>
				<p>And that&rsquo;s why I&rsquo;ve made it my mission to help as many folks become as &ldquo;food independent&rdquo; as possible&hellip; so you never have to be at the mercy of some Federal bureaucrat, standing in line to beg for whatever rations the government pencil-pushers see fit to dole out to the masses in a crisis.&nbsp;</p>
				<p>So this is what I did&hellip;</p>

				<h2 class="darkRed text-center">I Decided to Stop Worrying</h2>
				<p>My partner Matt and I put together our own survival food kit containing only cream-of-the-crop food designed to last for an amazing 25 years.&nbsp;</p>
				<p>That means foods scientifically engineered to last for over two decades, simple to prepare and conveniently packed in airtight containers that would be easy to conceal, move and store.</p>
				<p>I wanted only the absolutely best tasting meals that provided the most nutrition for breakfast, lunch, and dinner and that were useful for the long haul.</p>
				<img src="/media/images/f4p/letter/f4p-letter-kit-tote-01-v2.jpg" width="100%" class="img-responsive center-block" alt="Food4Patriots Kit"/>
				<p></p>
				<p>After months of work and research, we finally cooked up our first batch, and I knew we had something nobody else did: American-made food that I'd be happy to feed my own kids and grandkids.</p>
				<p>The food was delicious, easy to store long-term, and best of all, it was packaged right here in the U.S. of A. That&rsquo;s why we decided to call it <strong>Food4Patriots</strong>.&nbsp;</p>
				<p>Plus, our food didn't have any of those harmful chemicals or genetically modified ingredients, no MSG, no GMOs and no mystery &ldquo;Frankenfood&rdquo; from China.</p>
				<p>But to be honest, we were worried that this was too good to be true.</p>

				<h2 class="darkRed text-center">Was It Going To Cost An Arm And A Leg?</h2>
				<p>The survival food we make for you doesn't cut any corners. You'll understand what I mean when you see exactly how your meals are made.</p>
				<p>First, we take <strong>100% non-GMO fruits and veggies as a starting point</strong>. Our food is made in America. Not assembled from Chinese imported ingredients. It&rsquo;s grown, harvested, and made from scratch here in the land of the free and home of the brave.</p>
				<p>We source most of our raw ingredients from the &ldquo;fresh produce&rdquo; category &ndash; picture the delicious veggies you find in season at your local farmer&rsquo;s market. And we absolutely refuse to use anything from the &ldquo;rejected dry goods&rdquo; category that some competitors sneak in to lower their costs.</p>
				<img style="margin-bottom: 40px;margin-top: 8px" class="img-responsive pull-left img-padding-right" src="/media/images/f4p/letter/f4p-letter-grandpa-grandson.jpg" alt="">
				<p>We work with a family-owned co-packing facility located in Utah. They folks have over <strong>40 years of experience</strong> in the food business, they hold numerous USDA, FDA and GMP manufacturing certifications, and they are also one of the only Level 2 SQF (that&rsquo;s the Safe Quality Food Institute) certified emergency food companies in the country.</p>
				<p>These hard-working folks are experts in their field&hellip; nutritionists, chefs, engineers, packers and quality control inspectors. You&rsquo;ll meet some of our people and learn more about our unique manufacturing process in just a bit.</p>
				<p>Next, we combine our top-quality ingredients using prize-winning recipes. In fact, many of our recipes have won independent taste tests.</p>

				<h2 class="darkRed text-center">Space-Age Mylar Packaging Keeps<br class="hidden-xs"> Our Food Fresh… For 25 Years</h2>
				<p>Some manufacturers freeze-dry their food - which is hideously expensive for you - while others use the cheaper, rapid-dehydration method that sucks all the water out but also pulls nutrients and flavor with it.&nbsp;</p>
				<img class="img-responsive center-block margin-tb-20" style="width: 100%" src="/media/images/f4p/letter/f4p-letter-mylar-packaging.jpg" alt="">
				<p></p>
				<p>Our meals are made with our unique <strong>"low-heat dehydration method"</strong>. This is a much slower and more painstaking technique&hellip; but it&rsquo;s worth it because the flavor and nutrition stay locked in and the food lasts every bit as long as freeze-dried without costing you a fortune.</p>
				<p>Now here&rsquo;s more on the breakthrough technology that makes our meals last for 25 years&hellip;</p>
				<p>We use re-sealable pouches made of space-age Mylar &ndash; the same material that&rsquo;s used in NASA space suits &ndash; to store your food in convenient servings.</p>
				<p>This is the absolute best packaging material available. It&rsquo;s so strong it&rsquo;s used to protect astronauts in outer space, for Pete&rsquo;s sake!</p>

				<h2 class="darkRed text-center">Our Packaging Makes A Big Difference</h2>
				<p>The reason this is so critical is because our packaging provides a <strong>COMPLETE barrier against light, oxygen and moisture</strong>&hellip; the three things that will destroy food over time. These pouches cost us twice as much as the flimsy stuff that some competitors use, but we insist on it because it&rsquo;s scientifically designed to guarantee that your food will last an amazing 25 years.</p>
				<p>Next, we use a special $150,000 machine to package these meals to the highest industry standards.&nbsp;</p>
				<p>It works like this: the advanced Mylar pouches are blasted clean with CO<sub>2</sub> gas and then it&rsquo;s packed to the brim with a hefty helping of your delicious food. This process forces out any left-over oxygen.</p>
				<img class="img-responsive center-block margin-tb-20" style="width: 100%" src="/media/images/f4p/letter/f4p-letter-co2-cleaning.jpg" alt="">
				<p>The pouch is then hermitically sealed, ensuring that your food will stay safe and fresh for 25 years &ndash; guaranteed.</p>
				<p>Can you see why our foods have been called &ldquo;<strong>The Stockpiler's Dream</strong>?&rdquo;</p>
				<p>And it&rsquo;s not just the packaging. We go through a 17-step quality-control and lab-testing procedure for each and every batch of our survival food to insure that the flavor, nutrition and storage life meet the highest standards.</p>
				<p>See how much better that is for you and your family?</p>

				<h2 class="darkRed text-center">But You Don’t Have To Take My Word For It...</h2>
				<p>Chloe, one of our customers, was a little skeptical that all this “rocket science” necessary to guarantee a 25 year shelf life would result in food that actually tastes good. Here’s what she had to say:</p>
				<div class="col-md-12 margin-tb-20">
					<?php include_once ("testimonials/fb-testimonial-chloe.html")?>
				</div>
				<p>Most folks who have gotten a Food4Patriots kit have been ecstatic with the long-term packaging, the delicious flavor, and how easy it is to store.</p>
				<p>Here&rsquo;s Wanda, a lifelong Girl Scout, who&rsquo;s always been preparing for emergencies. Listen to why she chose Food4Patriots as her best option for long-term food security:</p>
				<div class="col-md-12 margin-tb-20">
					<?php include_once ("testimonials/fb-testimonial-wanda.html")?>
				</div>
				<p>Look, we know we need to be able to take care of ourselves and our loved ones in today&rsquo;s uncertain world. It&rsquo;s all about the freedom and peace of mind that you get from being prepared.</p>
				<p>Sometimes I get a letter from a customer that reminds me just how critical this is. Listen to Donna&rsquo;s story:</p>
				<div class="col-md-12 margin-tb-20">
					<?php include_once ("testimonials/fb-testimonial-donna.html")?>
				</div>
				<p>I have to tell you, Donna’s letter really hit me right in the gut. THIS is why we’re doing this, folks. THIS is the kind of peace of mind we all deserve.</p>

				<h2 class="darkRed text-center">Just to Remind You, We’re Offering These Kits on A 100% First-Come, First-Serve Basis</h2>
				<p>As of this writing, kits are in stock and available for immediate shipment. However, we can&rsquo;t say how long this will remain the case.</p>
				<p>Look, I'd rather you get your own personal food stockpile than see the government hoard them. Since they&rsquo;re clearing out fast I'll be ordering as many as I can to keep up with the demand. But if the supply of raw ingredients dries up or food prices skyrocket, there may be no way of restocking quickly or economically.</p>
				<img style="margin-top: 8px" class="img-responsive pull-left img-padding-right" width="260px" src="/media/images/f4p/letter/f4p-letter-jan-stirring.jpg" alt="">
				<p>So why is our survival food flying off the shelves?</p>
				<p>To begin with, this is delicious food that you can prepare in three simple steps. You don't have to worry about cooking complicated recipes when you're stuck in a disaster. You can <strong>make these meals in less than 15 minutes with no hassle</strong>. Just add boiling water, simmer and serve.&nbsp;</p>
				<p>Can you picture how easy this is? It's so simple even kids can make our food.</p>

				<h2 class="darkRed text-center">Each Food4Patriots Survival Food Kit<br class="hidden-xs"> Is Packed With Variety</h2>
				<p>And don't worry that you&rsquo;ll be eating the same thing every day. You&rsquo;ll get a whole slew of choices for breakfast, lunch, and dinner so your family&rsquo;s meals are never boring.&nbsp;</p>
				<p>Now, one of the questions most people have is, "What kind of food will I get to eat?" I know what you&rsquo;re worried about here&hellip; maybe you&rsquo;re imagining bland, tasteless mush.</p>
				<p>But that couldn&rsquo;t be further from the truth.</p>
				<img src="/media/images/f4p/letter/f4p-letter-food-array.jpg" width="100%" class="img-responsive center-block"/>
				<p></p>

					<p>I've picked some of my favorites to give you variety. Here's a list of just a few of the choices:</p>
					<div class="col-md-12">
						<ul style="list-style-type: none;">
							<li style="font-size: 20px"><i class="fa fa-check"></i> Maple Grove Oatmeal</li>
							<li style="font-size: 20px"><i class="fa fa-check"></i> Country Cottage Mac & Cheese</li>
							<li style="font-size: 20px"><i class="fa fa-check"></i> Granny's Home Style Potato Soup</li>
							<li style="font-size: 20px"><i class="fa fa-check"></i> Blue Ribbon Creamy Chicken Rice</li>
							<li style="font-size: 20px;"><i style="color:#fff" class="fa fa-check"></i> <em>(My kids actually beg me to make this one all the time!)</em></li>
							<li style="font-size: 20px"><i class="fa fa-check"></i> Heartland’s Best Mashed Potatoes</li>
							<li style="font-size: 20px"><i class="fa fa-check"></i> Creamy Stroganoff</li>
						</ul>
					</div>

				<p>And just to prove we’re on the level about how good this food really tastes, we did a secret taste test with the folks over at The Blaze, one of the country’s most popular conservative news website.</p>
				<p>They loved the taste. They had no idea they’d been eating survival food. In fact, they thought it had been a catered lunch!</p>

				<h2 class="darkRed text-center">Mouthwatering Freshness And Taste... <br class="hidden-sm"> Even After 25 Years</h2>
				<p>Also, thanks to our breakthrough manufacturing process, you know that your food is guaranteed to last for 25 years. Our packaging is military-grade sturdy stuff and can stand up to the crazy things that happen in a crisis. You&rsquo;ll have complete peace of mind for the long term.</p>
				<p>Let me repeat: We use the special &ldquo;<strong>low-heat dehydration method</strong>&rdquo; to preserve your food&hellip; top-of-the-line Mylar pouches &ndash; the same material used in NASA's space suits &ndash; to keep all the air, moisture, and light out so it stays fresh&hellip; and a $150,000 machine to blast out any left-over oxygen with CO2. So when you need your food stockpile it'll be as fresh as the day you bought it.</p>
				<img class="img-responsive center-block margin-tb-20" style="width: 100%" src="/media/images/f4p/letter/f4p-letter-low-heat-dehydration.jpg" alt="">
				<p>You really do get tremendous peace of mind and you will never have to worry about your food spoiling.</p>

				<h2 class="darkRed text-center">Nutrition You’ll Need When Normal Life Becomes A Thing Of The Past</h2>
				<p>You’ll get food jam-packed with nutritional value.</p>
				<p>Since I had a chance to go direct to the supplier to build this kit, I was able to throw out all the filler and poor-quality ingredients that some other companies stuff into their meals. Remember, we insist that most of the raw ingredients come from the &ldquo;fresh produce&rdquo; category, just like the mouth-watering vegetables you&rsquo;ll find at your local farmer&rsquo;s market.&nbsp;</p>
				<p>Loren loves the convenience:</p>
				<div class="col-md-12 margin-tb-20">
					<?php include_once ("testimonials/fb-testimonial-loren.html")?>
				</div>
				<p>But here's another important part: your kids won’t have to settle for smaller serving sizes. Some brands use kids’ meals to skimp on the amount of food they give you. With Food4Patriots, kids get a full adult-size portion without getting charged extra.</p>

				<h2 class="darkRed text-center">Survival Food That Doesn’t Scream...<br class="hidden-xs">Here’s My Food, Come Take It</h2>
				<p>You get an easy-to-store package that takes up minimal space. Nobody wants to cram their house full of clunky food packages. Many other food storage containers are ultra-bulky and come in a lot of awkward shapes and sizes, which makes it difficult to discreetly store food reserves in the average American home.</p>
				<img style="margin-top: 7px" class="img-responsive pull-left img-padding-right" src="/media/images/f4p/letter/f4p-letter-jan-tote-under-bed.jpg" alt="">
				<p>I've selected the most compact kits I could find so you can store them without any hassle. The storage totes your meals come in are extremely covert – so no one will know you have a secret stash of high-quality survival food -- except you.</p>
				<br class="hidden-xs">
				<p>Plus, they’re sturdy,  waterproof and easy-to-stack.</p>
				<p>Your will food come to you in plain, unmarked boxes via FedEx for fast delivery.</p>
				<p>Take a look at this checklist showing you exactly how Food4Patriots stacks up against other methods of stockpiling food. You&rsquo;ll see right away how there&rsquo;s no comparison:</p>
				<img src="/media/images/f4p/letter/f4p-checklist-graphic-min.jpg" width="100%" class="img-responsive center-block"/>
				<p></p>
				<p><strong>Over the last 3 years, 160,064 customers have trusted Food4Patriots. </strong>And according to my numbers, 92% are happy with their purchase. Plus, nearly half of our customers come back to us to order more food at sometime in the future. I think these numbers show that folks are happy with the product.</p>
				<p>And it&rsquo;s not just our customers who are praising Food4Patriots&hellip; celebrities and survival experts are recommending it as &ldquo;the perfect survival food solution.&rdquo; Look at what Glenn Beck, one of America&rsquo;s top talk radio hosts, thinks about this survival food that&rsquo;s in these kits:</p>
				<div class="johnson-box-01">
					<div class="row">
						<div class="col-sm-12 col-md-12">
							<div class="pull-left hidden-xs" style="margin-right:25px;width:198px;">
								<img src="/media/images/f4p/f4p-glen-beck-07.png" width="198" height="198" alt="Glenn Beck Food4Patriots"/>
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
				<p>And here&rsquo;s survival expert Jeff Anderson from Modern Combat &amp; Survival Magazine&hellip; this guy really knows what he&rsquo;s talking about. See what Jeff likes most about Food4Patriots, in his own words:</p>
				<iframe src="//fast.wistia.net/embed/iframe/agauk0y719" allowtransparency="true" frameborder="0" scrolling="no" class="wistia_embed" name="wistia_embed" allowfullscreen mozallowfullscreen webkitallowfullscreen oallowfullscreen msallowfullscreen width="100%" height="360"></iframe>
				<script src="//fast.wistia.net/assets/external/E-v1.js" async></script>
				<p></p>
				<p>The fact is, you get what you pay for and you can't expect this kind of quality to come cheap. But we found a way to make this work&hellip; <strong>and it&rsquo;s dead simple</strong>.</p>
				<p>We buy in bulk.</p>
				<p>Now just to give you some perspective, a bulk order costs tens of thousands of dollars and is a decade of food for a family of four.</p>
				<p>My first thought was: we just don't need that much food. But I figured if I could get word out to people like you, you'd want to grab the same discount I got and would claim your own food package. That way I wouldn't be stuck with a big bill for more food than we could ever eat. </p>

				<h2 class="darkRed text-center">Confession: Survival Food This Good Won’t Always Be This Cheap</h2>
				<p>I've got a prediction - survival food won't always be this cheap, especially if a crisis hits. Imagine what will happen when you see this headline:</p>
				<p>"<strong>Food prices skyrocketing. Grain shortage forces farms to close and cows starve.</strong>"&nbsp;</p>
				<p>Since Food4Patriots package is products are made from honest-to-goodness fresh ingredients produced by farmers here in the U.S. of A., when a crisis hits it'll automatically skyrocket the prices of this food. Farms could shut down and their livestock go hungry.</p>
				<p>Grain shortages could drive the price of basic necessities, like bread, through the roof!</p>

				<h2 class="darkRed text-center">Looters Scouring the Streets<br class="hidden-sm"> Looking for Victims</h2>
				<p>When a crisis hits, stores will be hit by angry urban swarms demanding food and other supplies. Just think, people stampede for toys on sale on Black Friday at Walmart. When their children are starving because they didn't prepare and the government fails to bail them out, riots and roving mobs are almost certain.</p>
				<img class="img-responsive center-block" width="100%" src="/media/images/f4p/letter/f4p-letter-looters-on-camera.jpg" alt="">

				<h2 class="darkRed text-center">Food Stockpiles Shouldn’t Only<br class="hidden-sm"> Be For Well-Off Americans</h2>
				<p>The last thing I want to happen is that someone would give up their chance to claim their Food4Patriots package because they couldn't afford it. Food stockpiles should not be only for wealthy Americans. I know most people can&rsquo;t afford to spend $5,000, $10,000, or $25,000 on a stockpile. The biggest question you probably have on your mind right now is, "How much does it cost?"&nbsp;</p>
				<p>It&rsquo;s hard to put a price on the peace of mind that a survival food stockpile gives you.</p>
				<p>And I know every family is different and there's no one-size-fits-all survival food solution.</p>
				<p>So I've put together a variety of Food4Patriots kits based on feeding an adult over a specific period of time. That way, <strong>you can pick the exact size that works best for you and your family</strong>. No need to buy more or less than you actually need, so nothing goes to waste.&nbsp;</p>
				<p>Click the &ldquo;<strong>Choose My Kit</strong>&rdquo; button below to get started.</p>
				<div id="buyButton2" class="center-block text-center" >
					<a href="" class="scroll-link" data-id="order-form"><button type="button-1" class="btn-1">Choose My Kit</button></a>
					<p style="color:#002287;">(This Takes You To The Kit Options)</p>
				</div>
				<p>The 3-month kit is far and away our most popular. However, there&rsquo;s a kit size available for every budget and need.</p>
				<img class="img-responsive center-block margin-tb-20" style="width:541px " src="/media/images/f4p/letter/f4p-letter-3-mokit-new.jpg" alt="">

				<p>Just so you know what to expect, a few weeks after you order and receive your food kit, we&rsquo;ll politely ask you to please review your purchase. It&rsquo;s totally optional, we just really appreciate the feedback so we can make things better.</p>
				<p>And to date we&rsquo;ve gotten 1,338 verified 4- and 5-star reviews back from customers. These are not anonymous, paid, fake reviews, folks. Only real Food4Patriots customers can review a food kit they purchased.&nbsp;</p>
				<p>Here are a couple:</p>
				<p>Paula says:</p>
				<div class="col-md-12 margin-tb-20">
					<?php include_once ("testimonials/fb-testimonial-paula.html")?>
				</div>
				<p>And here’s Rom’s review:</p>
				<div class="col-md-12 margin-tb-20">
					<?php include_once ("testimonials/fb-testimonial-rom.html")?>
				</div>
				<p>It&rsquo;s not just our customer&rsquo;s reviews and testimonials we&rsquo;re proud of. We&rsquo;re also proud to give back to our country&rsquo;s veterans.</p>
				<img class="img-responsive pull-right img-padding-left" src="/media/images/f4p/letter/f4p-letter-fisher-house.jpg" alt="">
				<p>When you claim your Food4Patriots kit today, we will also donate a portion of the proceeds to charities who support our veterans and their families, including Operation Homefront, Fisher House and A Soldier’s Child Foundation.</p>
				<p>Our donations topped $20,000 in 2015, so you can feel good knowing that you&rsquo;re supporting our veterans while getting the peace of mind that comes from having a survival food stockpile.</p>

				<h2 class="darkRed text-center">Food4Patriots Is A Company You Can Count On</h2>
				<p>So many folks are jumping on board with us to make sure their families don&rsquo;t go hungry in a crisis. So many, in fact, that we recently celebrated getting 13 million meals into the hands of American families who want to be prepared. WOW!</p>
				<p>As you can see we&rsquo;re no fly-by-night operation. No sir.</p>
				<p>Our office is located in Nashville, Tennessee and is just a few of miles from the famous Ryman Auditorium, home of the Grande Ole Opry.</p>
				<img style="margin-top: 7px" class="img-responsive pull-right img-padding-left" src="/media/images/f4p/letter/f4p-letter-recent-csr-team.jpg" alt="">
				<p>Here&rsquo;s a recent snapshot we took at the office here in Nashville so you can see we&rsquo;re real people &ndash; Americans &ndash; not some 800 number being routed over to some foreign basement call center in India or the Philippines, forced to talk with someone named &ldquo;Bob&rdquo; with an accent you can barely understand.&nbsp;</p>
				<p>With us, you&rsquo;ll only be dealing with Josh, Bonnie, Ray, Lisa and other good folks right here in the USA. People who own and have eaten Food4Patriots themselves and know the product inside out.</p>
				<p>Now to help make this a complete no-brainer for you.</p>

				<h2 class="darkRed text-center">I'm Also Offering Four Incredible FREE<br class="hidden-xs"> Bonus Reports That Will Be A Perfect<br class="hidden-xs"> Complement To Your Food</h2>
				<div class="row">
					<div class="col-xs-6 col-md-4"><img src="/media/images/bonuses/f4p-letter-10-items-after-crisis.jpg" width="100%" alt="Bonus 1" class="media left img-responsive"></div>
					<div class="col-xs-12 col-sm-6 col-md-8"><p><strong>Free Bonus #1</strong> - <strong>Top 10 Items Sold Out After a Crisis</strong>: In this report you'll learn the 10 items you absolutely need to hoard. If you miss this you'll be forced to go without them in a crisis. You'll also learn how to snag them on the cheap, sort them securely, and pump out every ounce of nutrition they have to offer.</p></div>
				</div>
				<div class="row">
					<div class="col-xs-6 col-md-4"><img src="/media/images/bonuses/f4p-letter-water-survival-guide.jpg" width="100%" alt="Bonus 2" class="media left img-responsive"></div>
					<div class="col-xs-12 col-sm-6 col-md-8"><p><strong>Free Bonus #2</strong> - <strong>The Water Survival Guide</strong>: Look, without clean water you can't prepare a scrap of food. You've got to have this report to complete your preps. This down-and-dirty guide will show you desperate-times water sources and filtration techniques to keep your family from going thirsty. It'll also walk you through the basics of water storage and tricks to easily grab water in an emergency.</p></div>
				</div>
				<div class="row">
					<div class="col-xs-6 col-md-4"><img src="/media/images/bonuses/f4p-letter-the-survival-garden-guide.jpg" width="100%" alt="Bonus 3" class="media left img-responsive"></div>
					<div class="col-xs-12 col-sm-6 col-md-8"><p><strong>Free Bonus #3</strong> - <strong>The Survival Garden Guide</strong>: A long-term food stockpile works best when you can add in some delicious, mouth-watering fruits and veggies from your garden. In this guide you get the lowdown on outdoor gardens, indoor gardens, freezing, and long-term storage. This is like "food insurance" so your family can get an almost endless supply of fresh-picked produce and canned delicacies.</p></div>
				</div>
				<div class="row">
					<div class="col-xs-6 col-md-4"><img src="/media/images/bonuses/f4p-letter-cut-grocery-bills-half.jpg" width="100%" alt="Bonus 4" class="media left img-responsive"></div>
					<div class="col-xs-12 col-sm-6 col-md-8"><p><strong>Free Bonus #4 </strong>- <strong>How to Cut Your Grocery Bills in Half</strong>: It's sad to see how much most Americans are forced to spend every time they go to the grocery store. Odds are you've seen an increase in spending too. Well it doesn't have to be like that. To help out I'm going to show you my down-and-dirty tricks to getting the best deal&hellip; and no, it&rsquo;s not just about clipping coupons!</p></div>
				</div>
				<p>When you choose your kit today you'll see a couple of special deals I just added… including <strong>FREE SHIPPING</strong> on our most popular kit, the 3-month supply.</p>
				<p>&nbsp;As you&rsquo;ve seen there&rsquo;s a lot involved in making survival food of this quality and that is guaranteed to last for 25 years.</p>

				<h2 class="darkRed text-center">An Outrageous Guarantee You Won’t Find Anyplace Else – That’s How Serious I Am</h2>
				<img class="img-responsive pull-left img-padding-right" width="240px" src="/media/images/misc/seal-guarantee-satisfaction.jpg" alt="Guarantee #1">
				<p>I also believe that you should be 100% happy with your purchase or you shouldn&rsquo;t pay a penny&hellip;&nbsp;</p>
				<p>So I am giving you a 100% money-back guarantee for 365 days with no questions asked. Here’s how it works: if for any reason you're not satisfied with your Food4Patriots Kit, just return it within 365 days (that’s a full year) of purchase and we'll refund 100% of your purchase price. That way there's absolutely no risk for you. And you can keep the free reports as gifts for giving Food4Patriots a try.</p>
				<p>One more thing... when you claim your Food4Patriots kit, you&rsquo;ll not only get food to feed your family in a disaster&hellip; you&rsquo;ll also get tremendous peace of mind just like our customer Jan explains:</p>
				<div class="col-md-12 margin-tb-20">
					<?php include_once ("testimonials/fb-testimonial-jan.html")?>
				</div>
				<p>Can you picture how good it's going to feel to have this security and independence?&nbsp;</p>
				<p>Now don't worry, there's no pressure to claim your Food4Patriots kit. In fact, if you don't want it, you can step aside. No hard feelings. There are plenty of other people who are dead set on preparing right now and they see that with all the uncertainty and warning signs, time is running out.</p>

				<h2 class="darkRed text-center">You Have Come To A Fork In The Road And It’s Entirely Up To You Which Way You Go</h2>
				<p>But if you're <strong>ready to take charge and look out for yourself and your family</strong>, then click on the button below. You'll be glad you did.</p>
				<p>This is about peace of mind, knowing that you and your family are well protected in the case of man-made or natural disasters. Don't you deserve this?</p>
				<img style="margin-top: 8px" class="img-responsive pull-right img-padding-left" src="/media/images/f4p/letter/f4p-letter-stockpile-greed.jpg" alt="">
				<p>To get your Food4Patriots kit rushed to you at this special price, plus the four free bonus reports, just click the big button below.&nbsp;</p>
				<p>Fair warning&hellip;</p>
				<p>If you decide to claim your package, there is something you should know about. It's a danger I call &ldquo;25-Year Stockpile Greed&rdquo;.</p>
				<p>When a food crisis strikes there are really two groups of people: the people who prepared, and the people who didn't. If you've read this far, my guess is you're someone who's going to prepare. But let me warn you - the rest of the world may very well be greedy for your stockpile. Especially now that we know that government wants to hoard these meals too.</p>
				<p>It's easy to imagine. If they run out of food for themselves or their children, they'll be willing to take anyone's food to get them fed. And unless you have a covert stockpile, your name could very well make it on that list.&nbsp;</p>
				<p>To keep your Food4Patriots order under the radar, we ship it in plain and unmarked packaging. There are no flashy logos, advertisements or emblems on the outside. Not even the deliveryman will know what you're getting.</p>
				<p>As of today, inventory is still available and when you order you will instantly receive an order confirmation. We will rush your order to you and you&rsquo;ll get a shipment tracking number as well. Click the &ldquo;<strong>Choose My Kit</strong>&rdquo; button below to get started.</p>
				<div id="buyButton2" class="center-block text-center">
					<a href="" class="scroll-link" data-id="order-form"><button type="button-1" class="btn-1">Choose My Kit</button></a>
					<p style="color:#002287;">(This Takes You To The Kit Options)</p>
				</div>
				<p>Now, bear with me for another few seconds and picture something in your mind because it&rsquo;s important.</p>
				<p>Imagine that it's 9:07 a.m. and the "you know what" has just hit the fan. People are panicking. It's all over the radio and TV.</p>
				<p>A news anchor comes on the TV screen and in a shaky voice says, "We are in a state of emergency. I repeat, we are now in a state of emergency."</p>
				<p>The 47 million freeloaders spoon-fed by big government are marching in the streets. There are rumors of looting. In fact there's a mob at your local grocery store. Like a swarm of locusts, the mob completely cleans out the store in less than two hours, leaving the shelves completely bare. Panic is spreading and it's quickly becoming every man for himself. You're safe at home with your family, thank goodness. But now your family is looking at you. "What's going to happen?" they ask. And then your spouse pulls you close and whispers in your ear, "What are we going to eat?"</p>
				<p>Get your Food4Patriots kit now and you&rsquo;ll NEVER have to worry about how you&rsquo;re going to answer that question. You&rsquo;ll calmly reassure them that they&rsquo;re safe and they will have plenty to eat. Because your food stockpile will be a source of comfort and strength in the storm. Just imagine how much better you&rsquo;ll feel.</p>

				<h2 class="darkRed text-center">I Can’t Make It Any Plainer Than This</h2>
				<p>You&rsquo;re at a crossroads. You can either take action now and be able to feed your family no matter what happens, or you can rely on the government for help in a crisis.</p>
				<p>Remember what Ronald Reagan once said&hellip; the 10 most terrifying words you&rsquo;ll ever hear are:</p>
				<img class="img-responsive pull-right img-padding-left" src="/media/images/f4p/letter/f4p-letter-f4p-disaster-02.jpg" alt="">
				<p>&ldquo;I&rsquo;m from the government, and I&rsquo;m here to help you.&rdquo;</p>
				<p>One thing is clear&hellip; you&rsquo;ve got to make a choice.</p>
				<p>Be sure to make the right one.</p>
				<p>You&rsquo;ve seen enough to know that something bad can happen, and it&rsquo;s plain common sense to prepare, just in case.</p>
				<p>You can get started risk free because you&rsquo;re backed by a 100% money-back guarantee for 365 days. It&rsquo;s like trying it before you buy it.</p>
				<p>Remember, this is delicious food good for 25 years of storage. So even if we&rsquo;re dead wrong about the direction we&rsquo;re heading and everything turns out fine, you'll still come out ahead with your food stockpile because if you don't need it, just eat it!</p>
				<p>Click the '<strong>Click to Accept'</strong>&nbsp;button for the kit that best fits your families needs.</p>
			</div>
		</div>
	</div>
	<?php if (JV::in("76-dropdown")) : /*JV-76 BUTTON SPLIT TEST*/ ?>
		<div class="oto-full-width">
			<link rel="stylesheet" href="/assets/css/bootstrap-select.min.css">
			<script src="/assets/js/bootstrap-select.min.js"></script>
			<style>
				.container .bootstrap-select li {
					margin-bottom: 5px;
				}
				.bootstrap-select .btn, .bootstrap-select li {
					font-weight: bold;
					font-size: 12pt;
				}
				.bootstrap-select .btn:hover, .btn:focus {
					color: #000000;
				}
				@media screen and (max-width: 550px){
					.btn-2{
						font-size: 21px;
					}
			</style>
			<script>
				$('.selectpicker').selectpicker({
					style: 'btn-info',
					size: 4
				});
				if( /Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent) ) {
					$('.selectpicker').selectpicker('mobile');
				}

				function productChange(whichSelect){
					selectedProductId = parseInt(whichSelect);
					buttonPrice = document.getElementById('buttonPrice');
					switch(selectedProductId) {
						case 19:
							document.getElementById('3mk').style.display = 'block';
							document.getElementById('4wk').style.display = 'none';
							document.getElementById('1wk').style.display = 'none';
							buttonPrice.innerHTML = "Add To Cart - $497";
							break;
						case 18:
							document.getElementById('3mk').style.display = 'none';
							document.getElementById('4wk').style.display = 'block';
							document.getElementById('1wk').style.display = 'none';
							buttonPrice.innerHTML = "Add To Cart - $197";
							break;
						case 92:
							document.getElementById('3mk').style.display = 'none';
							document.getElementById('4wk').style.display = 'none';
							document.getElementById('1wk').style.display = 'block';
							buttonPrice.innerHTML = "Add To Cart - $67";
							break;
					}
				}
			</script>
			<div id="order-form" style="padding:10px;">
				<div id="3mk">
					<div class="row nomargin">
						<div class="col-sm-12 col-md-7 col-md-offset-0 text-center">
							<img src="/media/images/f4p/f4p-3-month-kit-11.jpg" class="img-responsive center-block">
						</div>
						<div class="col-sm-12 col-md-4" style="margin: 28px 0 0;">
							<h2 class="darkRed text-center">3-Month Supply</h2>
							<h4 class="text-center"><i>$</i>497<i>.00</i> <span>($5/day)</span></h4>
							<ul class="pricing-content list-unstyled" style="max-width: 300px;margin: 0 auto;">
								<li><i class="fa fa-check"></i> <strong>Free</strong> Shipping <span></span></li>
								<li><i class="fa fa-check"></i> <strong>Free</strong> Seed Vault <a href="#info" id="seedsPopover" rel="popover" data-placement="bottom" data-toggle="tooltip" class="tooltip-content hidden-xs" data-original-title="" title=""><i style="color: #0c83e7" class="fa fa-info-circle"></i></a><span></span></li>
								<li><i class="fa fa-check"></i> <strong>Free</strong> 4 Written Reports <a href="#info" id="reportsPopover" rel="popover" data-placement="bottom" data-toggle="tooltip" class="tooltip-content hidden-xs" data-original-title="" title=""><i style="color: #0c83e7" class="fa fa-info-circle"></i></a></li>
								<li><i class="fa fa-check"></i> <strong>Free</strong> Survival Tool <a href="#info" id="toolPopover" rel="popover" data-placement="bottom" data-toggle="tooltip" class="tooltip-content hidden-xs" data-original-title="" title=""><i style="color: #0c83e7" class="fa fa-info-circle"></i></a><span></span></li>
							</ul>
						</div>
					</div>
				</div>
				<div id="4wk" style="display:none;">
					<div class="row">
						<div class="col-sm-12 col-md-6 col-md-offset-1 text-center">
							<img src="/media/images/f4p/f4p-4-week-kit-08.jpg" class="img-responsive center-block">
						</div>
						<div class="col-sm-12 col-md-4">
							<h2 class="darkRed text-center">4-Week Supply</h2>
							<h4 class="text-center"><i>$</i>197<i>.00</i> <span>($7/day)</span></h4>
							<ul class="pricing-content list-unstyled" style="max-width: 300px;margin: 0 auto;">
								<li><i class="fa fa-check"></i> Free Shipping<span></span></li>
								<li><i class="fa fa-check"></i> Free 4 Digital Reports</li>
							</ul>
						</div>
					</div>
				</div>
				<div id="1wk" style="display:none;">
					<div class="row">
						<div class="col-sm-12 col-md-5 col-md-offset-1 text-center">
							<img src="/media/images/f4p/f4p-1-week-kit-10.jpg" class="img-responsive center-block" style="margin: 17px 0 0;">
						</div>
						<div class="col-sm-12 col-md-5">
							<h2 class="darkRed text-center">1-Week Supply</h2>
							<h4 class="text-center"><i>$</i>67<i>.00</i> <span>($10/day)</span></h4>
							<ul class="pricing-content list-unstyled" style="max-width: 300px;margin: 0 auto;">
								<li><i class="fa fa-check"></i> Free 4 Digital Reports</li>
								<li><i class="fa fa-check"></i> $5.95 S/H ($72.95 total)</li>
							</ul>
						</div>
					</div>
				</div>

				<form method="post" action="<?php echo url('/checkout/process.php'); ?>" id="order-process">
					<div class="text-center center-block">
						<input id="taxState_92" type="hidden" value="<?php echo strtolower($billingStateName);?>">
						<label for="productId" style="font-size: 11pt;display: block;margin: 30px 0 0">Choose Your Kit:</label>
						<select class="selectpicker show-menu-arrow" data-width="auto" name="productId" id="productId" style="margin:20px auto;" onchange="productChange(this.value);">
							<option value="19">3-Month Supply</option>
							<option value="18">4-Week Supply</option>
							<option value="92">1-Week Supply</option>
						</select>
						<div style="margin:0 auto;padding: 30px 0 37px 0">
							<div class="text-center">
								<a href="javascript:{};" onclick="document.getElementById('order-process').submit(); return false;" title="Add to Order!"><img class="img-responsive center-block" src="/assets/images/buttons/btn-orange-click-accept-01.jpg" alt="Buy It Now!" border="0" /><span id="buttonPrice" style="font-size: 20px;font-weight: bold;">Add To Cart - $497</span></a>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	<?php else : ?>
		<div style="margin-top: 0;padding-top: 0" class="container content" id="order-form">
			<div class="row margin-bottom-40 pricing-sticker">
				<form action="/checkout/process.php" method="post" accept-charset="utf-8" id="order-process1">
					<input name="productId" type="hidden" value="92">
					<input id="taxState_92" type="hidden" value="<?php echo strtolower($billingStateName);?>">
					<input id="productData[92]" type="hidden" value="{'productId':92,'price':67,'shipping':0}">
					<div class="col-xs-6 col-sm-4 tables-fw">
						<div class="pricing hover-effect">
							<div class="pricing-head">
								<h3>1-Week Kit<span>Includes 40 Servings</span></h3>
								<img class="product-img" src="/media/images/f4p/f4p-1-week-kit-09.jpg">
								<h4><i>$</i>67<i>.00</i> <span>($10/day)</span></h4>
							</div>
							<ul class="pricing-content list-unstyled">
								<li><i class="fa fa-check"></i> Free 4 Digital Reports</li>
								<li><i class="fa fa-check"></i> $5.95 S/H ($72.95 total)</li>
								<!--<li><i class="fa fa-check"></i> Product Fact<span></span></li>
								<li><i class="fa fa-check"></i> Product Fact<span></span></li>
								<li><i class="fa fa-check"></i> Product Fact<span></span></li>
								<li><i class="fa fa-check"></i> Product Fact<span></span></li>-->
							</ul>
							<div style="line-height: 25px;padding-bottom:10px" class="pricing-footer">
								<p>Great for a little extra peace of mind in a crisis</p>
							</div>
							<?php
							if($isUpgrade) {
								?>
								<a class="btn-u" href="/order/92" name="submit" onClick=""><i class="fa fa-shopping-cart"></i> Click to Accept</a>
								<?php
							} else {
								?>
								<button class="btn-u" name="submit" onClick=""><i class="fa fa-shopping-cart"></i> Click to Accept</button>
								<?php
							}
							?>
						</div>
					</div>
				</form>
				<form action="/checkout/process.php" method="post" accept-charset="utf-8" id="order-process2">
					<input name="productId" type="hidden" value="19">
					<input id="taxState_19" type="hidden" value="<?php echo strtolower($billingStateName);?>">
					<input id="productData[19]" type="hidden" value="{'productId':19,'price':497,'shipping':0}">
					<div class="col-xs-6 col-sm-4 tables-fw">
						<div class="hover-effect price-active">
							<div style="box-shadow:none;border: none" class="pricing price-active">
								<div class=" sticker-right">Value</div>
								<div class="pricing-head">
									<h3>3-Month Kit<span>Includes 450 Servings</span></h3>
									<img class="product-img" src="/media/images/f4p/f4p-3-month-kit-11-300x200.jpg">
									<h4><i>$</i>497<i>.00</i> <span>($5/day)</span></h4>
								</div>
							</div>
							<ul class="pricing-content list-unstyled">
								<li><i class="fa fa-check"></i> <strong>Free</strong> Shipping <span></span></li>
								<li><i class="fa fa-check"></i> <strong>Free</strong> Seed Vault <a href="#info" id="seedsPopover" rel="popover"  data-placement="bottom" data-toggle="tooltip" class="tooltip-content hidden-xs"><i style="color: #0c83e7" class="fa fa-info-circle"></i></a><span></span></li>
								<li><i class="fa fa-check"></i> <strong>Free</strong> 4 Written Reports <a href="#info" id="reportsPopover" rel="popover"  data-placement="bottom" data-toggle="tooltip" class="tooltip-content hidden-xs"><i style="color: #0c83e7" class="fa fa-info-circle"></i></a></li>
								<li><i class="fa fa-check"></i> <strong>Free</strong> Survival Tool <a href="#info" id="toolPopover" rel="popover"  data-placement="bottom" data-toggle="tooltip" class="tooltip-content hidden-xs"><i style="color: #0c83e7" class="fa fa-info-circle"></i></a><span></span></li>
							</ul>
							<div style="line-height: 25px;padding-bottom:10px" class="pricing-footer">
								<p>Best value deluxe kit leaving you fully prepared</p>
							</div>
							<?php
							if($isUpgrade) {
								?>
								<a class="btn-u" href="/order/19" name="submit" onClick=""><i class="fa fa-shopping-cart"></i> Click to Accept</a>
								<?php
							} else {
								?>
								<button class="btn-u" name="submit" onClick=""><i class="fa fa-shopping-cart"></i> Click to Accept</button>
								<?php
							}
							?>
						</div>
					</div>
				</form>
				<form action="/checkout/process.php" method="post" accept-charset="utf-8" id="order-process3">
					<input name="productId" type="hidden" value="18">
					<input id="taxState_18" type="hidden" value="<?php echo strtolower($billingStateName);?>">
					<input id="productData[18]" type="hidden" value="{'productId':18,'price':197,'shipping':0}">
					<div class="col-xs-6 col-sm-4 tables-fw">
						<div class="pricing hover-effect">
							<div class="pricing-head">
								<h3>4-Week Kit<span>Includes 140 Servings</span></h3>
								<img class="product-img" src="/media/images/f4p/f4p-1month-kit-01.jpg">
								<h4><i>$</i>197<i>.00</i> <span>($7/day)</span></h4>
							</div>
							<ul class="pricing-content list-unstyled">
								<li><i class="fa fa-check"></i> Free Shipping<span></span></li>
								<li><i class="fa fa-check"></i> Free 4 Digital Reports</li>
							</ul>
							<div style="line-height: 25px;padding-bottom:10px" class="pricing-footer">
								<p>Optimal for covert storage and packaged for a<br class="hidden-xs"> longer crisis</p>
							</div>
							<?php
							if($isUpgrade) {
								?>
								<a href="/order/18" class="btn-u"  name="submit" onClick=""><i class="fa fa-shopping-cart"></i> Click to Accept</a>
								<?php
							} else {
								?>
								<button class="btn-u" name="submit" onClick=""><i class="fa fa-shopping-cart"></i> Click to Accept</button>
								<?php
							}
							?>
						</div>
					</div>
				</form>
			</div>
			<div>
			</div>
		</div>
	<?php endif ?>


	<div class=" content" >
		<div class="container oto-width">
			<div class="col-md-12 margin-tb-20">
				<?php include_once ("testimonials/fb-testimonial-brian.html")?>
			</div>
			<div class="col-md-12 margin-tb-20">
				<?php include_once ("testimonials/fb-testimonial-karen.html")?>
			</div>
		</div>
	</div>
	<div style="font-size: 20px" class="noThanks">
		<a  onclick="showDeclineModal();">No Thanks</a> – I do not see the value in stockpiling<br class="hidden-xs"> survival food just in case and I trust<br class="hidden-xs"> the government will bail me out<br class="hidden-xs"> when things go wrong
	</div>

	<!--- Decline Modal ---->
	<div >
		<script>
			function showDeclineModal() {
				$('#declineModal').modal('show');
			}
			function hideDeclineModal() {
				$('#declineModal').modal('hide');
			}
			function acceptModal() {
				hideDeclineModal();
				document.querySelector('#order-form').scrollIntoView();
			}
		</script>
		<style>
			#declineModal p {
				margin-bottom:7px;
			}
			.button {
				border: none;
				width: 100%;
				background: #5fb760;
				color: #fff;
				padding: 15px;
				border-radius:.5em;
				text-decoration: none;
			}

			.button:hover {
				background: #489c48;
				cursor:pointer;
				-webkit-tap-highlight-color: rgba(0,0,0,0);
			}
		</style>
		<div id="declineModal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg" style="max-width:620px;">
				<div class="modal-content" >
					<div class="modal-body">
						<div class="glyphicon glyphicon-remove-circle" style="float:right;cursor:pointer;" onclick="hideDeclineModal();"></div>
						<div style="padding:10px;">
							<div class="row">
								<div class="col-xs-12">
									<h3 class="text-center"><span class="darkRed">WAIT!</span> This is your final opportunity to claim your exclusive discount on your Food4Patriots kit and you MUST CONFIRM you are permanently giving up this one­-time special offer!!</h3>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-12">
									<p>I understand that these kits are flying off the shelves and may sell out any time.</p>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-12">
									<p>Yes, I am giving up my chance to get this “stockpiler’s dream” that could feed my entire family in the event of a crisis or emergency situation.</p>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-12">
									<p>I accept that by declining this offer, I may never see the Food4Patriots kits at these prices ever again.</p>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-12">
									<div class="text-center" style="padding:20px;"><a href="<?php echo $declineUrl;?>">No thanks, I’ll take my chances. Give another patriot my kit(s).</a></div>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-12">
									<button id="modalAccept" class="button" onclick="acceptModal();" style="font-size: 19px">I Changed My Mind! Send Me Back to the Page so I Can Add A <br />Food4Patriots Kit to My Order Now!</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end decline modal -->

	<div style="font-size: 20px;" class="outLineBoxDarkBlue">
		<p><img style="padding-right: 10px;" src="/media/images/misc/seal-guarantee-satisfaction.jpg" alt="Guarantee #1" class="pull-left img-responsive media margin-t-20">
		<h3>Guarantee #1:</h3> This is a 100% money back guarantee. No questions asked. If for any reason you&rsquo;re not satisfied with your Food4Patriots kit, just return it within 365 days of purchase and I&rsquo;ll refund 100% of your purchase price. If you try it and decide it&rsquo;s not as delicious and nutritious as I promised, you can have your money back for any reason, or no reason whatsoever. So there&rsquo;s absolutely no risk for you. You literally can&rsquo;t lose!</p>
		<div class="clearfix"></div>
	</div>

	<div style="font-size: 20px" class="outLineBoxDarkBlue">
		<p><img style="margin-bottom: 20px;padding-right: 10px;" src="/media/images/misc/seal-guarantee-money.jpg" alt="Guarantee #2" class="pull-left img-responsive media margin-t-20">
		<h3>Guarantee #2:</h3> This is an unheard of 300% money back guarantee. It&rsquo;s in addition to guarantee #1. If you open any of your Food4Patriots meals anytime <strong>in the next 25 years</strong> and find that your food has spoiled or gone bad, you can return your entire Food4Patriots stockpile and I will <strong>triple</strong> your money back!</p>

		<p>That&rsquo;s how confident I am that this food will remain just as delicious and nutritious for the next 25 years as it is on the day you buy it. Some of my friends said I was crazy to offer this double guarantee, but to be honest I&rsquo;m not really worried about it, because I am so confident you&rsquo;re going to see the value in your Food4Patriots kit as soon as you have it in your hands.</p>
	</div>
	<div class="col-md-12">
		<div id="buyButton2" class="center-block text-center">
			<a href="" class="scroll-link" data-id="order-form"><button type="button-1" class="btn-1">Choose My Kit</button></a>
			<p style="color:#002287;">(This Takes You To The Kit Options)</p>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div id="video-references">
					<div>Research References</div>
					<p style="font-size: 12px !important;">
						1. <em>Fox News.</em> &ldquo;Americans May Soon Be Able to Get Food Stamps By Phone.&rdquo; 2015.<br>
						2. <em>Fox News</em>. &ldquo;Most states waiving work requirements for food stamps, despite improving job market.&rdquo; 2015.<br>
						3. <em>Wall Street Journal</em>. Vilsack, T. &ldquo;A Half-Baked GOP Plan for Food Stamps.&rdquo; 2015.<br>
						4. <em>Wall Street Journal</em>. Bovard, B. &ldquo;How the Feds Distort Their 'Food Insecurity' Numbers.&rdquo; 2014.<br>
						5. <em>BreitBart</em>. Hall, W.  &ldquo;14 Million More on Food Stamps Under Obama.&rdquo; 2014.<br>
						6. <em>Fox News</em>. Lott, J. &ldquo;Baltimore riots and the price of protest.&rdquo; 2015.<br>
						7. <em>Fox News.</em> &ldquo;FEMA can't account for up to $4.56M Sandy fuel funds.&rdquo; 2015.<br>
						8. <em>Fox News</em>. Chiaramonte, P. &ldquo;Black Lives' leader defends looting in Yale lecture.&rdquo; 2015.<br>
						9. <em>Wall Street Journal</em>. Riley, J. &ldquo;The Lawbreakers of Baltimore—and Ferguson.&rdquo; 2015.<br>
						10. <em>Wall Street Journal</em>. McWhirter, C. &ldquo;Protesters Turn Out in U.S. Cities Following Ferguson Decision.&rdquo; 2015.<br>
						11. <em>Natural News</em>. Heyes, J.D. &ldquo;Why did Obama nationalize the U.S. food supply with executive order 13603?.&rdquo; 2015.<br>
						12. <em>Fox News</em>. &ldquo; FEMA asking disabled, elderly residents to repay aid from superstorm Sandy.&rdquo; 2015.<br>
						13. <em>Before It&rsquo;s News</em>. &ldquo;Disaster Looms: FEMA Scrambles to Stockpile Food Reserves.&rdquo; 2015.<br>
						14. CBS News. Reid, C. &ldquo;In the Dark of Power Grid Security.&rdquo; 2015.<br>
						15. <em>AARP</em>. Green, C. &ldquo;A Conversation With Ted Koppel The former 'Nightline' anchor talks about cyberterrorism.&rdquo; 2015.<br>
						16. <em>The Telegraph</em>. Lean, G. &ldquo;There's a food crisis coming. Are we ready?.&rdquo; 2015.<br>
						17. <em>Fox News</em>. &ldquo;New Reports of looting in Baltimore as national guard join police in patrolling streets.&rdquo; 2015.<br>
						18. <em>Washington Examiner.</em> Bedard, P. &ldquo;New Isis threat: America&rsquo;s electric grid; blackout could kill 9 of 10&rdquo;. 2014.
					</p>
				</div>
			</div>
		</div>
	</div>

	<div id="productModal" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-sm" style="width: 417px;">
			<div class="modal-content">
				<div class="glyphicon glyphicon-remove-circle" style="float:right;cursor:pointer;padding:10px;z-index:1001;" onclick="hideProductModal();"></div>
				<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
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

					<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
					<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
				</div>
			</div>
		</div>
	</div>
	<script>
		function showFEMAModal() {
			$('#FEMAModal').modal('show');
		}
		function hideFEMAModal() {
			$('#FEMAModal').modal('hide');
		}
		function showProductModal() {
			$('#productModal').modal('show');
		}
		function hideProductModal() {
			$('#productModal').modal('hide');
		}
		$(document).ready(function(){
			$('#mcarousel-example-generic').carousel({
				interval: 5000
			})
		});
		/* ----- Popovers---- */
		$(document ).ready(function () {
			$("#reportsPopover").popover({
				html:true,
				trigger: 'hover',
				title:"4 FREE Written Reports",
				content: "<img src=/media/images/bonuses/f4p-written-reports-01.jpg>"
			});

		});
		$(document ).ready(function () {
			$("#toolPopover").popover({
				html:true,
				trigger: 'hover',
				title:"11-in-1 Survival Tool",
				content: "<img src=/media/images/ppg/ppg-bonus-tool-01.jpg>"
			});

		});
		$(document ).ready(function () {
			$("#seedsPopover").popover({
				html:true,
				trigger: 'hover',
				title:"Liberty Seed Vault",
				content: "<img src=/media/images/ss4p/ss4p-lsv-spread-03.jpg style='width: 300px;'>" + "More than 5,640 survival seeds from 22 varieties of hardy and delicious heirloom seeds passed down from our forefathers.",
			});
		});
		/* ---- Scroll to ID ------ */
		$(document).ready(function() {
			// navigation click actions
			$('.scroll-link').on('click', function(event){
				event.preventDefault();
				var sectionID = $(this).attr("data-id");
				scrollToID('#' + sectionID, 750);
			});
			// scroll to top action
			$('.scroll-top').on('click', function(event) {
				event.preventDefault();
				$('html, body').animate({scrollTop:0}, 'slow');
			});
			// mobile nav toggle
			$('#nav-toggle').on('click', function (event) {
				event.preventDefault();
				$('#main-nav').toggleClass("open");
			});
		});
		// scroll function
		function scrollToID(id, speed){
			var offSet = 50;
			var targetOffset = $(id).offset().top - offSet;
			var mainNav = $('#main-nav');
			$('html,body').animate({scrollTop:targetOffset}, speed);
			if (mainNav.hasClass("open")) {
				mainNav.css("height", "1px").removeClass("in").addClass("collapse");
				mainNav.removeClass("open");
			}
		}
		if (typeof console === "undefined") {
			console = {
				log: function() { }
			};
		}
	</script>
	<script>
		function showCsrModal() {
			$('#csrModal').modal('show');
		}
		function hideCsrModal() {
			$('#csrModal').modal('hide');
		}
	</script>
	<style>#csrModal p{margin-bottom:7px;}</style>
	<div id="csrModal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" style="width:500px;height:300px;">
			<div class="modal-content" style="background-image:url(/assets/images/misc/timer-pop-01.jpg);">
				<div style="text-align:center;padding:10px;width:500px;height:300px;">
					<div class="glyphicon glyphicon-remove-circle" style="float:right;cursor:pointer;" onclick="hideCsrModal();"></div>
					<div style="position:relative;top:160px;width:300px;">
						<p><a class="btn btn-primary" href="/checkout/alt/f4p-free-food-offer.php">Try A Free Sample</a></p><p><a class="btn btn-success" href="/video/index.php">Return To Video</a></p><p><a class="btn btn-success" href="/letter/index.php">Read A Description</a></p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php include_once ("footer.php")?>
