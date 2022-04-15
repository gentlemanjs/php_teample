<?php
   include "../../connect/connect.php";
   include "../../connect/session.php";
   include "../../connect/sessionCheck.php";
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Q & A 보기</title>
    <!-- style -->
    <link rel="stylesheet" href="../css/reset.css">
    <link href="https://webfontworld.github.io/BMJua/BMJua.css" rel="stylesheet">
    <?php
        include "../../include/teamstyle.php";
    ?>
    <style>
        #contents {
            width: 1200px;
            margin: 0 auto;
            background: #fff;
            margin-top: 100px;
            margin-bottom: 100px;
            padding-bottom: 50px;
            font-family: 'BMJua';
        }
        .QView__title {
            font-size: 50px;
            text-align: center;
            padding-top: 50px;
            margin-bottom: 30px;
        }
        .QView__title > input {
            padding: 10px;
        }
        .QView__desc > input {
            padding: 10px;
            width: 800px;
        }
        .QModifyBox {
            float: right;
            margin-right: 3vw;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }
        .QView__status {
            padding: 10px 30px;
            opacity: 0.5;
            border-radius: 22.5px;
            background-color: #F29339;
            overflow: hidden;
            font-size: 20px;
        }
        .baseData {
            background: #d5f9ff;
            border-bottom: 1px solid #0000002e;
        }
        .modifyData {
            background: #d5f9ff;
            border-bottom: 1px solid #0000002e;
        }
        .baseDataBtn {
            padding: 5px 15px;
            font-size: 16px;
            background-color: #000;
            text-align: center;
            color: #fff;
            margin-top: 10px;
        }
        .baseDataBtn:hover {
            cursor: pointer;
        }
        .modifyDataBtn {
            padding: 5px 15px;
            font-size: 16px;
            background-color: #000;
            text-align: center;
            color: #fff;
            margin-top: 10px;
        }
        .completeBtn {
            padding: 5px 15px;
            font-size: 16px;
            background-color: #000;
            text-align: center;
            color: #fff;
            margin-top: 10px;
        }
        .modifyDataBtn:hover {
            cursor: pointer;
        }
        .QReCommentOpen {
            padding: 5px 15px;
            font-size: 16px;
            background-color: #000;
            text-align: center;
            color: #fff;
            margin-top: 10px;
        }
        .QReCommentOpen:hover {
            cursor: pointer;
        }
        .QReCommentBtn {
            font-family: 'BMJua';
            font-size: 16px;
            float: right;
            padding: 5px 15px;
            border-radius: 5px;
        }
        .QReCommentBtn:hover {
            cursor: pointer;
        }
        .QVContainer {
            margin: 0 auto;
            padding: 50px 0 50px 0;
            width: 70%;
            border-bottom: 1px solid #0000002e;
        }
        .QVContainer:last-child {
            border: 0;
        }
        .QView__desc {
            margin: 110px 0 80px 0;
            font-size: 30px;
        }
        .QView__QID {
            font-size: 14px;
            text-align: left;
        }
        .QView__answer {
            font-size: 18px;
        }
        .QView__AID {
            font-size: 14px;
            text-align: right;
            margin-top: 30px;
        }
        .boardQReComment {
            display: none;
        }
        .reCommentContents {
            min-height: 150px;
            width: 100%;
            resize: none;
            padding: 10px;
            background: #d5f9ff82;
            border: 0;
        }
        .commentContents {
            min-height: 150px;
            width: 100%;
            resize: none;
            padding: 10px;
            background: #d5f9ff82;
            border: 0;
        }
        .QCommentBtn {
            font-family: 'BMJua';
            font-size: 16px;
            float: right;
            padding: 5px 15px;
            border-radius: 5px;
        }
        .QCommentBtn:hover {
            cursor: pointer;
        }
        .modifyData {
            display: none;
        }
        .complete {
            opacity: 1;
        }
    </style>
</head>
<body>
    <?php
        include "../include/header.php";
    ?>
    <!-- contents -->
    <main id="contents">
    <h2 class="ir_so">게시글 보기 영역</h2>
        <section id="board-type">
            <div class="container">
