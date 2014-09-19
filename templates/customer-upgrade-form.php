<div class="row">
	<div class="col-sm-6 col-md-6">
		<div class="center-block text-center">
			<div>
				<p class="text-success h3">
					<?php echo $productDataObj->metaTitle; ?>
				</p>
				<p>
					<?php echo $productDataObj->metaDescription; ?>
				</p>
				<?php
				if(!empty($productDataObj->defaultImage)) {
					echo "<p><img src='";
					echo $productDataObj->defaultImage;
					echo "' style='width:100%;'></p>\n";
				}
				?>
			</div>
		</div>
	</div>
	<div class="col-sm-6 col-md-6">
		<?php include_once ('customer-form.php'); ?>
	</div>
</div>