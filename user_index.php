<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>会員登録</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>div{padding: 10px;font-size: 16px;}</style>
</head>
<body>
    
    <!--Main[Start]-->
    <form method="post" action="user_insert.php">
        <div class="jumbotron">
            <fieldset>
                <legend>会員登録</legend>
                <label>名前：<input type="text" name="name"></label><br>
                <label>ID：<input type="text" name="lid"></label><br>
                <label>PW：<input type="text" name="lpw"></label><br>
                <input type="submit" value="送信">
            </fieldset>
        </div>
    </form>
    <!--Main[End]-->
        <a href="user_select.php">ユーザー一覧へ</a>
    
    
</body>
</html>