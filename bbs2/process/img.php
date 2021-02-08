<?php
$upload_dir = "../img/";
echo "confirm img</br>";
$name = $_FILES['img']['name'];
$uploadfile = $_FILES['img']['name'];

if(move_uploaded_file($_FILES['img']['tmp_name'],"$upload_dir.$name"))
{
echo "file has uploaded</br>";
echo "<img src='$upload_dir.$name' width='200px'>";
echo "1. file name: {$_FILES['img']['name']}</br>";
echo "1. file type: {$_FILES['img']['type']}</br>";
echo "1. file size: {$_FILES['img']['size']}</br>";
echo "<a href='../bbs2.php'>돌아가기</a>";
}
else{
    echo "Fail to upload";
    echo "error: {$_FILES['img']['error']}</br>";
    echo "<a href='../bbs2.php'>돌아가기</a>";
}

?>