<?php
/* 댓글 삭제 페이지*/
/* 게시판 번호, 댓글 번호 가져오기 */
$comment_no = $_GET['comment_no'];
$no = $_GET['no'];

require '../../db/connect.php';
/* db에서 댓글 값 삭제 후 돌아가기 혹은 오류 표시 */
$query = "DELETE from bbs_comment where no = $comment_no";
$result = mysqli_query($conn, $query);
if($result)
    {
        header ("Location: ../bbs_view.php?no=$no");
    }
else
    {
        echo "Error deleting record: " . $conn->error;
    }
?>