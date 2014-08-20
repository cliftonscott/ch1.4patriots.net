<?php
/*
 * use session soldout multidimensional array to indicate sold out conditions and associated
 * variables
 */
$_SESSION["soldout"]["flag"] = true; //this is the primary trigger
$_SESSION["soldout"]["audio"] = null;
//$_SESSION["soldout"]["waitlist"] = false;
if($_SESSION["soldout"]["flag"] !== true) {
	$template["floatingTimer"] = 20; //minutes to pass to the timer / will not display if not greater than zero
} else {
	$template["floatingTimer"] = 0; //minutes to pass to the timer / will not display if not greater than zero
}


$template["formType"] = "customerForm"; //designates that this is a form using customer-form.php as included form
// SET PRODUCT ID
// THIS IS SET TO THE 3 MONTH KIT FOR DEFAULT
$_SESSION['productId'] = 19; //please keep as an integer
$_SESSION['quantity'] = 1;
include_once("Product.php");
//creates a product object that is available from every template
$productDataObj = Product::getProduct($_SESSION["productId"]);
//include template top AFTER the product information is set
include_once ('template-top.php');
?>
<?php include_once ('template-header.php'); /*Add template-header-nav.php to add top menu*/?> 
<script src="/js/audio.js"></script>

<div class="container-main">

<div class="container">

	<div class="row">
	<div class="col-sm-6 col-md-7">
		<div class="center-block clearfix">
			<?php
			if($_SESSION["soldout"]["flag"] !== true) {
			?>
				<audio id="frankCheckoutAudioSrc" src="/media/audio/f4p-checkout-audio-01.mp3" preload="auto"></audio>
				<img id="frankCheckoutAudioControl" class="audioControl" style="float:left;" src="/assets/images/misc/speaker_off.gif" onclick="toggleAudio('frankCheckout');">
				<div class="audio-message"><span class="hidden-xs">Now Playing:</span> Special Message From Frank</div>
			<?php
			}
			?>
		</div>
	  <div><a href="#info" onclick="showProductModal()"><img src="/media/images/ppg/ppg-product-checkout-01.jpg" class="img-responsive center-block"></a></div>
	  <div class="text-center darkRed" style="margin-bottom:10px;"><strong>Patriot Power Generator 1500 Includes: </strong></div>
	  <div class="row" style="font-size:14px;margin-left:5px">
		<div class="col-md-12">
			<ul style="padding-left: 15px;">
				<li>Patriot Power Generator 1500</li>
				<li>100 Watt Foldable Solar Panel</li>
				<li><strong>FREE SHIPPING</strong></li>
				<li><strong>FREE</strong> 25 Foot Ext Cord <a href="#info" id="extcordPopover" rel="popover"  data-placement="bottom" data-toggle="tooltip" class="hidden-xs"><img src="/assets/images/misc/info.png" width="16" height="16" alt="More Info"></a></li>
				<li><strong>FREE</strong> Bonus Report Top 7 Reasons The Grid Will Fail</li>
				<li><strong>FREE</strong> Bonus Report Blackout Response Guide</li>
				<li><strong>FREE</strong> Bonus Report Your Power Failure Checklist</li>
				<li><strong>FREE</strong> Bonus Report Hidden Dangers of Smart Grids</li>
				<li><strong>FREE</strong> 72 Hour Food Kit <a href="#info" id="72hrPopover" rel="popover"  data-placement="bottom" data-toggle="tooltip" class="hidden-xs"><img src="/assets/images/misc/info.png" width="16" height="16" alt="More Info"></a></li>
				<li><strong>FREE</strong> LifeStraw  Water Filter <a href="#info" id="strawPopover" rel="popover"  data-placement="bottom" data-toggle="tooltip" class="hidden-xs"><img src="/assets/images/misc/info.png" width="16" height="16" alt="More Info"></a></li>
				<li><strong>FREE</strong> Survival Tool <a href="#info" id="toolPopover" rel="popover"  data-placement="bottom" data-toggle="tooltip" class="hidden-xs"><img src="/assets/images/misc/info.png" width="16" height="16" alt="More Info"></a></li>
				<li><strong>FREE</strong> Power Playing Cards <a href="#info" id="cardsPopover" rel="popover"  data-placement="bottom" data-toggle="tooltip" class="hidden-xs"><img src="/assets/images/misc/info.png" width="16" height="16" alt="More Info"></a></li>
			</ul>
		</div>
		<div class="col-md-12" style="margin-top:20px"><img class="img-responsive center-block" src="../assets/images/checkout/wounded-warrior-01.jpg" alt=""/></div>
	  </div>
	</div>

	<div class="col-sm-6 col-md-5">
		<?php include_once ('customer-form.php'); ?>
	</div>
	</div>
  
  <div class="row">      	
        <div class="col-sm-6 col-md-6"><img class="img-responsive center-block" src="/assets/images/checkout/ppg-fb-testimonial-01.jpg" /></div>
		<div class="col-sm-6 col-md-6"><img class="img-responsive center-block" src="/assets/images/checkout/ppg-fb-testimonial-02.jpg" /></div>
	</div>
  
  <div class="guaranteeBox">
            <p><img src="/assets/images/checkout/satisfaction-seal-01.png" alt="Frank" width="150" height="180" class="img-responsive pull-left"><strong><span class="brightBlue">365-Day 100% Money-Back Guarantee:</span></strong> This is a <strong>100% money back guarantee</strong>. No questions asked. If for any reason, you&rsquo;re not satisfied with your Patriot Power Generator, just return it within 365 days of purchase and I&rsquo;ll refund 100% of your purchase.</p>         
  <div class="clearfix"></div>
  </div>
  
  <hr>
  <div><h4 class="darkRed">Frequently Asked Questions:</h4></div>        
  <?php include_once ('snippets/faq-accordian.html'); ?>
   
</div> 
<script>
$(document ).ready(function () {
	$("#extcordPopover").popover({
		html:true,
		trigger: 'hover',
		title:"25 Foot Extension Cord",
		content: "<img src=/media/images/ppg/ppg-bonus-cord-01.jpg>"
		});
	
});
$(document ).ready(function () {
	$("#72hrPopover").popover({
		html:true,
		trigger: 'hover',
		title:"The 72 Hour Kit May Include:",
		content: "<img src=/media/images/ppg/ppg-bonus-72hr-01.jpg>"
		});
	
});
$(document ).ready(function () {
	$("#strawPopover").popover({
		html:true,
		trigger: 'hover',
		title:"LifeStraw Personal Water Filter",
		content: "<img src=/media/images/ppg/ppg-bonus-straw-01.jpg>"
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
	$("#cardsPopover").popover({
		html:true,
		trigger: 'hover',
		title:"Slash Your Power Bill Playing Cards",
		content: "<img src=/media/images/ppg/ppg-bonus-cards-01.jpg>"
		});
	
});
$(document ).ready(function () {
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
</script>
<div id="productModal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="glyphicon glyphicon-remove-circle" style="float:right;cursor:pointer;padding:10px;" onclick="hideProductModal();"></div>
            <img class="img-responsive center-block" src="/media/images/ppg/ppg-product-checkout-02.jpg">
		</div>
	</div>
</div>
<?php include_once ('template-bottom.php'); ?>
