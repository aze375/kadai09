<?php

//1.POSTでid,name,lid,lpwを取得
$id = $_POST["id"];
$name = $_POST["name"];
$lid = $_POST["lid"];
$lpw = $_POST["lpw"];


//2.DB接続
try{
    $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','');
}catch (PDOException $e){
    exit('データベースに接続できませんでした。'.$e->getMessage());
}


//3.UPDATE gs_an_table SET ....;で更新(bindValue)
$sql = 'UPDATE gs_user_table SET name=:name, lid=:lid, lpw=:lpw WHERE id=:id';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':lid', $lid, PDO::PARAM_STR);
$stmt->bindValue(':lpw', $lpw, PDO::PARAM_STR);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);        //更新したいidを渡す
$status = $stmt->execute();


//4.データ登録処理後
if($status==false){
    //SQL実行時にエラーがある場合（エラーオブジェクトを取得して表示）
    $error = $stmt->errorInfo();
    exit("QueryError:".$error[2]);

}else{
  //select.phpへリダイレクト
    header("Location: user_select.php");
    exit;
}

?>