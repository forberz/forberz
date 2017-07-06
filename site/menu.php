<header>
	<div class="black_wrap">
	<div class="social">
		<ul class="social_menu">
		  <li class="grey"><?= $DICT['social_on']?></li>
		  <li><a href="https://www.facebook.com/forberz" target="_blank">Facebook</a></li>
		  <li><a href="http://www.google.com/+Forberz" target="_blank">Google+</a></li>
		  <li><a href="https://www.instagram.com/forberz" target="_blank">Instagram</a></li>
		  <li><a href="https://www.pinterest.com/forberz" target="_blank">Pinterest</a></li>
		  <li><a href="http://www.ebay.com/usr/forberz" target="_blank">eBay</a></li>
		</ul>
		<ul class="lang_menu">  
		  <li><a href="?lang=he<?= $PRODUCT ? '&product=' . $PRODUCT : '' ?>">עברית</a></li>
		  <li><a href="?lang=ru<?= $PRODUCT ? '&product=' . $PRODUCT : '' ?>">Русский</a></li>
		  <li><a href="?lang=en<?= $PRODUCT ? '&product=' . $PRODUCT : '' ?>">English</a></li>
		</ul>
	</div>
	<div class="top">
		<a href="/">
			<img class="logo" src="/img/forberz.png" alt="Forberz - Natural Care and Detailing Products for Cars and Bikes" />
		</a>
	</div>
	
	<div class="main_menu">
		<ul class="main_menu">
		  <li><a href="/site/catalogue.php?limit=5"><?= $DICT['cata']?></a></li>
		  <li><a href="/site/shops.php"><?= $DICT['wherebuy']?></a></li>
		  <li><a href="/site/protreat.php"><?= $DICT['protreat']?></a></li>
		  <li><a href="/site/guide.php"><?= $DICT['guide']?></a></li>
		  <li><a href="/site/gallery.php"><?= $DICT['gallery']?></a></li>
		  <li class="opmenu"><a href="/site/about_forberz.php"><?= $DICT['about_forberz']?></a></li>
		  <li class="opmenu"><a href="/site/about_detailing.php"><?= $DICT['about_detailing']?></a></li>
		</ul>
	</div> 
	</div>
</header>