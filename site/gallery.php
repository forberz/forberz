<?php
include('header.php');
$result = $DB->query("SELECT אזור,עיר,שם_החנות,כתובת,טלפון FROM `stores` 
WHERE אזור != 'תת_לא פעיל' and אזור != 'תת_לא_פעיל' ORDER BY priority");
$prev_area = '';
?>
	<div class="main">
		<h1><?= $DICT['gallery']?></h1>
		<h4 class="grey"><?= $DICT['gallery_sub']?></h4>
	</div>
	<div class="main" id="gallery">
		<?php
			$dir = '../gallery/';
			if ($handle = opendir($dir)) {
				while (false !== ($entry = readdir($handle))) {
					if ($entry != "." && $entry != "..") { ?>
						<div class="gallery-img" style="background-image: url('<?=$dir.$entry?>')" onclick="choosePic('<?=$dir.$entry?>')"></div>
					<?php 
					}
				}
				closedir($handle);
		} ?>
	</div>
	<div id="blackend">
		<div class="close" onclick="closePic()">&times;</div>
		<img id="the-pic" />
	</div>
<?php 
include('footer.php');
?>