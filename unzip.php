
<?php


$filename = $_GET['file'];
$zip = new ZipArchive;
$res = $zip->open($filename);
if ($res === TRUE) {

 // Unzip path
 $path = ".";

 // Extract file
 $zip->extractTo($path);
 $zip->close();

 echo '<h1>Unzip Complete<h1>';
} else {
 echo 'failed!';
}


?>