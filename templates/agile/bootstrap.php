<?php

/*
|--------------------------------------------------------------------------
| Bootstrap
|--------------------------------------------------------------------------
|
| Bootstrap this application page.
|
*/
include_once("Analytics.php");
$analyticsObj = new Analytics();
include_once("Platform.php");
$platform = new Platform();
require_once("Meta.php");
$metaDataObj = new Meta();
require_once("Customer.php");
$customerObj = new Customer();
require_once("MobileDetect.php");
$detect = new Mobile_Detect;
if ($page !== "video") {
	require_once("JavelinApi.php");
	$javelinApi = JV::load();
}

// Allow the asset manager to resolve assets for this page.
include_once 'AssetManager.php';
$assets = new AssetManager($page);