<?php
include "../header.php";
/* 답변보기 페이지 */
/* 아이디로 문의글 답변된 것과 미 답변 문의글 다 조회 */
$query = "select * from message where rq_id = '$user_id'";
$result = mysqli_query($conn, $query); 
?>
 <div class="container mt-9">
    <div class="row">
      <!-- 모든 문의글 표시 -->
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
                /* 미답변된 글 표시 */
                if($v["deflag"] == 0)
                  {
                    echo "<tr style='text-align:center;'>";
                    echo "<td>{$v['rq_id']}</td>";            
                    $limited_title = $v["title"];
                    if(strlen($limited_title)>30){
                      $limited_title=str_replace($v["title"], mb_substr($v["title"],0,30,"utf-8")."...", $v["title"]);
                    } else {}
                      echo "<td><a href='./client_rq_incomplete.php?no={$v['no']}' style='color:black;'>{$limited_title}</a></td>";
                      echo "<td>".DateTime::createFromFormat("Y-m-d H:i:s", "{$v['regidate']}")->format("y/m/d")."</td>";             
                  }
                else
                {
                  /* 답변된 글 표시 */
                  echo "<tr style='text-align:center;'>";
                  echo "<td>{$v['rq_id']}</td>";            
                  $limited_title = $v["title"];
                  if(strlen($limited_title)>30){
                    $limited_title=str_replace($v["title"], mb_substr($v["title"],0,30,"utf-8")."...", $v["title"]);
                  } else {}
                    echo "<td><a href='./client_view.php?no={$v['no']}' style='color:black;'>{$limited_title}<span class='badge bg-dark'>답변완료</span></a></td>";
                    echo "<td>".DateTime::createFromFormat("Y-m-d H:i:s", "{$v['regidate']}")->format("y/m/d")."</td>";             
                }
             }
            ?>
              </tr>
            </tbody>
        </table>
      </div>
      <!-- 왼쪽 네비게이션 표시 -->
      <div class="col offset-md-2">
        <div class="list-group " style="position: fixed;" >
          <a href = "./client.php" class="list-group-item list-group-item-action">회원정보 변경</a>
          <a href = "./client_pw.php" class="list-group-item list-group-item-action ">비밀번호 변경</a>
          <a href = "./client_rq.php" class="list-group-item list-group-item-action">문의하기</a>
          <a href = "#" class="list-group-item list-group-item-actionv active">답변보기</a>
        </div>
      </div>
    </div>
 </div>
</div>