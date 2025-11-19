<?php
/* 
 * 引数で与えられた 元金、年数、年利率 を元に 支払総額、全月分の月ごとの支払額 を
 * 出力するプログラムを作成せよ(返済法は分割返済とする)。
 * 
 * 条件1
 *   1年ごとに 元金 に 年利率 をかけた金額を 利息 として算出し、元金 と 利息 の合計を
 *   1円単位に四捨五入した金額 を 翌年の元金 とする(複利法)
 * 条件2
 *   最終的な元金と利息の合計を 年数 × 12ヶ月 で割り、1円単位に四捨五入した金額 を 月ごとの支払額 とする
 *   月ごとの支払額 を 年数 × 12ヶ月 でかけた金額を 支払総額 とする
 * 条件3
 *   利息額の計算は、元金×利率×借入期間となるが、分割返済の場合には、この元金は毎回の返済によって減ってく
 */

// 元金(円)
$principal = 1000000;
// 年数(年)
$year = 1;
// 初期年利率(%)
$rate = 1;

function pays()
{
  global $principal;
  global $year;
  global $rate;
  $month = $year * 12;
  $monthlyPayment = round($principal / $month);
  for ($i = 0; $i < $month; $i++) {
    $interestExpense = round($principal * ($rate / 100 / 12));
    $principal -= $monthlyPayment;
    $monthlyPrincipal = $monthlyPayment + $interestExpense;
    $pays[] = $monthlyPrincipal;
  }
  return $pays;
}
?>

<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <title>借金返済プログラム</title>
  </head>
  <body>
    <section>
      <?php
        $i = 0;
        $sum = 0;
        foreach (pays() as $pay) {
          echo ++$i . "か月目の支払金額：" . $pay . "円<br>";
            $sum += $pay;
        }
        echo "支払総額：" . $sum . "円";
      ?>
    </section>
  </body>
</html>