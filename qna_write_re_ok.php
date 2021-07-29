<?  include "dbconn.php";
    $writer = $_POST["writer"];
    $title = $_POST["title"];
    $content = $_POST["content"];
    $writeday = date("Y-m-d(h:i)");
    $step=1;
    $f_no= $_POST["f_no"];
    
    $query="insert into qna (writer,title,content,writeday,step,f_no) values
    ('$writer','$title','$content','$writeday',$step,$f_no)";
    mysqli_query($conn,$query);
?>
<meta http-equiv="refresh" content="0; url=qna.php">