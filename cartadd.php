<?php
session_start();

// 1.入力チェック

// 商品名受信チェック
if(!isset($_POST["item"]) || $_POST["item"] == "") {
  exit("paramError:item");
}

// 金額受信チェック
if(!isset($_POST["value"]) || $_POST["value"]=="") {
  exit("ParamError:value");
}
// ID受信チェック
if(!isset($_POST["id"]) || $_POST["id"]=="") {
  exit("ParamError:id");
}
// 個数受信チェック
if(!isset($_POST["num"]) || $_POST["num"]=="" ) {
  exit("ParamError:num");
}
// ファイル名受信チェック
if(!isset($_POST["fname"]) || $_POST["fname"]=="" ) {
  exit("ParamError:fname");
}

// 2.POST値を変数に代入
$id = intval($_POST["id"]);
$item = $_POST["item"];
$value = intval($_POST["value"]);
$num = intval($_POST["num"]);
$fname = $_POST["fname"];

// 3.カートへ登録： array([0]=item,[1]=value,[2]=num,[3]=fname);
$_SESSION["cart"][$id] = array($item, $value, $num, $fname);

// 4. 次のページへ移動 cart.php
header("Location: cart.php");
exit;

?>