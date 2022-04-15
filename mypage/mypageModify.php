<?php
    include "../connect/connect.php";
    include "../connect/session.php";
    include "../connect/sessionCheck.php";
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>회원 정보</title>


    <?php
        include "../include/style.php"
    ?>
    <!-- //style -->
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
                <h3>회원 정보</h3>
                
                <div class="join-intro">
                    <div class="face">
                        <img src="../asset/img/mypage/default.svg" alt="기본이미지">
                    </div>
    <?php
        $memberID = $_SESSION['memberID'];

        // 쿼리문 작성 -> 해당 ID값의 제목, 내용 출력
        $sql = "SELECT youEmail, youNickName, youName, youBirth, youPhone, youGender, youSite, youIntro FROM myMember WHERE memberID = {$memberID}";
        $result = $connect -> query($sql);

        if($result){
            $memberInfo = $result -> fetch_array(MYSQLI_ASSOC);

            echo "<div class='intro'>".$memberInfo['youIntro']."</div>";    
        }
    ?>
                    <!-- <div class="intro">웹과 코딩에 관심이 많은 웹스토리보이입니다.</div> -->
                </div>

                <div class="join-info">
                    <ul>
    <?php
            echo "<li><strong>이메일</strong><span>".$memberInfo['youEmail']."</span>";
            echo "<li><strong>닉네임</strong><span>".$memberInfo['youNickName']."</span>";
            echo "<li><strong>이름</strong><span>".$memberInfo['youName']."</span>";
            echo "<li><strong>생일</strong><span>".$memberInfo['youBirth']."</span>";
            echo "<li><strong>휴대폰 번호</strong><span>".$memberInfo['youPhone']."</span>";
            echo "<li><strong>성별</strong><span>".$memberInfo['youGender']."</span>";
            echo "<li><strong>사이트 주소</strong><span>".$memberInfo['youSite']."</span>";
    ?>
                        <!-- <li>
                            <strong>이메일</strong>
                            <span>jungsik321@naver.com</span>
                        </li> -->
                    </ul>
                </div>

                <div class="join-btn">
                    <a href="myPageModify.php">수정하기</a>
                    <a href="myPageRemove.php">탈퇴하기</a>
                </div>
            </div>
        </section>
    </main>

<?php
    include "../include/footer.php";
?>
<!-- // footer -->


</body>
</html>