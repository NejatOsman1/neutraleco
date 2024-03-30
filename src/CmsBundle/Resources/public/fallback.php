<?php
// From the .htaccess, we expect the q parameter to hold the wanted file path
if(!empty($_GET['q'])){
	// Store path
	$failedPath = $_GET['q'];
	// Guess extension based on the path
	$guessedExtension = preg_replace('/^.*?\.(\w+)$/', '$1', $failedPath);

	$source_image = 'placeholder-image.png';
	$png = imagecreatefrompng('./' . $source_image);
	list($newwidth, $newheight) = getimagesize('./' . $source_image);


	switch ($guessedExtension) {
		case 'png':
			header("Content-Type: image/png");
			$im = @imagecreate($newwidth, $newheight) or die('');
			imagealphablending($im, false);
			imagesavealpha($im, true);
			$background_color = imagecolorallocate($im, 200, 200, 200);
			imagecopyresampled($im, $png, 0, 0, 0, 0, $newwidth, $newheight, $newwidth, $newheight);
			imagepng($im);
			imagedestroy($im);
			break;
		case 'jpg':
		case 'jpeg':
			header("Content-Type: image/jpeg");
			$im = @imagecreate($newwidth, $newheight) or die('');
			imagealphablending($im, false);
			imagesavealpha($im, true);
			$background_color = imagecolorallocate($im, 200, 200, 200);
			imagecopyresampled($im, $png, 0, 0, 0, 0, $newwidth, $newheight, $newwidth, $newheight);
			imagejpeg($im);
			imagedestroy($im);
			break;
		case 'gif':
			header("Content-Type: image/gif");
			$im = @imagecreate($newwidth, $newheight) or die('');
			imagealphablending($im, false);
			imagesavealpha($im, true);
			$background_color = imagecolorallocate($im, 200, 200, 200);
			imagecopyresampled($im, $png, 0, 0, 0, 0, $newwidth, $newheight, $newwidth, $newheight);
			imagegif($im);
			imagedestroy($im);
			break;
		
		default: break;
	}
}