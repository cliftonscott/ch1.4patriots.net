<?php
/*
 * This file is automatically included at the beginning of each php request by virtue of the .htaccess file.
 * We can use this file to ensure various settings on the server are to our liking. For example the include path.
 * 
 * The downside is that changing this file can take the site down. So you have to take as much care changing this
 * file as you would say an apache config file or a php.ini file.
 */
$some_session = session_name("f4p_session");
session_start();
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