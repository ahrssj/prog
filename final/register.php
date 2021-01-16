<?php
session_start();
try {
    $pdo = new PDO('mysql:dbname=final_db;charset=utf8;host=localhost','root','root');
} catch (PDOException $e) {
    exit('DBCommentError'.$e->getMessage());
}

//フォームからの値をそれぞれ変数に代入
$name = $_POST['name'];
$mail = $_POST['mail'];
$pass = $_POST['pass'];

//mailがすでに登録されていないかチェック
$sql = "SELECT * FROM login_table WHERE mail = :mail";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':mail', $mail);
$status=$stmt->execute();
$member = $stmt->fetch();
if($status==false) {
    $error = $stmt->errorInfo();
    exit("SQLError".$error[2]);
}else{

    if ($member['mail'] === $mail) {
        $msg = '同じメールアドレスが存在します。';
        $link = '<a href="signup.php">戻る</a>';
    } else {
        //登録されていなければinsert 
        $sql = "INSERT INTO login_table(name, mail, pass) VALUES (:name, :mail, :pass)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':name', $name);
        $stmt->bindValue(':mail', $mail);
        $stmt->bindValue(':pass', $pass);
        //実行
        $status=$stmt->execute();

        $msg = '会員登録が完了しました';
        $link = '<a href="index.php">ログインページ</a>';
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
