<?php

require '../conn.php';

$query = "SELECT C.min_quantity, C.price, C.size
	FROM `coupons` AS C 
	WHERE id = '". $DB->real_escape_string($_POST['coupon']) ."'
	LIMIT 1";

// var_dump($query);

$result = $DB->query($query);

if ($row = $result->fetch_object()) {
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

