<?php
/* 로그아웃 페이지로 세션 파괴 후 메인페이지로 복귀 */
session_start();
session_destroy();
header ("Location:  ../index.php");
exit();
?>