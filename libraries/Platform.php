<?php
/**
 * Platform
 * @see https://wiki4patriots.atlassian.net/wiki/display/DEV/Template+Helpers
 * 
 * 
 * @author Brian Gibbins
 * @copyright 2014
 * @see http://en.wikipedia.org/wiki/PHPDoc
 * @version 2014.07
 */
class Platform {
	
	static $applicationMessages = array();
	static $applicationErrors = array();
	
	const SOME_CONSTANT = "";

	static $documentRoot = null;
	static $defaultCsrButtons = "chat,order"; //comma delimited string
	static $defaultOrderUrl = "/checkout/index.php";
	static $defaultVslUrl = "/video/index.php";
	static $defaultLetterUrl = "/letter/index.php";
	static $defaultTrialUrl = "/checkout/trial.php";

	public function __construct() {

		$this->initializeValues();

		return $this;
		
	}

	function initializeValues() {

		include_once("Analytics.php");
		$analytics = new Analytics();
		$queryString = $analytics->queryString;
		self::$defaultOrderUrl = self::$defaultOrderUrl . $queryString;
		self::$defaultVslUrl = self::$defaultVslUrl . $queryString;
		self::$defaultLetterUrl = self::$defaultLetterUrl . $queryString;
		self::$defaultTrialUrl = self::$defaultTrialUrl . $queryString;

		$documentRoot = $_SERVER["DOCUMENT_ROOT"];
		self::$documentRoot = $documentRoot;

	}

	/*
	 * CSR Modal Methods
	 */
	function renderCsrModal () {

		$template = file_get_contents(self::$documentRoot . "/templates/platform/csr-modal.html");

		$buttonConfig = explode(",", self::$defaultCsrButtons);
		foreach ($buttonConfig as $button) {
			$buttons.= self::generateCsrModalButton($button);
		}
		$modal = str_replace("[[Platform::Buttons]]",$buttons,$template);

		echo $modal;
	}

	function setCsrModalButtons ($config) {
		self::$defaultCsrButtons = $config;
	}

	function generateCsrModalButton ($config = "chat") {

		switch($config) {
			case "chat":
				$button = "<p><a class=\"btn btn-primary\" href=\"javascript: olark('api.box.expand'); hideCsrModal();\">Chat With Us</a></p>";
				break;
			case "video":
				$button = "<p><a class=\"btn btn-success\" href=\"" . self::$defaultVslUrl . "\">Return To Video</a></p>";
				break;
			case "letter":
				$button = "<p><a class=\"btn btn-success\" href=\"" . self::$defaultLetterUrl . "\">Read A Description</a></p>";
				break;
			case "sample":
				$button = "<p><a class=\"btn btn-primary\" href=\"" . self::$defaultTrialUrl . "\">Try A Free Sample</a></p>";
				break;
			case "order":
				$button = "<p><a class=\"btn btn-success\" href=\"" . self::$defaultOrderUrl . "\">Return To Order Form</a></p>";
				break;
		}

		return $button;
	}
	/*
	 * end CSR Modal Methods
	 */

	
//TODO additional error checking
//ERROR AND MESSAGE HANDLING
	function setMessage($msg) {
		$message = array("timestamp" => microtime(true), "message" => $msg);
		$this->appMessagesAry[] = $message;
	}
	function getMessages() {
		return self::$appMessagesAry;
	}
	function setError($err) {
		$error = array("timestamp" => microtime(true), "error" => $err);
		$this->appErrorsAry[] = $error;
	}
	function getErrors() {
		return self::$appErrorsAry;
	}
	
}//end of class

/*
 * 
 */

 
 
