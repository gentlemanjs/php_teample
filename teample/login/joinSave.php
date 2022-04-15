<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>회원가입</title>
    <?php
        include "../../include/teamstyle.php"
    ?>

</head>
<body>

<?php
    include "../../include/header.php";
?>
<!-- // header -->

<main id="contents" class="gray">
    <h2 class="ir_so">컨텐츠 영역</h2>
    <div class="container">

    </div>

</main>
<!-- // main -->

<?php
    include "../../include/footer.php";
?>
<!-- // footer -->
<?php
    include "../../connect/connect.php";

    $youName = $_POST['youName'];
    $youEmail = $_POST['youEmail'];
    $youNickName = $_POST['youNickName'];
    $youPhone = $_POST['youPhone'];
    $youPass = $_POST['youPass'];
    $agree = $_POST['agree'];
    $regTime = time();

    // echo $youEmail, $youPass, $youPassC, $youName, $youBirth, $youPhone, $regTime;

    // 메시지 출력
    function msg($alret){
        echo "<p class='alert'>{$alret}</p>";
    }
    

    // 회원가입
     if($isEmailCheck = true && $isPhoneCheck = true  && $agree == true){
         $sql = "INSERT INTO myTeam(youName, youEmail, youNickName, youPhone, youPass, regTime) VALUES('$youName', '$youEmail', '$youNickName','$youPhone', '$youPass', '$regTime')";
         $result = $connect -> query($sql);
         echo "<script>alert('회원가입을 축하합니다. 로그인을 해주세요!'); location.href = 'login.php'</script>";
     }
?>
</body>
</html>

