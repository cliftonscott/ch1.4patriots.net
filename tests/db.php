<?php
include_once("Db.php");
$db = new Db();
$connect = $db->connect();
echo "<pre>";
var_dump($connect);