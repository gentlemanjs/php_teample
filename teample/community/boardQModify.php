<?php
    include "../../connect/connect.php";
    include "../../connect/session.php";
    include "../../connect/sessionCheck.php";
    $boardID = $_GET['boardID'];
    $boardTitle = $_POST['QView__title'];
    $boardContents = $_POST['QView__desc'];
    $sql = "UPDATE teamBoardQ SET boardTitle = '{$boardTitle}', boardContents = '{$boardContents}' WHERE boardID = {$boardID}";
    $connect -> query($sql);
    Header("Location: boardQView.php?boardID=$boardID");
?>