<?php

session_start();
require_once('funcs.php');

// 1.DB接続する
$pdo = DBconnect();

// 2.データ抽出SQL作成
$stmt = $pdo->prepare("SELECT * FROM ec_table2");
$status = $stmt->execute();

// 3.データ表示
$view = "";
if($status == false) {
  // execute (SQL実行時にエラーがある場合)
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);
} else {
  // Selectデータの数だけ自動でループしてくれる
  while($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $view .= '<li class="products-item">';
    $view .= '<a href="item.php?id='.$result["id"].'">';
    $view .= '<p class="products-thumb"><img src="./img/'.$result["fname"].'"width="200"></p>';
    $view .= '<h3 class="products-title">'.$result["item"].'</h3>';
    $view .= '<p class="products-price">'.$result["value"].'</p>';
    $view .= '</a>';
    $view .= '</li>';
  }
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
  <!-- ヘッダー -->
  <header>
    <p><a href="../index.php">tapiokapi' shop</a></p>
  </header>

  <!-- 商品リスト -->
  <ul class="products-list">
    <?php echo $view; ?>
  </ul>

  <div class="navbar-header"><a class="navbar-brand" href="login.php">ログイン</a></div>

  <div class="navbar-header"><a class="navbar-brand" href="logout.php">ログアウト</a></div>

</body>
</html>