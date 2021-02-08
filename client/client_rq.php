<?php
include "../header.php";
?>
<!-- 문의하기 페이지 -->
 <div class="container mt-9">
    <div class="row">
      <div class="col-md-6 offset-md-1">
        <h4 class="mb-3">문의하기</h4>
        <!-- post방식으로 문의 데이터 전송 -->
        <form class="needs-validation" method="post" action="./process/request_process.php">
          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="title">제목</label>
              <input type="hidden" name="user_id" value="<?=$user_id?>">
              <input type="text" class="form-control" id="title" placeholder="제목을 입력해주세요" name="title" value="">
              <small class="text-muted">제목을 입력해주세요.</small>
            </div>
          </div>
          <hr class="mb-4">
            <label for="request">문의사항</label>
            <div class="form-floating">
              <textarea class="form-control" placeholder="문의사항을 입력해주세요." id="content" name="content" value="content"></textarea>
              <small class="text-muted">문의사항을 입력해주세요.</small>
            </div>
          <hr class="mb-4">
          <button class="btn btn-primary btn-lg btn-block" type="submit">문의하기</button>
        </form>
      </div>
      <!-- 왼쪽 네비게이션 -->
      <div class="col offset-md-2">
        <div class="list-group" style="position: fixed;">
          <a href = "./client.php" class="list-group-item list-group-item-action">회원정보 변경</a>
          <a href = "./client_pw.php" class="list-group-item list-group-item-action">비밀번호 변경</a>
          <a href = "#" class="list-group-item list-group-item-action  active">문의하기</a>
          <a href = "./client_as.php" class="list-group-item list-group-item-action">답변보기</a>
        </div>
      </div>
    </div>
 </div>
</div>
