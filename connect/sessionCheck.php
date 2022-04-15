<?php
    if(!isset($_SESSION['memberID'])){
        HEADER("Location: ../login/login.php");
    }
?>