<?php
include('header.php');

$result = $DB->query("SELECT id, prod_id, img, thumb,"
	. $DB->real_escape_string('title_'.$LANG) ." AS title,"
	. $DB->real_escape_string('subtitle_'.$LANG) ." AS subtitle
	FROM `gallery` ORDER BY id LIMIT 200");

$prev_area = '';
?>
	<div class="main">
		<h1><?= $DICT['gallery']?></h1>
		<h4 class="grey"><?= $DICT['gallery_sub']?></h4>
	</div>
	<div class="main" id="gallery">
	<?php
		$dir = '../gallery/';
		while ($row = $result->fetch_assoc()) {?>
				<div class="gallery-img" style="background-image: url('<?=$row['thumb']?>')" onclick="choosePic('<?=$row['img']?>', '<?=str_replace("'", "\\'", $row['title'])?>', '<?=str_replace("'", "\\'", $row['subtitle'])?>')">
					<div class="fader"><b><?=$row['title']?></b><br><?=$row['subtitle']?></div>
				</div>
			<?php
		} ?>
	</div>
	<div id="blackend">
		<div class="close" onclick="closePic()">&times;</div>
		<img id="the-pic" />
		<div id="the-pic-title"></div>
		<div id="the-pic-subtitle"></div>
	</div>
<?php 
include('footer.php');
?>