<?php
$adConversionNewArray = array (
	"/checkout/oto/f4p-1year-kit.php",
	"/checkout/oto/f4p-4week-kit-discount-a.php",
	"/checkout/oto/f4p-4week-kit-discount-b.php",
);
if(in_array($_SERVER["PHP_SELF"], $adConversionNewArray)) { ?>
<!-- Start Advertiser Code -->
<img src="https://ss1.zedo.com/ads2/t?o=562185;h=1768615;z=<?php echo rand(); ?>" width="1" height="1" BORDER="0">//DivD Conversion
<img src="https://ss7.zedo.com/img/bh.gif?n=305&g=20&a=1488&s=1&l=1&t=e&f=1" width="1" height="1" border="0" > //DivD Opt Out
<!-- End Advertiser Code -->
<?php } ?>
<?php
$adTargetingNewArray = array (
	"/video/index.php",
);
if(in_array($_SERVER["PHP_SELF"], $adTargetingNewArray)) { ?>
<!-- Start Lander Code -->
<img src="http://c7.zedo.com/img/bh.gif?n=305&g=20&a=1488&s=1&l=1&t=r&f=1" width="1" height="1" border="0" >//DivD Opt In
<!-- End Lander Code -->
<?php } ?>
