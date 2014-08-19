<?php
$_SESSION["productId"] = 148;
include_once("Product.php");
$productDataObj = Product::getProduct($_SESSION["productId"]);
include_once("template-top.php");
include_once ('template-header.php'); /*Add template-header-nav.php to add top menu*/
?>
<script type="text/javascript">
	var _vis_opt_revenue = "<?php echo $_SESSION['vwoRevenue'];?>";
	window._vis_opt_queue = window._vis_opt_queue || [];
	window._vis_opt_queue.push(function() {_vis_opt_revenue_conversion(_vis_opt_revenue);});
</script>
<div class="container-main">
	<div class="breadcrumb2">
	    <a>CHECKOUT</a>
	    <a class="breadcrumb-center">ORDER CUSTOMIZATION</a>
	    <a class="current">ORDER CONFIRMATION</a>
	</div>
    <div class="container oto-width">
    	<div class="johnson-box-02 center-block margin-tb-20">
			<p><u>Your Order Has Been Received!</u></p>
			<p>We're Preparing Your Shipment Now.<br>
		    It Should Arrive In 7-14 Days.</p>
		</div>
		<div class="text-center margin-tb-20">
			<h1><strong>Thank You For Your Order!</strong></h1>
		</div>
        <div class="margin-tb-20">
        	<p class="read-warning text-center "><strong>NOTE:</strong> Your credit card statement will show a charge from Power4Patriots.com.</p>
        </div>
        <div class="margin-tb-20">
            <p><strong>Congratulations Patriot!</strong> -  You can count yourself among other smart Americans who “woke up and smelled the coffee” 
            	with your purchase of your new Patriot Power Generator 1500. Your investment in the future proves you are committed to the wellbeing 
            	of your loved ones... by making sure they have the ultimate protection from a power grid disaster.</p>
            	
			<p>I am really thankful that I can now count you among the 4Patriots family. We are a select group who take being prepared and having a 
				plan in place seriously.</p>
				
			<p>It’s my mission to continually bring you the best information and tools to keep your family safe in an unsafe world. You’ve got my word 
				on that.</p>
				
			<p>To your survival,</p>
			<p><img src="/media/images/frank/franksig.jpg" width="140" height="23" alt="Frank Bates"/><br>
			</p>
        </div>
        
		<div class="margin-tb-20">
			<div class="testimonial"><i class="fa fa-quote-left fa-3x pull-left"></i>&quot;I love your product. “I am prepared.” It allows me the 
				feeling of being self-reliant to know my wife and 
				I have the ability to survive an event of emergency... I have always tried to live by one of my greatest 
				thoughts, ‘I would rather have something and not need it than to need something and not have it.’ ...I have 
				recommended this product to several friends and family." - <strong>Luther C.</strong></div>
				
			<div class="testimonial"><i class="fa fa-quote-right fa-3x pull-right"></i>&quot;Thank you very much and it's a pleasure doing business with people like you. The world could be a better 
				place if everyone tried as hard as you to please others." - <strong>V. Patton</strong></div>
				
			<div class="testimonial"><i class="fa fa-quote-left fa-3x pull-left"></i>&quot;Congratulations for making the move to independence and out of the rat race. And thanks, too, for 
				encouraging others to become self-reliant." - <strong>L. Graeser</strong></div>
		</div>

<div id="videobox" class="hidden-xs">
			<iframe src="//fast.wistia.net/embed/iframe/cgbn6e8cpz?videoFoam=true" allowtransparency="true" frameborder="0" scrolling="no" class="wistia_embed" name="wistia_embed" allowfullscreen mozallowfullscreen webkitallowfullscreen oallowfullscreen msallowfullscreen width="642" height="360"></iframe><script src="//fast.wistia.net/assets/external/iframe-api-v1.js"></script>
</div>
        
<div class="margin-tb-20">
<?php //include_once("products/P4P-platinum-pid148.php");?>
</div>

        <div class="margin-tb-20 text-center">
        	<h2 class="darkRed">Customer Service Contact Info</h2>
	
			<p>If you have a problem or question feel free to email us at<br>
			<script type="text/javascript">
                emailE=('help@' + 'patriotpowergenerator.com')	
                document.write(
                '<a href="mailto:' + emailE + '">' 
                + emailE + '</a>'
            );
            </script> or call us at <strong>1-800-680-8504</strong></p>
        </div>
        <div class="margin-tb-20">
			<?php
			if($_SESSION["orders"]) {
				echo "<div class='rcBoxR10'>\n";
				echo "<h2 class='darkRed'>Your Order</h2>\n";
				echo "<ul>\n";
				foreach($_SESSION["orders"] as $orderNumber) {
					echo "<li>" . $orderNumber . "</li>\n";
				}
				echo "</ul>\n";
				echo "<h2 class='darkRed'>Shipping To</h2>\n";
				echo "<p>";
				echo $customerDataObj->firstName;
				echo "&nbsp;";
				echo $customerDataObj->lastName;
				echo "<br>";
				echo $customerDataObj->shippingAddress1;
				echo "<br>";
				echo $customerDataObj->shippingCity;
				echo ", ";
				echo $customerDataObj->shippingState;
				echo "&nbsp;&nbsp;";
				echo $customerDataObj->shippingZip;
				echo "</p>";
				echo "</div>\n";
			}
			?>
		</div>

    </div>
	
</div>
<?php
include_once("template-bottom.php");