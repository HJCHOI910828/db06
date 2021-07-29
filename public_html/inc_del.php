<?php
session_start();
$no=$_GET["no"];
$filename=$_GET["fname"];
$file_dir=$_SERVER["DOCUMENT_ROOT"]."/fileServer/".$filename;

if(file_exists($file_dir)){
	unlink($file_dir);
}

include "dbconn.php";
$query="delete from inc where no=$no";
mysqli_query($conn,$query);
mysqli_close($conn);
echo("<meta http-equiv='refresh' content='0;url=inc.php'>");
?>