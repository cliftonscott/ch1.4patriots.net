<?php
/**
 * Plat4orm Class providing database utility classes
 * see wiki documentation https://wiki4patriots.atlassian.net/wiki/display/DEV/Platform4Patriots
 *
 *
 * @author Brian Gibbins
 * @copyright 2014 4Patriots, LLC
 *
 * @version 1.1.0
 */

class Db {

	static $applicationMessages = array();
	static $applicationErrors = array();

	static $host = "10.178.197.38";
	static $databaseName = null;
	static $username = "janus";
	static $password = "2RNJun5NhSpfr3ED";

	/**
	 * The PDO connection established on behalf
	 * of the current request.
	 *
	 * @see connect()
	 *
	 * @var PDO|null
	 */
	private $pdo;

	/**
	 * Construct this library class for use.
	 */
	public function __construct() {
		if(getenv("APP_ENV") !== "production") {
			self::$databaseName = "plat4ormDEV";
		} else {
			self::$databaseName = "plat4ormPROD";
		}
	}

	/**
	 * Retrieve a PDO connection to the database.
	 *
	 * Can be called as needed without establishing
	 * redundant connections.
	 *
	 * @return PDO|PDOException|Exception
	 */
	public function connect() {

		// Serve the saved connection for the current request
		// if it is available from a previous call to this method.
		if ($this->pdo) {
			return $this->pdo;
		}

		try {
			// Establish a new PDO connection to the database.
			$db = new PDO("mysql:host=" . self::$host . ";dbname=" . self::$databaseName, self::$username, self::$password);
			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			// Save the connection to serve to future connection requests.
			$this->pdo = $db;

			// Return the connection for use.
			return $db;

		} catch (PDOException $e) {
			// Display the connection error for dev and stage environments.
			if (getenv("APP_ENV") !== "production") {
				echo "Error: " . $e->getMessage();
			}

			// Set the error of this library.
			self::setError("Unable to connect to db server via PDO.");

			// Return the PDO exception.
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