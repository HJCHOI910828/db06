<?php
session_start();
$writer="admin";
$title=$_POST["title"];
$content=$_POST["content"];
$writeday=date("Y-m-d(h:i)");

$uploaddir=$_SERVER["DOCUMENT_ROOT"]."/fileServer/";
$uploadfile=$uploaddir.basename($_FILES["userfile"]["name"]);
$fname=basename($_FILES["userfile"]["name"]);
move_uploaded_file($_FILES["userfile"]["tmp_name"],$uploadfile);
include "dbconn.php";
$query="insert into inc (writer,title,content,writeday,fname) values ('$writer','$title','$content','$writeday','$fname')";
mysqli_query($conn,$query);
mysqli_close($conn);
echo("<meta http-equiv='refresh' content='0;url=inc.php'>");
?>