<?php 

$lat=$_POST['lat'];
$lng=$_POST['lng'];
$ten=$_POST['ten'];
$note=$_POST['note'];

file_put_contents("test.txt", $lat.", ".$lng.", ".$ten.", ".$note);

?>

