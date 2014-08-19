<?php
$firstName = $_SESSION["customerDataArray"]["firstName"];
// SET PRODUCT ID
$_SESSION['productId'] = 40; //please keep as an integer
$_SESSION['quantity'] = '1';
$_SESSION['upsell'] = TRUE; //must stay a boolean
$_SESSION['pageReturn'] = '/checkout/order.php';
include_once("Product.php");
$productDataObj = Product::getProduct($_SESSION["productId"]);
include_once("template-top.php");
include_once ('template-header.php'); /*Add template-header-nav.php to add top menu*/
?>
<div class="container-main">
<script src="/js/audio.js"></script>
<script language="javascript">
    $(document).ready(function() {

		$("#optin-form").validate({
    		rules: {
    			check1: {
					required: true
    			},
  			},
  			messages: { 
		  check1: '<div class="warning-check"></div>',
        },
		submitHandler: function(form) {
		 //optIn(); 
		 form.submit();
		}
    	});
		
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
		  
		  price = 1997;
			e = document.getElementById("quantity");
			quant = e.options[e.selectedIndex].value;
			discount = 1000 * quant;
			$("#save").html('Act Today And Save Over $' + discount);
			subtot = price * quant;
			tax = taxrate * subtot;
			gtotal = tax + subtot;
			if (taxrate != 0){
			$("#terms").html('I want to add (' + quant + ') 1 Year Food4Patriots Kit to my order at the 1-time discount sale price of $' + subtot + ' plus $' + tax.toFixed(2) + taxedstate + ' for a total of $' + gtotal.toFixed(2) + '. I will get FREE Shipping and 27 FREE Bonus Gifts including 4 of the super-popular Lifestraw Personal Water Filters and over 22,000+ heirloom survival seeds per kit.');
			}else {
				$("#terms").html('I want to add (' + quant + ') 1 Year Food4Patriots Kit(s) to my order at the 1-time discount sale price of $' + gtotal.toFixed(0) + '. I will get FREE Shipping and 27 FREE Bonus Gifts including 4 of the super-popular Lifestraw Personal Water Filters and over 22,000+ heirloom survival seeds per kit.');
			}
			
	}
</script>
<div class="breadcrumb1">
	<a>CHECKOUT</a>
	<a class="current">ORDER CUSTOMIZATION</a>
	<a>ORDER CONFIRMATION</a>
</div>
<div class="container oto-width">
		<div><h1 class="darkRed text-center">I Couldn't Believe FEMA Tried This!<br>(Then He Showed Me Proof)</h1></div>
        <div id="videobox" class="hidden-xs">
			<iframe src="//fast.wistia.net/embed/iframe/psimm32qmd?videoFoam=true" allowtransparency="true" frameborder="0" scrolling="no" class="wistia_embed" name="wistia_embed" width="640" height="352"></iframe><script src="//fast.wistia.net/assets/external/iframe-api-v1.js"></script>
		</div>
        <div style="margin-top:50px;">
			<p>Hi again <?php echo $firstName;?>,  once again I wanted to say CONGRATULATIONS for claiming your Patriot Power Generator 1500.</p>
			<p>Because you've taken this important 1st step and proven that you take action, I've made a special FREE video for you about some urgent developments that I've just discovered that you really need to know about.		</p>
        </div>
        <div>
        	<p class="text-center read-warning">Please watch this entire video presentation and accept or decline the offer at 
        		the bottom of this page...</p>
        	
        	<h2 class="darkRed text-center">The 4 Food Crisis Warning Signs I’m About To Show You Shake Me To My Core.</h2>
			
			<p>They could spark a “food mob” that rampages through the continental United States and the entire globe. And if you 
				don’t have your personal food stockpile in tip-top shape before this hits, what I’m about to say could shake you too.</p>
			
			<p>Now to be frank, this isn’t some “guaranteed” prediction. I can’t see the future.</p>
			
			<p>But we can all see the United States is barely holding on – we’re in mountains of debt, more people than in the entire 
				history of our nation are on welfare and our freedoms are being steadily sapped away. When I follow my research to 
				its logical conclusion, it’s clear these 4 food crisis warning signs could snap the thin thread this country is 
				holding on to – kick starting a “once in a hundred years” food depression.</p>

			<h2 class="darkRed text-center">I Really Hope I’m Not Right About This.</h2>
			
			<p><img class="img-responsive pull-left img-padding-right media" src="/media/images/misc/f4p-l-mob3.jpg" title="Mob Scene">If I’m wrong, 
				life will go on as normal, and I’ll happily admit that I was off my rocker.</p>
			
			<p>But if I’m right this could mutate everyday “good people”, your neighbors and you’re your friends, into hunger-crazed 
				raiders who are ready to kill or be killed... completely transforming them in 72 hours or less.</p>
				
			<p>And it could all start with the predictions you’re about to see.</p>
			
			<p>The government can see just as clearly as you and I that there’s a major food crisis that could strike at any moment. 
				In fact, they’re at fault for quite a few of these threats – even if they’d never admit it.</p>
				
			<p>So look: we don’t have much time. Let’s jump right in. First up is: </p>
			
			<h2 class="darkRed text-center">Food Crisis Warning Sign #1... Communist “Food Brainwashing” Is Infecting America. </h2>


			<p>No one wants to say this, but everywhere you look, you can see signs that there are freeloading people embracing the 
			idea of a few hardworking patriots supplying all the food and the labor in this country…and the rest sitting back and getting 
			a handout.</p>
			
			<p>There are more people on welfare than any other time in the history of the United States. Even during the Great Depression 
			just 700,000 people were on the books to get that kind of government help.</p>
			
			<p>But now there are over 47.3 million people on food stamps alone. That’s more than the entire population of Spain, Canada 
			or Australia and it’s a 6,757% increase since the ‘30s. </p>
			
			<p>Over the past 5 years the people depending on the government for food has gotten much worse. Just take a look at this 
			chart that shows how much the government has paid in Food Stamps per year: </p>

			<p><img class="img-responsive center-block" src="/media/images/misc/food-stamp-chart.png" title="Food Stamp Chart"></p>
	
			<p>You can see there’s a massive jump between 2001 and 2008. And the way this “hand out” mentality has been increasing, 
			that number will probably keep going up. There are just too many people who want to rely on the government for food, water & 
			money. They’re pushing the rest of the United States to the brink of a food crisis, and it’s all being paid for by the Americans 
			who are working two or three jobs just to make ends meet.</p>
			
			<p>But when the government’s piggy-bank runs out and the handouts dry up, we could be dealing with a food mob 47 million people 
			strong. That’s like being invaded by a country the size of Colombia! A food mob that size could strip shelves bare across the 
			United States and seize control of whole system. The government has built up too many people who are depending on them for food. 
			In fact, by trying to keep control of America’s food, the Government has accidentally created...</p>
			
			<h2 class="darkRed text-center">Food Crisis Warning Sign #2... Anti-Hoarding Law Sparks Food Riots</h2>
			
			<p><img class="img-responsive pull-left img-padding-right media" src="/media/images/misc/f4p-l-president2.jpg" title="President Omaba">Not too long ago, President Obama reinstated a radical executive order called 
				“National Defense Resources Preparedness Act”. </p>
			
			<p>It lets the government seize and “redistribute” food whenever they declare a “state of emergency”. But most Americans have no 
			idea this even exists. It was slyly released on a Friday afternoon, and traditional media said almost nothing about it.</p>
			
			<p>Some people have tried to say it isn’t a big deal. Their argument is that executive orders that give the government special 
			powers in a state of emergency is normal. Roosevelt, JFK and Bush all had similar powers.</p>
			
			<p>But if you think about the fact the government is banning guns, stockpiling ammo and putting more and more surveillance on the 
			U.S. people, this executive order becomes an obvious power grab that will set the government up to take your food.</p>
			
			<p>Once people realize that any and all of their food stockpiles can be seized by the government, there will be a run on stores as 
			they try to get food they can hide.</p>
			
			<p>A run like that could be a food crisis warning sign bigger than a hurricane. And the government knows it.</p>
			
			<p>To avoid this food crisis warning sign you absolutely must have your own, covert stockpile…or the supplies you paid for with 
			your own money could be snatched up to satisfy the rest of the unprepared freeloaders in this country.</p>
			
			<p>But the next obvious threat is something that not even Uncle Sam can control... </p>
			
			<h2 class="darkRed text-center">Food Crisis Warning Sign #3.. Once-in-a-Century Super-Storms, Solar Flares and Asteroid Collisions</h2>
			
			<p><img class="img-responsive pull-right media" src="/media/images/misc/f4p-disasters.jpg" title="Natural Disasters">Natural disasters have been on the rise in the United States and all over the world. It’s like Mother Nature has been going haywire. 
			Each and every event has the potential to disrupt your food – even if you live in a major city.</p>
			
			<p>But even knowing that, most people think something like this could quote “never happen to them”. That’s just not the case – just look
			 at some of the disasters of the past few years:</p>
			
			<ul class="fa-ul">
				<li><i class="fa-li fa fa-arrow-circle-right"></i> Hurricane Sandy completely crippled New York City. Forcing even quote “well off” residents to go dumpster diving to feed their children. Some people who couldn’t make it to FEMA camps thought they were going to starve and nearly did without food and power in cold times.</li>
				
				<li><i class="fa-li fa fa-arrow-circle-right"></i> Earthquakes rocked Haiti and Chile killing over 300,000 people and making food a rare commodity. (The scary part is the United States has 5 major fault lines that could fracture the country into pieces if a large earthquake struck. I’m not so sure the rest of the world would come to our aid like we did in Haiti...)</li>
				
				<li><i class="fa-li fa fa-arrow-circle-right"></i> And the largest X class solar flare in years silently struck China and crippled their communications. But that’s not the worst  of it: it jolted their power grids and could do the exact same thing to the United States.</li>
				
				<li> <i class="fa-li fa fa-arrow-circle-right"></i> Plus, don’t forget Hurricane Katrina single-handedly knocked out every bit of the New Orleans’ food supply chain. Thousands of people were herded (against their will) into FEMA camps.</li>
				
				<li><i class="fa-li fa fa-arrow-circle-right"></i> And everybody remembers when the meteor exploded in the sky above Russia injuring almost 1,100 people and leaving a 26-foot wide crater. It blew out more than a million square feet of glass. The scary part is a football field-sized asteroid skimmed by the earth just a day later. If it had hit it would’ve been like blowing up 2.4 million tons of TNT and would’ve wiped out 750 square miles. And that was a “small” asteroid. </li>
			</ul>

			<p>But even if Mother Nature magically calmed down, the world has already kick started one disaster that will be nearly impossible to stop...</p>

			<h2 class="darkRed text-center">Food Crisis Warning Sign #4: The Worldwide Famine Time Bomb Is Ticking Down...</h2>

			<p><img class="img-responsive pull-left img-padding-right media" src="/media/images/misc/f4p-l-president1.jpg" title="FEMA Meeting">With the way the world’s population is growing and resources are getting scarcer, food prices are expected to double again.</p>
			
			<p>But a worldwide famine isn’t something 10 or 15 years away. It could happen in the next 12 months. Not only have analysts predicted 
			2013 could be a year of famine, entire nations have begun stockpiling food. </p>
			
			<p>"This is only the start of the panic buying," said one commodities analyst recently, and "I expect we'll have more countries coming 
			in”.</p>
			
			<p>The U.S. is no exception. FEMA was spotted putting out a request for a whopping 420 million emergency meals. That’s over 7,000% 
			more than they normally keep on hand. They pulled the request as soon as the news caught wind of it and tried to play it off as a “training 
			exercise”, but I’m not buying it.</p>
			
			<p>The fact is American food is in a tight spot. The head of one major non-profit said: “[…] we are going to see Depression style 
			hunger, Darfur style hunger, Calcutta style hunger happening here in New York.”  And I believe him.</p>
			
			<p>Russia has been boosting their grain stockpiles as well. That might not sound like a big deal but they can singlehandedly change 
			the political climate of their entire continent.</p>
			
			<p>In fact, when they restricted the amount of grain they sent out of the country in 2010, the hunger riots it caused helped spark the 
			violent revolts of the Arab Spring. </p>
			
			<p>See while people think these uprisings were all about politics the real match that set it off was the lack of food. And the United 
			States is closer than most people could ever imagine to that kind of food problem. Grocery stores keep less than 3 days of food in stock, 
			and any of these 4 crisis warning signs could force hundreds of people to go hungry.</p>
			
			<p>This is something you’ve probably noticed in your area. Before a big storm do people start to panic?  All of a sudden is it near-
			impossible to find bread, milk or bottled water for miles?  If so, you know that in situations like that shelves can be stripped completely 
			bare in minutes.</p>
			
			<p>Now I’ve got to admit: When I stopped to look at these 4 food crisis warning signs it all seemed like too much to handle.</p>
			
			<p>When I looked at these elements plus all the other threats like </p>
			
			<ul>
				<li style="font-weight:bold;">Terrorist attacks, </li>
				
				<li style="font-weight:bold;">Food poisoning </li>
				
				<li style="font-weight:bold;">And all out war between North Korea, Iran or even China </li>
			</ul>

			<p>I realized I had to make a decision for me and my family...</p>
			
			<p>A decision you’ll have to make too: </p>
			
			<h2 class="darkRed text-center">You Can Either Sit By And Wait For Government Food Handouts... Or You Can Gather Your Own Covert Food Stockpile 
				To Keep Your Independence.</h2>
			
			<p><img class="img-responsive pull-right img-padding-left media" src="/media/images/misc/f4p-l-canfood1.jpg" title="Empty Pantry">See, most people are going to wait and hope the government can protect them. They’re 
			willing to give up all their freedoms and independence for the hope they won’t have to provide for their own food needs.</p>
			
			<p>Now, that may be what millions of Americans choose, but there’s another group of people who aren’t going to take this lying down. 
			They’re preparing for this food crisis.</p>
			
			<p>Are you going to be one of them?</p>
			
			<p>From what I can see, the government knows that if you control food you control the people. After all, there’s no way to live without 
			food and water. </p>
			
			<p>Which is exactly why you need to have your own personal food stockpile.</p>
			
			<p>But here’s the catch... </p>
			
			<h2 class="darkRed text-center">If You Stockpile The Wrong Foods You Could Be Setting Your Family Up To Starve. </h2>
			
			<p>It sounds harsh, but the truth is most people are giving themselves a false sense of security.</p>
			
			<p>Maybe it’s by...</p>
			
			<ul class="fa-ul">
				<li><i class="fa-li fa fa-arrow-circle-o-right"></i>Buying MREs with a 5 year shelf life (depending on where you buy them from they could be near expired)...</li>
				
				<li><i class="fa-li fa fa-arrow-circle-o-right"></i>Getting gross survival foods that are tough to stomach and so high in salt, MSG and preservatives you could clog 
				your arteries and make you sick...</li>
				
				<li><i class="fa-li fa fa-arrow-circle-o-right"></i>Or simply buying the wrong foods and leaving a critical hole in your meal plan which means your family can become
				 malnourished...</li>
			</ul>
			
			<p>The bottom line is if you make any of the million-and-one mistakes while you’re designing your food stockpile, your family won’t 
			just pay for it with unhealthy eating...</p>
			
			<p>It can cripple their hope.</p>
			
			<p>Imagine thinking you’ve got an entire stockpile of food just to find it crawling with maggots, roaches and rats…and having to walk 
			up to your spouse and kids and tell them your plan failed.</p>
			
			<p>A lot of people already doubt folks like us who believe in being prepared. They think having food ready for a disaster is silly or 
			even a little crazy...</p>
			
			<p>And if you make these food-stockpiling mistakes you’ll just prove them right.</p>
			
			<p>This is just too serious not to do something about it. You’ve seen the evidence, and if you’re anything like me you’re probably 
			racking your mind trying to come up with the best way to make sure your family isn’t forced to go hungry when a food crisis hits.</p>
			
			<p>Well, I decided to stop worrying.</p>
			
			<p>I started looking around to figure out what our options are. </p>

			<p><img class="img-responsive pull-left img-padding-right media" src="/media/images/misc/f4p-l-mre2.jpg" title="MRE Stockpile">Stockpiling MREs seemed like a good idea, until I found out how bad those things are for 
			you. Just ask any soldier and they’ll tell you they’re tough on your body and should ONLY be eaten for a short period of time in combat.</p>
			
			<p>And waiting for the government to give me and my family a handout in a disaster just wasn’t an option.</p>
			
			<p>The only thing I could find that made much sense was a long-term food stockpile.</p>
			
			<p>Now cans were too much work. You’ve got to rotate them regularly or they go bad. And that means wasting a whole lot of food or having to 
			put in quite a bit of work.</p>
			
			<p>So when I came across the “long term survival food” suppliers I thought I’d struck gold. The food lasts up to 25 years and would be a 
			quick and easy way to feed my family of four for up to 1 full year – no problem.</p>
			
			<p>But there’s a catch...</p>
			
			<p>They wanted me to shell out more than $5,000 just to get started!</p>
			
			<p>Honestly, I couldn’t understand why it was so expensive.</p>
			
			<p>There’s just no way most people can afford something like that. And I knew that if I couldn’t find a way to get food for myself and my 
			family we’d be at the mercy of our neighbors and Uncle Sam. So I started doing some digging, and what I found was a little surprising.</p>
			
			<p>The long-term food suppliers had consumers by the belt... And were jacking up prices by turning it into a “name brand” game. </p>

			<h2 class="darkRed text-center">I Knew Something Most People Don’t...</h2>
			
			<p>If I could cutout the middleman and go directly to the supplier, I could save hundreds, if not thousands of dollars on my long-term 
			food stockpile.</p>
			
			<p>So I went to my supplier and asked if I could put together my own survival food kit containing the “cream of the crop” food they had to 
			offer. I wanted the absolute best-tasting meals that provided the most nutrition for breakfast, lunch and dinner… AND was useful for the long 
			haul. That means they had to be conveniently packed in airtight containers that would be easy to move and store for up to 25 years.</p>
			
			<p>Well, we figured out exactly what to put in the package to make it the kind of food package I knew my family would love. And the results 
			were terrific. The food was delicious, easy to store long term and best of all is packaged right here in the U.S of A.</p>
			
			<p>Plus it didn’t have any of those harmful chemicals or genetically modified ingredients. No MSG and no “franken-food.” </p>
			
			<p>The other good news is since I don’t have to spend a ton of money on sprucing up the outside I can give you this great tasting food 
			for a fraction of what the other guys are charging. I’m calling it Food4Patriots! </p>
			
			<p><img class="img-responsive center-block" src="/media/images/f4p/1-year-tote-06.jpg" title="1-year Food Kit"></p>

			<p>Let me tell you about what you’re getting in your Food4Patriots kit:</p>
			
			<p><span class="numberCircle"><strong>1</strong></span><strong>First is delicious food that you can prepare in 3 simple steps...</strong></p>
			
			<p>You don’t want to have to worry about cooking complex recipes when you’re stuck in a disaster. You can make these meals in less than 20 
				minutes with no hassle; just add boiling water, simmer, and serve. It’s so simple even kids can make them! And don’t worry – you’ll get a 
				whole slew of choices for breakfast, lunch and dinner so you don’t get stuck eating the same thing day-in and day-out.</p>
				
			<p><span class="numberCircle"><strong>2</strong></span><strong>Second, you get my guaranteed “Disaster-proof” Packaging</strong></p>
			
			<p>I may not have used “showy” packaging for expensive branding, but I did make sure it’s military-grade sturdy-stuff and can stand up to the 
				crazy things that happen in a crisis. This food has a shelf life of up to 25 years, so you have complete peace of mind for the long term. 
				I’ve used Mylar pouches –the same material used in space suits. This means you’ll keep all the air, moisture and light out of the package.
				 It’ll also keep the food nutritionally sound and tasting great. So when you need your food stockpile it’ll be guaranteed to be as fresh as 
				 the day you bought it.</p>
				 
			<p><span class="numberCircle"><strong>3</strong></span><strong>Third, you get foods jam-packed with nutritional value</strong></p>
			
			<p>Since I had a chance to go direct to the supplier to build this kit, I was able to throw out all the filler and poor-quality ingredients 
				other guys stuff into their meals. All the food you’ll receive is at the tip-top of the long-term food reserve industry. But here’s the 
				other important part. You don’t have to settle for smaller serving sizes for kids. Some people use “kids’ meals” to skimp on the amount 
				of food they give you. In Food4Patriots kids get a full adult-sized portion without getting charged extra.</p>
				
			<p><span class="numberCircle"><strong>4</strong></span><strong>And Fourth, You Get An Easy-To-Store Package That Takes Up Minimal Space</strong></p>
			
			<p>Nobody wants to cram their house full of clunky food packages. So many food storage containers are ultra-bulky and come in a slew of 
			awkward shapes a</p>nd sizes, which makes it difficult to discreetly store food reserves in the average American home. I’ve selected the most 
			compact kits I could find so you can store them without any extra hassle.</p>
			
			<p>But the big question most people have is “What kind of food will I get to eat?!?”  Since nobody likes eating the same thing over and 
			over, I’ve picked some of my favorites to give you variety.</p>


		</div>
</div>
<?php include("ppg-1year-whatsincluded.html");?>
<?php include("ppg-1year-glenbeck.html");?>
<div class="container oto-width">
	<h2 class="darkRed text-center">Check Out The Amazing FREE Bonuses<br>You Can ONLY Get With The 1 Year Kit!</h2>
	
	<p>You&rsquo;re going to get the &ldquo;mother lode&rdquo; of special bonuses  ONLY available with the 1 Year Kit!</p>
</div>
<?php include("ppg-1year-bonus-lifestraw.html");?>
<?php include("ppg-1year-bonus-survivalbooks.html");?>
<?php include("ppg-1year-bonus-pam.html");?>
<div class="container oto-width">
	<h2 class="darkRed text-center">You Will Also Get FOUR More Sets Of All Of Your Original FREE Bonuses When 
		You Take Advantage Of This Special Upgrade Offer! 
</h2>
	
	<p>Add to your own stockpile, keep at multiple locations or give to friends and loved ones so they can 
		experience the same peace of mind. Your FREE bonuses include:</p>
</div>
<?php include("ppg-1year-bonus-seeds.html");?>
<?php include("ppg-1year-bonus-tool.html");?>
<?php include("ppg-1year-bonus-reports.html");?>


<div class="container oto-width">
            <h2 class="darkRed text-center">Get FREE Shipping & Handling!</h2>
			  	
			<p><img src="/assets/images/misc/burst_2A.png" alt="FREE Shipping" width="181" height="104" class="pull-left">You&rsquo;ll 
				get FREE Shipping &amp; Handling on your 1 Year Food4Patriots Kit and all $800 worth of bonuses when you upgrade today!</p>
				
			<p>Because we're already going to be sending you your Patriot Power Generator 1500, we can add the 1Year kit to your order and 
				save on fulfillment costs. Everybody loves FREE Shipping and I want to pass along the savings to YOU to make it even easier 
				to upgrade.</p>

            <h2 class="darkRed text-center">You Are 100% Protected By My Outrageous Double Guarantee.</h2>
			<div class="outLineBoxDarkBlue">
				<p><img src="/media/images/f4p/f4p-l-satisfaction.jpg" alt="Frank" width="250" height="189" class="pull-left img-responsive media">
					<h3>Guarantee #1:</h3> This is a 100% money back guarantee. No questions asked. If for any reason, you&rsquo;re not 
					satisfied with your Food4Patriots kit, just return it within 60 days of purchase and I&rsquo;ll refund 100% of your purchase 
					price. If you try it and decide it&rsquo;s not as delicious and nutritious as I promised, you can have your money back for 
					any reason or no reason whatsoever. So there&rsquo;s absolutely no risk for you. You literally can&rsquo;t lose!</p>
				<div class="clearfix"></div>
			</div>
          
			<div class="outLineBoxDarkBlue">
				<p><img src="/media/images/f4p/f4p-l-money.jpg" alt="Frank" width="250" height="192" class="pull-left img-responsive media">
				<h3>Guarantee #2:</h3> This is an unheard of 300% money back guarantee. It&rsquo;s in addition to guarantee #1. If you open any 
				of your Food4Patriots meals anytime <strong>in the next 25 years</strong> and find that your food has spoiled or gone bad, you 
				can return your entire Food4Patriots stockpile and I will <strong>triple</strong> your money back!</p>
				
				<p>That&rsquo;s how confident I am that this food will remain just as delicious and nutritious for the next 25 years as it is 
					on the day you buy it. Some of my friends said I was crazy to offer this double guarantee, but to be honest I&rsquo;m not 
					really worried about it, because I am so confident you&rsquo;re going to see the value in your Food4Patriots kit as soon 
					as you have it in your hands.</p>
			</div>
            
			<div><img class="img-responsive center-block" src="/media/images/f4p/f4p-testimonials-09.png" width="626" height="269" alt="L. Graeser's Testimonial"></div>
            
            <h2 class="darkRed title-max-600 center-block text-center"><?php echo $firstName;?>, Get On The ‘Fast Track’ - Claim Your 1 Year 
            	Food4Patriots Kit For $1000.00 Off Right Now!</h2>
			          	
			<p>Now I understand that the 1 Year Food4Patriots kit is the right choice for folks who are looking for the ultimate in food security. 
				This kit normally sells for $2,200, but because you&rsquo;ve already taken the 1st step, and because I appreciate you putting your 
				trust in us by being a customer, you can get your 1 Year Food4Patriots kit today for just $1,997.</p>
				
			<p>You get a year&rsquo;s worth of delicious survival food for $1.11 per serving!</p>
			
			<p>Plus I'll throw in 27 FREE bonus gifts worth $800+ -- including 4 of the super-popular Lifestraw Personal Water Filters and over 
				22,000+ heirloom survival seeds -- just to make this a "no-brainer" for you!</p>
				
			<p>I was only able to secure a limited quantity of these 1 Year Food4Patriots kits and it&rsquo;s been one of our most frequent requests, 
				so I don&rsquo;t know how long I&rsquo;m going to have them available. To make sure that you don&rsquo;t miss out on getting yours, 
				go ahead and click the big orange &ldquo;Click Here To Accept&rdquo; button below to add the 1 Year Food4Patriots Kit to your order 
				today!</p>
				
			<p>The 1 Year Food4Patriots kit will help secure your stockpile faster and protect you and your family from whatever crisis may come. 
				You&rsquo;ll be on the &ldquo;fast track&rdquo; to securing the ultimate food stockpile.</p>
				
			<p><?php echo $firstName;?>, this is your last chance for this special 1-time discount, so you need to act now. To get your 1 Year 
				Food4Patriots kit at $1000.00 off, click the big orange &ldquo;Click Here To Accept&rdquo; button below.</p>

			<div>
                <div><img class="img-responsive center-block" src="/media/images/f4p/1-year-tote-06.jpg"  alt="Food4Patriots 1 Year Kit"/></div>
                <div><img class="img-responsive center-block" src="/media/images/f4p/value-chart-3.jpg" alt="Value Chart"/></div>
                <div class="text-center"><h2 id="save" class="darkRed">Act Today And Save Over $1000</h2></div>
              
                <a id="accept"></a>
                
                <form action="/checkout/process.php" method="post" accept-charset="utf-8" id="optin-form">
                    <div style="text-align:center;">
                        <input type="image" src="/assets/images/buttons/btn-orange-click-accept-02.jpg" name="submit" class="img-responsive center-block" onClick="ga('send', 'event', 'upsell-2-f4p-1-yr-kit', 'f4p-1-yr-kit-accept', 'click-to-accept-bottom');"/>
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
                            <img src="/assets/images/misc/yes_2.jpg" width="74" height="34" alt="Yes">
                        </div>
                        <div id="terms">I want to add the 1 Year Food4Patriots Kit to my order at the 1-time discount sale price of $1,997. 
                            I will get FREE Shipping and 27 FREE Bonus Gifts including 4 of the super-popular Lifestraw Personal Water Filters 
                            and over 22,000+ heirloom survival seeds
                        </div>
                    </div>
                    <div style="margin-top:20px;">
                        <img class="img-responsive center-block"  src="/media/images/f4p/f4p-testimonials-07.png" alt="Food4Patriots Testimonial">
                    </div>
                    <div>
                        <img class="img-responsive center-block" src="/media/images/f4p/f4p-testimonials-02.png" alt="Food4Patriots Testimonial">
                    </div>
                    <div class="text-center" style="margin-top:20px;"><strong>OR</strong></div>
                </form>
                <div class="noThanks">
                    <a href="/checkout/oto/ppg-1year-payments.php" onClick="ga('send', 'event', 'upsell-2-f4p-1-yr-kit', 'f4p-1-yr-kit-decline', 'no-thanks-link-bottom');">No Thanks</a> – I want to give up 
                    this opportunity.<br />I understand that I will not receive this special offer again.
                </div>
              
			</div>
          
          
</div>
</div>
<?php
include_once("template-bottom.php");