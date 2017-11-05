<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" herf"css/main.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>div{padding: 10px;font-size: 16px;}</style>
    <title>ログイン画面</title>
</head>
<body>

<!--Head[Start]-->
   <header>
    <nav class="navbar navbar-default">
       <div class="container-fluid">
          <div class="navbar-header">
           <a class="navbar-brand" href="select.php">ログイン</a>
           </div>
       </div>
    </nav>
</header>
<!--Head[End]-->


<!--Main[Start]-->
<form method="post" action="login_act.php">
    <div class="jumbotron">
        <fieldset>
            <legend>フリーアンケート</legend>
            <label>ID：<input type="text" name="lid" ></label><br>
            <lavel>PW：<input type="text" name="lpw" ></lavel><br>
            <input type="submit" value="ログイン">
        </fieldset>
    </div>
</form>
<!--Main[End]-->


</body>
</html>