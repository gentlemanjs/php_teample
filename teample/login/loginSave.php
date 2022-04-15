<?php
    include "../../connect/connect.php";
    include "../../connect/session.php";
    $youEmail = $_POST['youEmail'];
    $youPass = $_POST['youPass'];
    $agree = $_POST['agree'];
    //메세지 출력
    function msg($alert){
        echo "<p class='alert'>{$alert}</p>";
    }
    //데이터 가져오기 -> 유효성 검사(X) -> 데이터 불러오기
    $sql = "SELECT memberID, youName, youEmail, youPass, youNickName FROM myTeam WHERE youEmail = '$youEmail' AND youPass = '$youPass'";
    $result = $connect -> query($sql);
    if($result){
        $count = $result -> num_rows;
        if($count == 0){
            echo "<script>alert('이메일 또는 비밀번호가 잘못되었습니다. 다시 한번 확인해주세요!');history.back(1);</script>";
            // msg("이메일 또는 비밀번호가 잘못되었습니다. 다시 한번 확인해주세요!");
        } else {
            if(isset($agree)){
                setcookie("id", $youEmail, time()+60*2);
            } else {
                setcookie("id", $youEmail, time()-3600*2);
            }
            //로그인 성공
            $memberInfo = $result -> fetch_array(MYSQLI_ASSOC);
            //세션 추가
            $_SESSION['memberID'] = $memberInfo['memberID'];
            $_SESSION['youName'] = $memberInfo['youName']; 
            $_SESSION['youEmail'] = $memberInfo['youEmail'];
            $_SESSION['youNickName'] = $memberInfo['youNickName'];
            //메인
            // echo "<script>history.go(-2);</script>";
            Header("Location: ../page/main.php");
        }
    }
?>