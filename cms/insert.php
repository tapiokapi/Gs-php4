<?php
  // 関数の読み込み
  require_once("../funcs.php");

  // var_dump($_POST["item"]);
  // var_dump($_POST["value"]);
  // var_dump($_POST["description"]);
  // var_dump($_FILES["fname"]["name"]);

  // 1.入力チェック
  //商品名：item
  if(!isset($_POST["item"]) || $_POST["item"] == "") {
    exit("ParameError! item");
  } 

  //金額：value
  if(!isset($_POST["value"]) || $_POST["value"] == "") {
    exit("ParameError! value");
  } 
  //商品紹介文：description
  if(!isset($_POST["description"]) || $_POST["description"] == "") {
    exit("ParameError! description");
  } 
  
  //ファイル：fname
  if(!isset($_FILES["fname"]["name"]) || $_FILES["fname"]["name"] == "") {
    exit("ParameError! files");
  } 


  // 2. POSTデータ取得
  $fname = $_FILES["fname"]["name"];  //File名
  $item = $_POST["item"];  //商品名
  $value = $_POST["value"];  //価格（数字）
  $description = $_POST["description"];  //商品紹介文

  // 1-2. FileUpload処理
  $upload = "../img/"; //画像アップロードフォルダへのパス
  // アップロードした画像を../img/へ移動させる
  if(move_uploaded_file($_FILES['fname']['tmp_name'], $upload.$fname)) {
    // FIleUpload:OK
  } else {
    // FileUpload:NG
    echo "Upload failed";
    echo $_FILES['fname']['error'];
  }

  // 3. DB接続
  $pdo = DBconnect();

  // 4. データ登録SQL作成
  $stmt = $pdo->prepare("INSERT INTO ec_table2(
                          id, 
                          item, 
                          value, 
                          fname, 
                          description, 
                          indate)
                        VALUES(
                          NULL, 
                          :item, 
                          :value, 
                          :fname, 
                          :description, 
                          sysdate())"
                        );
  $stmt->bindValue(':item', $item, PDO::PARAM_STR);
  $stmt->bindValue(':value', $value, PDO::PARAM_INT);
  $stmt->bindValue(':fname', $fname, PDO::PARAM_STR);
  $stmt->bindValue(':description', $description, PDO::PARAM_STR);
  $status = $stmt->execute();

  // 5. データ登録処理後
  if($status==false) {
    // SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
    $error = $stmt->errorInfo();
    exit("QueryError:".$error[2]);
  } else {
    // item.phpへリダイレクト
    header("Location: item.php");
    exit;
  }
?>