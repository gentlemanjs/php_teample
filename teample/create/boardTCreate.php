<?php
    include "../../connect/connect.php";
    
    $sql = "CREATE TABLE teamBoardT (";
    $sql .= "boardID int(10) unsigned auto_increment,";
    $sql .= "memberID int(10) unsigned NOT NULL,";
    $sql .= "boardTitle varchar(50) NOT NULL,";
    $sql .= "boardContents longtext NOT NULL,";
    $sql .= "youNickName varchar(20) NOT NULL,";
    $sql .= "regTime int(20) NOT NULL,";
    $sql .= "PRIMARY KEY (boardID)";
    $sql .= ") charset=utf8;";
    $result = $connect -> query($sql);
    if($result){
        echo "create table true";
    } else {
        echo "create table false";
    }
    $sql = "CREATE TABLE teamBoardTAnswer (";
    $sql .= "answerID int(10) unsigned auto_increment,";
    $sql .= "boardID int(10) NOT NULL,";
    $sql .= "memberID int(10) unsigned NOT NULL,";
    $sql .= "answerContents longtext NOT NULL,";
    $sql .= "youNickName varchar(20) NOT NULL,";
    $sql .= "regTime int(20) NOT NULL,";
    $sql .= "PRIMARY KEY (answerID)";
    $sql .= ") charset=utf8;";
    $result = $connect -> query($sql);
    if($result){
        echo "create table true";
    } else {
        echo "create table false";
    }

?>