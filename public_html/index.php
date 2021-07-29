<?php
session_start();
?>
<script language="javascript">	
	function Mobile_Func()
    {
        var mobileKey = new Array('iPhone', 'iPod', 'BlackBerry', 'Android', 'Windows CE', 'LG', 'MOT', 'SAMSUNG', 'SonyEricsson');
         for (var word in mobileKey){
            if (navigator.userAgent.match(mobileKey[word]) != null){
                window.location.href = "mobile/index.php";
				break;
            }
        }
    }
	
	function member_close(){
		if(confirm("회원가입을 탈퇴하시겠습니까?"+"\n"+"회원님의 정보는 영구적으로 소멸됩니다.")){
			location.href="member_close.php";
		}
	}
	function winOpen(){
		win=window.open("contact.php","childForm","width=500,height=400");
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
		<li><a href="intro.php">인사말</a></li>
		<li><a href="board.php">방명록</a></li>
		<li><a href="guest.php">게시판</a></li>
		<li><a href="qna.php">Q & A</a></li>
		<li><a href="inc.php">자료실</a></li>
		<li><a href="notice.php">공지사항</a></li>
		<li><a href="friends.php">친구들</a></li>
	</ul>
</div>
<div id="contents">
	<div class="notice">
		<h4>공지사항</h4>
		<table class="table4" width="430">
			<tr>
				<th>내용</th>
				<th>날짜</th>
			</tr>
<?php
	include "dbconn.php";
	$query="select * from gongji order by no desc limit 0,5";
	$rs=mysqli_query($conn,$query);
	while($row=mysqli_fetch_array($rs)){
?>
			<tr>
				<td><a href="notice.php"><?php echo $row["title"] ?></a></td>
				<td><?php echo substr($row["writeday"],0,10) ?></td>
			</tr>
	<?php } ?>			
		</table>
	</div>
	<div class="partner">
		<h4>메일문의</h4>
		<div class="partner_info" onclick="winOpen()">
			<img src="mail.png" alt="no">
		</div>
	</div>
	<div class="clear"></div>
	<div class="icons">
		<h4><font color="red">[ My project list. ]</font></h4>
		<div class="logo1">
			<a href="project1/index.php"><img src="여행가이드_LOGO.png" alt="no"></a>
		</div>
		<div class="logo2">
			<a href="#"><img src="베이커리_LOGO.jpg" alt="no"></a>
		</div>
		<div class="logo2">
			<a href="#"><img src="LOGO.jpg" alt="no"></a>
		</div>
	</div>
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