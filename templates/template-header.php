<div class="navbar navbar-inverse navbar-static-top">
	<?php if($template["formType"] === "customerForm" && (!isset($template["unclickableCsrModal"]) || !$template["unclickableCsrModal"])) { echo "<div class='hidden-xs' style='float:right; cursor:pointer;'><a href='#csr' onclick='showCsrModal();'><img src='/assets/images/misc/customer-service-rep-01.png' alt='Have Questions? Give Us A Call' class='img-responsive'/></a></div>";} ?>
	<?php if($template["formType"] === "customerForm" && (isset($template["unclickableCsrModal"]) && $template["unclickableCsrModal"] === true)) { echo "<div class='hidden-xs' style='float:right;'><img src='/assets/images/misc/customer-service-rep-01.png' alt='Have Questions? Give Us A Call' class='img-responsive'/></div>";} ?>
	<?php
	if($template["floatingTimer"] > 0) {
		include_once("snippets/timer-box.html");
	}
	?>
	<div class="navbar-header">
		<?php
		$logoLink = array (
			"/checkout/alt/f4p-discount-offer.php",
			"/checkout/alt/f4p-free-food-offer.php",
		);

		if(substr_count($_SERVER["PHP_SELF"],"/") == 1) {
			$logoImage = "<a href='/index.php'>";
			$logoImage.= "<img src='/assets/images/logo-small.png' width='384' height='103' alt='power4patriots' class='img-responsive'/>";
			$logoImage.= "</a>";
		}
		elseif(in_array($_SERVER["PHP_SELF"], $logoLink)) {
			$logoImage = "<a href='/index.php'>";
			$logoImage.= "<img src='/assets/images/logo-small.png' width='384' height='103' alt='power4patriots' class='img-responsive'/>";
			$logoImage.= "</a>";
		}
		else {
			$logoImage = "<img src='/assets/images/logo-small.png' width='384' height='103' alt='power4patriots' class='img-responsive'/>";
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
			<?php
			if($productId = 17) {
				echo("<div id=\"phone-txt\"><span class=\"glyphicon glyphicon-earphone\"></span> Phone: 1-800-598-5012</div>
				<div id=\"phone-button\"><button type=\"button\" class=\"btn btn-primary\"><a href=\"tel:1-800-598-5012\"><span class=\"glyphicon glyphicon-earphone\"></span> Phone: 1-800-598-5012</a></button></div>");
			}
			else {
				echo("<div id=\"phone-txt\"><span class=\"glyphicon glyphicon-earphone\"></span> Phone: 1-800-728-0008</div>
				<div id=\"phone-button\"><button type=\"button\" class=\"btn btn-primary\"><a href=\"tel:1-800-728-0008\"><span class=\"glyphicon glyphicon-earphone\"></span> Phone: 1-800-728-0008</a></button></div>");
			}  ?>
		</div>
	</div>
</div><!-- /navbar phone -->
