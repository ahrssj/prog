<?php
session_start();
$_SESSION = array();//セッションの中身をすべて削除
session_destroy();//セッションを破壊
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href = "css/style.css" rel = "stylesheet" />
    <title></title>
</head>
<body id="allpage">
    <div class="login2">
        <p class="after">ログアウトしました。</p>
        <a href="index.php">ログインへ</a>
    </div>
    
</body>
</html>