<?php
        // $sql = "SELECT count(boardID) FROM teamBoardQ";
        // $result = $connect -> query($sql);
        // $boardCount = $result -> fetch_array(MYSQLI_ASSOC);
        // $boardCount = $boardCount['count(boardID)'];
        // echo "<pre>";
        // var_dump($boardCount);
        // echo "</pre>";
        // echo $boardCount;
        // 페이지 넘버 갯수
        // 300/10 = 30
        // 301/10 = 31
        // 306/10 = 31
        // 309/10 = 31
        // 총 페이지 수
        $boardCount = ceil($count/$pageView);
        // 현재 페이지를 기준으로 보여주고 싶은 갯수
        $pageCurrent = 5;
        $startPage = $page - $pageCurrent;
        $endPage = $page + $pageCurrent;
        // 처음 페이지 초기화
        if($startPage < 1) $startPage = 1;
        // 마지막 페이지 초기화
        if($endPage >= $boardCount) $endPage = $boardCount;
        // 이전 페이지
        if($page != 1){ 
            $prevPage = $page -1;
            echo "<li><a href='{$address}.php?page={$prevPage}{$GET1}{$GET2}'>이전</a></li>";
        }
        // 처음으로 페이지
        if($page != 1){
            echo "<li><a href='{$address}.php?page=1{$GET1}{$GET2}'>처음으로</a></li>";
        }
        // 페이지 넘버 표시
        for($i=$startPage; $i<=$endPage; $i++){
            $active = "";
            if($i == $page){
                $active = "active";
            }
            echo "<li class='{$active}'><a href='{$address}.php?page={$i}{$GET1}{$GET2}'>{$i}</a></li>";
        }
        //다음 페이지
        if($page != $boardCount && $boardCount != 0){
            $nextPage = $page +1;
            echo "<li><a href='{$address}.php?page={$nextPage}{$GET1}{$GET2}'>다음</a></li>";
        }
        // 마지막 페이지
        if($page != $boardCount && $boardCount != 0){
            echo "<li><a href='{$address}.php?page={$boardCount}{$GET1}{$GET2}'>마지막으로</a></li>";
        }
    
?>