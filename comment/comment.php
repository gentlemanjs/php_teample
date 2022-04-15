<?php
    include "../connect/connect.php";
    include "../connect/session.php";
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>댓글</title>
    

    <?php
        include "../include/style.php";
    ?>
        
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
        <section id="card-type" class="section center">
            <div class="container">
                <h3 class="section__title">저희집 강아지를 소개합니다!</h3>
                    <p class="section__desc">
                        남자 보더콜리에요! <br>
                        가장 마음에 드는 사진에 댓글을 부탁드려요!
                    </p>
                    <div class="card__inner">
                        <article class="card">
                            <figure class="card__header">
                                <img class="card__img" src="img/card1.jpg" alt="이미지1">
                            </figure>
                            <div class="card__body">
                                <h3 class="card__title">바다보고 신난 폴리</h3>
                                <p class="card__desc">강릉여행에서 바다에서 수영하고 신난 폴리모습이에요! 모래투성이가 잔뜩 묻어도 신난 모습이 어린아이같죠? 이 모습이 귀엽다면 댓글을!</p>
                                <a class="card__btn" href="#">
                                    더 자세히 보기
                                    <svg width="52" height="8" viewBox="0 0 52 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M51.3536 4.35355C51.5488 4.15829 51.5488 3.84171 51.3536 3.64645L48.1716 0.464466C47.9763 0.269204 47.6597 0.269204 47.4645 0.464466C47.2692 0.659728 47.2692 0.976311 47.4645 1.17157L50.2929 4L47.4645 6.82843C47.2692 7.02369 47.2692 7.34027 47.4645 7.53553C47.6597 7.7308 47.9763 7.7308 48.1716 7.53553L51.3536 4.35355ZM0 4.5H51V3.5H0V4.5Z" fill="#5B5B5B"/>
                                    </svg>
                                </a>
                            </div>
                        </article>
                        <article class="card">
                            <figure class="card__header">
                                <img class="card__img" src="img/card2.jpg" alt="이미지2">
                            </figure>
                            <div class="card__body">
                                <h3 class="card__title">시무룩한 폴리</h3>
                                <p class="card__desc">비오는날 산책을 못가 시무룩해 있는 폴리모습이에요! 어렸을 때 비오는 날엔 산책도 못하고 아쉬워했는데, 지금은 우비를 입고 같이 비맞으면서 산책을 해요!</p>
                                <a class="card__btn" href="#">
                                    더 자세히 보기
                                    <svg width="52" height="8" viewBox="0 0 52 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M51.3536 4.35355C51.5488 4.15829 51.5488 3.84171 51.3536 3.64645L48.1716 0.464466C47.9763 0.269204 47.6597 0.269204 47.4645 0.464466C47.2692 0.659728 47.2692 0.976311 47.4645 1.17157L50.2929 4L47.4645 6.82843C47.2692 7.02369 47.2692 7.34027 47.4645 7.53553C47.6597 7.7308 47.9763 7.7308 48.1716 7.53553L51.3536 4.35355ZM0 4.5H51V3.5H0V4.5Z" fill="#5B5B5B"/>
                                    </svg>
                                </a>
                            </div>
                        </article>
                        <article class="card">
                            <figure class="card__header">
                                <img class="card__img" src="img/card3.jpg" alt="이미지3">
                            </figure>
                            <div class="card__body">
                                <h3 class="card__title">멍때리는 폴리</h3>
                                <p class="card__desc">전날 신나게 뛰어놀고 아침에 비몽사몽 표정인 폴리에요! 보더콜리는 무한체력인데 가끔 본인도 지치는지 멍때릴 때가 있어요! 더 신나게 놀아줄 수 있다면 댓글을!</p>
                                <a class="card__btn" href="#">
                                    더 자세히 보기
                                    <svg width="52" height="8" viewBox="0 0 52 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M51.3536 4.35355C51.5488 4.15829 51.5488 3.84171 51.3536 3.64645L48.1716 0.464466C47.9763 0.269204 47.6597 0.269204 47.4645 0.464466C47.2692 0.659728 47.2692 0.976311 47.4645 1.17157L50.2929 4L47.4645 6.82843C47.2692 7.02369 47.2692 7.34027 47.4645 7.53553C47.6597 7.7308 47.9763 7.7308 48.1716 7.53553L51.3536 4.35355ZM0 4.5H51V3.5H0V4.5Z" fill="#5B5B5B"/>
                                    </svg>
                                </a>
                            </div>
                        </article>
                    </div>
            </div>
        </section>
    <!-- //card-type -->

        <section id="comment-type" class="section center gray">
            <h3 class="section__title">폴리에게 한마디</h3>
            <p class="section__desc">귀여운 폴리에게 한마디씩 부탁드립니다! 100글자 이내로 써주세요!</p>
            <div class="comment__inner">
                <div class="comment__form">
                    <form action="commentSave.php" method="post" name="comment">
                        <fieldset>
                            <legend class="ir_so">댓글쓰기</legend>
                            <div class="comment__wrap">
                                <div>
                                    <label for="youName" class="ir_so">이름</label>
                                    <input type="text" name="youName" id="youName" class="input__style" placeholder="이름" autocomplete="off" required>
                                </div>
                                <div>
                                    <label for="youText" class="ir_so">댓글 쓰기</label>
                                    <input type="text" name="youText" id="youText" class="input__style width" placeholder="폴리에게 할말을 적어주세요!" autocomplete="off" required>
                                </div>
                                <button class="comment__btn" type="submit" value="댓글 작성하기">작성하기</button>
                            </div>
                        </fieldset>
                    </form>
                </div>
                <div class="comment__list">
                    <!-- <div class="list">
                        <p class="comment__desc">
                            너무 귀여워요! 저희 강아지랑 친구해요!
                        </p>
                        <div class="comment__icon">
                            <span class="face"><img src="img/Group@2x.png" alt="얼굴"></span>
                            <span class="name">쓴 사람</span>
                            <span class="date">2022-03-17</span>
                        </div>
                    </div> -->
                   <?php
                        include "../connect/connect.php";

                        $sql = "SELECT * FROM myComment";
                        $result = $connect -> query($sql);

                        if($result){
                            $count = $result -> num_rows;
                            if ($count > 0){
                                for($i=0; $i<=$count; $i++){
                                    $commentInfo = $result -> fetch_array(MYSQLI_ASSOC);
                                    echo "<div class='list'>";
                                    echo "<p class='comment__desc'>".$commentInfo['youText']."</p>";
                                    echo "<div class='comment__icon'>";
                                    echo "<span class='face'><img src='img/Group@2x.png' alt='얼굴'></span>";
                                    echo "<span class='name'>".$commentInfo['youName']."</span>";
                                    echo "<span class='date'>".date('Y-m-d', $commentInfo['regTime'])."</span>";
                                    echo "</div>";                    
                                    echo "</div>";                    
                                }
                            }
                        }

                        // echo "<pre>";
                        // var_dump($commentInfo);
                        // echo "</pre>";
                        
                    ?>
                     <!-- while($commentInfo = $result -> fetch_array(MYSQLI_ASSOC)){
                            <div class="list">
                                <p class="comment__desc">$commentInfo['youText']</p>
                                <div class="comment__icon">
                                    <span class="face"><img src="img/Group@2x.png" alt="얼굴"></span>
                                    <span class="name">$commentInfo['youName']</span>
                                    <span class="date">date('Y-m-d', $commentInfo['regTime'])</span>
                                </div>
                            </div>
                     } -->


                   
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