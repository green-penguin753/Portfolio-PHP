<?php
/** 
 * 本課題は九九の掛け算表を表示するために81までの数字を順番に表示するプログラムです。
 * 以下のように九九の掛け算表を整然と表示させてください。
 * また素数には赤色を付けて出力させてください。
 */
// **1**2**3**4**5**6**7**8**9
// **2**4**6**8*10*12*14*16*18
// **3**6**9*12*15*18*21*24*27
// **4**8*12*16*20*24*28*32*36
// **5*10*15*20*25*30*35*40*45
// **6*12*18*24*30*36*42*48*54
// **7*14*21*28*35*42*49*56*63
// **8*16*24*32*40*48*56*64*72
// **9*18*27*36*45*54*63*72*81

function multiplication()
{
  for ($i = 1; $i <= 9; $i++) {
    for ($j = 1; $j <= 9; $j++) {
      $product = $i * $j;
      if ($product <= 9) {
        echo "*";
      }
        echo "*";
      if (primeNumber($product)) {
        echo '<font color="red">' . $product . '</font>';
      } else {
        echo $product;
      }
    }
    echo '<br>';
  }
}

function primeNumber($product)
{
  if ($product == 1) {
    return false;
  }
  for ($i = 2; $i < $product; $i++) {
    if ($product % $i == 0) {
      return false;
    }
  }
  return true;
}
?>

<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <title>九九計算表の表示プログラム</title>
  </head>
  <body>
    <section>
      <?php
      multiplication();
      ?>
    </section>
  </body>
</html>