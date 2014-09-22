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

$billingStateName = $_SESSION["customerDataArray"]["billingStateName"];
// SET PRODUCT ID
//$_SESSION['productId'] = 164; //please keep as an integer
//$_SESSION['quantity'] = '1';
$_SESSION['upsell'] = TRUE; //must stay a boolean
$_SESSION['pageReturn'] = '/checkout/order.php';
include_once("Product.php");
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
			<iframe src="https://fast.wistia.net/embed/iframe/jwue4kdjoj?autoPlay=true&fullscreenButton=false&playButton=false&playbar=false&playerColor=ffffff&smallPlayButton=false&version=v1&videoHeight=360&videoWidth=640" allowtransparency="true" frameborder="0" scrolling="no" class="wistia_embed" name="wistia_embed" width="640" height="360"></iframe>
		</div>
  <div>
  			<a href="#addtoorder"><img src="/assets/images/buttons/btn-green-add-to-order-01.jpg" alt="Add To Order" class="img-responsive center-block" /></a>
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
            <ul class="margin-b-16">
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
            <ul class="margin-b-16">
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
            <ul class="fa-ul margin-b-16">
              <li><i class="fa-li fa fa-check"></i> Buying MREs with a 5 year shelf life (depending on where you buy them from they could be near expired)…</li>
              <li><i class="fa-li fa fa-check"></i> Getting gross survival foods that are tough to stomach and so high in salt, MSG and preservatives you could clog your arteries and make you sick…</li>
              <li><i class="fa-li fa fa-check"></i> Or simply buying the wrong foods and leaving a critical hole in your meal plan which means your family can become malnourished…</li>
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
          
          
    <div class="outLineBoxDarkBlue">
          <div>
            <img src="/media/images/f4p/F4P-eBook-10-items-after-crisis-02.jpg" alt="Bonus 1" class="img-padding-right pull-left img-responsive media" />
            <div style="padding-top:0px;">
                <p><strong class="brightBlue">Free Bonus #1: </strong><strong>Top 10 Items Sold Out After Crisis</strong>&nbsp;– in this report you&rsquo;ll learn the 10 items you absolutely need to hoard. If you miss this you&rsquo;ll be forced to go without &lsquo;em in a crisis. And you should know - this is an updated list so if you think you&rsquo;ve seen these before, think again!  You&rsquo;ll also learn how to snag them on the cheap, store them securely and pump out every ounce of nutrition they have to offer.</p>
            </div>
            </div>
              <div class="clearfix"></div>
              <div>
                <div style="padding-top:0px;">
                <p><strong class="brightBlue"><img src="/media/images/f4p/F4P-eBook-the-water-survival-guide-02.jpg" alt="Bonus 1" class="img-padding-right pull-left img-responsive media" />Free Bonus #2:</strong><strong> The Water Survival Guide </strong>– Look, without clean water you can&rsquo;t prepare a scrap of food. Not to mention the fact dehydration can hit in as little as 7 hours and turn a full-grown man into a whimpering child. So don&rsquo;t be stuck relying on water sources everyone knows about. This down-n-dirty guide will show you desperate-times only water sources to keep your family from going thirsty. It&rsquo;ll also walk you through the basics of water storage, how to find a source and tricks to easily grab water in an emergency. </p>
              </div>
            </div>
              <div class="clearfix"></div>
              <div>
                <div style="padding-top:0px;">
                <p><strong class="brightBlue"><img src="/media/images/f4p/F4P-eBook-the-survival-garden-guide-02.jpg" alt="Bonus 1" class="img-padding-right pull-left img-responsive media" />Free Bonus #3:</strong><strong> The Survival Garden Guide</strong> – A long-term food stockpile works best when you can add in some succulent and well-preserved fruits and veggies. In this guide you get the lowdown on outdoor gardens, indoor gardens, freezing and long-term storage. This is like &ldquo;food insurance&rdquo; so your family can eat fresh-picked produce or delicious home-canned delicacies even in a disaster.</p>
              </div>
            </div>
              <div class="clearfix"></div>
              <div>
              <img src="/media/images/f4p/F4P-eBook-cut-grocery-bills-half-02.jpg" alt="Bonus 1" class="img-padding-right pull-left img-responsive media" />
              <div style="padding-top:0px;">
                <p><strong class="brightBlue">Free Bonus #4: </strong><strong>How To Cut Your Grocery Bills in Half </strong>– It&rsquo;s sad to see how much most Americans are forced to spend every time they go to the grocery store. Odds are you&rsquo;ve seen an increase in spending too. Well, it doesn&rsquo;t have to be like that. To help out I&rsquo;m going to show you my down-n-dirty tricks to getting the best deal. But let me warn you: couponing is only one part of this bill shredding strategy, so pay close attention to what&rsquo;s inside!</p>
              </div>
              <div class="clearfix"></div>
              </div>
          </div>
          
			<h2 class="darkRed text-center">Food Stockpiles Shouldn’t Only 
