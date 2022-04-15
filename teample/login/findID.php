<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>아이디 찾기</title>
    <link href="https://webfontworld.github.io/BMJua/BMJua.css" rel="stylesheet">

    <!-- style -->
    <?php
        include "../../include/teamstyle.php";
    ?>
</head>
<body>
    <!-- header -->
    <?php 
        include "../include/header.php";
    ?>
    <!-- contents --> 
    <main id="contents">
        <h2 class="ir_so">컨텐츠 영역</h2>
        <section class="login-type">
            <div class="member-form">
                <div class="logo"><img src="../img/Logo.png" alt="로고"></div>
                <h3>아이디 찾기</h3>
                <form action="findIDSave.php" name="findID" method="post">
                    <fieldset>
                        <legend class="ir_so">아이디 찾기 입력폼</legend>
                        <div class="login-box">
                            <div>
                                <label for="youEmail">이름</label>
                                <input type="text" id="youName" name="youName" placeholder="이름을 적어주세요!" autocomplete="off" required>
                            </div>
                            <div class="mt30">
                                <label for="youPhone">휴대폰 번호</label>
                                <input type="text" id="youPhone" name="youPhone" maxlength="20" placeholder="000-0000-0000" autocomplete="off" required>
                            </div>
                        </div>
                        <button id="findIDBtn" class="login-submit mt50" type="submit">아이디 찾기</button>
                        <div class="other">
                            <a href="join.php">회원가입</a>
                            <a href="findPass.php">비밀번호 찾기</a>
                        </div>
                    </fieldset>
                </form>
            </div>
        </section>
    </main>

</body>
</html>