<?php
    $boardID = $_GET['boardID'];
    $sql = "SELECT b.memberID, b.boardID, b.boardTitle, b.boardContents, b.boardConfirm, m.youNickName FROM teamBoardQ b JOIN myTeam m ON(b.memberID = m.memberID) WHERE b.boardID = {$boardID}";
    // $sql = "SELECT  FROM teamBoardQ WHERE boardID = {$boardID}";
    $result = $connect -> query($sql);
    $boardInfo = $result -> fetch_array(MYSQLI_ASSOC);
?>              
                <div class="baseData">
                    <h3 class="QView__title">질문 : <?=$boardInfo['boardTitle']?></h3>
                    <div class="QModifyBox">
                        <p class="QView__status <?=$boardInfo['boardConfirm']?>"><?=$boardInfo['boardConfirm']?></p>
<?php
    $memberID = $_SESSION['memberID'];
    if($memberID == $boardInfo['memberID']){
        echo "<a href='#' class='completeBtn'>답변완료</a>";
    }
?>
                    </div>
                    <div class="QVContainer">
                        <p class="QView__desc"><?=$boardInfo['boardContents']?></p>
                        <h4 class="QView__QID">글쓴이 : <?=$boardInfo['youNickName']?></h4>
<?php
    $memberID = $_SESSION['memberID'];
    if($memberID == $boardInfo['memberID']){
        echo "<a class='baseDataBtn'>수정하기</a>";
    }
?>
                        
                    </div>
                </div>

                
                <form action="boardQModify.php?boardID=<?=$boardID?>" name="boardQModify" method="post" class="modifyData">
                    <fieldset>
                        <legend class="ir_so">수정하기</legend>
                        <label for="QView__title"></label>
                        <h3 class="QView__title">질문 : <input type="text" id="QView__title" name="QView__title" value="<?=$boardInfo['boardTitle']?>" style="font-size:50px;font-family: 'BMJua';"></h3>
                        <div class="QModifyBox">
                            <p class="QView__status <?=$boardInfo['boardConfirm']?>"><?=$boardInfo['boardConfirm']?></p>
                            
                        </div>
                        <div class="QVContainer">
                            <p class="QView__desc"><input type="text" id="QView__desc" name="QView__desc" value="<?=$boardInfo['boardContents']?>" style="font-size:30px;font-family: 'BMJua';"></p>
                            <h4 class="QView__QID">글쓴이 : <?=$boardInfo['youNickName']?></h4>
                            <button type="submit" class="modifyDataBtn" style="font-family: 'BMJua';">수정완료</button>
                        </div>
                    </fieldset>
                </form>
                

