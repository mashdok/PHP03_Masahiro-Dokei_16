<?php


require_once('funcs.php');
//1. POSTデータ取得
$name   = $_POST['name'];
$lid  = $_POST['lid'];
$pw    = $_POST['pw'];
$admin = $_POST['admin'];
$id = $_POST['id'];

//2. DB接続します
$pdo = db_conn();

//３．データ登録SQL作成
$stmt = $pdo->prepare('UPDATE php03_table SET name = :name, lid = :lid, pw = :pw, admin = :admin WHERE lid = :lid;');

// 数値の場合 PDO::PARAM_INT
// 文字の場合 PDO::PARAM_STR
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':lid', $lid, PDO::PARAM_STR);
$stmt->bindValue(':pw', $pw, PDO::PARAM_INT);
$stmt->bindValue(':admin', $admin, PDO::PARAM_STR);
// $stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute(); //実行

//４．データ登録処理後
if ($status === false) {
    sql_error($stmt);
} else {
    redirect('select.php');
}