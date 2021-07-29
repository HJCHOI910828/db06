<?php
session_start();
?>
<script language="javascript">
	function member_close(){
		if(confirm("회원가입을 탈퇴하시겠습니까?"+"\n"+"회원님의 정보는 영구적으로 소멸됩니다.")){
			location.href="member_close.php";
		}
	}
	function send(){
		if(frm1.userfile.value==""){
			alert("파일을 첨부하세요.");
			frm1.userfile.focus();
			return false;
		}
		if(frm1.title.value==""){
			alert("제목을 입력하세요.");
			frm1.title.focus();
			return false;
		}
		if(frm1.content.value==""){
			alert("내용을 입력하세요.");
			frm1.content.focus();
			return false;
		}
		document.frm1.submit();
	}
</script>
<html>
<meta http-equiv="content-type" content="text/html;charset=utf-8">
<link rel="stylesheet" type="text/css" href="style.css">
<head><title>마이 블로그</title></head>
<body>
<div id="container">
<div id="header">
	<div class="logo">
	<a href="index.php">
	<img src="main.png"></a>
	</div>
	<div class="top">
		<div class="welcome">
		<h3><span>Play here!&nbsp;&nbsp;&nbsp;&nbsp;It's my daily life.</span></h3>
		</div>
		<ul class="menu">
			<?php if(!isset($_SESSION["member_id"])){ ?>
			<li><a href="login.php">로그인</a></li>
			<li><a href="member.php">회원가입</a></li>
			<li><a href="idpw.php">ID/PW찾기</a></li>
	<?php }else{ ?>
			<li><a href="logout.php">로그아웃</a></li>
			<li><a href="member_edit.php">정보수정</a></li>
			<li><a href="javascript:member_close()">회원탈퇴</a></li>
	<?php } ?>
		</ul>
	</div>
</div>
<div class="clear"></div>
<div id="left">
	<ul class="nav">
		<li><a href="intro.php">인사말</a>	</li>
		<li><a href="board.php">방명록</a></li>
		<li><a href="guest.php">게시판</a></li>
		<li><a href="qna.php">Q & A</a></li>
		<li><a href="inc.php">자료실</a></li>		
		<li><a href="notice.php">공지사항</a></li>
		<li><a href="friends.php">친구들</a></li>
	</ul>
</div>
<div id="contents">
<form enctype="multipart/form-data" name="frm1" method="post" action="inc_write_ok.php">
<table class="table2" width="90%">
<tr><th colspan="2" align="left">&nbsp;&nbsp;자료실 쓰기양식</th></tr>
<tr><td>글제목</td><td><input type="text" name="title" size="50"></td></tr>
<tr><td>글내용</td><td>
<textarea name="content" rows="15" cols="75"></textarea>
</td></tr>
<tr><td>첨부파일</td><td><input type="file" name="userfile"></td></tr>
<tr><td colspan="2" align="center">

<input type="button" class="bt" value="전 송" onclick="send()">&nbsp;&nbsp;<input type="reset" class="bt" value="다 시">&nbsp;&nbsp;
<input type="button" class="bt" value="리스트" onclick="location.href='inc.php'">
</td></tr>
</table>
</form>
</div>
<div class="clear"></div>
<div id="footer">
<p align="right">
<b><font size="2" color="blue">
Copyright(c) since 2018,My corporation all rights reserved</font></b>&nbsp;&nbsp;&nbsp;&nbsp;
</p>
</div>
</div>
</body>
</html>