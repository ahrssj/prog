<?php
session_start();

//DB接続
try {
    $pdo = new PDO('mysql:dbname=final_db;charset=utf8;host=localhost','root','root');
} catch (PDOException $e) {
    exit('DBCommentError'.$e->getMessage());
}

//POST受信
$mail = $_POST['mail'];
$pass = $_POST['pass'];

$sql = "SELECT * FROM login_table WHERE mail = :mail";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':mail', $mail);
$status=$stmt->execute();
$member = $stmt->fetch();
if($status==false) {
    $error = $stmt->errorInfo();
    exit("SQLError".$error[2]);
}else{
    if ($member['pass'] === $pass) {
        $_SESSION['id'] = $member['id'];
        $_SESSION['name'] = $member['name'];
        $msg = 'ログインしました。';
        $link = '<a href="home.php">ホーム</a>';
    } else {
        $msg = 'メールアドレスもしくはパスワードが間違っています。';
        $link = '<a href="index.php">戻る</a>';
    }
}

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
<h1 class="title"><?php echo $msg; ?></h1><!--メッセージの出力-->
<p class="coment"><?php echo $link; ?></p>
    
</body>
</html>
