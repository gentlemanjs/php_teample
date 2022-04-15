<?php
    include "../../connect/connect.php";
    $sql = "CREATE TABLE boardQComment (";
    $sql .= "commentID int(10) unsigned auto_increment,";
    $sql .= "reCommentID int(10) unsigned DEFAULT NULL,";
    $sql .= "boardID int(10) unsigned NOT NULL,";
    $sql .= "youNickName varchar(20) NOT NULL,";
    $sql .= "commentContents longtext NOT NULL,";
    $sql .= "parent varchar(20) DEFAULT 'NO',";
    $sql .= "layer int(5) DEFAULT 1,";
    $sql .= "regTime int(20) NOT NULL,";
    $sql .= "PRIMARY KEY (commentID)";
    $sql .= ") charset=utf8;";
    $result = $connect -> query($sql);
    if($result){
        echo "create table true";
    } else {
        echo "create table false";
    }
    include "../../connect/connect.php";
    $sql = "CREATE TABLE boardQReComment (";
    $sql .= "reCommentID int(10) unsigned auto_increment,";
    $sql .= "commentID int(10) unsigned NOT NULL,";
    $sql .= "boardID int(10) unsigned NOT NULL,";
    $sql .= "youNickName varchar(20) NOT NULL,";
    $sql .= "commentContents longtext NOT NULL,";
    $sql .= "regTime int(20) NOT NULL,";
    $sql .= "PRIMARY KEY (reCommentID)";
    $sql .= ") charset=utf8;";
    $result = $connect -> query($sql);
    if($result){
        echo "create table true";
    } else {
        echo "create table false";
    }
?>