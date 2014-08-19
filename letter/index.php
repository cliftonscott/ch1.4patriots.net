<?php
/*
 * temporary redirect while sold out
 */
header("Location: /checkout/index.php");
exit;

// SET PRODUCT ID
$_SESSION['productId'] = 162; //please keep as an integer
$_SESSION['quantity'] = 1;
include_once("Product.php");
//creates a product object that is available from every template
$productDataObj = Product::getProduct($_SESSION["productId"]);
//include template top AFTER the product information is set
include_once("template-top.php");
include_once ('template-header.php'); /*Add template-header-nav.php to add top menu*/
?>
<link href='https://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,700,600,300,800' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="css/style.css?v=1">
	<!--[if IE]><link rel="stylesheet" type="text/css" href="css/ie.css" media="screen, projection"/><![endif]-->
	
	<script src="js/modernizr-2.5.2.js" type="text/javascript"></script>
    
<div id="wrapper">	
	<header id="head" class="clearfix has-absolute-img">
    		<div class="absolute-flag">
                <img src="images/bgs/head-flag.png">
            </div>
    		<div class="head-mid">
                    <div class="mobile"></div>
                <div class="holder">
                    <div class="mobile-wrap">
                    <span class="color-black">Attention Patriots:<strong></strong></span>
                    <h1><span><em>Do You Know The 1 Thing That Can Cause A Complete Breakdown of Society In 72 Hours Or Less?</em></span></h1>
                    </div>
                </div>
            </div>
            
            <div class="head-bot">
                <div class="holder">
                    
                    <div class="intro-content">
                      <div class="inner">
                            <strong>Hey there friend,</strong><br/><br/>
                            <i>When a crisis hits, within 72 hours the system we all depend every day breaks down...and life becomes a complete nightmare for those who aren’t prepared. Well, I’m here to show you in just a few short minutes how you can rest easy while all hell is breaking loose outside...
</i><br/>
                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="absolute-holder">
            <div class="absolute-img"></div>
        </div>
    
    	<div class="head-logos">
        	<div class="holder">
        		<i>As seen and advertised on:</i>
                <ul>
                    <li>
                        <img src="/letter/images/headlogos/blaze.png">
                    </li>
                    <li>
                        <img src="/letter/images/headlogos/logo2.png">
                    </li>
                    <li>
                        <img src="/letter/images/headlogos/wnd.png">
                    </li>
                    <li>
                        <img src="/letter/images/headlogos/prisonplanet.png">
                    </li>
                    <li>
                        <img src="/letter/images/headlogos/personal-liberty.png">
                    </li>
                </ul>
                    
            </div>
        </div>
    </header>
    <!--#head--> 
	<!-- start of section 1 -->
    <section class="section has-dots-top">        	
        	<div class="section-inner">                
                <span class="head-dots"></span>
            	<!-- start of block white -->
                <div class="block bg-white">
                    <div class="block-head grad-white-brown pad-30">
                        <h2 class="color-red dark">Discover The 1 Critical Item You Must Have to Increase Your Chances of Survival... Anywhere!</h2>
        
                      <p class="section-description">Friends...it&rsquo;s a simple fact...it&rsquo;s the law of averages...no matter where you live, on sunny Florida or the tip of Cape Cod...monster storms, natural disasters, and man-made chaos is headed for your front door, sooner or later, knocking out your power along with the rest of your community. </p>
                        <p class="section-description"><strong><em>The system is disintegrating before our eyes. One well-timed or coordinated blow could send us all reeling back to the stone age...</em></strong></p>
                        <p class="section-description">You can be like some folks and run and hide, pretend there&rsquo;s no problem, and bury your head in the sand...OR...you can take matters into your own hands. </p>
                    </div>
                    <div class="inner pad-30">
                        
                        <img src="images/samples/section1-block1-img1.jpg" class="media has-bg right">
                        
<p><strong><em>The choice you make now will affect your very survival…</em></strong></p>
<p>Let&rsquo;s get REAL. <strong>When the &ldquo;you-know-what&rdquo; hits the fan, there won&rsquo;t be any opportunities to go back in time and change the situation</strong>...you&rsquo;ve got to BE READY...and you&rsquo;ve got to do it now…while there&rsquo;s still time.</p>
<p>If you take your family&rsquo;s safety seriously, you&rsquo;ll want to spend the next few short minutes reading this for vital, life-saving information. A simple investment of 6 minutes can make the difference for you and those you love when the next crisis hits without warning.</p>
<p>Frank Bates here coming to you from a small town outside of Nashville, TN. I&rsquo;ve become pretty famous as a &ldquo;troublemaker&rdquo; who encourages people not to drink the government and liberal media&rsquo;s Kool-Aid. You may have seen my videos featured on Fox News, The Blaze, and Glenn Beck. </p>
<p>One thing to mention right off the bat...this presentation has got some VERY controversial information that is going to TICK OFF some very powerful people. As a result, this page may disappear at any time.</p>
<p>So please, take the few minutes and watch this NOW, while there&rsquo;s still time.</p>
<p>But enough about me. I know you&rsquo;ve come here for a reason. You&rsquo;re worried. Probably, more than a little worried. I wish I could tell you everything was going to be okay. But I can&rsquo;t. It breaks my heart, but you deserve the truth.</p>
<p>We are living in scary times, friend. Whether it&rsquo;s the economy, terrorism, or global unrest, I&rsquo;ve never seen so many things teetering on the brink of disaster. And at the top of the list is our crumbling, vulnerable power grid. Why?</p>
<p>Because everything we depend on, depends on the grid.</p>
<p><strong><em>Without it, we&rsquo;re all sunk.</em></strong></p>
<div class="clear"></div>
                  </div>
            	</div>   
            	<!-- end of block white -->
            
<div class="clear"></div>

                <!-- start of grad block -->
                <div class="block grad-brown-light">
                    <div class="block-head pad-30 no-pad-bot">
                        <h3 class="color-red">"You know that once the power goes, the clock starts ticking..."</h3>
                    </div>
                    
                    <div class="inner pad-30 no-pad-bot">
                    
                        <img src="images/samples/section1-block2-img1.jpg" class="media right has-bg full-right">
                        
                        <p>The lights would flicker and go out…</p>
                        <p>Appliances like your microwave, toaster, and fridge would be useless.</p>
                        <p>Your food would spoil within a day, and you&rsquo;d quickly run out of stuff in the pantry.</p>
                        <p>Your A/C or heat wouldn&rsquo;t work, making it either freezing cold or sweltering hot (especially dangerous for the very old, very young, or sick individuals).</p>
                        <p>Wells wouldn&rsquo;t be able to pump water.</p>
                        <p>You&rsquo;d have no way to charge or use your cell phone, tablet, or computer to communicate with your family or to get help.</p>
