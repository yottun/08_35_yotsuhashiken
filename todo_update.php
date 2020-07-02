<?php

// 送信データのチェック
// var_dump($_POST);
// exit();

// 関数ファイルの読み込み
include('functions.php');

// 送信データ受け取り
$id = $_POST['id'];
$months = $_POST['months'];
$floorName = $_POST['floorName'];
$UG = $_POST['UG'];
$unit = $_POST['unit'];
$PB = $_POST['PB'];
$place = $_POST['place'];
$prefectures = $_POST['prefectures'];
$age = $_POST['age'];
$customers = $_POST['customers'];
$price = $_POST['price'];
$volume = $_POST['volume'];



// DB接続
$pdo = connect_to_db();

// UPDATE文を作成&実行
$sql = "UPDATE kadai_table SET months=:months, floorName=:floorName, UG=:UG, unit=:unit, PB=:PB, place=:place, prefectures=:prefectures, age=:age, customers=:customers, price=:price, volume=:volume WHERE id=:id";

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':months', $todo, PDO::PARAM_STR);
$stmt->bindValue(':floorName', $deadline, PDO::PARAM_STR);
$stmt->bindValue(':UG', $deadline, PDO::PARAM_STR);
$stmt->bindValue(':unit', $deadline, PDO::PARAM_STR);
$stmt->bindValue(':PB', $deadline, PDO::PARAM_STR);
$stmt->bindValue(':place', $deadline, PDO::PARAM_STR);
$stmt->bindValue(':prefectures', $deadline, PDO::PARAM_STR);
$stmt->bindValue(':age', $deadline, PDO::PARAM_STR);
$stmt->bindValue(':customers', $deadline, PDO::PARAM_STR);
$stmt->bindValue(':price', $deadline, PDO::PARAM_STR);
$stmt->bindValue(':volume', $deadline, PDO::PARAM_STR);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();





// データ登録処理後
if ($status == false) {
    // SQL実行に失敗した場合はここでエラーを出力し，以降の処理を中止する
    $error = $stmt->errorInfo();
    echo json_encode(["error_msg" => "{$error[2]}"]);
    exit();
} else {
    // 正常にSQLが実行された場合は一覧ページファイルに移動し，一覧ページの処理を実行する
    header("Location:todo_read.php");
    exit();
}
