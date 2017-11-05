<?php
//1.GETでid値を取得
$id = $_GET["id"];


//2.DB接続など
try{
    $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','');
}catch (PDOException $e){
    exit('データベースに接続できませんでした。'.$e->getMessage());
}


//3.SELECT * FROM gs_an_table WHERE id=:id;
$sql = "SELECT * FROM gs_user_table WHERE id=:id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();


//4.データ表示
$view="";
if($status==false){
    //execute(SQL実行時にエラーがある場合)
    $error = $stmt->errorInfo();
    exit("QueryError:".$error[2]);

}else{
  //1データのみ抽出の場合はwhileループで取り出さない
$row = $stmt->fetch();
}
?>





<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <title>データ更新</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>div{padding: 10px;font-size: 16px;}</style>
</head>
<body>

<!--Head[Start]-->
   <header>
    <nav class="navbar navbar-default">
       <div class="container-fluid">
           <div class="navbar-header"><a class="navbar-brand" href="user_select.php">ユーザー情報更新</a>
           </div>
       </div>
    </nav>
</header>
<!--Head[End]-->


<!--Main[Start]-->
<form method="post" action="update.php">
    <div class="jumbotron">
        <fieldset>
            <legend>ユーザー情報更新</legend>
            <label>名前：<input type="text" name="name" value="<?=$row["name"]?>"></label><br>
            <lavel>ID：<input type="text" name="lid" value="<?=$row["lid"]?>"></lavel>
            <br>
             <lavel>PW：<input type="text" name="lpw" value="<?=$row["lpw"]?>"></lavel><br>
            <input type="hidden" name="id" value="<?=$row["id"]?>">
            <input type="submit" value="送信">
        </fieldset>
    </div>
</form>
<!--Main[End]-->


</body>
</html>