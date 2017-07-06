<?php
include('header.php');

$result = $DB->query("SELECT id, "
	. $DB->real_escape_string('author_'.$LANG) ." AS author,"
	. $DB->real_escape_string('title_'.$LANG) ." AS title,"
	. $DB->real_escape_string('subtitle_'.$LANG) ." AS subtitle,"
	. $DB->real_escape_string('text_'.$LANG) ." AS text, img 
	FROM `guide` 
".($GUIDE ? "WHERE id = {$GUIDE}" : "")." ORDER BY id LIMIT " . ($GUIDE !== false ? 1 : ($LIMIT ? $LIMIT : 5) ));

if ($GUIDE === false) {
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

			<div  <?= $GUIDE ? '' : 'onclick="document.location=\'?guide=' . $row['id'] . '\'"' ?>>
				<div class="guide_img <?= $GUIDE ? 'guide' : '' ?>">
					<img class="guide_thumb" src="<?= $row['img'] ?>">
					<?php if (!$GUIDE) { ?>
						<a href="?guide=<?=$row['id']?>" class="cat_nav">More Info</a>
					<?php } ?>
				</div>

				<div><?= $GUIDE ? $row['text'] : substr(strip_tags($row['text']), 0, 300) . '...' ?></div>
			</div>
		</div>
	<?php } ?>
</div>	

<?php
include('footer.php');
?>