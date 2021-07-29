<? session_start() ?>

<? include("dbconn.php") ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>자료실</title>
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
    <?
        $query = "select * from qna order by f_no desc,no asc";
        $rs = mysqli_query($conn,$query);
    ?>
    <table class="table1">
        <tr>
            <th>글제목</th>
            <th>작성자</th>
            <th>작성일</th>
            <th>조회수</th>
        </tr>
        <?
        if(isset($_GET["page"])){
            $page=$_GET["page"];
            $group=ceil($page/5);
        }else{
            $page=1;
            $group=1;
        }
        
        $sql2="select count(*) as cnt from qna";
            $rs2=mysqli_query($conn,$sql2);
            $row2=mysqli_fetch_array($rs2);
            $cnt=$row2["cnt"];
            $pageCount=($cnt/10);
            $groupCount=ceil($pageCount/5);
            $startRow=($page-1)*10;
            
            $sql = "select * from qna order by no desc limit $startRow,10";

            $rs = mysqli_query($conn,$sql);

        while($row=mysqli_fetch_array($rs)){ ?>
        <tr>
        <td> 
            <? if($row["step"]==1) {
            
        
            echo "&nbsp;&nbsp;&nbsp;&nbsp;☞";
        }    
            ?>
            <a href="qna_content.php?no=<?=$row["no"]?>"><?=$row["title"]?></a>
            <? ?>
            </td>

            <td><?=$row["writer"]?></td>
            <td><?=$row["writeday"]?></td>
            <td><?=$row["hit"]?></td>
        </tr>
        <?}?>
        <tr>
            <td colspan="5" align="center">
            <?
                //이전 5개로 돌아가기 
                if($group>1){
                    // $firstPage=$page=1
                    echo "<a href = 'inc.php?page=1'> 처음으로 &nbsp; &nbsp;</a>";
                }
                if($group>1){
                    $prevPage=($group-2)*5+1;
                    echo "<a href ='inc.php?page=$prevPage'>이전</a>";
                }
                $startPage=($group-1)*5+1;
                $endPage=$startPage+4;
                for($i=$startPage;$i<=$endPage;$i++){
                    //페이지카운트 범위를 벗어나면 문장을 종효시킨다.
                    if($i>$pageCount){break;}
                    if($page == $i){
                        echo "<a href='inc.php?page=$i'> <font color='red'><b>
                        [$i]</font></b> </a>";
                    }else{
                    echo "<a href='inc.php?page=$i'>[$i] </a>";
                }
            }
                $nextPage=$group*5+1;
                if($group<$groupCount){
                echo "<a href='inc.php?page=$nextPage'> 다음</a> &nbsp; &nbsp;</a>";
                }
                $lastPage=$group*5+5;
                if($groupCount>0 && $groupCount <5){
                    echo "<a href = 'inc.php?page=$lastPage'>마지막으로</a>";
                }
            ?>
                </td></tr>
            <?
            if(isset($_SESSION["id"])){
            ?>
            <tr>
            <td align="center" colspan="4">
            <input type="button" value="질문하기" id=btn onclick="location.href='qna_write.php'">
            </td>
        </tr>
            <?
            }
            ?>
    </table>
    </div>
    <div class="foot">
        Design & coded by jys since 2021.5.4
    </div>
    </div>
    
</body>
</html>

