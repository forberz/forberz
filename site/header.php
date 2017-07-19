<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

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
		<link rel="shortcut icon" type="image/x-icon" href="favicon.ico?v=2" />
		<link rel="icon" type="image/x-icon" href="favicon.ico?v=2" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="format-detection" content="telephone=no">
		<meta name="robots" content="index, follow, archive">
		<script>
			(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

			ga('create', 'UA-64555452-1', 'auto');
			ga('send', 'pageview');

		</script>
		<!-- social pictures -->
		<!-- <meta property="og:type" content="website"> -->
		<!-- <meta property="og:site_name" content="homzit.com"> -->
		<!-- <meta property="og:title" content="Homzit"> -->
		<!-- <meta property="og:description" content="Online marketplace that enables people to find and list properties for sale, rent or sublet in over 190 countries. see local listings in your preferred language, currency and measurement."> -->
		<!-- <meta property="og:url" content="https://dev.homzit.com/"> -->
		
		<!-- <meta property="og:image" content="https://i.imgur.com/a6s2W1g.png"> -->
		<!-- <meta property="og:image:url" content="https://i.imgur.com/a6s2W1g.png"> -->
		<!-- <meta property="og:image:type" content="image/png"> -->
		<!-- <meta property="og:image:width" content="960"> -->
		<!-- <meta property="og:image:height" content="640"> -->
		
		<!-- main picture -->
		<!-- <meta itemprop="image" content="https://i.imgur.com/a6s2W1g.png"> -->
		
		<!-- <link rel="alternate" href="https://dev.homzit.com/he" hreflang="he"> -->
		<!-- <link rel="alternate" href="https://dev.homzit.com/ru" hreflang="ru"> -->
		
		<!-- <meta name="description" content="Online marketplace that enables people to find and list properties for sale, rent or sublet in over 190 countries. see local listings in your preferred language, currency and measurement."> -->
		<!-- <meta name="keywords" content="homz.it,homzit,homez.it,homezit, promote property properly,property promoted properly"> -->
		<!-- <meta name="author" content="Homzit, Inc."> -->
		<!-- <meta name="Copyright" content="Copyright (c) 2015-2017 Homzit, Inc."> -->
		
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
		<!-- <link href="https://cdn.homzit.com/img/launch_screens/ipad_portrait_2x.png" media="(device-width: 768px) and (device-height: 1024px) and (-webkit-device-pixel-ratio: 2) and (orientation: portrait)" rel="apple-touch-startup-image"> -->
		<!-- <link href="https://cdn.homzit.com/img/launch_screens/ipad2_portrait_retina.png" media="(device-width: 768px) and (device-height: 1024px) and (-webkit-device-pixel-ratio: 2) and (orientation: landscape)" rel="apple-touch-startup-image"> -->
		<!-- <link href="https://cdn.homzit.com/img/launch_screens/ipad_portrait_retina.png" media="(device-width: 768px) and (device-height: 1024px) and (-webkit-device-pixel-ratio: 1) and (orientation: portrait)" rel="apple-touch-startup-image"> -->
		<!-- <link href="https://cdn.homzit.com/img/launch_screens/ipad_portrait.png" media="(device-width: 768px) and (device-height: 1024px) and (-webkit-device-pixel-ratio: 1) and (orientation: landscape)" rel="apple-touch-startup-image"> -->
		<!-- <link href="https://cdn.homzit.com/img/launch_screens/iphone6p_portrait.png" media="(device-width: 414px) and (device-height: 736px) and (-webkit-device-pixel-ratio: 3) and (orientation: portrait)" rel="apple-touch-startup-image"> -->
		<!-- <link href="https://cdn.homzit.com/img/launch_screens/iphone6p_landscape.png" media="(device-width: 414px) and (device-height: 736px) and (-webkit-device-pixel-ratio: 3) and (orientation: landscape)" rel="apple-touch-startup-image"> -->
		<!-- <link href="https://cdn.homzit.com/img/launch_screens/iphone6.png" media="(device-width: 375px) and (device-height: 667px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image"> -->
		<!-- <link href="https://cdn.homzit.com/img/launch_screens/iphone5.png" media="(device-width: 320px) and (device-height: 568px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image"> -->
		<!-- <link href="https://cdn.homzit.com/img/launch_screens/iphone_portrait_retina.png" media="(device-width: 320px) and (device-height: 480px)and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image"> -->
		<!-- <link href="https://cdn.homzit.com/img/launch_screens/iphone_portrait.png" media="(device-width: 320px) and (device-height: 480px) and (-webkit-device-pixel-ratio: 1)" rel="apple-touch-startup-image"> -->
		
		<!-- favicons -->
		<!-- <link rel="icon" type="image/png" href="https://cdn.homzit.com/img/favicon-32x32.png" sizes="32x32"> -->
		<!-- <link rel="icon" type="image/png" href="https://cdn.homzit.com/img/android-chrome-192x192.png" sizes="192x192"> -->
		<!-- <link rel="icon" type="image/png" href="https://cdn.homzit.com/img/favicon-96x96.png" sizes="96x96"> -->
		<!-- <link rel="icon" type="image/png" href="https://cdn.homzit.com/img/favicon-16x16.png" sizes="16x16"> -->
		
		<!-- <link rel="manifest" href="https://cdn.homzit.com/site/manifest.json"> -->
		<!-- <link rel="mask-icon" href="https://cdn.homzit.com/site/safari-pinned-tab.svg" color="#104E8B"><meta name="apple-mobile-web-app-title" content="Homzit"> -->
		<!-- <meta name="application-name" content="Homzit"> -->
		<!-- <meta name="msapplication-TileColor" content="#fefefe"> -->
		<!-- <meta name="msapplication-TileImage" content="https://cdn.homzit.com/img/mstile-144x144.png"> -->
		<!-- <meta name="msapplication-config" content="https://cdn.homzit.com/site/browserconfig.xml"> -->
		<!-- <meta name="theme-color" content="#104E8B"><meta name="apple-mobile-web-app-capable" content="yes"> -->
		<!-- <meta name="mobile-web-app-capable" content="yes"> -->
		<!-- <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"> -->
		
		
		<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>

	
		<script>
			var showPrice = function(i) {
				document.getElementById('item_show_price_' + i).innerHTML = 
					parseInt(document.getElementById('item_price_' + i).value) 
					* parseInt(document.getElementById('item_quantity_' + i).value);
			};
			
			var setPrice = function(val, i) {
				document.getElementById('item_price_' + i).value = val;
				showPrice(i);
			};

			var choosePic = function(src, title, subtitle, video) {
				if (video) {
					document.getElementById('the-video').src = video;
					document.getElementById('the-video').removeAttribute('class');
				} else {
					document.getElementById('the-pic').src = src;
					document.getElementById('the-pic').removeAttribute('class');

				}
				document.getElementById('the-pic-title').innerHTML = title;
				document.getElementById('the-pic-subtitle').innerHTML = subtitle;
				document.getElementById('blackend').setAttribute('class', 'open');
			};

			var closePic = function() {
				document.getElementById('blackend').removeAttribute('class');
				document.getElementById('the-pic').setAttribute('class', 'hidden');
				document.getElementById('the-video').setAttribute('class', 'hidden');
			};

			var slideToItem = function(e) {
				e.preventDefault();
				var top = 0,
					t = $(e.target.getAttribute('href'));

				while ((t = t.prev()) && ~['A', 'DIV', 'UL', 'HEADER'].indexOf(t[0].tagName)) {
					top += t.height();
					if (t[0].tagName === 'HEADER') {
						break;
					}
				}

				$('body').animate({'scrollTop': top}, 800);
			};
		</script>

		<link rel="stylesheet" href="/site/css/style.css"/>
		<link rel="stylesheet" href="/site/css/shops.css"/>
		<link rel="stylesheet" href="/site/css/footer.css"/>
		<link rel="stylesheet" href="/site/css/gallery.css"/>
		<link rel="stylesheet" href="/site/css/guide.css"/>
		<link rel="stylesheet" href="/site/css/header.css"/>
		<link rel="stylesheet" href="/site/css/product.css"/>
		<link rel="stylesheet" href="/site/css/media.css"/>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=yes">
		<title>Forberz - Natural Detailing Products for Your Car and Bike</title>
	</head>
	<body class="<?= $LANG === 'he' ? 'rtl' : 'ltr'?>">
		<?php include("menu.php"); ?>