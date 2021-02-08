<?php
include "../header.php";
/* 회원정보 페이지 */
$query = "select * from member where id = $id";
$result = mysqli_query($conn, $query);
$check= mysqli_fetch_array($result);
?>
  <!-- 회원정보값들 db에서 불러온 후 표시 -->
  <div class="container mt-9">
    <div class="row">
      <div class="col-md-6 offset-md-1">
            <h4 class="mb-3">회원정보 변경</h4>
            <form class="needs-validation" method="post" action="./process/modify_process.php">
              <div class="row">
                <!-- 아이디 표시, 아이디 수정X -->
                <div class="col-md-6 mb-3">
                  <label for="user_id">아이디</label>
                  <input type="hidden" name="id" value="<?=$id?>">
                  <input type="text" readonly class="form-control" id="user_id" placeholder="<?=$user_id?>" value="<?=$user_id?>">
                </div>
                <!-- 비밀번호 가짜 값으로 표시, 비밀번호 수정X -->
                <div class="col-md-6 mb-3">
                  <label for="pw">비밀번호</label>
                  <input type="password" readonly class="form-control" id="pw" placeholder="ddddd" value="ddddd">
                </div>
              </div>
              <hr class="mb-4">
              <!-- Email 값 보여주고, 수정 O -->
              <div class="mb-3">
                <label for="email">Email </label>
                <input type="email" class="form-control" id="email" name= "email" value="<?=$check['email']?>">
                <small class="text-muted">Email을 입력해주세요.</small>
              </div>
              <hr class="mb-4">
              <!-- 주소 값 보여주고, 수정 O -->
              <div class="mb-3">
                <label for="address">주소</label>
                <input type="text" class="form-control" id="address"  name= "address"  value="<?=$check['Maddress']?>">
                <small class="text-muted">주소를 입력해주세요.</small>
              </div>
              <hr class="mb-4">
              <!-- 기존 성별 값 확인하는 Function실행, 수정 O -->
              <div class="row">
                <div class="col-md-4 mb-3">
                  <?php genderChecker($check['gender']); ?>
                  <small class="text-muted">성별을 선택해주세요.</small>
                </div>
              </div>
              <hr class="mb-4">
              <div class="row">
                <!-- 전화번호 표시 후, 수정 O -->
                <div class="col-md-6 mb-3">
                  <label for="cc-name">전화번호</label>
                  <input type="text" class="form-control" id="phone"  name= "phone" value="<?=$check['phoneNum']?>">
                  <small class="text-muted">전화번호를 입력해주세요.</small>
                </div>
              </div>
              <hr class="mb-4">
              <button class="btn btn-primary btn-lg btn-block" type="submit">수정하기</button>
            </form>
      </div>
      <!-- 왼쪽 네비게이션 -->
      <div class="col offset-md-2">
        <div class="list-group " style="position: fixed;" >
          <a href = "#" class="list-group-item list-group-item-action active" aria-current="true">회원정보 변경</a>
          <a href = "./client_pw.php" class="list-group-item list-group-item-action">비밀번호 변경</a>
          <a href = "./client_rq.php" class="list-group-item list-group-item-action">문의하기</a>
          <a href = "./client_as.php" class="list-group-item list-group-item-action">답변보기</a>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- DB에서 성별 값 받아서 체크 박스에 체크하는 기능 -->
<?php
function genderChecker($gender){
  if($gender == "male")
    {
      echo '
  <div class="form-check">
    <input class="form-check-input" type="radio" name="gender" id="gender" value="male" checked>
    <label class="form-check-label" for="gender" >
    남
    </label>
  </div>
  <div class="form-check">
    <input class="form-check-input" type="radio" name="gender" id="gender" value="female">
    <label class="form-check-label" for="gender">
    여
    </label>
  </div>';
    }
  else
  {
    echo '
  <div class="form-check">
    <input class="form-check-input" type="radio" name="gender" id="gender" value="male" >
    <label class="form-check-label" for="gender" >
    남
    </label>
  </div>
  <div class="form-check">
    <input class="form-check-input" type="radio" name="gender" id="gender" value="female" checked>
    <label class="form-check-label" for="gender">
    여
    </label>
  </div>';
  }
}

?>