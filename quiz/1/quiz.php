<style>
	p{
		font-size: 15pt;
	}
</style>
<?php
//include template top AFTER the product information is set
$quizName = "Government Survival Quiz";
include_once ('template-top.php');
?>
<?php include_once ('template-header.php'); /*Add template-header-nav.php to add top menu*/?>
<div class="container-main">
	<div class="container oto-width">
		<div class="row">
			<div class="col-sm-12 col-md-12">
				<?php
				echo "<h1 style='color:#cc0000; font-weight: bold;' class='quizName'>" . $quizName . "</h1>";
				include_once("quiz-body.phtml");
				?>
			</div>
		</div>
	</div>
	<?php
	include_once("template-bottom.php");
	?>
</div>