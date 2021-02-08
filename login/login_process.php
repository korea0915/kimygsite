<?php
include "../db/connect.php";
/* 로그인폼에서 id값과 pw값 받기 */
$login_id=htmlspecialchars($_POST['login_id'], ENT_QUOTES, 'UTF-8');
/* id값 소문자로 변경 */
$login_id = strtolower($login_id);
$login_pw=htmlspecialchars($_POST['login_pw'], ENT_QUOTES, 'UTF-8');

/* id값과 pw값이 비어있는지 확인 */
if ($login_id == "" || $login_pw == ""){
echo "<a href='./login.php'>아이디 혹은 비밀번호를 입력해주세요<a>";
}
else{
    /* id값으로 db에서 같은 id값 찾기 */
    $query = "select * from member where id_name = '$login_id'";
    $result = mysqli_query($conn,$query);
    $check =  mysqli_fetch_array($result);
    if($check)
        {
            /* pw값과 db에 저장되있는 pw값 같은지 비교 */
            if(password_verify($login_pw, $check['pw']))
            {
                session_start();
                $_SESSION['user_id'] = $login_id;
                $_SESSION['id'] = $check['id'];
                header ("Location: ../index.php");
            }
            else
            {   /* pw값이 다르면 메시지 표시 후 메인페지로 돌아가기 */
                echo $login_id;
                echo $login_pw;
                echo "<a href='../index.php'>비밀번호 혹은 아이디가 틀립니다.</a>";
            }
        }
    else
        {
            /* db연결 오류시 메세지 표시 후 메인페이지로 복귀 */
            echo "<a href='../index.php'> DB연결오류. </a>";
            echo "Error deleting record: " . $conn->error;
        }
    }
?>