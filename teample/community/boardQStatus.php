<?php
    include "../../connect/connect.php";
    include "../../connect/session.php";
    $boardID = $_GET['boardID'];
    $sql = "UPDATE teamBoardQ SET boardConfirm = 'complete' WHERE boardID = {$boardID};";
    $connect -> query($sql);
    echo "<script>history.go(-1);</script>";
?>