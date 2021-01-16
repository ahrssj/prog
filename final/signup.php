<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href = "css/style.css" rel = "stylesheet" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <title>登録</title>
</head>
<body id="allpage">
<h1 class="title2">新規会員登録</h1>
<form action="register.php" method="post">
<div class="signupform">
    <div>
        <label>名前：<label>
        <input type="text" name="name" required>
    </div>
    <br>
    <div>
        <label>メールアドレス：<label>
        <input type="text" name="mail" required>
    </div>
    <br>
    <div>
        <label>パスワード：<label>
        <input type="password" name="pass" required>
        <br>
        <p class="coment">パスワードは8文字以内で入力してください</p>
    </div>
    <br>
    <input type="submit" class="loginbtn" value="新規登録">
</form>
    <p class="coment">すでに登録済みの方は<a href="index.php">こちら</a></p>
</div>
</body>
</html>