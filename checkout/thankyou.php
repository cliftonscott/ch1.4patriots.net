<?php
$_SESSION["upsell"] = TRUE; //must stay a boolean
include_once("template-top.php");
include_once ('template-header.php'); /*Add template-header-nav.php to add top menu*/
?>
<script type="text/javascript">
	var _vis_opt_revenue = "<?php echo $_SESSION['vwoRevenue'];?>";
	window._vis_opt_queue = window._vis_opt_queue || [];
	window._vis_opt_queue.push(function() {_vis_opt_revenue_conversion(_vis_opt_revenue);});
</script>
<script src="/js/audio.js"></script>
<div class="container-main">
	<div class="breadcrumb2">
	    <a>CHECKOUT</a>
	    <a class="breadcrumb-center">ORDER CUSTOMIZATION</a>
	    <a class="current">ORDER CONFIRMATION</a>
	</div>
    <div class="container oto-width">
    	<div class="johnson-box-02 center-block margin-tb-20">
			<p style="font-size: 25pt;margin-top: 15px;margin-bottom: 30px;"><u>Your Order Has Been Received!</u></p>
			<p>We're Preparing Your Shipment Now.<br>
			It Should Arrive In 7-14 Days.<br>
			You Can Access Your Bonuses Below.</p>
		</div>
		<div class="text-center margin-tb-20">
			<h1><strong>Thank You For Your Order!</strong></h1>
		</div>
        <div class="margin-tb-20">
        	<p class="read-warning text-center "><strong>NOTE:</strong> Your credit card statement will show a charge
				from Food4Patriots.com and your bonuses are below</p>
        </div>
        <div class="margin-tb-20">
			<?php include("snippets/frank-thankyou-msg.html");?>
        </div>
        
		<div class="margin-tb-20">
			<?php
			$testimonials = array("rolf", "wanda", "anon04");
			foreach ($testimonials as $count => $testimonial) {
				echo "<div class='testimonial'>";
				if($count % 2 == 0) {
					echo "<i class='fa fa-quote-left fa-3x pull-left'></i>";
				} else {
					echo "<i class='fa fa-quote-left fa-3x pull-right'></i>";
				}
				include("testimonials/" . $testimonial . ".html");
				echo "</div>";
			}
			?>
		</div>

		<div class="margin-tb-20">
		<?php include_once("products/F4P-superpak-pid228.php");?>
		</div>
		<div class="margin-tb-20">
		<?php include_once("products/F4P-bonus-manuals.php");?>
		</div>
		<div class="margin-tb-20">
		<?php include_once("snippets/get-adobe-reader.html");?>
		</div>

        <div class="margin-tb-20 text-center">
        	<h2 class="darkRed">Recommended Products</h2>
	        <p><a style="text-decoration: underline" href="https://secure.water4patriots.com/video/app/index.php">Alexapure Pro Water Purification System</a>: This new water purification system is the perfect complement to your Food4Patriots survival food. Why? Because you need clean water to prepare dehydrated and freeze-dried food like Food4Patriots, and this breakthrough device will give you up to 5,000 gallons of safe, delicious, crystal-clear water from ANY source. <a style="text-decoration: underline" href="https://secure.water4patriots.com/video/app/index.php"> MORE <i style="text-decoration: underline" class="fa fa-chevron-right"></i><i style="text-decoration: underline" class="fa fa-chevron-right"></i></a></p>
		    <p><iframe src="http://reboot.sitescout.com/disp?pid=D286241DA7" width='600' height='360' marginwidth='0' marginheight='0' scrollbars='0' scrolling='no' frameborder='0' bordercolor='#000000' vspace='0' hspace='0'></iframe></p>
	        <p><a style="text-decoration: underline" href="http://secure.patriotpowergenerator.com/video/index.php">Patriot Power Generator 1500</a>: Experts warn the US electrical grid is vulnerable to physical, electromagnetic pulse (EMP) and cyber-attack by ISIS and other terrorist groups. Portable solar generators are a smart solution because they produce an endless supply of life-saving electricity in a crisis. Our top recommendation is the new Patriot Power Generator 1500. <a style="text-decoration: underline" href="http://secure.patriotpowergenerator.com/video/index.php"> MORE <i style="text-decoration: underline" class="fa fa-chevron-right"></i><i style="text-decoration: underline" class="fa fa-chevron-right"></i></a></p>
	        <p><iframe src="http://reboot.sitescout.com/disp?pid=1E9023ACCD" width='600' height='360' marginwidth='0' marginheight='0' scrollbars='0' scrolling='no' frameborder='0' bordercolor='#000000' vspace='0' hspace='0'></iframe></p>
	        <p><a style="text-decoration: underline" href="https://secure.patriothealthalliance.com/letter/greens-sample/index.php">Patriot Power Greens</a>: Older guys in the military swear by this “super-drink” to boost their energy, increase their stamina and get rid of their aches & pains. It tastes great and you’ll get the inflammation-fighting power of 38 organic fruits and vegetables, 10 probiotic strains and 7 digestive enzymes in each serving. Dr. Sebring is giving away samples if you’d like to try it yourself. <a style="text-decoration: underline" href="https://secure.patriothealthalliance.com/letter/greens-sample/index.php"> MORE <i style="text-decoration: underline" class="fa fa-chevron-right"></i><i style="text-decoration: underline" class="fa fa-chevron-right"></i></a></p>
	        <p><iframe src="http://reboot.sitescout.com/disp?pid=70134DD46A" width='600' height='360' marginwidth='0' marginheight='0' scrollbars='0' scrolling='no' frameborder='0' bordercolor='#000000' vspace='0' hspace='0'></iframe></p>
	
			<!--<p>If you have a problem or question feel free to call 1-800-728-0008<br> or email us at
				<script type="text/javascript">
					emailE=('help@' + 'food4patriots.com')
					document.write(
						'<A href="mailto:' + emailE + '">'
							+ emailE + '</a>'
					)
				</script></p>-->
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