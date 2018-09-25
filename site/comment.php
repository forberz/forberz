<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	if (empty($_POST['comment_hack']) || $_POST['comment_hack'] !== 'ok') {
		header("HTTP/1.1 301 Moved Permanently");
		header('Location: /');
		exit(-1);
	}
	
	if (!isset($_SESSION['timeout_' . $TITLE]) || $_SESSION['timeout_' . $TITLE] + 1800 > time()) {
		$_SESSION['timeout_' . $TITLE] = time();

		// var_dump($_POST);

		$query = "INSERT INTO `comments` (`lang`, `table_name`, `obj_id`, `data`, `author`, `business`) 
				VALUES ('{$LANG}', '{$TABLE_NAME}', '{$obj_id}', \"" . $DB->escape_string($_POST['comment_data']) . "\", " . (isset($_POST['comment_author']) ? '"' . $DB->escape_string($_POST['comment_author']) . '"' : "NULL") . ", " . (isset($_POST['comment_business']) ? '"' . $DB->escape_string($_POST['comment_business']) . '"' : "NULL") . ")";

		// var_dump($query);

		$result = $DB->query($query);
		$new_id = $DB->insert_id;

		@mail('forberz@012.net.il', 'You got new commment :)', 'New comment from - ' . (isset($_POST['comment_author']) ? '"' . $_POST['comment_author'] . '"' : "") . (isset($_POST['business']) ? '"' . $_POST['business'] . '"' : "") . "\n\nDATA: " . (isset($_POST['comment_data']) ? '"' . $_POST['comment_data'] . '"' : "NULL"));
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
	WHERE C.active = 1 
		".($ID ? " AND C.table_name = \"" . $TABLE_NAME . "\" AND C.obj_id = \"" . $obj_id . '"' : "") ."
	ORDER BY " . ($ID ? "C.priority, C.edit_date DESC" : (isset($new_id) ? "id={$new_id}, " : "") . "RAND()") . " 
	". ($ID ? "" : "LIMIT 10"); // AND C.lang = \"" . $LANG . "\"

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

?>

<div id="comments">
	<h1><?=$DICT['feedback']?></h1>

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
		<?php if (isset($TABLE_NAMES[$row['table_name']])) { ?>
		<a href="<?=$TABLE_NAMES[$row['table_name']]?>/<?=$items[$row['table_name']][$row['obj_id']]['linktxt']?>" class="cat_nav"><?=$items[$row['table_name']][$row['obj_id']]['title']?> - <?=$items[$row['table_name']][$row['obj_id']]['subtitle']?></a>
		<?php } ?>
	</div>
	<?php
		}
	?>
	<form name="comment" class="comment" action="?" method="POST">
		<h3><?=$DICT['tellus']?></h3>
		<br>
		<textarea id="comment_data" name="comment_data" placeholder="<?=$DICT['comment_data']?>" required="required" onfocus="document.getElementById('comment_hack').value = 'ok'"></textarea>
		<input type="text" id="comment_author" name="comment_author" maxlength="255" placeholder="<?=$DICT['comment_author']?>" />
		<input type="text" id="comment_business" name="comment_business" maxlength="255" placeholder="<?=$DICT['comment_business']?>" />
		<input type="hidden" id="comment_hack" name="comment_hack" value="no-ok" />
		<input type="submit" id="comment_submit" name="comment_submit" value="<?=$DICT['comment_send']?>" />
	</form>
</div>
