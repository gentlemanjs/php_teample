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
                <?php
                    $memberID = $_SESSION['memberID'];

                    $sql2 = "SELECT youPhoto FROM myMember WHERE memberID = {$memberID}";
                    $result2 = $connect -> query($sql2);
                    if($result2){
                        $memberInfo2 = $result2 -> fetch_array(MYSQLI_ASSOC);
                    }
                ?>
                <form action="mypageSave.php" name="join" method="post" enctype="multipart/form-data">
                    <fieldset>
                        <legend class="ir_so">회원정보 입력폼</legend>
                        <div class="join-intro">
                            <div class="face">
                                <div id="viewBox">
                                    <img src="../asset/img/mypage/<?=$memberInfo2['youPhoto']?>" alt="기본이미지" id="View">
                                    <input type="file" name="imgView" id="imgView" accept="image/*">
                                    <label for="imgView" class="mypage__changeImg">이미지 변경</label>
                                </div>
                            </div>
                        </div>
                        <div class="join-box">
<?php
    $memberID = $_SESSION['memberID'];

    // 쿼리문 작성 -> 해당 ID값의 제목, 내용 출력
    $sql = "SELECT youEmail, youName, youNickName, youBirth, youPhone, youPass FROM myMember WHERE memberID = {$memberID}";
    $result = $connect -> query($sql);
    
    if($result){
        $memberInfo = $result -> fetch_array(MYSQLI_ASSOC);

        // echo "<pre>";
        // var_dump($memberInfo);
        // echo "</pre>";
        echo "<div class='modify'><label for='youName'>이름</label><input type='text' id='youName' name='youName' value='".$memberInfo['youName']."' autocomplete='off'></div>";
        echo "<div class='modify'><label for='youNickName'>닉네임</label><input type='text' id='youNickName' name='youNickName' value='".$memberInfo['youNickName']."' autocomplete='off'></div>";
        echo "<div class='modify'><label for='youBirth'>생년월일</label><input type='text' id='youBirth' name='youBirth' maxlength='12' value='".$memberInfo['youBirth']."' autocomplete='off'></div>";
        echo "<div class='modify'><label for='youPhone'>휴대폰 번호</label><input type='text' id='youPhone' name='youPhone' maxlength='15' value='".$memberInfo['youPhone']."' autocomplete='off'></div>";
        echo "<div class='modify'><label for='youPass'>비밀번호</label><input type='password' id='youPass' name='youPass' maxlength='15' autocomplete='off'></div>";
    }

?>
                            <!-- <div class="modify">
                                <label for="youEmail">이메일</label>
                                <input type="email" id="youEmail" name="youEmail" autocomplete="off">
                            </div>
                            <div class="modify">
                                <label for="youName">이름</label>
                                <input type="text" id="youName"name="youName" autocomplete="off">
                            </div>
                            <div class="modify">
                                <label for="youBirth">생년월일</label>
                                <input type="text" id="youBirth" name="youBirth" maxlength="12" autocomplete="off">
                            </div>
                            <div class="modify">
                                <label for="youPhone">휴대폰 번호</label>
                                <input type="text" id="youPhone" name="youPhone" maxlength="15" autocomplete="off">
                            </div>
                            <div>
                                <label for="youPass">비밀번호 입력/label>
                                <input type="password" id="youPass" name="youPass" maxlength="15" placeholder="로그인 비밀번호를 입력해주세요!" autocomplete="off">
                            </div> -->
                        </div>
                        <button id="joinBtn" class="join-submit" type="submit">회원정보 수정</button>
                    </fieldset>
                </form>
            </div>
        </section>
    </main>

<?php
    include "../include/footer.php";
?>
<!-- // footer -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $(function() {
        $("#imgView").on('change', function(){
            readURL(this);
        });
    });

    function readURL(input) {
        if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
                $('#View').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

   var password = '<?=$memberInfo['youPass']?>';
   function passCheck(){
        if($("#info__password").val() !== password){
            $("#youPassComment").text("비밀번호가 동일하지 않습니다!");
            return false;
        }
    }

</script>


</body>
</html>