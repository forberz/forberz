<?php
include('header.php');
$result = $DB->query("SELECT אזור,עיר,שם_החנות,כתובת,טלפון FROM `stores` 
WHERE אזור != 'תת_לא פעיל' and אזור != 'תת_לא_פעיל' ORDER BY priority");
$prev_area = '';
?>
	<div class="main">
		<h1><?= $DICT['about_detailing']?></h1>
		<h4 class="grey"><?= $DICT['about_detailing_sub']?></h4>
	</div>
	<div class="main">
		<p><?= $DICT['about_detailing_text']?></p>
	</div>

<?php 
include('footer.php');
?>