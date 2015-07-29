<?php
//include template top AFTER the product information is set
include_once ('template-top.php');
?>
<?php include_once ('template-header.php'); /*Add template-header-nav.php to add top menu*/?>
	<div class="container-main">

		<div class="container" id="quiz-container">

			<div class="row">
				<div class="col-sm-12 col-md-12">
					<h1>Bacon Ipsum</h1>
					<p>Bacon ipsum dolor amet magna pariatur sunt, commodo non est kevin hamburger ea flank jerky meatball officia. Fatback ham hock doner corned beef occaecat jowl shank id short ribs cow. Venison pariatur prosciutto mollit. Ut short loin id, dolor shank veniam sirloin tongue sausage brisket bresaola andouille kielbasa sed short ribs. Dolor kielbasa prosciutto, eiusmod reprehenderit tongue pig do t-bone turducken irure bresaola incididunt.</p>

					<p>Swine bresaola non, shank ball tip chicken t-bone laboris. Cupidatat do capicola velit reprehenderit sint est alcatra pastrami sirloin adipisicing short loin. Doner tail in qui spare ribs est laboris swine beef ribs venison kielbasa ex. Deserunt ut sint tri-tip eiusmod ea bacon tongue sirloin turducken in chuck exercitation jowl quis.</p>
<?php include_once("quiz-body.phtml");?>
				</div>

			</div>




		</div>

<?php
include_once("template-bottom.php");
?>