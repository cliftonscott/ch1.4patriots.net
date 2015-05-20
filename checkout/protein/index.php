<?php
/*
 * use session soldout multidimensional array to indicate sold out conditions and associated
 * variables
 */
$template["floatingTimer"] = 0; //minutes to pass to the timer / will not display if not greater than zero
$template["formType"] = "customerForm"; //designates that this is a form using customer-form.php as included form
// SET PRODUCT ID
$_SESSION['productId'] = 230; //please keep as an integer
$_SESSION['quantity'] = 1;
$maxQuantity = 3;
include_once("Product.php");
$productObj = new Product();

$submitButtonSource = "/assets/images/buttons/btn-rush-coffee-01.png";

$productDataObj = $productObj->getProduct($_SESSION["productId"]);
$funnelData = $productObj->initFunnel("checkout");

//include template top AFTER the product information is set
include_once ('template-top.php');
$platform->setCsrOrderFormUrl("/checkout/protein/index.php");


?>
<?php include_once ('template-header.php'); /*Add template-header-nav.php to add top menu*/?>


<div class="container-main">

	<div class="container">

		<div class="row">
			<div class="col-sm-6 col-md-7">

				<!--START CHOOSE PRODUCT ACCORDIAN-->
				<div id="checkoutMenu" class="row">
					<div class="col-lg-12">
						<div class="panel-group" id="accordion">
							<div id="initial" class="panel panel-default">
								<a data-toggle="collapse" data-parent="#accordion" href="#chooseProductThree" onclick="switchProduct(19);">
									<div class="panel-heading">
										<h4 class="panel-title">
											<div>Meat & Protein Kit - $197 <span class="label label-primary pull-right hidden-xs hidden-sm"><i class="fa fa-check"></i> FREE SHIPPING!</span></div>
										</h4>
									</div>
								</a>
								<div id="chooseProductThree" class="panel-collapse collapse in">
									<div class="panel-body">
										<a href="#info" onclick="showProductModal3()"><img src="/media/images/f4p/f4p-3-month-kit-03.jpg" class="img-responsive center-block"></a>
										<div class="nopadding">
											<div class="row">
												<div class="col-sm-12 col-md-5 nopadding">
													<div class="productList">
														<p class="text-center red17"><strong>3 Month Supply Includes:</strong></p>
														<ul>
															<li>450 Servings <a href="#info" id="3mkPopover" rel="popover"  data-placement="bottom" data-toggle="tooltip" class="hidden-xs"><i class="fa fa-info-circle"></i></a></li>
															<li><strong>FREE</strong> Shipping</li>
															<li><strong>FREE</strong> Survival Tool <a href="#info" id="toolPopover" rel="popover"  data-placement="bottom" data-toggle="tooltip" class="hidden-xs"><i class="fa fa-info-circle"></i></a></li>
															<li><strong>FREE</strong> Seed Vault <a href="#info" id="seedsPopover" rel="popover"  data-placement="bottom" data-toggle="tooltip" class="hidden-xs"><i class="fa fa-info-circle"></i></a></li>
														</ul>
													</div>
												</div>
												<div class="col-sm-12 col-md-7 nopadding">
													<div class="productList">
														<p class="text-center red17"><strong>FREE Hard Copy Bonus Reports</strong></p>
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
										<img class="img-responsive center-block" src="/assets/images/checkout/wounded-warrior-01.jpg" alt=""/>
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
margin-top: 109px;" src="/assets/images/misc/speaker_off.gif" onclick="toggleAudio('beckCheckout'); stopAudio('frankCheckout');">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-sm-6 col-md-6"><a href="//fast.wistia.net/embed/iframe/yy5q5l29h0?popover=true" class="wistia-popover[height=360,playerColor=7b796a,width=640]"><img class="img-responsive center-block" src="/media/images/f4p/f4p-testimonials-11.jpg" /></a>
				<script charset="ISO-8859-1" src="//fast.wistia.com/assets/external/popover-v1.js"></script></div>
			<div class="col-sm-6 col-md-6"><img class="img-responsive center-block" src="/media/images/f4p/f4p-testimonials-12.jpg" /></div>
		</div>

		<div class="guaranteeBox">
			<p><img src="/assets/images/checkout/satisfaction-seal-02.png" alt="Frank" width="150" height="180" class="img-responsive pull-left"><strong><span class="brightBlue">Guarantee #1:</span></strong> This is a <strong>100% money back guarantee</strong>. No questions asked. If for any reason, you&rsquo;re not satisfied with your Meat & Protein Kit, just return it within 60 days of purchase and I&rsquo;ll refund 100% of your purchase.</p>
			<p>&nbsp;</p>
			<p><strong><span class="brightBlue">Guarantee #2:&nbsp;</span></strong>This is an unheard of 300% money back guarantee. It&rsquo;s in addition to guarantee #1.&nbsp;If you open any of your Meat & Protein Kit meals anytime&nbsp;<strong>in the next 25 years</strong>&nbsp;and find that your food has spoiled, you can return your entire Meat & Protein Kit and I will&nbsp;<strong>triple</strong>&nbsp;your money back!</p>
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
	</script>

	<script>
		function showProductModal() {
			$('#productModal').modal('show');
		}
		function hideProductModal() {
			$('#productModal').modal('hide');
		}
	</script>
	<div id="productModal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="glyphicon glyphicon-remove-circle" style="float:right;cursor:pointer;padding:10px;" onclick="hideProductModal();"></div>
				<img class="img-responsive center-block" src="/media/images/f4p/f4p-1-week-kit-02.jpg">
			</div>
		</div>
	</div>
	<div id="1wk" style="display:none;">
		<?php include_once("f4p-product-info-1wk.html"); ?>
	</div>
<?php
include_once("template-bottom.php");
?>