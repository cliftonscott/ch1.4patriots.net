<?php
$templateArray = array (
	"fw", // Full Width - NOT ACTIVE
);
if($_GET["t"]) {
	if(in_array(trim($_GET["t"]),$templateArray)) {
		$templateDesign = trim($_GET["t"]);
		$session[''] = $templateDesign;
	}
}
$variantsArray = array (
	"no-logo", // No logos/badges shown at the bottom
	"np-nologo", // No exit pop, and no logos/badges
	"np", // No exit pop
);
if($_GET["v"]) {
	if(in_array(trim($_GET["v"]),$variantsArray)) {
		$variation = trim($_GET["v"]);
	}
}
/*$vslArray = array (
	"variation", // VARIATION NAME
);
if($_GET["vsl"]) {
	if(in_array(trim($_GET["vsl"]),$vslArray)) {
		$vsl = trim($_GET["vsl"]);
	}
}*/
/*$pubArray = array (
	"100" => "fans of Guns & Ammo",
);
if($_GET["pub"]) {
	if(array_key_exists(trim($_GET["pub"]),$pubArray)) {
		$pub = trim($_GET["pub"]);
	}
}*/

if($variation !== "np" & $variation !== "np-nologo") {
	$template["exitPopType"] = "video"; //designates that this should not have an exit pop of type video
}


include_once("Product.php");
$productObj = new Product();

