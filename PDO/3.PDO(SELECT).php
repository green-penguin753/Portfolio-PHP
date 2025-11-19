<?php
// ここではPHPを使いデータベースにテーブルを作成します。

// 以下に2.phpで作成したレコードを取得し、配列化させて
// var_dumpを用いて画面に出力するコードを作成してください。

try {
  $dsn = 'mysql:host=mysql;dbname=neelab;charset=utf8';
  $db = new PDO($dsn, 'neelabuser', 'p4ssw0rd');
  $sql = 'SELECT * FROM users';
  $stmt = $db->prepare($sql);
  $stmt->execute();
  $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
  var_dump($rows);
  echo "sql実行成功<br>";
} catch (PDOException $e) {
  echo $e->getMessage();
  exit;
}
$db = null;
