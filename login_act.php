<?php
session_start();
$lid = $_POST["lid"];
$lpw = $_POST["lpw"];


//1.接続します
try{
    $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','');
} catch (PDOException $e){
    exit('データベースに接続できませんでした。'.$e->getMessage());
}


//2.データ登録SQL作成
$sql = "SELECT * FROM gs_user_table WHERE lid=:lid AND lpw=:lpw";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':lid', $lid, PDO::PARAM_INT);
$stmt->bindValue(':lpw', $lpw, PDO::PARAM_INT);
$status = $stmt->execute();


//SQL実行時にエラーがある場合
if($status==false){
    $error = $stmt->errorInfo();
    exit("QueryError:".$error[2]);
}


//3.抽出データ数を取得
//$count = $stmt->fetchColumn(); //SELECT COUNT(*)で使用可能
$val = $stmt->fetch(); //1レコードだけ取得する方法


//4.該当レコードがあればSESSIONに値を代入
if($val["id"] !=""){
    $_SESSION["chk_ssid"] = session_id;
    $_SESSION["name"] = $val['name'];
    //$_SESSION["kanri_flg"] = $val['kanri_flg'];
    //Login処理OKの場合select.phpへ遷移
    header("Location: select.php");
}else{
    //Login処理NGの場合login.phpへ遷移
    header("Location: login.php");
}
//処理終了
exit();
?>