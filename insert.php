
<!-- データ登録 -->

<?php

require_once('funcs.php');

//1. POSTデータ取得
$name   = $_POST['name'];
$lid  = $_POST['lid'];
$pw    = $_POST['pw'];
$admin = $_POST['admin'];


//2. DB接続
$pdo = db_conn();


//３．データ登録SQL作成
$stmt = $pdo->prepare("INSERT INTO php03_table(name,lid,pw,admin)VALUES(:name,:lid,:pw,:admin)");


$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':lid', $lid, PDO::PARAM_STR);
$stmt->bindValue(':pw', $pw, PDO::PARAM_STR);
$stmt->bindValue(':admin', $admin, PDO::PARAM_INT);
$status = $stmt->execute(); //実行



//４．データ登録処理後
if ($status === false) {
    sql_error($stmt);
} else {
    redirect('index.php');
}