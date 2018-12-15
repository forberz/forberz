<header>
	<div class="black_wrap">
	<!-- <div class="social">
	</div> -->
	<div class="top">
		<a href="/">
			<img class="logo" src="img/forberz.png" alt="Forberz - Natural Care and Detailing Products for Cars and Bikes" />
		</a>
	</div>
	
	<div class="main_menu">
		<ul class="main_menu">
		  <li><a href="/catalogue/" <?= strpos($_SERVER['PHP_SELF'], 'catalogue') !== false ? 'class="grey"' : ''?>><?= $DICT['cata']?></a></li>
		  <li><a href="/shops/"<?= strpos($_SERVER['PHP_SELF'], 'shops') !== false ? 'class="grey"' : ''?>><?= $DICT['wherebuy']?></a></li>
		  <!-- <li><a href="/guide/"<?= strpos($_SERVER['PHP_SELF'], 'guide') !== false ? 'class="grey"' : ''?>><?= $DICT['guide']?></a></li> -->
		  <!-- <li><a href="/gallery/"<?= strpos($_SERVER['PHP_SELF'], 'gallery') !== false ? 'class="grey"' : ''?>><?= $DICT['gallery']?></a></li> -->
		  <li><a href="/contact/"<?= strpos($_SERVER['PHP_SELF'], 'contact') !== false ? 'class="grey"' : ''?>><?= $DICT['contact']?></a></li>
		  <!-- <li class="opmenu"><a href="/about_forberz/"<?= strpos($_SERVER['PHP_SELF'], 'about_forberz') !== false ? 'class="grey"' : ''?>><?= $DICT['about_forberz']?></a></li>
		  <li class="opmenu"><a href="/about_detailing/"<?= strpos($_SERVER['PHP_SELF'], 'about_detailing') !== false ? 'class="grey"' : ''?>><?= $DICT['about_detailing']?></a></li> -->
		  <li class="opmenu">
		  	<ul class="lang_menu">  
			<?php
				$LANGS_TITLES = array('he' => 'עברית' , /*'ru' => 'Русский', */'en' => ' English ');
				
				foreach ($LANGS_TITLES AS $L => $LT) {
					echo '<li><a href="https://'.$SITES[$L].'/'.$current_page.($ID ? '/' . ($LANG === $L ? $ID : $res['linktxt']) : '').'" '.($LANG === $L ? 'class="grey"' : '').'>'.$LT.'</a></li>';
				}
			?>
			</ul>
		  </li>
		</ul>
	</div> 
	</div>
</header>
