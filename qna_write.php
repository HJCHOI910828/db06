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
    <br><br>
    <form action="qna_write_ok.php" name="frm1" method="post">
    <table class="table1">
        <tr>
            <td>글쓴이 :
            <input type="text" name="writer" id=""></td>
        </tr>
        <tr>
            <td>제목 :
            <input type="text" name="title" id=""></td>
        </tr>
        <tr>
            <td>내용
            <textarea rows="10" cols="75" name="content" id=""></textarea></td>
        </tr>
        <tr>
            <td colspan="2" align="center"><input type="button" value="작성완료"
            onclick="send()" id=btn></td>
        </tr>
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
    function delete_account(){
    if(confirm("회원탈퇴를 하시겠습니까?")){
        location.href="delete_account.php";
    }
}
function send() {
    document.frm1.submit()
}
</script>