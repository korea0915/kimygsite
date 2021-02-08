<?php
require_once '../db/connect.php';
if(!isset($_COOKIE['viewbbs'.$bbs_no]))
{
    $query = "UPDATE bbs SET view=view + 1 where no = $bbs_no";
    $result =  mysqli_query($conn, $query);
    if($result)
    {
       setcookie('viewbbs'.$bbs_no, 'bbs', time() + (60 * 60 * 24), './'); 
    }
    else
    {
        echo "db connect error";    
    }
}


?>