Be For Well-Off Americans</h2>
			<div class="outLineBoxDarkBlue">
            	<h2 class="text-center center-block"><strong>&quot;Basic&quot; - 4 Week Supply For $197</strong></h2>
            	<p><strong><img src="/media/images/f4p/f4p-4-week-kit-01.jpg" alt="4 Week Food Kit" class="img-padding-left pull-right img-responsive media" style="max-width:235px;"/>The Basic Food4 Patriots Kit</strong> includes a 4-week food supply for just $197. That&rsquo;s just $7 per day for 3+ meals a day, plus I&rsquo;ll throw in <strong>FREE SHIPPING!</strong></p>
                <p>This is the bare minimum most experts agree you should have on hand to weather any kind of crisis.</p>
                <p>When you add in the 4 information-packed bonus reports you're getting <strong>FREE</strong>, you have to admit this is a heck of a deal.</p>
                
            </div>
            
            <h1 class="text-center"><strong>OR</strong></h1>
            
    <div class="outLineBoxDarkBlue">
   	  <h2 class="text-center center-block"><strong>"Deluxe" - 3 Month Supply For $497</strong></h2>
       	<p><strong><img src="/media/images/f4p/f4p-3-month-kit-01.jpg" alt="3 Month Food Kit" class="img-padding-left pull-right img-responsive media" style="max-width:273px;"/>The Deluxe Food4Patriots kit</strong>, which I strongly recommend, includes a 3-month food supply to give you real peace of mind. You&rsquo;ll get a whopping <strong>450 servings</strong> of delicious, easy-to-prepare survival food. Best of all, you can get it today for just $497 with <strong>FREE SHIPPING!</strong> That&rsquo;s just about 5 bucks per day for 3+ meals for 3 months… WOW! That&rsquo;s a savings of about 100 bucks PLUS I have some extra special bonuses you can <strong>ONLY</strong> get with the 3-month kit…</p>
            	<p><strong>1st</strong>, we&rsquo;ll upgrade your 4 <strong>FREE</strong> bonus reports from digital online access to <span class="underline"><strong>professionally bound hard copy books</strong></span> that you can keep on your bookshelf. You&rsquo;ll love the convenience.</p>
            	<p><strong><img src="/media/images/misc/free-burst-01.jpg" alt="FREE BONUS" class="img-padding-right pull-left img-responsive media" />2nd</strong>, I am going to include a <strong>FREE</strong> Liberty Seed Vault to take you the next level of food independence. You&rsquo;ll get more than 5,640 survival seeds from 22 varieties of hardy &amp; delicious heirloom seeds passed down from our forefathers in an airtight storage vault rated for 5+ years of storage. There are no hybrids, GMOs or outdated seeds here. All harvested seeds are reusable. Each vault can produce 1000s of pounds of nutrient-dense food for pennies per pound... Enough to feed you and family forever! Survival seeds are the perfect compliment to your emergency food stockpile. Some companies charge well over $200 for seeds that are nowhere near the quality of what you&rsquo;re getting <strong>FREE</strong> here.</p>
                <div class="container">
				<div class="row">
				  <div class="col-sm-12 col-md-5 "><img src="/media/images/ss4p/ss4p-lsv-single.jpg" alt="Survival Seeds" class="img-responsive center-block" /></div>
                    <div class="col-sm-12 col-md-7 center-block" style="font-size: 14px;">
                      <ul class="fa-ul" style="max-width: 350px;margin-right: auto;margin-left: auto;">
                        <li><i class="fa-li fa fa-check"></i>Blue Lake Bush Bean - over 150 seeds </li>
                        <li><i class="fa-li fa fa-check"></i>Califovrnia Wonder Bell Pepper - over 70 seeds </li>
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
            
            <p><strong>And last but definitely not least</strong>, you&rsquo;ll get this compact but powerful survival tool absolutely <strong>FREE</strong>. This amazing gadget packs 11 functions into a tool no bigger than a credit card and fits right in your wallet, so you'll always have it handy.</p>
    <p><strong><img src="/media/images/misc/free-burst-01.jpg" alt="FREE BONUS" class="img-padding-right pull-left img-responsive media" />FREE 11-in-1 Survival Tool</strong> – this amazing tool could be a real life-saver yet is no bigger than a credit card so you&rsquo;ll always have it handy.</p>
    <img src="/media/images/f4p/multi-tool-01.jpg" alt="Survival Tool" class="img-responsive center-block" />
        
      </div>
          
     <h2 class="darkRed text-center">And Just To Show You How Serious I Am, I’m Offering My Outrageous Double Guarantee!</h2>
     <div class="outLineBoxDarkBlue">
				<p><img src="/media/images/misc/seal-guarantee-satisfaction.jpg" alt="Frank" width="250" height="189" class="pull-left img-responsive media">
	   <h3>Guarantee #1:</h3> This is a 100% money back guarantee. No questions asked. If for any reason, you&rsquo;re not satisfied with your Food4Patriots kit, just return it within 60 days of purchase and I&rsquo;ll refund 100% of your purchase price. If you try it and decide it&rsquo;s not as delicious and nutritious as I promised, you can have your money back for any reason or no reason whatsoever. So there&rsquo;s absolutely no risk for you. You literally can&rsquo;t lose!</p>
				<div class="clearfix"></div>
	</div>
	<div class="outLineBoxDarkBlue">
				<p><img src="/media/images/misc/seal-guarantee-money.jpg" alt="Frank" width="250" height="192" class="pull-left img-responsive media">
				<h3>Guarantee #2:</h3> This is an unheard of 300% money back guarantee. It&rsquo;s in addition to guarantee #1. If you open any 
				of your Food4Patriots meals anytime <strong>in the next 25 years</strong> and find that your food has spoiled or gone bad, you 
				can return your entire Food4Patriots stockpile and I will <strong>triple</strong> your money back!</p>
				
				<p>That&rsquo;s how confident I am that this food will remain just as delicious and nutritious for the next 25 years as it is 
					on the day you buy it. Some of my friends said I was crazy to offer this double guarantee, but to be honest I&rsquo;m not 
					really worried about it, because I am so confident you&rsquo;re going to see the value in your Food4Patriots kit as soon 
					as you have it in your hands.</p>
	</div>
     <p>But whether you choose to start dipping into your Food4Patriots stockpile right away to stretch your food dollars…</p>
     <p>Or you decide to keep it under lock-and-key so you&rsquo;re ready for any kind of crisis, you need to know one thing…</p>
     <p>By claiming your Food4Patriots kit you&rsquo;ve made the decision not just to get food for your family, you&rsquo;ve made the decision to get peace of mind. Heck, if you&rsquo;ve got an elderly friend or family member near by, you can claim a kit for them so you don&rsquo;t have to worry if they&rsquo;re eating in a disaster.</p>
     <p>Now, the last reminder: there&rsquo;s no obligation to claim your Food4Patriots kit… in fact, if you don&rsquo;t want it, you can step aside. No hard feelings – there are plenty of other people who are dead set on preparing right now.</p>
     <p> But  if you&rsquo;re serious about your family&rsquo;s stockpile and want to get real food independence &amp; security, just choose the Basic or Deluxe Food 4Patriots Kit below and let me know how many kits you&rsquo;d like to make sure your family is covered (remember, each kit serves one adult). You&rsquo;ll be glad you did. This is about peace of mind, knowing that you and your family are well protected in the case of food shortages and natural disasters.<br>
       <br>
       Click on the &ldquo;Add to Order&rdquo; button below, choose your quantity, and get your Food4Patriots stockpile started now… and then rest assured knowing that you will be able to feed your family well into the future no matter what happens.</p>
     <p>To claim your Food4Patriots kit at this special price, plus the 4 <strong>FREE</strong> bonuses  click the big &ldquo;Add to Order&rdquo; button below.<a id="addtoorder"></a></p>

			<div class="container">
				<div class="row">
					<div class="col-sm-12 col-md-6">
						<div class="rcBoxR15-red-dot-border">
                        	<form action="/checkout/process.php" method="post" accept-charset="utf-8" id="order-process1">
                            <input name="productId" type="hidden" value="18">
                            <input id="taxState_18" type="hidden" value="<?php echo strtolower($billingStateName);?>">
							<input id="productData[18]" type="hidden" value="{'productId':18,'price':197,'shipping':0}">
                        	<img src="/media/images/f4p/f4p-4-week-kit-02.jpg" alt="4 Week Kit" class="img-responsive center-block" />
                            <ul>
							  <li>140 Servings <a href="#info" id="4wkPopover" rel="popover"  data-placement="bottom" data-toggle="tooltip" class="hidden-xs"><i class="fa fa-info-circle"></i></a></li>
                				<li>$7 Per Day</li>
								<li><strong>FREE Shipping</strong></li>
								<li><strong>4 FREE Digital Bonus Reports</strong></li>
							</ul>

                            <!-- *PRODUCT INFO -->
                              <div id="productInfoOTO">
                              <div class="row">
                                <div class="col-xs-2"><strong>Qty:</strong></div>
                                <div class="col-xs-10">
								<?php
								if($isUpgrade) {
									?>
									<input type="hidden" name="quantity" id="quantity_18" value="1">1
								<?php
								} else {
								?>
                                	<select name="quantity" id="quantity_18" style="width:50px;margin-top:3px;margin-bottom:3px;" onchange="setStateTax(18);">
										<?php for ($i=1; $i<=10; $i++){ echo "<option>". $i . "</option>"; }?>
									</select>
								<?php
								}
								?>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-xs-2"><strong>Price:</strong></div>
                                <div id="subTotal_18" class="col-xs-10"></div>
                              </div>
                              <div id="shippingRow_18" class="row">
                                <div class="col-xs-2"><strong>S&amp;H:</strong></div>
                                <div id="shippingAmount_18" class="col-xs-10 show"></div>
                              </div>
                              <div id="taxRow_18" class="row">
                                <div class="col-xs-2"><strong>Tax:</strong></div>
                                <div id="taxAmount_18" class="col-xs-10 show"></div>
                              </div>
                              <div class="row">
                                <div class="col-xs-2"><strong>Total:</strong></div>
                                <div id="totalAmount_18" class="col-xs-10"></div>
                              </div>

                              </div><!-- *PRODUCT INFO -->

                            <div class="text-center center-block">
