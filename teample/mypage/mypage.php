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
    <title>회원 정보</title>
    <link href="https://webfontworld.github.io/BMJua/BMJua.css" rel="stylesheet">

    <style>
        .mypage__inner {
            display: flex;
            justify-content: center;
            width: 100%;
            padding: 100px 0;
        }
        .mypage__profile {
            margin-top: 100px;
            text-align: center;
            border-right: 1px solid #ddd;
            padding-right: 30px;
            position: relative;
        }
        .mypage__img {
            width: 180px;
            height: 180px;
            border-radius: 50%;
            margin-bottom: 10px;
        }
        #imgView {
            position: absolute;
            left: 39%; top: 33%;
            opacity: 0;
            z-index: -9999;
        }
        .mypage__changeImg {
            font-family: 'BMJua';
            color: #fff;
            padding: 5px 15px;
            display: inline-block;
            border-radius: 10px;
            margin-bottom: 50px;
            font-size: 12px;
            background: #000;
            transition: all 0.3s;
            border: 1px solid #fff;
        }
        .mypage__changeImg2 {
            font-family: 'BMJua';
            color: #fff;
            padding: 8px 15px;
            display: inline-block;
            border-radius: 10px;
            margin-bottom: 50px;
            font-size: 12px;
            background: #000;
            transition: all 0.3s;
            border: 1px solid #fff;
        }
        .mypage__changeImg:hover {
            background: #fff;
            color: #000;
            border: 1px solid #000;
        }
        .mypage__changeImg2:hover {
            background: #fff;
            color: #000;
            border: 1px solid #000;
        }
        .mypage__nickName {
            font-size: 24px;
            color: #222;
            margin-bottom: 10px;
        }
        .mypage__name {
            font-size: 18px;
            color: #777;
            margin-bottom: 150px;
        }
        
        .mypage__play {}
        .mypage__play span {
            font-size: 24px;
            padding: 20px 30px;
        }
        .mypage__play em {
            margin-left: 10px;
            font-size: 18px;

        }
        .mypage__play span:nth-child(2) {
            border-right: 1px solid #ccc;
            border-left: 1px solid #ccc;
        }
        .mypage__info {
            width: 900px;
            padding-left: 50px;
            margin-top: 100px;
        }
        .mypage__modifyBtn {
            text-align: right;
        }
        .mypage__modifyBtn a {
            padding: 6px 15px;
            font-size: 18px;
            display: inline-block;
            color: #fff;
            border-radius: 10px;
            background: #000;
            transition: all 0.3s;
            border: 1px solid #fff;
        }
        .mypage__modifyBtn a:hover {
            background: #fff;
            color: #000;
            border: 1px solid #000;
        }
        .mypage__info input {
            width: 100%;
            height: 50px;
            border: 1px solid #ccc;
            border-radius: 10px;
            padding: 15px;
        }
        .info__modify {
          
        }
        .mypage__info .nameWrap {
            display: flex;
            justify-content: space-between;
        }
        .mypage__info label {
            display: block;
            font-size: 14px;
            margin: 20px 0 5px;
        }
        .nameWrap .nameBox {
            width: 49%;
        }
        .nameWrap .nickNameBox {
            width: 49%;
        }
        
        .mypage__info textarea {
            width: 100%;
            margin-bottom: 20px;
            padding: 20px;
            border: 1px solid #000;
            resize: none;
            height: 200px;
            border-radius: 5px;
        }
        .footer {
            background: #f5f5f5;
        }

    </style>

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
    ?>
    <!-- // header -->

<main id="contents">
        <h2 class="ir_so">컨텐츠 영역</h2>
        <section class="mypage-type">
            <div class="mypage__inner">
                <article class="mypage__profile">
<?php
    $memberID = $_SESSION['memberID'];

    // 쿼리문 작성 -> 해당 ID값의 제목, 내용 출력
    $sql = "SELECT youEmail, youName, youNickName, youPhone, youPass, youPhoto, youIntro FROM myTeam WHERE memberID = {$memberID}";
    $result = $connect -> query($sql);
    if($result){
        $memberInfo = $result -> fetch_array(MYSQLI_ASSOC);
?>
                <form action="imgModify.php" id="imgForm" method="post" enctype="multipart/form-data">
                    <figure>
                        <img src="../img/<?=$memberInfo['youPhoto']?>" alt="프로필이미지" class="mypage__img" id="View">
                    </figure>
                        <input type="file" name="imgView" id="imgView" accept="image/*">
                        <label for="imgView" class="mypage__changeImg">이미지 변경</label>
                        <button type="submit" class="mypage__changeImg2">저장</button>
                </form>
                    <div class="mypage__nickName"><?=$memberInfo['youNickName']?></div>
                    <div class="mypage__name"><?=$memberInfo['youName']?></div>
                    <div class="mypage__play">
                        <span>댓글<em>100</em></span> 
                        <span>게시물<em>30</em></span>
                        <span>좋아요<em>1515</em></span>
                    </div>
                </article>
                <article class="mypage__info">
                <h1>회원 정보</h1>
                    <form action="mypageModify.php" name="mypage" method="post" class="info__modify" onsubmit ="return passCheck()">
                        <fieldset>
                            <legend class="ir_so">검색영역</legend>
                            <div class="mypage__modifyBtn">
                                <button type="submit"><a>수정하기</a></button>
                            </div>
                            <div class="nameWrap">
                                <div class="nameBox">
                                    <label for="info__name">이름</label>
                                    <input type="text" name="info__name" id="info__name" class="info__name" value="<?=$memberInfo['youName']?>">
                                </div>
                                <div class="nickNameBox">
                                    <label for="info__nickName">닉네임</label>
                                    <input type="text" name="info__nickName" id="info__nickName" class="info__nickName" value="<?=$memberInfo['youNickName']?>">
                                </div>
                            </div>
                            <div class="info__phone">
                                <label for="info__phone">휴대폰 번호</label>
                                <input type="text" name="info__phone" id="info__phone" class="info__phone" value="<?=$memberInfo['youPhone']?>">
                            </div>
                            <div class="info__password">
                                <label for="info__password">비밀번호</label><span class="comment" id="youPassComment"></span>
                                <input type="password" name="info__password" id="info__password" class="info__password">
                            </div>
                            <div class="info__introduce">
                                <label for="info__introduce">자기소개</label>
                                <textarea name="info__introduce" id="info__introduce" class="info__introduce"><?=$memberInfo['youIntro']?></textarea>
                            </div>
                        </fieldset>
                    </form>
                </article>
<?php }?>
            </div>
        </section> 
    </main>
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