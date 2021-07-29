
<? session_start() ?>
<? include "dbconn.php"; ?>

<?
    $no=$_GET["no"];
    $query="update inc set hit=hit+1 where no=$no";
    mysqli_query($conn,$query);
    
    $query="select * from inc where no=$no";
    $rs=mysqli_query($conn,$query);
    $row=mysqli_fetch_array($rs);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div id="div1">
    <div class="logo"></div>
    <div class="top">
        Welcome!!
    <div class="topmenu">
    <? if(isset($_SESSION["id"])){ ?>
    <a href="logout.php">logout</a>
    |
    <a href="edit.php">회원정보 수정</a>
    |
    <a href="javascript:delete_account()">회원탈퇴</a> &nbsp;&nbsp;
    <? }else {?>

        <a href="login.php">Login</a>     | 
        <a href="member.php">SignUp</a>     | 
        <a href="idpw.php">Search Id/Pw</a>
        <?}?>
        </div>
    </div>
    <div class="left">
        <ul class="menubar">
        <li><a href="about.php">About</a></li>
        <li><a href="notice.php">Notice</a></li>
        <li><a href="board.php">Board</a></li>
        <li><a href="qna.php">Q&A</a></li>
        <li><a href="inc.php">INC</a></li>
        <li><a href="book.php">Link</a></li>
        <li><a href="portfolio.php">Portfolio</a></li>
    </ul>
    </div>
    <div class="content">
    <table class="table1" width="700px">
    <tr>
            <td>글번호</td>
            <td><?=$row["no"]?></td>
        </tr>
        <tr>
            <td>글제목</td>
            <td><?=$row["title"]?></td>
        </tr>
        <tr>
            <td>작성자</td>
            <td><?=$row["writer"]?></td>
        </tr>
        <tr>
            <td>작성일</td>
            <td><?=$row["writeday"]?></td>
        </tr>
        <tr>
            <td>글내용</td>
            <td><?=nl2br($row["content"])?></td>
        </tr>
        <tr>
            <td>파일명</td>
            <td><a href="down.php?fname=<?=$row["fname"]?>"><?=$row["fname"]?></a></td>
        </tr>
        <tr>
            <td>조회수</td>
            <td><?=$row["hit"]?></td>
        </tr>
        <tr>
            <td colspan="2" align="center">
            <input type="button" value="삭제" id="btn" onclick="del(<?=$no?>,'<?=$row["fname"]?>')">
            <input type="button" value="리스트" id='btn' onclick="location.href='inc.php'">
            </td>
        </tr>
    </table>
    <!-- 답글달기 -->
    <form action="inc_content_re.php" name="frm2" method="post">
    
    <table class='table1' width="700px">
        <tr>
            <td><input type="hidden" name="no" value="<?=$no?>"></td>
            <td><textarea name="content" id="" cols="60" rows="2"></textarea></td><br>
            <td><input type="button" value="댓글달기" id="btn" onclick="send()"></td>
        </tr>
        <?
            $sql2="select * from notice_re where p_no=$no";
            $rs2=mysqli_query($conn,$sql2);
            while($row2=mysqli_fetch_array($rs2)){
        ?>
        <tr>
                    <td colspan='2'>
                    <?=nl2br($row2["content"])."  /  "."by ".$row2["writer"]."  /  ".$row2["day"]?>
                    <?
                        if (isset($_SESSION["id"])) {
                        # code...
                        if ($_SESSION["id"]==$row2["writer"]) {
                            # code...
                        
                        
                    ?>
                    <a href="inc_content_del.php?no=<?=$row2["no"]?>&p_no=<?=$no?>" ><img src="btn_close.gif"></a>
                    <? 
                        } 
                    }
                    ?>
                    </td>
                </tr>
        <?}?>
    </table>
    </form>

    </div>
    <div class="foot">
        Design & coded by jys since 2021.5.4
    </div>
    </div>
</body>
</html>
<script>
function send(){
    document.frm1.submit();
}
function del(no,fname){
    if(confirm("정말로 삭제하시겠습니까?")){
        location.href="inc_del.php?no="+no+"&fname="+fname;
    }
}
function send() {
        
        if (frm2.content.value=="") {
            alert("내용을 입력하세여")
            frm2.content.focus();
            return false;
        }
        document.frm2.submit();
    }
</script>