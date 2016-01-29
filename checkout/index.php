<?php
// SPLIT JV-38 11/20/15 //
// Define the current page name.
$page = "checkout";
// END TEST //

/*
 * use session soldout multidimensional array to indicate sold out conditions and associated
 * variables
 */
unset($_SESSION["Funnel"]);
$_SESSION["soldout"]["flag"] = false; //this is the primary trigger
$_SESSION["soldout"]["audio"] = null;
//$_SESSION["soldout"]["waitlist"] = false;
if($_SESSION["soldout"]["flag"] !== true) {
	$template["floatingTimer"] = 20; //minutes to pass to the timer / will not display if not greater than zero
} else {
	$template["floatingTimer"] = 0; //minutes to pass to the timer / will not display if not greater than zero
}
$maxQuantity = 5;

$template["formType"] = "customerForm"; //designates that this is a form using customer-form.php as included form
// SET PRODUCT ID
// THIS IS SET TO THE 3 MONTH KIT FOR DEFAULT
$_SESSION['productId'] = 19; //please keep as an integer
$_SESSION['quantity'] = 1;
include_once("Product.php");
//creates a product object that is available from every template
$productDataObj = Product::getProduct($_SESSION["productId"]);
//include template top AFTER the product information is set

/*SPLIT JV-38 11/20/15 TEST CALLED - NEEDS REDESIGNED*/
include_once("agile/template-top.php");
/*END TEST*/

include_once ('template-header.php'); /*Add template-header-nav.php to add top menu*/

// SPLIT JV-55 DESKTOP ONLY 1/15/16
if (JV::in("55-month")) {
	include_once('index-jv-55.php');
	exit;
}
?>
<script>
	/*
	 This function works in parallel with the setStateTax() function found in the
	 /templates/customer-form.php file
	 by changing the productId on the form, and then triggering setStateTax()
	 the form is recalculated based on an ajax call using the new productId
	 */
	function switchProduct(productId) {
		document.getElementById("productId").value = productId;
		setStateTax();
	}
