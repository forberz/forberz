<?php

$cart_items = isset($_GET['ids']) ? explode(';', $_GET['ids']) : array();
$coupon = isset($_GET['coupon']) ? preg_replace('/[^a-zA-Z0-9]/', $_GET['coupon']) : '';

$CART_ITEMS = array();

foreach ($cart_items as $key => $value) {
	if (preg_match('/^\d+,\d+,\d+$/', $value)) {
		$value = explode(',', $value);
		$CART_ITEMS[$value[0]] = array(
			'amount' => $value[1],
			'size' => $value[2]
		);
	}
}

if (!count($CART_ITEMS)) {
	$CART_ITEMS = null;
}

include_once('catalogue.php');
