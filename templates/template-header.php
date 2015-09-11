<div class="navbar navbar-inverse navbar-static-top">
			<?php if($template["formType"] === "customerForm") { echo "<div class='hidden-xs' style='float:right; cursor:pointer;'><a href='#csr' onclick='showCsrModal();'><img src='/assets/images/misc/customer-service-rep-01.png' alt='Have Questions? Give Us A Call' class='img-responsive'/></a></div>";} ?>
	<?php
	if($template["floatingTimer"] > 0) {
		include_once("snippets/timer-box.html");
	}
	?>
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
		</div>

</div>
</div><!-- /container -->
</div><!-- /navbar wrapper -->
<div class="navbar-phone-contain">
	<div class="container nopadding">
		<div class="navbar-phone">
			<div id="phone-txt"><span class="glyphicon glyphicon-earphone"></span> Phone: 1-800-728-0008</div>
			<div id="phone-button"><button type="button" class="btn btn-primary"><a href="tel:1-800-728-0008"><span class="glyphicon glyphicon-earphone"></span> Phone: 1-800-728-0008</a></button></div>
		</div>
	</div>
</div><!-- /navbar phone -->
