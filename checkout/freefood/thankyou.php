<?php
$_SESSION["upsell"] = TRUE; //must stay a boolean
include_once("template-top.php");
include_once ('template-header.php'); /*Add template-header-nav.php to add top menu*/
?>

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
				<?php include_once("products/F4P-fruitveggiesnack-pid128.php");?>
			</div>
			<div class="margin-tb-20">
				<div class="bonus-materials">
					<h3>Food4Patriots Bonus Manuals</h3>
					<p>Here are all your Food4Patriots bonus manuals. </p>
					<div>
						<div class="row">
							<div class="col-sm-12 col-md-4 text-center"><a target="_blank" href="/media/pdf/F4P-10-Items-After-Crisis.pdf"><img height="231" src="/media/images/f4p/f4p-eBook-10-items-after-crisis.jpg" alt="" /></a></div>
							<div class="col-sm-12 col-md-8 margin-tb-50"><a target="_blank" href="/media/pdf/F4P-10-Items-After-Crisis.pdf">Right Click Here for Top 10 Items Sold Out After Crisis</a><br />
								This is manual shows you everything you need to stock to survive a disaster.</div>
						</div>
						<div class="row">
							<div class="col-sm-12 col-md-4 text-center"><a target="_blank" href="/media/pdf/F4P-Cut-Grocery-Bills-Half.pdf"><img src="/media/images/f4p/f4p-eBook-cut-grocery-bills-half.jpg" alt=""></a></div>
							<div class="col-sm-12 col-md-8 margin-tb-50"><a target="_blank" href="/media/pdf/F4P-Cut-Grocery-Bills-Half.pdf">Right Click here for How To Cut Your Grocery Bills In Half Guide</a><br />
								Here's the step-by-step manual showing you how to save on your grocery bill.</div>
						</div>
						<div class="row">
							<div class="col-sm-12 col-md-4 text-center"><a target="_blank" href="/media/pdf/F4P-Survival-Garden-Guide.pdf"><img height="231" src="/media/images/f4p/f4p-eBook-the-survival-garden-guide.jpg" alt="" /></a></div>
							<div class="col-sm-12 col-md-8 margin-tb-50"><a target="_blank" href="/media/pdf/F4P-Survival-Garden-Guide.pdf">Right Click Here For The Survival Garden Guide</a><br />
								This is the manual showing you the critical steps necessary to plant and grow your survival garden.</div>
						</div>
						<div class="row">
							<div class="col-sm-12 col-md-4 text-center"><a target="_blank" href="/media/pdf/F4P-Water-Survival-Guide.pdf"><img src="/media/images/f4p/f4p-eBook-the-water-survival-guide.jpg" alt=""></a></div>
							<div class="col-sm-12 col-md-8 margin-tb-50"><a target="_blank" href="/media/pdf/F4P-Water-Survival-Guide.pdf"> Right Click Here For Water Survival Manual</a><br />
								This is the manual showing you the critical steps necessary to survive a water crisis.</div>
						</div>
					</div>
				</div>
			</div>
			<div class="margin-tb-20">
				<div class="adobeReaderBox">
					<h2 class="darkRed text-center center-block">If You Need To Download PDF Reader</h2>

					<p>You must have Adobe Acrobat PDF Reader (version 5.0 &amp; up) to view the ebook PDF file and the bonuses. If you don't have the latest Adobe Acrobat PDF Reader left click here to get it. </p>
					<p><a href="https://adobe.com/reader" target="_blank"><img src="/media/images/misc/Adobe_Acrobat_Icon.jpg" alt="Adobe"style="width:75px;" /> Get Adobe Acrobat PDF Reader FREE</a></p>
					<p>Note - clicking the links above will open a NEW page in your browser so you don't lose this download page.</p>
					<h2 class="darkRed title-max-560 text-center center-block">If You Need Help Downloading The PDF Bonus Files</h2>
					<p>How To Download: Click each of the links next to the manual to download that manual: Right click, then select &quot;Save Target As&quot; (or &quot;Save Link As&quot;).</p>
					<p><img src="/media/images/misc/menu.gif" alt="Menu" class="img-responsive center-block" /></p>
					<p>Once you select the &quot;save target as&quot; or &quot;save link as&quot;, a download screen will appear asking you where you want to save the file to on your computer.</p>
					<p><span class="small1">(The download screen will appear like this...)</span><br /> <img src="/media/images/misc/saving.gif" alt="Save" class="img-responsive center-block" /></p>
					<p>Save the file to your &quot;Desktop&quot; or another folder you can easily find.</p>
					<p>Once you have downloaded the file, go to your desktop or the folder you saved it to and double click the file to open it.</p>
				</div>
			</div>

			<div class="margin-tb-20 text-center">
				<h2 class="darkRed">Customer Service Contact Info</h2>

				<p>If you have a problem or question feel free to call 1-800-728-0008<br> or email us at
					<script type="text/javascript">
						emailE=('help@' + 'food4patriots.com')
						document.write(
							'<A href="mailto:' + emailE + '">'
							+ emailE + '</a>'
						)
					</script></p>
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