<div class="dots-snake">
          <div class="dots-img">1</div>                       
                      </div>
                        
                        <h3 class="color-blue pad-30-t-b no-pad-top" style="text-align: right;">"In our 21st century world, we simply can’t<br>
do anything without power."</h3>
                        <img src="images/samples/section1-block2-img2.png" class="media left has-bg full-left">
                        <p>We&rsquo;ve become so complacent with everything being so darned easy all the time we don&rsquo;t stop to think about how fragile our present reality is...</p>
                        <p>And it isn&rsquo;t just about what doesn&rsquo;t work without power in your own home...<strong>society at large would begin to collapse in as little as 72 hours... </strong>You could not access any of your money in your bank accounts. Credit cards wouldn&rsquo;t work, either.</p>
                        <p>That means no way to buy food, water, medicine, or anything else! Hospitals would be dead in the water – lifesaving equipment and computers wouldn&rsquo;t function, killing people as a result. Folks who depend on things like oxygen tanks, CPAP masks, or dialysis would be the first to die. </p>
                        
                        <h3 class="color-red pad-30-t-b">"No Power Means… No LIFE."</h3>         
                      <p>Transportation would be near impossible.</p>
                        <p>Gas stations would be as dry as Death Valley, and couldn&rsquo;t pump gas even if they had it without electricity.</p>
                        <p>Stores would have no way to function and would be stripped bare of any remaining stock by looters, leaving law-abiding citizens like you and me with no supplies or resources.</p>
                      <p>Police couldn&rsquo;t respond to emergencies, offering criminals a field day to terrorize innocent citizens.</p>
                      <p>All of this may seem somewhat &ldquo;sensational&rdquo; to you...after all, it probably won&rsquo;t happen, right?
 </p>
                        <div class="clear"></div>
               		</div>
                </div>
                <!-- end of grad block --> 
                
                <!-- start of white block --> 
                <div class="block bg-white">
                
                        <div class="block-head pad-30 no-pad-bot">
                            <h3 class="color-blue" style="text-align: right;">"Well, I Hate To Break It To You...The Chances Are It Actually WILL."</h3>
                        </div>                    
                        
                        <div class="inner pad-30">
                           <div class="media left" >
		<script type="text/javascript" src="https://content.bitsontherun.com/players/FTFCSukc-HMTdTVNI.js"></script>
      </div>
      <p>Unfortunately for you and me, we have an administration that really isn&rsquo;t all that interested in fixing this, either. In fact, the steps Obama and the feds are taking are only putting additional strain on our national power grid.</p>
                          <p>Yep, you heard right.</p>
                          <p>Obama and his EPA cronies have declared an all-out war on coal, which powers almost 40% of all the electricity we use. It&rsquo;s no wonder things are such a God-awful mess.</p>
                          <p>Obama&rsquo;s intention to obliterate the coal mining industry – and devastating the economies of whole states I might add (Kentucky, West Virginia, Wyoming, among others) – means the grid has just that much more chance of failing because it can&rsquo;t cope with the demand. Think I&rsquo;m kidding? I wish I was.</p>
                          <p>National Geographic confirms this shocking truth…and it&rsquo;s been covered up and suppressed for years. They predict:</p>
<h3 class="color-red pad-30-t-b">“We Could Easily Be Without Power Across A Multi-State Region For Many Weeks Or Months…”</h3> 
                        
                            
                        <img src="images/samples/section1-block3-img2.jpg" class="media has-bg right full-right">
                        
<p>But hey...I didn&rsquo;t create thi to just paint a picture of doom and gloom. Things are bad...in some ways, REAL BAD. But I&rsquo;m here to tell you how you can do something about it, and take back control of your family&rsquo;s future wellbeing...</p>
<p>But even more urgent than that, let&rsquo;s talk a little about the state of the American power grid...it seems to be the one thing the talking heads, pundits and especially Washington never mention. </p>
<p>Ever wonder why?</p>
<p>I&rsquo;ll tell you why.</p>
<p>They&rsquo;re too busy cutting deals and wheeling and dealing to care about our crumbling and vulnerable power grid, much of which is built on 1880s technology (don&rsquo;t take my word for it...the American Society of Civil Engineers confirms it!) They&rsquo;re too busy targeting patriotic Americans with REAL conservative, tried and true values. </p>
<p>People like you and me.</p>
<p>They&rsquo;re too busy eavesdropping on your phone conversations, reading your emails, and tracking your every move, and letting the TSA take naked pictures of you and &ldquo;pat down&rdquo; (I&rsquo;m using that term loosely) grannies and 6 year old kids all the while congratulating themselves for &ldquo;preventing terrorism.&rdquo;</p>
<div class="clear"></div>
                    </div>                        
                </div>
                <!-- end of white block -->
                
                <!-- start of blue block with flag -->
                <div class="block bg-blue bg-flag ">
                	<h3 class="color-blue medium-size700 pad-30-t-b " style="text-align: center;">"Talk about screwed up priorities, folks." </h3>
                    
                    <div class="inner medium-size pad-30-t-b no-pad-top">
                        <p>The fact is our nation&rsquo;s grid is old, weak, and ripe for a natural disaster or terrorist attack to cripple it. Much of the grid is patch-worked together like an antique quilt. In truth, the whole infrastructure is decrepit and in desperate need of repairs. </p>
                        <p>There are so many &ldquo;holes&rdquo; in the grid itself, it&rsquo;s just a matter of time before nature or evil people find the &ldquo;chink in the armor&rdquo; to bring part or all of it to its knees...</p>
                        <p>In fact, the American Society of Civil Engineers gives the grid a disturbing D+ for 2013. That&rsquo;s not just sad. That&rsquo;s a catastrophe waiting in the wings.</p>
                        <p>We don&rsquo;t have to imagine what it would be like…we already know.</p>
                        <img src="images/samples/section1-block5-img1.jpg" class="media right">
                        <p>Let&rsquo;s take Superstorm Sandy as an example...this force of nature was so powerful, <strong>it knocked out power to over 250,000 NYC residents!</strong> It was mind-blowing to see New Yorkers actually DUMPSTER DIVING for food after the storm!</p>
                        <p>While most power outages are rectified in a matter of hours or days, a powerful enough event could cause an extended blackout that would send our normal lives reeling into chaos.</p>
                        <p>The disasters keep piling up, one after the other. While Sandy wasn&rsquo;t that long ago, it&rsquo;s even more recently that most Americans are finally thawing out from what some have called &ldquo;The Deep Freeze of the Century.&rdquo;</p>
                        <p>Week after week, different parts of the country continued to get clobbered by Old Man Winter, and he just wasn&rsquo;t going to let up. What most people don&rsquo;t realize is the near cataclysm that almost took out major parts of the grid in America&rsquo;s Heartland, caused by horrifically cold weather that made the North Pole look like a tropical paradise!</p>       
                        <p>The increased demand heaved on the grid to cope with the subzero temperatures brought on by the &ldquo;Polar Vortex&rdquo; could have wiped out electricity and warmth for millions of people. </p>
                        <img src="images/samples/section1-block5-img2.jpg" class="media left">
                        <p>It was only the &ldquo;heroic efforts by grid operators&rdquo; that saved large parts of the country from total blackouts. The enormous stress placed on the grid from increased demand almost crippled whole chunks of service areas. Another winter of this magnitude could spell disaster for communities all across the nation.</p>
                        <p>Phillip Moeller, head of the Federal Energy Regulatory Commission, states that, &ldquo;the experience of this past winter indicates that the power grid is now already at the limit.&rdquo; And it&rsquo;s only getting worse, thanks to Obama and the EPA.</p>
                        <p>The reality of it is that 99% of the population doesn&rsquo;t think about the future or anything that isn&rsquo;t immediately affecting them. The lights are on, their cell phone works, and they think everything is okey-dokey. </p>
