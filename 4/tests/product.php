<?php
include_once("product.php");
$productObj = new Product();

//$value = $productObj->loadFunnelData();

//$value = $productObj->getFunnelData("freecoffee","oto5");

$value = $productObj->setFunnel();

echo "<pre>";
var_dump($value);