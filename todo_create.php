<?php

// 送信確認
// var_dump($_POST);
// exit();

// 項目入力のチェック
// 値が存在しないor空で送信されてきた場合はNGにする
if (
  !isset($_POST['months']) || $_POST['months'] == '' ||
  !isset($_POST['floorName']) || $_POST['floorName'] == '' ||
  !isset($_POST['UG']) || $_POST['UG'] == '' ||
  !isset($_POST['unit']) || $_POST['unit'] == '' ||
  !isset($_POST['PB']) || $_POST['PB'] == '' ||
  !isset($_POST['place']) || $_POST['place'] == '' ||
  !isset($_POST['prefectures']) || $_POST['prefectures'] == '' ||
  !isset($_POST['age']) || $_POST['age'] == '' ||
  !isset($_POST['customers']) || $_POST['customers'] == '' ||
  !isset($_POST['price']) || $_POST['price'] == '' ||
  !isset($_POST['volume']) || $_POST['volume'] == ''
) {
  exit('ParamError');
}


// 受け取ったデータを変数に入れる
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


// DB接続の設定
session_start();
include("functions.php");
check_session_id();
// DB接続
$pdo = connect_to_db();

// データ登録SQL作成
// `created_at`と`updated_at`には実行時の`sysdate()`関数を用いて実行時の日時を入力する
$sql = 'INSERT INTO kadai_table(months, floorName, UG, unit, PB, place, prefectures, age, customers, price, volume)
        VALUES(:months, :floorName, :UG, :unit,  :PB, :place, :prefectures, :age, :customers, :price, :volume)';

// SQL準備&実行
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':months', $months, PDO::PARAM_STR);
$stmt->bindValue(':floorName', $floorName, PDO::PARAM_STR);
$stmt->bindValue(':UG', $UG, PDO::PARAM_STR);
$stmt->bindValue(':unit', $unit, PDO::PARAM_STR);
$stmt->bindValue(':PB', $PB, PDO::PARAM_STR);
$stmt->bindValue(':place', $place, PDO::PARAM_STR);
$stmt->bindValue(':prefectures', $prefectures, PDO::PARAM_STR);
$stmt->bindValue(':age', $age, PDO::PARAM_STR);
$stmt->bindValue(':customers', $customers, PDO::PARAM_STR);
$stmt->bindValue(':price', $price, PDO::PARAM_STR);
$stmt->bindValue(':volume', $volume, PDO::PARAM_STR);
$status = $stmt->execute();


// データ登録処理後
if ($status == false) {
  // SQL実行に失敗した場合はここでエラーを出力し，以降の処理を中止する
  $error = $stmt->errorInfo();
  exit('sqlError:' . $error[2]);
} else {
  // 正常にSQLが実行された場合は入力ページファイルに移動し，入力ページの処理を実行する
  header('Location:index.php');
}