<div class="clear"></div>
                    </div>
                </div>
                <!-- end of blue block with flag -->
                
                <!-- start of flat brown block -->
                <div class="block flat-brown">
                	<h3 class="color-red pad-30">"And they couldn’t be more wrong."</h3>
                
                    <div class="inner pad-30 no-pad-top">
                      <p>But the fact that you&rsquo;re here lets me know you&rsquo;re not included in that heap of government-loving, blissfully ignorant sheep. Nope, you know the score, but are not quite sure where to turn for the answer.</p>
                      <p>Truth is, we&rsquo;ve got folks from all across the spectrum raising the alarm about the grid. Even former DHS chief Janet Napolitano warned her future successor of the grave threats, especially terrorism, that could cripple our fragile network of electrical substations all over the country. </p>
                      <p><strong>Here&rsquo;s the proof:</strong></p>
                      <div class="media left centered"><iframe src="//player.vimeo.com/video/101716443" width="400" height="225" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe><br>
                      <span class="media-description">(video excerpt of Janet Napolitano <br>
                      talking about the power grid threats)</span></div>
                      <p>Want more proof? A senior level DHS member and Congresswoman Yvette Clarke of New York warns, &ldquo;The likelihood of a severe geo-magnetic event capable of crippling our electrical grid is 100%.&rdquo; </p>
                      <p>I may not be a huge fan of Big Government, but I do know that this alarming statement has the proof to back it up. When your hear stuff like this coming from the top, it&rsquo;s time to wake up and smell the coffee.</p>
                      <p>But some will continue to live in a vacuum, because it doesn&rsquo;t fit their agenda.<br>
                      Case in point…</p>
                      <p>Don&rsquo;t expect the power companies to do anything about these threats to the grid, either. Truth is, they are in bed with the Feds, laughing all the way to the bank with their juicy tax breaks, executive salaries, and record profits. </p>
                      <p>Look, you and I are both patriotic Americans. We work hard, play hard, love our families, and love our country, too. It makes my blood boil to think our hard-earned dollars that should be used to upgrade and make desperate needed repairs to the failing grid go instead to subsidizing the already bloated bank accounts of muckety-mucks to pay for their Vegas vacations and private jets!!</p>
                      <p>And with <strong>Obama declaring an all-out war on coal and other fossil fuels, the burden on our already weak grid will become completely unsustainable.</strong> </p>
                      <p><strong>But hey, Obama doesn&rsquo;t deserve all the blame. </strong>Big Energy isn&rsquo;t any better…in fact, in some cases, they&rsquo;re worse! Greed and power is the name of their game, and they are ruthless players.</p>
<div class="clear"></div>
                            
                  </div>
                    
                    <h3 class="color-blue medium-size740 pad-30-t-b" style="text-align: center;">"No Friends, If You Want To Survive The Coming Power Failures And Blackouts, The Bare-knuckled Truth Is That You Are Going To Have To Take Care Of It Yourself." </h3>
                    
                    <div class="inner center medium-size pad-60-b">
                   	<p>Now, maybe you&rsquo;re thinking a backup generator would be just the ticket. But did you know that even a small generator with just enough juice to power a few appliances and lights costs over $70 a day to operate? </p>
                   	<img src="images/samples/section4-block1-img3.jpg" class="media left" style="margin-top: 7px;">
                    <p><strong>That&rsquo;s over $500 a week…more than $25,000 a year!</strong></p>
                   	<p>As a hard-working American, you probably don&rsquo;t have piles of cash like that stuffed into your mattress.</p>
                   	<p>It takes a whopping 18 gallons of gasoline PER DAY to keep one of these generators running – talk about shocking! </p>
                   	<p>We all know gas prices are currently approaching highway robbery…most places average $4.00 a gallon! Not to mention, when the power actually DOES go out, gas stations won&rsquo;t be charging their already ridiculous prices...they&rsquo;ll jack them up to reflect &ldquo;supply and demand&rdquo;...meaning they can charge whatever they want! $5, $6, even $10 a gallon – without blinking! So when you invest thousands of dollars in a gas generator, that&rsquo;s just the start…you&rsquo;ll have to pay through the nose just to keep the thing running. You stop paying, and it stops working.</p>
                   	<p>Then there&rsquo;s the noise and pollution a generator makes…it&rsquo;s like advertising to any would-be looters, &ldquo;Hey, I&rsquo;ve got a generator, come and get it!&rdquo; <br>
                   	  Don&rsquo;t kid yourself! When the bleep hits the fan, people will be trolling neighborhoods within a very short amount of time scouring for resources…food, water, and of course, power. </p>
                   	<p>They will take what they want, and may even be armed. You certainly don&rsquo;t want to make yourself an easy target with a loud and stinky generator!</p>
                   	<p>Plus, who wants to listen to that constant engine knock or breathe in all those smelly fumes? Not to mention having to keep a huge supply of flammable gasoline near your house at all times!</p>
                   	<p>And the big question…</p>