</script>
<div class="container-main">

	<div class="container">

		<div class="row">
			<div class="col-sm-6 col-md-7">
				<div class="center-block clearfix">
					<?php
					if($_SESSION["soldout"]["flag"] !== true) {
						?>
						<audio id="frankCheckoutAudioSrc" src="/media/audio/f4p-checkout-audio-02-1wk.mp3" preload="auto"></audio>
						<img id="frankCheckoutAudioControl" class="audioControl" style="float:left;" src="/assets/images/misc/speaker_off.gif" width="36" height="36" onclick="toggleAudio('frankCheckout');">
						<div class="audio-message"><span class="hidden-xs">Now Playing:</span> Special Message From Frank</div>
					<?php
					}
					?>
				</div>

				<!--START CHOOSE PRODUCT ACCORDIAN-->
				<div id="checkoutMenu" class="row">
					<div class="col-lg-12">
						<div class="panel-group" id="accordion">
							<div class="panel panel-default">
								<a data-toggle="collapse" data-parent="#accordion" href="#chooseProductOne" onclick="switchProduct(92);">
									<div class="panel-heading">
										<h4 class="panel-title">
											<div>1 Week Food Supply - $67 <span class="gray13">($10/day)</span></div>
										</h4>
									</div>
								</a>
								<div id="chooseProductOne" class="panel-collapse collapse">
									<div class="panel-body">
										<a href="#info" onclick="showProductModal()"><img src="/media/images/f4p/f4p-1-week-kit-01.jpg" width="530" height="356" class="img-responsive center-block"></a>
										<div class="productList">
											<p class="text-center red17"><strong>1 Week Food Supply Includes:</strong></p>
											<ul>
												<li>36 Servings <a href="#info" id="1wkPopover" rel="popover" data-placement="bottom" data-toggle="tooltip" class="hidden-xs"><i class="fa fa-info-circle"></i></a></li>
												<li>10 Items Sold Out After Crisis Report</li>
												<li>Water Survival Guide Report</li>
												<li>How to Cut Your Grocery Bills Report</li>
												<li>Survival Garden Guide Report</li>
											</ul>
										</div>
									</div>
								</div>
							</div>
							<div class="panel panel-default">
								<a data-toggle="collapse" data-parent="#accordion" href="#chooseProductTwo" onclick="switchProduct(18);">
									<div class="panel-heading">
										<h4 class="panel-title">
											<div>4 Week Food Supply - $197 <span class="gray13">($7/day)</span><span class="label label-primary pull-right hidden-xs hidden-sm"><i class="fa fa-check"></i> FREE SHIPPING!</span></div>
										</h4>
									</div>
								</a>
								<div id="chooseProductTwo" class="panel-collapse collapse">
									<div class="panel-body">
										<a href="#info" onclick="showProductModal2()"><img src="/media/images/f4p/f4p-4-week-kit-03.jpg" width="449" height="392" class="img-responsive center-block"></a>
										<div class="productList">
											<p class="text-center red17"><strong>4 Week Food Supply Includes:</strong></p>
											<ul>
												<li>140 Servings <a href="#info" id="4wkPopover" rel="popover" data-placement="bottom" data-toggle="tooltip" class="hidden-xs"><i class="fa fa-info-circle"></i></a></li>
												<li><strong>FREE</strong> Shipping</li>
												<li>10 Items Sold Out After Crisis Report</li>
												<li>Water Survival Guide Report</li>
												<li>How to Cut Your Grocery Bills Report</li>
												<li>Survival Garden Guide Report</li>
											</ul>
										</div>
									</div>
								</div>
							</div>
							<div id="initial" class="panel panel-default">
								<a data-toggle="collapse" data-parent="#accordion" href="#chooseProductThree" onclick="switchProduct(19);">
									<div class="panel-heading">
										<h4 class="panel-title">
											<div>3 Month Food Supply - $497 <span class="gray13">($5/day)</span><span class="label label-primary pull-right hidden-xs hidden-sm"><i class="fa fa-check"></i> FREE SHIPPING!</span></div>
										</h4>
									</div>
								</a>
								<div id="chooseProductThree" class="panel-collapse collapse in">
									<div class="panel-body">
										<a href="#info" onclick="showProductModal3()"><img src="/media/images/f4p/f4p-3-month-kit-03.jpg" width="530" height="491" class="img-responsive center-block"></a>
										<div class="nopadding">
											<div class="row">
												<div class="col-sm-12 col-md-5 nopadding">
													<div class="productList">
														<p class="text-center red17"><strong>3 Month Supply Includes:</strong></p>
														<ul>
															<li>450 Servings <a href="#info" id="3mkPopover" rel="popover" data-placement="bottom" data-toggle="tooltip" class="hidden-xs"><i class="fa fa-info-circle"></i></a></li>
															<li><strong>FREE</strong> Shipping</li>
															<li><strong>FREE</strong> Survival Tool <a href="#info" id="toolPopover" rel="popover" data-placement="bottom" data-toggle="tooltip" class="hidden-xs"><i class="fa fa-info-circle"></i></a></li>
															<li><strong>FREE</strong> Seed Vault <a href="#info" id="seedsPopover" rel="popover" data-placement="bottom" data-toggle="tooltip" class="hidden-xs"><i class="fa fa-info-circle"></i></a></li>
														</ul>
													</div>
												</div>
												<div class="col-sm-12 col-md-7 nopadding">
													<div class="productList">
														<p class="text-center red17"><strong>FREE Digital Bonus Reports</strong></p>
														<ul>
															<li>10 Items Sold Out After Crisis</li>
															<li>Water Survival Guide</li>
															<li>How to Cut Your Grocery Bills</li>
															<li>Survival Garden Guide</li>
														</ul>
													</div>
												</div>
											</div>
										</div>
										<img class="img-responsive center-block" src="/assets/images/checkout/wounded-warrior-01.jpg" width="530" height="118" alt="Wounded Warrior Project"/>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div> <!--END CHOOSE PRODUCT ACCORDIAN-->

			</div>

			<div class="col-sm-6 col-md-5">
				<div>
					<div class="row">
						<div class="col-lg-12">
							<?php include_once ('customer-form.php'); ?>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12 hidden-xs">
							<div class="center-block" style="width: 360px; min-height: 156px; background-image: url(/assets/images/checkout/glen-beck-testimonial-01.png); background-repeat: no-repeat;">
								<audio id="beckCheckoutAudioSrc" src="/media/audio/f4p-beck-testimonial-01.mp3" preload="auto"></audio>
								<img id="beckCheckoutAudioControl" class="audioControl" style="float:right; margin-right: 30px;
