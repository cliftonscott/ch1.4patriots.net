<?php
$quizName = trim($_POST["quizName"]);
$quizName = filter_var($quizName, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);
foreach ($_POST as $k => $v) {
	if(substr($k,0,8) === "question") {
		$q = filter_var($k, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);
		$a = filter_var($v, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);
		$questions[$q] = $a;
	}
}

$dataObj = new stdClass();
$dataObj->visitorId = session_id();
$dataObj->quizName = $quizName;
$dataObj->quizData = $questions;

include_once("Quiz.php");
$quizObj = new Quiz();
$save = $quizObj->saveQuizResults($dataObj);

header("Location: /video/index.php?v=quiz");
exit;