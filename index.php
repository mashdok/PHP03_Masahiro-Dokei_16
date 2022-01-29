<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>使用者登録</title>
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
                <div class="navbar-header"><a class="navbar-brand" href="select.php">使用者一覧</a></div>
            </div>
        </nav>
    </header>


    <form method="POST" action="insert.php">
        <div class="jumbotron">
            <fieldset>
                <legend>使用者登録</legend>
                <label>名前：<input type="text" name="name"></label><br>
                <label>ID：<input type="text" name="lid"></label><br>
                <label>PW：<input type="text" name="pw"></label><br>
                <label>管理者：<input type="checkbox" name="admin[]" value=1 checked ></label><br>
                <input type="submit" value="送信">
            </fieldset>
        </div>
    </form>
</body>

</html>