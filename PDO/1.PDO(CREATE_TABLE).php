<?php
// ここではPHPを使いデータベースにテーブルを作成します。

// 以下の条件に沿ったテーブルを作成するコードを作成してください。
// テーブル名: users
// カラム:
//     id
//         AUTO_INCREMENT
//         PRIMARY_KEY
//     name
//         VARCHAR(20)
//     password
//         VARCHAR(20)
//     created_at
//         DATETIME



try {
  $dsn = 'mysql:host=mysql;dbname=neelab;charset=utf8';
  $db = new PDO($dsn, 'neelabuser', 'p4ssw0rd');

  $sql = 'CREATE TABLE users (
            id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(20),
            password VARCHAR(20),
            created_at DATETIME
          ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4';

  $stmt = $db->prepare($sql);

  $stmt->execute();

  echo "sql実行成功<br>";
} catch (PDOException $e) {
  echo $e->getMessage();
  exit;
}

$db = null;
