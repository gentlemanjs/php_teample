<?php
    $host = "localhost";
    $user = "gentlemanjs";
    $pass = "tnvkffk1!!";
    $db = "gentlemanjs";
    $connect = new mysqli($host, $user, $pass, $db);
    $connect -> set_charset("utf8");

    if(mysqli_connect_errno()){
        echo "DATABASE Connect False";
    } else {
        // echo "DATABASE Connect True";
    }
?> 