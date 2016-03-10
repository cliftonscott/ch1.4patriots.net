<?php
/*$variantsArray = array (
	"", // VARIATION
);
if($_GET["v"]) {
	if(in_array(trim($_GET["v"]),$variantsArray)) {
		$variation = trim($_GET["v"]);
	}
}*/

$productId = 258; //keep as an integer

$_SESSION["productId"] = $productId; //keep as an integer
if($_GET["upgrade"] == 1 ) {
	$isUpgrade = TRUE;
}
if(($isUpgrade !== TRUE) && (!empty($_SESSION["customerDataArray"]["firstName"]))) {
	$firstName = $_SESSION["customerDataArray"]["firstName"];
	$_SESSION['upsell'] = TRUE; //must stay a boolean
} else {
	$firstName = "Fellow Patriot";
}
include_once("Product.php");
$productObj = new Product();
//creates a product object that is available from every template
$productDataObj = $productObj->getProduct($_SESSION["productId"]);
$funnelData = $productObj->initFunnel("OTO2");

/*
 * Determines the primary and secondary ids to use in the content template
 * where primaryId should be the default
 */
$primaryProductId = 258;
$secondaryProductId = 257;


$declineUrl = url("/checkout/1year-firesale/thankyou.php");
include_once("template-top.php");
include_once('template-header.php'); /*Add template-header-nav.php to add top menu*/
?>

	<style>
		@media only screen and (max-width: 699px) {
			#button {display: block !important;}
		}
	</style>
	<div class="container-main">
		<script src="/js/audio.js"></script>
		<script type="text/javascript">

			// Change these values for the content within the "buttons" div to appear at this time.
			$(document).ready(function(){
				var hours = 0;
				var minutes = 3;
				var seconds = 31;
				<?php
				//Conditionally changes the timer values
				if($_GET["poptimers"] == "false") {
					echo "var hours = 0;\n";
					echo "var minutes = 0;\n";
					echo "var seconds = 0;\n";
				}
				?>
				// Start by converting hours to milliseconds
				var time = hours * 60 * 60 * 1000;

				// Add minutes converted to milliseconds and add to total time
				time += minutes * 60 * 1000;
				// Add seconds to total time after converting to milliseconds
				time += seconds * 1000;

				setTimeout(function() {
					$("#button").css("display", "block");
				}, time);

			});
		</script>
		<div class="breadcrumb1">
			<a>CHECKOUT</a>
			<a class="current">ORDER CUSTOMIZATION</a>
			<a>ORDER CONFIRMATION</a>
		</div>
		<div class="container oto-width">
			<div><h1 class="darkRed text-center">WAIT! Your order isn’t complete.</h1></div>
			<div id="videobox" class="hidden-xs margin-tb-20">
				<iframe src="//fast.wistia.net/embed/iframe/2118lh6r1r?videoFoam=true" allowtransparency="true" frameborder="0" scrolling="no" class="wistia_embed" name="wistia_embed" allowfullscreen mozallowfullscreen webkitallowfullscreen oallowfullscreen msallowfullscreen width="640" height="360"></iframe><script src="//fast.wistia.net/assets/external/E-v1.js"></script>
			</div>
			<div id="button" style="display:none;font-size: 16px;">
				<div class="row margin-b-10"> 
					<div class="col-md-6">
						<h3 class="pop-list-plan" style="margin-bottom:10px;margin-top:43px;"><strong>Get 1 More Filter To<br> Double Your Flow Rate!</strong></h3>
						<div class="pop-list-price-2" style="margin-bottom:15px;">Special One-Time Price!</div>
						<img src="/media/images/w4p/app-pro-single-filter.png" style="margin-left: 135px;margin-bottom: 0;">
						<ul class="fa-ul pop-list-ul" style="margin-left: 0; line-height: 1em;">
							<li><i class="fa fa-check-circle" style="color: #8dc342;"></i><span class="pop-list"><strong>DOUBLE</strong> your already lightening-fast flow rate by using two filters</span></li>
							<li><i class="fa fa-check-circle" style="color: #8dc342;"></i><span class="pop-list">Remove up to 99.9999% of contaminants</span></li>
							<li><i class="fa fa-check-circle" style="color: #8dc342;"></i><span class="pop-list">Filter a total of <strong>10,000 gallons</strong></span></li>
							<li><i class="fa fa-check-circle" style="color: #8dc342;"></i><span class="pop-list">Save $150 off retail price</span></li>
							<li><i class="fa fa-check-circle" style="color: #8dc342;"></i><span class="pop-list">Protect your family’s health now <u>and</u> in a crisis</span></li>
						</ul>
						<div class="pop-list-price"><em><strike>MSRP $250</strike> <span style="color:red;">Only $99.95!</span></em></div>
						<div class="pop-list-price-2" style="margin-bottom:10px;">Free Shipping & Handling</div>
						<div class="pop-list-price-2"><i class="fa fa-check-square-o" style="color: red; font-size: 22px; margin-right: 5px;"></i><span style="letter-spacing: -0.1px;">YES! I want to double my flow rate right now!</span></div>

						<!--// Please use the form below and swap out the submit button as desired //-->
						<form id="apf1" action="/checkout/process.php" method="post">
							<input type="hidden" name="productId" value="<?php echo $secondaryProductId;?>">
							<a href="javascript:{}" onclick="document.getElementById('apf1').submit(); return false;" style="text-decoration:none!important;"><div class="pop-list-button">Add To Order</div></a>
						</form>
						<!--// End Backend Form //-->
						<a href="javascript:{}" onclick="document.getElementById('apf1').submit(); return false;" style="text-decoration:none!important;"><div class="pop-list-free-ship" style="margin-bottom:20px;">Add 1 filter to my order for $99.95</div></a>
					</div>
					<div class="col-md-6" style="background:#ffffe7;border:#eeee91 solid 1px; box-shadow: 0 0 5px 2px #ffffb6;">
						<h3 class="pop-list-plan" style="margin-bottom:10px;"><strong>Get 3 More Filters To<br> Double Your Flow Rate AND<br> Get 2 Backup Filters!</strong></h3>
						<div class="pop-list-price-2" style="line-height: 1.3em;margin-bottom: 15px;"><strong>60% OFF Retail</strong> When You Buy Today!</div>
						<img src="/media/images/w4p/app-pro-three-filters.png" style="margin-left: 20px; margin-bottom: 0;">
						<ul class="fa-ul pop-list-ul" style="margin-left: 0; line-height: 1em;">
							<li><i class="fa fa-check-circle" style="color: #8dc342;"></i><span class="pop-list" style="letter-spacing:-0.79px;"><strong>DOUBLE</strong> your flow rate AND have two backup filters</span></li>
							<li style="margin-top:2px;"><i class="fa fa-check-circle" style="color: #8dc342;"></i><span class="pop-list">Save nearly $500 off retail price <br class="hidden-xs">(it’s like getting one and a half filters for FREE)</span></li>
							<li style="margin-top:2px;"><i class="fa fa-check-circle" style="color: #8dc342;"></i><span class="pop-list">Get the safest, best-tasting water on the planet for pennies per day</span></li>
							<li style="margin-top:2px;"><i class="fa fa-check-circle" style="color: #8dc342;"></i><span class="pop-list">No need to ration filtered water… EVER!</span></li>
						</ul>
						<div class="pop-list-price"><em><strike>MSRP $750</strike> <span style="color:red;">$277 Today Only</span></em></div>
						<div class="pop-list-price-2" style="margin-bottom:10px;">**Best Deal** Free Shipping & Handling</div>
						<div class="pop-list-price-2"><i class="fa fa-check-square-o" style="color: red; font-size: 22px; margin-right: 5px;"></i><span style=" letter-spacing: -0.5px">YES! I want maximum clean water protection!</span></div>

						<!--// Please use the form below and swap out the submit button as desired //-->
						<form id="apf3" action="/checkout/process.php" method="post">
							<input type="hidden" name="productId" value="<?php echo $primaryProductId;?>">
							<a href="javascript:{}" onclick="document.getElementById('apf3').submit(); return false;" style="text-decoration:none!important;"><div class="pop-list-button">Add To Order</div></a>
						</form>
						<!--[if IE]>
						<style type="text/css">
							.pop-list-button {
								width: 300px;
								height: 60px;
								margin: 10px auto;
								background: #8dc342 !important;
								color: white;
								font-size: 27px;
								font-weight: bold;
								text-align: center;
								padding: 10px;
								border-radius: 5px;
								border: 1px solid #328437;
								text-decoration: none;
							}
							.pop-list-button a, {
								color: white;
								text-decoration: none;
							}
							.pop-list-button a:hover {
								text-decoration: none;
							}
							.pop-list-button:hover {
								background: #328437 !important;
								color: rgba(255,255,255,0.8);
								text-decoration: none;
							}
						</style>
						<![endif]-->
						<!--// End Backend Form //-->
						<a href="javascript:{}" onclick="document.getElementById('apf3').submit(); return false;" style="text-decoration:none!important;"><div class="pop-list-free-ship" style="margin-bottom:20px;">Add 3 filters to my order for $277</div></a>
					</div>
				</div>
				<p class="noThanks" style="cursor: pointer;"><a href="<?php echo $declineUrl;?>">No Thanks –</a> I understand the risks associated by <br class="hidden-xs">giving up my chance to double my flow rate and have replacement filters on hand during a crisis.</p>
			</div>

		</div>
	</div>

<?php include_once("template-bottom.php");
