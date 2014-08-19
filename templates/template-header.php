<div class="navbar navbar-inverse navbar-static-top">
      		<?php if($template["formType"] === "customerForm") { echo "<div class='hidden-xs' style='float:right; cursor:pointer;margin-top: 5px;'><a href='#csr' onclick='showCsrModal();'><img src='/assets/images/misc/customer-service-rep-02.png' alt='Have Questions? Give Us A Call' class='img-responsive'/></a></div>";} ?>
  <div class="navbar-header">
<?php
if(substr_count($_SERVER["PHP_SELF"],"/") == 1) {
	$logoImage = "<a href='/index.php'>";
	$logoImage.= "<img src='/assets/images/logo-small.png' alt='power4patriots' class='img-responsive'/>";
	$logoImage.= "</a>";
} else {
	$logoImage = "<img src='/assets/images/logo-small.png' alt='power4patriots' class='img-responsive'/>";
}
?>
        <div class="navbar-brand"><?php echo $logoImage;?></div>
        </div>
        
</div>
</div><!-- /container -->
</div><!-- /navbar wrapper --> 
<div class="navbar-phone-contain">
	<div class="container nopadding">
    	<div class="navbar-phone">
        	<div id="phone-txt"><span class="glyphicon glyphicon-earphone"></span> Phone: 1-800-680-8504</div>
			<div id="phone-button"><button type="button" class="btn btn-primary"><a href="tel:1-800-680-8504"><span class="glyphicon glyphicon-earphone"></span> Phone: 1-800-680-8504</a></button></div>
		</div>
	</div>
</div><!-- /navbar phone --> 