<div class="clear"></div>
                  </div>
                    
                    <h3 class="color-red pad-30">"What If You Can’t Get Any Gas Because The Stations Have Been Pumped Dry As A Bone?"</h3>
                    
                   	<div class="inner pad-30 no-pad-top">
                        
                        <img src="images/samples/section1-block5-img4.jpg" class="media has-bg right full-right">
                        
                        <p>Gas stations don&rsquo;t function without electricity, anyway!</p>
                        <p>What then? You&rsquo;d be SOL, that&rsquo;s what.</p>
                        <p>How about a natural gas generator? Well, sure! If you&rsquo;ve got an extra $10,000 to $30,000 burning a hole in your back pocket! </p>
                        <p>Because that&rsquo;s what it will cost to purchase one of these house-attached generators. Not to mention they are obscenely expensive to have professionally installed. And you can&rsquo;t take it with you if you have to bug out, either!</p>
                        <p>Nope…one strong storm will kill your power and your fancy generator in one fell swoop! Talk about a double whammy!</p>
                        <p>Clearly, any kind of traditional generator is not a great option and is out of reach for most folks.</p>
                        <p>So with the gasoline and natural gas generator out of the question, there has to be <strong>something</strong> else, right? </p>
                        <p>It&rsquo;s up to you to make sure your family has the electricity, food and warmth to keep them healthy, safe, and comfortable.</p>
                        <p>You need to know without a doubt, that when the things implode and the rest of the world is going berserk, your family will be secure, and that means being as energy independent as possible.</p>
                        <img src="images/samples/section1-block5-img3.jpg" class="media has-bg left full-left">
                        <p>You don&rsquo;t want to worry about our ancient and insecure power grid, which is dangling close to the edge of disaster.</p>
                        <p>You don&rsquo;t want to worry about a secret terror cell in some dark corner of the globe targeting already under-protected US electrical substations that might as well have a bright red bulls eye painted on their sides.</p>
                        <p>You don&rsquo;t want to have to resort to a gas guzzling or natural gas generator, which would require you to completely empty your bank account.</p>
                        <p>You don&rsquo;t want to worry about another Sandy or Katrina, wiping out power for days or weeks on end…leaving you and your family completely helpless…</p>
                        <p>You need to be sure you don&rsquo;t have to rely on any outside source to keep the lights on, appliances running, or your house warm or cool…</p>
<div class="clear"></div>
                    </div>
                    
               		<!-- end of flat brown block -->
                
                </div>
                <!-- Start of white block --> 
                <div class="block bg-white">
                
                        <div class="block-head pad-30 no-pad-bot">
                            <h3 class="color-blue" style="text-align: left;">&quot;So What’s The Answer?&quot;</h3>
                        </div>                    
                        
                        <div class="inner pad-30">
                          <p><strong>The answer is having a way to harness the limitless and FREE energy from the sun, with a portable solar powered generator.</strong></p>
                          <p>Here&rsquo;s the truth, folks: You need to make your home a self-powered oasis…with a reliable, discreet, and MOBILE source of power.</p>
                          <p>No gas or propane required. Ever.</p>
                          <p>Think about it…letting go of the worry of what will happen to your family during an outage…and never again being at the mercy of a crumbling, weak, and unreliable power grid!</p>
                          <p>Hey…I didn&rsquo;t want other Americans to be kept chained up in fear of what might happen to them when the power goes out…or be at the mercy of our corrupt government&rsquo;s criminal negligence. So I took it upon myself to find a viable power-generating alternative that was reliable, discreet, and one you could take with you…anywhere!</p>
                          <p>Knowing there HAD to be something better out there, I searched high and low for just the right kind of solar powered generator.</p>
                          <p>One that could harness limitless FREE power from the sun…one that was powerful and could provide enough juice to keep vital devices running: lights, cell phones, laptops, tablets, small appliances, even a freezer and small fridge.</p>
                          <p>But most important? One that you could pack up in a matter of minutes, load into your car, truck, or RV, and get the heck out of dodge when a crisis hits.</p>
                          <p>I was completely frustrated by the lack of solutions on the market. So...</p>
<div class="clear"></div>
          </div>                        
  </div><!-- end of white block -->
            </div>
        
       
              </section>
              
              <section class="section">
        	<div class="section-inner">
            	<div class="block flat-brown">
                    
                    <div class="block-head grad-red pad-30">
                        <h2 class="color-light-brown centered" style="padding: 10px 0;">&quot;I Finally Took Matters Into My Own Hands…&quot;</h2>
                    </div>
                  <div class="inner pad-30">
                    <p>I got in touch with a rogue engineer based in Utah who is just as passionate about this I am and 100 times more knowledgeable than me. This guy has spent years training as an engineer and has traveled all over the world for the past two decades, relentlessly researching the best way to generate and store the free power from the sun. </p>
                	<p>When I told him what I was trying to do, he got on board immediately...we got so worked up about the idea that we were both talking at once! I begged and pleaded, and he retreated to his lab for months of hard work.</p>
                	<p>Finally he had a design nailed down. And we found an innovative manufacturer who was willing to take chance on this idea. After months and months of tweaking and testing..</p>
                    <h3 class="color-blue centered">I’m Proud To Introduce The Patriot Power Generator 1500.</h3>
                    <p><img src="images/samples/section2-block1-img1.jpg" class="media centered"></p>
                    <p>I can honestly tell you that you&rsquo;ll be stunned at how powerful and yet portable this complete generator is. It&rsquo;s got a state-of-the-art lithium-ion battery that charges completely using the included top of the line folding solar panel. At only 27 pounds, anybody can lift it and it fits neatly into almost any cargo space, ready to go at any time. </p>
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
                  </div>
<h3 class="color-red pad-30">&quot;You Know It Isn’t A Matter Of IF You Need A Generator, But Which One?&quot;</h3>
                    
                    <div class="inner pad-30 no-pad-top">
                    
                    <img src="images/samples/section4-block1-img2.jpg" class="media has-bg right full-right">
                    
                    <p>So let&rsquo;s take a moment here so you can understand why my <strong>Patriot Power Generator 1500 checks all the &ldquo;must have&rdquo; boxes to be the finest personal power source available on the market.</strong></p>
                    <p>First off, we all know that gasoline generators, the most common type on the market, will make a TON of noise and pollute the air with noxious fumes.<br>
                      They&rsquo;ll also DRAW UNWANTED ATTENTION when all hell is breaking loose outside, and marauders and looters are scanning your neighborhood for resources they can use for themselves.</p>
                    <p>And, with a true power grid failure (as in blackout), you&rsquo;re looking at entire systems breaking down…that means no gas, folks! It won&rsquo;t matter that you have a gas-powered generator if you can&rsquo;t supply it with the fuel it needs to work! It will be a 500 pound paper weight!</p>
                    <p>The Patriot Power Generator 1500 is virtually silent, fume-free, discreet AND SAFE. There are no caustic, flammable chemicals or lead-acid batteries to worry you or your family. You can keep it right in your bedroom and still sleep like a baby.</p>
                    <p>Natural gas generators may be able to power your whole house, but guess what? If a storm flattens your residence, you&rsquo;re without your fancy generator AND the tens of thousands of dollars it costs to install!</p>
                    <p>The Patriot Power Generator 1500 is so simple to use, it&rsquo;s truly a &ldquo;plug and play&rdquo; generator. Even a child can easily use it.</p>
