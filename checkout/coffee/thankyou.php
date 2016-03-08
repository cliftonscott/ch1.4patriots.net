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
					from Food4Patriots.com</p>
			</div>
			<div class="margin-tb-20">
				<?php include("snippets/frank-thankyou-msg-coffee.html");?>
			</div>

			<div class="margin-tb-20">
				<?php
				$testimonials = array("thomas", "todd", "rich",);
				foreach ($testimonials as $count => $testimonial) {
					echo "<div class='testimonial'>";
					if($count % 2 == 0) {
						echo "<i class='fa fa-quote-left fa-3x pull-left'></i>";
					} else {
						echo "<i class='fa fa-quote-right fa-3x pull-right'></i>";
					}
					include("testimonials/" . $testimonial . ".html");
					echo "</div>";
				}
				?>
			</div>

			<div class="margin-tb-20">
				<?php include_once("products/F4P-fruitveggiesnack-pid128.php");?>
			</div>

			<div class="margin-tb-20">
				<?php
				if( $detect->isTablet() || !$detect->isMobile() ){
					include_once("recommendations/thankyou-ads.php");
				}
				?>
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
