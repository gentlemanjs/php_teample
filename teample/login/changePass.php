<?php
    include "../../connect/connect.php";
    $youPass = $_POST['youPass'];
    $youPassC = $_POST['youPassC'];
    $youEmail = $_POST['youEmail'];

    if($youPass == $youPassC){
        //쿼리문 작성
        $sql = "UPDATE myTeam SET youPass = '{$youPass}' WHERE youEmail = '$youEmail'";
        $connect -> query($sql);
        echo "<script>alert('비밀번호가 변경되었습니다. 새 비밀번호로 로그인 해주세요!'); location.href='login.php'</script>";
    }
?>