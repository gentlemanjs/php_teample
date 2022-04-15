<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
<?php
    include "../../connect/connect.php";
    include "../../connect/session.php";
    include "../../connect/sessionCheck.php";
    $memberID = $_SESSION['memberID'];
    $boardTitle = $_POST['boardTitle'];
    $boardContents = $_POST['boardContents'];
    $youNickName = $_SESSION['youNickName'];
    $regTime = time();
    $boardTitle = $connect -> real_escape_string($boardTitle);
    $boardContents = $connect -> real_escape_string($boardContents);
    $sql = "INSERT INTO teamBoardT(memberID, boardTitle, boardContents, youNickName, regTime) VALUES('$memberID', '$boardTitle', '$boardContents', '$youNickName','$regTime');";
    $connect -> query($sql);
    
    // echo $youNickName;
    Header("Location: boardT.php");
?>
    </body>
    </html>
