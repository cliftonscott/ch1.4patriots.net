<!doctype html>
<html lang="">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible">
	<?php echo $metaDataObj->title;?>
	<?php echo $metaDataObj->description;?>
	<?php echo $metaDataObj->keywords;?>
	<meta name="generator" content="Bootply" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="shortcut icon" href="/favicon.ico">

	<!-- Latest compiled and minified CSS. -->
	<?php $assets->css(); ?>
	<?php if ($page === "letter"): ?>
		<link href="/assets/css/styles-letter.css" rel="stylesheet" type="text/css">
		<link href='https://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,700,600,300,800' rel='stylesheet' type='text/css'>
	<?php endif; ?>

	<?php
	if(strpos($_SERVER["PHP_SELF"],"quiz") > 0) {
		echo "<link href='/assets/css/quiz.css' rel='stylesheet'>\n";
		echo "<script type='text/javascript' src='/js/quiz.js'></script>\n";
	}
	$isSecure = false;
	if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') {
		$isSecure = true;
	} elseif (!empty($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https' || !empty($_SERVER['HTTP_X_FORWARDED_SSL']) && $_SERVER['HTTP_X_FORWARDED_SSL'] == 'on') {
		$isSecure = true;
	}
	$REQUEST_PROTOCOL = $isSecure ? 'https' : 'http';
	?>
	<!--[if lt IE 9]>
	<script src="<?php echo $REQUEST_PROTOCOL;?>://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<!--Internet Explorer 9,8,7,....-->
	<!--[if lte IE 9]><link rel="stylesheet" type="text/css" href="/assets/css/ie10.css"/><![endif]-->
	<!--Internet Explorer 10-->
</head>