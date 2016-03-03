<?php
/*
 * This file is automatically included at the beginning of each php request by virtue of the .htaccess file.
 * We can use this file to ensure various settings on the server are to our liking. For example the include path.
 * 
 * The downside is that changing this file can take the site down. So you have to take as much care changing this
 * file as you would say an apache config file or a php.ini file.
 */

// Establish the name of this Platform instance.
// This is used often in Platform libraries and DB tables.
putenv("APP_NAME=F4P");

$host = $_SERVER['HTTP_HOST'];
if (strpos($host, '.4patriots.net') === false) {
	putenv("APP_ENV=production");
	if((!isset($_SERVER['HTTPS']) || !$_SERVER['HTTPS']) && (strpos($_SERVER["PHP_SELF"],"/video/") === FALSE && strpos($_SERVER["PHP_SELF"],"/letter/agile") === FALSE)) {
		header("Location: https://secure.food4patriots.com" . $_SERVER["REQUEST_URI"]);
		exit();
	}
} else if (strpos($host, 'stage.') === 0) {
	putenv("APP_ENV=stage");
} else {
	putenv("APP_ENV=dev");
}
unset($host);
//ini_set("error_reporting", E_ALL);
ini_set("display_errors", FALSE);
const APP_MODE_LOG = FALSE; //options FALSE or DEBUG
$addPath[] = $_SERVER["DOCUMENT_ROOT"] . "/includes";
$addPath[] = $_SERVER["DOCUMENT_ROOT"] . "/templates";
$addPath[] = $_SERVER["DOCUMENT_ROOT"] . "/content";
$addPath[] = $_SERVER["DOCUMENT_ROOT"] . "/libraries";
$appConfig["path"] = implode(PATH_SEPARATOR, $addPath);
set_include_path(get_include_path() . PATH_SEPARATOR . $appConfig["path"]);
unset($addPath);
$view = new stdClass();

// Allow session to be initialized with custom handler immediately
// for instances in which session data is used before Platform
// is bootstrapped in template-top.php.
require_once "Db.php";
require_once 'PdoSessionHandler.php';
$db = new Db();
$session = new PdoSessionHandler($db->connect(), array("db_table" => "sessions" . getenv("APP_NAME")));

// Allow the Analytics library to instantiate itself immediately.
// This establishes our query string immediately to be able to
// serve redirects and URLs immediately.
require_once 'Analytics.php';
$analyticsObj = new Analytics();

// Load our simple helper functions immediately.
require_once 'helpers.php';