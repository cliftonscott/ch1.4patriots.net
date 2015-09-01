<form class="quiz" action="<?php echo $quizData["nextUrl"];?>" method="post" id="quiz">
	<?php
	echo "<h3>" . $quizData["question"] . "</h3>";
	$quizOptions = $quizData["options"];
	foreach ($quizOptions as $option) {
		foreach($option as $value) {
			echo "<input type='radio' name='answer' value='" . $value . "'>" . $value . "<br>";
		}
	}
	?>
	<a href="#" onclick="nextQ();">test</a>
	<input type="submit" value="<?php echo $quizData["nextUrl"];?>">
	<input type="hidden" name="formType" value="quiz">
</form>
<script>
	function nextQ() {
		$("#quiz").load("one.phtml");
	}
</script>