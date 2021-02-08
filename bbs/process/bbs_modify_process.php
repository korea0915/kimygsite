<?php   
/* 게시판 수정 페이지 */
/* get과 post 형식으로 넘어온 값들 가져오기 */
$no = $_GET['no'];
$title= nl2br(htmlspecialchars($_POST['title'], ENT_QUOTES, 'UTF-8'));
$category=$_POST['category'];
$link=htmlspecialchars($_POST['link'], ENT_QUOTES, 'UTF-8');
$content= nl2br(htmlspecialchars($_POST['content'], ENT_QUOTES, 'UTF-8'));

/* 제목 혹은 내용 비어있는지 확인 후 문제 없으면 쿼리 실행 */
if(!$title||!$content){  
  echo "<a href='../bbs.php'>제목이나 내용을 입력해 주세요. </a>";
} else { 
require ('../../db/connect.php');
$sql = "UPDATE  bbs set title = '$title', category = '$category', link = '$link', content = '$content', moddate = current_timestamp() where no = $no";
$result = mysqli_query($conn, $sql);

if ($result) {
  header ("Location: ../bbs_view.php?no=$no");
} else {
  echo "Error deleting record: " . $conn->error;
}


}
?>