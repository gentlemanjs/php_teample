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
    <title>블로그 수정하기</title>

    
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
                <h3 class="section__title">블로그 수정하기</h3>
                <p class="section__desc">블로그를 수정해 주세요!</p>
                <div class="blog__inner">
                    <div class="blog__write">
                        <?php
                            $blogID = $_GET['blogID'];

                            $sql = "SELECT blogTitle, blogContents, blogCategory FROM myBlog WHERE blogID = {$blogID}";
                            $result = $connect -> query($sql);
                            $blogInfo = $result -> fetch_array(MYSQLI_ASSOC);
                        ?>
                        <form action="blogModifySave.php" name="blogWrite" method="post" enctype="multipart/form-data">
                            <fieldset>
                                <legend class="ir_so">블로그 게시글 수정 영역</legend>
                                <div class="ir_so">
                                    <label for="blogID">블로그번호</label>
                                    <input type="text" name="blogID" id="blogID" value="<?=$blogID?>" required>
                                </div>
                                <div>
                                    <label for="blogCate">카테고리</label>
                                    <select name="blogCate" id="blogCate">
                                        <option value="trip" <?php if($blogInfo['blogCategory'] == "trip") echo "SELECTED"?>>trip</option>
                                        <option value="play" <?php if($blogInfo['blogCategory'] == "play") echo "SELECTED"?>>play</option>
                                        <option value="smile" <?php if($blogInfo['blogCategory'] == "smile") echo "SELECTED"?>>smile</option>
                                        <option value="sleep" <?php if($blogInfo['blogCategory'] == "sleep") echo "SELECTED"?>>sleep</option>
                                    </select>
                                <div>
                                    <label for="blogTitle">제목</label>
                                    <input type="text" name="blogTitle" id="blogTitle" value="<?=$blogInfo['blogTitle']?>" required>
                                </div>
                                <div>
                                    <label for="blogContents">내용</label>
                                    <textarea name="blogContents" id="blogContents" required><?=$blogInfo['blogContents']?></textarea>
                                </div>
                                <div>
                                    <label for="blogFile">파일</label>
                                    <input type="file" name="blogFile" id="blogFile" accept="image/*" placeholder="사진을 넣어주세요! 사진은 jpg, gif, png 파일만 지원이 됩니다.">
                                </div>
                                <button type="submit" value="저장하기">저장하기</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>
    

    <?php
    include "../include/footer.php";
    ?>
</body>
</html>