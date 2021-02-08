<?php
/* 게시물 보기 페이지 */
/* get방식으로 게시판 번호 값 가져오기 */
$bbs_no = $_GET['no'];
/* 조회수 기능 페이지 불러오기 */
include "./view_cookie.php";
include "../header.php";
/* 게시판 번호로 테이블에서 값 조회 */
$query = "select * from bbs where no = $bbs_no";
$result = mysqli_query($conn, $query);
$check = mysqli_fetch_array($result);
?>
    <!-- 가져온 값들 테이블로 표시 -->
    <table  class="table">
    <thead>
        <tr>
            <td style = "text-align:left" border-bottom="none">게시물 no: <?php  echo $check['no']; ?></td>
            <div class="d-flex flex-row-reverse bd-highlight"><a class='btn btn-secondary' href="./bbs.php">목록</a></div>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td style = "text-align:center"><h3><?php  echo $check['title']; ?></h3></td>
        </tr>
        <tr style = "text-align:left; font-size:2px;">
            <td colspan='2'>
            작성자: <?php  echo $check['user_id'].'<br>';
                   /* 수정될 날짜가 있으면 수정된 날짜로, 없으면 작성 날짜로 표시 */
                   if (isset($check['moddate']))
                       {echo $check['moddate'];}
                   else
                       {echo $check['regdate'];}
            ?>
            </td>
        </tr>
        <tr>
            <td colspan='2'>
            <?php  
                   echo $check['content'].'<br>'; 
            ?>
            </td>
        </tr>
    </tbody>
    </table>
    <!-- 작성자와 로그인한 아이디가 같으면 혹은 운영자 아이디 이면 수정하기와 삭제하기 버튼 표시 -->
    <?php
    if($user_id == $check['user_id'] || $user_id == "admin")
    {?>  
        <div class='row'>
        <div class="col-sm-1 offset-sm-10"><a class='btn btn-primary btn-sm' href='./bbs_modify.php?no=$bbs_no'>수정하기</a></div>
        <div class="col"><a class='btn btn-primary btn-sm' href='./bbs_delete.php?no=$bbs_no'>삭제하기</a></div>
        </div>
<?php } ?>
<hr>
<!-- 댓글 기능페이지 불러오기 -->
<?php
if(isset($user_id))
{
 require "./bbs_comment.php";
} 
?>
<!-- 댓글 -->
<div class="card mb-5">
    <?php 
    /* 댓글 값들 게시판 번호 값 참조해서 불러오기 */
    $comment_query = "select * from bbs_comment where bbs_no=$bbs_no";
    $comment_result = mysqli_query($conn, $comment_query);
    foreach($comment_result as $comment_v)
    {   /* 댓글 작정자와 로그인한 아이디가 같으면 혹은 운영자 아이디면 수정하기, 삭제하기 버튼표시 후 $write변수에 저장 */
        if($user_id == $comment_v['user_id'] || $user_id === "admin")
        {
            $write = "<div class='card-header'>작성자: {$comment_v['user_id']}
                    <a class='btn btn-primary' href='./process/comment_modify_process.php?comment_no={$comment_v['no']}&no=$bbs_no'>수정하기</a>
                    <a class='btn btn-primary' href='./process/comment_delete_process.php?comment_no={$comment_v['no']}&no=$bbs_no'>삭제하기</a>
                    </div>";
        }
        /* 댓글작성자와 로그인한 아이디가 다르면 표시 후 $write변수에 저장*/
        else
        {
            $write = "<div class='card-header'>작성자: {$comment_v['user_id']}</div>";
        }
        /* 댓글 표시 */
        echo "<div class='card-body'>";
        echo "$write";
        echo "<div class='card-text'>{$comment_v['content']}<p class='text-right' style='font-size: x-small;'>날짜: {$comment_v['date']}</p></div></div>";
    }
    ?>
</div>