<?php

# NEVER REMOVE
date_default_timezone_set('UTC');
# NEVER REMOVE

error_reporting(E_ALL);
ini_set('display_errors', 1);

if(!is_dir('C:\\Windows') && !is_dir('/Users') && (empty($_SERVER['HTTPS']) || $_SERVER['HTTPS'] == "off")) {
    $redirect = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    header('HTTP/1.1 301 Moved Permanently');
    header('Location: ' . $redirect);
    exit();
}

session_start();

$LANG = isset($_GET['lang']) ? strtolower($_GET['lang']) : 
		(isset($_SESSION['lang']) ? strtolower($_SESSION['lang']) : 'en');
if (!in_array($LANG, array('en', 'he', 'ru'))) {
	$LANG = 'en';
}
$ID = isset($_GET['id']) ? intval($_GET['id']) : false;
$LIMIT = isset($_GET['limit']) ? intval($_GET['limit']) : false;
$_SESSION['lang'] = $LANG;

$DB = new mysqli("localhost", "forberzc_mdnt", "mdnt6368", "forberzc_store");
$DB->set_charset("utf8");

$DICT = array();
if ($result = $DB->query("SELECT lang_key, lang_{$LANG} AS word FROM dict")) {
	while ($row = $result->fetch_assoc()) {
		$DICT[$row['lang_key']] = $row['word'];
	}
}

