<?php
/* URL에서 문의글 번호 받음(GET방식) */
$message_no = $_GET['no'];
include "../header.php";
/* 문의글 번호로 문의글과 답변글 조회(Join방식으로 query 조회, am는 답변글 테이블, m는 문의글 테이블) */
$query = "select am.rq_id, am.as_id, am.title, am.content, am.regidate, m.title, m.content, m.regidate from answer_message as am join message as m on am.m_id = m.no where m.no= $message_no";
$result = mysqli_query($conn, $query);
$check = mysqli_fetch_array($result);
?>
    <!-- 목록으로 돌아가기 -->
    <div class="d-flex flex-row-reverse bd-highlight"><a class='btn btn-secondary' href="./client_as.php">목록</a></div>
    <!-- 문의내용 표시 -->
    <div class="p-3 mb-2 bg-light">
        <h3 class="text-center">문의 내용</h3>
        <table  class="table">
        <tbody>
            <tr>
                <td style = "text-align:center"><h3><?php  echo $check['5']; ?></h3></td>
            </tr>
            <tr style = "text-align:left; font-size:2px;">
                <td colspan='2'>
                작성자: <?php  echo $check['1'].'<br>';
                            echo $check['7'];
                ?>
                </td>
            </tr>
            <tr>
                <td colspan='2'>
                <?php             
                    echo $check['6']; 
                ?>
                </td>
            </tr>
        </tbody>
        </table>    
    </div>
    <hr class="border border-danger mb-4">
    <!-- 답변내용 표시 -->
    <div class="p-3 mb-2 bg-light">    
        <h3 class="text-center mt-5">답변 보기</h3>    
        <table  class="table">
        <tbody>
            <tr>
                <td style = "text-align:center"><h3><?php  echo $check['2']; ?></h3></td>
            </tr>
            <tr style = "text-align:left; font-size:2px;">
                <td colspan='2'>
                작성자: <?php  echo $check['0'].'<br>';
                            echo $check['4'];
                ?>
                </td>
            </tr>
            <tr>
                <td colspan='2'>
                <?php             
                    echo $check['3']; 
                ?>
                </td>
            </tr>
        </tbody>
        </table>    
    </div> 
</div>