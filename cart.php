<?php
session_start();

// 1.SESSIONからカートを取得
// array([0]=item, [1]=value, [2]=num, [3]=fname);

$view = '';
// $_SESSION["cart"]のデータを取得
foreach($_SESSION["cart"] as $key => $value) {
  $view .= '<li class="cart-list">';
  $view .= '<p class="cart-thumb"><img src="./img/'.$value[3].'" width="200"></p>';
  $view .= '<h2 class="cart-title">'.$value[0].'</h2>';
  $view .= '<p class="cart-price">'.$value[1].'</p>';
  $view .= '<p class="cart-number">'.$value[2].'</p>';
  $view .= '<a href="cartremove.php?id='.$key.'" class="btn-delete">削除</a>';
  $view .= '</li>';
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <div class="outer">
    <h1 class="page-title">Cart</h1>
    <div class="wrapper wrapper-main flex-parent">
      <main class="wrapper-main">
        <ul class="label-list">
          <!-- <li class="label-item">商品写真</li>
          <li class="label-item">商品名</li>
          <li class="label-item">金額</li>
          <li class="label-item">数量</li>
          <li class="label-item">削除</li> -->
        </ul>
        <ul class="cart-products">
          <?php
            // 表示
            echo $view;
          ?>
        </ul>
        <ul class="btn-list">
          <li class="btn-item btn-buy"><a href="index.php">買い物を続ける</a></li>
          <li class="btn-item btn-calculate"><a onclick="alert('外部決済サイトに移動...');">注文手続きへ</a></li>
        </ul>
      </main>
    </div>
  </div>
</body>
</html>