<?php
if($isUpgrade) {
?>
<a href="/order/18"><img src="/assets/images/buttons/btn-green-add-to-order-01.jpg" name="submit" class=" img-responsive center-block" onClick="" /></a>
<?php
} else {
?>
<input type="image" src="/assets/images/buttons/btn-green-add-to-order-01.jpg" name="submit" class=" img-responsive center-block" onClick="" />
<?php
}
?>
                            </div>
	  					</form>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
						<div class="rcBoxR15-red-dot-border">
                        	<form action="/checkout/process.php" method="post" accept-charset="utf-8" id="order-process2">
                            <input name="productId" type="hidden" value="19">
							<input id="taxState_19" type="hidden" value="<?php echo strtolower($billingStateName);?>">
							<input id="productData[19]" type="hidden" value="{'productId':19,'price':497,'shipping':0}">
                        	<img src="/media/images/f4p/f4p-3-month-kit-02.jpg" alt="3 Month Kit" class="img-responsive center-block" />
                            <ul>
							  <li><strong></strong>450 Servings <a href="#info" id="3mkPopover" rel="popover"  data-placement="bottom" data-toggle="tooltip" class="hidden-xs"><i class="fa fa-info-circle"></i></a></li>
								<li>$5 Per Day</li>
								<li><strong>FREE Shipping</strong></li>
								<li><strong>FREE</strong> Survival Tool <a href="#info" id="toolPopover" rel="popover"  data-placement="bottom" data-toggle="tooltip" class="hidden-xs"><i class="fa fa-info-circle"></i></a></li>
								<li><strong>FREE</strong> Seed Vault <a href="#info" id="seedsPopover" rel="popover"  data-placement="bottom" data-toggle="tooltip" class="hidden-xs"><i class="fa fa-info-circle"></i></a></li>
                  				<li><strong>4 FREE <span class="underline">Hard Copy</span> Bonus Reports</strong></li>
              				</ul>
                            
                            <!-- *PRODUCT INFO -->
                              <div id="productInfoOTO">
	                              <div class="row">
		                              <div class="col-xs-2"><strong>Qty:</strong></div>
		                              <div class="col-xs-10">
			                 <?php
							if($isUpgrade) {
							?>
								<input type="hidden" name="quantity" id="quantity_19" value="1">1
							<?php
							} else {
							?>

                                	<select name="quantity" id="quantity_19" style="width:50px;margin-top:3px;margin-bottom:3px;" onchange="setStateTax(19);">
										<?php for ($i=1; $i<=10; $i++){ echo "<option>". $i . "</option>"; }?>
									</select>
							<?php
							}
							?>
	                              </div>
							</div>
                              <div class="row">
                                <div class="col-xs-2"><strong>Price:</strong></div>
                                <div id="subTotal_19" class="col-xs-10"></div>
                              </div>
							  <div id="shippingRow_19" class="row">
								  <div class="col-xs-2"><strong>S&amp;H:</strong></div>
								  <div id="shippingAmount_19" class="col-xs-10 show"></div>
							  </div>
                              <div id="taxRow_19" class="row">
                                <div class="col-xs-2"><strong>Tax:</strong></div>
                                <div id="taxAmount_19" class="col-xs-10 show"></div>
                              </div>
                              <div class="row">
                                <div class="col-xs-2"><strong>Total:</strong></div>
                                <div id="totalAmount_19" class="col-xs-10"></div>
                              </div>
                              
                              </div><!-- *PRODUCT INFO -->
                              	
                            <div class="text-center center-block">
