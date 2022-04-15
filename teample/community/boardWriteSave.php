<?php
    include "../../connect/connect.php";
    include "../../connect/session.php";
    include "../../connect/sessionCheck.php";
    $memberID = $_SESSION['memberID'];
    $youNickName = $_SESSION['youNickName'];
    $boardTitle = $_POST['boardTitle'];
    $boardMeet = $_POST['boardMeet'];
    $boardContents = $_POST['boardContents'];
    $boardLike = 0;
    $boardConfirm = 'waiting';
    $regTime = time();
    $boardThema = $_POST['boardThema'];
    $boardTitle = $connect -> real_escape_string($boardTitle);
    $boardContents = $connect -> real_escape_string($boardContents);
    if(isset($boardThema)){
        if($boardThema == 'boardThemaQ'){
            $sql = "INSERT INTO teamBoardQ(memberID, boardTitle, boardContents, boardConfirm, regTime) VALUES('$memberID', '$boardTitle', '$boardContents', '$boardConfirm','$regTime');";
            $result = $connect -> query($sql);
            Header("Location: boardQ.php");
        } else if($boardThema == 'boardThemaN'){
            $sql = "INSERT INTO teamBoardN(memberID, youNickName, boardTitle, boardMeet, boardContents, boardLike, regTime) VALUES('$memberID', '$youNickName', '$boardTitle', '$boardMeet', '$boardContents', '$boardLike','$regTime');";
            $result = $connect -> query($sql);
            Header("Location: boardN.php");
        }
    } else {
        echo "<script>alert('테마를 선택해주세요.');history.back(1);</script>";
    }
?>