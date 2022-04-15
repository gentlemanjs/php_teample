<?php
    if(isset($_COOKIE['id'])){
        $cookie_id = $_COOKIE['id'];
    } else {
        $cookie_id = "";
    }
?>

<!DOCTYPE html>
<html lang="ko"> 
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>로그인</title>
    <link href="https://webfontworld.github.io/BMJua/BMJua.css" rel="stylesheet">


    <?php
        include "../../include/teamstyle.php"
    ?>
    <!-- //style -->
</head>
<body> 
<?php
        include "../../include/skip.php"; 
    ?>
    <!-- // skip -->


<?php
    include "../include/header.php";
    // 아이디 자동저장
?>
<!-- // header -->

<main id="contents">
    <h2 class="ir_so">컨텐츠 영역</h2>
    <section class="login-type">
                <div class="member-form">
                    <div class="logo"><img src="../img/Logo.png" alt="로고"></div>
                    <h3>로그인</h3>
                    <form action="loginSave.php" name="login" method="post">
                        <fieldset>
                            <legend class="ir_so">로그인 입력폼</legend>
                            <div class="login-box">
                                
                                <div>
                                    <label for="youEmail">이메일 주소</label>
                                    <input type="email" id="youEmail" name="youEmail" placeholder="Sample@naver.com" value="<?=$cookie_id?>" autocomplete="off" autofocus required>
                                </div>
                                <div class="mt30">
                                    <label for="youPass">비밀번호</label>
                                    <input type="password" id="youPass" name="youPass" maxlength="20" placeholder="비밀번호를 적어주세요!" autocomplete="off" required>
                                </div>
                                <div>
                                    <label for="agree">
                                        <input class="select" type="checkbox" id="agree" name="agree" value=''>
                                        <span class="agree">회원정보 기억하기</span>
                                    </label>
                                </div>
                            </div> 
                            <div class="another">
                                <img src="../img/googlelogo.png" alt="구글">
                                <img src="../img/kakaotalklogo.png" alt="카카오">
                                <img src="../img/naverlogo.png" alt="네이버">
                            </div>
                            <button id="loginBtn" class="login-submit" type="submit">로그인</button>
                            <div class="other">
                                <a href="join.php">회원가입</a>
                                <a href="findID.php">아이디<a> / <a href="findPass.php">비밀번호 찾기</a>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </section>
</main>
<!-- //contents -->


</body>
</html>