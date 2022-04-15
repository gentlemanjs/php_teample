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
    <title>Team 사이트</title>

    <!-- style -->
    <link rel="stylesheet" href="../../asset/css/reset.css">
    <link href="https://webfontworld.github.io/BMJua/BMJua.css" rel="stylesheet">

    <style>
        body {
            background: #F8F8FF;
            padding: 0 50px 50px 50px;
        }
        /* 헤더 */
        #header {
            font-family: 'BMJua';
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 56%;
            margin: 0 auto;
            height: 60px;
            margin-top: 50px;
        }
        .hTitle {
            font-size: 2.5vw;
        }
        .hSide {
            display: flex;
        }
        .hBtn {
            width: 80px;
            height: 20px;
            background: #cacaca;
            margin-right: 1vw;
            border-radius: 10px;
        }
        .hMenu {
            display: flex;
        }
        .hMenu li {
            margin-left: 3vw;
        }
        .hMenu li a {
            font-size: 1.1vw;
        }

        /* 메인 */
        #contents {
            width: 56%;
            margin: 0 auto;
            margin-top: 2vh;
            display: grid;
            grid-template-areas: 
            "rule1 rule1 rule2 rule2 rule3 rule3"
            "graph graph graph graph graph graph"
            "news news news support support support";
            grid-template-columns: repeat(6, 1fr);
            grid-template-rows: 6.5vw 25vw 14vw;
        }
        .rule1 {
            grid-area: rule1;
            margin-right: 1vw;
        }
        .rule2 {
            grid-area: rule2;
            margin: 0 0.5vw;
        }
        .rule3 {
            grid-area: rule3;
            margin-left: 1vw;
        }
        .rule {
            background: #fff;
            margin-bottom: 2.5vh;
            border-radius: 10px;
            display: flex;
            align-items: center;
        }
        .rule > div.rImg {
            flex-basis: 30%;
            margin-left: 1.5vw;
        }
        .rule > div.rImg img {
            width: 3.5vw;
            margin-top: 0.5vw;
        }
        .rule > div.desc {
            
        }
        .rule > div.desc h3 {
            font-size: 0.9vw;
        }
        .rule > div.desc p {
            font-size: 0.7vw;
        }
        .graph {
            background: #fff;
            grid-area: graph;
            margin-bottom: 1.5vh;
            border-radius: 10px;
        }
        .graph img {
            width: 100%;
            height: 100%;
            border-radius: 10px;
        }
        .news {
            background: #fff;
            grid-area: news;
            margin-right: 1vw;
            border-radius: 10px;
            padding: 1.1vw 1.3vw 1.5vw 1.3vw;
        }
        .news > h4 {
            font-size: 1vw;
        }
        .newsBox1 {
            border-bottom: 1px solid #0302291c;
            padding-bottom: 1vw;
        }
        .newsBox {
            display: flex;
            margin-top: 1vw;
        }
        .newsBox > img {
            width: 6.5vw;
        }
        .newsBox .nDesc {
            display: flex;
        }
        .newsBox .nDesc > p {
            flex-basis: 60%;
            font-size: 0.72vw;
            font-weight: bold;
            margin-left: 0.8vw;
        }
        .newsBox .nDesc > span {
            flex-basis: 40%;
            font-size: 0.6vw;
            align-self: end;
            text-align: right;
        }

        .support {
            background: #fff;
            grid-area: support;
            margin-left: 1vw;
            border-radius: 10px;
            padding: 1.1vw 1.3vw 1.5vw 1.3vw;
        }
        .support > h4 {
            font-size: 1vw;
        }
        .supBox1 {
            border-bottom: 1px solid #0302291c;
            padding-bottom: 1vw;
        }
        .supBox {
            display: flex;
            margin-top: 1vw;
        }
        .supBox img {
            width: 6.5vw;
        }
        .supBox .sDesc {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            margin-left: 0.8vw;
        }
        .supBox .sDesc > p {
            width: 100%;
            font-size: 0.72vw;
            font-weight: bold;
        }
        .supBox .sDesc em {
            font-size: 0.9vw;
            font-weight: bold;
            font-family: 'BMJua';
            align-self: end;
        }
        .supBox .sDesc > a {
            font-size: 0.4vw;
            font-weight: bold;
            align-self: end;
            color: #CE6868;
            background: #FBE0E0;
            text-align: right;
            margin-bottom: 0.2vw;
            padding: 0.1vw;
        }
 
    </style>
</head>
<body>
<?php
    include "../include/header.php";
?>
    <!-- //header -->

    <main id="contents">
        <div class="rule1 rule">
            <div class="rImg"><img src="../img/ruleImg01.png" alt="수칙 아이콘"></div>
            <div class="desc">
                <h3>6인 이상 금지</h3>
                <p>인원 제한</p>
            </div>
        </div>
        <div class="rule2 rule">
            <div class="rImg"><img src="../img/ruleImg02.png" alt="수칙 아이콘"></div>
            <div class="desc">
                <h3>22까지 운영</h3>
                <p>시설 운영시간</p>
            </div>
        </div>
        <div class="rule3 rule">
            <div class="rImg"><img src="../img/ruleImg03.png" alt="수칙 아이콘"></div>
            <div class="desc">
                <h3>방역패스 일시중단</h3>
                <p>방역패스</p>
            </div>
        </div>
        <div class="graph">
            <img src="../img/graphImg01.jpg" alt="그래프">
        </div>
        <div class="news">
            <h4>코로나 관련 뉴스</h4>
            <div class="newsBox1 newsBox">
                <img src="../img/newsImg01.jpg" alt="뉴스 이미지">
                <div class="nDesc">
                    <p>코로나 확진자 5일·9일 투표 가능…"오후 5시부터 외출"</p>
                    <span>2022-03-02 13:02</span>
                </div>
            </div>
            <div class="newsBox2 newsBox">
                <img src="../img/newsImg02.jpg" alt="뉴스 이미지">
                <div class="nDesc">
                    <p>2일 코로나19 신규확진 21만9241명, 사상최다…사망 96명</p>
                    <span>2022-03-02 09:14</span>
                </div>
            </div>
        </div>
        <div class="support">
            <h4>재난지원금 정보</h4>
            <div class="supBox1 supBox">
                <img src="../img/supImg01.jpg" alt="지원금 이미지">
                <div class="sDesc">
                    <p>소상공인 4분기 손실보상</p>
                    <em>3월3일부터 5부제</em>
                    <a href="#">신청사이트 바로가기</a>
                </div>
            </div>
            <div class="supBox2 supBox">
                <img src="../img/supImg02.jpg" alt="지원금 이미지">
                <div class="sDesc">
                    <p>전국민 긴급재난지원금</p>
                    <em>3월 16일부터</em>
                    <a href="#">신청사이트 바로가기</a>
                </div>
            </div>
        </div>
    </main>
</body>
</html>