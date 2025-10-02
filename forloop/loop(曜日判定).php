<?php

// 2005年/12/25はクリスマスの日曜日です。
// 2000年から2100年までの12/25が日曜日になるかを判定する
// プログラミングを作成してください。
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <title>日曜日のクリスマス判定</title>
</head>

<body>

    <?php
    for ($year = 2000; $year <= 2100; $year++) {

        $date = $year . "-12-25";

        $weekday = date('w', strtotime($date));

        if ($weekday == 0) {
            echo $year . "年のクリスマスは日曜日です。<br>";
        } else {
            echo $year . "年<br>";
        }
    }
    ?>

</body>

</html>