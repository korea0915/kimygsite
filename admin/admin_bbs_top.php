<?php
/* 관리자 게시판 관리 페이지 헤더 부분 */
include "../header.php";

/* 관리자 게시판 관련 function 기능 페이지 불러오기 */
include "./process/bbs_function.php";

/* get방식 가져온 값을 게시판 이름으로 변수에 저장 */ 
$bbs_name = $_GET['bbs'];

/* 총 게시판을 보기위해 bbs2값이 있으면 가져옴 */
if(isset($_GET['bbs2']))
{
  $bbs2_name = $_GET['bbs2'];
}

/* 이름값 받아서 게시판 값 배열로 저장 */
$view = bbs_view($bbs_name);
$view2 = bbs_view($bbs2_name);

/* 게시판과 게시판2 변수로 저장 */
$bbs = "bbs";
$bbs2 = "bbs2";

/* 게시판 총 게시물 수 */
$bbs_total = bbs_count($bbs);

/* 게시판2 총 게시물 수 */
$bbs2_total = bbs_count($bbs2); 
?>