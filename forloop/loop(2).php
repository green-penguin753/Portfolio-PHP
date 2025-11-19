<?php
// for文を用いて以下を作成してください。
// 112
// 212
// 312

for($i = 1; $i <= 3; $i++) {
  echo $i;
  for($j = 1; $j <= 2; $j++) {
    echo $j;
  }
  echo '<br>';
}
