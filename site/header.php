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

if ($_SERVER['HTTP_HOST'] === 'forberz.co.il') {
	header('HTTP/1.1 301 Moved Permanently');
	header('Location: https://forberz.com');
	exit();
}

session_start();

// $LANGS = array('he', 'en', 'ru');
$LANGS = array('he', 'en');

$LANG = isset($_GET['lang']) ? strtolower($_GET['lang']) : 
		(isset($_SESSION['lang']) ? strtolower($_SESSION['lang']) : 'en');

if (!in_array($LANG, $LANGS)) {
	$LANG = 'en';
}
$ID = isset($_GET['id']) ? intval($_GET['id']) : false;
$LIMIT = isset($_GET['limit']) ? intval($_GET['limit']) : false;
$_SESSION['lang'] = $LANG;

@include 'conn.php';
@include '../conn.php';

$DICT = array();
if ($result = $DB->query("SELECT lang_key, lang_{$LANG} AS word FROM dict")) {
	while ($row = $result->fetch_assoc()) {
		$DICT[$row['lang_key']] = $row['word'];
	}
}

$TITLE = "Forberz - Natural Detailing Products for Your Car and Bike";
$PAGE = preg_replace('/(.*\/)|(\.php)/', '', $_SERVER['PHP_SELF']);
switch ($PAGE) {
	case 'catalogue':
		if ($ID) {
			$result = $DB->query("SELECT title_{$LANG} AS title FROM products WHERE id = {$ID}");
			break;
		}
	
	case 'guide':
		if ($ID) {
			$result = $DB->query("SELECT title_{$LANG} AS title FROM guide WHERE id = {$ID}");
			break;
		}
	
	default:
		$result = $DB->query("SELECT title_{$LANG} AS title FROM titles WHERE page = '{$PAGE}'");
		break;
}
$TITLE = strip_tags($result->fetch_assoc()['title']);

?><!DOCTYPE html>
<html lang="<?= $LANG?>">
	<head>
		<?php 
			foreach ($LANGS as $L) {
				if ($L !== $LANG) {
					echo '<link rel="alternate" href="?lang='.$L.'" hreflang="'.$L.'">';
				}
			}
			
			if (is_dir('C:\\Windows')) {
				// echo '<base href="http://127.0.0.1/" />';
				echo '<base href="http://127.0.0.1/" />';
			} elseif (is_dir('/Users')) {
				echo '<base href="http://127.0.0.1/forberz/" />';
			} else {
				echo '<base href="https://www.forberz.com/" />';
			}
		?>
		
		<link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
		<link rel="icon" type="image/x-icon" href="favicon.ico" />
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
		
		<?php include "splashscreens.php" ?>
		
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
		<title><?=$TITLE?></title>
	</head>
	<body class="<?= $LANG === 'he' ? 'rtl' : 'ltr'?>">
		<?php include("menu.php"); ?>