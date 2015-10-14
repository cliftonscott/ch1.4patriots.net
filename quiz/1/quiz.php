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
<?php if ($_SESSION["variation"] === "2"): ?>
	<style>
		p{
			font-size: 14pt;
		}
		#background-img{
			background: url(/assets/images/video-lander/img-background-police.jpg) no-repeat center center fixed;
			-webkit-background-size: cover;
			-moz-background-size: cover;
			-o-background-size: cover;
			background-size: cover;
		}
		.navbar {
			margin-top: 25px;
			background-color: transparent;
			border-radius: 0px;
			margin-bottom: 0px;
			max-width: 958px;
			margin-right: auto;
			margin-left: auto;
			border: none;
		}

		.navbar-default {
			background-image: none;
			border-bottom-color: transparent;
			border: none;
		}
		.container-main {
			border-radius: 10px;
		}
		h1{
			font-family: 'Oswald', sans-serif;
		}
	</style>
	<link href='https://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'>
<?php endif; ?>
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