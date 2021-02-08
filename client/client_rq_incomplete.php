<?php
/* URL에서 문의글 번호 받음(GET방식) */
$message_no = $_GET['no'];
include "../header.php";
/* db에서 문의글 번호로  조회 */
$query = "SELECT * FROM message where no = $message_no";
$result = mysqli_query($conn, $query);
$check = mysqli_fetch_array($result);
?>
    <div class="d-flex flex-row-reverse bd-highlight"><a class='btn btn-secondary' href="./client_as.php">목록</a></div>
    <div class="p-3 mb-2 bg-light">
        <!-- 문의내용 작성한 것 보기 -->
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
</div>