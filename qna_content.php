<? session_start() ?>


<!DOCTYPE html>
<html>
<head>
<title></title>  
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
    <?      include "dbconn.php";
        $no=$_GET["no"];
        $query="update qna set hit=hit+1 where no=$no";
        mysqli_query($conn,$query);
        $query = "select * from qna where no=$no";
        $rs = mysqli_query($conn,$query);
        $row=mysqli_fetch_array($rs);
    ?>
    <br><br>
    <table class="table1">
        <tr>
            <td>글쓴이 :
            <?=$row["writer"]?></td>
        </tr>
        <tr>
            <td>제목 :
            <?=$row["title"]?></td>
        </tr>
        <tr>
            <td>내용 :
            <?=nl2br($row["content"])?></td>
        </tr>
        <tr>
            <td>작성일 :
            <?=$row["writeday"]?></td>
        </tr>
        <tr>
            <td>조회수 :
            <?=$row["hit"]?></td>
        </tr>
        <tr>
            <td colspan="2" align="center">
            <? if($row["step"]==0){?>
            <input type="button" value="답변하기"
            onclick="send(<?=$row["f_no"]?>)" id=btn>
            <?}?>
            <input type="button" id='btn' value="수정하기" onclick="location.href='qna_edit.php?no=<?=$no?>'">
            <input type="button" value="삭제하기" id=btn onclick="del(<?=$no?>)">
            </td>
        </tr>
    </table>
</body>
</html>

<script>
    function delete_account(){
    if(confirm("회원탈퇴를 하시겠습니까?")){
        location.href="delete_account.php";
    }
}
function send() {
    document.frm1.submit()
}
function send(f_no) {
    location.href="qna_write_re.php?f_no="+f_no;
}
function del(no) {
    if (confirm("정말로 삭제하시겠습니까?")) {
        location.href="qna_del.php?no="+no;    
    }
    
}
</script>