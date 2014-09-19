<?php
/*
 * use session soldout multidimensional array to indicate sold out conditions and associated
 * variables
 */
//$_SESSION["soldout"]["flag"] = false; //this is the primary trigger
//$_SESSION["soldout"]["audio"] = null;
//$_SESSION["soldout"]["waitlist"] = false;
//if($_SESSION["soldout"]["flag"] !== true) {
//	$template["floatingTimer"] = 20; //minutes to pass to the timer / will not display if not greater than zero
//} else {
	$template["floatingTimer"] = 0; //minutes to pass to the timer / will not display if not greater than zero
//}


$template["formType"] = "customerForm"; //designates that this is a form using customer-form.php as included form
// SET PRODUCT ID
// THIS IS SET TO THE 3 MONTH KIT FOR DEFAULT
$_SESSION['productId'] = 40; //please keep as an integer
$_SESSION['quantity'] = 1;
include_once("Product.php");
//creates a product object that is available from every template
$productDataObj = Product::getProduct($_SESSION["productId"]);
//include template top AFTER the product information is set
include_once ('template-top.php');
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
					<a data-toggle="collapse" data-parent="#accordion" href="#chooseProductThree">
					<div class="panel-heading">
					<h4 class="panel-title">
						<div>1 Year Food Supply - $1997 <span class="gray13">($2/day)</span></span><span class="label label-primary pull-right hidden-xs hidden-sm"><i class="fa fa-check"></i> FREE SHIPPING!</span></div>
					</h4>
					</div>
					</a>
					<div id="chooseProductThree" class="panel-collapse collapse in">
						<div class="panel-body">
						<img src="/media/images/f4p/f4p-1-year-kit-02.jpg" class="img-responsive center-block">
						<div class="container nopadding">
							<div class="row">    
								<div class="col-sm-12 col-md-5 nopadding">
								  <div class="productList">
									<p class="text-center red17"><strong>1 Year Supply Includes:</strong></p>
									  <ul>
										  <li>1,800 Servings <a href="#info" id="1yrPopover" rel="popover"  data-placement="bottom" data-toggle="tooltip" class="hidden-xs"><i class="fa fa-info-circle"></i></a></li>
										  <li><strong>FREE</strong> Shipping</li>
										  <li><strong>4 FREE</strong> Survival Tools <a href="#info" id="toolPopover" rel="popover"  data-placement="bottom" data-toggle="tooltip" class="hidden-xs"><i class="fa fa-info-circle"></i></a></li>
										  <li><strong>4 FREE</strong> Seed Vaults <a href="#info" id="seedsPopover" rel="popover"  data-placement="bottom" data-toggle="tooltip" class="hidden-xs"><i class="fa fa-info-circle"></i></a></li>
											<li><strong>4 FREE</strong> LifeStraw Filters <a href="#info" id="seedsPopover" rel="popover"  data-placement="bottom" data-toggle="tooltip" class="hidden-xs"><i class="fa fa-info-circle"></i></a></li>
											<li><strong>FREE</strong> Playing Cards</li>
									  </ul>
									</div>
								</div> 
								<div class="col-sm-12 col-md-7 nopadding">
								  <div class="productList">
									<p class="text-center red17"><strong>FREE Hard Copy Bonus Reports</strong></p>
									  <ul>
										  <li>Survival 101: How to Bug Out</li>
											<li>Survive Urban Chaos</li>
										  <li>10 Items Sold Out After Crisis</li>
										  <li>Water Survival Guide</li>
										  <li>How to Cut Your Grocery Bills</li>
										  <li>Survival Garden Guide</li>
									  </ul>
									</div>
								</div>
							</div>
						</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div> <!--END CHOOSE PRODUCT ACCORDIAN-->

	</div>

	<div class="col-sm-6 col-md-5 nopadding">
		<div class="container" style="padding-top: 0px; */">
			<div class="row">
				<div class="col-lg-12">
					<?php include_once ('customer-form.php'); ?>
				</div>
			</div>
		</div>
	</div>
	</div>

	<div class="guaranteeBox">
		<p><img src="/assets/images/checkout/satisfaction-seal-02.png" alt="Frank" width="150" height="180" class="img-responsive pull-left"><strong><span class="brightBlue">Guarantee #1:</span></strong> This is a <strong>100% money back guarantee</strong>. No questions asked. If for any reason, you&rsquo;re not satisfied with your Food4Patriots kit, just return it within 60 days of purchase and I&rsquo;ll refund 100% of your purchase.            </p>
		<p>&nbsp;</p>
		<p><strong><span class="brightBlue">Guarantee #2:&nbsp;</span></strong>This is an unheard of 300% money back guarantee. It&rsquo;s in addition to guarantee #1.&nbsp;If you open any of your Food4Patriots meals anytime&nbsp;<strong>in the next 25 years</strong>&nbsp;and find that your food has spoiled, you can return your entire Food4Patriots stockpile and I will&nbsp;<strong>triple</strong>&nbsp;your money back!</p>       
	<div class="clearfix"></div>
	</div>

	<hr>

</div> 
<script>
$('#initial').find('.panel-heading').addClass("active-panel");
$('#accordion > .panel').on('show.bs.collapse', function (e) {
		$(this).find('.panel-heading').addClass("active-panel");
});
$('#accordion > .panel').on('hide.bs.collapse', function (e) {
		$(this).find('.panel-heading').removeClass('active-panel');
});
	$(document ).ready(function () {
		$("#1yrPopover").popover({
			html:true,
			trigger: 'hover',
			title:"1 Year Kit May Include:",
			content: function() {
				return $('#1yr').html();
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
			content: "<img src=/media/images/ppg/ppg-bonus-tool-01.jpg>"
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
			<img class="img-responsive center-block" src="/media/images/ppg/ppg-product-checkout-02.jpg">
		</div>
	</div>
</div>
<div id="1yr" style="display:none;">
	<?php include_once("f4p-product-info-1yr.html"); ?>
</div>

<?php include_once ('template-bottom.php'); ?>
