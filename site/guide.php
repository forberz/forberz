<?php
include('header.php');

$result = $DB->query("SELECT id, ". $DB->real_escape_string('author_'.$LANG) ." AS author,". $DB->real_escape_string('title_'.$LANG) ." AS title,". $DB->real_escape_string('subtitle_'.$LANG) ." AS subtitle,". $DB->real_escape_string('text_'.$LANG) ." AS text FROM `guide` 
".($GUIDE ? "WHERE id = {$GUIDE}" : "")." ORDER BY add_date LIMIT " . ($GUIDE !== false ? 1 : $LIMIT or 1 ));
?>
	<div class="main">
		<h1><?= $DICT['guide']?></h1>
		<h4 class="grey"><?= $DICT['guide_sub']?></h4>
	</div>
	
	<div class="guide">
		<?php while ($row = $result->fetch_assoc()) { ?>
		<div class="guide_item">
			<div class="guide_header">
				<h1><?= $row['title']?></h1>
				<h2><?= $row['subtitle']?></h2>
			</div>

			<div  <?= $GUIDE ? '' : 'onclick="document.location=\'?guide=' . $row['id'] . '\'"' ?>>
				<div class="prod_img_buy <?= $GUIDE ? 'guide' : '' ?>">
					<img src="<?php // echo $row['img'] ?>">
					<?php if (!$GUIDE) { ?>
						<a href="?guide=<?=$row['id']?>" class="cat_nav">More Info</a>
					<?php } ?>
				</div>

				<div><?= $GUIDE ? $row['text'] : substr($row['text'], 0, 300) . '...' ?></div>
			</div>
		</div>
	<?php } ?>
	</div>

<?php
if (isset($_GET['guide'])) {
	include('product_page_bottom.php');
}

include('footer.php');
?>