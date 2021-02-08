<?php
/* 게시판 관리 페이지 */ 
/* Get방식으로 보낸 bbs이름 데이터값들 정리한 페이지를 불러오기 */
include "./admin_bbs_top.php";

?>
 <div class="container mt-9">
    <div class="row">
      <div class="col-md-6 offset-md-1">
        <div class="row">
          <div class="col-sm-4">
            <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
              <div class="card-header">총 게시판 수</div>
              <div class="card-body">
                <h5 class="card-title text-center"><?php echo $bbs_total+$bbs2_total."개";?></h5>
                <form class="text-center" method="GET" action="./admin_bbs.php">
                <input type="hidden" name="bbs" value="bbs">
                <input type="hidden" name="bbs2" value="bbs2">
                <button class="btn btn-light" type="submit">보기</button>
                </form>
              </div>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
              <div class="card-header">총 BBS 수</div>
              <div class="card-body">
                <h5 class="card-title text-center"><?php echo $bbs_total."개";?></h5>
                <form class="text-center" method="GET" action="./admin_bbs.php">
                <input type="hidden" name="bbs" value="bbs">
                <button class="btn btn-light" type="submit">보기</button>
                </form>
              </div>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
              <div class="card-header">총 BBS2 수</div>
              <div class="card-body">
                <h5 class="card-title text-center"><?php echo $bbs2_total."개";?></h5>
                <form class="text-center" method="GET" action="./admin_bbs.php">
                <input type="hidden" name="bbs" value="bbs2">
                <button class="btn btn-light" type="submit">보기</button>
                </form>
              </div>
            </div>
          </div>
        </div>
        <div class="col mb-2">
        <!-- 게시판 값 받아서 표시 -->
        <?php
        /* 총게시판 눌렀을때와 게시판 한개 눌렀을때 다르게 표시 */ 
        if($bbs2_name)
        {
          bbs_result($view, $bbs_name);
          bbs_result($view2, $bbs2_name);
        }
        else
        {
          bbs_result($view, $bbs_name);
        }
        ?>
        </div>
      </div>
      <!-- 왼쪽 네비게이션 -->
      <div class="col offset-md-2">
        <div class="list-group " style="position: fixed;" >
          <a href = "./admin.php" class="list-group-item list-group-item-action">회원 관리</a>
          <a href = "#" class="list-group-item list-group-item-action active">게시판 관리</a>
          <a href = "./admin_as.php" class="list-group-item list-group-item-action">문의보기</a>
          <a href = "./admin_pw.php" class="list-group-item list-group-item-action">비밀번호 변경</a>
        </div>
      </div>
    </div>
 </div>
</div>