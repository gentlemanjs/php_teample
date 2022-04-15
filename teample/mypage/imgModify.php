<?php
    include "../../connect/connect.php";
    include "../../connect/session.php";
    include "../../connect/sessionCheck.php";

    $memberID = $_SESSION['memberID'];

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

    //// 이미지 확인작업 / 용량 확인

    if($ImgSize !== 0){
        if($fileType == "image"){
            //용량 확인
            if($ImgSize < 1048576){
                //확장자 확인
                if($fileExtenstion == "jpg" || $fileExtenstion == "jpeg" || $fileExtenstion == "png" || $fileExtenstion == "gif"){
                    $ImgDir = "../img/";
                    $ImgName = "Img_".time().rand(1,99999)."."."{$fileExtenstion}";
                    $sql = "UPDATE myTeam SET youPhoto = '{$ImgName}' WHERE memberID = '$memberID'";
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
        $sql = "UPDATE myTeam SET youPhoto = 'default.svg'";
    }

    $result = $connect -> query($sql);
    $result = move_uploaded_file($ImgTmp, $ImgDir.$ImgName);
    echo "<script>history.back(1);</script>";
?>