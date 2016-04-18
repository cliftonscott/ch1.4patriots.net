<div class="footer_tag">
	<?php
		if(file_exists($_SERVER["DOCUMENT_ROOT"]."/tag.txt")) {
			$footer_prod = file_get_contents($_SERVER["DOCUMENT_ROOT"]."/tag.txt");
			list($part1, $part2) = explode("_", $footer_prod);
			if(getenv("APP_ENV") === "production") {
				echo($part2);
			}else {
				echo(getenv("APP_ENV")),("-");
				echo($part2 );
			}
		}
	?>
</div>