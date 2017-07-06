<header>
	<div class="black_wrap">
	<div class="social">
		<ul class="social_menu">
		  <li class="grey"><?= $DICT['social_on']?></li>
		  <li><a href="https://www.facebook.com/forberz" rel="nofollow" target="_blank">Facebook</a></li>
		  <li><a href="http://www.google.com/+Forberz" rel="nofollow" target="_blank">Google+</a></li>
		  <li><a href="https://www.instagram.com/forberz" rel="nofollow" target="_blank">Instagram</a></li>
		  <li><a href="https://www.pinterest.com/forberz" rel="nofollow" target="_blank">Pinterest</a></li>
		  <li><a href="http://www.ebay.com/usr/forberz" rel="nofollow" target="_blank">eBay</a></li>
		</ul>
		<ul class="lang_menu">  
		  <li><a href="?lang=he<?= $PRODUCT ? '&product=' . $PRODUCT : '' ?>" <?= $LANG === 'he' ? 'class="grey"' : ''?>>עברית</a></li>
		  <li><a href="?lang=ru<?= $PRODUCT ? '&product=' . $PRODUCT : '' ?>" <?= $LANG === 'ru' ? 'class="grey"' : ''?>>Русский</a></li>
		  <li><a href="?lang=en<?= $PRODUCT ? '&product=' . $PRODUCT : '' ?>" <?= $LANG === 'en' ? 'class="grey"' : ''?>>English</a></li>
		</ul>
	</div>
	<div class="top">
		<a href="/">
			<img class="logo" src="/img/forberz.png" alt="Forberz - Natural Care and Detailing Products for Cars and Bikes" />
		</a>
	</div>
	
	<div class="main_menu">
		<ul class="main_menu">
		  <li><a href="/site/catalogue.php?limit=5" <?= strpos($_SERVER['PHP_SELF'], 'catalogue') !== false ? 'class="grey"' : ''?>><?= $DICT['cata']?></a></li>
		  <li><a href="/site/shops.php"<?= strpos($_SERVER['PHP_SELF'], 'shops') !== false ? 'class="grey"' : ''?>><?= $DICT['wherebuy']?></a></li>
		  <li><a href="/site/protreat.php"<?= strpos($_SERVER['PHP_SELF'], 'protreat') !== false ? 'class="grey"' : ''?>><?= $DICT['protreat']?></a></li>
		  <li><a href="/site/guide.php"<?= strpos($_SERVER['PHP_SELF'], 'guide') !== false ? 'class="grey"' : ''?>><?= $DICT['guide']?></a></li>
		  <li><a href="/site/gallery.php"<?= strpos($_SERVER['PHP_SELF'], 'gallery') !== false ? 'class="grey"' : ''?>><?= $DICT['gallery']?></a></li>
		  <li class="opmenu"><a href="/site/about_forberz.php"<?= strpos($_SERVER['PHP_SELF'], 'about_forberz') !== false ? 'class="grey"' : ''?>><?= $DICT['about_forberz']?></a></li>
		  <li class="opmenu"><a href="/site/about_detailing.php"<?= strpos($_SERVER['PHP_SELF'], 'about_detailing') !== false ? 'class="grey"' : ''?>><?= $DICT['about_detailing']?></a></li>
		</ul>
	</div> 
	</div>
</header>