<div class="clear"></div>
                  </div>
                </div>
                
                <div class="block bg-white">
                	<h3 class="color-blue pad-30" style="text-align: center;">&quot;It Really IS As Easy As 1-2-3!&quot;</h3>
                    
                    <div class="inner pad-30 no-pad-top">
                    
                    <div class="media has-bg right full-right" style=" min-width: 0px;">
                        <img src="images/samples/section5-block2-img1.jpg">
                        
                    </div>                    
                    <p><span class="color-blue"><strong>Step 1:</strong></span> Unfold and set up your solar panel in the sunlight.</p>
                    <p><span class="color-blue"><strong>Step 2:</strong></span> Plug the solar panel into the Patriot Power Generator 1500.</p>
                    <p><span class="color-blue"><strong>Step 3:</strong></span> Plug in your electronic devices and enjoy free, abundant power from the sun!</p>
                    <p>The Patriot Power Generator 1500 offers up to 3,000 peak watts of clean, quiet, and totally FREE, renewable power – enough to power as many lights as you need for safety and comfort, your computer, TV, cell phone and even small appliances, like a small freezer or medical device – that will sustain your during a power outage caused by God knows what.</p>
                    <p>That&rsquo;s right – no additional costs ever – no gasoline, no propane – just the endless, FREE rays of the sun.<strong></strong></p>
                    <p>Not only that, but the Patriot Power Generator 1500 can hold a full battery charge for a staggering 6 months with only a 25% leak maximum – that&rsquo;s absolutely unheard of! </p>
                    <p>That means that you can &ldquo;set it and forget it&rdquo;…if a crisis hits you won&rsquo;t have to wait for it to charge. It will be good to go!</p>
                    <p>But I&rsquo;m saving the best for last. </p>
                    <p>As I&rsquo;ve said repeatedly throughout this entire presentation, any source of power is absolutely useless if you can&rsquo;t take it with you.</p>
