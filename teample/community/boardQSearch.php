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
    <title>Q & A</title>
      <!-- style -->
     <link rel="stylesheet" href="../css/reset.css">
     <link href="https://webfontworld.github.io/BMJua/BMJua.css" rel="stylesheet">
    <?php
        include "../../include/teamstyle.php";
    ?>
    <style>
        .wrap {
            max-width: 1200px;
            margin: 0 auto;
            font-family: 'BMJua';
        }
        .header {
            display: flex;
            justify-content: end;
            align-items: end;
            height: 50px;
        }
        .header h2 {
            font-size: 24px;
            font-weight: 800;
        }
        fieldset {
            display: flex;
        }
        fieldset > div{
           margin-left: 10px;
        }
        .search-form {
            height: 35px;
            padding: 0 10px;
            border-radius: 10px;
            font-size: 16px;
            border: 1px solid #000;
        }
        .search-option {
            height: 35px;
            border-radius: 10px;
            cursor: pointer;
        }
        .search-btn {
            width: 120px;
            height: 35px;
            border-radius: 10px;
            background-color: #605BFF;
            color: #fff;
            cursor: pointer;
        }
        main {
        }
        .result {
            text-align: right;
            font-size: 20px;
            margin-top: 50px;
        }
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
        #navi ul {
            height: 50px;
            display: grid;
            grid-template-columns: 0.7fr 1.5fr 5fr 1.5fr 1.3fr;
            align-items: center;
        }
        #navi ul li {
            color: #030229;
            opacity: 0.7;
            font-size: 12px;
            text-align: center;
        }
        #navi ul li:nth-child(5) {
            margin-right: 20px;
        }
        .board {
            height: 70px;
            display: grid;
            grid-template-columns: 0.7fr 1.5fr 5fr 1.5fr 1.3fr;
            align-items: center;
            border-radius: 10px;
            background-color: #fff;
            margin-bottom: 5px;
        }
        .board div {
            text-align: center;
            font-size: 14px;
            font-weight: 600;
            color: #000
        }
        .board div:nth-child(2) {
           display: flex;
           align-items: center;
           justify-content: center;
        }
        .board div:nth-child(2) img,
        .board div:nth-child(3) img,
        .board div:nth-child(4) img
         {
            margin-right: 5px;
        }
        .board div:nth-child(5) {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 45px;
            opacity: 0.5;
            border-radius: 22.5px;
            background-color: #F29339;
            overflow: hidden;
            margin-right: 20px;
        }
        .write {
            float: right;
            padding: 10px 20px;
            background: #000;
            color: #fff;
            margin-top: 5px;
            border-radius: 10px;
        }
        .board__pages {
            margin-top: 40px;
            margin-bottom: 200px;
        }
        .board__pages ul {
            display: flex;
            justify-content: center;
        }
        .board__pages ul li.active a {
            background: #000;
            color: #fff;
        }
        .board__pages ul li a {
            display: block;
            border: 1px solid #eee;
            padding: 14px 10px;
            font-size: 14px;
            margin-left: -1px;
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
                <li class="active"><a href="boardQ.php">Q&A</a></li>
                <li><a href="boardN.php">놀이터</a></li>
                <li><a href="boardT.php">토론장</a></li>
            </ul>
        </nav>
        <div class="header">
            <form action="boardQSearch.php" name="boardSearch" method="get">
                <fieldset>
                    <legend class="ir_so">게시판 검색 영역</legend>
                    <div>
                        <input type="text" name="searchKeyword" class="search-form" placeholder="search" aria-label="search" required>
                    </div>
                    <div>
                        <select name="searchOption" class="search-option">
                            <option value="title">제목</option>
                            <option value="content">내용</option>
                            <option value="name">등록자</option>
                        </select>
                    </div>
                    <div>
                        <button type="sumbit" class="search-btn">검색</button>
                    </div>
                </fieldset>
            </form>
        </div>
        <main>
<?php
    $searchKeyword = $_GET['searchKeyword'];
    $searchOption = $_GET['searchOption'];
    function msg($alert){
        echo "<p class='result'>총 ".$alert."건이 검색되었습니다.</p>";
    }
    $searchKeyword = $connect -> real_escape_string(trim($searchKeyword));
    $searchOption = $connect -> real_escape_string(trim($searchOption));
    $sql = "SELECT b.boardID, b.boardTitle, b.boardContents, m.youName, b.regTime, b.boardConfirm FROM teamBoardQ b JOIN myTeam m ON(b.memberID = m.memberID) ";
    switch($searchOption){
        case 'title':
            $sql .= "WHERE b.boardTitle LIKE '%{$searchKeyword}%' ORDER BY boardID DESC";
            break;
        case 'content':
            $sql .= "WHERE b.boardContents LIKE '%{$searchKeyword}%' ORDER BY boardID DESC";
            break;
        case 'name':
            $sql .= "WHERE m.youName LIKE '%{$searchKeyword}%' ORDER BY boardID DESC";
            break;
    }
    $result = $connect -> query($sql);
    if($result){
        $count = $result -> num_rows;
        msg($count);
    }
?>
            <nav id="navi">
                <ul>
                    <li>번호</li>
                    <li>이름</li>
                    <li>제목</li>
                    <li>등록일</li>
                    <li>상태</li>
                </ul>
            </nav>
<?php
// $searchKeyword = $connect -> real_escape_string(trim($searchKeyword));
// $searchOption = $connect -> real_escape_string(trim($searchOption));
if(isset($_GET['page'])){
    $page = (int) $_GET['page'];
} else {
    $page = 1;
}
$pageView = 10;
$pageLimit = ($pageView * $page) - $pageView;
$sql = "SELECT b.boardID, b.boardTitle, b.boardContents, m.youName, b.regTime, b.boardConfirm FROM teamBoardQ b JOIN myTeam m ON(b.memberID = m.memberID) ";
switch($searchOption){
    case 'title':
        $sql .= "WHERE b.boardTitle LIKE '%{$searchKeyword}%' ORDER BY boardID DESC LIMIT {$pageLimit}, {$pageView}";
        break;
    case 'content':
        $sql .= "WHERE b.boardContents LIKE '%{$searchKeyword}%' ORDER BY boardID DESC LIMIT {$pageLimit}, {$pageView}";
        break;
    case 'name':
        $sql .= "WHERE m.youName LIKE '%{$searchKeyword}%' ORDER BY boardID DESC LIMIT {$pageLimit}, {$pageView}";
        break;
}
$result = $connect -> query($sql);
if($result){
    $counted = $result -> num_rows;
    if($counted > 0){
        for($i=1; $i<=$counted; $i++){
            $boardInfo = $result -> fetch_array(MYSQLI_ASSOC);
            echo "<div class='board'>";
            echo "<div>".$boardInfo['boardID']."</div>";
            echo "<div><img src='../img/Group 465.jpg' alt=''>".$boardInfo['youName']."</div>";
            echo "<div><img src='../img/Message.jpg' alt=''><a href='boardView.php?boardID={$boardInfo['boardID']}'>".$boardInfo['boardTitle']."</a></div>";
            echo "<div><img src='../img/Calendar.jpg' alt=''>".date('Y-m-d', $boardInfo['regTime'])."</div>";
            echo " <div>".$boardInfo['boardConfirm']."</div>";
        echo "</div>";
        }
    }
}
?>
            <div>
                <a href="boardWrite.php" class="write">글쓰기</a>
            </div>
            <div class="board__pages">
                <ul>
<?php
    $GET1 = '&searchKeyword='.$searchKeyword;
    $GET2 = "&searchOption=".$searchOption;
    $address = 'boardQSearch';
    $boardPage = 'boardQPage';
    require "boardPage.php";
?>
                </ul>
            </div>
        </main>
    </div>
</body>
</html>