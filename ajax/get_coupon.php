<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require '../conn.php';

$query = "SELECT C.min_quantity, C.price_". $DB->real_escape_string($_POST['lang']) ." AS price, C.size
	FROM `coupons` AS C 
	WHERE id = '". $DB->real_escape_string($_POST['coupon']) ."' AND prod_id = '". $DB->real_escape_string($_POST['prod_id']) ."'
	LIMIT 1";

// var_dump($query);

if (($result = $DB->query($query)) && ($row = $result->fetch_object())) {
	echo json_encode(array(
		'error' => false,
		'min_quantity' => $row->min_quantity,
		'price' => $row->price,
		'size' => $row->size
	));
} else {
	echo json_encode(array(
		'error' => true
	));
}

