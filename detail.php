<?php

$lid = $_GET['lid'];

// DBに接続
require_once('funcs.php');
$pdo = db_conn();

//２．データ登録SQL作成
$stmt = $pdo->prepare('SELECT * FROM php03_table WHERE lid = :lid');
$stmt->bindValue(':lid', $lid, PDO::PARAM_INT);
$status = $stmt->execute();

//３．データ表示
$view = '';
if ($status === false) {
    // ここを修正
    sql_error($stmt);
} else {
    //データが取得できたら。
    $view = $stmt->fetch();
}

?>



<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>編集</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
        div {
            padding: 10px;
            font-size: 16px;
        }
    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header"><a class="navbar-brand" href="select.php">データ一覧</a></div>
            </div>
        </nav>
    </header>

    <!-- method, action, 各inputのnameを確認してください。  -->
    <form method="POST" action="update.php">
        <div class="jumbotron">
            <fieldset>
            <legend>編集</legend>
                <label>名前：<input type="text" name="name" value=<?= $view['name'] ?>></label><br>
                <label>ID：<input type="text" name="lid" value=<?= $view['lid'] ?>></label><br>
                <label>PW：<input type="text" name="pw" value=<?= $view['pw'] ?>></label><br>
                <label>管理者：<input type="checkbox" name="admin" checked value=<?= $view['admin'] ?>></label><br>
                <input type="hidden" name="lid" value=<?= $view['lid'] ?>><br>
                <input type="submit" value="送信">
            </fieldset>
        </div>
    </form>
</body>

</html>