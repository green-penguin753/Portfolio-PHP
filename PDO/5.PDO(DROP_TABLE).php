<?php
// ここではPHPを使いデータベースに作成したテーブルを削除します。

// 以下に1.phpで作成したテーブルを削除するコードを作成してください。

try {
    $dsn = 'mysql:host=mysql;dbname=neelab;charset=utf8';
    $db = new PDO($dsn, 'neelabuser', 'p4ssw0rd');

    $sql = 'DROP TABLE IF EXISTS users';

    $stmt = $db->prepare($sql);

    $stmt->execute();


    echo "sql実行成功<br>";
} catch (PDOException $e) {
    echo $e->getMessage();
    exit;
}

$db = null;
