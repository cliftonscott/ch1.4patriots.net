<?php
$request = explode('/', $_SERVER['REQUEST_URI']);
$args = array();
//Remove empty indexes
foreach($request as $r){
	if(!empty($r)){
		array_push($args, $r);
	}
}
$validPids = array(22,23);
$pid = intval($args[1]);
if(in_array($pid,$validPids)) {
	$_SESSION["productId"] = $pid;
	$_SESSION["upgrade"] = true;
}
header("Location: /checkout/order.php");