<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href = "css/style.css" rel = "stylesheet" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
</head>
<body id="allpage">
<h1 class="title">Welcome to ”EATIME”！</h1>
<br><br>
<form action="login.php" method="post">
<div class="signupform">
    <div class="login">
        <div class="form">
            <div>
                <label>mail：<label>
                <br>
                <input type="text" name="mail" required>
            </div>
            <div>
                <label>password：<label>
                <br>
                <input type="password" name="pass" required>
            </div>
        </div>
        <br>
        <input type="submit" class="loginbtn" value="ログイン">
    </div>

</form>
    <br>
    <p class="after">登録される方は<a href="signup.php">こちら</a></p>
</div>
</body>
</html>