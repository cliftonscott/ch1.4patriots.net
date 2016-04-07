<?php
$targetNewArray = array (
	"/privacy.php",
	"/terms.php",
	"/disclaimer.php",
	"/returns.php",
	"/faq.php",
	"/newsroom.php",
	"/testimonials.php",
	"/contact.php",
);
if(in_array($_SERVER["PHP_SELF"], $targetNewArray)) {
	$footerLinkTarget = "_self";
} else {
	$footerLinkTarget = "_blank";
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