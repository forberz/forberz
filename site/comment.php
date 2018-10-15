<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	if (!empty($_POST['comment_table'])) {
		$TABLE_NAME = $_POST['comment_table'];
		
		if (!empty($_POST['comment_obj_id'])) {
			$obj_id = intval($_POST['comment_obj_id']);
		}
		
		if (
			!empty($_POST['comment_hack']) && $_POST['comment_hack'] === 'ok' 
			&& !empty($_POST['comment_data']) && $_POST['comment_data'] === strip_tags($_POST['comment_data'])
			&& !preg_match('/https?:\/\//', $_POST['comment_data'])
			&& in_array($_POST['comment_table'], array('index', 'gallery', 'shops', 'products', 'contact'))
			&& (!isset($_SESSION['timeout_' . $TITLE]) || $_SESSION['timeout_' . $TITLE] + 1800 < time())
		) {
			$_SESSION['timeout_' . $TITLE] = time();

			// var_dump($_POST);
			
			$_POST['comment_data'] = mb_substr(strip_tags($_POST['comment_data']), 0, 1024, 'utf-8');
			$_POST['comment_author'] = mb_substr(strip_tags($_POST['comment_author']), 0, 256, 'utf-8');
			$_POST['comment_business'] = mb_substr(strip_tags($_POST['comment_business']), 0, 256, 'utf-8');

			$query = "INSERT INTO `comments` (`lang`, `table_name`, `obj_id`, `data`, `author`, `business`) 
					VALUES ('{$LANG}', '{$TABLE_NAME}', '{$obj_id}', \"" . $DB->escape_string($_POST['comment_data']) . "\", " . 
						(isset($_POST['comment_author']) ? '"' . $DB->escape_string($_POST['comment_author']) . '"' : "NULL") . ", " . 
						(isset($_POST['comment_business']) ? '"' . $DB->escape_string($_POST['comment_business']) . '"' : "NULL") . ")";

			// var_dump($query);

			$result = $DB->query($query);
			$new_id = $DB->insert_id;

			@mail('sales@forberz.com', 'You got new commment :)', mb_substr(
				'New comment from - ' . 
				(isset($_POST['comment_author']) ? '"' . $_POST['comment_author'] . '"' : "") . 
				(isset($_POST['business']) ? '"' . $_POST['business'] . '"' : "") . 
				"\n\nDATA: " . (isset($_POST['comment_data']) ? '"' . $_POST['comment_data'] . '"' : "NULL"
			), 0, 2048, 'utf-8'));
		}
	}
}

$query = "SELECT 
		C.id, 
		C.table_name,
		C.obj_id,
		C.data,
		C.author,
		C.business,
		C.priority,
		C.edit_date
	FROM `comments` AS C 
	WHERE C.active = 1 AND C.lang = \"" . $LANG . "\" AND C.table_name = \"" . $TABLE_NAME . "\"
		".($ID ? " AND C.obj_id = \"" . $obj_id . '"' : "") ."
	ORDER BY " . ($ID ? "C.priority, C.edit_date DESC" : (isset($new_id) ? "id={$new_id}, " : "") . "RAND()") . " 
	". ($ID ? "" : "LIMIT 10");

// var_dump($query);

$result = $DB->query($query);

$comments = array();
$items = array();
$citer = 0;

while ($row = $result->fetch_assoc()) {
	$comments[] = $row;
	
	if (isset($TABLE_NAMES[$row['table_name']])) {
		if (!isset($items[$row['table_name']])) {
			$items[$row['table_name']] = array();
		}
		
		$items[$row['table_name']][$row['obj_id']] = true;
	}

	++$citer;
}

foreach ($items as $table => $ids) {
	$query ="
		SELECT 
			id,
			linktxt_{$LANG} AS linktxt,
			title_{$LANG} AS title, 
			subtitle_{$LANG} AS subtitle
		FROM `$table` 
		WHERE id IN (" . implode(",", array_keys($ids)) . ")";

	// var_dump($query);
	
	$result = $DB->query($query);
	
	while ($row = $result->fetch_assoc()) {
		$items[$table][$row['id']] = $row;
	}
}

if ($PAGE !== 'contact'){
?>
<div class="h_img">
	<h2 id="comments_title"><?=$DICT['feedback']?></h2>
</div>
<?php } ?>

<div id="comments" style="height: <?= 400 * max(1, ceil(count($comments)/3))?>px">
	<?php
		foreach ($comments as $row) {
	?>
	<div class="comment">
		<div class="comment-data"><?=$row['data']?></div>
		<?php if (!empty($row['author'])) { ?>
			<div class="comment-author"><?=$row['author']?></div>
		<?php } ?>
		<?php if (!empty($row['business'])) { ?>
			<div class="comment-business"><?=$row['business']?></div>
		<?php } ?>
		<?php if (isset($TABLE_NAMES[$row['table_name']]) && empty($ID)) { ?>
			<br>
		<a class="commentproductname" href="<?=$TABLE_NAMES[$row['table_name']]?>/<?=$items[$row['table_name']][$row['obj_id']]['linktxt']?>" class="cat_nav">
			<?=$items[$row['table_name']][$row['obj_id']]['title']?> - <?=$items[$row['table_name']][$row['obj_id']]['subtitle']?>
		</a>
		<?php } ?>
	</div>
	<?php
		}
	?>
	<form name="comment" class="comment" action="?" method="POST">
		<h3><?=$DICT['tellus']?></h3>
		<br>
		<textarea id="comment_data" name="comment_data" placeholder="<?=$DICT['comment_data']?>" required="required" 
			onfocus="document.getElementById('comment_hack').value = 'ok'"></textarea>
		<input type="text" id="comment_author" name="comment_author" maxlength="255" placeholder="<?=$DICT['comment_author']?>" />
		<input type="text" id="comment_business" name="comment_business" maxlength="255" placeholder="<?=$DICT['comment_business']?>" />
		<input type="hidden" id="comment_hack" name="comment_hack" value="no-ok" />
		<input type="hidden" name="comment_table" value="<?=$TABLE_NAME?>" />
		<input type="hidden" name="comment_obj_id" value="<?=$obj_id?>" />
		<input type="submit" id="comment_submit" name="comment_submit" value="<?=$DICT['comment_send']?>" />
	</form>
</div>
