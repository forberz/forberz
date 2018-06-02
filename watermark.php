<?php

// Load the stamp and the photo to apply the watermark to
$stamp = imagecreatefrompng('./img/forberz.png');
$im = imagecreatefromjpeg($_GET['src']);

// Set the margins for the stamp and get the height/width of the stamp image
$marge_left = 30;
$marge_top = 30;
$sx = imagesx($stamp);
$sy = imagesy($stamp);

// Copy the stamp image onto our photo using the margin offsets and the photo 
// width to calculate positioning of the stamp. 
imagecopy($im, $stamp, $marge_left, $marge_top, 0, 0, imagesx($stamp), imagesy($stamp));

// Output and free memory
header('Content-type: image/png');
imagepng($im);
imagedestroy($im);