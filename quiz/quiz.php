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
        include "../include/style.php";
    ?>
</head>
<body>
    <?php
        include "../include/header.php";
    ?>
    <!-- //header -->

    <div class="layer">
        <h2>문제해설</h2>
        <p></p>
        <a href="#" class="close">닫기</a>
    </div>
    <!-- // layer  -->
    <main id="contents">
        <h2 class="ir_so">컨텐츠 영역</h2>
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
                            <button class="comment green none">해설 보기</button>
                            <button class="next orange right ml10 none">다음 문제</button>
                            <button class="confirm green right">정답 확인</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <!-- //main -->
    <?php
        include "../include/footer.php";
    ?>
    <!-- //footer -->
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
            $(".layer p").text(view.quizComment);
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
                $(".quiz__btn .comment").fadeIn(500);
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
                url: "quizInfo.php",
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
            $(".quiz__btn .comment").hide();
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