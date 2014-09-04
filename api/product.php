<?php
include_once("Product.php");
$productObj = new Product();
$productDataObj = $productObj->getProduct($_REQUEST["pId"]);
$return["productId"] = $productDataObj->productId;
$return["price"] = $productDataObj->price;
$return["metaTitle"] = $productDataObj->metaTitle;
$return["shippingCostDomestic"] = $productDataObj->shippingCostDomestic;
$return["shippingCostInternational"] = $productDataObj->shippingCostInternational;
echo json_encode($return);