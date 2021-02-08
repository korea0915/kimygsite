<?php
include "../header.php";
?>
<!-- 관리자 계정 비밀번호 변경 페이지 -->
 <div class="container mt-9">
    <div class="row">
      <div class="col-md-6 offset-md-1">
      <h4 class="mb-3">비밀번호 변경</h4>
      <form class="needs-validation" method="post" action="./process/pw_modify_process.php">
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="user_id">아이디</label>
            <input type="hidden" name="id" value="<?=$id?>">
            <input type="text" readonly class="form-control" id="user_id" placeholder="<?=$user_id?>" value="<?=$user_id?>">
          </div>
        </div>
        <hr class="mb-4">
        <!-- 현재 비밀번호 -->
        <div class="mb-3">
          <label for="Cpw">현 비밀번호</label>
          <input type="password" class="form-control" id="Cpw"  name= "Cpw" placeholder="현재 비밀번호를 입력해주세요." value="">
          <small class="text-muted">현 비밀번호를 입력해주세요.</small>
        </div>
        <hr class="mb-4">
        <!-- 새로운 비밀번호 -->
        <div class="mb-3">
          <label for="Npw">새로운 비밀번호</label>
          <input type="password" class="form-control" id="Npw"  name= "Npw" placeholder="새로운 비밀번호를 입력해주세요." value="">
          <small class="text-muted">새로운 비밀번호를 입력해주세요.</small>
        </div>
        <hr class="mb-4">
        <button class="btn btn-primary btn-lg btn-block" type="submit">수정하기</button>
      </form>
      </div>
      <!-- 왼쪽 네비게이션 -->
      <div class="col offset-md-2">
        <div class="list-group " style="position: fixed;" >
          <a href = "./admin.php" class="list-group-item list-group-item-action">회원 관리</a>
          <a href = "./admin_bbs.php" class="list-group-item list-group-item-action">게사판 관리</a>
          <a href = "./admin_as.php" class="list-group-item list-group-item-action">문의보기</a>
          <a href = "#" class="list-group-item list-group-item-action active">비밀번호 변경</a>
        </div>
      </div>
    </div>
 </div>
</div>
