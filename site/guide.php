<?php
include('header.php');

$result = $DB->query("SELECT id, 
						author_{$LANG} AS author,
						title_{$LANG} AS title,
						subtitle_{$LANG} AS subtitle,
						text_{$LANG} AS text, img 
					FROM `guide` 
					".($ID ? "WHERE id = " . $DB->escape($ID) : "")." 
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
		<div class="guide_item" <?= $ID ? '' : 'onclick="document.location=\'/guide/' . $row['id'] . '\'"' ?>>
			<div class="guide_header <?= isset($_GET['id']) ? 'inside' : '' ?>">
				<h1><?= $row['title']?></h1>
				<h4 class="grey"><?= $row['subtitle']?></h4>

				<div class="guide_body <?= isset($_GET['id']) ? 'inside' : '' ?>">
					<div class="guide_img <?= $ID ? 'guide' : '' ?>">
						<img class="guide_thumb" src="<?= $row['img'] ?>">
						<div>
							<?= $ID ? $row['text'] : mb_substr(strip_tags($row['text']), 0, 300, 'utf-8') . '...' ?>
						</div>
						<?php if (!$ID) { ?>
							<a href="guide/<?=$row['id']?>" class="cat_nav">More Info</a>
						<?php } ?>
					</div>
				</div>
			</div>
			
			<?php if (isset($_GET['id'])) { 
				echo '<div class="guide_side_wrap">
					<h2>More Guides</h2>';
				$resultIn = $DB->query("SELECT id, 
										author_{$LANG} AS author,
										title_{$LANG} AS title,
										subtitle_{$LANG} AS subtitle,
										text_{$LANG} AS text, img 
									FROM `guide` 
									".($ID ? "WHERE id != {$ID}" : "")." 
									ORDER BY id 
									LIMIT 3");

				while ($rowIn = $resultIn->fetch_assoc()) { ?>
				<a href="guide/<?=$rowIn['id']?>" class="guide_side">
					<div class="guide_header">
						<h3><?= $rowIn['title']?></h3>
						<h4 class="grey"><?= $rowIn['subtitle']?></h4>
						<img class="guide_thumb" src="<?= $rowIn['img'] ?>" />
						<a href="guide/<?=$rowIn['id']?>" class="cat_nav">More Info</a>
					</div>
				</a>
			<?php
				}
				echo '</div>'; 
			} ?>
		</div>
	<?php } ?>
</div>	

<?php
include('footer.php');
?>
