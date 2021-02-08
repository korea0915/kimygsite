<?php
/* 게시판 삭제 페이지 */
/* 게시판 번호 값 가져오기 */
$no = $_GET['no'];
include "../../db/connect.php";
/* 게시판 번호로 table조회 후 삭제 쿼리 실행 */
$sql = "DELETE from bbs where no = $no";
$result = mysqli_query($conn, $sql);

if ($result) {
    header ("Location: ../bbs2.php");
  } else {
    echo "Error deleting record: " . $conn->error;
  }

?>