<?php
session_start();
function getCaptcha($input){
    header("Content-Type: image/png");
    $size = @imagecreate(100, 50) or die("ERROR Function");
    $background_color = imagecolorallocate($size, 67,216,84);
    $text_color = imagecolorallocate($size, 255,255,255);
    imagestring($size,10,25,20,$input, $text_color);
    imagepng($size);
    imagedestroy($size);
}
getCaptcha($_SESSION['captcha']);