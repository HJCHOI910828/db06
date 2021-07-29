<? session_start() ?>

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
    <div class="content"><form enctype="multipart/form-data"action="inc_write_ok.php" name = "frm1" method="post">
    <table class="table1">
        <tr>
            <td>글제목</td>
            <td><input type="text" name="title" id="" size="50"></td>
        </tr>
        <tr>
            <td>작성자</td>
            <td><input type="text" name="writer" id="" size="50"></td>
        </tr>
        <tr>
            <td>글내용</td>
            <td><textarea name="content" id="" cols="75" rows="15"></textarea></td>
        </tr>
        <tr>
            <td>첨부파일</td>
            <td><input type="file" name="fname"></td>
        </tr>
        <tr>
            <td colspan="2" align="center">
            <input type="button" value="업로드" id="btn" onclick="send()">
            <input type="button" value="리스트" id='btn' onclick="location.href='inc.php'">
            </td>
        </tr>
    </table>
    </form></div>
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
</script>