<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>회원 가입</title>
    

    <?php
        include "../include/style.php"
    ?>
    <!-- //style -->
    <style>
        #contents {
            font-family: 'BMJua' !important;
        }
    </style>
</head>
<body>
<?php
        include "../include/skip.php";
    ?>
    <!-- // skip -->


<?php
    include "../include/header.php";
?>
<!-- // header -->

    <main id="contents">
        <h2 class="ir_so">컨텐츠 영역</h2>
        <section class="join-type gray">
            <div class="member-form">
                <div class="logo"><img src="img/Logo.png" alt="로고"></div>
                <h3>회원가입</h3> 
                <div class="social">
                    <div class="google">
                        <a href=#><img src="img/googlelogo.png" alt="구글">구글</a></div>
                    <div class="naver">
                        <a href=#><img src="img/naverlogo.png" alt="네이버">네이버</a></div>
                    <div class="kakao">
                        <a href=#><img src="img/kakaotalklogo.png" alt="카카오톡">카카오톡</a></div>
                </div> 
                <div class="or">Or</div> 
                <form action="#" name="join" method="post"> 
                    <fieldset>
                        <legend class="ir_so">회원가입 입력폼</legend>
                        <div class="join-box">
                            <div>
                                <label for="youName">이름</label>
                                <input type="text" id="youName"name="youName" placeholder="이름을 적어주세요!" autocomplete="off" required>
                            </div>
                            <div>
                                <label for="youEmail">이메일 주소</label>
                                <input type="email" id="youEmail" name="youEmail" placeholder="Sample@naver.com" autocomplete="off" autofocus required>
                            </div>
                            <div>
                                <label for="youNickname">닉네임</label>
                                <input type="text" id="youNickname" name="youNickname" maxlength="15"placeholder="닉네임을 적어주세요!" autocomplete="off" required>
                            </div>
                            <div>
                                <label for="youPhone">휴대폰 번호</label>
                                <input type="password" id="youPhone" name="youPhone" placeholder="000-0000-0000" autocomplete="off" required>
                            </div>
                            <div>
                                <label for="youPass">비밀번호</label>
                                <input type="password" id="youPass" name="youPass" maxlength="20" placeholder="비밀번호를 적어주세요!" autocomplete="off" required>
                            </div>
                            <div>
                                <label for="agree">
                                    <input class="select" type="checkbox" id="agree" name="agree">
                                    <span class="agree"><a href="#">사용 약관</a> 및 <a href="#">개인 정보 보호 정책</a>에 동의 합니다.</span>
                                </label>                
                            </div>
                        </div>
                        <button id="joinBtn" class="join-submit" type="submit">회원가입 완료</button>
                        <div class="already">이미 아이디가 있으신가요? <a href="#">로그인</a> 하기</div>
                    </fieldset>
                </form>
            </div>
        </section>
    </main>

<?php
    include "../include/footer.php";
?>
<!-- // footer -->


</body>
</html>