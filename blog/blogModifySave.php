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
    <title>Document</title>
</head>
<body>
    <?php 
        $blogID = $_POST['blogID'];
        $blogTitle = $_POST['blogTitle'];
        $blogCate = $_POST['blogCate'];
        $blogContents = $_POST['blogContents'];
        $blogImgFile = $_FILES['blogFile'];
        $blogImgSize = $_FILES['blogFile']['size'];
        $blogImgType = $_FILES['blogFile']['type'];
        $blogImgName = $_FILES['blogFile']['name'];
        $blogImgTmp = $_FILES['blogFile']['tmp_name'];


        $blogTitle = $connect -> real_escape_string($blogTitle);
        $blogContents = $connect -> real_escape_string($blogContents);


        //이미지 파일명 확인
        $fileTypeExtension = explode("/", $blogImgType);
        $fileType = $fileTypeExtension[0]; //image
        $fileExtension = $fileTypeExtension[1]; //jepg
        
    
        //이미지 확인 
        if($blogImgSize !== 0){
            if($fileType == "image"){
                //용량 확인
                if($blogImgSize < 1048576){
                    //확장자 확인
                    if($fileExtension == "jpg" || $fileExtension == "jpeg" || $fileExtension == "png" || $fileExtension == "gif"){
                        $blogImgDir = "../asset/img/blog/";
                        $blogImgName = "Img_".time().rand(1,99999)."."."{$fileExtension}";
                        $sql = "UPDATE myBlog SET blogTitle = '{$blogTitle}', blogContents = '{$blogContents}', blogImgFile = '{$blogImgName}', blogCategory = '{$blogCate}', blogImgSize = '{$blogImgSize}' WHERE blogID = '{$blogID}'";
                        $result = $connect -> query($sql);
                        $result = move_uploaded_file($blogImgTmp, $blogImgDir.$blogImgName);
                        Header("Location: blog.php");
                    } else {
                        echo "<script>alert('지원하는 이미지 파일 형식이 아닙니다. jpg, png, gif 사진 파일만 지원됩니다.'); history.back(1);</script>";
                    }
                } else {
                    echo "<script>alert('이미지 용량이 초과되었습니다. 1MB이하의 이미지만 업로드 가능합니다.'); history.back(1);</script>";
                }
            } else {
                echo "<script>alert('이미지 파일만 업로드해주세요.'); history.back(1);</script>";
            }
        } else {
            $sql = "UPDATE myBlog SET blogTitle = '{$blogTitle}', blogContents = '{$blogContents}', blogCategory = '{$blogCate}' WHERE blogID = '{$blogID}'";
            $result = $connect -> query($sql);
        }
    ?>
    <script>
        location.href = "blog.php";
    </script>
</body>
</html>