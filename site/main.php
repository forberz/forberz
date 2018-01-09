<link rel="stylesheet" href="site/css/main.css"/>
<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>

<?php
$result = $DB->query("SELECT 
							id, prod_id, img, thumb,
							title_{$LANG} AS title,
							subtitle_{$LANG} AS subtitle
						FROM `gallery` 
						WHERE id IN (50,51,54,53) ORDER BY id");
?>

<!-- <div class="main">
	<h1><?=$DICT['main_h1']?></h1>
	<h3 class="grey"><?=$DICT['main_h2']?></h3>
	<span class="highline"><?=$DICT['main_p']?></span>
</div> -->

<div class="slide_img">
	<?php while ($row = $result->fetch_assoc()) {?>
    <div><img src="<?=$row['img']?>"></div>
    <?php }?>
</div>

  <script type="text/javascript">
    $(document).ready(function(){
      $('.slide_img').slick({
			lazyLoad: 'progressive',
			centerMode: true,
			centerPadding: navigator.userAgent.match(/iPhone|iPad|iPod|Android/i) ? '0px' : '150px',
			slidesToShow: 1,
			dots: true,
			autoplay: true,
 			autoplaySpeed: 5000
      });
    });
  </script>

<!-- <div class="main_mii">
	<div class="main_mii_title">
		<h1><?= $DICT['mii_title']?></h1>
	</div>
	<div class="main_mii_text">
		<?= $DICT['mii_text']?>
	</div>
</div> -->

<?php
$result = $DB->query("SELECT id, prod_id, img, thumb,
						title_{$LANG} AS title,
						subtitle_{$LANG} AS subtitle
					FROM `gallery` 
					WHERE id IN (106,107,108,109,110,111,112,113) ORDER BY id");
?>


<!-- <div class="main_natural">
	<div class="main_natural_title">
		<h1><?= $DICT['natural_title']?></h1>
	</div>
	<div class="main_natural_text">
		<?= $DICT['natural_text']?>
	</div>
</div> -->


<div class="buyflex">
	<a href="catalogue/6"><div class="buysqr">
		<br>
		<h2>Forberz ReWax Cold White</h2>
		<br>
		<img src="img/forberz_rewax_cold_white.jpg">
	</div></a>
	<a href="catalogue/5">
		<div class="buysqr">
		<br>
		<h2>Forberz ReWax Hot Black</h2>
		<br>
		<img src="img/forberz_rewax_hot_black.jpg">
	</div></a>
	<a href="catalogue/7">
		<div class="buysqr">
		<br>
		<h2>Forberz Jantie</h2>
		<br>
		<img src="img/forberz_jantie.jpg">
	</div></a>
</div>
<br><br>
<div class="ecoflex">
	<div class="ecosqr1">
		<div class="ecoico">
		</div>
		<div class="ecotxt">
			<h1>Israeli Technology<br>Original Recipe</h1>
		</div>
	</div>
	<div class="ecosqr">
		<div class="ecoico">
		</div>
		<div class="ecotxt">
			<h1>100% Natural<br>Eco Friendly</h1>
		</div>
	</div>
	<div class="ecosqr2">
		<div class="ecoico">
		</div>
		<div class="ecotxt">
			<h1>Professional Detailing<br>Paint Shop Safe</h1>
		</div>
	</div>
</div>
<!-- <div class="main_nosilicone">
	<div class="main_nosilicone_title">
		<h1><?= $DICT['nosilicone_title']?></h1>
	</div>
	<div class="main_nosilicone_text">
		<?= $DICT['nosilicone_text']?>
	</div>
</div>

<div class="main_easyuse">
	<div class="main_easyuse_title">
		<h1><?= $DICT['easyuse_title']?></h1>
	</div>
	<div class="main_easyuse_text">
		<?= $DICT['easyuse_text']?>
	</div>
</div>
 -->
 <br>
<div class="main_reviews">
	<div class="main_reviews_title">
		<h1><?= $DICT['reviews']?></h1>
	</div>
	<div class="main_reviews_text">
		<?= $DICT['review_text']?>
	</div>
</div>
<div class="main_clients">
	<div class="main_clients_title">
		<h2><?= $DICT['clients']?></h2>
	</div>
	<div class="main_clients_text">
		<?php while ($row = $result->fetch_assoc()) {?>
    	<div class="client_logo"><img class="client_logo" src="<?=$row['img']?>"></div>
    	<?php }?>
	</div>
</div>