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
    <title>Document</title>
    <link rel="stylesheet" href="../../asset/css/reset.css">
    <link href="https://webfontworld.github.io/BMJua/BMJua.css" rel="stylesheet">
    <?php
        include "../../include/teamstyle.php";
    ?>
    <style>
        .wrap {
            font-family: 'BMJua';
            max-width: 1200px;
            margin: 0 auto;
        }
        .header {
            display: flex;
            justify-content: end;
            align-items: end;
            height: 50px;
        }
        /* 여기까지헤더 include 리셋포함*/
        #nav {
            margin-top: 100px;
        }
        #nav ul {
            display: flex;
        }
        #nav ul li {
            background: #fff;
            border-radius: 10px;
        }
        #nav li.active a {
            background: #605BFF;
            color: #fff;
            border-radius: 10px;
        }
        #nav a {
            display: inline-block;
            padding: 15px 20px;
            cursor: pointer;
        }
        #main {
            display: flex;
            margin-top: 20px;
            justify-content: space-between;
            margin-bottom: 100px;
        }
        .ask {
            width: 37%;
            background: #fff;
            border-radius: 20px;
            padding: 20px;
            height: 730px;
            overflow: auto;
        }
        .ask__box {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }
        .ask__img {
            width: 20%;
            display: flex;
        }
        .ask__box img {
            width: 70px;
            height: 70px;
            border-radius: 50%;
        }
        .ask__contents {
            width: 80%;
            border-bottom: 1px solid #ededed;
        }
        .ask__contents span {
            font-size: 14px;
            display: inline-block;
            float: right;
        }
        .ask__date {
            margin-left: 10px;
            color: #bdbdbd;
        }
        .ask__title {
            font-size: 18px;
        }
        .ask__desc {
            font-size: 14px;
        }
        .answer {
            width: 60%;
        }
        .answer__box {
            background: #fff;
            border-radius: 20px;
            padding: 20px;
            max-height: 630px;
            overflow: auto;
        }
        .answer__view {
            display: flex;
            flex-direction: row-reverse;
            justify-content: start;
        }
        .answer__view.right {
            justify-content: flex-end;
            flex-direction: row;
        }
        .answer__view.right .answer__time {
            margin-left: 10px;
        }
        .answer__time {
            margin-right: 10px;
            padding-top: 10px;
            font-size: 8px;
        }
        .answer__answer {
            margin-bottom: 5px;
        }
        .answer__contents {
            background: #F8F8FF;
            border-radius: 10px;
            padding: 5px 10px;
            margin-bottom: 10px;
            display: inline-block;
        }
        .answer__contents span {
            font-size: 12px;
        }
        .answer__view img {
            width: 35px;
            height: 35px;
            margin-left: 10px;
        }
        .ask__img {
            display: flex;
            align-items: center;
        }
        .answer_img {
            min-width: 70px;
            display: flex;
            align-items: center;
            justify-content: flex-end;
        }
        .answer textarea {
            width: 90%;
            background: #fff;
            border: 2px solid #605BFF;
            padding: 20px;
            margin-top: 20px;
            border-radius: 5px;
            resize: none;
            height: 70px;
        }
        .answer__form {
            position: relative;
        }
       
        .answer__btn {
            position: absolute;
            background: #fff;
            right: 0; top: 20%;
            width: 65px;
            height: 70px;
            display: inline-block;
            padding: 7px 10px;
            border-radius: 5px;
            border: 2px solid #605BFF;
            cursor: pointer;
        }
        .write {
            font-family: 'BMJua';
            display: inline-block;
            color: #fff;
            padding: 8px 15px;
            border-radius: 10px;
            font-size: 14px;
            background: #000;
            transition: all 0.3s;
            border: 1px solid #fff;
            margin-top: 20px;
        }
        .write:hover {
            background: #fff;
            color: #000;
            border: 1px solid #000;
        }
        .writer {
            padding-top: 10px;
            font-size: 8px;
            color: red;
        }
        

    </style>
