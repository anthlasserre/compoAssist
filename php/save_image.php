<?php
ini_set('error_log', './log/errors.log'); // Logging file
$imagedata = base64_decode($_POST['imgdata']);
$filename = md5(uniqid(rand(), true));
//path where you want to upload image
$file = $_SERVER['DOCUMENT_ROOT']. "/gameComposition/save/".$filename.'.png';
$imageurl  = 'http://localhost/gameComposition/save/'.$filename.'.png';
file_put_contents($file,$imagedata);
echo $imageurl;
?>