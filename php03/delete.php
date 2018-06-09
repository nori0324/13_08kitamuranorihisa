<?php
// GETデータ取得
$id    = $_GET["id"];

//2. DB接続します(エラー処理追加)
include("functions.php");
$pdo = db_conn();

//３．データ登録SQL作成
$stmt = $pdo->prepare("DELETE FROM gs_an_table WHERE id=:id");
$stmt->bindValue(':id', $id);
$status = $stmt->execute();

//４．データ登録処理後
if($status==false){
  errorMsg($stmt);
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
}else{


  //５．index.phpへリダイレクト
  header("Location: select.php");
  exit;
}
?>
