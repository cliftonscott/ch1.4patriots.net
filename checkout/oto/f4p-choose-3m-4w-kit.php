<?php
$firstName = $_SESSION["customerDataArray"]["firstName"];
// SET PRODUCT ID
//$_SESSION['productId'] = 164; //please keep as an integer
//$_SESSION['quantity'] = '1';
$_SESSION['upsell'] = TRUE; //must stay a boolean
$_SESSION['pageReturn'] = '/checkout/order.php';
include_once("Product.php");
$productDataObj = Product::getProduct($_SESSION["productId"]);
include_once("template-top.php");
include_once ('template-header.php'); /*Add template-header-nav.php to add top menu*/
?>

<div class="container-main">
	<div class="breadcrumb1">
	    <a>CHECKOUT</a>
	    <a class="current">ORDER CUSTOMIZATION</a>
	    <a>ORDER CONFIRMATION</a>
	</div>
<div class="container oto-width">
        <div>
          <h1 class="darkRed text-center"><?php echo $firstName;?><span class="titles">, FREE Video Reveals #1 Most Critical Item To Hoard Now…</span></h1>
        </div>
        <div id="videobox" class="hidden-xs">
			<!--<iframe src="https://fast.wistia.net/embed/iframe/jwue4kdjoj?autoPlay=true&fullscreenButton=false&playButton=false&playbar=false&playerColor=ffffff&smallPlayButton=false&version=v1&videoHeight=360&videoWidth=640" allowtransparency="true" frameborder="0" scrolling="no" class="wistia_embed" name="wistia_embed" width="640" height="360"></iframe>-->
		</div>
  <div> 
  			<a href="#addtoorder"><img src="/assets/images/buttons/btn-green-add-to-order-01.jpg" class="img-responsive center-block" /></a>
            <p class="text-center read-warning" style="max-width:600px;">Click the button above to choose your package now… or read the rest of the page below and accept or decline the offer at the bottom of the page.</p>
            <p>Hi <?php echo $firstName;?>, this is Franks Bates, founder of Food4Patriots, and I just wanted to say <strong>CONGRATULATIONS</strong> for claiming your <strong>FREE</strong> Survival Food today. </p>
            <p>You got yours before we ran out, so nice job. You&rsquo;ve made a real smart decision to take action! I know you&rsquo;re going to <strong>love</strong> the peace of mind and sense of pride that comes from building your food stockpile. And with <strong>every addition </strong>to your stockpile, you&rsquo;ll get more independence, more self-reliance and more protection for you &amp; your family in case of a disaster.</p>
            <p>Because you&rsquo;ve taken this 1st important step, I&rsquo;ve got some exclusive information for you that I think you&rsquo;re really going to like.&nbsp;&nbsp;</p>
    <p>Look, I&rsquo;m gonna shoot straight with you..</p>
            
            <h2 class="darkRed text-center">The 4 Food Crisis Warning Signs I’m About To Show You Shake Me To My Core.</h2>
            <p>They could spark a &ldquo;food mob&rdquo; that rampages through the continental United States and the entire globe. And if you don&rsquo;t have your personal food stockpile in tip-top shape before this hits, what I&rsquo;m about to say could shake you too. </p>
    <p>Now to be frank, this isn&rsquo;t some &ldquo;guaranteed&rdquo; prediction. I can&rsquo;t see the future. </p>
            <p>But we can all see the United States is barely holding on – we&rsquo;re in mountains of debt, more people than in the entire history of our nation are on welfare and our freedoms are being steadily sapped away. When I follow my research to its logical conclusion, it&rsquo;s clear these 4 food crisis warning signs could snap the thin thread this country is holding on to – kick starting a &ldquo;once in a hundred years&rdquo; food depression.</p>
            
            <h2 class="darkRed text-center">I Really Hope I’m Not Right About This.</h2>
            <p><img src="/media/images/misc/img-mob-01.jpg" alt="Food Mob" class="img-padding-right pull-left img-responsive media" style="max-width:151px;"/>If I&rsquo;m wrong, life will go on as normal, and I&rsquo;ll happily admit that I was off my rocker.</p>
            <p>But if I&rsquo;m <em>right</em> this could mutate everyday &ldquo;good people&rdquo;, your neighbors and you&rsquo;re your friends, into hunger-crazed raiders who are ready to kill or be killed…completely transforming them in 72 hours or less.</p>
            <p>And it could all start with the predictions you&rsquo;re about to see.</p>
            <p>The government can see just as clearly as you and I that there&rsquo;s a major food crisis that could strike at any moment. In fact, they&rsquo;re at fault for quite a few of these threats – even if they&rsquo;d never admit it.</p>
    <p>So look: we don&rsquo;t have much time. Let&rsquo;s jump right in. First up is: </p>
            
            <h2 class="darkRed text-center">Food Crisis Warning Sign #1… Communist “Food Brainwashing” Is Infecting America.</h2>
            <p>No one wants to say this, but everywhere you look, you can see signs that there are freeloading people embracing the idea of a few hardworking patriots supplying all the food and the labor in this country…and the rest sitting back and getting a handout.</p>
            <p>There are more people on welfare than any other time in the history of the United States. Even during the Great Depression just 700,000 people were on the books to get that kind of government help.</p>
    <p>But now there are over 47.3 million people on food stamps alone. That&rsquo;s more than the entire population of Spain, Canada or Australia and it&rsquo;s a 6,757% increase since the &lsquo;30s. </p>
            <p>Over the past 5 years the people depending on the government for food has gotten much worse. Just take a look at this chart that shows how much the government has paid in Food Stamps per year: </p>
            <p><img class="img-responsive center-block"src="/media/images/misc/img-food-stamp-chart.png" alt="Food Crisis Warning Food Stamps"/></p>
            <p>You can see there&rsquo;s a massive jump between 2001 and 2008. And the way this &ldquo;hand out&rdquo; mentality has been increasing, that number will probably keep going up. There are just too many people who want to rely on the government for food, water &amp; money. They&rsquo;re pushing the rest of the United States to the brink of a food crisis, and it&rsquo;s all being paid for by the Americans who are working two or three jobs just to make ends meet.</p>
    <p>But when the government&rsquo;s piggy-bank runs out and the handouts dry up, we could be dealing with a food mob 47 million people strong. That&rsquo;s like being invaded by a country the size of Colombia! A food mob that size could strip shelves bare across the United States and seize control of whole system. The government has built up too many people who are depending on them for food. In fact, by trying to keep control of America&rsquo;s food, the Government has accidentally created… </p>
            
            <h2 class="darkRed text-center">Food Crisis Warning Sign #2: 
