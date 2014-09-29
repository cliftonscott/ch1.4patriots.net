<?php
if(!isset($_SERVER['HTTPS']) || !$_SERVER['HTTPS'])
{
    header("Location: https://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]);
    exit();
}
error_reporting(0);
$some_session = session_name("f4p_session");
//session_set_cookie_params(0, '/', '.power4patriots.com');
session_start();
?>