<?php
/**
 * Plat4orm Class providing database utility classes
 * see wiki documentation https://wiki4patriots.atlassian.net/wiki/display/DEV/Platform4Patriots
 *
 *
 * @author Brian Gibbins
 * @copyright 2014 4Patriots, LLC
 */

class Db {

	static $applicationMessages = array();
	static $applicationErrors = array();

	static $host = "10.178.197.38";
	static $databaseName = "";
	static $username = "janus";
	static $password = "2RNJun5NhSpfr3ED";

	public function __construct() {
		if(getenv("DESIGNATION") === "RB03") {
			self::$databaseName = "plat4ormDEV";
		} else {
			self::$databaseName = "plat4ormPROD";
		}
	}

	public function connect() {

		try {
			$db = new PDO("mysql:host=" . self::$host . ";dbname=" . self::$databaseName, self::$username, self::$password);
			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			return $db;
		} catch (PDOException $e) {
			echo "Error: " . $e->getMessage();
			self::setError("Unable to connect to db server via PDO.");
			return $e;
		}
	}

//ERROR AND MESSAGE HANDLING
	function setMessage($msg) {
		$message = array("timestamp" => microtime(), "message" => $msg);
		self::$applicationMessages[] = $message;
	}
	function getMessages() {
		return self::$applicationMessages;
	}
	function setError($err) {
		$error = array("timestamp" => microtime(), "error" => $err);
		self::$applicationErrors[] = $error;
	}
	function getErrors() {
		return self::$applicationErrors;
	}

}//end of class