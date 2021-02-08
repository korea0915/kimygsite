<?php
/* 관리자 답변 처리 페이지 */
require "../../db/connect.php";
/* post로 넘어온 값 가져오기 */
$user_id = $_POST['user_id'];
$title = htmlspecialchars($_POST['title'], ENT_QUOTES, 'UTF-8');
$content = htmlspecialchars($_POST['content'], ENT_QUOTES, 'UTF-8');

/* 넘어온 값들 답변 테이블에 저장 */
$query = "INSERT  INTO message (rq_id, title, content, regidate) VALUES ('$user_id','$title','$content', current_timestamp())";
$result = mysqli_query($conn, $query);
if($result)
{
    header("Location: ../admin_rq.php");
}
else
{
    echo "Error deleting record: " . $conn->error;
}


?>