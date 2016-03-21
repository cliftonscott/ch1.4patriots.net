<?php
$targetNewArray = array (
	"/video/index.php",
	"/checkout/index.php",
	"/letter/index.php",
	"/letter/food/index.php",
	"/checkout/thankyou.php",
	"/checkout/freefood/alt/f4p-free-food-offer.php",
	"/checkout/freefood/index.php",

	);
if(in_array($_SERVER["PHP_SELF"], $targetNewArray)) {
	$footerLinkTarget = "_blank";
} else {
	$footerLinkTarget = "_self";
}
?>
<div>
	<a href="<?php echo url('/privacy.php'); ?>" class="bottomlinks" target="<?php echo $footerLinkTarget;?>">Privacy Policy</a> |
	<a href="<?php echo url('/terms.php'); ?>" class="bottomlinks" target="<?php echo $footerLinkTarget;?>">Terms &amp; Conditions</a> |
	<a href="<?php echo url('/disclaimer.php'); ?>" class="bottomlinks" target="<?php echo $footerLinkTarget;?>">Disclaimer</a> |
	<a href="<?php echo url('/returns.php'); ?>" class="bottomlinks" target="<?php echo $footerLinkTarget;?>">Returns</a> |
	<a href="<?php echo url('/faq.php'); ?>" class="bottomlinks" target="<?php echo $footerLinkTarget;?>">FAQ</a> |
	<a href="<?php echo url('/newsroom.php'); ?>" class="bottomlinks" target="<?php echo $footerLinkTarget;?>">Newsroom</a>  |
	<a href="<?php echo url('/testimonials.php'); ?>" class="bottomlinks" target="<?php echo $footerLinkTarget;?>">Testimonials</a> |
	<a href="<?php echo url('/contact.php'); ?>" class="bottomlinks" target="<?php echo $footerLinkTarget;?>">Contact Us</a>
</div>