<?php
$targetNewArray = array (
	"/video/index.php",
	"/checkout/index.php",
	"/letter/index.php",
	"/letter/food/index.php",
	"/checkout/thankyou.php",
	"/video/t1/index.php",
	"/checkout/t1/index.php",
	"/checkout/t1/thankyou.php",

	);
if(in_array($_SERVER["PHP_SELF"], $targetNewArray)) {
	$footerLinkTarget = "_blank";
} else {
	$footerLinkTarget = "_self";
}
?>
<div>
	<a href="/privacy.php<?php echo $analyticsObj->queryString;?>" class="bottomlinks" target="<?php echo $footerLinkTarget;?>">Privacy Policy</a> |
	<a href="/terms.php<?php echo $analyticsObj->queryString;?>" class="bottomlinks" target="<?php echo $footerLinkTarget;?>">Terms &amp; Conditions</a> |
	<a href="/disclaimer.php<?php echo $analyticsObj->queryString;?>" class="bottomlinks" target="<?php echo $footerLinkTarget;?>">Disclaimer</a> |
	<a href="/returns.php<?php echo $analyticsObj->queryString;?>" class="bottomlinks" target="<?php echo $footerLinkTarget;?>">Returns</a> |
	<a href="/faq.php<?php echo $analyticsObj->queryString;?>" class="bottomlinks" target="<?php echo $footerLinkTarget;?>">FAQ</a> |
	<a href="/newsroom.php<?php echo $analyticsObj->queryString;?>" class="bottomlinks" target="<?php echo $footerLinkTarget;?>">Newsroom</a>  |
	<a href="/testimonials.php<?php echo $analyticsObj->queryString;?>" class="bottomlinks" target="<?php echo $footerLinkTarget;?>">Testimonials</a> |
	<a href="/contact.php<?php echo $analyticsObj->queryString;?>" class="bottomlinks" target="<?php echo $footerLinkTarget;?>">Contact Us</a>
</div>