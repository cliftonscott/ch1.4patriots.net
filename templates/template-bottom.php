<?php $platform->renderCsrModal();?>
<?php
if(!empty($template["formType"])) {
	include("security-seals.php");
}
?>
</div> <!--end div from opening file-->
<?php
?>
<!-- /main-container -->
<?php include_once('footer.php'); ?>
<?php
$suppressOlark = array (
	"/video/index.php",
);
if(!in_array($_SERVER["PHP_SELF"], $suppressOlark)) {
	include_once("chat-olark.php");
}
?>
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
<!--
<?php
echo $analyticsObj->serverId;
?>
-->
	</body>
</html>
<?php
//echo "<pre style='margin:10px;background-color:silver;font-size:.65em;'>";
//echo "<h3>---Disregard Debugging Stuff---</h3>";
//echo "<div style='float:left;width:30%;'>";
//echo "<h4>Analytics:</h4>";
//var_dump($analyticsObj);;
//echo "</div>";
?>