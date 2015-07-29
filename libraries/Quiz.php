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

	public function __construct() {

	}

	function setQuiz() {

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
