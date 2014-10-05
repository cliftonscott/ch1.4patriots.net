<?php
session_start();
ini_set("display_errors", TRUE);
//ini_set("memory_limit", 28M);
require_once("Dblog.php");
$devlogs = Dblog::getDblog();

//Util::nicedump($devlogs);

?>
<style>
	table tr td {
		font-family:Courier;
		padding-bottom:5px;
		border-bottom:1px solid #cccccc;
		font-size:.8em;
		vertical-align: top;
	}
	table tr td.process {
		font-style:italic;
		border-right:1px solid #cccccc;
		padding-right:10px;
		color:green;
	}	
	table tr td.stamp {
		font-size:.8em;
		font-style:italic;
		border-right:1px solid #cccccc;
		padding-right:10px;
	}
</style>


<?php

echo ("<table>\n");
foreach($devlogs->results as $devlog) {
	echo "<tr>\n";
//	echo "<td>" . $devlog["logkey"] . "</td>\n";
	echo "<td class='stamp'>" . date("m-d h:i:s",strtotime($devlog["stamp"])) . "</td>\n";
	echo "<td class='process'>" . $devlog["process"] . "</td>\n";
//	echo "<td class='process'>" . $devlog["userIp"] . "</td>\n";
	echo "<td>" . $devlog["log"] . "</td>\n";
	echo "</tr>\n";
}
echo "</table>";

echo "<br>===end===";
