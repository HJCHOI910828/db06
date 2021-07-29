<?
session_start();
include "dbconn.php";
$no = $_GET["no"];
$p_no= $_GET["p_no"];
$sql="delete from notice_re where no=$no";
mysqli_query($conn,$sql);
?>

<meta http-equiv="refresh" content="0; url=inc_content.php?no=<?=$p_no?>">