<nav class="navbar fixed-top navbar-light bg-light">
    <div class="container-fluid">
        <!-- 메인페이지로 가기 -->    
        <a class="navbar-brand" href='<?php echo ROOT; ?>/index.php'>Home</a>
        <ul class="nav nav-tabs">   
            <?php
            /* 로그인기능 */
            /* 세션스타트 */
            session_start();
            /* 로그인 확인 */    
            if(isset($_SESSION['user_id']))
                {
                    $user_id=$_SESSION['user_id'];
                    $id=$_SESSION['id'];
                }
                /* 관리자 혹은 일반 회원 구분 */
                if(isset($user_id))
                { if ($user_id == "admin")
                    {?>
                <!-- 관리자이며 관리자 페이지로 연결 -->
                <a class="nav-link active" href="<?php echo ROOT; ?>/admin/admin.php"><?php echo "관리자" ?></a>
                <li class="nav-item"><a class="nav-link active" href="<?php echo ROOT; ?>/login/logout.php"> 로그아웃 </a></li>
            <?php
                    }else{
            ?>  
                <!-- 일반회원이면 회원정보페이지로 연결 -->
                <a class="nav-link active" href="<?php echo ROOT; ?>/client/client.php"><?php echo $user_id; ?></a>
                <li class="nav-item"><a class="nav-link active" href="<?php echo ROOT; ?>/login/logout.php"> 로그아웃 </a></li>
            <?php
                  }
                }else{
            ?>    
                <!-- 로그인이 안되있으면 로그인 페이지 표시 -->
                <li class="nav-item"><a class="nav-link active" href='<?php echo ROOT; ?>/login/login.php'>로그인</a></li>
                <li class="nav-item"><a class="nav-link active" href='<?php echo ROOT; ?>/register/register.php'>회원가입</a></li>
            <?php } ?>
                <!-- 게시판 -->
                <li class="nav-item"><a class="nav-link active" href="<?php echo ROOT; ?>/bbs/bbs.php">게시판</a></li>
                <li class="nav-item"><a class="nav-link active" href="<?php echo ROOT; ?>/bbs2/bbs2.php">게시판2</a></li>
        </ul>
    </div>
</nav>