Anti-Hoarding Law Sparks Food Riots</h2>
            <p><img src="/media/images/misc/img-president-01.jpg" alt="Hoarding Laws" class="img-padding-right pull-left img-responsive media" style="max-width:205px;"/>Not too long ago, President Obama reinstated a radical executive order called &ldquo;National Defense Resources Preparedness Act&rdquo;. </p>
            <p>It lets the government seize and &ldquo;redistribute&rdquo; food whenever they declare a &ldquo;state of emergency&rdquo;. But most Americans have no idea this even exists. It was slyly released on a Friday afternoon, and traditional media said almost nothing about it.</p>
            <p>Some people have tried to say it isn&rsquo;t a big deal. Their argument is that executive orders that give the government special powers in a state of emergency is normal. Roosevelt, JFK and Bush all had similar powers.</p>
            <p>But if you think about the fact the government is banning guns, stockpiling ammo and putting more and more surveillance on the U.S. people, this executive order becomes an obvious power grab that will set the government up to take your food.</p>
            <p>Once people realize that any and all of their food stockpiles can be seized by the government, there will be a run on stores as they try to get food they can <em>hide</em>.</p>
            <p>A run like that could be a food crisis warning sign bigger than a hurricane. And the government knows it.</p>
            <p>To avoid this food crisis warning sign you absolutely must have your own, covert stockpile…or the supplies you paid for with your own money could be snatched up to satisfy the rest of the unprepared freeloaders in this country.</p>
    <p>But the next obvious threat is something that not even Uncle Sam can control… </p>
            
            <h2 class="darkRed text-center">Food Crisis Warning Sign #3: Once-in-a-Century  Super-Storms, Solar Flares and Asteroid Collisions </h2>
            <p><img src="/media/images/misc/img-disasters.jpg" alt="Disasters" class="img-padding-left pull-right img-responsive media" />Natural disasters have been on the rise in the United States and all over the world. It&rsquo;s like Mother Nature has been going haywire. Each and every event has the potential to disrupt your food – even if you live in a major city. </p>
            <p>But even knowing that, most people think something like this could quote &ldquo;never happen to them&rdquo;. That&rsquo;s just not the case – just look at some of the disasters of the past few years:</p>
            <ul>
              <li>Hurricane Sandy completely crippled New York City. Forcing even quote &ldquo;well off&rdquo; residents to go dumpster diving to feed their children. Some people who couldn&rsquo;t make it to FEMA camps thought they were going to starve and nearly did without food and power in cold times.</li>
              <li>Earthquakes rocked Haiti and Chile killing over 300,000 people and making food a rare commodity. (The scary part is the United States has 5 major fault lines that could fracture the country into pieces if a large earthquake struck. I&rsquo;m not so sure the rest of the world would come to our aid like we did in Haiti…)</li>
              <li>And the largest X class solar flare in years silently struck China and crippled their communications. But that&rsquo;s not the worst of it: it jolted their power grids and could do the exact same thing to the United States.</li>
              <li>Plus, don&rsquo;t forget Hurricane Katrina single-handedly knocked out every bit of the New Orleans&rsquo; food supply chain. Thousands of people were herded (against their will) into FEMA camps.</li>
              <li>And everybody remembers when the meteor exploded in the sky above Russia injuring almost 1,100 people and leaving a 26-foot wide crater. It blew out more than a million square feet of glass. The scary part is a football field-sized asteroid skimmed by the earth just a day later. If it had hit it would&rsquo;ve been like blowing up 2.4 million tons of TNT and would&rsquo;ve wiped out 750 square miles. And that was a &ldquo;small&rdquo; asteroid. </li>
            </ul>
    <p>But even if Mother Nature magically calmed down, the world has already kick started one disaster that will be nearly impossible to stop…</p>
            
            <h2 class="darkRed text-center">Food Crisis Warning Sign #4: The Worldwide Famine Time Bomb Is Ticking Down…</h2>
            <p><img src="/media/images/misc/img-president-02.jpg" alt="Famine" class="img-padding-right pull-left img-responsive media" style="max-width:259px;" />With the way the world&rsquo;s population is growing and resources are getting scarcer, food prices are expected to double again.</p>
            <p>But a worldwide famine isn&rsquo;t something 10 or 15 years away. It could happen in the next 12 months. Not only have analysts predicted 2013 could be a year of famine, entire nations have begun stockpiling food. </p>
            <p>&quot;This is only the start of the panic buying,&quot; said one commodities analyst recently, and &quot;I expect we'll have more countries coming in&rdquo;.</p>
            <p>The U.S. is no exception. FEMA was spotted putting out a request for a whopping 420 million emergency meals. That&rsquo;s over 7,000% more than they normally keep on hand. They pulled the request as soon as the news caught wind of it and tried to play it off as a &ldquo;training exercise&rdquo;, but I&rsquo;m not buying it.</p>
            <p>The fact is American food is in a tight spot. The head of one major non-profit said: &ldquo;[…] we are going to see Depression style hunger, Darfur style hunger, Calcutta style hunger happening here in New York.&rdquo;  And I believe him.</p>
            <p>Russia has been boosting their grain stockpiles as well. That might not sound like a big deal but they can singlehandedly change the political climate of their entire continent.<br>
            </p>
            <p>In fact, when they restricted the amount of grain they sent out of the country in 2010, the hunger riots it caused helped spark the violent revolts of the Arab Spring. </p>
            <p>See while people think these uprisings were all about politics the real match that set it off was the lack of food. And the United States is closer than most people could ever imagine to that kind of food problem. Grocery stores keep less than 3 days of food in stock, and any of these 4 crisis warning signs could force hundreds of people to go hungry.</p>
            <p>This is something you&rsquo;ve probably noticed in your area. Before a big storm do people start to panic?  All of a sudden is it near-impossible to find bread, milk or bottled water for miles?  If so, you know that in situations like that shelves can be stripped completely bare in minutes.</p>
            <p>Now I&rsquo;ve got to admit: When I stopped to look at these 4 food crisis warning signs it all seemed like too much to handle.</p>
            <p>When I looked at these elements plus all the other threats like </p>
            <ul>
              <li><strong>Terrorist attacks, </strong></li>
              <li><strong>Food poisoning </strong></li>
              <li><strong>And all out war between North Korea, Iran or even China </strong></li>
            </ul>
    <p>I realized I had to make a decision for me and my family…</p>
            <p>A decision you&rsquo;ll have to make too: </p>
            
            
            <h2 class="darkRed text-center">You Can Either Sit By And Wait For Government Food Handouts…Or You Can Gather Your Own Covert Food Stockpile To Keep Your Independence.</h2>
            <p><img src="/media/images/misc/img-canfood-01.jpg" alt="Canned Food" class="img-padding-left pull-right img-responsive media" style="max-width:271px;"/>See, most people are going to wait and hope the government can protect them. They&rsquo;re willing to give up all their freedoms and independence for the hope they won&rsquo;t have to provide for their own food needs.</p>
            <p>Now, that may be what millions of Americans choose, but there&rsquo;s another group of people who aren&rsquo;t going to take this lying down. They&rsquo;re preparing for this food crisis.</p>
            <p>Are you going to be one of them?</p>
            <p>From what I can see, the government knows that if you control food you control the people. After all, there&rsquo;s no way to live without food and water. </p>
            <p>Which is exactly why you need to have your own personal food stockpile.</p>
    <p>But here&rsquo;s the catch… </p>
            
            <h2 class="darkRed text-center">If You Stockpile The Wrong Foods You Could Be Setting Your Family Up To Starve.</h2>
            <p>It sounds harsh, but the truth is most people are giving themselves a false sense of security.</p>
            <p>Maybe it&rsquo;s by…<br>
            </p>
            <ul>
              <li class="ulchecked">Buying MREs with a 5 year shelf life (depending on where you buy them from they could be near expired)…</li>
              <li class="ulchecked">Getting gross survival foods that are tough to stomach and so high in salt, MSG and preservatives you could clog your arteries and make you sick…</li>
              <li class="ulchecked">Or simply buying the wrong foods and leaving a critical hole in your meal plan which means your family can become malnourished…</li>
            </ul>
            <p>The bottom line is if you make any of the million-and-one mistakes while you&rsquo;re designing your food stockpile, your family won&rsquo;t just pay for it with unhealthy eating…</p>
            <p>It can cripple their hope.</p>
            <p>Imagine thinking you&rsquo;ve got an entire stockpile of food just to find it crawling with maggots, roaches and rats…and having to walk up to your spouse and kids and tell them your plan failed.</p>
            <p>A lot of people already doubt folks like us who believe in being prepared. They think having food ready for a disaster is silly or even a little crazy…</p>
            <p>And if you make these food-stockpiling mistakes you&rsquo;ll just prove them right.</p>
            <p>This is just too serious not to do something about it. You&rsquo;ve seen the evidence, and if you&rsquo;re anything like me you&rsquo;re probably racking your mind trying to come up with the best way to make sure your family isn&rsquo;t forced to go hungry when a food crisis hits.</p>
            <p>Well, I decided to stop worrying.</p>
            <p>I started looking around to figure out what our options are. </p>
            <p><img src="/media/images/misc/img-mre-02.jpg" alt="Meals Ready To Eat" class="img-padding-right pull-left img-responsive media" />Stockpiling MREs seemed like a good idea, until I found out how bad those things are for you. Just ask any soldier and they&rsquo;ll tell you they&rsquo;re tough on your body and should ONLY be eaten for a short period of time in combat.</p>
            <p>And waiting for the government to give me and my family a handout in a disaster just wasn&rsquo;t an option.</p>
            <p>The only thing I could find that made much sense was a long-term food stockpile.</p>
            <p>Now cans were too much work. You&rsquo;ve got to rotate them regularly or they go bad. And that means wasting a whole lot of food or having to put in quite a bit of work.</p>
            <p>So when I came across the &ldquo;long term survival food&rdquo; suppliers I thought I&rsquo;d struck gold. The food lasts up to 25 years and would be a quick and easy way to feed my family of four for 90 days – no problem.</p>
            <p>But there&rsquo;s a catch…</p>
            <p>They wanted me to shell out more than <strong class="darkRed">$5,000</strong> just to get started!</p>
            <p>Honestly, I couldn&rsquo;t understand <em>why </em>it was so expensive.</p>
            <p>There&rsquo;s just no way most people can afford something like that. And I knew that if I couldn&rsquo;t find a way to get food for myself and my family we&rsquo;d be at the mercy of our neighbors and Uncle Sam. So I started doing some digging, and what I found was a little surprising.</p>
    <p>The long-term food suppliers had consumers by the belt… And were jacking up prices by turning it into a &ldquo;name brand&rdquo; game. </p>
            
            <h2 class="darkRed text-center">But I Knew Something Most People Don’t… </h2>
            <p>If I could cutout the middleman and go directly to the supplier, I could save hundreds, if not thousands of dollars on my long-term food stockpile.</p>
            <p>So I went to my supplier and asked if I could put together my own survival food kit containing the &ldquo;cream of the crop&rdquo; food they had to offer. I wanted the absolute best-tasting meals that provided the most nutrition for breakfast, lunch and dinner… AND was useful for the long haul. That means they had to be conveniently packed in airtight containers that would be easy to move and store for up to 25 years.</p>
            <p>Well, we figured out exactly what to put in the package to make it the kind of food package I knew my family would love. And the results were terrific. The food was delicious, easy to store long term and best of all is packaged right here in the U.S of A.</p>
            <p>Plus it didn&rsquo;t have any of those harmful chemicals or genetically modified ingredients. No MSG and no &ldquo;franken-food.&rdquo; </p>
            <p>The other good news is since I don&rsquo;t have to spend a ton of money on sprucing up the outside I can give you this great tasting food for a fraction of what the other guys are charging. I&rsquo;m calling it Food4Patriots! </p>
    <div style="padding-bottom:20px;"><img class="img-responsive center-block"src="/media/images/f4p/f4p-food-packets-01.jpg" alt="Food Packets"/></div>
            
          <p>Let me tell you about what you&rsquo;re getting in your Food4Patriots  kit:</p>
          <p><span class="numberCircle">1</span><strong>First is delicious food that you can prepare in 3 simple steps…</strong></p>
          <p>You don&rsquo;t want to have to worry about cooking complex recipes when you&rsquo;re stuck in a disaster. You can make these meals in less than 20 minutes with no hassle; just add boiling water, simmer, and serve. It&rsquo;s so simple even kids can make them! And don&rsquo;t worry – you&rsquo;ll get a whole slew of choices for breakfast, lunch and dinner so you don&rsquo;t get stuck eating the same thing day-in and day-out.</p>
          <p><span class="numberCircle">2</span><strong>Second, you get my guaranteed &ldquo;Disaster-proof&rdquo; Packaging</strong></p>
          <p>I may not have used &ldquo;showy&rdquo; packaging for expensive branding, but I did make sure it&rsquo;s military-grade sturdy-stuff and can stand up to the crazy things that happen in a crisis. This food has a shelf life of up to 25 years, so you have complete peace of mind for the long term. I&rsquo;ve used Mylar pouches –the same material used in space suits. This means you&rsquo;ll keep all the air, moisture and light out of the package. It&rsquo;ll also keep the food nutritionally sound and tasting great. So when you need your food stockpile it&rsquo;ll be guaranteed to be as fresh as the day you bought it.</p>
          <p><span class="numberCircle">3</span><strong>Third, you get foods jam-packed with nutritional value</strong></p>
          <p>Since I had a chance to go direct to the supplier to build this kit, I was able to throw out all the filler and poor-quality ingredients other guys stuff into their meals. All the food you&rsquo;ll receive is at the tip-top of the long-term food reserve industry. But here&rsquo;s the other important part. You don&rsquo;t have to settle for smaller serving sizes for kids. Some people use &ldquo;kids&rsquo; meals&rdquo; to skimp on the amount of food they give you. In Food4Patriots kids get a full adult-sized portion without getting charged extra.</p>
          <p><span class="numberCircle">4</span><strong>And Fourth, You Get An Easy-To-Store Package That Takes Up Minimal Space</strong></p>
    <p>Nobody wants to cram their house full of clunky food packages. So many food storage containers are ultra-bulky and come in a slew of awkward shapes and sizes, which makes it difficult to discreetly store food reserves in the average American home. I&rsquo;ve selected the most compact kits I could find so you can store them without any extra hassle.</p>
          <p>But the big question most people have is &ldquo;What kind of food will I get to eat?!?&rdquo;  Since nobody likes eating the same thing over and over, I&rsquo;ve picked some of my favorites to give you variety.</p>
          <div style="padding-bottom:20px;"><img class="img-responsive center-block" src="/media/images/misc/img-food-prepared-01.jpg" alt="Prepared Food"/></div>
          <p>Here&rsquo;s a list of a few of the choices:</p>
          <ul class="ulspace1">
            <li>Mountain Man Granola</li>
            <li>Apple Orchard Oatmeal</li>
            <li>Granny&rsquo;s Home-style Potato Soup</li>
            <li>Blue Ribbon Cheesy Rice (my kids actually beg me to make this one all the time!)</li>
            <li>Ol&rsquo; 49ers Hearty Chili </li>
            <li>Creamy Beef Stroganoff</li>
            <li>Frank&rsquo;s Five Star Minestrone (can you tell this is my favorite?) </li>
          </ul>
          <p>Now because you&rsquo;re one of the folks who took me up on my offer to send you a <strong>FREE</strong> sample of survival food to try, I wanted to give you the first crack at setting up a long term food stockpile just like mine while I still have some of the complete kits available.</p>
          <p>And the last thing I want happening is for someone to give up their chance to claim their Food4Patriots package because they couldn&rsquo;t afford it.</p>
          <p>The fact is…</p>
          
    <h2 class="darkRed text-center">Food Stockpiles Shouldn’t Only 