margin-top: 109px;" src="/assets/images/misc/speaker_off.gif" width="36" height="36" onclick="toggleAudio('beckCheckout'); stopAudio('frankCheckout');">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-sm-6 col-md-6"><a href="//fast.wistia.net/embed/iframe/yy5q5l29h0?popover=true" class="wistia-popover[height=360,playerColor=7b796a,width=640]"><img class="img-responsive center-block" src="/media/images/f4p/f4p-testimonials-11.jpg" width="448" height="236" alt="Testimonial"/></a>
				<script charset="ISO-8859-1" src="//fast.wistia.com/assets/external/popover-v1.js"></script></div>
			<div class="col-sm-6 col-md-6"><img class="img-responsive center-block" src="/media/images/f4p/f4p-testimonials-12.jpg" width="448" height="236" alt="Testimonial" /></div>
		</div>

		<div class="guaranteeBox">
			<p><img src="/assets/images/checkout/satisfaction-seal-02.png" alt="Frank" width="150" height="180" class="img-responsive pull-left"><strong><span class="brightBlue">Guarantee #1:</span></strong> This is a <strong>100% money back guarantee</strong>. No questions asked. If for any reason, you&rsquo;re not satisfied with your Food4Patriots kit, just return it within 60 days of purchase and I&rsquo;ll refund 100% of your purchase.            </p>
			<p>&nbsp;</p>
			<p><strong><span class="brightBlue">Guarantee #2:&nbsp;</span></strong>This is an unheard of 300% money back guarantee. It&rsquo;s in addition to guarantee #1.&nbsp;If you open any of your Food4Patriots meals anytime&nbsp;<strong>in the next 25 years</strong>&nbsp;and find that your food has spoiled, you can return your entire Food4Patriots stockpile and I will&nbsp;<strong>triple</strong>&nbsp;your money back!</p>
			<div class="clearfix"></div>
		</div>

		<hr>
		<div><h4 class="darkRed">Frequently Asked Questions:</h4></div>
		<?php include_once ('snippets/faq-accordian-1wk.html'); ?>

	</div>
	<script>
		$('#initial').find('.panel-heading').addClass("active-panel");
		$('#accordion > .panel').on('show.bs.collapse', function (e) {
			$(this).find('.panel-heading').addClass("active-panel");
		});
		$('#accordion > .panel').on('hide.bs.collapse', function (e) {
			$(this).find('.panel-heading').removeClass('active-panel');
		});
		$('#accordion .panel-heading').on('click',function(e){
			if($(this).parents('.panel').children('.panel-collapse').hasClass('in')){
				e.stopPropagation();
			}
		});
		$(document ).ready(function () {
			$("#1wkPopover").popover({
				html:true,
				trigger: 'hover',
				title:"1 Week Kit May Include:",
				content: function() {
					return $('#1wk').html();
				},
			});
		});
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
				content: "<img src=/media/images/ppg/ppg-bonus-tool-01.jpg width='300' height='300'>"
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
		$(document).ready(function () {
			if(isMobile() === false) {
				toggleAudio('frankCheckout');
			}
		});
	</script>
	<script>
		function showProductModal() {
			$('#productModal').modal('show');
		}
		function hideProductModal() {
			$('#productModal').modal('hide');
		}
		function showProductModal2() {
			$('#productModal2').modal('show');
		}
		function hideProductModal2() {
			$('#productModal2').modal('hide');
		}
		function showProductModal3() {
			$('#productModal3').modal('show');
		}
		function hideProductModal3() {
			$('#productModal3').modal('hide');
		}
	</script>
	<div id="productModal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="glyphicon glyphicon-remove-circle" style="float:right;cursor:pointer;padding:10px;" onclick="hideProductModal();"></div>
				<img class="img-responsive center-block" src="/media/images/f4p/f4p-1-week-kit-02.jpg" width="800" height="412">
			</div>
		</div>
	</div>
	<div id="productModal2" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="glyphicon glyphicon-remove-circle" style="float:right;cursor:pointer;padding:10px;" onclick="hideProductModal2();"></div>
				<img class="img-responsive center-block" src="/media/images/f4p/f4p-4-week-kit-04.jpg" width="750" height="500">
			</div>
		</div>
	</div>
	<div id="productModal3" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="glyphicon glyphicon-remove-circle" style="float:right;cursor:pointer;padding:10px;" onclick="hideProductModal3();"></div>
				<img class="img-responsive center-block" src="/media/images/f4p/f4p-3-month-kit-04.jpg" width="800" height="614">
			</div>
		</div>
	</div>
	<div id="1wk" style="display:none;">
		<?php include_once("f4p-product-info-1wk.html"); ?>
	</div>
	<div id="4wk" style="display:none;">
		<?php include_once("f4p-product-info-4wk.html"); ?>
	</div>
	<div id="3mk" style="display:none;">
		<?php include_once("f4p-product-info-3mk.html"); ?>
	</div>
	<div id="lsv" style="display:none;">
		<?php include_once("f4p-product-info-seeds-bonus.html"); ?>
	</div>
	<?php include_once ('template-bottom.php'); ?>