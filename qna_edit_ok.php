<?
    $no = $_POST["no"];
    $title = $_POST["title"];
    $content = $_POST["content"];
    $writer = $_POST["writer"];
    include "dbconn.php";

    $query="update qna set writer='$writer',title='$title',content='$content' where no=$no";
    mysqli_query($conn,$query);
?>
<meta http-equiv="refresh" content="0; url=qna.php">