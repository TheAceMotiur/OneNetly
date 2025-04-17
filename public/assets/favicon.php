<?php
// Set the content type to PNG
header('Content-Type: image/png');

// Create a 32x32 image
$img = imagecreatetruecolor(32, 32);

// Colors
$background = imagecolorallocate($img, 52, 58, 64); // Dark gray
$text = imagecolorallocate($img, 255, 255, 255); // White
$accent = imagecolorallocate($img, 3, 168, 124); // Green accent

// Fill the background
imagefilledrectangle($img, 0, 0, 32, 32, $background);

// Add a decorative element
imagefilledrectangle($img, 0, 28, 32, 32, $accent);

// Add letter "O" for OneNetly
imagestring($img, 5, 10, 8, "O", $text);

// Output the image
imagepng($img);
imagedestroy($img);
