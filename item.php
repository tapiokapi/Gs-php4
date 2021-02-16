<?php
require_once("funcs.php");
session_start();

// GETでidを取得
if(!isset($_GET["id"]) || $_GET["id"]=="") {
  exit("ParamError!");
} else {
  $id = intval($_GET["id"]); //intval数値変換
}

// 1. DB接続
$pdo = DBconnect();

// 2.データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM ec_table2 WHERE id=:id");
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

// 3. データ表示
$view = "";
if($status == false) {
  // execute(SQL実行時にエラーがある場合)
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);
} else {
  // Selectデータの数だけ自動でループしてくれる
  $row = $stmt->fetch(); //1レコードだけ取得
  // $row["フィールド名"]で取得可能
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
  <form action="cartadd.php" method="POST">
    <main class="wrapper-main">
      <!-- 商品本情報 -->
      <p class="item-thumb"><img src="./img/<?=$row["fname"]?>" width="200"></p>
      <div class="flex-parent item-label">
        <h1 class="item-name"><?=$row["item"]?></h1>
        <p class="item-price"><?=$row["value"]?></p>
        <p><input type="number" value="1" name="num" class="cartin-number"></p>
      </div>

      <!-- カートボタン -->
      <div class="flex-parent item-label">
        <input type="submit" class="btn-cartin" value="カートに入れる">
      </div>

      <!-- 商品詳細情報 -->
      <div class="flex-parent item-label">
        <p class="item-text"><?=$row["description"]?></p>
      </div>
      <input type="hidden" name="item" value="<?=$row["item"]?>">
      <input type="hidden" name="value" value="<?=$row["value"]?>">
      <input type="hidden" name="id" value="<?=$row["id"]?>">
      <input type="hidden" name="fname" value="<?=$row["fname"]?>">
    </main>
  </form>
</body>
</html>