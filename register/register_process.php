<?php
include "../db/connect.php";
/* register.php에서 Post로 보낸 값 받기 */
$id = htmlspecialchars($_POST['user_id'], ENT_QUOTES, 'UTF-8');
$pw = htmlspecialchars($_POST['pw'], ENT_QUOTES, 'UTF-8');
$pw2 = htmlspecialchars($_POST['pw2'], ENT_QUOTES, 'UTF-8');
$gender = $_POST["gender"];
$birth = $_POST["birth"];
$mail = $_POST["email"];
$address = htmlspecialchars($_POST['address'], ENT_QUOTES, 'UTF-8');
$phone =htmlspecialchars($_POST['phone'], ENT_QUOTES, 'UTF-8');
/* db연결 되었는지 확인 */
if(!$conn){
    echo "Error deleting record: " . $conn->error;
}
/* db연결 잘 되어있으면 function실행 */
else
{   
    id_pwCheker();
}


/* 아이디 값 중복 확인 기능과 비밀번호와 비밀번호 확인에서 값이 똑같은지 확인 하고 DB에 등록하는 기능 */
function id_pwCheker()
{
    global $conn;
    global $id;
    global $pw;
    global $pw2;
    global $address;
    global $phone;
    global $gender;
    global $birth;
    global $mail;
    
    /* 비밀번호 암호화 */
    $encrypted_pw = password_hash($pw, PASSWORD_DEFAULT);

    /* Id가 DB에 있는지 확인 */
    $query = "select id_name from member where id_name = '{$id}'";
    $result = mysqli_query($conn, $query);
    $mem = mysqli_num_rows($result);

    /* pw 와 pw2값이 맞는지 확인 */
    if($pw!==$pw2)
    {
        echo "비밀번호와 비밀번호 확인이 다릅니다";
    }
    else
    {

        if($mem == 0)
        {
            /* id가 중복이 안되면 db에 값들 저장 */
            $query = 
            "insert into member 
                (id_name,pw,gender,reg_date,Maddress,email,phoneNum,birth)
                values
                ('$id','$encrypted_pw','$gender', current_timestamp(),'$address','$mail','$phone','$birth')";
            $result = mysqli_query($conn, $query);
            if($result)
            {
                header ("Location: ../index.php");
            }
            else
            {
                echo "Error deleting record: " . $conn->error;
            }
        }
        else
        {
            /* id가 중복이면 메세지 표시하고 회원가입 페이지로 다시 돌아가기 */
            echo "중복된아이디 입니다.";
            echo "<a href='register.php'>돌아가기</a>";
        }
    }
}
?>