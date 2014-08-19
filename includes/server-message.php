<?php
if(!empty($_SESSION["errorMessage"])) {
	echo "<div class='error'><p>" . $_SESSION["errorMessage"] . "</p></div>\n";
	echo "<div class='clearfix'></div>\n";
	unset($_SESSION["errorMessage"]);
}
?>