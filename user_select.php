<?php

//1.DB接続します
try{
    $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','');
}catch (PDOException $e){
    exit('データベースに接続できませんでした。'.$e->getMessage());
}


//2.データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_user_table");
$status = $stmt->execute();


//3.データ表示
$view = "";
if($status==false){
    //execute(SQL実行時)にエラーがある場合
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);//配列index[2]にエラーコメントあり

}else{
    //Selectデータの数だけ自動でループしてくれる
  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
      //GETデータ送信リンク作成
      //$view .='<p>';
      //$view .= $result["indate"]."-".$result["id"]."-".$result["name"];
      //$view .='</p>';

      $view .='<p>';
      $view .='<a href="user_view.php?id='.$result["id"].'">';
      $view .=$result["indate"]." : ".$result["name"];
      $view .='</a>';
      $view .='</p>';
      
      $view .='<p>';
      $view .='<a href="user_delete.php?id='.$result["id"].'">';
      $view .='[削除]';
      $view .='</a>';
      $view .='</p>';
  }
}
//$Viewを表示したい場所でechoしましょう！

?>


   
   
   
    <!DOCTYPE html>
    <html lang="ja">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>ユーザー一覧</title>
        <link rel="stylesheet" href="css/range.css">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <style>
            div {
                padding: 10px;
                font-size: 16px;
            }

        </style>
    </head>

    <body id="main">
        <!--Head[Start]-->
        <header>
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <div class="navbar-header">
                        ユーザー一覧
                    </div>
                </div>
            </nav>
        </header>
        <!--Head[End]-->

        <!--Main[Start]-->
        <div>
            <div class="container jumbotron">
                <?= $view ?>
            </div>
        </div>
        <!--Main[End]-->
        
                <a href="user_index.php">ユーザー登録へ</a>

    </body>

    </html>
