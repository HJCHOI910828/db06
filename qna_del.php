<?
    $no=$_GET["no"];
    include "dbconn.php";
    $query="delete from qna where no=$no";
    mysqli_query($conn,$query);

?>
<meta http-equiv="refresh" content="0; url=qna.php">