<div class="clear"></div>
                    </div>
                </div>
                
                <!-- start of flat brown block -->
                <div class="block flat-brown">
                	<h3 class="color-red pad-30 pad-60-t" style="text-align: center;">That’s Why I Made Sure The Patriot Power Generator 1500 Was Small, Compact, AND Powerful.</h3>
                    
                    <div class="inner medium-size800 pad-30 no-pad-top">
                    <p>It weighs only 27 pounds, and at only 18&rdquo;L x 10&rdquo;W x 12&rdquo;H, is small enough to go anywhere with you. The compact size also means it&rsquo;s easy to store discreetly; no one needs to know you have a covert power source tucked away in your home. Don&rsquo;t be fooled by its small size, friends. This little generator packs a punch when it comes to delivering power. It can be fully charged in as little as 3.5 hours, and comes with a commercial grade, collapsible solar panel that folds up nice and easy.<br>
                      </p>
                    <p>I  always recommend to all of my friends and family to have a fully realized &ldquo;bug out&rdquo; plan. This is exactly what I envisioned when I came up with the Patriot Power Generator 1500. It&rsquo;s only a matter of time before a major event cripples the grid – and none of us knows if that will be for a few hours, days, or even weeks or longer!</p>
                    <p>But don&rsquo;t think you have to wait until the &ldquo;you-know-what&rdquo; hits the fan to take advantage of this little workhorse. Its small size, portability and ease of use make it perfect for camping, hunting and fishing trips, taking along on your next RV vacation, or even weekend tailgating. I bet you can picture literally a HUNDRED ways you will use and enjoy having an easy, free source of power!</p>
                    <p>We have to be prepared. And I&rsquo;ve thought of everything in this &ldquo;little generator that could&rdquo; so YOU don&rsquo;t have to…</p>
                    <p>Just so you can clearly see what makes my Patriot Power Generator 1500 head and shoulders above the rest, here it is &ldquo;up close and personal&rdquo;...</p> 
                                     
                        <div class="clear"></div>
                  </div>
				</div>
                <!-- end of flat brown block -->
        	</div>
        </section>
        
        <section class="section">
        	<div class="section-inner">
				<!-- start of block white -->
                <div class="block bg-white">
                  <div class="block-head grad-white-brown pad-30">
                    <h2 class="color-red dark">&quot;Truth Is, My Generator’s Combination Of Features Gives It An Unfair Edge Over Its Competition...&quot;</h2>
        
                      <p>&nbsp;</p>
                      <p><i class="fa fa-chevron-circle-right"></i> <strong>Lithium Ion Battery:</strong> my Patriot Power Generator 1500 contains a safe, state-of-the-art lithium-ion battery (this is the same kind of battery used in the iPhone). This is far superior to older, out of date lead acid batteries, which can leak caustic chemicals, causing a hazard to your family&rsquo;s health and safety. Plus they don&rsquo;t last nearly as long. </p>
                      <p><i class="fa fa-chevron-circle-right"></i> <strong>No assembly required:</strong> Your generator arrives already assembled and charged. You don&rsquo;t have to wait to try out your generator; you can start using it right away.</p>
                      <p><i class="fa fa-chevron-circle-right"></i> <strong>1000+ Life Cycles:</strong> This means you can fully drain and recharge your battery over 1,000 times, insuring a long life of peak performance and power when you need it. </p>
                      <p><i class="fa fa-chevron-circle-right"></i> <strong>The &ldquo;Triple Charge&rdquo; Advantage:</strong> Of course you can charge your generator using the included solar panels, but you can also charge it by plugging it into a wall outlet or by using a wind turbine.</p>
                      <p><i class="fa fa-chevron-circle-right"></i> <strong>3.5 Hour or Less Charge Time:</strong> It sounds incredible, but my Patriot Power Generator 1500 is fully charged and ready to go in just a few hours.</p>
                      <p><i class="fa fa-chevron-circle-right"></i> <strong>Holds a charge for up to 6 months:</strong> This generator requires virtually no maintenance. This means your generator is always ready when the lights go out...even if you aren&rsquo;t!</p>
                      <p><i class="fa fa-chevron-circle-right"></i> <strong>Up to 3,000 peak watts of power:</strong> Powers your cell phone, tablet, laptop, radio, several lights, and even small appliances and critical medical devices. With proper power management, you could power your freezer INDEFINITELY…you&rsquo;ll never have to worry about your food reserves going bad. </p>
                      <p><i class="fa fa-chevron-circle-right"></i> <strong>Multiple electrical outputs:</strong> There are 2 120 volt AC outlets (where you can plug in your standard issue 2 or 3 prong plug); 4 USB outlets for charging cell phones, tablets and other personal electronic devices; 1 12 volt DC outlet that you can use with a cigarette lighter adapter; and 1 12 volt Anderson Power Pole outlet, commonly used for emergency radio and CB units (for all you ham radio operators out there!). </p>
                      <p><i class="fa fa-chevron-circle-right"></i> <strong>Commercial grade, 100-watt solar panel cells manufactured by Bosch</strong> (a household name in electronics). This panel has a rugged, durable metal frame with reinforced corners…you don&rsquo;t need to worry about handling it with kid gloves! </p>
                      <p><i class="fa fa-chevron-circle-right"></i> <strong>The solar panel folds easily for discreet storage and transport anywhere</strong> and includes a sturdy carrying handle!</p>
                        <p><i class="fa fa-chevron-circle-right"></i> <strong>You can &ldquo;daisy-chain&rdquo; additional solar panels for even more power: </strong>You can easily connect additional solar panels to your generator to reduce charging time and power your devices even longer.</p>
                      <p>&nbsp;</p>
                  </div>
                    
                    <div class="inner pad-30 pad-50-t">
                        <img src="images/samples/section4-block1-img1.jpg" class="media has-bg small right">
                      <p>
                        	<strong>So let’s talk about reality here. </strong>
                    	</p>
                        
                        <p>You and I both know there are some things you simply can&rsquo;t put a price tag on…your family&rsquo;s safety and survival being the most important.</p>
                        <p>As you can see, for solutions that even come close to my Patriot Power Generator 1500, you could expect to pay $10,000 or more. But even though I could charge close to that, I simply in good conscience couldn&rsquo;t do that to my fellow hard-working, patriotic Americans.</p>
                        <p>Nope. I knew I had to offer the Patriot Power Generator 1500 at a price that wouldn&rsquo;t be completely out of reach for most folks.</p>
                        <p>So I&rsquo;m offering the Patriot Power Generator 1500 at an introductory price that will just basically cover the manufacturing costs and help me defray some of the research and development expenses. My friends think I&rsquo;m crazy to offer a state-of-the-art generator that&rsquo;s incredibly easy to operate at a discount, but it&rsquo;s because I feel that strongly about making sure you&rsquo;re secure.</p>
                        <p>For a very limited time and on a first-come, first-served basis, I am offering the Patriot Power Generator 1500 for the low price of $1997.</p>
                        <p>The Patriot Power Generator 1500 creates free electricity for you immediately and protects your family in case of a crisis. Isn&rsquo;t it worth the peace of mind to know you&rsquo;ve got the ONE thing – the GLUE – to keep your family&rsquo;s life together…no matter where you are?</p>
                        <p>You could be at home, or in your RV, cabin, or undisclosed, completely off the grid location…it DOESN&rsquo;T MATTER. <strong><em>If the sun is shining, you can charge your Patriot Power Generator 1500 for FREE. And it will power your critical devices 24 hours a day, 7 days a week, 365 days a year.</em></strong></p>
                        <p>Your decision today to ensure your family&rsquo;s survival with a clean and renewable power source that can go anywhere will allow you to focus on other areas of your bug out plan.</p>
                      <p>Remember…having a power source you can rely on is the foundation of any survival strategy. Without it, and you may as well be running a marathon on a darn treadmill.               		  </p>
                      <div class="clear"></div>
                    </div>
            	</div>   
            	<!-- end of block white -->
                
				<!-- start of flat brown block -->
                <div class="block flat-brown">
                	<h2 class="color-red pad-30 no-pad-bot">&quot;To Make This A Truly Unbeatable Deal, I’m  Going To Add Some AMAZING Free Bonuses&quot;</h2>
                
                    <div class="inner pad-30">
                      <p><strong>Not one, not three, but TEN incredible FREE bonuses if you act now.</strong></p>
                      <h5 class="color-red pad-45-b pad-15-t">Bonus #1: FREE SHIPPING (a $200 value!):</h5>
                      <p><strong></strong> This is an incredibly valuable item, and I want to get it into your hands with the least amount of hassle and worry for you. Let me tell you, with state of the art technology like this, the Big Government regulators really make you jump through some serious hoops, but I&rsquo;ve &ldquo;dotted all the i&rsquo;s&rdquo; and &ldquo;crossed all the t&rsquo;s&rdquo; and fought through the red tape so you don&rsquo;t have to mess with it! Your Patriot Power Generator 1500 will be delivered right to your door in plain packaging that won&rsquo;t reveal the contents…it&rsquo;s totally covert. And it&rsquo;s all on my dime! And remember, it arrives fully assembled and charged, so it&rsquo;s ready to go as soon as you take it out of the box.</p>
                      
                  </div>
                </div> 
               	<!-- end of flat brown block -->
                
                <div class="block grad-brown-light">
                	<div class="inner pad-30">
                    	
                        <img src="images/samples/section2-block2-img1.png" class="media small left">
                        <h5 class="color-red pad-45-b pad-15-t">Bonus #2: FREE 25 Foot Solar Panel Extension Cord (a $50 value):</h5> 
                        <p><strong></strong> Having this heavy duty extension cord for your solar panels means that your panels can be outside soaking up the sun while your actual generator is inside giving you much needed power!</p>
                    </div>
                </div>
                <div class="block">
                	<div class="inner pad-30">
                    	<img src="images/samples/section5-block2-img3.jpg" class="media small right">
                        <h5 class="color-red pad-45-b pad-15-t">Bonus #3: &ldquo;Top 7 Reasons Why the Grid Will Fail&rdquo; (a $20 value): </h5>
                        <p>In this report,<strong> </strong>learn exactly why our power grid is teetering on total collapse, and how to avoid the aftermath when it finally does! This is the information the government and the power companies DON&rsquo;T want you to see!</p>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="block">
                	<div class="inner pad-30">
                    	<img src="images/samples/section5-block2-img5.jpg" class="media small left">
                        <h5 class="color-red pad-45-b pad-15-t">Bonus #4: &ldquo;The Blackout Response Guide&rdquo; (a $20 value): </h5>
                        <p>Find out exactly what you can expect when a blackout hits, plus what you need to do beforehand to make sure you&rsquo;re prepared. Get the tips and tricks you need to keep your family safe and comfortable during the blackout, and what you can do after it&rsquo;s over to get life back to normal.</p>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="block">
                	<div class="inner pad-30">
                    	<img src="images/samples/section5-block2-img6.jpg" class="media small right">
                        <h5 class="color-red pad-45-b pad-15-t">Bonus #5: &ldquo;Your Complete Power Failure Preparation Checklist&rdquo; (a $20 value): </h5>
                        <p>Now that you&rsquo;ve got your generator, make sure you have everything else you need to survive a crisis. You&rsquo;ll be surprised by the some of the common household items that can make a huge difference in a disaster situation!</p>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="block">
               	  <div class="inner pad-30">
                   	<img src="images/samples/section5-block2-img4.jpg" class="media small left">
                    <h5 class="color-red pad-45-b pad-15-t">Bonus #6: &ldquo;The 3 Hidden Dangers of the Smart Grid&rdquo; (a $20 value): </h5>
                      <p>The government claims that so-called &ldquo;smart meters&rdquo; are going to help reduce energy use and lower costs. This report reveals what they&rsquo;re NOT telling you.</p>
                        <p>The next three free bonuses are really my &ldquo;survival essentials,&rdquo; and I want to make sure you have them too.</p>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="block grad-brown-light">
                	<div class="inner pad-30">
                    	 <h5 class="color-red pad-45-b pad-15-t">Bonus #7: 72 Hour Survival Food Kit (a $27 value):  </h5>
                        <img src="images/samples/section5-block2-img7.jpg" class="media small right" style="margin-top: 0px;">
                        <p>You&rsquo;ll get<strong> </strong>a 72-hour emergency food kit packed in airtight packaging that&rsquo;s rated for 25 years of storage. That is 16 full servings of survival food, 3 days of complete meals. These meals are delicious, nutritious, easy to prepare and can literally save your life in a crisis.</p>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="block grad-brown-light">
                	<div class="inner pad-30">
                    	<h5 class="color-red pad-45-b pad-15-t">Bonus #8: Lifestraw Personal Water Filter (a $25 value):</h5>
                        <img src="images/samples/section5-block2-img8.png" class="media small right" style="margin-top: 0px;">
                        <p>This advanced water filter removes 99.999 percent of waterborne bacteria and parasites, and provides you with crystal-clear, life-giving water when no clean drinking water is available. It can be carried anywhere, since it weighs only two ounces. It contains no chemicals and no moving parts, and requires no electricity or batteries. </p>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="block">
               	  <div class="inner pad-30">
                   	<img src="images/samples/section5-block2-img9.jpg" class="media small right" style="margin-top: 0px;">
                    <h5 class="color-red pad-45-b pad-15-t">Bonus #9: Survival Multi-Tool (a $10 value):</h5>
                      <p>This compact but powerful survival tool packs 11 functions into a tool no bigger than a credit card and fits right in your wallet, so you'll always have it handy. </p>
                        <p>And one more, just for fun…</p>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="block grad-brown-light">
                	<div class="inner pad-30">
                    	<img src="images/samples/section5-block2-img10.png" class="media small left">
                        <h5 class="color-red pad-45-b pad-15-t">Bonus #10:Power Playing Cards (a $10 value): </h5>
                        <p>Even in the middle of a crisis, everyone needs something to relieve the tension and bring everyone together, and there&rsquo;s nothing like a deck of cards to provide hours of family entertainment. Plus, every playing card in this deck has a free tip about generating or conserving power.</p>
                    
                      <div class="clear"></div>
                    </div>
                </div>
                <div class="block">
               	  <div class="inner medium-size800 pad-30">
                    	
                      <h3 class="color-blue centered">&quot;That&rsquo;s A Total Value Of Over <strong>$400</strong> … <br>
                    And You’re Getting All 10 Bonuses Absolutely FREE!&quot;</h3>
                        <img src="../media/images/ppg/ppg-product-checkout-01.jpg" class="media centered">
                      <p>I am taking this deal one step further. Because I am a man on a mission to make sure every American has this kind of security, I am offering a...</p>
                      <div class="clear"></div>
                    </div>
                </div>
                
            </div>
        </section>
        
        <section class="section">
       	  <div class="section-inner">
          		<div class="block-head grad-red pad-30">
                	<h2 class="color-white" style="text-align: center;">&quot;365 Day, 100% Money-Back Guarantee On My Patriot Power Generator 1500&quot;</h2>
                </div>
				<!-- start of block white -->
                <div class="block bg-white">
                  <div class="block-head grad-white-brown pad-30">
                    <img src="images/samples/section6-block1-img1.png" class="media  right">
                      <p>Let me spell it out for you (you&rsquo;ll be floored by this!):</p>
                      <p>This is a 365 Day 100% money-back guarantee. I want you to try this in your home for a full year….really put it to the test. Charge it up and drain it multiple times…I want you to really get to know your generator and what it can do for you. If it doesn&rsquo;t do everything I say or if you&rsquo;re unsatisfied for any reason, return it and I&rsquo;ll give you your money back, <strong>no questions asked</strong>. <strong><em>You literally can&rsquo;t lose.</em></strong></p>
                      <p>Why I am offering this? Well, simply put, it&rsquo;s to demonstrate my level of confidence in the Patriot Power Generator 1500, and how simple it is to use. Most companies would choke on such a guarantee, but for me, it&rsquo;s just part of the way I want to do business – up front, honest, and ethical. <strong>The American Way.</strong></p>
                      <p>And please do not think you can get this generator anywhere else. You can&rsquo;t.</p>
                      <p>The Patriot Power Generator 1500 is NOT available from any store, website, or distributor. You can only get it here.</p>
