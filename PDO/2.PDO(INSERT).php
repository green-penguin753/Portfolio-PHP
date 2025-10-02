<?php
// ここではPHPを使いレコードを作成します。

// 以下に1.phpで作成したテーブルにレコードを追加するコードを追加してください。
// 値は型等の条件を守る範囲で自由に登録して構いません。


try {
    $dsn = 'mysql:host=mysql;dbname=neelab;charset=utf8';
    $db = new PDO($dsn, 'neelabuser', 'p4ssw0rd');


    $db->beginTransaction();

    $sql = 'INSERT INTO users(
    name, password, created_at
    )VALUES(
    ?, ?, ?
    )';

    $stmt = $db->prepare($sql);

    $stmt->bindValue(1, '山田太郎');
    $stmt->bindValue(2, 'VukpCm0v');
    $stmt->bindValue(3, date("Y-m-d H:i:s"));

    $stmt->execute();
    $db->commit();

    echo "sql実行成功<br>";
} catch (PDOException $e) {
    $db->rollBack();
    echo $e->getMessage();
    exit;
}

$db = null;
