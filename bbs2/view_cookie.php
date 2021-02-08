<?php
/* 조회수 관련 쿠키값 생성페이지 */
require_once '../db/connect.php';
/* 쿠키값 없으면 쿠키값 게시판번호와 게시판글 합쳐서 생성 */
if(!isset($_COOKIE['viewbbs2'.$bbs_no]))
{
    /* 쿠키값 있으면 게시판 조회수 1증가 */
    $query = "UPDATE bbs2 SET view=view + 1 where no = $bbs_no";
    $result =  mysqli_query($conn, $query);
    /* 조회수 증가 후 루트경로에 만료시간 1일 쿠키 값 생성 */
    if($result)
    {
       setcookie('viewbbs2'.$bbs_no, 'bbs2', time() + (60 * 60 * 24), './'); 
    }
    else
    {
        echo "db connect error";    
    }
}


?>