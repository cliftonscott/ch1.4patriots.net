<?php
/*
 * temporary redirect while sold out

header("Location: /checkout/index.php");
exit;
 */

$template["exitPopType"] = "video"; //designates that this should have an exit pop of type video
// SET PRODUCT ID
$_SESSION['productId'] = 162; //please keep as an integer
$_SESSION['quantity'] = 1;
include_once("Product.php");
//creates a product object that is available from every template
$productDataObj = Product::getProduct($_SESSION["productId"]);
//include template top AFTER the product information is set
include_once ('template-top.php');
include_once ('template-header.php'); /*Add template-header-nav.php to add top menu*/
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
				
				}
				else {

			 		var hours = 0;
	                var minutes = 28; 
	                var seconds = 30;
				
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
				
				}
				else {
				
					// If visitor hasn't seen button yet, show default button
 
	                $("#buyButton").oneTime(time, function() {
	 
	                        $("#buyButton").css("display", "block");
	                        
	                        
	                        
	                });
	                
				}

                setTimeout(function(){$.cookie("sawbutton", "1", { expires: 30 });}, 30000);               

		});

</script>
<script> 
if ((navigator.userAgent.indexOf('iPhone') != -1) || (navigator.userAgent.indexOf('iPod') != -1) || (navigator.userAgent.indexOf('iPad') != -1) || (screen.width <= 699)) {

document.location = "<?php echo $productDataObj->mobileLink ?>"; }

</script>
<div class="container-main">
	<div class="container">
    	<div class="row">
			<div class="col-md-12">
            	<div class="center-block text-center">
            	  <h1><strong><span class="darkRed">FREE</span> Video Reveals <span class="darkRed">&quot;Magic Bullet&quot;</span> That Protects You 100% Against Blackouts, Power Failures & The Crumbling Electric Grid</strong></h1></div>
			</div>
            <div class="col-md-12">
                <div id="videobox">
                   <script type="text/javascript" src="https://reboot.evsuite.com/player/UFBHLVZTTDFfNzJoci1GSU5BTF9VbmNvbXByZXNzZWQubXA0/?container=evp-27J515ZOKH"></script><div id="evp-27J515ZOKH" data-role="evp-video" data-evp-id="UFBHLVZTTDFfNzJoci1GSU5BTF9VbmNvbXByZXNzZWQubXA0"></div>
            	</div>               
            <div class="col-md-12">
            	<!-- Button Stuff -->
                <div id="buyButton" class="center-block text-center" style="display:none">
                    <a href="<?php echo $productDataObj->offerLink; ?>" onClick="ga('send', 'event', 'free-video', 'power-generator-vsl-accept', 'click-to-accept');"><img class="img-responsive center-block" src="/assets/images/buttons/btn-orange-add-cart-01.jpg" alt="Order Now!"></a>
                </div>
            </div>
		</div>
	</div>
    <div class="container">
    	<div class="row">
			<div class="col-md-12">
            	<!-- Start of Advertise Pop Up Code -->
				<?php include("snippets/video-references.html");?>
                <!-- End of Advertise Pop Up Code -->
			</div>
            <div class="col-md-12">
                
            </div>
		</div>
	</div>
</div>
<?php
include_once("template-bottom.php");