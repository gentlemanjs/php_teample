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
        $memberID = $_SESSION['memberID'];
        $youNickName = $_POST['youNickName'];
        $youName = $_POST['youName'];
        $youBirth = $_POST['youBirth'];
        $youPhone = $_POST['youPhone'];
        $youPass = $_POST['youPass'];
        $youPhoto = $_POST['youPhoto'];

        $ImgFile = $_FILES['imgView'];
        $ImgSize = $_FILES['imgView']['size'];
        $ImgType = $_FILES['imgView']['type'];
        $ImgName = $_FILES['imgView']['name'];
        $ImgTmp = $_FILES['imgView']['tmp_name'];
        $ImgSizeInt = (int)$ImgSize;
    
        //이미지 파일명 확인
        $fileTypeExtenstion = explode("/", $ImgType);
        $fileType = $fileTypeExtenstion[0]; // image
        $fileExtenstion = $fileTypeExtenstion[1]; // image

        
        $sql = "SELECT memberID, youName, youNickName, youBirth, youPhone, youPass FROM myMember WHERE memberID = {$memberID}";
        $result = $connect -> query($sql);
        $info = $result -> fetch_array(MYSQLI_ASSOC);
    
        if($info['memberID'] == $memberID && $info['youPass'] == $youPass){
            if($ImgSize !== 0){
                if($fileType == "image"){
                    //용량 확인
                    if($ImgSize < 1048576){
                        //확장자 확인
                        if($fileExtenstion == "jpg" || $fileExtenstion == "jpeg" || $fileExtenstion == "png" || $fileExtenstion == "gif"){
                            $ImgDir = "../asset/img/mypage/";
                            $ImgName = "Img_".time().rand(1,99999)."."."{$fileExtenstion}";
                            $sql = "UPDATE myMember SET youPhoto = '{$ImgName}', youName = '{$youName}', youNickName = '{$youNickName}', youBirth = '{$youBirth}', youPhone = '{$youPhone}' WHERE memberID = '$memberID'";
                        } else {
                            echo "<script>alert('지원하는 이미지 파일 형식이 아닙니다. jpg, png, gif 사진 파일만 지원됩니다.'); history.back('1');</script>";
                        }
                    } else {
                        echo "<script>alert('이미지 용량이 초과되었습니다. 1MB이하의 이미지만 업로드 가능합니다.'); history.back(1);</script>";
                    }
                } else {
                    echo "<script>alert('이미지 파일만 업로드해주세요.'); history.back(1);</script>";
                }
            } else {
                $sql = "UPDATE myMember SET youPhoto = 'default.svg'";
            }
        } else {
            echo "<script>alert('비밀번호가 틀렸습니다'); histort.back(1);</script>";
        }
        
    $result = $connect -> query($sql);
    $result = move_uploaded_file($ImgTmp, $ImgDir.$ImgName);
    echo "<script>alert('수정되었습니다'); history.back(1);</script>";

    ?>
    <script>
        location.href="mypage.php";
    </script>
</body>
</html>