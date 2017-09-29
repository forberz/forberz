<?php
$current_page = pathinfo($_SERVER['PHP_SELF'])['basename'];

if (strpos($current_page, 'index.php') === false && $current_page !== '' && $current_page !== '/') {
	$current_page = 'site/' . $current_page;
} else {
	$current_page = '';
}

?>
<header>
	<div class="black_wrap">
	<div class="social">
		<ul class="social_menu">
		  <li class="grey"><?= $DICT['social_on']?></li>
		  <li><a href="https://www.facebook.com/forberz" rel="nofollow" target="_blank"><img class="social_icon" src="gallery/fb-art.png"></a></li>
		  <li><a href="https://www.google.com/+Forberz" rel="nofollow" target="_blank"><img class="social_icon" src="gallery/g-plus.png"></a></li>
		  <li><a href="https://www.instagram.com/forberz" rel="nofollow" target="_blank"><img class="social_icon" src="gallery/inst.png"></a></li>
		  <li><a href="https://www.pinterest.com/forberz" rel="nofollow" target="_blank"><img class="social_icon" src="gallery/picon.png"></a></li>
		  <li><a href="https://www.ebay.com/usr/forberz" rel="nofollow" target="_blank"><img class="social_icon" src="gallery/ebay.png"></a></li>
		  <li><a href="https://www.youtube.com/channel/UCAbqdXaaKgwwDavvTwkQ8yQ" rel="nofollow" target="_blank"><img class="social_icon" src="gallery/ycon.png"></a></li>
		</ul>
		<ul class="lang_menu">  
		  <li><a href="<?= $current_page ?>?lang=he<?= $ID ? '&id=' . $ID : '' ?>" <?= $LANG === 'he' ? 'class="grey"' : ''?>>עברית</a></li>
		  <!-- <li><a href="<?= $current_page ?>?lang=ru<?= $ID ? '&id=' . $ID : '' ?>" <?= $LANG === 'ru' ? 'class="grey"' : ''?>>Русский</a></li> -->
		  <li><a href="<?= $current_page ?>?lang=en<?= $ID ? '&id=' . $ID : '' ?>" <?= $LANG === 'en' ? 'class="grey"' : ''?>>English</a></li>
		</ul>
	</div>
	<div class="top">
		<a href="/">
			<img class="logo" src="img/forberz.png" alt="Forberz - Natural Care and Detailing Products for Cars and Bikes" />
		</a>
	</div>
	
	<div class="main_menu">
		<ul class="main_menu">
		  <li><a href="site/catalogue.php" <?= strpos($_SERVER['PHP_SELF'], 'catalogue') !== false ? 'class="grey"' : ''?>><?= $DICT['cata']?></a></li>
		  <li><a href="site/shops.php"<?= strpos($_SERVER['PHP_SELF'], 'shops') !== false ? 'class="grey"' : ''?>><?= $DICT['wherebuy']?></a></li>
		  <li><a href="site/protreat.php"<?= strpos($_SERVER['PHP_SELF'], 'protreat') !== false ? 'class="grey"' : ''?>><?= $DICT['protreat']?></a></li>
		  <!-- <li><a href="site/guide.php"<?= strpos($_SERVER['PHP_SELF'], 'guide') !== false ? 'class="grey"' : ''?>><?= $DICT['guide']?></a></li> -->
		  <li><a href="site/gallery.php"<?= strpos($_SERVER['PHP_SELF'], 'gallery') !== false ? 'class="grey"' : ''?>><?= $DICT['gallery']?></a></li>
		  <li class="opmenu"><a href="site/about_forberz.php"<?= strpos($_SERVER['PHP_SELF'], 'about_forberz') !== false ? 'class="grey"' : ''?>><?= $DICT['about_forberz']?></a></li>
		  <li class="opmenu"><a href="site/about_detailing.php"<?= strpos($_SERVER['PHP_SELF'], 'about_detailing') !== false ? 'class="grey"' : ''?>><?= $DICT['about_detailing']?></a></li>
		</ul>
	</div> 
	</div>
</header>