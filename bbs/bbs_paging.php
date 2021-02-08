<?php
/* 페이징네이션 기능 페이지 */
if(isset($_GET['page']))
 {$page = $_GET["page"];}
else
 {$page = 1;}

$query = "select * from bbs where delflag = '0'";
$result = mysqli_query($conn, $query);
$page_cnt= mysqli_num_rows($result);

$list = 10;
 $block_cnt = 10;
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

 $bbs_query = "select * from bbs where delflag = '0' ORDER BY no desc limit $page_start, $list";
 /* 계산한 값들 변수에 저장 후 bbs페이지로 전달 */ 
 $bbs_result = mysqli_query($conn, $bbs_query);

/* 댓글 갯수 표시 위한 function */
 function comment_count($no){
    global $conn;
    if ($no !== 0)
    {
    $query = "SELECT * FROM `bbs_comment` where `bbs_no` = $no";
    $result = mysqli_query($conn, $query);
    $count = mysqli_num_rows($result);
    }
    else
    {
    $count = 0;
    }
    return $count;
  }


?> 