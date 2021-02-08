<?php
require "../../db/connect.php";
/* client.php에서 form에서 보내온 값 가져오기 */
$user_id = $_POST['user_id'];
$email = $_POST['email'];
$address = htmlspecialchars($_POST['address'], ENT_QUOTES, 'UTF-8');
$gender = $_POST['gender'];
$phone =htmlspecialchars($_POST['phone'], ENT_QUOTES, 'UTF-8');;
$id = $_POST['id'];


/* 가져온 값들 member테이블에 업데이트 */
$query = "UPDATE  member set email = '$email', Maddress = '$address', gender = '$gender', phoneNum = '$phone' where id = $id";;
$result = mysqli_query($conn, $query);
/* 쿼리 실패 시 메세지 표시, 성공시 메인페이로 돌아가기 */
if($result)
{
    header ("Location: ../../index.php");
}
else
{
    echo "Error deleting record: " . $conn->error;
}
?>