<?php

# NEVER REMOVE
date_default_timezone_set('UTC');
# NEVER REMOVE

error_reporting(E_ALL);
ini_set('display_errors', 1);

// if(preg_match('/www./', $_SERVER['HTTP_HOST'])) {
// 	$_SERVER['HTTP_HOST'] = str_replace('www.', '', $_SERVER['HTTP_HOST']);
// 	$redirect = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
// 	header('HTTP/1.1 301 Moved Permanently');
// 	header('Location: ' . $redirect);
// 	exit();
// }

// if(!is_dir('C:\\Windows') && !is_dir('/Users') && (empty($_SERVER['HTTPS']) || $_SERVER['HTTPS'] == "off")) {
// 	$redirect = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
// 	header('HTTP/1.1 301 Moved Permanently');
// 	header('Location: ' . $redirect);
// 	exit();
// }

$SITES = array(
	'en' => 'forberz.com',
	'he' => 'forberz.co.il',
	// 'ru' => 'forberz.ru',
	'forberz.com' => 'en',
	'forberz.co.il' => 'he'/*,
	'forberz.ru' => 'ru'*/
);

$TABLE_NAMES = array(
	'products' => 'category',
	'guide' => 'guide'
);

session_start();

// $LANGS = array('he', 'en', 'ru');
$LANGS = array('he', 'en');

$LANG = 'en';
if (in_array($_SERVER['HTTP_HOST'], $SITES)) {
	$LANG = $SITES[$_SERVER['HTTP_HOST']];
}

// $LANG = 'he';

$ID = !empty($_GET['id']) ? $_GET['id'] : false;
$LIMIT = isset($_GET['limit']) ? intval($_GET['limit']) : false;
$_SESSION['lang'] = $LANG;

if ($ID === 0) {
	$ID = false;
}

@include 'conn.php';
@include '../conn.php';

$DICT = array();
if ($result = $DB->query("SELECT lang_key, lang_{$LANG} AS word FROM dict")) {
	while ($row = $result->fetch_assoc()) {
		$DICT[$row['lang_key']] = $row['word'];
	}
}

$TITLE = "Forberz - Natural Detailing Products for Your Car and Bike";
$PAGE = preg_replace('/(.*\/)|(\.php)|[^a-zA-Z_\-]/', '', $_SERVER['PHP_SELF']);
$TABLE_NAME = 'gallery';
switch ($PAGE) {
	case 'catalogue':
		$TABLE_NAME = 'products';
		if ($ID) {
			$result = $DB->query("SELECT id, IF(\"" . $DB->escape_string($ID) . "\" = linktxt_{$LANG}, TRUE, FALSE) AS cur, title_{$LANG} AS title, linktxt_" . ($LANG === 'en' ? 'he' : 'en') . " AS linktxt FROM products WHERE \"" . $DB->escape_string($ID) . "\" IN (linktxt_en, linktxt_he, linktxt_ru)");
			break;
		}
	
	case 'guide':
		$TABLE_NAME = 'guide';
		if ($ID) {
			$result = $DB->query("SELECT id, IF(\"" . $DB->escape_string($ID) . "\" = linktxt_{$LANG}, TRUE, FALSE) AS cur, title_{$LANG} AS title, linktxt_" . ($LANG === 'en' ? 'he' : 'en') . " AS linktxt FROM guide WHERE \"" . $DB->escape_string($ID) . "\" IN (linktxt_en, linktxt_he, linktxt_ru)");
			break;
		}
	
	default:
		$TABLE_NAME = $PAGE;
		$result = $DB->query("SELECT id, TRUE AS cur, title_{$LANG} AS title FROM titles WHERE page = '{$PAGE}'");
		break;
}
$res = $result->fetch_assoc();
$TITLE = strip_tags($res['title']);
$obj_id = intval($res['id']);

// if (!$res['cur'] && !in_array($_SERVER['PHP_SELF'], array('/forberz/sitemap.php', '/sitemap.php', '/forberz/site/cart.php', '/site/cart.php', '/cart.php'))) {
// 	$redirect = 'https://' . ($LANG === 'en' ? $SITES['he'] : $SITES['en']) . '/' . $PAGE . '/' . $res['linktxt'];
// 	header('HTTP/1.1 301 Moved Permanently');
// 	header('Location: ' . $redirect);
// 	exit();
// }

$current_page = preg_replace('/(index)?\.php/', '', pathinfo($_SERVER['PHP_SELF'])['basename']);

?><!DOCTYPE html>
<html lang="<?= $LANG?>">
	<head>
		<?php 
			foreach ($LANGS as $L) {
				if ($L !== $LANG) {
					echo '<link rel="alternate" href="http://'.$SITES[$L].'/'.$current_page.($ID ? '/' . $ID : '').'" hreflang="'.$L.'">';
				}
			}
			
			if (is_dir('C:\\Windows')) {
				// echo '<base href="http://127.0.0.1/" />';
				echo '<base href="http://127.0.0.1/" />';
			} elseif (is_dir('/Users')) {
				echo '<base href="http://127.0.0.1/forberz/" />';
				// echo '<base href="http://192.168.1.101/forberz/" />';
			} else {
				// echo '<base href="https://' . $SITES[$LANG] . '/" />';
				echo '<base href="/" />';
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
		
		<meta property="og:image" content="http://forberz.com/img/forberzavatar.jpg">
		<meta property="og:image:url" content="http://forberz.com/img/forberzavatar.jpg">
		<meta property="og:image:type" content="image/jpeg">
		<meta property="og:image:width" content="1500">
		<meta property="og:image:height" content="1500">
		
		<!-- main picture -->
		<!-- <meta itemprop="image" content="http://forberz.com/img/forberzavatar.jpg"> -->
		
		<meta name="description" content="Forberz - 100% Natural Car and Bike Care and Detailing Products">
		<meta name="author" content="Forberz">
		<meta name="Copyright" content="Copyright (c) 2013-2017 Forberz, Inc.">
		
		<link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
		
		<?php include "splashscreens.php" ?>
		
		<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>

		<script type="text/javascript" src="site/js/script.js"></script>

		<link rel="stylesheet" href="site/css/style.css"/>
		<link rel="stylesheet" href="site/css/header.css"/>
		<link rel="stylesheet" href="site/css/shops.css"/>
		<link rel="stylesheet" href="site/css/guide.css"/>
		<link rel="stylesheet" href="site/css/product.css"/>
		<link rel="stylesheet" href="site/css/gallery.css"/>
		<link rel="stylesheet" href="site/css/footer.css"/>
		<link rel="stylesheet" href="site/css/comment.css"/>
		<link rel="stylesheet" href="site/css/media.css"/>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=yes">
		<title><?=$TITLE?></title>
		
		<script type="text/javascript">
			var LANG = '<?=$LANG?>';
		</script>
	</head>
	<body class="<?= $LANG === 'he' ? 'rtl' : 'ltr'?>">
		<?php
			if (
				strpos($_SERVER['HTTP_USER_AGENT'], 'iPhone') !== false 
				|| strpos($_SERVER['HTTP_USER_AGENT'], 'iPad') !== false 
				|| strpos($_SERVER['HTTP_USER_AGENT'], 'Androind') !== false
			) {
				include("menu-mobile.php");
			} else {
				include("menu.php");
			}
		?>
