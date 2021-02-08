<?php
require "../../db/connect.php";
/* client_rq.php폼에서 보낸 값 가져오기 */
$user_id = $_POST['user_id'];
$title = nl2br(htmlspecialchars($_POST['title'], ENT_QUOTES, 'UTF-8'));
$content =nl2br(htmlspecialchars($_POST['content'], ENT_QUOTES, 'UTF-8'));

/* 받은값들 table에 값 넣기 */
$query = "INSERT  INTO message (rq_id, as_id, title, content, regidate) VALUES ('$user_id','admin','$title','$content', current_timestamp())";
$result = mysqli_query($conn, $query);
/* 쿼리성공햇으면 돌아가고 아니면 에러 표시 */
if($result)
{
    header("Location: ../client_rq.php");
}
else
{
    echo "Error deleting record: " . $conn->error;
}


?>