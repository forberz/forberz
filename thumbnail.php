<?php
$src = $_GET['src'];

$image_path = "./tmp/" . preg_replace('/[^a-zA-Z0-9]/', '_', $src) . "_thumbnail.png";

if (file_exists($image_path)) {
	header('Location: ' . str_replace('./', '/', $image_path));
}else{
	header('Content-type: image/png');
	
	require_once('_img_functions.php');
	$src = verify_local_resourse($src, $image_path);

	// Load the stamp and the photo to apply the thumbnail to
	$im = imagecreatefromjpeg($src);
	
	// Set the margins for the stamp and get the height/width of the stamp image
	$width = 450;

	$thumb = imagescale($im, $width);
	imagetruecolortopalette($thumb, false, 256);

	// Output and free memory
	imagepng($thumb, null, 9);
	imagepng($thumb, $image_path, 9);
	imagedestroy($thumb);
	imagedestroy($im);
}