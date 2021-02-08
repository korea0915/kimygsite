<?php
include "../header.php";
/* 글 수정 페이지 */
/* 게시판 번호 값 가져오기 */
$no = $_GET['no'];
$sql = "select * from bbs where no=$no";
$result = mysqli_query($conn, $sql);
$check = mysqli_fetch_array($result);
?>
<!-- 번호값으로 조회된 값들 폼에 표시후, 수정 위해 post방식으로 값 전달 -->
<div class="container mt-9">
      <div class="row">
        <div class="col-md-9 offset-md-1">
          <h4 class="mb-3">수정하기</h4>
          <!-- 게시판 내용 post형식으로 값 전달 -->
          <form class="needs-validation" method="post" action="./process/bbs_modify_process.php" enctype="multipart/form-data">
            <div class="row">
              <div class="col-md-12">
                <label for="title">제목</label>
                <input type="hidden" name="bbsid" value="Imgbbs">
                <input type="hidden" name="user_id" value="<?=$user_id?>">
                <input type="hidden" name="id" value="<?=$id?>">
                <input type="text" class="form-control" id="title" placeholder="제목을 입력해주세요" name="title" value="<?php echo $check['title'] ;?>">>
                <small class="text-muted">제목을 입력해주세요.</small>
              </div>
            </div>
            <hr class="mb-4">
            <div class="row">
              <div class="col-md-4">
                <div class="form-floating">
                  <select class="form-control form-control-sm" class="form-select" id="floatingSelect" name="category">
                    <option value="PHP">PHP</option>
                    <option value="HTML">HTML</option>
                    <option value="MYSQL">MY_SQL</option>
                  </select>
                  <label for="floatingSelect">카테고리를 선택해주세요.</label>
                </div>
              </div>
              <div class="col-md-8">
                <div class="form-floating">
                  <input type="text" class="form-control" id="floatingInputGrid" name="link" placeholder="Http://" value="<?php echo $check['link'];?>">
                  <label for="floatingInputGrid">Link</label>
                </div>
              </div>
            </div>
            <hr class="mb-4">
            <small class="text-muted">내용 입력해주세요.</small>
            <div class="form-floating">
              <textarea class="form-control" placeholder="내용을 입력해주세요" id="floatingTextarea" name="content" style="height: 100px">
              <?php $text=$check['content']; $text = str_replace('<br />',' ', $text);  echo $text;?>
              </textarea>
              <label for="floatingTextarea">내용</label>
            </div>
            <div class="mb-3">
              <small class="text-muted">파일을 선택해주세요.</small>
              <input class="form-control" name="img" size="100" type="file" id="formFile">
            </div>
            <hr class="mb-4">
            <button class="btn btn-primary btn-lg btn-block" type="submit" style="float:right;">수정</button>
          </form>
        </div>
      </div>
 </div>