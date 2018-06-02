<?php

$src = $_GET['src'];

header('Content-type: image/png');

$image_path = "./tmp/" . preg_replace('/[^a-zA-Z0-9]/', '_', $src) . "_watermark.png";

if (file_exists($image_path)) {
	header('Location: ' . str_replace('./', '/', $image_path));
}else{
	header('Content-type: image/png');

	require_once('_img_functions.php');
	$src = verify_local_resourse($src, $image_path);

	// Load the stamp and the photo to apply the watermark to
	$stamp = imagecreatefrompng('./img/forberz.png');
	$im = imagecreatefromjpeg($src);

	// Set the margins for the stamp and get the height/width of the stamp image
	$marge_left = 30;
	$marge_top = 30;
	$sx = imagesx($stamp);
	$sy = imagesy($stamp);

	// Copy the stamp image onto our photo using the margin offsets and the photo 
	// width to calculate positioning of the stamp. 
	// $im = imagescale($im, 1024);
	imagecopy($im, $stamp, $marge_left, $marge_top, 0, 0, imagesx($stamp), imagesy($stamp));
	// imagetruecolortopalette($im, false, 256);

	// Output and free memory
	imagepng($im, null, 9);
	imagepng($im, $image_path, 9);
	imagedestroy($im);
}