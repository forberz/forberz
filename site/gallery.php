<?php
include('header.php');

$result = $DB->query("SELECT 
						id, prod_id, img, thumb, video,
						title_{$LANG} AS title,
						subtitle_{$LANG} AS subtitle
					FROM `gallery` 
					WHERE in_gallery
					ORDER BY id LIMIT 200");

$prev_area = '';
?>
	<div class="main">
		<h1><?= $DICT['gallery']?></h1>
		<h4 class="grey"><?= $DICT['gallery_sub']?></h4>
	</div>
	<div class="main" id="gallery">
	<?php
		while ($row = $result->fetch_assoc()) {?>
				<div class="gallery-img" style="background-image: url('<?=$row['thumb']?>')" onclick="choosePic(
						'<?=trim($row['img'])?>', 
						'<?=trim(str_replace("'", "\\'", htmlspecialchars($row['title'])))?>', 
						'<?=trim(str_replace("'", "\\'", htmlspecialchars($row['subtitle'])))?>', 
						<?=isset($row['video']) ? "'".trim($row['video'])."'" : 'null' ?>)">
					<div class="fader"><b><?=$row['title']?></b><br><?=$row['subtitle']?></div>
					<?php if (isset($row['video'])) { ?><div class="videomark">VIDEO</div><?php } ?>
				</div>
			<?php
		} ?>
	</div>
	<div id="blackend">
		<div class="close" onclick="closePic()">&times;</div>
		<img id="the-pic" class="hidden" />
		<iframe id="the-video" width="560" height="315" frameborder="0" allowfullscreen class="hidden"></iframe>
		<div id="the-pic-description">
			<div id="the-pic-title"></div>
			<div id="the-pic-subtitle"></div>
		</div>
	</div>
<?php 
include('footer.php');
?>