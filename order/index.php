<?php
$request = explode('/', $_SERVER['REQUEST_URI']);
$args = array();
//Remove empty indexes
foreach($request as $r){
	if(!empty($r)){
		array_push($args, $r);
	}
}
/*
 * $validPids - restricts the system from setting a random pId. Only Pids in this array will have the
 * session var set properly and therefore can use the order.php file w/ this switch directly.
 */
$validPids = array(18,19,22,23,40,120);
$pid = intval($args[1]);
if(in_array($pid,$validPids)) {
	$_SESSION["productId"] = $pid;
	$_SESSION["upgrade"] = true;
}
header("Location: " . url('/checkout/order.php'));