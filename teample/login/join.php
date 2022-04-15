<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>회원 가입</title>
    <link href="https://webfontworld.github.io/BMJua/BMJua.css" rel="stylesheet">


    <?php 
        include "../../include/teamstyle.php"; 
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
?>
<!-- // header -->

    <main id="contents">
        <h2 class="ir_so">컨텐츠 영역</h2>
        <section class="join-type">
            <div class="member-form">
                <div class="logo"><img src="../img/Logo.png" alt="로고"></div>
                <h3>회원가입</h3> 
                <div class="social">
                    <div class="google">
                        <a href=#><img src="../img/googlelogo.png" alt="구글">구글</a></div>
                    <div class="naver">
                        <a href=#><img src="../img/naverlogo.png" alt="네이버">네이버</a></div>
                    <div class="kakao">
                        <a href=#><img src="../img/kakaotalklogo.png" alt="카카오톡">카카오톡</a></div>
                </div> 
                <div class="or">Or</div> 
                <form action="joinSave.php" name="join" method="post" onsubmit ="return joinChecks()"> 
                    <fieldset>
                        <legend class="ir_so">회원가입 입력폼</legend>
                        <div class="join-box">
                            <div>
                                <label for="youName">이름</label>
                                <input type="text" id="youName"name="youName" placeholder="이름을 적어주세요!" autocomplete="off">
                            </div>
                            <div>
                                <label for="youEmail">이메일 주소<span class="comment" id="youEmailComment"></span></label>
                                <input type="email" id="youEmail" name="youEmail" placeholder="Sample@naver.com" autocomplete="off" autofocus>
                            </div>
                            <div>
                                <label for="youNickName">닉네임<span class="comment" id="youNickNameComment"></span></label>
                                <input type="text" id="youNickName" name="youNickName" maxlength="15" placeholder="닉네임을 적어주세요!" autocomplete="off">
                            </div>
                            <div>
                                <label for="youPhone">휴대폰 번호<span class="comment" id="youPhoneComment"></span></label>
                                <input type="text" id="youPhone" name="youPhone" placeholder="000-0000-0000" autocomplete="off">
                            </div>
                            <div>
                                <label for="youPass">비밀번호<span class="comment" id="youPassComment"></span></label>
                                <input type="password" id="youPass" name="youPass" maxlength="20" placeholder="비밀번호를 적어주세요!" autocomplete="off">
                            </div>
                            <div>
                                <label for="agree">
                                    <input class="select" type="checkbox" id="agree" name="agree">
                                    <span class="agree"><a href="#">사용 약관</a> 및 <a href="#">개인 정보 보호 정책</a>에 동의 합니다.<span class="comment" id="agreeComment"></span></span>
                                </label>                
                            </div>
                        </div>
                        <button id="joinBtn" class="join-submit" type="submit">회원가입 완료</button>
                        <div class="already">이미 아이디가 있으신가요?<a href="login.php">로그인</a>하기</div>
                    </fieldset>
                </form>
            </div>
        </section>
    </main>

<!-- // footer -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    let emailCheck = false;
    let nickCheck = false;

    function joinChecks(){
        
        // 이름 공백 확인
        if($("#youName").val() == ""){
            $("#youNameComment").text("이름을 입력해주세요!");
            return false;
        }
        // 이름 유효성 검사
        let getName = RegExp(/^[가-힣]{1,5}$/);
        if(!getName.test($("#youName").val())){
            $("#youNameComment").text("이름은 한글만 사용할 수 있습니다!");
            return false;
        }

        // 이메일 공백 검사
        if($("#youEmail").val() == ""){
            $("#youEmailComment").text("이메일을 입력해 주세요!");
            return false;
        }

        // 이메일 유효성 검사
        let getMail = RegExp(/^[0-9a-zA-Z]([-_.]?[0-9a-zA-Z])*@[0-9a-zA-Z]([-_.]?[0-9a-zA-Z])*.[a-zA-Z]{2,3}$/i);
        if(!getMail.test($("#youEmail").val())){
            $("#youEmailComment").text("이메일 형식을 확인해 주세요!");
            return false;
        }

        let youEmail = $("#youEmail").val();
               
            $.ajax({ 
                type : "POST", 
                url : "joinCheck.php",
                data : {"youEmail": youEmail, "type": "emailCheck"},
                dataType : "json",
                success : function(data){
                    if(data.result == "good"){
                        $("#youEmailComment").text("사용 가능한 이메일입니다.");
                        emailCheck = true;
                    } else {
                        $("#youEmailComment").text("이미 존재하는 이메일입니다.");
                        emailCheck = false;
                        return false;
                    }
                },
                error : function(request, status, error){
                    consol.log("request" + request);
                    consol.log("status" + status);
                    consol.log("error" + error);
                }
            });
        
        
       

        // 닉네임 공백 검사
        if($("#youNickName").val() == ""){
            $("#youNickNameComment").text("닉네임을 입력해 주세요!");
            return false;
        }

        // 닉네임 유효성 검사
        let getNick = RegExp(/^[가-힣|0-9]+$/);
        if(!getNick.test($("#youNickName").val())){
            $("#youNickNameComment").text("닉네임은 한글, 숫자만 사용할 수 있습니다!");
            return false;
        }


        let youNickName = $("#youNickName").val();
               
            $.ajax({
                type : "POST",
                url : "joinCheck.php",
                data : {"youNickName": youNickName, "type": "nickCheck"},
                dataType : "json",
                success : function(data){
                    if(data.result == "good"){
                        $("#youNickNameComment").text("사용 가능한 닉네임입니다.");
                        nickCheck = true;
                    } else {
                        $("#youNickNameComment").text("이미 존재하는 닉네임입니다.");
                        nickCheck = false;
                        return false;
                    }
                },
                error : function(request, status, error){
                    consol.log("request" + request);
                    consol.log("status" + status);
                    consol.log("error" + error);
                }
            });

        

        // 휴대폰 번호 공백 확인
        if($("#youPhone").val() == ""){
            $("#youPhoneComment").text("휴대폰번호를 입력해 주세요!");
            return false;
        }

        //휴대폰 번호 유효성 검사
        let getPhone = RegExp(/01[016789]-[^0][0-9]{2,3}-[0-9]{3,4}/);
        if(!getPhone.test($("#youPhone").val())){
            $("#youPhoneComment").text("올바른 휴대폰번호(000-0000-0000)를 입력해주세요!");
            $("#youPhone").val("");
            return false;
        } else {
            $("#youPhoneComment").text("");
        }

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

        let joinCheck = $("#agree").is(":checked");
        if(joinCheck == false){
            $("#agreeComment").text("개인정보수집 및 동의를 체크해주세요!");
            return false;
        }

    }   

</script>


</body>
</html>