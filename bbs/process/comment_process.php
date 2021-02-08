<?php
/* 댓글 저장 페이지 */
$user_id = $_POST['user_id'];
$bbs_no = $_POST['bbs_no'];
$content = nl2br(htmlspecialchars($_POST['content'], ENT_QUOTES, 'UTF-8'));
$comment_no = $_GET['comment_no'];

require "../../db/connect.php";

/* 댓글 번호 값이 안넘어 왔는지 if문으로 확인 */
if(!isset($comment_no))
{       /* 댓글을 안썻거나 게시판 번호가 안넘어 오면 표시 */
        if(!$content||!$bbs_no)
    {
        echo "댓글을 등록에 실패하였습니다</br>";
        echo "<a href='../bbs.php'> 돌아가기 </a>";
    }
    /* 댓글 값이 있고 게시판 번호가 넘어오면 db에 값들 저장 */
    else
    {
         $query = "INSERT INTO `bbs_comment` (`no`, `bbs_no`, `user_id`, `content`, `date`) VALUES
        (NULL, '$bbs_no', '$user_id', '$content', current_timestamp())";
        $result = mysqli_query($conn, $query);
        if($result)
        {
            header ("Location: ../bbs_view.php?no=$bbs_no");
        }
        else 
        {
            echo "Error deleting record: " . $conn->error;
        } 
    }
}
/* 뭐지?? 댓글에 댓글기능에 필요? */
else
{
    if(!$content||!$comment_no)
    {
        echo "댓글 수정에 실패하였습니다</br>";
        echo "<a href='../bbs.php'> 돌아가기 </a>";
    }
    else
    {
        $query = "UPDATE bbs_comment SET content = '$content', mod_date = current_timestamp() where no = $comment_no ";
        $result = mysqli_query($conn, $query);
        if($result)
        {
            header ("Location: ../bbs_view.php?no=$bbs_no");
        }
        else 
        {
            echo "Error deleting record: " . $conn->error;
        } 
    }
}

?>

