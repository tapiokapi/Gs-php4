<?php
// 最初にSESSIONを開始!! ここ大事!!
session_start();
// POST値を受け取る
$lid = $_POST['lid'];
$lpw = $_POST['lpw'];

// 1. DB接続
require_once("funcs.php");
$pdo = DBconnect();

// 2. データ登録SQL作成
// ec_user_tableに、IDとPWがあるか確認する。
$stmt = $pdo->prepare('SELECT * FROM ec_user_table WHERE lid = :lid AND lpw = :lpw ;');
$stmt->bindValue(':lid', $lid, PDO::PARAM_STR);
$stmt->bindValue(':lpw', $lpw, PDO::PARAM_STR);
$status = $stmt->execute();

// 3. SQL実行時にエラーがある場合STOP
if ($status = false) {
  sql_error($stmt);
}

// 4. 抽出データ数を取得
$val = $stmt->fetch();

// 5. 該当レコードがあればSESSIONに値を代入
if ($val["id"] != "" && $val['kanri_flg'] == 0) {
  // Login成功時(一般ユーザー)
  $_SESSION["chk_ssid"] = session_id();
  $_SESSION["kanri_flg"] = $val['kanri_flg'];
  $_SESSION["name"] = $val['name'];
  header('Location: index.php');
} elseif ($val["id"] != "" && $val['kanri_flg'] == 1) {
  // Login成功時(管理者ユーザー)
  $_SESSION["chk_ssid"] = session_id();
  $_SESSION["kanri_flg"] = $val['kanri_flg'];
  $_SESSION["name"] = $val['name'];
  header('Location: ./cms/item.php');
} else {
  // Login失敗時（Logout経由）
  header('Location: login.php');
}
exit();

?>