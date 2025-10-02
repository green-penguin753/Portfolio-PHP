<?php


/**
 * ポーカーの役を判定するプログラムを作成してください。
 * 配列$cardsには
 * suit=>絵柄(スペード、ハート、ダイアモンド、クラブ)、
 * number=>数字(1~13)となるようにカードが5枚格納されています。
 * 
 * ヒント
 * 手札を設定、ここは連想配列で設定
 * 不正チェック関数。手札に全く同じカードが有った場合は手札が不正ということを返す。
 * カードを並び替える。　ここで並び替える必要性については、後に役判定をするときに必要になる。
 */



// 手札の設定
$suits_order = ["spade", "heart", "diamond", "club"];
$cards = [];


cardsSet();
usort($cards, 'compare_cards');


function cardsSet() {
    global $suits_order;
    global $cards;
    $i = 1;
    $numbers = [];
    while ($i<=5):
        $numbers[] = rand(1, 13);
        $i++;
    endwhile;
    $cards = [];
    for ($i=0; $i<5; $i++){
        $cards[] = ['suit'=> $suits_order[array_rand($suits_order)], 
        'number' => $numbers[array_rand($numbers)]];
    }
}



//不正チェック関数
function check($cards) {
    $uniqueCards = array_unique($cards, SORT_REGULAR);
    if (count($cards) != count($uniqueCards)) {
        return true;
    }
    return false;
}

// カードの並び替えを行う。

function compare_cards($a, $b){
        global $suits_order;
        if ($a['number'] == $b['number']){
            if ($a['suit'] == $b['suit']){
                return 0;
            } else {
                return array_search($a['suit'], $suits_order) > array_search($b['suit'], $suits_order) ? 1 : -1;
            }
        } else {
            return $a['number'] > $b['number'] ? 1 : -1;
        }
}

//役判定

function check_cards($cards) {
    if(check($cards)){
        echo "不正";
    }elseif(
    $cards[0]['number'] === 1 &&
    $cards[1]['number'] === 10 &&
    $cards[2]['number'] === 11 &&
    $cards[3]['number'] === 12 &&
    $cards[4]['number'] === 13 &&
    p_flush($cards)){
        echo "ロイヤルストレートフラッシュ";

    }elseif(straight($cards) &&
    p_flush($cards)){
        echo "ストレートフラッシュ"; 

    }elseif(quads($cards)){
        echo "フォーカード";    

    }elseif(three_card($cards) && pair($cards)){
        echo "フルハウス"; 
    
    }elseif(p_flush($cards)){
        echo "フラッシュ";
    
    }elseif(straight($cards)){
        echo "ストレート";  
    
    }elseif(three_card($cards)){
        echo "スリーカード"; 

    }elseif(two_pair($cards)){
        echo "ツーペア";  
        
    }elseif(pair($cards)){
        echo "ワンペア";
    }else
        echo "ハイカード";
}

function straight($cards) {
    $straight = true;
    for($i=0; $i<4; $i++){
        if($cards[$i]['number']+1 !== $cards[$i+1]['number']){
            $straight = false;
        }
        if($cards[0]['number'] === 1 &&
        $cards[1]['number'] === 10 &&
        $cards[2]['number'] === 11 &&
        $cards[3]['number'] === 12 &&
        $cards[4]['number'] === 13){
            $straight = true;
        }
    }
    return $straight;
}

function p_flush($cards) {
    $p_flush = true;
    for($i=0; $i<4; $i++){
        if($cards[$i]['suit'] !== $cards[$i+1]['suit']){
            $p_flush = false;
        }
    }
    return $p_flush;
}

function quads($cards) {
    $num_counts = array_count_values(array_column($cards, 'number')); 
    foreach($num_counts as $count){  
        if($count === 4){
            return true;
        }
    }
    return false;
}

function three_card($cards) {
    $num_counts = array_count_values(array_column($cards, 'number'));     
    foreach($num_counts as $count){  
        if($count === 3){
            return true;
        }
    }
    return false;
}

function two_pair($cards) {
    $num_counts = array_count_values(array_column($cards, 'number')); 
    $pair_count = 0;
    foreach($num_counts as $count){  
        if($count === 2){
            $pair_count ++ ;
        }
        if($pair_count === 2){
        return true;
        }
    }
    return false;
}

function pair($cards) {
    $num_counts = array_count_values(array_column($cards, 'number')); 
    foreach($num_counts as $count){  
        if($count === 2){
            return true;
        }
    }
    return false;
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <title>ポーカー役判定プログラム</title>
</head>

<body>
    <section>
        <p>手札は<?php foreach ($cards as $card): ?><?= $card['suit'] . $card['number'] ?><?php endforeach; ?></p>
        <p><?= check_cards($cards) ?></p>
    </section>
</body>

</html>