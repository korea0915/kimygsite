<?php
/* 관리자 bbs관련 function 페이지 */

/* 게시판 이름 받아서 게시판 총 수 구하는 function */
function bbs_count($bbs)
{   global $conn;
    $query ="select * from $bbs";
    $result = mysqli_query($conn, $query);
    $bbs_count = mysqli_num_rows($result);    
    return $bbs_count;
}

/* 게시판 이름 받아서 게시판 선택하는 function */
function bbs_view($bbs)
{   
    global $conn;
    if(isset($bbs))
    { $query ="select * from $bbs";
      $result = mysqli_query($conn, $query);
      return $result;
    }
    else{
        $result = null;
        return $result;
    }
}
?>

<?php
/* 게시판 이름과 값 받아서 보여주는 function */
/* 첫번째 arg에는 function:(bbs_view())에서 쿼리로 실행한 값을 넣고, 두번째 arg에는 게시판 이름을 넣음 */
function bbs_result($bbs, $bbs_name)
{   
    /* 게시판 이름 받아서 view페이지에서 보여주기 위한 경로 */
    $path = "../".$bbs_name."/".$bbs_name."_view.php?no=";
    global $conn;

    if(isset($bbs))
    {   
        /* 페이징네이션 기능 */
        if(isset($_GET['page']))
        {$page = $_GET["page"];}
        else
        {$page = 1;}
    
    
        $page_cnt= mysqli_num_rows($bbs);
    
        $list = 5;
        $block_cnt = 5;
        $block_num = ceil($page/$block_cnt);
        $block_start = (($block_num - 1) * $block_cnt) + 1;
        $block_end = $block_start + $block_cnt -1; 
    
        $total_page = ceil($page_cnt/$list);
        if($total_page < $block_end)
        {
            $block_end = $total_page;
        }
        $page_start = ($page - 1) * $list;
    
        $bbs_query = "SELECT * from $bbs_name ORDER BY no desc limit $page_start, $list";
        $bbs_result = mysqli_query($conn, $bbs_query);
        $result = mysqli_fetch_array($bbs_result);

        echo $bbs_name.':게시판';
        /* 게시판 불러오기 */
        foreach($bbs_result as $v)
        {
            /* 이름 30자 넘길시 (...)으로 변환 */
            $limited_title = $v["title"];
            if(strlen($limited_title)>10){
            $limited_title=str_replace($v["title"], mb_substr($v["title"],0,10,"utf-8")."...", $v["title"]);
            } else {}
            ?>
            <ul class="list-group">
                <div class="row">
                    <li class='list-group-item'>
                        <!-- 게시판 경로 변수로 받은것 사용 -->
                        <a href="<?php echo $path.$v['no'];?>">
                        <dlv class="col">작성자:<?php echo $v['user_id'];?></dlv>
                        <dlv class="col offset-md-1"><span class="fs-6">Delflag:<?php echo $v['delflag'];?></span></dlv>
                        <dlv class="col offset-md-1"><span class="fs-6">제목:<?php echo $limited_title;?></span></dlv></a>
                        <form class="col offset-md-10" method="post" action="./process/bbs_modify_process.php">
                            <input type="hidden" name="bbs_no" value=<?=$v['no']?>>
                            <input type="hidden" name="bbs" value=<?=$bbs_name?>>
                            <button type="submit" class="btn btn-primary btn-sm">숨기기</button>
                        </form>
                    </li>
                </div>
            </ul>
<?php   }?>
        <!-- 페이징네이션 표시 -->
        <div class="container">
            <div class="row">
                <div class='col-md-6 offset-md-2'>
                    <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center">
                            <?php
                            if ( $page <= 1)
                            { echo "<li class='page-item disabled'><a class='page-link' href='{{$_SERVER['PHP_SELF']}}?bbs=$bbs_name&page=1' tabindex='-1' aria-label='Previous'> 
                            <span aria-hidden='true'>&laquo;</span></a></li>";}

                            else {  echo "<li><a class='page-link href='{$_SERVER['PHP_SELF']}?bbs=$bbs_name&page=1' aria-label='Previous'> 
                                        <span aria-hidden='true'>&laquo;</span></a></li>";}

                            for ($i = $block_start; $i <= $block_end; $i++)
                            { 
                            echo "<li class='page-item'><a class='page-link' href='{$_SERVER['PHP_SELF']}?bbs=$bbs_name&page=$i'> $i </a></li>";
                            }

                            if ( $page >= $total_page)
                            {
                            echo"<li class='page-item disabled'><a class='page-link href='{$_SERVER['PHP_SELF']}?bbs=$bbs_name&page=$total_page'aria-label='Next'>
                                        <span aria-hidden='true'>&raquo;</span></a></li>";
                            }
                            else { echo"<li><a class='page-link href='{$_SERVER['PHP_SELF']}?bbs=$bbs_name&page=$total_page'aria-label='Next'>
                                        <span aria-hidden='true'>&raquo;</span></a></li>"; }

                            ?>
                        </ul>
                        </nav>
                </div>
            </div>
        </div>
<?php 
    }
}
?>
