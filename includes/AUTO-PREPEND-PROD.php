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

if((!isset($_SERVER['HTTPS']) || !$_SERVER['HTTPS']) && (strpos($_SERVER["PHP_SELF"],"/checkout/") !== FALSE)) {
	header("Location: https://secure.food4patriots.com" . $_SERVER["REQUEST_URI"]);
	exit();
}

ini_set("display_errors", 0);
const APP_MODE_LOG = FALSE; //options FALSE or DEBUG
$addPath[] = "/var/www/vhosts/secure.food4patriots.com/includes";
$addPath[] = "/var/www/vhosts/secure.food4patriots.com/templates";
$addPath[] = "/var/www/vhosts/secure.food4patriots.com/content";
$addPath[] = "/var/www/vhosts/secure.food4patriots.com/libraries";
$appConfig["path"] = implode(PATH_SEPARATOR, $addPath);
set_include_path(get_include_path() . PATH_SEPARATOR . $appConfig["path"]);
unset($addPath);