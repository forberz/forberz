<?php
include('header.php');

$result = $DB->query("SELECT id, 
						author_{$LANG} AS author,
						title_{$LANG} AS title,
						subtitle_{$LANG} AS subtitle,
						text_{$LANG} AS text, img 
					FROM `guide` 
					".($ID ? "WHERE id = {$ID}" : "")." 
					ORDER BY id 
					LIMIT " . ($ID !== false ? 1 : ($LIMIT ? $LIMIT : 100) ));

if ($ID === false) {
?>
<div class="main">
	<h1><?= $DICT['guide']?></h1>
	<h4 class="grey"><?= $DICT['guide_sub']?></h4>
</div>
<?php } ?>
<div class="guide">
	<?php while ($row = $result->fetch_assoc()) { ?>
		<div class="guide_item">
			<div class="guide_header">
				<h1><?= $row['title']?></h1>
				<h4 class="grey"><?= $row['subtitle']?></h4>
			</div>

			<div  <?= $ID ? '' : 'onclick="document.location=\'?id=' . $row['id'] . '\'"' ?>>
				<div class="guide_img <?= $ID ? 'guide' : '' ?>">
					<img class="guide_thumb" src="<?= $row['img'] ?>">
					<?php if (!$ID) { ?>
						<a href="?id=<?=$row['id']?>" class="cat_nav">More Info</a>
					<?php } ?>
				</div>

				<div><?= $ID ? $row['text'] : substr(strip_tags($row['text']), 0, 300) . '...' ?></div>
			</div>
		</div>
	<?php } ?>
</div>	

<?php
include('footer.php');
?>