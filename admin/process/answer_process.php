<?php
/* 관리자 답변 처리 페이지 */
include "../../db/connect.php";
/* admin_view.php에서 post값으로 받아오 값 가져오기 */
$rq_id = $_POST['rq_id'];
$as_id = $_POST['as_id'];
$title = htmlspecialchars($_POST['title'], ENT_QUOTES, 'UTF-8');
$content = htmlspecialchars($_POST['content'], ENT_QUOTES, 'UTF-8');
$message_no = $_POST['message_no'];

/* 값 답변메세지 테이블에 넣기 */
$query = "INSERT INTO answer_message (`no`, `rq_id`, `as_id`, `title`, `content`, `regidate`, `m_id`) VALUES 
(NULL, '$rq_id', '$as_id', '$title', '$content', current_timestamp(), '$message_no')";
$result = mysqli_query($conn, $query);

/* 답변 완료한 메세지(deflag=1) 수정후 답변완료 */ 
$query2 = "UPDATE message SET deflag = '1' where no = $message_no ";
$result2 = mysqli_query($conn, $query2);
/* 테이블 넣기와 답변완료 수정 쿼리 성공확인 */
if($result && $result2)
{
    header("Location: ../admin_rq.php");
}
else
{
    echo "Error deleting record: " . $conn->error;
}
?>