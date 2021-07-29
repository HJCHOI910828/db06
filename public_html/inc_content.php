<?php
session_start();
?>
<script language="javascript">
	function member_close(){
		if(confirm("회원가입을 탈퇴하시겠습니까?"+"\n"+"회원님의 정보는 영구적으로 소멸됩니다.")){
			location.href="member_close.php";
		}
	}
	var prev_obj="";
	function layer_toggle(obj){
		if(obj != prev_obj){
			obj.style.display="block";
			prev_obj=obj;
		}else{
			obj.style.display="none";
			prev_obj="";
		}
	}
	function send(){
		if(frm1.content.value==""){
			alert("내용을 입력하세요");
			frm1.content.focus();
			return false;
		}
		document.frm1.submit();
	}
	function del(no,fname){
		if(confirm("정말 삭제하시겠습니까?")){
			location.href="inc_del.php?no="+no+"&fname="+fname;
		}
	}
	function del_re(no,no2){
		if(confirm("정말 삭제하시겠습니까?")){
			location.href="inc_del_re.php?no="+no+"&no2="+no2;
		}
	}
</script>
<html>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="style.css">
<head>
<style type="text/css">
	#mention{
		width:90%;
		margin-top:5px;
		margin-bottom:20px;
		padding:7px;
		text-align:left;
		background-color:#dde7dd;
	}
</style>
<title>마이 블로그</title>
</head>
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
$no=$_GET["no"];
include "dbconn.php";
$query="update inc set hit=hit+1 where no=$no";
mysqli_query($conn,$query);

$query="select * from inc where no=$no";
$rs=mysqli_query($conn,$query);
$row=mysqli_fetch_array($rs);
?>
<table class="table3" width="100%">
<tr><th colspan="2" align="left">&nbsp;&nbsp;자료실 내용보기</th></tr>
<tr><td colspan="2" align="right" bgcolor="#f0f0e0">

<input type="button" class="bt" value="삭 제" onclick="del(<?php echo $no ?>,'<?php echo $row["fname"] ?>')">&nbsp;&nbsp;

<button onclick="location.href='inc.php'">리스트</button>
</td></tr>
<tr><td>작성일</td><td><?php echo $row["writeday"] ?></td></tr>
<tr><td>작성자</td><td><?php echo $row["writer"] ?></td></tr>
<tr><td>글제목</td><td><?php echo $row["title"] ?></td></tr>
<tr><td>글내용</td><td>
<?php echo nl2br($row["content"]) ?>
</td></tr>
<tr>
<td>파일명</td>
<td>
<a href="down.php?fname=<?php echo $row["fname"] ?>">
<font color="red"><b><?php echo $row["fname"]?></b></font>
<font color="green"><b>[Click]</b></font>
</a>
</td>
</tr>
<tr><td>조회수</td><td><?php echo $row["hit"] ?></td></tr>

<?php
	$query2="select * from inc_re where p_no=$no order by no asc";
	$rs2=mysqli_query($conn,$query2);
	$cnt=mysqli_num_rows($rs2);
?>
<tr>
<td colspan="2" align="right" bgcolor="#f0f0e0">
<a href="javascript:layer_toggle(document.getElementById('mention'))"><b>답글[<font color="red"><?php echo $cnt ?></font>]</b></a>&nbsp;&nbsp;&nbsp;&nbsp;
	<div id="mention" style="display:none">
	<form name="frm1" method="post" action="inc_re_ok.php">
		<table style="font-size:1.0em;color:#666;">
		<?php 		
		while($row2=mysqli_fetch_array($rs2)){
		?>
			<tr><td colspan="2">
			<?php echo nl2br($row2["content"]) ?> 
	- by <?php echo $row2["name"] ?> [ <?php echo $row2["writeday"] ?> ]
			<?php
				if(isset($_SESSION["member_id"])){
					if($row2["name"]==$_SESSION["member_id"]){
			?>
<input type="button" style="cursor:pointer;" value=" × " onclick="del_re(<?php echo $no ?>,<?php echo $row2["no"] ?>)">
			<?php }} ?>
			</td></tr>
		<?php
		}
		?>
			<tr>
			<td><textarea name="content" rows="3" cols="80"></textarea>	</td>
			<td>
			<?php if(isset($_SESSION["member_id"])){ ?>
			<input type="button" class="bt" value="답변" onclick="send()">
			<input type="hidden" name="no" value="<?php echo $no ?>">
			<?php } ?>
			</td>
			</tr>
		</table>
	</form>
	</div>
	
</td>
</tr>
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