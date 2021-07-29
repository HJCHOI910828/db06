<?php
session_start();
?>
<script language="javascript">
	function member_close(){
		if(confirm("회원가입을 탈퇴하시겠습니까?"+"\n"+"회원님의 정보는 영구적으로 소멸됩니다.")){
			location.href="member_close.php";
		}
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
<?php
if(isset($_GET["page"])){
	$page=$_GET["page"];
	$group=$_GET["group"];
}else{
	$page=1;
	$group=1;
}
include "dbconn.php";
$startRow=($page-1)*10;
$query="select * from inc order by no desc limit $startRow,10";
$rs=mysqli_query($conn,$query);
?>
<div align="right" style="padding:12px;font-size:0.9em;">
<a href="index.php">+ Home</a> > 자료실 리스트&nbsp;&nbsp;
</div>
<table class="table1" width="100%">
<tr><th>글번호</th><th>글제목</th><th>작성자</th><th>작성일</th><th>조회수</th></tr>
<?php while($row=mysqli_fetch_array($rs)){ ?>
<tr>
<td><?php echo $row["no"] ?></td>
<td><a href="inc_content.php?no=<?php echo $row["no"] ?>"><?php echo $row["title"] ?></a></td>
<td><?php echo $row["writer"] ?></td>
<td><?php echo $row["writeday"] ?></td>
<td><?php echo $row["hit"] ?></td>
</tr>
<?php } ?>

<tr><td colspan="5" align="center">
<?php
	$query2="select count(*) as cnt from inc";
	$rs2=mysqli_query($conn,$query2);
	$row2=mysqli_fetch_array($rs2);
	$pageCount=ceil($row2["cnt"]/10);
	$groupCount=ceil($pageCount/10);
	
	if($group != 1){
		$prevPage=($group-2)*10+1;
		$prevGroup=$group-1;
		echo "<a href='inc.php?page=$prevPage&group=$prevGroup'><b>PREV</b></a>&nbsp;&nbsp;";
	}
	
	$startPage=floor(($page-1)/10)*10+1;
	$endPage=$startPage+9;
	for($i=$startPage;$i<=$endPage;$i++){
		if($i>$pageCount){
			break;
		}
		if($i==$page){
			$color="red";
		}else{
			$color="#666666";
		}
		echo "<a href='inc.php?page=$i&group=$group'><b><font color='$color'>[$i]</font></b></a> ";
	}
	
	if($group<$groupCount){
		$nextPage=$group*10+1;
		$nextGroup=$group+1;
		echo "&nbsp;&nbsp;<a href='inc.php?page=$nextPage&group=$nextGroup'><b>NEXT</b></a>";
	}
?>
</td></tr>
<tr><td colspan="5" align="center">

<button onclick="location.href='inc_write.php'">자료실 등록</button>

</td></tr>
</table>
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