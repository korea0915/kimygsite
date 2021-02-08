<?php include "../header.php";?>
<!-- 로그인 페이지 -->
  <div class= "row" style="margin-top: 150px;">
  <div class="col-md-9 offset-md-1">
      <div class="col-md-3 offset-md-11">      
        <!-- 메인페이로 돌아가기 -->
        <a class="badge bg-primary text-wrap" href="../index.php">돌아가기</a>
      </div>
      <!-- post방식으로 데이터 보냄 -->
      <form name="login" method="post" action="./login_process.php">
        <div class="mb-3">
          <label for="login_id" class="form-label">로그인 아이디</label>
          <input type="text" class="form-control" name="login_id"id="login_id" aria-describedby="emailHelp">
          <div class="form-text">로그인 아이디를 입력 해주세요.</div>
        </div>
        <div class="mb-3">
          <label for="login_pw" class="form-label">비밀번호</label>
          <input type="password" class="form-control" name="login_pw" id="login_pw">
          <div class="form-text">비밀번호를 입력 해 주세요.</div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </div>
</div>