<?php include_once("ga-data-layer.php"); ?>

<?php
$suppressOlark = array (
	"/video/index.php",
	"/video/t1/index.php",
	"/quiz/1/index.php",
	"/quiz/1/quiz.php",
);
if(!in_array($_SERVER["PHP_SELF"], $suppressOlark)) {
	include_once("chat-olark.php");
}
?>

</html>