Be For Well-Off Americans</h2>
          
          <p>I know most people couldn&rsquo;t afford to spend $5,000 on a stockpile like I was quoted.</p>
          <p>Which is why the biggest question a lot of people probably have right now is… &ldquo;how much does it cost?&rdquo;</p>
          <p>Honestly, this was a big issue for me and might be a deal-breaker for you. I feel like you can&rsquo;t put a price on food independence and the peace of mind that gives.</p>
          <p>Now I know every family is different. There&rsquo;s no &ldquo;one size fits all&rdquo; survival food solution. </p>
          <p>So I&rsquo;ve put together different Food4Patriots kits based on servings to feed one adult, and you can customize your kit to keep your family healthy and happy. There&rsquo;s no need to worry about stretching portions to feed a larger family or being forced to order more than you really need.</p>
          <p>And just to make this a real &ldquo;no-brainer&rdquo; for you, I&rsquo;m also going to add 4 <strong>free</strong> bonuses to sweeten the pot. </p>
          <p class="text-center">&nbsp;</p>
<div>
        <form action="/checkout/process.php" method="post" accept-charset="utf-8" id="optin-form2">
				<div class="text-center center-block">
					<input type="image" src="/assets/images/buttons/btn-orange-click-accept-01.jpg" name="submit" class=" img-responsive center-block" onClick="ga('send', 'event', 'upsell-1-ppg-platinum-upgrade', 'ppg-platinum-upgrade-accept', 'click-to-accept-bottom');" />
				</div>
				<input type="hidden" name="quantity" id="quantity" value="1">
				<div class="terms">
					<div style="margin-right:5px;float: left;">
                            <input type="checkbox" id="check2" name="check2">
                            <img src="/assets/images/misc/yes-01.jpg" width="74" height="34" alt="Yes">
					</div>
				  <div style="line-height: 1.2;">I want to add the Platinum Upgrade to my order at the 1-time discount sale price of $997.  I will get FREE Shipping with my EMP Bag and Solar Panel (a $100 value) as well as a 365-day guarantee and 3-year extended warranty.</div>
				</div>
                  
                  <div class="text-center" style="margin-top:20px;"><strong>OR</strong></div>
      </form>
                <div class="noThanks">
                <a href="/checkout/oto/ppg-platinum-payments.php" onClick="ga('send', 'event', 'upsell-1-ppg-platinum-upgrade', 'ppg-platinum-upgrade-decline', 'no-thanks-link-bottom');">No Thanks</a> – I want to give up this opportunity.<br>
                I understand that I will not receive this special offer again.
            </div>
            
	</div>
            
            
    
  </div>
    </div>
    

<?php include_once("template-bottom.php"); ?>