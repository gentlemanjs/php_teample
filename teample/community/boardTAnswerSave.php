<?php
    include "../../connect/connect.php";
    include "../../connect/session.php";
    include "../../connect/sessionCheck.php";
    $boardID = $_POST['boardID'];
    $memberID = $_SESSION['memberID'];
    $youNickName = $_SESSION['youNickName'];
    $answerContents = $_POST['answerContents'];
    $regTime = time();
    echo $regTime;
    $sql = "INSERT INTO teamBoardTAnswer(boardID, memberID, answerContents, youNickName, regTime) VALUES('$boardID', '$memberID', '$answerContents', '$youNickName', '$regTime');";
    $result = $connect -> query($sql);
    if($result){
        echo "<script>alert('작성완료'); history.back(1);</script>";
    }
?>