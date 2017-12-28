<?php
	error_reporting(E_ALL);
	ini_set('display_errors', 1);

	header('Content-Type: text/xml');
	echo '<?xml version="1.0" encoding="UTF-8"?><urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';


	// This is to get $LANGS without printing anything.
	ob_start();
	include_once('site/header.php');
	ob_clean();
	
	// var_dump($LANGS);
	
	$pages = array('', 'catalogue', 'shops', 'protreat', 'gallery', 'about_forberz', 'about_detailing', 'affiliate', 'jobs', 'contact');
	
	foreach ($pages as $p) {
		foreach ($LANGS as $l) {
			echo '<url>'.
				'<loc>https://'.$SITES[$l].'/'.$p.($p ? '/' : '').'</loc>'.
				'<priority>'.(!$p && $l === 'en' ? 1 : 0.8).'</priority>'.
			'</url>';
		}
	}
	
	$pages = array('catalogue' => 'products', 'guide' => 'guide');
	
	foreach ($pages as $p => $table) {
		if ($result = $DB->query("SELECT COUNT(*) AS c FROM ".$table)) {
			$row = $result->fetch_assoc();
			for ($i = 1; $i <= $row['c']; ++$i) {
				foreach ($LANGS as $l) {
					echo '<url>'.
						'<loc>https://'.$SITES[$l].'/'.$p.'/'.$i.'</loc>'.
						'<priority>'.($table === 'products' ? 0.7 : 0.5).'</priority>'.
					'</url>';
				}
			}
		}
	}
	
	echo '</urlset>';
