<?php
   include "../../connect/connect.php";
   include "../../connect/session.php";
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>커뮤니티 메인</title>
    <link href="https://webfontworld.github.io/BMJua/BMJua.css" rel="stylesheet">
    <!-- style -->
    <?php
        include "../../include/teamstyle.php";
    ?>
    <style>
        body {
            background-color: #F8F8FF;
        }
        #contents {
            font-family: 'BMJua';
        }
        .comu {
            text-align: center;
            font-size: 4vw;
            margin-top: 5vh;
            margin-bottom: 3vh;
        }
        .container__box {
            height: 670px;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 10vh;
        }
        .container__box > div {
            width: 22%;
            margin-right: 3vw;
            background: #fff;
            border-radius: 40px;
            text-align: center;
            line-height: 20.5vw;
        }
        .container__box > div.Qcontanier {
            border: 1px solid #ffa3862e;
        }
        .container__box > div.Ncontanier {
            border: 1px solid #7d79ff36;
        }
        .container__box > div.Tcontanier {
            border: 1px solid #51ab6557;
            margin-right: 0;
        }
        .container__box > div > a {
            padding: 6.4vw 4vw;
            font-size: 3vw;
            letter-spacing: 1vw;
            color: #fff;
            border-radius: 20px;
        }
        .container__box > div.Qcontanier > a {
            background: #FF8F6Bd1;
        }
        .container__box > div.Ncontanier > a {
            background: #605bffd1;
        }
        .container__box > div.Tcontanier > a {
            background: #2B9943d1;
        }
        .container__box > div.Qcontanier > a:hover {
            background: #FF8F6B;
        } 
        .container__box > div.Ncontanier > a:hover {
            background: #605BFF;
        } 
        .container__box > div.Tcontanier > a:hover {
            background: #2B9943;
        } 
        </style>
</head>
<body>
    <?php
        include "../include/header.php";
    ?>
    <!-- contents -->
    <main id="contents">
        <h2 class="comu">커뮤니티</h2>
        <div class="container__box">
            <div class="Qcontanier">
                <a href="boardQ.php">Q&A</a>
            </div>
            <div class="Ncontanier">
                <a href="boardN.php">놀이터</a>
            </div>
            <div class="Tcontanier">
                <a href="boardT.php">토론장</a>
            </div>
        </div>
    </main>

</body>
</html>