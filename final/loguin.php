<?php
try {
    $pdo = new PDO('mysql:dbname=final_db;charset=utf8;host=localhost','root','root');
} catch (PDOException $e) {
    exit('DB_ConnectError:'.$e->getMessage()); //DB接続：Error表示
}

?>