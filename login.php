<? session_start() ?>
<? include("dbconn.php");?>
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
    <form name='frm1' method='post' action='login_ok.php'>
            <table class="table1">
            <tr>
            <th colspan='2' align="center">로그인</th>
            </tr>
            <tr>
            <td>아이디:</td>
            <td><input type="text" name="id" id="txt"></td>
            </tr>
            <tr>
            <td>비밀번호:</td>
            <td><input type="password" name="passwd" id="txt"></td>
            </tr>
            <tr>
            <td colspan='2' align='center'>
            <input type='button' id='btn' value='로그인' onclick="login_send()">&nbsp;&nbsp;
            <input type='button' value='취소' id='btn' onclick="login_cancel()">
            </td>
            
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
    function login_send(){
    if(frm1.id.value==""){
    alert("아이디를 입력해주세요.")
    frm1.id.focus();
    return false();
}
if(frm1.passwd.value==""){
    alert("비밀번호를 입력해주세요.")
    frm1.passwd.focus();
    return false();
}
document.frm1.submit();
}


function login_cancel(){
    window.location.href='index.php'
}
</script>