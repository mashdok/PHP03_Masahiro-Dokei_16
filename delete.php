
<!-- データを削除する -->

<?php

require_once('funcs.php');
$lid = $_GET['lid'];

//2. DB接続します
$pdo = db_conn();

//３．データ登録SQL作成
$stmt = $pdo->prepare('DELETE FROM php03_table WHERE lid = :lid');
$stmt->bindValue(':lid', $lid, PDO::PARAM_INT);
$status = $stmt->execute(); //実行

//４．データ登録処理後
if ($status === false) {
    sql_error($stmt);
} else {
    redirect('select.php');
}

?>