<p class="section-description">&nbsp;</p>
                  </div>
              </div>
                 
                 <div class="inner pad-30">
                   <h2 class="color-red txt-center">So Just Click The &ldquo;Add To Cart&rdquo; Button Below And I Will Get Your Order Filled As Soon As Possible.</h2>
                   <p>&nbsp;</p>
                   
                   <div class="txt-center">
                   <span class="old-price">Regular Price $2500.00</span>
                        <span class="price">Today $ 1997.00</span>
                   <a href="<?php echo $productDataObj->offerLink; ?>" onClick="ga('send', 'event', 'exit-letter', 'power-generator-exit-letter-accept', 'add-to-cart-first-button');" class="blue button big">ADD TO CART</a><br/>
                   <img src="images/samples/credid-cards.png"></div>
                   <p>&nbsp;</p>
                    <div class="clear"></div>
           	</div>
                <!-- end of white bg block -->
                <div class="block grad-brown-light">
                	<div class="inner pad-30">
                    	 <h3 class="pad-30 color-blue" style="text-align: center;">Now, Here&rsquo;s The Most Important Part. My Supply On These Generators Is VERY LIMITED.</h3>
                  <p>I was only able to manufacture a small supply of these revolutionary generators, just under 300 in fact, and I am telling you the truth when I say I WILL RUN OUT…</p>
                  <p>AND QUICKLY. It takes 4 months to manufacture these state-of-the-art generators, so there will be a LONG wait for more units once we are sold out.</p>
                  <p>No pressure, but I need to give you fair warning on the supply situation. That&rsquo;s why you really do to need to act fast. </p>
