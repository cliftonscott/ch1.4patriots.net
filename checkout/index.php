<?php
/*
 * use session soldout multidimensional array to indicate sold out conditions and associated
 * variables
 */
$_SESSION["soldout"]["flag"] = false; //this is the primary trigger
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
		
	<!--START CHOOSE PRODUCT ACCORDIAN-->      
      <div class="row">
        <div class="col-lg-12">
          <div class="panel-group" id="accordion">
              <div class="panel panel-default">
                <a data-toggle="collapse" data-parent="#accordion" href="#chooseProductOne">
                <div class="panel-heading">
                  <h4 class="panel-title">       
                      72 Hour Food Supply - $27 <span class="gray13">($11/day)</span>
                  </h4>
                </div>
                </a>
                <div id="chooseProductOne" class="panel-collapse collapse">
                  <div class="panel-body">
                  	<img src="/media/images/f4p/f4p-72-hour-kit-01.jpg" class="img-responsive center-block">
                  </div>
                </div>
              </div>
              <div class="panel panel-default">
                <a data-toggle="collapse" data-parent="#accordion" href="#chooseProductTwo">
                <div class="panel-heading">
                  <h4 class="panel-title">       
                      4 Week Food Supply - $197 <span class="gray13">($7/day)</span>
                  </h4>
                </div>
                </a>
                <div id="chooseProductTwo" class="panel-collapse collapse">
                  <div class="panel-body">
                    <img src="/media/images/f4p/f4p-4-week-kit-03.jpg" class="img-responsive center-block">
                    
                  </div>
                </div>
              </div>
              <div class="panel panel-default">
                <a data-toggle="collapse" data-parent="#accordion" href="#chooseProductThree">
                <div class="panel-heading">
                  <h4 class="panel-title">             
                      3 Month Food Supply - $497 <span class="gray13">($5/day)</span>
                  </h4>
                </div>
                </a>
                <div id="chooseProductThree" class="panel-collapse collapse in">
                  <div class="panel-body">
                    <img src="/media/images/f4p/f4p-3-month-kit-03.jpg" class="img-responsive center-block">
                    <img class="img-responsive center-block" src="/assets/images/checkout/wounded-warrior-01.jpg" alt=""/>
                  </div>
                </div>
              </div>
            </div>
        </div>
      </div> <!--END CHOOSE PRODUCT ACCORDIAN-->

	</div>

	<div class="col-sm-6 col-md-5 nopadding">
    	<div class="container">
        	<div class="row">
        		<div class="col-lg-12">
					<?php include_once ('customer-form.php'); ?>
        		</div>
            </div>
            <div class="row">
            	<div class="col-lg-12">
                	<div class="center-block" style="width: 360px; min-height: 156px; background-image: url(/assets/images/checkout/glen-beck-testimonial-01.png); background-repeat: no-repeat;">
                	<audio id="beckCheckoutAudioSrc" src="/media/audio/f4p-beck-testimonial-01.mp3" preload="auto"></audio>
					<img id="beckCheckoutAudioControl" class="audioControl" style="float:right; margin-right: 30px;
margin-top: 109px;" src="/assets/images/misc/speaker_off.gif" onclick="toggleAudio('beckCheckout');">
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
            <p><img src="/assets/images/checkout/satisfaction-seal-02.png" alt="Frank" width="150" height="180" class="img-responsive pull-left"><strong><span class="brightBlue">Guarantee #1:</span></strong> This is a <strong>100% money back guarantee</strong>. No questions asked. If for any reason, you&rsquo;re not satisfied with your Food4Patriots kit, just return it within 60 days of purchase and I&rsquo;ll refund 100% of your purchase.            </p>
            <p>&nbsp;</p>
            <p><strong><span class="brightBlue">Guarantee #2:&nbsp;</span></strong>This is an unheard of 300% money back guarantee. It&rsquo;s in addition to guarantee #1.&nbsp;If you open any of your Food4Patriots meals anytime&nbsp;<strong>in the next 25 years</strong>&nbsp;and find that your food has spoiled, you can return your entire Food4Patriots stockpile and I will&nbsp;<strong>triple</strong>&nbsp;your money back!</p>       
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
