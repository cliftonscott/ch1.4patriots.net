<?php

$variantsArray = array (
	"10items", // Top 10 Items Sold Out After Crisis
	"groceryBills", // How To Cut Your Grocery Bills In Half Guide
	"gardenGuide", // The Survival Garden Guide
	"waterGuide", // The Water Survival Guide
);
if($_GET["v"]) {
	if(in_array(trim($_GET["v"]),$variantsArray)) {
		$variation = trim($_GET["v"]);
	}
}

if($variation == "10items") {
	header('Content-Type: application/pdf');
	header('Content-disposition: attachment;filename=F4P-10-Items-After-Crisis.pdf');
	readfile('../../media/pdf/F4P-10-Items-After-Crisis.pdf');
} elseif($variation == "groceryBills") {
	header('Content-Type: application/pdf');
	header('Content-disposition: attachment;filename=F4P-Cut-Grocery-Bills-Half.pdf');
	readfile('../../media/pdf/F4P-Cut-Grocery-Bills-Half.pdf');
} elseif($variation == "gardenGuide") {
	header('Content-Type: application/pdf');
	header('Content-disposition: attachment;filename=F4P-Survival-Garden-Guide.pdf');
	readfile('../../media/pdf/F4P-Survival-Garden-Guide.pdf');
} elseif($variation == "waterGuide") {
	header('Content-Type: application/pdf');
	header('Content-disposition: attachment;filename=F4P-Water-Survival-Guide.pdf');
	readfile('../../media/pdf/F4P-Water-Survival-Guide.pdf');
}