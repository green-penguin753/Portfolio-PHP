<?php
// ここではPHPを使いデータベースにテーブルを作成します。

// 以下に2.phpで作成したレコードの内、
// 「name」を更新するコードを作成してください。
// 値は型等の条件を守る範囲で自由に更新して構いません。
// また3.phpで行った様に変更後のレコードを出力してください。

try {
  $dsn = 'mysql:host=mysql;dbname=neelab;charset=utf8';
  $db = new PDO($dsn, 'neelabuser', 'p4ssw0rd');
  $db->beginTransaction();
  $sql = 'UPDATE users SET name = :name WHERE id = :id';
  $id = 1;
  $name = '山田花子';
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':id', $id, PDO::PARAM_INT);
  $stmt->bindValue(':name', $name, PDO::PARAM_STR);
  $stmt->execute();
  $db->commit();
  $rows = $db->query("SELECT * FROM users");
  var_dump($rows->fetchALL(PDO::FETCH_ASSOC));
  echo "sql実行成功<br>";
} catch (PDOException $e) {
  $db->rollBack();
  echo $e->getMessage();
  exit;
}
$db = null;
