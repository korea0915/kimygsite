<?php
/* 확장자 확인 */
$ext = array('jpg','jpeg','png','gif');

/* 이미지 파일 이름 변환 */
$date = date("Y-m-d-H-i-s");
$upload_img_name = $_FILES['img']['name'];
$upload_img_size = $_FILES['img']['size'];
$upload_dir = "../img/";

$file = explode('.',$upload_img_name);
$file_name = $file[0];
$file_type = $file[1];

$file_name .= '-'.$date;

$img_name = $file_name.'.'.$file_type;

/* 이미지 파일인지 확인 */
function img_ext($name, $arr)
{
    if(in_array($name, $arr))
      {  return true;  }
    else 
    { return false; }     
}

$img_check = img_ext($file_type, $ext); 

?>