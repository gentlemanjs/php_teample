<?php
    include "../connect/connect.php";
    include "../connect/session.php";
    include "../connect/sessionCheck.php";
    $blogID = $_GET['blogID'];
    $sql = "UPDATE myBlog SET blogDelete = 0 WHERE blogID = {$blogID}";
    
    $connect -> query($sql);
    
    echo "<script>alert('삭제 완료.'); location.href='blog.php';</script>";
?>