<?php

if (!isset($_SERVER['HTTPS']) || !$_SERVER['HTTPS']) {
	$url = 'https://' . $_SERVER['HTTP_HOST']
		. $_SERVER['REQUEST_URI'];
	header('Location: ' . $url);
	exit;
}

$variantsArray = array (
	"gb", // Glenn Beck
	"no-logo", // No logos/badges shown at the bottom
);
if($_GET["v"]) {
	if(in_array(trim($_GET["v"]),$variantsArray)) {
		$variation = trim($_GET["v"]);
	}
}

$template["exitPopType"] = null; //designates that this should have an exit pop of type video

// SET PRODUCT ID
$_SESSION['productId'] = 162; //please keep as an integer
$_SESSION['quantity'] = 1;
include_once("Product.php");
//creates a product object that is available from every template
$productDataObj = Product::getProduct($_SESSION["productId"]);
//include template top AFTER the product information is set
include_once ('template-top.php');
include_once ('template-header.php'); /*Add template-header-nav.php to add top menu*/
$offerUrl = "https://secure.food4patriots.com/checkout/t1/index.php" . $analyticsObj->queryString;
$platform->setCsrModalButtons("sample,video,letter");
?>

<script src="/js/jquery.timers-1.2.js" type="text/javascript"></script>
<script src="/js/jcookie.js" type="text/javascript"></script>
<script>
// Change these values for the content within the "buttons" div to appear at this time.
 
		$(document).ready(function(){

				if ($.cookie("sawbutton")) {
					var hours = 0;
					var minutes = 0;
					var seconds = 5;
				} else {
					var hours = 0;
					var minutes = 27;
					var seconds = 51;
				}

				// Start by converting hours to milliseconds
				var time = hours * 60 * 60 * 1000;
				// Add minutes converted to milliseconds and add to total time
				time += minutes * 60 * 1000;
				// Add seconds to total time after converting to milliseconds
				time += seconds * 1000;

				if ($.cookie("sawbutton")) {
					// If return visitor that saw button, show alt button
					$("#buyButton").oneTime(time, function() {
						$("#buyButton").css("display", "block");
					});
				} else {
					// If visitor hasn't seen button yet, show default button
					$("#buyButton").oneTime(time, function() {
						$("#buyButton").css("display", "block");
					});
				}
				setTimeout(function(){$.cookie("sawbutton", "1", { expires: 30 });}, 30000);
		});

</script>

<div class="container subheader" onclick="showProductModal()"></div>
<div class="container-main">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="center-block text-center">
					<?php
					if($variation == "gb") {
						echo "<div style='font-size:18pt;'>Special presentation for fans of Glenn Beck and TheBlaze...</div>";
					}
					?>
					<h1><strong>I Couldn't Believe FEMA Tried This!<br>
					(Then He Showed Me Proof</strong>)</h1></div>
			</div>
			<div class="col-md-12">
				<div id="videobox">
					<script type="text/javascript" src="https://reboot.evsuite.com/player/RjRQLTIuMy1PZmZlci02NDB4MzYwLXNob3J0LTAyLW9wdGltaXplZC02NyBWRVJTSU9OIENPTVBSRVNTRUQubXA0/?container=evp-V1F6ED7E7K"></script><div id="evp-V1F6ED7E7K" data-role="evp-video" data-evp-id="RjRQLTIuMy1PZmZlci02NDB4MzYwLXNob3J0LTAyLW9wdGltaXplZC02NyBWRVJTSU9OIENPTVBSRVNTRUQubXA0"></div>
				</div>
			<div class="col-md-12">
				<!-- Button Stuff -->
				<div id="buyButton" class="center-block text-center" style="display:none">
					<a href="<?php echo $offerUrl; ?>"><img class="img-responsive center-block" src="/assets/images/buttons/btn-orange-choose-kit-01.jpg" alt="Order Now!"></a>
				</div>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<!-- Start of Advertise Pop Up Code -->
				<?php
				if($variation !== "no-logo" && $variation !== "np-nologo") {
					include("snippets/as-seen-on-tv.html");
				}
				?>
				<!-- End of Advertise Pop Up Code -->
				<!-- Start References -->
				<?php include("snippets/video-references.html");?>
				<!-- End References -->
			</div>
		</div>
	</div>
</div>
<!-- Header Food Images -->
<div id="productModal" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-sm" style="width: 417px;">
		<div class="modal-content">
			<div class="glyphicon glyphicon-remove-circle" style="float:right;cursor:pointer;padding:10px;z-index:1001;" onclick="hideProductModal();"></div>
			<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
				<!-- Wrapper for slides -->
				<div class="carousel-inner">
					<div class="item active">
					<img src="/media/images/f4p/food/f4p-header-almond-coconut-granola.jpg" alt="Patriot Power Generator">
					<div class="carousel-caption"></div>
				</div>
				<div class="item">
					<img src="/media/images/f4p/food/f4p-header-white-cheddar-shells.jpg" alt="Patriot Power Deluxe">
					<div class="carousel-caption"></div>
				</div>
				<div class="item">
					<img src="/media/images/f4p/food/f4p-header-cheesy-chicken-rice-casserole.jpg" alt="Patriot Power Accesories">
					<div class="carousel-caption"></div>
				</div>
				<div class="item">
					<img src="/media/images/f4p/food/f4p-header-chili-and-dumplings.jpg" alt="Patriot Power Accesories">
					<div class="carousel-caption"></div>
				</div>
				</div>
				<!-- Controls -->
				<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
				<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
			</div>
		</div>
	</div>
</div>
<script>
	function showProductModal() {
		$('#productModal').modal('show');
	}
	function hideProductModal() {
		$('#productModal').modal('hide');
	}
	$(document).ready(function(){
		$('#mcarousel-example-generic').carousel({
			interval: 5000
		})
	});
</script>

<?php
include_once("template-bottom.php");