<div class="hWrap">
    <header id="header">
        <h2 class="hTitle"><a href="../page/main.php">방역 투게더<a></h2>
        <div class="hSide">
            <div class="hBtn">
            
            </div>
            <ul class="hMenu">
            <?php if(isset($_SESSION['memberID'])){ ?>
                <li><a href="../community/board.php">커뮤니티</a></li>
                <li><a href="../mypage/mypage.php">마이페이지</a></li>
                <li><a href="../login/logout.php">로그아웃</a></li>
            <?php } else { ?>
                <li><a href="../community/board.php">커뮤니티</a></li>
                <li><a href="../login/login.php">로그인</a></li>
                <li><a href="../login/join.php">회원가입</a></li>
            </ul>
            <?php } ?>
        </div>
    </header>
</div>