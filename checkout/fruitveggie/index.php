<?php
/*
 * use session soldout multidimensional array to indicate sold out conditions and associated
 * variables
 */
$template["floatingTimer"] = 0; //minutes to pass to the timer / will not display if not greater than zero
$template["formType"] = "customerForm"; //designates that this is a form using customer-form.php as included form
// SET PRODUCT ID
$_SESSION['productId'] = 128; //please keep as an integer
$_SESSION['quantity'] = 1;
$maxQuantity = 3;
include_once("Product.php");
$productObj = new Product();


$productDataObj = $productObj->getProduct($_SESSION["productId"]);
$funnelData = $productObj->initFunnel("checkout");

//include template top AFTER the product information is set
include_once ('template-top.php');
$platform->setCsrOrderFormUrl("/checkout/fruitveggie/index.php");


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
												<div>Fruit, Veggie and Snack Mix - $97 <span class="label label-primary pull-right hidden-xs hidden-sm"><i class="fa fa-check"></i> FREE SHIPPING!</span></div>
											</h4>
										</div>
									</a>
									<div id="chooseProductThree" class="panel-collapse collapse in">
										<div class="panel-body">
											<a href="#info" onclick="showProductModal()"><img src="/media/images/f4p/f4p-fvs-kit-tote-01.jpg" class="img-responsive center-block"></a>
											<div class="nopadding">
												<div class="row">
													<div class="col-sm-12 text-center red17"><strong>Fruit, Veggie and Snack Mix Includes:</strong></div>
													<!--<div class="col-sm-12">
														<div class="productList">
															<p class="text-center red17"><strong>Fruit, Veggie and Snack Mix Includes:</strong></p>
															<ul>
																<li>24 servings each of freeze-dried corn and green beans</li>
																<li>16 servings each of freeze-dried strawberries and broccoli</li>
																<li>8 servings each of freeze-dried blueberries, and pineapple</li>
																<li>8 servings of honey-coated banana chips</li>
																<li>And even 10 servings of chocolate pudding for dessert!</li>
															</ul>
														</div>
													</div>-->
													<div class="col-sm-12 col-md-6 nopadding">
														<div class="productList">
															<ul>
																<li>24 Servings of corn</li>
																<li>16 Servings of strawberries</li>
																<li>8 Servings of pineapple</li>
																<li>8 Servings of honey-coated banana chips</li>
															</ul>
														</div>
													</div>
													<div class="col-sm-12 col-md-6 nopadding">
														<div class="productList">
															<ul>
																<li>24 Servings of green beans</li>
																<li>16 Servings of broccoli</li>
																<li>8 Servings of blueberries</li>
																<li>10 Servings of chocolate pudding</li>
															</ul>
														</div>
													</div>
												</div>
											</div>
											<!--<img class="img-responsive center-block" src="/assets/images/checkout/wounded-warrior-01.jpg" alt=""/>-->
										</div>
									</div>
								</div>
							</div>
						</div>
					</div> <!--END CHOOSE PRODUCT ACCORDIAN-->
					<img class="img-responsive center-block" src="/media/images/f4p/f4p-testimonials-24.jpg" />

				</div>

				<div class="col-sm-6 col-md-5">
					<div>
						<div class="row">
							<div class="col-lg-12">
								<?php include_once ('customer-form.php'); ?>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-12 hidden-xs" style="margin-top: 45px;">
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
				<div class="col-md-12">
					<img src="/media/images/misc/img-charitybanner-880x200.jpg" class="img-responsive" style="padding-top: 5px">
				</div>
			</div>
			<div class="guaranteeBox">
				<p><img src="/assets/images/checkout/satisfaction-seal-02.png" alt="Frank" width="150" height="180" class="img-responsive pull-left"><strong><span class="brightBlue">Guarantee #1:</span></strong> This is a <strong>100% money back guarantee</strong>. No questions asked. If for any reason you’re not satisfied with your Fruit, Veggie and Snack Mix, just return it within 60 days of purchase and I’ll refund 100% of your purchase.</p>
				<p>&nbsp;</p>
				<p><strong><span class="brightBlue">Guarantee #2:&nbsp;</span></strong>This is an unheard of 300% money back guarantee. It’s in addition to guarantee #1. If you open any of your Fruit, Veggie and Snack Mix items anytime <strong>in the next 25 years</strong> and find that your food has spoiled, you can return your entire Fruit, Veggie and Snack Mix and I will <strong>triple</strong> your money back!</p>
				<div class="clearfix"></div>
			</div>

			<hr>
			<div><h4 class="darkRed">Frequently Asked Questions:</h4></div>
			<?php include_once ('snippets/faq-accordian-fruitveggie.html'); ?>

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
					<img class="img-responsive center-block" src="/media/images/f4p/f4p-fvs-mix-details-01.jpg">
				</div>
			</div>
		</div>
<?php
include_once("template-bottom.php");
?>