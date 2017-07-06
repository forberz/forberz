<?php
include('header.php');
$result = $DB->query("SELECT אזור,עיר,שם_החנות,כתובת,טלפון FROM `stores` 
WHERE אזור != 'תת_לא פעיל' and אזור != 'תת_לא_פעיל' ORDER BY priority");
$prev_area = '';
?>
	<div class="main">
		<h1><?= $DICT['about_forberz']?></h1>
		<h4 class="grey"><?= $DICT['about_forberz_sub']?></h4>
	</div>
	<div class="main abouter">
		<div class="about">
			<div class="about_side_pic">
				<img src="/img/a11">
			</div>
			<div class="about_text">
				<?= $DICT['about_forberz_text']?>
			</div>
		</div>
	</div>

<?php 
include('footer.php');
?>