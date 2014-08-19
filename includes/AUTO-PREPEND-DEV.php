<?php
/*
 * This file is automatically included at the beginning of each php request by virtue of the .htaccess file.
 * We can use this file to ensure various settings on the server are to our liking. For example the include path.
 * 
 * The downside is that changing this file can take the site down. So you have to take as much care chaning this
 * file as you would say an apache config file or a php.ini file.
 */
$some_session = session_name("f4p_session");
session_start();
//ini_set("error_reporting", E_ALL);
ini_set("display_errors", TRUE);
const APP_MODE_LOG = FALSE; //options FALSE or DEBUG
$addPath[] = "/var/www/vhosts/dev02.4patriots.net/includes";
$addPath[] = "/var/www/vhosts/dev02.4patriots.net/templates";
$addPath[] = "/var/www/vhosts/dev02.4patriots.net/content";
$addPath[] = "/var/www/vhosts/dev02.4patriots.net/libraries";
$appConfig["path"] = implode(PATH_SEPARATOR, $addPath);
set_include_path(get_include_path() . PATH_SEPARATOR . $appConfig["path"]);
unset($addPath);
