<?php
require "../../db/connect.php";
/* Client_pw.php에서 보낸값 가져오기 */
$id = $_POST['id'];
$cpw = htmlspecialchars($_POST['cpw'], ENT_QUOTES, 'UTF-8');
$npw = htmlspecialchars($_POST['npw'], ENT_QUOTES, 'UTF-8');

$query = "select * from member where id=$id";
$result = mysqli_query($conn, $query);
$check = mysqli_fetch_array($result);
/* db조회 성공 실패 조건문 */
if($result)
{
    /* 비밀번호 맞는지 확인 */
    if(password_verify($cpw, $check['pw']))
    {
        /* 비밀번호 암호화 */
        $encrypted_pw = password_hash($npw, PASSWORD_DEFAULT);
        
        /* 새로운 비밀번호 table에 입력 */
        $q = "UPDATE  member set pw = '$encrypted_pw' where id = $id";
        $r = mysqli_query($conn, $q);
        /* 쿼리 성공 혹은 실패 조건문 */
        if($r)
        {
            header ("Location: ../../index.php");
        }
        else
        {
            echo "Error deleting record: " . $conn->error;
        }
    }
    else
    {
        /* 비밀번호가 틀리면 표시 */
        echo "비밀번호가 틀립니다";
        echo "<a href='../client_pw.php'>돌아가기</a>";
    }
}
else
{
    /* id로 member테이블 조회 실패시 표시*/
    echo "Error deleting record: " . $conn->error;
}

?>