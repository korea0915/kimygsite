<?php   
/* bbs2.write.php에서 post로 보내준 값 가져오기 */
$user_id=$_POST['user_id'];
$id=$_POST['id'];
$bbsid=$_POST['bbsid'];
$title= nl2br(htmlspecialchars($_POST['title'], ENT_QUOTES, 'UTF-8'));
$category=$_POST['category'];
$link=nl2br(htmlspecialchars($_POST['link'], ENT_QUOTES, 'UTF-8'));
$content= nl2br(htmlspecialchars($_POST['content'], ENT_QUOTES, 'UTF-8'));
            
/* 유저 아이피 주소 가져오기 Function */
  function get_client_ip() {
    $ipaddress = '';
    if (isset($_SERVER['HTTP_CLIENT_IP']))
    $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
    $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_X_FORWARDED']))
    $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
    $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_FORWARDED']))
    $ipaddress = $_SERVER['HTTP_FORWARDED'];
    else if(isset($_SERVER['REMOTE_ADDR']))
    $ipaddress = $_SERVER['REMOTE_ADDR'];
    else
    $ipaddress = 'UNKNOWN';
    return $ipaddress;
    }
/* ip가져온 값 $ip에 넣기 */ 
$ip =  get_client_ip();

/* 제목이나 내용 부분 비어있는지 확인 */
if(!$title||!$content){  
  echo "<a href='../../index.php'>제목이나 내용을 입력해주세요.</a>";
} else { 
require ('../../db/connect.php');
 /* 파일 업로드 실행후 그외에 값을 db에 저장 */
$sql = "INSERT INTO `bbs` (`no`, `bbsid`, `id`, `user_id`, `title`, `regdate`, `moddate`, `ip`, `category`, `content`, `link`, `view`, `delflag`) VALUES
                (NULL, '$bbsid', '$id', '$user_id', '$title', current_timestamp(), NULL, '$ip', '$category', '$content', '$link', 0, 0)";
$result = mysqli_query($conn, $sql);

if ($result) {
  header ("Location: ../bbs.php");
} else {
  echo "Error deleting record: " . $conn->error;
}

}

?>