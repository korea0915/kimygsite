<?php
/* 회원이 문의 한 글 답변하는 페이지 */
include "../header.php";
/* 회원이 문의한 글 중 답변 안한 것 조회 하는 쿼리 실행 (as_id는 항상 관리자)*/
$query = "select * from message where as_id = '$user_id' and deflag = 0";
$result = mysqli_query($conn, $query); 
?>
  <!-- 문의글 보기 -->
 <div class="container mt-9">
    <div class="row">
      <div class="col-md-6 offset-md-1">
        <table class="table table-hover">
            <thead>
              <tr style = "text-align:center;">
              <td class="col-md-2 order-md-1">발신자</td>
              <td class="col-md-6 order-md-1">제목</td>
              <td class="col-md-2 order-md-1">날짜</td>
              </tr>
            </thead>
            <tbody>
            <?php 
              foreach($result as $v)
                { 
                      echo "<tr style='text-align:center;'>";
                      echo "<td>{$v['rq_id']}</td>";            
                      $limited_title = $v["title"];
                      if(strlen($limited_title)>30){
                        $limited_title=str_replace($v["title"], mb_substr($v["title"],0,30,"utf-8")."...", $v["title"]);
                      } else {}
                        echo "<td><a href='./admin_view.php?no={$v['no']}' style='color:black;'>{$limited_title}</a></td>";
                        echo "<td>".DateTime::createFromFormat("Y-m-d H:i:s", "{$v['regidate']}")->format("y/m/d")."</td>";             
               }
            ?>
              </tr>
            </tbody>
        </table>
      </div>
      <!-- 왼쪽 네비게이션 -->
      <div class="col offset-md-2">
        <div class="list-group " style="position: fixed;" >
          <a href = "./admin.php" class="list-group-item list-group-item-action">회원 관리</a>
          <a href = "./admin_bbs.php" class="list-group-item list-group-item-action">게시판 관리</a>
          <a href = "./admin_as.php" class="list-group-item list-group-item-action active">문의보기</a>
          <a href = "./admin_pw.php" class="list-group-item list-group-item-action">비밀번호 변경</a>
        </div>
      </div>
    </div>
 </div>
</div>