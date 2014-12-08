<?php
$firstName = $_SESSION["customerDataArray"]["firstName"];
// SET PRODUCT ID
$_SESSION['productId'] = 7; //please keep as an integer
$_SESSION['quantity'] = '1';
$_SESSION['upsell'] = TRUE; //must stay a boolean
$_SESSION['pageReturn'] = '/checkout/order.php';
include_once("Product.php");
$productDataObj = Product::getProduct($_SESSION["productId"]);
include_once("template-top.php");
include_once ('template-header.php'); /*Add template-header-nav.php to add top menu*/
?>
<script src="/js/jquery.timers-1.2.js" type="text/javascript"></script>
<script src="/js/jcookie.js" type="text/javascript"></script>
<script type="text/javascript">
// Change these values for the content within the "buttons" div to appear at this time.
		$(document).ready(function(){

			var hours = 0;
			var minutes = 17;
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
<div class="container-main">
	<div class="breadcrumb1">
		<a>CHECKOUT</a>
		<a class="current">ORDER CUSTOMIZATION</a>
		<a>ORDER CONFIRMATION</a>
	</div>
<div class="container oto-width">
		<div>
		  <h1 class="darkRed text-center">&quot;<?php echo $firstName;?><span class="titles">, This Surprising Item Is More Valuable Than Gold In A Crisis..."</span></h1>
		</div>
		<div id="videobox" class="hidden-xs">
			<iframe src="//fast.wistia.net/embed/iframe/j04u9rv7k5" allowtransparency="true" frameborder="0" scrolling="no" class="wistia_embed" name="wistia_embed" allowfullscreen mozallowfullscreen webkitallowfullscreen oallowfullscreen msallowfullscreen width="640" height="360"></iframe>
		</div>
		<div id="buyButton" style="padding-bottom:20px;display:none;">
			<a href="/checkout/process.php" title="Add to Order!"><img class="img-responsive center-block" src="/assets/images/buttons/btn-orange-click-accept-01.jpg" alt="Buy It Now!" border="0" /></a>
			<p class="text-center">Get your Liberty Seed Vault (plus 4 FREE bonuses and FREE Shipping) for just $47 today by clicking the big orange &quot;click to accept&quot; button above.</p>
		</div>
		<div>

			<p class="text-center read-warning" style="max-width:450px;">PLEASE READ THIS ENTIRE PAGE & ACCEPT OR DECLINE
THIS OFFER AT THE BOTTOM OF THIS PAGE</p>
			<p>Hey there <?php echo $firstName;?> , it’s Frank Bates, founder of SurvivalSeeds4Patriots, and I just wanted to say CONGRATULATIONS for claiming your free Heirloom Survival Seeds today.</p>
			<p>I know you’re going to be impressed with the high germination rates of these “super seeds,” not to mention the delicious vegetables!</p>
			<p>You've taken a great 1st step and shown that you're the kind of person ready to take action to ensure your family's food supply in a time of crisis. </p>

			<h2 class="darkRed text-center">Our Government Seems Completely Incapable Of Handling Them Effectively!</h2>
			<p>Think about it. In 2012, Hurricane Sandy knocked out power to millions and disrupted the distribution of food and essential supplies in one of the most heavily populated areas of the country, and they’re saying it could take months for recovery. </p>
			<p>In fact, within days of the storm, WNBC caught footage of desperate New Yorkers “Dumpster Diving” -- pulling food out of dumpsters -- because they were so hungry.</p>
			<p>In 2011 after the tsunami in Japan, over 300,000 people were evacuated to camps where some died.  Survivors lined up for blocks outside of 7-11s and grocery stores for a scrap of food. </p>
			<p><img class="img-padding-right pull-left img-responsive media" src="/media/images/misc/img-tsunami-01.jpg" alt="Japan tsunami" style="max-width:195px;"/>And of course you remember the horrible days after Hurricane Katrina in 2004. Stores closed, there was looting everywhere and thousands of people ended up at FEMA shelters begging for food and water. </p>
			<p>You and I both know that most Americans can’t see the writing on the wall about the disaster that’s waiting for them right around the corner. The government tells them that everything is fine and that there’s no need to worry…and they actually buy it, hook, line and sinker. They assume the basic necessities of survival will always be right there waiting for them with a quick swipe of a credit card. They’re like deer stuck in the headlights, trusting an inept and corrupt federal government to take care of them and doing nothing to protect themselves or their families. Well, I wasn’t going to be one of them.</p>
			
			<h2 class="darkRed text-center">I Knew That If A Disaster Came Our Way I Needed To Focus On The Thing That Would Be Absolutely Critical To Our Survival…</h2>
			<p><img src="/media/images/misc/img-crops-01.jpg" alt="Corn Crops" class="img-padding-left pull-right img-responsive media" />Our food supply.</p>
			<p>And I’m not just talking about an emergency stockpile. I knew what was coming, and I wanted food security and peace of mind for the long term. </p>
			<p>Consider this: </p>
			<p>Jeremy Grantham, an expert analyst, wrote a letter to his investors warning that the looming U.S. food price increase in 2013 is just the beginning. </p>
			<p>Higher U.S. food prices are the last thing the country needs with the government driving our economy off a cliff, but Americans need to understand that there is more at stake. </p>
			<p><img src="/media/images/misc/img-graph-food-01.jpg" alt="Graph" class="img-padding-right pull-left img-responsive media" />The long summer drought in 2012, which impacted 65% of the states in the U.S. and increased prices to record highs, is just a mild preview of what will happen as wheat and corn crop shortages escalate in severity.  </p>
			<p>As Grantham warned, &quot;Any price increase from here may cause social collapse and a wave of immigration on a scale never before experienced in peacetime. Another doubling in grain prices would be catastrophic.&quot;  </p>
			<p>Other experts are also sounding the warning. A contributing editor at Newsweek, David Frum, put it even more bluntly:</p>
	  		<h2 class="darkRed text-center">&quot;Hungry people are angry people, and angry people bring governments down.&quot;</h2>
			<p><img src="/media/images/misc/img-angrypeople.jpg" alt="Hungry People" class="img-padding-right pull-left img-responsive media"/>But as usual, the folks in charge are asleep at the wheel. In fact, they’re making it worse. Washington is currently paying big money to the huge farming companies to produce corn for the government’s “environmentally friendly” ethanol program (never mind that corn ethanol delivers only a tiny reduction in greenhouse gases compared to regular gasoline!). So naturally “Big Food” growers are switching their fields from other food crops to corn…why not? The government’s paying for it! So the price of all other food crops is going up…and up and up. </p>
			<p>The cold hard truth is that our food supply chain is completely outdated, not to mention incredibly vulnerable to terrorist attacks and natural disasters… and no one in the government even seems to care!</p>
			<p>It scares me to think what would happen on their watch if a real disaster presented itself. </p>
			<p><img src="/media/images/misc/img-tornado-01.jpg" alt="Tornado" class="img-padding-left pull-right img-responsive media" />Unless something dramatically changes, the global food crisis is only going to get worse and worse. </p>
			<p>And as food prices continue to rise, will we start to see more food riots erupt all over the world as starving populations demand answers from their governments? </p>
			<p>What is going to happen if we have a string of really bad natural disasters like Katrina and Sandy and so many others… or God forbid if things get worse? </p>
			<p>What is going to happen if the economy continues to tank… and we experience an even worse global economic collapse?</p>
			<h2 class="darkRed text-center">Who Is Going To Decide Who Eats And Who Doesn't?</h2>
			<p><img src="/media/images/misc/img-shelf-bare.jpg" alt="Shelf Bare" class="img-padding-right pull-left img-responsive media" />Let me tell you, I was sick and tired of lying awake at night, imagining myself racing to the store after a crisis hit, only to be faced with row after row of completely empty shelves and having to break the news to my family that I wasn’t going to be bringing home any food. </p>
			<p>Now I’m an independent, proud American…and I’m not ashamed of it. </p>
			<p>Trust me when I say I wasn’t about to rely on the government or some big company to bail me out if the going gets tough. No way. </p>
			<p><img src="/media/images/misc/img-proud-america.jpg" alt="Proud" class="img-padding-left pull-right img-responsive media" />The way I see it, you’ve got two options for handling the looming “food crisis.” You can sit by as the stores start price gouging, making desperate consumers pay astronomical prices for basic necessities. You can take your chances with big government &amp; FEMA when the food shortages start, or you can take your survival into your own hands. Now I prefer the second choice, and I know you will too.</p>

			<h2 class="darkRed text-center">So Let Me Tell You What I Did To Make Sure My Family Has What We Need To Survive Every Single Day…</h2>
			<p>I dug in and started researching, and boy did I read and hear a lot of different opinions! </p>
			<p>This isn’t just about picking the right canned foods in the grocery store and sticking them in your basement. Having an emergency stockpile of canned goods is definitely a great idea, but doing that is NOT a long-term plan for survival. I discovered that the safer, cheaper, and far more nutritious solution was to be prepared to grow my own food if I had to. </p>
			<p><img src="/media/images/misc/img-veggies.jpg" alt="survival seeds" class="img-padding-right pull-left img-responsive media" />Imagine a disaster or social chaos hitting your area. It’s a bona fide crisis. The frightened hordes clear out the grocery stores in hours and people get more and more desperate. </p>
			<p>But now imagine how you would feel if you could step out your back door and have abundance of fresh, delicious food just waiting for you? Or open your pantry door on a cold winter day and see row after row of colorful jars of fruits and vegetables, preserved at the peak of freshness? Imagine that when the rest of the country is scrambling to stockpile tasteless processed food and fighting each other over the last can of soggy vegetables, you could be plucking delicious, fresh, heirloom fruits and vegetables right from your own survival garden. </p>
			<p>That’s what I want for my family, and I bet you do too.</p>

			<h2 class="darkRed text-center">That’s When I Discovered A “Dead Simple” Solution That Gave Me Complete Peace Of Mind That I Would Always Be Able To Feed My Family… No Matter What Happens.</h2>
			<p><img src="/media/images/misc/img-seeds-01.jpg" alt="survival seeds" class="img-padding-left pull-right img-responsive media" />It’s called a seed vault. </p>
			<p>A seed vault is a special secure collection of heirloom, non-genetically modified seeds that can provide you and your family with healthy, fresh food for years to come, regardless of what catastrophic events may happen. </p>
			<p>These are NOT ordinary seeds… these are super seeds that have been chosen for their truly extraordinary germination rates. With these super seeds, you can grow thousands of pounds of nutrient dense food in almost any location in the United States... and harvest the seeds again and again so you can feed your family forever, unlike the genetically-modified “Franken-seeds” sold nowadays by most companies!</p>

			<h2 class="darkRed text-center">So What The Heck Are Genetically Modified Seeds Anyway?</h2>
			<p>When seeds are genetically modified, they can be grown faster and in larger quantities, lining the pockets of the big corporate fat cats that could care less about you and your family’s health. That’s why some people call ‘em “Franken-seeds”… they’re lab experiments gone bad. </p>
			<p>Because whether you know it or not… </p>
			<p><img src="/media/images/misc/img-biohazard.jpg" alt="survival seeds" class="img-padding-right pull-left img-responsive media" />Our government is quietly approving all kinds of genetically modified seeds that in some cases can include deadly chemicals. Look at just 1 recent example: </p>
			<p>Dow Agrosciences convinced the USDA to allow a new genetically modified corn seed engineered to withstand heavy sprayings of the herbicide 2,4-d, an ingredient in agent orange, the toxic compound used to defoliate forests and croplands during the Vietnam War. Yikes! </p>
			<p>As Mark Kastel from the Cornucopia Institute said recently:  </p>
			<p>&quot;President Obama and Secretary of Agriculture Vilsack just sent a clear message to the American public that they do not care about our concerns with genetically engineered food and their questionable safety, adverse environmental impacts, and detrimental effects on farmers.” </p>
			<p>When I heard this I became even more determined to get seeds that have remained in their truest state, as God intended. </p>
			<p>It took a lot of time and effort, but I finally put together my own seed vault. I painstakingly researched the best seed varieties, optimal growing conditions, and how to make sure I would be able to harvest seeds from my survival garden year after year. I developed a simple yet super-effective storage system that would provide long-term protection for my precious cache of seeds so I could have complete peace of mind about my family’s food supply.</p>

			<h2 class="darkRed text-center">Well, When My Friends And Extended Family Got Wind Of What I Was Doing, They Practically Beat Down My Door To Find Out How I Did It.</h2>
			<p><img src="/media/images/misc/img-garden-01.jpg" alt="survival seeds" class="img-padding-left pull-right img-responsive media" />It turns out there are a lot of folks out there with the same concerns I had, but they just didn’t have any idea where to start! </p>
			<ul>
			  <li>“Can I really feed my family from a garden if I have to?” </li>
			  <li>“How do I know the seeds will grow where I live?” </li>
			  <li>“How to do I plant and harvest them? I don’t have a ‘green thumb!” </li>
			  <li>“How do I know my seeds will be safe year after year?” </li>
			</ul>
			<p>The truth is most people are woefully unprepared for ANY disruption in the food supply (notice how bread and milk disappear from stores as soon as there is a hint of heavy rain or snow in the forecast?). I didn’t want that for my family, and I don’t want it for you. </p>
			<p>So that’s why I decided to take what I had learned and create the “done for you” Liberty Seed Vault! </p>
			<p>I found a premium heirloom seed provider who sources our seeds from top quality, hard-working farmers located right here in the USA. These farmers are folks just like you and me who believe that true freedom comes from self-reliance.</p>

			<h2 class="darkRed text-center">Here’s What You’ll Get…</h2>
			<p>Inside the Liberty Seed Vault, you’ll get more than 5,640 survival seeds from 22 varieties of hardy &amp; delicious heirloom plants passed down from our forefathers. These seeds come sealed in sturdy foil packets packed in an airtight metal storage container rated for 5+ years of storage at 75 degrees (longer at cooler temperatures), giving you and your family long-term protection in case of disaster or a food crisis. </p>
			<p>There are no genetically modified seeds or outdated seeds in the Liberty Seed Vault. Each vault can produce thousands of pounds of nutrient-dense food for pennies per pound. Enough to feed you and family forever!</p>

	<div class="text-center center-block"><img src="/media/images/ss4p/ss4p-lsv-spread-01.jpg" alt="Seed Vault"  class="img-responsive" /><div class="caption text-center center-block" style="max-width:500px;padding-bottom:20px;"><em>Inside the Liberty Seed Vault, you’ll get more than 5,640 survival seeds from 22 varieties of hardy & delicious heirloom plants passed down from our forefathers.</em></div>
			</div>

			<p>These are open pollinated seeds that can be grown, harvested & replanted endlessly, so you never have to worry about your seed supply running out. You can achieve true food independence by harvesting seeds from your own heirloom plants!
</p>
	<p>You’ll also get an easy and clear set of planting instructions plus a seed harvesting guide. This contains all the step-by-step instructions you need for planting and harvesting – taking all the guesswork out and giving you full peace of mind. </p>

			<h2 class="darkRed text-center">Want To See What Seeds Are Included?</h2>
			<p><img src="/media/images/misc/img-tomatoes-01.jpg" alt="survival seeds" class="img-padding-right pull-left img-responsive media" />Only the most nutritious, best tasting foods… but more importantly, food that will help your family survive. Foods like beans, bell peppers, carrots, cucumbers, romaine lettuce, cabbage, beats, peas, tomatoes, broccoli, squash, spinach, onions, corn, cantaloupe, cauliflower, zucchini, watermelon… and more. </p>
			<p>These seeds have been specifically selected to be grown practically anywhere in America and have the ability to assimilate mineral and trace elements from the soil that genetically modified plants just don't seem to have.  </p>
	<p>Check out all the included seeds... From blue lake bush bean to beefsteak tomato, to crimson sweet watermelon and much more... </p>

			<div>
				<div class="row">
				  <div class="col-sm-12 col-md-5 "><img src="/media/images/ss4p/ss4p-lsv-single.jpg" alt="Survival Seeds" class="img-responsive center-block" /></div>
					<div class="col-sm-12 col-md-7 center-block" style="font-size: 14px;">
					  <ul class="fa-ul" style="max-width: 350px;margin-right: auto;margin-left: auto;">
						<li><i class="fa-li fa fa-check"></i>Blue Lake Bush Bean - over 150 seeds </li>
						<li><i class="fa-li fa fa-check"></i>California Wonder Bell Pepper - over 70 seeds </li>
						<li><i class="fa-li fa fa-check"></i>Marketmore Cucumber - over 150 seeds </li>
						<li><i class="fa-li fa fa-check"></i>Scarlet Nantes Carrot - over 800 seeds </li>
						<li><i class="fa-li fa fa-check"></i>Parris Island Cos Romaine Lettuce - over 900 seeds </li>
						<li><i class="fa-li fa fa-check"></i>Golden Acre Cabbage - over 530 seeds </li>
						<li><i class="fa-li fa fa-check"></i>Detroit Dark Red Beet - over 260 seeds </li>
						<li><i class="fa-li fa fa-check"></i>Lincoln Shell Sweat Pea - over 100 seeds </li>
						<li><i class="fa-li fa fa-check"></i>Beefsteak Tomato - over 180 seeds </li>
						<li><i class="fa-li fa fa-check"></i>Champion Radish - over 320 seeds </li>
						<li><i class="fa-li fa fa-check"></i>Green Sprouting Broccoli - over 500 seeds </li>
						<li><i class="fa-li fa fa-check"></i>Waltham Butternut Winter Squash - over 100 seeds</li>
						<li><i class="fa-li fa fa-check"></i>Bloomsdale Long Standing Spinach - over 260 seeds </li>
						<li><i class="fa-li fa fa-check"></i>Yellow Sweet Spanish Onion - over 145 seeds</li>
						<li><i class="fa-li fa fa-check"></i>Black Turtle Bean – over 70 seeds </li>
						<li><i class="fa-li fa fa-check"></i>Stowell's Evergreen Sweet Corn - over 250 seeds </li>
						<li><i class="fa-li fa fa-check"></i>Hales Best Cantaloupe - over 70 seeds </li>
						<li><i class="fa-li fa fa-check"></i>Snowball Cauliflower - over 285 seeds </li>
						<li><i class="fa-li fa fa-check"></i>Black Beauty Zucchini - over 50 seeds </li>
						<li><i class="fa-li fa fa-check"></i>Crimson Sweet Watermelon - over 60 seeds </li>
						<li><i class="fa-li fa fa-check"></i>Dwarf Blue Curled Scotch Kale - over 250 seeds </li>
						<li><i class="fa-li fa fa-check"></i>Pinto Bean - over 85 seeds </li>
					  </ul>
					</div>
				</div>
			</div>

			<p>&nbsp;</p>
			<p>Remember, if you think food is expensive now, imagine what it’s going to be like when the crisis hits… stores will shut down, farmers won’t be able to feed their livestock, urban mobs will riot. Food will be incredibly valuable. Look at what happened in Germany after World War One, when a pound of bread cost 3 BILLION marks! </p>
			<p>Many experts see the US heading in the same direction, and if so these super seeds will be worth much more than their weight in gold. </p>
			<p>Now, you’re probably wondering how much this food security and independence costs…</p>
			<p>I’ll tell you the price in just a second, but before I do… </p>

			<h2 class="darkRed text-center">I Want To Tell You About 4 Free Bonus Gifts That I Will Flat-Out Give You To Make This Offer A Complete “No-Brainer”… </h2>
			<p><span class="brightBlue"><strong>Free bonus #1:</strong></span> <strong>More Valuable Than Gold?</strong> Why You Need Survival Seeds – once you finish reading this report, you will see why you should care more about seeds than gold. After all, in times of food crisis, you can’t eat gold! </p>
			<p><span class="brightBlue"><strong>Free bonus #2: </strong></span><strong>The Survival Guide To Canning And Preserving.</strong> Canning is a great way to ensure your family can enjoy your survival garden’s bounty during the winter. You’ll get our 36-page manual detailing how to can &amp; store food along with over 30 canning recipes. </p>
			<p><span class="brightBlue"><strong>Free bonus #3:</strong></span><strong> Survival Garden Guide.</strong> We cover everything from outdoor gardens to indoor gardens, freezing &amp; long-term storage. Learn how to turn your garden into an abundance of fresh and healthy food for your family’s future food supply when crisis &amp; disaster strikes. </p>
			<p><span class="brightBlue"><strong>Free bonus #4:</strong></span><strong> Top 10 Items Sold Out After Crisis</strong> – this guide is a “must have”… you’ll not only learn the 10 items you absolutely need to hoard, but you will learn how to store them, get the most from their nutrition, as well as what foods not to stockpile and why.</p>
	<div class="text-center center-block"><img src="/media/images/ss4p/ss4p-lsv-bonuses-01.jpg" alt="Four Bonus Items" class="img-responsive" /></div>


		<p>You get the Liberty Seed Vault to protect your family’s food supply for years to come, and you’ll get instant and immediate access to: </p>
		<ul>
		  <li><strong>The More Valuable Than Gold? Why You Need Survival Seeds Report</strong></li>
		  <li><strong>The Survival Food Canning &amp; Preserving Guide</strong></li>
		  <li><strong>The Survival Garden Guide</strong></li>
		  <li><strong>The Top 10 Items Sold Out After Crisis Report</strong></li>
		</ul>
		<p>Some companies charge well over $200.00 for seeds that are nowhere near the quality of what you’re getting. Not to mention the 4 FREE bonuses that you won’t find anywhere else…and that will put you and your family in the best position to survive any food crisis. </p>
		<p>But you will get it all today for only $47.</p>

		<h2 class="darkRed text-center">Yes… Just $47 Today!</h2>
		<p>These normally sell for $67; however, as an added bonus I'm going to give you something even better. You'll get the Liberty Seed Vault rushed directly to your door for just $47 today.</p>
		<p>That’s nearly 70% off the normal price, but I want any patriot to be able to experience the peace of mind of real food independence, without breaking the bank. In fact at this special sale price you’re getting the Liberty Seed Vault at less than 1 penny per heirloom seed… wow!</p>
		<p>To claim your Liberty Seed Vault (plus the 4 FREE bonuses) Regularly priced at $67.00, for one easy payment of $47 with FREE Shipping, click the big orange “click to accept” button below:</p>

		<div>
			<div class="text-center">
				<a href="/checkout/process.php" title="Add to Order!"><img class="img-responsive center-block" src="/assets/images/buttons/btn-orange-click-accept-01.jpg" alt="Buy It Now!" border="0" /></a>
			</div>
			<p class="text-center">Get your Liberty Seed Vault (plus 4 FREE bonuses and FREE Shipping) for just $47 today by clicking the big orange &quot;click to accept&quot; button above.</p>
			<div class="text-center"><img src="/media/images/ss4p/ss4p-testimonials-02.png" class="img-responsive center-block"/><br /> <img src="/media/images/ss4p/ss4p-testimonials-05.png" class="img-responsive center-block"/><br /> <img src="/media/images/ss4p/ss4p-testimonials-04.png" class="img-responsive center-block"/></div>

			<div class="text-center" style="margin-top:20px;"><strong>OR</strong></div>

			<div class="noThanks">
				<a href="/checkout/oto/f4p-seeds-23x2.php">No Thanks</a> – I want to give up this opportunity. I understand that I will not receive this special offer again.
			</div>
		</div>  

  </div>
</div>


<?php include_once("template-bottom.php"); ?>