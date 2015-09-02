<?php
/**
 * Quiz utilities
 * 
 * 
 * @author Brian Gibbins
 * @copyright 2015
 */
class Quiz {
	
	static $appMessagesAry = array();
	static $appErrorsAry = array();

	const QUIZ_TABLE = "quiz";
	const QUIZ_RESULTS_TABLE = "quizResults";

	public function __construct() {

	}

	function saveQuizResults($dataObj) {

		$results = new stdClass();
		$results->errors = array();

		if(empty($dataObj)) {
			self::setError("saveQuiz 'dataObj' must contain an object.");
			$results->errors = "saveQuiz 'dataObj' must contain an object.";
			$results->success = false;
			return $results;
		}

		if(gettype($dataObj) !== "object") {
			self::setError("saveQuiz 'dataObj' must contain an object.");
			$results->errors = "saveQuiz 'dataObj' must contain an object.";
			$results->success = false;
			return $results;
		}

		include_once("Db.php");
		$dbObj = new Db();
		$db = $dbObj->connect();

		$visitorId = session_id();
		$quizId = 1;

		$quizData = $dataObj->quizData;
		foreach($quizData as $q => $a) {

			$sql = "INSERT INTO `" . self::QUIZ_RESULTS_TABLE . "` SET quizId=:quizId, visitorId=:visitorId, question=:question, answer =:answer";
			$insert = $db->prepare($sql);
			$insert->bindParam(':quizId', $quizId, PDO::PARAM_INT);
			$insert->bindParam(':visitorId', $visitorId, PDO::PARAM_STR, 12);
			$insert->bindParam(':question', $q, PDO::PARAM_STR, 12);
			$insert->bindParam(':answer', $a, PDO::PARAM_STR, 12);

			if($insert->execute()) {
				self::setMessage("Inserted into " . self::QUIZ_RESULTS_TABLE . ": " . $quizId);
				$results->success = true;
			} else {
				self::setError("Unable to insert into " . self::QUIZ_RESULTS_TABLE . ".");
				$results->success = false;
			}
		}

		$results->errors = self::getErrors();
		$results->messages = self::getMessages();
		return $results;

	}

	function getNextQuizUrl() {

	}

	function loadQuizData($quizId = 1) {

		$quizData = json_decode(file_get_contents($_SERVER["DOCUMENT_ROOT"] . "/libraries/Quiz/" . $quizId . ".json"),true);
		return $quizData;
	}

	function getQuizData() {

		$quizData = self::loadQuizData(1);
		$pageData = $quizData[basename($_SERVER["PHP_SELF"])];

		return $pageData;
	}


//ERROR AND MESSAGE HANDLING
	function setMessage($msg) {
		$message = array("timestamp" => microtime(), "message" => $msg);
		self::$appMessagesAry[] = $message;
	}
	function getMessages() {
		return self::$appMessagesAry;
	}
	function setError($err) {
		$error = array("timestamp" => microtime(), "error" => $err);
		self::$appErrorsAry[] = $error;
	}
	function getErrors() {
		return self::$appErrorsAry;
	}

}//end of class
