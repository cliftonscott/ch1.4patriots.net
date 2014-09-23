<?php
if(!empty($template["formType"])) {
	include("security-seals.php");
}
?>
</div> <!--end div from opening file-->
<?php
	if($template["floatingTimer"] > 0) {
		include_once("snippets/timer-box.html");
	}
?>
<?php
?>
<!-- /main-container -->
<?php include_once('footer.php'); ?>
<script>
window.onbeforeunload = grayOut;
function grayOut(){
var ldiv = document.getElementById('LoadingDiv');
ldiv.style.display='block';
}
</script>
<?php
if($template["exitPopType"] == "vwo") {
	include_once ('exit-pop-vwo.php');
} //designates that this should have an exit pop of type video
?>
	</body>
</html>
<?php
/*echo "<pre style='margin:10px;background-color:silver;font-size:.65em;'>";
echo "<h3>---Disregard Debugging Stuff---</h3>";
echo "<div style='float:left;width:30%;'>";
echo "<h4>Analytics Data:</h4>";
var_dump($analyticsObj);
echo "</div>";
echo "<div style='float:left;width:30%;'>";
echo "<h4>Product Data:</h4>";
var_dump($productDataObj);
echo "</div>";
echo "<div style='float:left;width:30%;'>";
echo "<h4>Customer Data (if form already submitted):</h4>";
var_dump($customerDataObj);
echo "<h4>Pre-fill Customer Data (if form already submitted):</h4>";
var_dump($preFill);
echo "</div>";
*/?>