<?php
/* 회원이 문의 힌 글 표시 페이지 */
/* URL에서 문의글 번호 받음(GET방식) */
$message_no = $_GET['no'];
include "../header.php";
/* 문의 글 번호 받아서 쿼리 실행 */
$query = "select * from message where no = $message_no";
$result = mysqli_query($conn, $query);
$check = mysqli_fetch_array($result);
/* 문의 아이디는 답변자 아이디로, 답변자 아이디는 문의자 아이디로 값 변환 */
$rq_id = $check['as_id'];
$as_id = $check['rq_id'];

?>
    <!-- 목록으로 돌아가기 -->
    <div class="d-flex flex-row-reverse bd-highlight"><a class='btn btn-secondary' href="./admin_rq.php">목록</a></div>
    <!-- 문의내용 표시 -->
    <div class="p-3 mb-2 bg-light">
        <h3 class="text-center">문의 내용</h3>
        <table  class="table">
        <tbody>
            <tr>
                <td style = "text-align:center"><h3><?php  echo $check['title']; ?></h3></td>
            </tr>
            <tr style = "text-align:left; font-size:2px;">
                <td colspan='2'>
                작성자: <?php  echo $check['rq_id'].'<br>';
                            echo $check['regidate'];
                ?>
                </td>
            </tr>
            <tr>
                <td colspan='2'>
                <?php             
                    echo $check['content']; 
                ?>
                </td>
            </tr>
        </tbody>
        </table>    
    </div>
    <hr class="border border-danger mb-4">
    <!-- 답변하기 -->
    <div class="p-3 mb-2 bg-light">    
        <h3 class="text-center mt-5">답변 하기</h3> 
        <!-- post형식으로 값 전달 -->   
        <form method="POST" action="./process/answer_process.php">
                <!-- 답변 테이블에 문의자는 답변로 변환해서 값 저장 (정확히 말하면 답변테이블에서는 문의자는 보낸사람, 답변자는 받는사람으로 해석하면 됨)-->
                <input type='hidden' name='rq_id' value="<?=$rq_id?>">
                <!-- 답변테이블에 답변자는 문의자로 변환해서 값 저장 -->
                <input type='hidden' name='as_id' value="<?=$as_id?>">
                <input type="hidden" name="message_no" value="<?=$message_no?>">
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">제목</span>
                    <input type="text" class="form-control" name="title" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                </div>
                <textarea class="form-control" name="content" style="height: 100px"></textarea>
                <div class="d-flex flex-row-reverse bd-highlight mt-3">
                <button class="btn btn-primary" type="submit">등록</button>
                </div>
        </form>
    </div>
</div>