</head>
<body>

    <?php
        include "../include/header.php";
    ?>

    <div class="wrap">
        <nav id="nav">
            <ul>
                <li><a href="boardQ.php">Q&A</a></li>
                <li><a href="boardN.php">놀이터</a></li>
                <li class="active"><a href="boardT.php">토론장</a></li>
            </ul>
        </nav>
        <a href="boardTWrite.php" class="write">글쓰기</a>
        <main id="main">
            <section class="ask">
            <?php
                    $getNickName = $_GET['youNickName'];
                    $sql = "SELECT t.boardID, t.boardTitle, t.boardContents, t.youNickName, m.youPhoto, t.regTime FROM teamBoardT t JOIN myTeam m ON(t.memberID = m.memberID) ORDER BY boardID DESC";
                    $result = $connect -> query($sql);
                forEach($result as $askInfo){ ?>
                <article class="ask__box">
                        <figure class="ask__img">
                            <img src="../img/<?=$askInfo{'youPhoto'}?>" alt="이미지">
                        </figure>
                        <div class="ask__contents">
                            <a href="boardTAnswer.php?boardID=<?=$askInfo['boardID']?>&youNickName=<?=$askInfo['youNickName']?>">
                                <div class="ask__title"><?=$askInfo{'boardTitle'}?></div>
                                <div class="ask__desc"><?=$askInfo{'boardContents'}?></div>
                                <span class="ask__date"><?=date('Y-m-d', $askInfo['regTime'])?></span>
                                <span class="ask__nickname"><?=$askInfo['youNickName']?></span>
                            </a>
                        </div>
                </article>
<?php }
?>
            </section>
            <section class="answer">
                <div class="answer__box">
                <?php
                    $getNickName = $_GET['youNickName'];
                    $boardID = $_GET['boardID'];
                    $sql = "SELECT t.boardID, t.answerContents, t.youNickName, m.youPhoto, t.regTime FROM teamBoardTAnswer t JOIN myTeam m ON(t.memberID = m.memberID) WHERE boardID = {$boardID} ORDER BY regTime ASC";
                    $result2 = $connect -> query($sql);
                    forEach($result2 as $answerInfo){
                    if($getNickName == $answerInfo['youNickName']){
                        echo "<div class='answer__view'>";
                        echo "<div class='writer'>질문자</div>";
                    } else {
                        echo "<div class='answer__view'>";
                    }
                ?>
                        <div class="answer__time"><?=date('m-d H:i', $answerInfo['regTime'])?></div>
                        <div class="answer__contents">
                            <div class="answer__answer"><?=$answerInfo['answerContents']?></div>
                            <div class="answer_img">
                                <span class="answer__name"><?=$answerInfo['youNickName']?></span>
                                <img src="../img/<?=$answerInfo['youPhoto']?>" alt="이미지">
                            </div>
                        </div>
                    </div>
                <?php } ?>
                </div>
                <form action="boardTAnswerSave.php" class="answer__form" method="post">
                    <fieldset>
                        <legend class="ir_so">게시판 작성</legend>
                        <div style="display: none">
                            <label for="boardID">게시판 번호</label>
                            <input class="iBox" type="text" name="boardID" id="boardID" value="<?=$boardID?>">
                        </div>
                        <div style="display: none">
                            <label for="answerID">번호</label>
                            <input class="iBox" type="text" name="answerID" id="answerID">
                        </div>
                        <div>
                            <textarea name="answerContents" class="answerContents"></textarea>
                            <button class="answer__btn" type="submit">보내기</button>
                        </div>
                    </fieldset>
                </form>
            </section>
        </main>
    </div>
    <script>
        let nickName = "<?=$_SESSION['youNickName']?>"
        // console.log(nickName)
        var answerName = document.querySelectorAll(".answer__name");
        answerName.forEach((el,index)=>{
            if(el.innerText == nickName){
               document.querySelectorAll(".answer__view")[index].classList.add("right");
            }
        })
    </script>
</body>
</html>