<div class="col-md-12">
	<div class="center-block text-center">
		<?php
					if($variation === "quiz") {
						echo "<h1><strong>Your Quiz Results Show THIS Is The #1<br class='hidden-xs'> Item To Hoard... So Why Is FEMA<br class='hidden-xs'> Trying To Buy It All Up?</strong></h1>";
		} else {
		?>
		<?php
						if($_GET["pub"]) {
							echo "<div style='font-size:18pt;'>Special presentation for ". $pubArray[$pub] ." </div>";
	}elseif($variation == "gb") {
	echo "<div style='font-size:18pt;'>Special presentation for fans of Glenn Beck and TheBlaze...</div>";
	}
	?>
	<?php
						if($vsl === "fs") {
							?>
	<h1><strong>Obama’s Food Stamp “Time Bomb”<br> Is About To Explode</strong></h1>
	<?php
						}elseif($vsl === "3f") {
							?>
	<h1><strong>3 Foods NEVER To Eat<br> In A Crisis</strong></h1>
	<?php
						}else {
							?>
	<h1><strong>Why Was This Video Banned?</strong></h1>
	<?php
						}
					}
					?>
	</div>
</div>