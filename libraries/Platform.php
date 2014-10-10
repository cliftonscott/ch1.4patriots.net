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

	public function __construct() {

		$this->initializeValues();

		return $this;
		
	}

	function initializeValues() {

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

	function setCsrModalButton ($config) {

	}

	function generateCsrModalButton ($config = "chat") {

		switch($config) {
			case "chat":
				$button = "<p><button type=\"button\" class=\"btn btn-primary\" onclick=\"olark('api.box.expand'); hideCsrModal();\">Chat With Us</button></p>";
				break;
			case "video":
				break;
			case "letter":
				break;
			case "sample":
				break;
			case "order":
				$button = "<p><button type=\"button\" class=\"btn btn-success\" onclick=\"hideCsrModal();\">Return To Order Form</button></p>";
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

 
 
