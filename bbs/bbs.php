<?php
include "../header.php";
include "./bbs_paging.php";
?>
<!-- bbs게시판 페이지 -->
  <!-- 게시판 목록 표시 -->
  <table class="table table-hover">
    <thead>
      <tr style = "text-align:center;">
        <td>번호</td>
        <td>닉네임</td>
        <td>제목</td>
        <td>날짜</td>
        <td>조회수<span class="badge">14</span></td>
      </tr>
    </thead>
  <?php 
        /* 페이징 파일에서 가져온 값으로 표시 */
        foreach($bbs_result as $v)
        {
          /* 댓글 개수 변수에 저장 */
          $c_comment = comment_count($v['no']);
          echo "<tr style='text-align:center;'>";
          echo "<td>{$v['no']}</td>";
          echo "<td>{$v['user_id']}</td>";
          /* 제목이 30자 이상일시 ...로 변환 후 표시 */
          $limited_title = $v["title"];
          if(strlen($limited_title)>30){
            $limited_title=str_replace($v["title"], mb_substr($v["title"],0,30,"utf-8")."...", $v["title"]);
          } else {}
          /* Get방식으로 게시판 번호를 참조해서 링크 */     
          echo "<td><a href='bbs_view.php?no={$v['no']}' style='color:black;'>{$limited_title} <span class='badge rounded-pill bg-secondary'>$c_comment</span></a></td>";
          /* 수정날짜가 있으면 수정 날짜로 표시, 없으면 생성날짜로 표시 */
          if(isset($v['moddate'])){
            echo "<td>".DateTime::createFromFormat("Y-m-d H:i:s", "{$v['moddate']}")->format("y/m/d")."</td>";
          } else { echo "<td>".DateTime::createFromFormat("Y-m-d H:i:s", "{$v['regdate']}")->format("y/m/d")."</td>"; }
          /* 조회수 표시 */
          echo "<td>{$v['view']}</td>";
          echo "</tr>";
      }

  ?>
  </table>
  <!-- 페이징네이션 표시 -->
  <div class="container">
      <div class="row">
        <div class='col-md-6 offset-md-2'>
          <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
              <?php
              if ( $page <= 1)
              { echo "<li class='page-item disabled'><a class='page-link' href='{$_SERVER['PHP_SELF']}?page=1' tabindex='-1' aria-label='Previous'> 
                <span aria-hidden='true'>&laquo;</span></a></li>";}
              /* 현재 페이지가 2이상 일때 */
              else {  echo "<li><a class='page-link href='{$_SERVER['PHP_SELF']}?page=1' aria-label='Previous'> 
                            <span aria-hidden='true'>&laquo;</span></a></li>";}
              /*전체페이지수 계산해서 표시 */
              for ($i = $block_start; $i <= $block_end; $i++)
              { 
              echo "<li class='page-item'><a class='page-link' href='{$_SERVER['PHP_SELF']}?page=$i'> $i </a></li>";
              }
              /* 현재 페이지가 전체페이지 이상일때 */
              if ( $page >= $total_page)
              {
                echo"<li class='page-item disabled'><a class='page-link href='{$_SERVER['PHP_SELF']}?page=$total_page'aria-label='Next'>
                          <span aria-hidden='true'>&raquo;</span></a></li>";
              }
              else { echo"<li><a class='page-link href='{$_SERVER['PHP_SELF']}?page=$total_page'aria-label='Next'>
                          <span aria-hidden='true'>&raquo;</span></a></li>"; }
              ?>
            </ul>
          </nav>
        </div>
        <!-- 로그인 되어있을때 글쓰기 버튼 표시 -->
        <?php
          if(isset($_SESSION['user_id'])){
            echo "<div class='col-md-1 offset-md-3'><a class='bbtn btn-primary btn-sm' href='./bbs_write.php'>글 쓰기</a></div>";
          }
        ?>
    </div>
  </div>
   <!-- 검색 기능 표시--> 
  <div class="container">
      <!-- 검색할 내용 get방식으로 값 전달 -->
      <form class="row g-3" method="get" action="./bbs_search.php">
        <!-- 어떤기준으로 검색할지 선택 -->
        <div class="col-auto">
          <select class="form-select" name="search_value">
          <option value = "title">제목</option>
          <option value = "user_id">작성자</option>
          <option value = "content">내용</option>
          </select>
        </div>
        <!-- 검색할 내용 입력창 -->
        <div class="col-auto">
          <input type="text" class="form-control"  name="seach">
        </div>
        <div class="col-auto">
          <button class='btn btn-primary' type="submit">검색</button>
        </div>
      </form>
  </div>
</div>
