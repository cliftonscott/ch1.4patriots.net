<?php
include_once("Hasoffers.php");
$hoObj = new Hasoffers();
$postSale = $hoObj->postSale(50,50,'bill',20);
echo "<pre>";
var_dump($postSale);