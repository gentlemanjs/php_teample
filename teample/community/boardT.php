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
        }
        .answer__view {
            display: flex;
            justify-content: flex-end;
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
                    $sql = "SELECT t.boardID, t.boardTitle, t.boardContents, m.youNickName, m.youPhoto, t.regTime FROM teamBoardT t JOIN myTeam m ON(t.memberID = m.memberID) ORDER BY boardID DESC";
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
                                <span class="ask__nickname"><?=$askInfo{'youNickName'}?></span>
                            </a>
                        </div>
                </article>
<?php }?>
            </section>
            <section class="answer">
                
            </section>
        </main>
    </div>
</body>
</html>