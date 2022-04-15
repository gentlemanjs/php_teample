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
    <title>게시판 작성</title>
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
        .section__title {
            font-size: 40px;
            text-align: center;
            padding-top: 50px;
            margin-bottom: 30px;
        }
        .board__write div {
            display: flex;
            align-items: center;
            padding: 10px 150px;
        }
        .board__write div > label,
        .board__write div > span {
            display: inline-block;
            width: 150px;
            font-size: 24px;
        }
        .board__write div .iBox {
            width: 60%;
            height: 5vh;
        }
        .board__write div input {
            margin-right: 10px;
            padding-left: 10px;
            border: 0;
            background: #DEDEFB;
            border-radius: 10px;
        }
        .board__write div textarea {
            width: 83%;
            height: 30vh;
            resize: none;
            border: 0;
            background: #DEDEFB;
            padding: 10px;
            border-radius: 10px;
        }
        .boardW__btn {
            display: flex;
            justify-content: end;
        }
        .boardW__btn button {
            background: #605BFF;
            color: #fff;
            border-radius: 5px;
            padding: 8px 25px;
            font-family: 'BMJua';
        }
        .boardW__btn button:hover {
            cursor: pointer;
            background: #0A0699;
            color: #fff;
        }
    </style>
</head>
<body>
    <!-- header -->
    <?php
        include "../include/header.php";
    ?>
    <!-- contents -->
    <main id="contents">
        <h2 class="ir_so">게시글 작성 영역</h2>
        <section id="board-type" class="section center mb100">
            <div class="container">
                <h3 class="section__title">게시글 작성하기</h3>
                <div class="board__inner">
                    <div class="board__write">
                        <form action="boardWriteSave.php" name="boardWrite" method="post">
                            <fieldset>
                                <legend class="ir_so">게시판 작성</legend>
                                <div>
                                    <label for="boardTitle">제목</label>
                                    <input class="iBox" type="text" name="boardTitle" id="boardTitle" placeholder="제목을 입력해주세요!" required>
                                </div>
                                <div>
                                    <label for="boardMeet">MEET 주소</label>
                                    <input class="iBox" type="text" name="boardMeet" id="boardMeet" placeholder="주소를 입력해주세요!">
                                </div>
                                <div>
                                    <span>테마분류</span>
                                    <label for="boardThemeQ"><input type="radio" name="boardThema" id="boardThemaQ" value="boardThemaQ">QnA</label>
                                    <label for="boardThemeN"><input type="radio" name="boardThema" id="boardThemaN" value="boardThemaN">놀이터</label>
                                    <label for="boardThemeT"><input type="radio" name="boardThema" id="boardThemaT" value="boardThemaT">토론장</label>
                                </div>
                                <div>
                                    <label for="boardContents">내용</label>
                                    <textarea name="boardContents" id="boardContents" placeholder="내용을 입력해주세요!" required></textarea>
                                </div>
                                <div class="boardW__btn">
                                    <button type="submit" value="저장하기">저장하기</button>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>
</body>
</html>