<div class="container footer">
	<div>
		<address>
			<strong>Food4Patriots</strong><br>
			4322 Harding Pike Suite 417, PMB 121<br>
			Nashville, TN 37205<br>
			1-800-728-0008
		</address>
	</div>
<?php
if(strpos($_SERVER["PHP_SELF"], "/oto/") === FALSE) {
	include_once("footer-links.php");
}

?>
	<div><br />Copyright &copy; <?php echo date("Y");?> Food4Patriots<strong>&reg;</strong> — All rights reserved.<br /><br /></div>
	<div class="badge-4p">
		<?php if($templateDesign === "wp") { ?>
			<img src="/assets/images/misc/4p-badge-invert.png" width="163" height="50"/>
		<?php }else{ ?>
			<img src="/assets/images/misc/4p-badge.png" width="163" height="50"/>
		<?php }?>

	</div>
</div>
<!-- /footer -->