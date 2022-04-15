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
    <title>PHP 사이트</title>

    <?php
        include "../include/style.php"
    ?>
    <style>
        #footer {
            background: #f5f5f5;;
        }
        .the {
            color: #fff;
        }
    </style>
</head>
<body>
    <?php
    include "../include/header.php";
    ?>
    <!-- // header -->
    
    <main id="contents">
        <div class="slider__wrap">
            <div class="slider__img">
                <div class="slider__inner">
                    <div class="slider s1"><img src="../asset/img/bg01.jpg" alt="이미지1"></div>
                    <div class="slider s2"><img src="../asset/img/bg02.jpg" alt="이미지2"></div>
                    <div class="slider s3"><img src="../asset/img/bg03.jpg" alt="이미지5"></div>
                </div>
            </div>
            <div class="slider__btn">
                <a href="#" class="prev">prev</a>
                <a href="#" class="next">next</a>
            </div>
            <div class="slider__dot">
                <!-- <a href="#" class="dot active"></a>
                <a href="#" class="dot"></a>
                <a href="#" class="dot"></a>
                <a href="#" class="dot"></a>
                <a href="#" class="dot"></a> -->
            </div>
        </div>
        <h2 class="ir_so">컨텐츠 영역</h2>
        <section id="blog-type" class="section center type">
            <div class="container">
                <h3 class="section__title">폴리 블로그</h3>
                <p class="section__desc">폴리와 관련된 블로그입니다. 다양한 사진을 확인하세요!</p>
                <div class="blog__inner">
                    <div class="blog__cont">
                    <?php 
    $sql = "SELECT blogID, blogCategory, blogTitle, blogContents, blogAuthor, blogImgFile, blogRegTime FROM myBlog WHERE blogDelete = 1 ORDER BY blogID DESC LIMIT 3";
    $result = $connect -> query($sql);
    
    foreach($result as $blogInfo){ ?>
           <article class="blog mb20">
              <figure class="blog__header">
                <a href="../blog/blogView.php?blogID=<?=$blogInfo['blogID']?>" style="background-image: url(../asset/img/blog/<?=$blogInfo['blogImgFile']?>)"></a>
            </figure>
              <div class="blog__body">
                  <span class="blog__cate"><?=$blogInfo['blogCategory']?></span>
                  <div class="blog__title"><?=$blogInfo['blogTitle']?></div>
                  <div class="blog__desc"><?=$blogInfo['blogContents']?></div>
                  <div class="blog__info">
                      <span class="author"><a href="#"><?=$blogInfo['blogAuthor']?></a></span>
                      <span class="date"><?=date('Y-m-d', $blogInfo['blogRegTime'])?></span>
                  </div>
              </div>
          </article>
 <?php }?>
                    </div>
                    <div class="blog__btn">
                        <a href="../blog/blog.php">더 보기</a>
                    </div>
                </div>
            </div>
        </section>

        
        <section id="quiz-type" class="section center gray">
            <div class="container">
                <h3 class="section__title">퀴즈</h3>
                <p class="section__desc">
                    웹디자이너, 웹 퍼블리셔, 프론트앤드 개발자를 위한 강의 퀴즈입니다.
                </p>
                <div class="quiz__inner">
                    <div class="quiz__header">
                        <div class="quiz__subject">
                            <label for="quizSubject">과목 선택</label>
                            <select name="quizSubject" id="quizSubject">
                                <option value="javascript">javascript</option>
                                <option value="html">html</option>
                                <option value="css">css</option>
                            </select>
                        </div>
                    </div>
                    <div class="quiz__body">
                        <div class="title">
                            <span class="quiz__num"></span> .
                            <span class="quiz__ask"></span>
                            <div class="quiz__desc"></div>
                        </div>
                        <div class="contents">
                            <div class="quiz__selects">
                                <label for="select1">
                                    <input class="select" type="radio" id="select1" name="select" value="1">
                                    <span class="choice"></span>
                                </label>
                                <label for="select2">
                                    <input class="select" type="radio" id="select2" name="select" value="2">
                                    <span class="choice"></span>
                                </label>
                                <label for="select3">
                                    <input class="select" type="radio" id="select3" name="select" value="3">
                                    <span class="choice"></span>
                                </label>
                                <label for="select4">
                                    <input class="select" type="radio" id="select4" name="select" value="4">
                                    <span class="choice"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="quiz__footer">
                        <div class="quiz__btn">
                            <button class="orange"><a class="the" href="../quiz/quiz.php">더 보기</a></button>
                            <button class="comment green none">해설 보기</button>
                            <button class="next orange right ml10 none">다음 문제</button>
                            <button class="confirm green right">정답 확인</button>
                        </div>
                    </div>
                    
                </div>
                
            </div>
        </section>

        <!-- // quiz -->


        <section id="notice-type" class="section center">
            <div class="container">
                <h3 class="section__title">새로운 소식</h3>
                <p class="section__desc">폴리와 관련된 소식입니다. 다양한 소식을 확인하세요!</p>
                <div class="notice__inner">
                    <article class="notice">
                        <h4>공지사항</h4>
                        <ul>
            <?php
                $sql = "SELECT * FROM myBoard ORDER BY boardID DESC LIMIT 5";
                $result = $connect -> query($sql);
                                
                forEach($result as $boardInfo){ ?>                            
                            <li><a href="../board/boardView.php?boardID=<?=$boardInfo['boardID']?>"><?=$boardInfo['boardTitle']?></a><span class="time"><?=date('Y-m-d', $boardInfo['regTime'])?></span></li>
<?php           } ?>
                        </ul>
                        <a href="../board/board.php" class="more">더보기</a>
                    </article>
                    <article class="notice">
                        <h4>댓글</h4>
                        <ul>
            <?php 
                $sql = "SELECT * FROM myComment ORDER BY commentID DESC LIMIT 5";
                $result = $connect -> query($sql);

                forEach($result as $commentInfo){
            ?>
                            <li><a href="../comment/comment.php#comment-type"><?=$commentInfo['youText']?></a><span class="time"><?=date('Y-m-d', $commentInfo['regTime'])?></li>
<?php           } ?>
                        </ul>
                        <a href="../comment/comment.php" class="more">더보기</a>
                    </article>
                </div>
            </div> 
        </section> 
        <!-- // notice-type -->





    </main>
    <!-- // main -->

    <?php
    include "../include/footer.php";
    ?>
    <!-- // footer -->
    
    <script src="../asset/js/slider.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        let quizAnswer = "";

        function quizView(view){
            $(".quiz__num").text(view.quizID);
            $(".quiz__ask").text(view.quizAsk);
            $("#select1 + span").text(view.quizChoice1);
            $("#select2 + span").text(view.quizChoice2);
            $("#select3 + span").text(view.quizChoice3);
            $("#select4 + span").text(view.quizChoice4);
            quizAnswer = view.quizAnswer;
        }


        //정답 체크
        function quizCheck(){
            let selectCheck = $(".quiz__selects input:checked").val();

            // 정답을 체크 안했으면
            if(selectCheck == null || selectCheck == ''){
                alert("정답을 체크해주세요!!");
            } else {
                // 정답을 체크 했으면
                $(".quiz__btn .next").fadeIn(500);
                $(".quiz__selects input").attr('disabled', true);
                if(selectCheck == quizAnswer){
                    $(".quiz__selects #select"+quizAnswer).addClass("correct")
                } else {
                    $(".quiz__selects #select"+selectCheck).addClass("incorrect")
                    $(".quiz__selects #select"+quizAnswer).addClass("correct")
                }
            }
        }


        function quizData(){
            let quizSubject = $("#quizSubject").val();
            $.ajax({ 
                url: "../quiz/quizInfo.php",
                method: "POST",
                data: {"quizSubject": quizSubject},
                dataType: "json",
                success: function(data){
                    quizView(data.quiz);
                },
                error: function(request, status, error){
                    console.log('request' + request);
                    console.log('status' + status);
                    console.log('error' + error);
                }
            })
        }
        quizData();

        // 리셋 
        function reset(){
            $(".quiz__selects input").attr('disabled', false);
            $(".quiz__selects input").removeClass("correct")
            $(".quiz__selects input").removeClass("incorrect")
            $(".quiz__selects input").prop("checked", false);
            $(".quiz__btn .next").hide();
        }

        // 과목 선택
        $("#quizSubject").change(function(){
            quizData();
            reset();
        })

        // 정답 확인
        $(".quiz__btn .confirm").click(function(){
            // 정답을 클릭했는지 안했는지 판단

            quizCheck();
            // $(".quiz__btn .comment").fadeIn(500);
        });

        // 다음문제
        $(".quiz__btn .next").click(function(){
            let quizSubject = $("#quizSubject").val();
            quizData(quizSubject);
            reset();
        })

        // 해설보기
        $(".comment").click(function(e){
            $(".layer").fadeIn(300);
        })
        $(".layer .close").click(function(e){
            e.preventDefault(); 
            $(".layer").fadeOut(300);
        })
    </script>
</body>
</html>