?><!DOCTYPE html>
<html lang="<?= $LANG?>">
	<head>
		
		<!-- DON'T MOVE THIS BELOW -->
		<link rel="alternate" href="?lang=he" hreflang="he">
		<link rel="alternate" href="?lang=ru" hreflang="ru">
		<!-- DON'T MOVE THIS BELOW -->
		
		<?php 
			if (is_dir('/Users')) {
				echo '<base href="http://127.0.0.1/forberz/" />';
			} elseif (is_dir('C:\\Windows')) {
				echo '<base href="http://127.0.0.1/" />';
			} else {
				echo '<base href="https://forberz.com/" />';
			}
		?>
		
		<link rel="shortcut icon" type="image/x-icon" href="/favicon.ico?v=2" />
		<link rel="icon" type="image/x-icon" href="/favicon.ico?v=2" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="format-detection" content="telephone=no">
		<meta name="robots" content="index, follow, archive">
		<!-- social pictures -->
		<meta property="og:type" content="website">
		<meta property="og:site_name" content="forberz.com">
		<meta property="og:title" content="Forberz">
		<meta property="og:description" content="Forberz - 100% Natural Car and Bike Care and Detailing Products">
		
		<meta property="og:image" content="https://forberz.com/img/forberzavatar.jpg">
		<meta property="og:image:url" content="https://forberz.com/img/forberzavatar.jpg">
		<meta property="og:image:type" content="image/jpeg">
		<meta property="og:image:width" content="1500">
		<meta property="og:image:height" content="1500">
		
		<!-- main picture -->
		<!-- <meta itemprop="image" content="https://forberz.com/img/forberzavatar.jpg"> -->
		
		<meta name="description" content="Forberz - 100% Natural Car and Bike Care and Detailing Products">
		<meta name="author" content="Forberz">
		<meta name="Copyright" content="Copyright (c) 2013-2017 Forberz, Inc.">
		
		<!-- images for apple -->
		<!-- <link rel="apple-touch-icon" sizes="57x57" href="https://cdn.homzit.com/img/apple-touch-icon-57x57.png"> -->
		<!-- <link rel="apple-touch-icon" sizes="60x60" href="https://cdn.homzit.com/img/apple-touch-icon-60x60.png"> -->
		<!-- <link rel="apple-touch-icon" sizes="72x72" href="https://cdn.homzit.com/img/apple-touch-icon-72x72.png"> -->
		<!-- <link rel="apple-touch-icon" sizes="76x76" href="https://cdn.homzit.com/img/apple-touch-icon-76x76.png"> -->
		<!-- <link rel="apple-touch-icon" sizes="114x114" href="https://cdn.homzit.com/img/apple-touch-icon-114x114.png"> -->
		<!-- <link rel="apple-touch-icon" sizes="120x120" href="https://cdn.homzit.com/img/apple-touch-icon-120x120.png"> -->
		<!-- <link rel="apple-touch-icon" sizes="144x144" href="https://cdn.homzit.com/img/apple-touch-icon-144x144.png"> -->
		<!-- <link rel="apple-touch-icon" sizes="152x152" href="https://cdn.homzit.com/img/apple-touch-icon-152x152.png"> -->
		<!-- <link rel="apple-touch-icon" sizes="180x180" href="https://cdn.homzit.com/img/apple-touch-icon-180x180.png"> -->
		<!-- <link href="https://cdn.homzit.com/img/launch_screens/ipad_portrait_2x.png" media="(device-width: 768px) and 
			(device-height: 1024px) and (-webkit-device-pixel-ratio: 2) and (orientation: portrait)" rel="apple-touch-startup-image"> -->
		<!-- <link href="https://cdn.homzit.com/img/launch_screens/ipad2_portrait_retina.png" media="(device-width: 768px) and 
			(device-height: 1024px) and (-webkit-device-pixel-ratio: 2) and (orientation: landscape)" rel="apple-touch-startup-image"> -->
		<!-- <link href="https://cdn.homzit.com/img/launch_screens/ipad_portrait_retina.png" media="(device-width: 768px) and 
			(device-height: 1024px) and (-webkit-device-pixel-ratio: 1) and (orientation: portrait)" rel="apple-touch-startup-image"> -->
		<!-- <link href="https://cdn.homzit.com/img/launch_screens/ipad_portrait.png" media="(device-width: 768px) and 
			(device-height: 1024px) and (-webkit-device-pixel-ratio: 1) and (orientation: landscape)" rel="apple-touch-startup-image"> -->
		<!-- <link href="https://cdn.homzit.com/img/launch_screens/iphone6p_portrait.png" media="(device-width: 414px) and 
			(device-height: 736px) and (-webkit-device-pixel-ratio: 3) and (orientation: portrait)" rel="apple-touch-startup-image"> -->
		<!-- <link href="https://cdn.homzit.com/img/launch_screens/iphone6p_landscape.png" media="(device-width: 414px) and 
			(device-height: 736px) and (-webkit-device-pixel-ratio: 3) and (orientation: landscape)" rel="apple-touch-startup-image"> -->
		<!-- <link href="https://cdn.homzit.com/img/launch_screens/iphone6.png" media="(device-width: 375px) and (device-height: 667px) and 
			(-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image"> -->
		<!-- <link href="https://cdn.homzit.com/img/launch_screens/iphone5.png" media="(device-width: 320px) and (device-height: 568px) and 
			(-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image"> -->
		<!-- <link href="https://cdn.homzit.com/img/launch_screens/iphone_portrait_retina.png" media="(device-width: 320px) and 
			(device-height: 480px)and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image"> -->
		<!-- <link href="https://cdn.homzit.com/img/launch_screens/iphone_portrait.png" media="(device-width: 320px) and 
			(device-height: 480px) and (-webkit-device-pixel-ratio: 1)" rel="apple-touch-startup-image"> -->
		
		<!-- favicons -->
		<!-- <link rel="icon" type="image/png" href="https://cdn.homzit.com/img/favicon-32x32.png" sizes="32x32"> -->
		<!-- <link rel="icon" type="image/png" href="https://cdn.homzit.com/img/android-chrome-192x192.png" sizes="192x192"> -->
		<!-- <link rel="icon" type="image/png" href="https://cdn.homzit.com/img/favicon-96x96.png" sizes="96x96"> -->
		<!-- <link rel="icon" type="image/png" href="https://cdn.homzit.com/img/favicon-16x16.png" sizes="16x16"> -->
		
		<!-- <link rel="manifest" href="https://cdn.homzit.com/site/manifest.json"> -->
		<!-- <link rel="mask-icon" href="https://cdn.homzit.com/site/safari-pinned-tab.svg" color="#104E8B"> -->
		<!-- <meta name="apple-mobile-web-app-title" content="Homzit"> -->
		<!-- <meta name="application-name" content="Homzit"> -->
		<!-- <meta name="msapplication-TileColor" content="#fefefe"> -->
		<!-- <meta name="msapplication-TileImage" content="https://cdn.homzit.com/img/mstile-144x144.png"> -->
		<!-- <meta name="msapplication-config" content="https://cdn.homzit.com/site/browserconfig.xml"> -->
		<!-- <meta name="theme-color" content="#104E8B"><meta name="apple-mobile-web-app-capable" content="yes"> -->
		<!-- <meta name="mobile-web-app-capable" content="yes"> -->
		<!-- <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"> -->
		
		
		<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>

		<script type="text/javascript" src="site/js/script.js"></script>
		<!-- <script type="text/javascript" src="site/js/cart.js"></script> -->

		<link rel="stylesheet" href="site/css/style.css"/>
		<link rel="stylesheet" href="site/css/header.css"/>
		<link rel="stylesheet" href="site/css/shops.css"/>
		<link rel="stylesheet" href="site/css/guide.css"/>
		<link rel="stylesheet" href="site/css/product.css"/>
		<link rel="stylesheet" href="site/css/gallery.css"/>
		<link rel="stylesheet" href="site/css/footer.css"/>
		<link rel="stylesheet" href="site/css/media.css"/>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=yes">
		<title>Forberz - Natural Detailing Products for Your Car and Bike</title>
	</head>
	<body class="<?= $LANG === 'he' ? 'rtl' : 'ltr'?>">
		<?php include("menu.php"); ?>