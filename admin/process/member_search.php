<?php
/* 회원 정보 검색 처리 페이지 */  
    /* 회원 아이디값 get방식으로 가져오기 */
    $search = $_GET['search'];
    require "../../db/connect.php";
  
    /* 가져온 값으로 멤버 테이블에서 이름 값 조회 */
    $query = "SELECT * from member where id_name like '%$search%' ";
    $result = mysqli_query($conn, $query);
    $check = mysqli_fetch_array($result);
    echo $check['id'];
    /* 쿼리 성공시 가져온 값 다시 get방식으로 admin.php페이지로 전달 */
    if($result)
    {
        header("Location: ../admin.php?search_id={$check['id']}");
    }             
    else
    {
        echo "검색된 결과가 없습니다";
        echo "<a href='../admin.php'>돌아가기</a>";
    }
?>