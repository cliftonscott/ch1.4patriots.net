<?php
$targetNewArray = array (
	"/video/index.php",
	"/checkout/index.php",
	"/letter/index.php",
	"/checkout/thankyou.php",
	);
if(in_array($_SERVER["PHP_SELF"], $targetNewArray)) {
	$footerLinkTarget = "4Patriots";
} else {
	$footerLinkTarget = "_self";
}
?>
<div>
	<a href="/privacy.php" class="bottomlinks" target="<?php echo $footerLinkTarget;?>">Privacy Policy</a> | 
	<a href="/terms.php" class="bottomlinks" target="<?php echo $footerLinkTarget;?>">Terms &amp; Conditions</a> | 
	<a href="/disclaimer.php" class="bottomlinks" target="<?php echo $footerLinkTarget;?>">Disclaimer</a> | 
	<a href="/returns.php" class="bottomlinks" target="<?php echo $footerLinkTarget;?>">Returns</a> | 
	<a href="/faq.php" class="bottomlinks" target="<?php echo $footerLinkTarget;?>">FAQ</a><!-- |
	<a href="/newsroom.php" class="bottomlinks" target="<?php echo $footerLinkTarget;?>">Newsroom</a> --> | 
	<a href="/testimonials.php" class="bottomlinks" target="<?php echo $footerLinkTarget;?>">Testimonials</a> | 
	<a href="/contact.php" class="bottomlinks" target="<?php echo $footerLinkTarget;?>">Contact Us</a>
</div>