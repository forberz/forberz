<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require '../conn.php';

$query = "SELECT C.min_quantity, C.price_". $DB->real_escape_string($_POST['lang']) ." AS price, C.size
	FROM `coupons` AS C 
	WHERE code = '". $DB->real_escape_string($_POST['coupon']) ."' 
		AND (ISNULL(prod_id) OR prod_id = 0 OR prod_id = '". $DB->real_escape_string($_POST['prod_id']) .")'";

// var_dump($query);

$results = array();

$result = $DB->query($query);

while ($row = $result->fetch_object()) {
	$results[] = array(
		'min_quantity' => $row->min_quantity,
		'price' => $row->price,
		'size' => $row->size
	);
}

echo json_encode(array(
	'error' => !!count($results),
	'results' => $results
));