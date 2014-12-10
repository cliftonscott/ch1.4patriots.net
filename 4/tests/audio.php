<?php
$template["formType"] = "customerForm"; //designates that this is a form using customer-form.php as included form
$template["floatingTimer"] = 10; //minutes to pass to the timer / will not display if not greater than zero
// SET PRODUCT ID
$_SESSION['productId'] = 162; //please keep as an integer
$_SESSION['quantity'] = 1;
include_once("product.php");
//creates a product object that is available from every template
$productDataObj = Product::getProduct($_SESSION["productId"]);
//include template top AFTER the product information is set
include_once('template-top.php');
?>
<?php include_once('template-header.php'); /*Add template-header-nav.php to add top menu*/?>
<script src="/js/audio.js"></script>

<div class="container-main">

<div class="container">

  <div class="row">
    <div class="col-sm-6 col-md-7">
		<div class="center-block clearfix">
			<div><xaudio id="frankCheckoutAudioSrc" src="x/media/audio/ppg-checkout-audio-01.mp3" preload="auto" autoplay="autoplay"></xaudio></div>
             <img id="frankCheckoutAudioControl" class="audioControl" style="float:left;" src="/assets/images/misc/speaker_off.gif" onclick="howlerPlay();">
             <img id="frankCheckoutAudioControl" class="audioControl" style="float:left;" src="/assets/images/misc/speaker_off.gif" onclick="howlerStop();">
				<div class="audio-message">Now Playing: Special Message From Frank</div>
				<div style="border:1px solid red;">
					audio test
<script src="/js/howler.min.js"></script>
<script>
var sound = new Howl({
  urls: ['/media/audio/ppg-checkout-audio-01.mp3']
});
function howlerPlay() {
	sound.play();
	document.getElementById("frankCheckoutAudioControl").src = "/assets/images/misc/speaker_on.gif";
}
function howlerStop() {
	sound.stop();
	document.getElementById("frankCheckoutAudioControl").src = "/assets/images/misc/speaker_off.gif";
}

if(isMobile() === true) {
	alert("how is your mobile experience?");
} else {
	alert("stationary");
}
</script>
					
				</div>
		</div>
      <div><a href="javascript:void(0)" onclick="showProductModal()"><img src="/media/images/ppg/ppg-product-checkout-01.jpg" class="img-responsive center-block"></a></div>
      <div class="text-center darkRed" style="margin-bottom:10px;"><strong>Patriot Power Generator 1500 Includes: </strong></div>
      <div class="row" style="font-size:14px;margin-left:5px">      	
        <div class="col-md-6">      	
        	<ul style="padding-left: 15px;">
            	<li>Patriot Power Generator 1500</li>
            	<li>100 Watt Foldable Solar Panel</li>
            	<li><strong>FREE</strong> 25 Foot Ext Cord <a href="javascript:void(0)" id="extcordPopover" rel="popover"  data-placement="bottom" data-toggle="tooltip" class="hidden-xs"><img src="/assets/images/misc/info.png" width="16" height="16" alt="More Info"></a></li>
            	<li><strong>FREE</strong> 72 Hour Food Kit <a href="javascript:void(0)" id="72hrPopover" rel="popover"  data-placement="bottom" data-toggle="tooltip" class="hidden-xs"><img src="/assets/images/misc/info.png" width="16" height="16" alt="More Info"></a></li>
            	<li><strong>FREE</strong> LifeStraw  Water Filter <a href="javascript:void(0)" id="strawPopover" rel="popover"  data-placement="bottom" data-toggle="tooltip" class="hidden-xs"><img src="/assets/images/misc/info.png" width="16" height="16" alt="More Info"></a></li>
            	<li><strong>FREE</strong> Survival Tool <a href="javascript:void(0)" id="toolPopover" rel="popover"  data-placement="bottom" data-toggle="tooltip" class="hidden-xs"><img src="/assets/images/misc/info.png" width="16" height="16" alt="More Info"></a></li>
            	<li><strong>FREE</strong> Power Playing Cards <a href="javascript:void(0)" id="cardsPopover" rel="popover"  data-placement="bottom" data-toggle="tooltip" class="hidden-xs"><img src="/assets/images/misc/info.png" width="16" height="16" alt="More Info"></a></li>
            </ul>
        </div>
        <div class="col-md-6">        
            <div><strong>FREE SHIPPING</strong></div>
            <div><strong>FREE Hard Copy Bonus Reports:</strong></div>
        	<ul style="padding-left: 15px;">
            	<li>Top 7 Reasons The Grid Will Fail</li>
            	<li>Blackout Response Guide</li>
            	<li>Your Power Failure Checklist</li>
            	<li>Hidden Dangers of Smart Grids</li>
            </ul>
        </div>
        <div class="col-md-12" style="margin-top:20px"><img class="img-responsive center-block" src="../assets/images/checkout/wounded-warrior-01.jpg" alt=""/></div>
      </div>
    </div>
    
    <div class="col-sm-6 col-md-5">
    	<?php include_once('customer-form.php'); ?>
    </div>
  </div>
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
<?php include_once('template-bottom.php'); ?>
