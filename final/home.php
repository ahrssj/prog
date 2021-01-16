<?php
//DB接続
try {
    $pdo = new PDO('mysql:dbname=map_db;charset=utf8;host=localhost','root','root');
} catch (PDOException $e) {
    exit('DBConnecterror'.$e->getMessage());
}

$sql = "SELECT * FROM map_tables ORDER BY id DESC LIMIT 5";
$stmt = $pdo->prepare($sql);
$status = $stmt->execute();

$view=""; //表示用文字列を格納する変数
if($status==false) {
    //execute（SQL実行時にエラーがある場合）
    $error = $stmt->errorInfo();
    exit("SQLError:".$error[2]);
}else{
    //Selectデータで取得したレコードの数だけ自動でループする
    while( $res = $stmt->fetch(PDO::FETCH_ASSOC)){
        //$view .= '<p>'.$res["name"].",".$res["coment"].",".$res["input_date"].",".'</p>'; 

        $view .= '<tr>';

        $view .= '<td>';
        $view .=$res["name"];
        $view .='</td>';

        $view .= '<td>';
        $view .=$res["coment"];
        $view .='</td>';

        $view .= '<td>';
        $view .=$res["img"];
        $view .='</td>';

        $view .= '<td>';
        $view .=$res["input_date"];
        $view .='</td>';

        $view .= '</tr>'.PHP_EOL; 
    }
}


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script>
        $(function(){
    
    let url = "https://api.gnavi.co.jp/RestSearchAPI/v3/"
    let keyid = "?keyid=553cec70ca77acd582dc6f2d3ee017aa"
    let address =  ""
    $("#submit").on("click",  () => {
        address = $("#pref").val()
        $.getJSON( `${url}${keyid}&address=${address}`, function(result) {
            showResult( result )
        })
    });

    const showResult = result => {
        $("#table").append(`<tr><th>店舗名</th><th>営業時間</th><th>電話番号</th><th>サイトURL</th></tr>`)
        result.rest.map( item => {
        $("#table").append(`<tr><td>${item.name}</td><td>${item.opentime}</td><td>${item.tel}</td><td><a href="${item.url}">リンク</a></td></tr>`)
        })
    }

});
    </script>
    <link href = "css/style.css" rel = "stylesheet" />
    <title>home</title>
</head>
<body id="allpage">
<h1 class="title3">Home</h1>
    <div class="homeform">

        <h2 class="subtitle">TIME LINE</h2>
        <table class="timeline">
            <tr>
                <td>name</td>
                <td>comment</td>
                <td>img</td>
                <td>date</td>
            </tr>

                <?php
                    echo $view;
                ?>
        </table>

        <p class="after"><a href="file_chek.html">投稿</a></p>
        <p id="sub">
            <h2 class="subtitle">　店舗検索</h2>
            <br>
            <div class="Kensaku">
                <input type="text" id="pref" placeholder="場所を入力"><input type="button" id="submit" value="送信">
                <table id="table" border="1">
                </table>
            </div>    
        </p>
    </div>

  <p class="after2">
      ログアウトは<a href="logout.php">こちらへ</a>
  </p>
  <script src="js/bootstrap.min.js"></script>
</body>
</html>