<?php
if($isUpgrade) {
?>
	<a href="/order/19"><img src="/assets/images/buttons/btn-green-add-to-order-01.jpg" name="submit" class=" img-responsive center-block" onClick="" /></a>

<?php
} else {
?>
	<input type="image" src="/assets/images/buttons/btn-green-add-to-order-01.jpg" name="submit" class=" img-responsive center-block" onClick="" />
<?php
}
?>

                            </div>
	  					</form>
                        </div>
                    </div>
				</div>
			</div>

    <div>
      <div class="noThanks">
        <a href="/checkout/oto/f4p-choose-3m-4w-kit-discount.php" onClick="">No Thanks</a> – I want to give up this opportunity.<br>
                I understand that I will not receive this special offer again.
            </div>
            
	</div>
            
            
    
  </div>
</div>

<script>
$(document ).ready(function () {
	$("#4wkPopover").popover({
		html:true,
		trigger: 'hover',
		title:"4 Week Kit May Include:",
		content: function() {
          return $('#4wk').html();
        },
		});

});
$(document ).ready(function () {
	$("#3mkPopover").popover({
		html:true,
		trigger: 'hover',
		title:"3 Month Kit May Include:",
		content: function() {
          return $('#3mk').html();
        },
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
		content: function() {
          return $('#lsv').html();
        },
		});
	
});
</script>
<script src="/js/set-state-tax-multi-pid.js"></script>
<script>
	setStateTax(18);
	setStateTax(19);
</script>
<div id="4wk" style="display:none;">
<?php include_once("f4p-product-info-4wk.html"); ?>
</div>
<div id="3mk" style="display:none;">
<?php include_once("f4p-product-info-3mk.html"); ?>
</div>
<div id="lsv" style="display:none;">
<?php include_once("f4p-product-info-seeds-bonus.html"); ?>
</div>

<?php include_once("template-bottom.php"); ?>