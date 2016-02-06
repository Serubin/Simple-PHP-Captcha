<?php
/**
 * Simple PHP Catcha
 * Author: Serubin (Solomon Rubin)
 */

session_start();

// Random numbers
$code1=rand(1,10);
$code2=rand(1,10);

// Code storage
$_SESSION["captcha"]=$code1+$code2;

// Random color
$r = rand(64, 255);
$g = rand(64, 255);
$b = rand(64, 255);

// Color processing
$img = imagecreatetruecolor(100, 30);
$black = imagecolorallocate($img, 0, 0, 0); //background color blue
$darkcolor = imagecolorallocate($img, $r, $g, $b);
$lightcolor = imagecolorallocate($img, 255-$r, 255-$g, 255-$b);

imagecolortransparent($img, $black);

// Rendering
for($i = 0;$i < 15;$i++){
	imageline($img, rand(0,100), rand(0,50), rand(0,100), rand(0,50), $lightcolor);
}

// Text rendering
$imgstr = $code1 . " + " . $code2 . " = ";
$imgfont = "./georgia.ttf";
imagettftext($img, 20, 0, 10, 25, $darkcolor, $imgfont, $imgstr);

// Outputing
header("Cache-Control: no-cache, must-revalidate");
header('Content-type: image/png');

imagepng($img);
imagedestroy($img);
?>
