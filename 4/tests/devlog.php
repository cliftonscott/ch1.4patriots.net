<?php
include_once("Dblog.php");
$dblog = new Dblog();
if(!empty($_GET["v"])) {
	$dblog->showDblog($_GET["v"]);
} else {
	$dblog->showDblog();
}
