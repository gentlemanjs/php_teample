<?php
    include "../../connect/connect.php";
    include "../../connect/session.php";
    include "../../connect/sessionCheck.php";

    $memberID = $_SESSION['memberID'];
    $youName = $_POST['info__name'];
    $youNickName = $_POST['info__nickName'];
    $youPhone = $_POST['info__phone'];
    $youPass = $_POST['info__password'];
    $youIntro = $_POST['info__introduce'];


    $sql = "SELECT memberID, youName, youNickName, youPhone, youPass FROM myTeam WHERE memberID = {$memberID}";
    $result = $connect -> query($sql);
    $info = $result -> fetch_array(MYSQLI_ASSOC);

    if($info['memberID'] == $memberID && $info['youPass'] == $youPass){
        $sql = "UPDATE myTeam SET youName = '{$youName}', youNickName = '{$youNickName}', youPhone = '{$youPhone}', youIntro = '{$youIntro}' WHERE memberID = {$memberID}";
        $connect -> query($sql);
    }
    
    Header("Location: mypage.php");
?>
