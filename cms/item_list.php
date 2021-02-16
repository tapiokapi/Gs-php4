<?php
require_once('../funcs.php');

// 1. DB接続
$pdo = DBconnect();

// 2. データ抽出SQL作成
$stmt = $pdo->prepare("SELECT * FROM ec_table2");
$status = $stmt->execute();

// 3. データ表示
$view="";
if ($status==false) {
  // execute (SQL実行時にエラーがある場合)
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);
} else {
  // selectデータの数だけ自動でループしてくれる
  while($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
    // .=でその変数に付け加えていく。上書きされない。
    $view .= '<li class="cart-list">';
    $view .= '<p class="cart-thumb"><img src="../img/'.$result["fname"].'" width="200"></p>';
    $view .= '<h2 class="cart-title">'.$result["item"].'</h2>';
    $view .= '<p class="cart-price">'.$result["value"].'</p>';
    $view .= '<a href="#" class="btn-delete">削除</a>';
    $view .= '</li>';
  }
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="../css/reset.css">
  <link rel="stylesheet" href="../css/style.css">
</head>
<body class="cms">
  <!-- header -->
  <header>
    <p class="site-title">Tapiokapi's Shop</p>
  </header>
  <!-- end header -->

  <div class="outer">
    <h1 class="page-title page-title__cms">管理画面</h1>
    <div class="wrapper wrapper-main flex-parent">
      <main class="wrapper-main">
        <ul class="cart-products">
          <?php echo $view; ?>
        </ul>
      </main>
    </div>
  </div>

  <!-- footer -->
  <footer>
    <div class="wrapper wrapper-footer">
      <div class="footer-widget__long">
        <p></p>
      </div>
    </div>
  </footer>

</body>
</html>