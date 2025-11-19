<?php
/**
 * おつりを計算するプログラムを作成して頂きます。
 * 引数には支払金額であるpurchaseと購入金額のproductを使用します。
 * 計算内容は関数内に記述してください。
 * またテスト時には支払金額と購入金額を変えてみて計算が合うかも試してください。
 * 
 * 支払金額が10000円、購入金額が200円とした時、
 * 
 * 10000円札が0枚
 * 5000円札が1枚
 * 1000円札が4枚
 * 500円札が1枚
 * 100円札が3枚
 * 50円札が0枚
 * 10円札が0枚
 * 5円札が0枚
 * 1円札が0枚
 * 支払金額が100円、購入金額が200円とした時、
 * 100円不足
 */

// 支払金額
$purchase = 10000;
// 購入金額
$product = 200;

function calculation($purchase, $product) {
  if ($purchase < $product) {
    return $product - $purchase . '円不足';
  }
  if ($product <= $purchase) {
    $change = $purchase - $product;
    $money = [10000, 5000, 1000, 500, 100, 50, 10, 5, 1];
    $result = "";
    for ($i = 0; $i < count($money); $i++) {
      $result .= $money[$i] . '円札が' . floor(($change % ($i > 0 ? $money[$i - 1] : 1)) / $money[$i]) . "枚<br>";
    }
  }
  return $result;
}
?>

<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <title>お釣り計算プログラム</title>
  </head>
  <body>
    <section>
      <?php
      echo calculation($purchase, $product);
      ?>
    </section>
</body>

</html>