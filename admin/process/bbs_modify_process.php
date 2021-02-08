<?php  
/* 관리자 게시판들 숨기기 기능 페이지 */
$no = $_POST['bbs_no'];
$bbs = $_POST['bbs'];

/* 게시판번호 안 넘어오면 오류 메세지 */ 
if(!$no){  
  echo "<a href='../admin_bbs.php'>오류가 발생하였습니다. </a>";
} else { 
require ('../../db/connect.php');

/* deflag=1이면 숨기기 기능으로 퀴리 실행 */
$sql = "UPDATE  $bbs set delflag = 1 where no = $no";
$result = mysqli_query($conn, $sql);

if ($result) {
  header ("Location: ../admin_bbs.php");
} else {
  echo "Error deleting record: " . $conn->error;
}


} 
?>