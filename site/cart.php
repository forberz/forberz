<?php

$cart_items = isset($_GET['ids']) ? explode(';', $_GET['ids']) : array();
$coupon = isset($_GET['coupon']) ? preg_replace('/^[^a-zA-Z0-9]+$/', $_GET['coupon']) : '';

$CART_ITEMS = array();

foreach ($cart_items as $key => $value) {
	if (preg_match('/^\d+,\d+,\d+(,[^a-zA-Z0-9]+)?$/', $value)) {
		$value = explode(',', $value);
		$found = -1;
		
// var_dump($value);

		if (!isset($CART_ITEMS[$value[0]])) {
// var_dump('111111111111111111111111111111111111111111111111');
			$CART_ITEMS[$value[0]] = array();
		} else {
// var_dump('2222222222222222222222222222222222222222');
			foreach ($CART_ITEMS[$value[0]] as $size_key => $size_value) {
// var_dump($size_value);
				if ($size_value['size'] === intval($value[2])) {
					$found = $size_key;
					break;
				}
			}
		}
// var_dump($found);
		
		if ($found >= 0) {
// var_dump('333333333333333333333333333333333333333333');
			$CART_ITEMS[$value[0]][$found]['amount'] += intval($value[1]);
		} else {
// var_dump('444444444444444444444444444444444444444444444');
			$CART_ITEMS[$value[0]][] = array(
				'amount' => intval($value[1]),
				'size' => intval($value[2]),
				'coupon' => count($value) === 4 ? $value[3] : ''
			);
		}
	}
}

// var_dump($CART_ITEMS);
// exit;

if (!count($CART_ITEMS)) {
	$CART_ITEMS = null;
}

include_once('catalogue.php');
