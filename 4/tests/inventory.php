<?php
include_once("Inventory.php");
$inventoryObj = new Inventory();
$hasInventory = $inventoryObj->hasInventory(162);
echo "<pre>";
var_dump($hasInventory);

$subtractInventory = $inventoryObj->subtractInventory(162,10);

$hasInventory = $inventoryObj->hasInventory(162);
echo "<pre>";
var_dump($hasInventory);