<?php

function DBconnect() {
  try {
    $db_name = "gs_php1";    //データベース名
    $db_id   = "root";      //アカウント名
    $db_pw   = "root";      //パスワード：XAMPPはパスワード無しに修正してください。
    $db_host = "localhost"; //DBホスト
    $pdo = new PDO('mysql:dbname=' . $db_name . ';charset=utf8;host=' . $db_host, $db_id, $db_pw);
    return $pdo;
  } catch (PDOException $e) {
    exit('DbConnectError:'.$e->getMessage());
  }
}
?>