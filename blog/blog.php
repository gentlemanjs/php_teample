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
    <title>블로그 글쓰기</title>

    
    <?php
        include "../include/style.php";
    ?>
    <style>
        .footer {
            background: #f5f5f5;
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
        <section id="blog-type" class="section center mb100">
            <div class="container">
                <h3 class="section__title">폴리 블로그</h3>
                <p class="section__desc">폴리와 관련된 블로그입니다. 다양한 사진을 확인하세요!</p>
                <div class="blog__inner">
                    <div class="blog__search">
                        <form action="blogSearch.php" method="get">
                            <fieldset>
                                <legend class="ir_so">검색 영역</legend>
                                <input type="search" name="blogSearch" id="blogSearch" class="search" placeholder="검색어를 입력해주세요!">
                                <label for="blogSearch" class="ir_so">검색</label>
                                <button class="button">검색</button>
                            </fieldset>
                        </form>
                    </div>
                    <div class="blog__btn">
                        <a href="blogWrite.php">글쓰기</a>
                    </div>
                    <div class="blog__cont">
<?php 
    if(isset($_GET['page'])){
        $page = (int) $_GET['page'];
    } else {
        $page = 1;
    }

    // 게시판 불러올 갯수
    $pageView = 5;
    $pageLimit = ($pageView * $page) - $pageView;

    $sql = "SELECT blogID, blogCategory, blogTitle, blogContents, blogAuthor, blogImgFile, blogRegTime FROM myBlog WHERE blogDelete = 1 ORDER BY blogID DESC LIMIT {$pageLimit}, {$pageView}";
    $result = $connect -> query($sql);
    
    foreach($result as $blogInfo){ ?>
           <article class="blog mb20">
              <figure class="blog__header">
                <a href="blogView.php?blogID=<?=$blogInfo['blogID']?>" style="background-image: url(../asset/img/blog/<?=$blogInfo['blogImgFile']?>)"></a>
            </figure>
              <div class="blog__body">
                  <span class="blog__cate"><?=$blogInfo['blogCategory']?></span>
                  <div class="blog__title"><a href="blogView.php?blogID=<?=$blogInfo['blogID']?>"><?=$blogInfo['blogTitle']?></a></div>
                  <div class="blog__desc"><?=$blogInfo['blogContents']?></div>
                  <div class="blog__info">
                      <span class="author"><a href="#"><?=$blogInfo['blogAuthor']?></a></span>
                      <span class="date"><?=date('Y-m-d', $blogInfo['blogRegTime'])?></span>
                      <span class="modify"><a href="blogModify.php?blogID=<?=$blogInfo['blogID']?>">수정</a></span>
                      <span class="delete"><a href="blogDelete.php?blogID=<?=$blogInfo['blogID']?>" onclick="return noticeRemove()">삭제</a></span>
                  </div>
              </div>
          </article>
 <?php }?> 
                        <!-- <article class="blog">
                            <figure class="blog__header">
                                <img src="../comment/img/card1.jpg" alt="블로그 이미지">
                            </figure>
                            <div class="blog__body">
                                <span class="blog__cate">TRIP</span>
                                <div class="blog__title">바다보고 신난 폴리</div>
                                <div class="blog__desc">강릉여행에서 바다에서 수영하고 신난 폴리모습이에요! 모래투성이가 잔뜩 묻어도 신난 모습이 어린아이같죠? 이 모습이 귀엽다면 댓글을! 강릉여행에서 바다에서 수영하고 신난 폴리모습이에요! 모래투성이가 잔뜩 묻어도 신난 모습이 이 모습이 귀엽다면 댓글을! 강릉여행에서 바다에서 수영하고 신난 폴리모습이에요! 신난 폴리모습이에요! 신난 폴리모습이에요!신난 폴리모습이에요!신난 폴리모습이에요!신난 폴리모습이에요!신난 폴리모습이에요!신난 폴리모습이에요!신난 폴리모습이에요!</div>
                                <div class="blog__info">
                                    <span class="author"><a href="#">김정식</a></span>
                                    <span class="date">2022-03-24 10:49</span>
                                    <span class="delete"><a href="#">삭제</a></span>
                                    <span class="modify"><a href="#">수정</a></span>
                                </div>
                            </div>
                        </article> -->
                        
                    </div>
                    <div class="blog__pages">
                        <ul>
                            <?php
                                include "blogPage.php";
                                ?>
                            </ul>
                    </div>
                </div>
            </div>
        </section>
    </main>
    

    <?php
    include "../include/footer.php";
    ?>
    <script>
        function noticeRemove(){
            let notice = confirm("정말 삭제하시겠습니까?","");
            return notice;
        }
    </script>
    <!-- // footer -->
</body>
</html>