<!-- 댓글 기능 페이지 -->
<!-- Post 형식으로 값 전달 -->
<form method="POST" action="./process/comment_process.php">
<div class="input-group">
      <?php 
            /* 로그인시 아이디로 값 저장 */
            if(isset($user_id)){echo "<input type='hidden' name='user_id' value= '$user_id' >";}
            /* 비로그인시 익명으로 값 저장 */
            else{echo "<input type='hidden' name='user_id' value=' 익명' >";} 
      ?>
      <input type="hidden" name="bbs_no" value="<?=$bbs_no?>">
      <input type="text" class="form-control" name="content" placeholder="댓글을 입력해주세요.">
      <span class="input-group-btn">
      <button class="btn btn-default" type="submit">등록</button>
      </span>
</div>
</form>

