<?php
/* 검색기능 페이지 */
include "../header.php";
/* 검색 폼에서 get방식으로 전달한 값 가져오기 */
$search_value = $_GET['search_value'];
$search = $_GET['seach'];
require ('../db/connect.php');  
    
    /* 값이 없으면 현재페이지는 1, 혹은 page는 현재 페이지값(페이징네이션위해) */
    if(isset($_GET['page']))
    {$page = $_GET["page"];}
   else
    {$page = 1;}
   
    /* 가져온 값으로 테이블에서 연관 된 값 검색 */
    $query = "SELECT * from bbs where $search_value like '%$search%' order by no desc";
    $result = mysqli_query($conn, $query);
    /* 조회 된 총 값의 수 */
    $page_cnt= mysqli_num_rows($result);
   
    /* 한 페이지에 보여질 페이지의 수 */
    $list = 5;
    /* 한 페이지에 보여 빌 블록의 수 */
    $block_cnt = 5;
    /* 페이징네이션을 위환 블록 값 계산 */
    $block_num = ceil($page/$block_cnt);
    $block_start = (($block_num - 1) * $block_cnt) + 1;
    $block_end = $block_start + $block_cnt -1; 
   
    $total_page = ceil($page_cnt/$list);
    if($total_page < $block_end)
    {
        $block_end = $total_page;
    }
    $total_block = ceil($total_page/$block_cnt);
    $page_start = ($page - 1) * $list;
   
    $bbs_query = "SELECT * from bbs where $search_value like '%$search%' order by no desc limit $page_start, $list";
    $bbs_result = mysqli_query($conn, $bbs_query);
     
    /* 조회하고 나온 값들 테이블로 표시 */
    if($result)
    { ?>
    <table class="table table-hover">
        <thead>
        <tr style = "text-align:center;">
        <td>번호</td>
        <td>닉네임</td>
        <td>제목</td>
        <td>날짜</td>
        <td>조회수</td>
        </tr>
        </thead>
        <?php 
              foreach($result as $v){
              echo "<tr style='text-align:center;'>";
              echo "<td>{$v['no']}</td>";
              echo "<td>{$v['user_id']}</td>";
      
              $limited_title = $v["title"];
              if(strlen($limited_title)>30){
                $limited_title=str_replace($v["title"], mb_substr($v["title"],0,30,"utf-8")."...", $v["title"]);
              } else {}
              echo "<td><a href='bbs_view.php?no={$v['no']}' style='color:black;'>{$limited_title}</a></td>";
              if(isset($v['moddate'])){
                echo "<td>".DateTime::createFromFormat("Y-m-d H:i:s", "{$v['moddate']}")->format("y/m/d")."</td>";
              } else { echo "<td>".DateTime::createFromFormat("Y-m-d H:i:s", "{$v['regdate']}")->format("y/m/d")."</td>"; }
      
              echo "<td>{$v['view']}</td>";
              echo "</tr>";}      
        ?>
        </table>
    <!-- 페이징네이션 -->
    <nav align="center">
      <ul class="pagination">
      <?php

      if ( $page <= 1){ }
      else {  echo "<li><a href='$PHP_SELP?search_value=$search_value?search=$search?page=1' aria-label='Previous'> 
                    <span aria-hidden='true'>&laquo;</span></a></li>";}

      for ($i = $block_start; $i <= $block_end; $i++)
      { 
      echo "<li><a href='$PHP_SELP?page=$i'> $i </a></li>";
      }

      if ( $page >= $total_page){}
      else { echo"<li><a href='$PHP_SELP?search_value=$search_value?search=$search?page=$total_page'aria-label='Next'>
                  <span aria-hidden='true'>&raquo;</span></a></li>"; }

      ?>
      </ul>
    </nav>               
<?php }
    /* 검색 된 값이 없으면 표시 */
    else
    {
        echo "검색된 결과가 없습니다";
        echo "<a href='./bbs.php'>돌아가기</a>";
    }
?>