<? include("dbconn.php"); ?>

<?
    $writer = $_POST["writer"];
    $title = $_POST["title"];
    $content=$_POST["content"];
    $writeday=date("Y-m-d(h:i)");
    $fname = basename($_FILES["fname"]["name"]);

    //파일서버에 파일올리기
    $uploaddir = $_SERVER["DOCUMENT_ROOT"]."/fileServer/";
    $uploadfile = $uploaddir.basename($_FILES["fname"]["name"]);
    move_uploaded_file($_FILES["fname"]["tmp_name"],$uploadfile);

    //Db서버에 파일정보 올리기.
    $query = "insert into inc (writer, title, content, writeday, fname) values
    ('$writer','$title','$content','$writeday','$fname')";
    mysqli_query($conn,$query);
?>
<meta http-equiv="refresh" content="0; url=inc.php">