<p>You can get your Patriot Power Generator 1500 in just a moment, but 1st...</p>
                      <div class="clear"></div>
                    </div>
                </div>
			<!-- start of blue block with flag -->
                <div class="block bg-blue bg-flag ">
                	<h3 class="color-blue medium-size800 pad-60-t-b " style="text-align: center;">&quot;I Want You To Picture This In Your Mind...&quot;</h3>
                    
					<div class="inner medium-size pad-30-t-b no-pad-top no-pad-bot">
<p>It&rsquo;s 8:47 AM and the &ldquo;you know what&rdquo; has just hit the fan. People are panicking. It&rsquo;s all over the radio and TV. A news anchor comes on the TV screen and in a shaky voice says &quot;We have reports of wide-spread power failures sweeping the area. The power here could go out at any moment. We are now in a state of emergency. I repeat, we are now in a state of…&quot;</p>
<img src="images/samples/section5-block2-img11.jpg" class="media  centered" style="margin-bottom:20px;">
<p>The lights and TV blink out, and an eerie silence fills your home. </p>
<p>You turn on your portable AM radio and hear rumors of looting and other unrest. Panic is spreading and it&rsquo;s quickly becoming every man for himself.</p>
<p>You are safe at home with your family, thank goodness. But now your family is looking at you… &ldquo;What&rsquo;s going to happen?&rdquo; they ask. &ldquo;When will the power come back on?&rdquo; The look of fear in your family&rsquo;s eyes hits you like a punch to the gut. What are you going to tell your family? What have you done to prepare?</p>
<p>&nbsp;</p>
<div class="clear"></div>
                  </div>
                </div>
                <!-- end of blue block with flag -->
                
                <!-- start of flat brown block -->
                
            <div class="block flat-brown">
                	<div class="inner pad-30"> 
                      <h3 class="color-red">&quot;Look, You Have Come To A Fork In The Road...&quot; </h3>
                      <p>&nbsp;</p>
                      <p>It&rsquo;s entirely up to you which way you go.</p>
                        <p>If you don&rsquo;t take action to get your generator right now, you&rsquo;ll be in the same boat as the brainwashed masses who think &ldquo;everything is fine.&rdquo; And if a crisis hits and your family asks, &ldquo;When will the power come back on?&rdquo; your mouth will go dry and you&rsquo;ll feel powerless.</p>
                        <p>But what if you decide right now to secure your generator instead? Just imagine how much better you&rsquo;ll feel right away. And if a crisis hits and your family asks, &ldquo;When will the power come back on?&rdquo; you&rsquo;ll calmly reassure them that they&rsquo;re safe and they will have plenty of electricity to power the critical items. You can power the freezer… recharge cell phones and computers… keep critical medical devices going… and much more. </p>
                        <p>Your home will be a little island of light and warmth, even if it is dark everywhere else. Your generator will be a source of comfort and strength in the storm. Your family will think you&rsquo;re a hero… because you will BE a hero. Can&rsquo;t you just picture how that will feel?                        </p>
                        <p>&nbsp; </p>
                        <div class="clear"></div>
                    </div>
                </div>
          <!-- end of flat brown block -->
          </div>
        </section>
        <section class="section">
        	<div class="section-inner">
        		<div class="block bg-white has-bot-dots left-30">
                	<div class="block-head grad-red pad-30">
                        <h2 class="color-white" style="text-align: center;">&quot;Listen, I Can’t Predict The Future.&quot;</h2>
                    </div>
                	
                    <div class="inner pad-30 medium-size700 pad-60-t-b">
                      <p>I don&rsquo;t know exactly when or how the next power grid disaster will hit. But from everything I see, it could be soon and it could be a big one. That&rsquo;s why I really want you to get your generator now. Click the &ldquo;Add To Cart&rdquo; button below. You&rsquo;ll be glad you did.</p>
                      <p>Remember, this generator makes free electricity from the sun. So even if I&rsquo;m wrong and everything turns out fine, then you&rsquo;ll still come out ahead and be able to generate free electricity to help reduce your power bill!</p>
                      <p>If you want to get real power independence &amp; security click on the button at the bottom of this page.</p>
                      <p>You&rsquo;ll be glad you did. This is about peace of mind, knowing that you and your family are well protected in the case of a blackout. Sounds good, right?</p>
                      <p>Click on the button below, and get your Patriot Power Generator 1500 rushed to you before they&rsquo;re all gone… and then rest assured knowing that you will be able to keep the lights on no matter what happens. Don&rsquo;t you deserve this?</p>
                      <p>To get your Patriot Power Generator 1500 rushed to you at this special price, plus the 10 FREE bonuses, click the big &quot;Get Started&quot; button below.</p>
                      <p>Folks, all the warning signs of a power grid disaster are blinking like the legendary neon lights of the Las Vegas strip. It couldn&rsquo;t be more obvious. It&rsquo;s not a question of if… it&rsquo;s a question of when. </p>
                      <p>So don&rsquo;t delay.</p>
                      <img src="../media/images/ppg/ppg-product-checkout-01.jpg" class="media centered">
                      <p>Click the &ldquo;Add To Cart&rdquo; button below now to get your Patriot Power Generator 1500 rushed to right away.</p>
                    </div>
                    <span class="dots-down-section red"></span>	
                </div>
            </div>
        </section>
        
        <section class="section full-width no-marg-bot mobile-full-width">
        	<div class="section-inner">
                <div class="block bg-light txt-center bg-flag">
                    <div class="inner pad-30 pad-60-t"> 
                        <h2 class="color-red large"><strong>Claim Your Patriot Power Generator 1500 Now!</strong></h2>
                        <br>
                        <span class="old-price">Regular Price $2500.00</span>
                        <span class="price">Today $ 1997.00</span>
                        
                        <a href="<?php echo $productDataObj->offerLink; ?>" onClick="ga('send', 'event', 'exit-letter', 'power-generator-exit-letter-accept', 'add-to-cart-bottom');" class="blue button big">ADD TO CART</a>
                        <br>
                        <img src="images/samples/credid-cards.png">
                        <br><br>
                        
                      <span class="small gray">Order online. Any Time<br>24 Hours a Day / 7 Days a Week / 365 Days a Year</span>
                        <br>
                        <br>
                        
                        <div class="clear"></div>
                    </div>
                </div>
                <div class="block bg-light-dark txt-center">
                	<div class="inner pad-30">
                    	<?php include("security-seals.php")?>
                    </div>
                </div>
            </div>
        </section>

<?php /*?><script src="js/scripts.js" type="text/javascript"></script>

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script><?php */?>

</div>

<?php
include_once("template-bottom.php");