<?php
if(!empty($template["formType"])) {
	include("security-seals.php");
}
?>
</div>
<?php
	if($template["floatingTimer"] > 0) {
		include_once("snippets/timer-box.html");
	}
?>
<?php
?>
<!-- /main-container -->
<?php include_once('footer.php'); ?>
<?php include_once("chat-olark.php");?>
<script>
window.onbeforeunload = grayOut;
function grayOut(){
var ldiv = document.getElementById('LoadingDiv');
ldiv.style.display='block';
}
</script>
	</body>
</html>
<?php
/*
echo "<pre style='margin:10px;background-color:white;'>";
echo "<h3>---Disregard Debugging Stuff---</h3>";
echo "<h4>Product Data:</h4>";
var_dump($productDataObj);

echo "<h4>Customer Data (if form already submitted):</h4>";
var_dump($customerDataObj);
echo "<h4>Pre-fill Customer Data (if form already submitted):</h4>";
var_dump($preFill);
var_dump(substr_count($_SERVER["PHP_SELF"],"/"));
*/

?>