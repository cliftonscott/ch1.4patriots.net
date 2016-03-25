<?php
include_once("Product.php");
$productObj = new Product();
$productDataObj = $productObj->getProduct($_REQUEST["pId"]);
$return["productId"] = $productDataObj->productId;
$return["price"] = $productDataObj->price;
$return["originalPrice"] = $productDataObj->originalPrice;
$return["metaTitle"] = $productDataObj->metaTitle;
$return["shippingCostDomestic"] = $productDataObj->shippingCostDomestic;
$return["shippingCostInternational"] = $productDataObj->shippingCostInternational;
$return["shippingCostPerItem"] = $productDataObj->shippingCostPerItem;

if($funnel = $productObj->getFunnel()) {
	$funnelData = $productObj->initFunnel($funnel["step"]);
	if($funnelData["customPrice"]) {
		$return["price"] = $funnelData["customPrice"];
	}
}
if($productDataObj->productId == 17 && $_SESSION["customTemplate"]["price"] >= 0) { /*ENSURES FREE FOOD OFFER SHOWS $0*/
	$return["price"] = $_SESSION["customTemplate"]["price"];
}elseif($_SESSION["customTemplate"]["price"] > 0) {
	$return["price"] = $_SESSION["customTemplate"]["price"];
}
echo json_encode($return);
