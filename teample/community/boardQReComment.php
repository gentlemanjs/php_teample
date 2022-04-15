<?php
    include "../../connect/connect.php";
    include "../../connect/session.php";
    include "../../connect/sessionCheck.php";

    $reCommentID = $_GET['reCommentID'];
    $boardID = $_GET['boardID'];
    $youNickName = $_SESSION['youNickName'];
    $commentContents = $_POST['commentContents'];
    $parent = 'YES';
    $layer = $_GET['layer'] + 1;
    $regTime = time();
    echo $parent;
    $sql = "INSERT INTO boardQComment(reCommentID, boardID, youNickName, commentContents, parent, layer, regTime) VALUE('$reCommentID','$boardID','$youNickName','$commentContents','$parent','$layer','$regTime')";
    $connect -> query($sql);
    echo "<script>history.go(-1);</script>";
    
?>