<?php

    $sql1 = "SELECT * FROM boardQComment WHERE boardID = {$boardID} AND parent = 'NO' ORDER BY regTime ASC";
    $result1 = $connect -> query($sql1);

    if($result1){
        $count1 = $result1 -> num_rows;
        if($count1 > 0){
            for($i=1; $i<=$count1; $i++){
                $commentInfo1 = $result1 -> fetch_array(MYSQLI_ASSOC);
                echo "<div class='QVContainer'>";
                echo "<p class='QView__answer'>".$commentInfo1['commentContents']."</p>";
                echo "<h4 class='QView__AID'>작성자 : ".$commentInfo1['youNickName']."</h4>";
                echo "<a href='#' class='QReCommentOpen'>댓글달기</a>";
                echo "<form action='boardQReComment.php?boardID=".$boardID."&reCommentID=".$commentInfo1['commentID']."&layer=".$commentInfo1['layer']."' name='boardQReComment' method='post' class='boardQReComment'>";
                echo "<legend class='ir_so'>게시글 댓글 영역</legend>";
                echo "<div><textarea type='text' name='commentContents' class='reCommentContents' placeholder='댓글을 입력해주세요!' required></textarea></div>";
                echo "<div><button type='sumbit' class='QReCommentBtn'>댓글달기</button></div>";
                echo "</form>";

                $sql2 = "SELECT * FROM boardQComment WHERE boardID = {$boardID} AND reCommentID != 'NULL' ORDER BY regTime ASC";
                $result2 = $connect -> query($sql2);
                if($result2){
                    $count2 = $result2 -> num_rows;
                    for($j=1; $j<=$count2; $j++){
                        $commentInfo2 = $result2 -> fetch_array(MYSQLI_ASSOC);
                        if($commentInfo1['commentID'] == $commentInfo2['reCommentID']){
                            echo "<p class='QView__answer mt30 ml100'>".$commentInfo2['commentContents']."</p>";
                            echo "<h4 class='QView__AID'>작성자 : ".$commentInfo2['youNickName']."</h4>";
                            echo "<a href='#' class='QReCommentOpen ml100'>댓글달기</a>";
                            echo "<form action='boardQReComment.php?boardID=".$boardID."&reCommentID=".$commentInfo2['commentID']."&layer=".$commentInfo2['layer']."' name='boardQReComment' method='post' class='boardQReComment ml100'>";
                            echo "<legend class='ir_so'>게시글 댓글 영역</legend>";
                            echo "<div><textarea type='text' name='commentContents' class='reCommentContents' placeholder='댓글을 입력해주세요!' required></textarea></div>";
                            echo "<div><button type='sumbit' class='QReCommentBtn'>댓글달기</button></div>";
                            echo "</form>";
                        };
                        
                        $sql3 = "SELECT * FROM boardQComment WHERE boardID = {$boardID} AND layer = 3 ORDER BY regTime ASC";
                        $result3 = $connect -> query($sql3);
                        $count3 = $result3 -> num_rows;
                        if($result3){
                            for($k=1; $k<=$count3; $k++){
                                $commentInfo3 = $result3 -> fetch_array(MYSQLI_ASSOC);
                                if($commentInfo1['commentID'] == $commentInfo2['reCommentID'] && $commentInfo2['commentID'] == $commentInfo3['reCommentID']){
                                    echo "<p class='QView__answer mt30 ml200'>".$commentInfo3['commentContents']."</p>";
                                    echo "<h4 class='QView__AID'>작성자 : ".$commentInfo3['youNickName']."</h4>";
                                }
                            }
                        }
                    }
                    
                }
                echo "</div>";
            }
        }
    }
?>

                <div class="QVContainer">
                    <form action="boardQComment.php?boardID=<?=$boardID?>" name="boardQComment" method="post" class="boardQComment">
                        <legend class="ir_so">게시글 댓글 영역</legend>
                        <div>
                            <textarea type="text" name="commentContents" class="commentContents" placeholder="댓글을 입력해주세요!" required></textarea>
                        </div>
                        <div>
                            <button type="sumbit" class="QCommentBtn">댓글달기</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </main>

    <script>

        function openBtn(){
            document.querySelectorAll(".QReCommentOpen").forEach((el, i)=> {
                el.addEventListener("click", e => {
                    e.preventDefault();
                    el.style.opacity = "0";
                    document.querySelectorAll(".boardQReComment")[i].style.display = "block";
                })
            })
        }
        openBtn();

        
        function baseBtn(){
            //수정하기
            document.querySelector(".baseDataBtn").addEventListener("click", e => {
                e.preventDefault();
                document.querySelector(".baseData").style.display = "none";
                document.querySelector(".modifyData").style.display = "block";
            })
        }
        baseBtn();

        
        function modifyBtn(){
            document.querySelector(".modifyDataBtn").addEventListener("click", e => {
                document.querySelector(".modifyData").style.display = "none";
                document.querySelector(".baseData").style.display = "block";
            })
        }
        modifyBtn();

        function complete(){
            //답변완료
            document.querySelector(".completeBtn").addEventListener("click", e => {
                let result = confirm("정말 답변 완료처리 하시겠습니까?");
             
                if(result){
                    document.querySelector(".completeBtn").href = "boardQStatus.php?boardID=<?=$boardInfo['boardID']?>";
                };
            })   
        }
        complete();
       
    </script>
</body>
</html>