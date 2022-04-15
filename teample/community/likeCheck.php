<?php

include "../../connect/connect.php"; // $mysqli 변수 포함
include "../../connect/session.php"; // $mysqli 변수 포함
// include "../../connect/sessionCheck.php";

$memberID = $_POST['memberID']; //
$article_id = $_POST['articleId']; // boardID
$service_code = $_GET['getLikedByCode'];
$regTime = time();

if(!empty($article_id)) {
    $sql1 = "SELECT * FROM heart WHERE boardID = '$article_id' AND memberID = '$memberID'";
    $res1 = mysqli_num_rows($connect->query($sql1)); // sql 의 행 갯수를 가져옴
    if($res1 == 0) {
        // 좋아요 기록이 없는 경우 -> 좋아요 등록
        $sql2 = "INSERT INTO heart(memberID, boardID, regTime) VALUES('$memberID', '$article_id', '$regTime')";
        $res2 = $connect->query($sql2);
        // 게시판 테이블 업데이트
        $sql3 = "UPDATE teamBoardN SET boardLike = boardLike + 1 WHERE boardID = '$article_id'";
        $res3 = $connect->query($sql3);

        $jsonResult = "like";
        echo json_encode(array("data" => $jsonResult));
    } else {
        // 이미 좋아요를 누른 경우 -> 좋아요 취소
        $sql2 = "DELETE FROM heart WHERE boardID = '$article_id' AND memberID = '$memberID'";
        $res2 = $connect->query($sql2);
        // 게시판 테이블 업데이트
        $sql3 = "UPDATE teamBoardN SET boardLike = boardLike - 1 WHERE boardID = '$article_id'";
        $res3 = $connect->query($sql3);
        

        $jsonResult = "unlike";
        echo json_encode(array("data" => $jsonResult));
    }
}
?>