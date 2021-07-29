<?php
include("dbconn.php");

    $sql = "insert into inc(title,content,writer,writeday,fname) values
        ('테스트 중입니다.','유용하게 쓰세요.','관리자','2021-05-04','test.html')";
        mysqli_query($conn,$sql);

?>
    <meta http-equiv="refresh" content="0;url=inc.php">        
