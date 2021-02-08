<?php include "../header.php"; ?>
    <!-- 회원등록 페이지 -->
    <div class="container mt-9">
        <div class="col-md-6 offset-md-1">
            <div class="col-md-3 offset-md-11">      
                <!-- 메인페이로 돌아가기 -->
                <a class="badge bg-primary text-wrap" href="../index.php">돌아가기</a>
            </div>
            <h4 class="mb-3">회원등록</h4>
            <!-- 회원가입 폼 POST 값으로 보냄 -->
            <form class="needs-validation" method="post" action="./register_process.php">
                <div class="row">
                    <div class="mb-3">
                        <label for="user_id">아이디 </label>
                        <input type="text" class="form-control" id="user_id" name= "user_id" placeholder="아이디">
                    </div>
                    <hr class="mb-4">
                    <div class="col-md-6 mb-3">
                    <label for="pw">비밀번호</label>
                    <input type="password" class="form-control" id="pw" name="pw" placeholder="비밀번호">
                    </div>
                    <div class="col-md-6 mb-3">
                    <label for="pw">비밀번호 확인</label>
                    <input type="password" class="form-control" id="pw2" name="pw2" placeholder="비밀번호 확인">
                    </div>
                </div>
                <hr class="mb-4">
                <div class="mb-3">
                    <label for="email">Email </label>
                    <input type="email" class="form-control" id="email" name= "email">
                    <small class="text-muted">Email을 입력해주세요.</small>
                </div>
                <hr class="mb-4">
                <div class="mb-3">
                    <label for="address">주소</label>
                    <input type="text" class="form-control" id="address"  name= "address">
                    <small class="text-muted">주소를 입력해주세요.</small>
                </div>
                <hr class="mb-4">
                <div class="row">
                    <div class="col-md-4 mb-3">
                    <small class="text-muted">성별을 선택해주세요.<br></small>
                    남자<input type="radio" name="gender" value="male">
                    여자<input type="radio" name="gender" value="female">
                    </div>
                </div>
                <hr class="mb-4">
                <div class="row">
                    <div class="col-md-6 mb-3">
                    <label for="cc-name">전화번호</label>
                    <input type="text" class="form-control" id="phone"  name= "phone" value="">
                    <small class="text-muted">전화번호를 입력해주세요.</small>
                    </div>
                </div>
                <hr class="mb-4">
                <button class="btn btn-primary btn-lg btn-block" type="submit">등록하기</button>
            </form>
        </div>
    </div>
</div>