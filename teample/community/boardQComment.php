<?php
    include "../../connect/connect.php";
    include "../../connect/session.php";
    include "../../connect/sessionCheck.php";
    $boardID = $_GET['boardID'];
    $youNickName = $_SESSION['youNickName'];
    $commentContents = $_POST['commentContents'];
    $regTime = time();
    $sql = "INSERT INTO boardQComment(boardID, youNickName, commentContents, regTime)VALUE('$boardID','$youNickName','$commentContents','$regTime')";
    $connect -> query($sql);
    echo "<script>history.go(-1);</script>";
?>