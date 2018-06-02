<link rel="stylesheet" href="site/css/main.css"/>
<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>

<!-- <?php
$result = $DB->query("SELECT 
							id, prod_id, img, thumb,
							title_{$LANG} AS title,
							subtitle_{$LANG} AS subtitle
						FROM `gallery` 
						WHERE id IN (50,51,54,53) ORDER BY id");
?> -->
<p class="spacer">.</p>
<div class="webstrip">
	<img class="webstrip" src="img/webstrip.jpg" alt="Forberz - Natural Care and Detailing Products for Cars and Bikes" />
</div>
<div class="main_text">
	<?= $DICT['main_text']?>
</div>

<?php
$result = $DB->query("SELECT id, prod_id, img, thumb,
						title_{$LANG} AS title,
						subtitle_{$LANG} AS subtitle
					FROM `gallery` 
					WHERE id IN (106,107,108,109,110,111,112,113) ORDER BY id");
?>

<div class="ecoflex">
	<div class="ecosqr1">
		<div class="ecoico">
		</div>
		<div class="ecotxt">
			<h1><?= $DICT['mii_title']?></h1>
			<br>
			<?= $DICT['mii_text']?>
		</div>
	</div>
	<div class="ecosqr">
		<div class="ecoico">
		</div>
		<div class="ecotxt">
			<h1><?= $DICT['natural_title']?></h1>
			<br>
			<?= $DICT['natural_text']?>
		</div>
	</div>
	<div class="ecosqr2">
		<div class="ecoico">
		</div>
		<div class="ecotxt">
			<h1><?= $DICT['pro_title']?></h1>
			<br>
			<?= $DICT['pro_text']?>
		</div>
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
<div class="banner">
	<a href="/catalogue"><img class="banner" src="<?php echo $LANG === 'en' ? 'img/banner1en.jpg' : 'img/banner1he.jpg' ?>" alt="Forberz - Natural Care and Detailing Products for Cars and Bikes" /></a>
</div>
<!-- <div class="main_reviews">
	<div class="main_reviews_title">
		<h1><?= $DICT['reviews']?></h1>
	</div>
	<div class="main_reviews_text">
		<?= $DICT['review_text']?>
	</div>
</div> -->