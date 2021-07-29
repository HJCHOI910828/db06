<?
include "dbconn.php";
$no=$_GET["no"];
$filename=$_GET["fname"];

$file_dir = $_SERVER["DOCUMENT_ROOT"]."/fileServer/".$filename;
//파일서버의 파일부터 삭제한다.
if(file_exists($file_dir)){
    unlink($file_dir);
}
// 디비서버의 데이터를 삭제
$query="delete from inc where no=$no";
mysqli_query($conn,$query);
?>
<meta http-equiv="refresh" content="0; url=inc.php">