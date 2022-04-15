<?php
    include "../../connect/connect.php";

    $sql = "CREATE TABLE myTeam (";
    $sql .= "memberID int(10) unsigned auto_increment,";
    $sql .= "youName varchar(20) NOT NULL,";
    $sql .= "youEmail varchar(40) NOT NULL,";
    $sql .= "youNickName varchar(20) NOT NULL,";
    $sql .= "youPhone varchar(20) NOT NULL,";
    $sql .= "youPhoto varchar(255) DEFAULT 'default.svg',";
    $sql .= "youIntro longtext DEFAULT NULL,";
    $sql .= "youPass varchar(20) NOT NULL,";
    $sql .= "regTime int(20) NOT NULL,";
    $sql .= "PRIMARY KEY (memberID)";
    $sql .= ") charset=utf8;";

    $result = $connect -> query($sql);

    if($result){ 
        echo "create table true";
    } else {
        echo "create table false";
    }
?>