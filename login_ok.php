<?php
    session_start();
    include("dbconn.php");
    $id=$_POST["id"];
    $passwd=$_POST["passwd"];
    
    $sql="select * from member where id = '$id' and passwd = '$passwd'";



    $rs=mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($rs);
    if($row["id"]){
        $_SESSION["id"]=$row["id"];
        //세션변수에 값을 할당하고 인덱스 화면으로 돌아간다.

        echo("<meta http-equiv='refresh' content='0;url=index.php'>");

    }else{
        ?>
        <script>
        alert("아이디와 패스워드가 올바르지 않습니다.");
        history.back();
        </script>
        <?
        //아이디 패스워드 오류메시지 뿌려주고 빠꾸.
    }
?>
    <meta charset="UTF-8">
