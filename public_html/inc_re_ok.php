<?php
	session_start();
	
	$no=$_POST["no"];
	$content=$_POST["content"];
	$writeday=date("Y-m-d(h:i)");
	include "dbconn.php";
	$query="insert into inc_re (name,content,writeday,p_no) values ('$_SESSION[member_id]','$content','$writeday',$no)";
	mysqli_query($conn,$query);
	mysqli_close($conn);
	
	echo("<meta http-equiv='refresh' content='0;url=inc_content.php?no=$no'>");
?>