<?php
/* 댓글 수정 페이지 */
require_once "../../db/connect.php";
/* 게시판 번호와 댓글 번호 가져오기 */
$bbs_no = $_GET['no'];
$comment_no = $_GET['comment_no'];
$query = "SELECT * FROM bbs_comment where no = $comment_no";
$result = mysqli_query($conn, $query);
$check = mysqli_fetch_array($result);
?>
<!-- db에서 불러온값 표시 -->
<form method="POST" action="./comment_process.php?comment_no=<?=$comment_no?>">
<div class="input-group">
      <?php if(isset($user_id)){echo "<input type='hidden' name='user_id' value= '$user_id' >";}
            else{echo "<input type='hidden' name='user_id' value=' 익명' >";} ?>
      <input type="hidden" name="bbs_no" value="<?=$bbs_no?>">
      <input type="text" class="form-control" name="content" placeholder="댓글을 입력해주세요." value= "<?php echo "{$check['content']}"?>">
      <span class="input-group-btn">
      <button class="btn btn-default" type="submit">수정</button>
      </span>
</div>
</form>
<a href="../bbs_view.php?no=<?=$bbs_no?>">돌아가기</a>
