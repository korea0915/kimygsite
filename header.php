<!-- 메인 인덱스외에는 일반 헤더로 연결 -->
<!DOCTYPE html>
<html lang="en">
<!-- 루트 경로 정의 -->
<?php  define("ROOT", "../../PHP");?>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>php로 만든 페이지</title>
    <link href='<?php echo ROOT ?>/css/main.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</head>
<body>
<header>
<!-- 로그인 기능 -->
<?php include ROOT. "/loginNavi.php"; ?>
</header>
<!-- DB 연결 -->
<?php include ROOT. "/db/connect.php";?>
<!-- BODY부분 컨테이너 -->
<div class="container" style="margin-top: 100px;">