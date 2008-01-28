<?php
$w = 20;
$h = 20;
if($_REQUEST['w'])
	if($_REQUEST['w'] > 0)
		$w = $_REQUEST['w'];
	else
		$w = 2;

if($_REQUEST['h'])
	if($_REQUEST['h'] > 0)
		$h = $_REQUEST['h'];
	else
		$h = 2;

$img = imagecreatetruecolor($w, $h);
$green = ImageColorAllocate($img, 100, 200, 100);
imagefill($img, 0, 0, $green);
imageinterlace($img,1);
header("Content-Type: image/png");
imagepng($img);
imagedestroy($img);
?>