// SET PRODUCT ID
$_SESSION['productId'] = 253; //please keep as an integer
$funnelData = $productObj->initFunnel("OTO1");
$_SESSION['quantity'] = 1;
include_once("Product.php");
//creates a product object that is available from every template
$productDataObj = Product::getProduct($_SESSION["productId"]);
//include template top AFTER the product information is set
include_once ('template-top.php');
include_once ('template-header.php'); /*Add template-header-nav.php to add top menu*/
$offerUrl = "/checkout/app/index.php" . $analyticsObj->queryString;
$declineUrl = "/checkout/1year-firesale/thankyou.php";
?>
	<script>
		if (isMobile()) {
			document.location = "/checkout/1year-firesale/thankyou.php"; }
	</script>
	<script src="/js/audio.js"></script>
	<script src="/js/jquery.timers-1.2.js" type="text/javascript"></script>
	<script src="/js/jcookie.js" type="text/javascript"></script>
	<script>

		// Change these values for the content within the "buttons" div to appear at this time.
		$(document).ready(function(){

			var hours = 0;
			var minutes = 5;
			var seconds = 48;

			<?php
			//Conditionally changes the timer values
			if($_GET["poptimers"] == "false") {
				echo "var hours = 0;\n";
				echo "var minutes = 0;\n";
				echo "var seconds = 0;\n";
			}
			?>
			if ($.cookie("sawbutton")) {
				var hours = 0;
				var minutes = 0;
				var seconds = 5;
			}

			// Start by converting hours to milliseconds
			var time = hours * 60 * 60 * 1000;

			// Add minutes converted to milliseconds and add to total time
			time += minutes * 60 * 1000;
			// Add seconds to total time after converting to milliseconds
			time += seconds * 1000;

			setTimeout(function() {
				$("#buyButton").css("display", "block");
				$("#buyButton2").css("display", "block");
			}, time);

			//sets a cookie once the user has seen the button once
			setTimeout(function(){$.cookie("sawbutton", "1", { expires: 30 });}, 30000);
		});

	</script>
	<script>
		function showProductModal() {
			$('#productModal').modal('show');
		}
		function hideProductModal() {
			$('#productModal').modal('hide');
		}
	</script>
	<style>
		button[type=button]{
			width:100%;
			border:none;
			background-color:#818181;
			color:#ffffff;
			font-family: 'droid-serif', Georgia, Times, 'Times New Roman', serif;
			font-size: 1.25em;
			line-height: 1.3em;
			padding:0.55em 20px 0.5em;
			cursor:pointer;
		}

		button[type=button]:hover{
			background-color:#db4d4d;
			-webkit-tap-highlight-color: rgba(0,0,0,0);
		}

		/* Button 1 */
		.btn-1 {
			background:#FADC57 url("/assets/images/buttons/btn-pattern-choose-kit-01-01.svg") no-repeat right top;
			-webkit-background-size: cover;
			-moz-background-size: cover;
			-o-background-size: cover;
			background-size: cover;
			-webkit-border-radius: 9;
			-moz-border-radius: 9;
			border-radius: 9px;
			-webkit-box-shadow: 0px 3px 8px #666666;
			-moz-box-shadow: 0px 3px 8px #666666;
			box-shadow: 0px 3px 8px #666666;
			font-family: Arial;
			color: #002287;
			font-size: 45px;
			padding: 20px 40px 20px 40px;
			border: solid #ff0000 3px;
			text-decoration: none;
			width:600px;
			margin:15px 0px 10px 0px;
		}
		.btn-1:hover {
			background: #F69725 url("/assets/images/buttons/btn-pattern-choose-kit-01-02.svg") no-repeat right top;
			-webkit-background-size: cover;
			-moz-background-size: cover;
			-o-background-size: cover;
			background-size: cover;
			-webkit-tap-highlight-color: rgba(0,0,0,0);
			cursor:pointer;
		}
		@media screen and (max-width: 550px) {
			.btn-1 {
				width:450px;
			}
		}
	</style>
	<!--INCLUDE CONTENT - ADD IF STATEMENT TO SWITCH CONTENT -->
	<div class="container-main">
		<div class="container">


			<div class="row">
				<div class="col-md-12">
					<div class="center-block text-center">
						<h1><strong>Breakthrough NEW Device Instantly <br class="hidden-xs">Transforms Deadly Contaminated Water Into Clean, 100% Safe Delicious Water </strong></h1>
					</div>
				</div>
				<div class="clearfix"></div>
				<!-- Button Stuff -->
				<div id="buyButton" class="center-block text-center" style="display:none;padding-bottom:10px;">
					<a href="/checkout/process.php"><button type="button-1" class="btn-1"><strong>Yes, I Want Pure Water!</strong></button></a><br>
				</div>
				<div class="col-md-12">
					<div id="videobox">
						<div class="wistia_responsive_padding" style="padding:56.25% 0 0 0;position:relative;"><div class="wistia_responsive_wrapper" style="height:100%;left:0;position:absolute;top:0;width:100%;"><iframe src="//fast.wistia.net/embed/iframe/pxdv021fpu?videoFoam=true" allowtransparency="true" frameborder="0" scrolling="no" class="wistia_embed" name="wistia_embed" allowfullscreen mozallowfullscreen webkitallowfullscreen oallowfullscreen msallowfullscreen width="100%" height="100%"></iframe></div></div>
						<script src="//fast.wistia.net/assets/external/E-v1.js" async></script>
						<script>
							function wistiaPlay() {
								window._wq = window._wq || [];
								_wq.push({ "pxdv021fpu": function(video) {
									video.play();
								}});
							}
							function wistiaPause() {
								window._wq = window._wq || [];
								_wq.push({ "pxdv021fpu": function(video) {
									video.pause();
								}});
							}
						</script>
					</div>
					<div class="col-md-12">
						<!-- Button Stuff -->
						<div id="buyButton2" class="center-block text-center" style="display:none;padding-bottom:10px;">
							<a href="/order/<?php echo $productDataObj->productId;?>"><button type="button-1" class="btn-1"><strong>Yes, I Want Pure Water!</strong></button></a><br>
						</div>

					</div>
				</div>
			</div>
			<div class="container">
				<?php include("snippets/as-seen-on-tv.phtml"); ?>
				<div style="text-align: center; font-size:16px;margin-bottom:10px;"><a href="#img" class="exit-safe" onclick="showProductModal();wistiaPause();"> *Click Here For The Complete Lab Tests.</a></div>
			</div>
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div style="color: #767676; font-style: normal; margin-bottom:0;">
							<p style="margin-bottom:0;">Research References</p>
							<p style="font-size: 12px;margin-top:0;">
								1.	Carlton. <em>Fox News.</em> "Could your water be unsafe to drink?" 2015.<br>
								2.	Baumgartner. <em>ABC News.</em> "Study: Bottled Water No Safer Than Tap Water." 2015.<br>
								3.	Gleick. <em>CBS News.</em> "Bottled Water: 10 Shockers 'They' Don't Want You to Know." 2015.<br>
								4.	Larimer. <em>The Washington Post.</em> "Toledo Mayor Lifts Ban, Declares Drinking Water Safe." 2014.<br>
								5.	Stewart. <em>CBS News.</em> "Toledo, Ohio, Lifts Ban on Drinking Water." 2014.<br>
								6.	Fitzsimmons. <em>The New York Times.</em> "Tap Water Ban for Toledo Residents." 2014.<br>
								7.	West. <em>About News.</em> "Tap Water in 42 States Contaminated by Chemicals." 2015.<br>
								8.	<em>Whiteout Press.</em> "US Water Uses Chinese Fluoride with Heavy Metals." 2014.<br>
								9.	<em>United Nations Environmental, Scientific and Cultural Organization.</em> "UN World Water Development Report 2015: Water for a Sustainable World." 2015.<br>
								10.	<em>Food Safety News.</em> "Niagara Recalls 14 Bottled Water Brands From Same Source for E. Coli Risk." 2015.<br>
								11.	Galimberti. <em>AccuWeather.</em> "Third Louisiana Public Water Supply Site Tests Positive for Brain-Eating Amoeba." 2015.<br>
								12.	Pratt. <em>Chicago Tribune.</em> "Toledo Water Issues Prompt Chicago to Re-Test Lake Water Supply." 2015.<br>
								13.	Donn, Mendoza, Pritchard. <em>Associated Press.</em> Pharmaceuticals Found in Drinking Water, Affecting Wildlife and Maybe Humans." 2015.<br>
								14.	<em>Centers for Disease Control and Prevention.</em> "Community Water Fluoridation." 2015.<br>
								15.	<em>Fox News.</em> "11 States Affected in Bottled Water Recall." 2015.<br>
								16.	Richardson. <em>Newson6 Oklahoma.</em> "Boil Advisory: McAlester Drinking Water Deemed Unsafe." 2015.<br>
								17.	Frankel. <em>The Washington Post.</em> "New NASA Data Show How The World is Running Out of Water." 2015.<br>
								18.	Kilimas.<em> The Blaze.</em> "Navajo Nation Says Relief Water Sent From EPA After Toxic Spill Was Tainted." 2015.<br>
								19.	Street. <em>The Blaze.</em> "Fury Directed at EPA Over Massive Toxic Sludge Spill: 'They Are Not Going to Get Away With This.'" 2015.<br>
								20. <em>Centers for Disease Control and Prevention.</em> "Water Fluoridation Data &amp; Statistics." 2012.<br>
								21. <em>Environmental Working Group.</em> "National Drinking Water Database - Full Report" 2009.
							</p>
						</div>
					</div>
				</div>
			</div>
			<div class="container">
				<div class="noThanks" style="max-width:500px;">
					<a href="<?php echo $declineUrl;?>">No Thanks</a> – I'm sure clean water will be easy to find in a real crisis
				</div>
			</div>
			<div id="productModal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-lg" style="width:960px; height: 700px;">
					<div class="modal-content">
						<div class="glyphicon glyphicon-remove-circle" style="float:right;cursor:pointer;padding:10px;" onclick="hideProductModal();wistiaPlay();"></div>
						<iframe src="/media/images/w4p/app-lab-test-results.pdf#view=FitW" width="100%" height="700px" scrolling="yes"></iframe>
					</div>
				</div>
			</div>

		</div>
	</div>
	<!--INCLUDE CONTENT-->

<?php
include_once("template-bottom.php");