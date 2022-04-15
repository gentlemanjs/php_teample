<?php
    include "../../connect/connect.php";

    $youName = $_POST['youName'];
    $youEmail = $_POST['youEmail'];
    $youPhone = $_POST['youPhone'];
 
    // 아이디 체크
    $sql = "SELECT youName, youEmail, youPhone, youPass FROM myTeam WHERE youName = '$youName' AND youEmail = '$youEmail' AND youPhone = '$youPhone'";
    $result = $connect -> query($sql);
    $findInfo = $result -> fetch_array(MYSQLI_ASSOC);
    
    // echo "<pre>";
    // var_dump($findInfo);
    // echo "</pre>";
    if($findInfo['youName'] == $youName && $findInfo['youEmail'] == $youEmail && $findInfo['youPhone'] == $youPhone){
        Header("Location: passChange.php");
    } else {
        echo "<script>alert('회원정보가 일치하지 않습니다!'); history.back(1)</script>";
    }
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>비밀번호 재설정</title>
    <link href="https://webfontworld.github.io/BMJua/BMJua.css" rel="stylesheet">
    <!-- style -->
    <?php
        include "../../include/teamstyle.php";
    ?>
</head>
<body>
    <!-- header -->
    <?php
        include "../../include/header.php";
    ?>
    <!-- contents -->
    <main id="contents">
        <h2 class="ir_so">컨텐츠 영역</h2>
        <section class="login-type">
            <div class="member-form">
                <div class="logo"><img src="../img/Logo.png" alt="로고"></div>
                <h3>비밀번호 재설정</h3>
                <form action="changePass.php" name="changePass" method="post" onsubmit="return joinChecks()">
                    <fieldset>
                        <legend class="ir_so">비밀번호 재설정</legend>
                        <div class="login-box">
                            <?php
                                echo "<div style='display:none'><label for='youEmail'>이메일주소</label><input type='email' name='youEmail' id='youEmail' value='".$youEmail."'></div>";
                            ?>
                            <div>
                                <label for="youPass">비밀번호</label><span class="comment" id="youPassComment"></span>
                                <input type="password" id="youPass" name="youPass" maxlength="20" placeholder="비밀번호를 적어주세요!" autocomplete="off">
                            </div>
                            <div class="mt10">
                                <label for="youPassC">비밀번호 확인</label><span class="comment" id="youPassCComment"></span>
                                <input type="password" id="youPassC" name="youPassC" maxlength="20" placeholder="다시 한번 비밀번호를 적어주세요!" autocomplete="off">
                            </div>
                        </div>
                        <button id="findPassBtn" class="login-submit mt50" type="submit">비밀번호 재설정</button>
                        <div class="other">
                            <a href="join.php">회원가입</a>
                            <a href="findID.php">아이디 찾기</a> 
                        </div>
                    </fieldset>
                </form>
            </div>
        </section>
    </main>
    <!-- footer -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    function joinChecks(){

        // 비밀번호 공백 확인
        if($("#youPass").val() == ""){
            $("#youPassComment").text("비밀번호를 입력해 주세요!");
            return false;
        }

        // 비밀번호 유효성 검사
        
        let getPass = $("#youPass").val();
        let getPassNum = getPass.search(/[0-9]/g);
        let getPassEng = getPass.search(/[a-z]/ig);
        let getPassSpe = getPass.search(/[`~!@@#$%^&*|₩₩₩'₩";:₩/?]/gi);

        if(getPass.length < 8 || getPass.length > 20){
            $("#youPassComment").text("8자리 ~ 20자리 이내로 입력해주세요.");
            return false;
        } else if (getPass.search(/\s/) != -1) {
            $("#youPassComment").text("비밀번호는 공백 없이 입력해주세요.");
            return false;
        } else if (getPassNum < 0 || getPassEng < 0 || getPassSpe < 0 ) {
            $("#youPassComment").text("영문,숫자, 특수문자를 혼합하여 입력해주세요.");
            return false;
        }  else {
            $("#youPassComment").text("");
        }

        // 비밀번호 동일한지 체크
        if($("#youPass").val() !== $("#youPassC").val()){
            $("#youPassCComment").text("비밀번호가 동일하지 않습니다!");
            return false;
        }
    }   
</script>

</body>
</html>