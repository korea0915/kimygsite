<?php
include "../header.php";
/* 글 지우기 페이지 */
$no = $_GET['no'];
?>
<!-- '네'를 클릭시 지우기, '아니오'를 누를지 뒤로 돌아가기 --> 
<div style="text-align:center;">정말로 글을 삭제하시겠습니까? </div>
<div style="text-align:center;"><a href="./process/bbs_delete_process.php?no=<?php echo $no?>"> 네 </a></div>
<div style="text-align:center;"><a href="./bbs_view.php?no=<?php echo $no?>"> 아니오 </a></div>