<?php
// DB接続の設定
session_start();
include("functions.php");
check_session_id();
// DB接続
$pdo = connect_to_db();

// データ取得SQL作成
$sql = 'SELECT * FROM kadai_table WHERE months LIKE "%' . $_POST["months"] . '%" AND floorName LIKE "%' . $_POST["floorName"] . '%" AND UG LIKE "%' . $_POST["UG"] . '%" AND unit LIKE "%' . $_POST["unit"] . '%" AND PB LIKE "%' . $_POST["PB"] . '%" AND place LIKE "%' . $_POST["place"] . '%" AND prefectures LIKE "%' . $_POST["prefectures"] . '%" AND age LIKE "%' . $_POST["age"] . '%" AND customers LIKE "%' . $_POST["customers"] . '%" AND price LIKE "%' . $_POST["price"] . '%" AND volume LIKE "%' . $_POST["volume"] . '%"';
// $sql = 'SELECT * FROM kadai_table WHERE months LIKE "%' . $_POST["months"] . '%" AND floorName LIKE "%' . $_POST["floorName"] . '%"';
// var_dump($sql);
// exit();
// SQL準備&実行
$stmt = $pdo->prepare($sql);
$status = $stmt->execute();

// データ登録処理後
$view = "";

if ($status == false) {
  // SQL実行に失敗した場合はここでエラーを出力し，以降の処理を中止する
  $error = $stmt->errorInfo();
  exit("sqlError:" . $error[2]);
} else {
  // 正常にSQLが実行された場合は入力ページファイルに移動し，入力ページの処理を実行する
  // fetchAll()関数でSQLで取得したレコードを配列で取得できる
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);  // データの出力用変数（初期値は空文字）を設定
  $output = "";
  // <tr><td>deadline</td><td>todo</td><tr>の形になるようにforeachで順番に$outputへデータを追加
  // `.=`は後ろに文字列を追加する，の意味
  foreach ($result as $record) {
    $output .= "<tr>";
    $output .= "<td>{$record["months"]}</td>";
    $output .= "<td>{$record["floorName"]}</td>";
    $output .= "<td>{$record["UG"]}</td>";
    $output .= "<td>{$record["unit"]}</td>";
    $output .= "<td>{$record["PB"]}</td>";
    $output .= "<td>{$record["place"]}</td>";
    $output .= "<td>{$record["prefectures"]}</td>";
    $output .= "<td>{$record["age"]}</td>";
    $output .= "<td>{$record["customers"]}</td>";
    $output .= "<td>{$record["price"]}</td>";
    $output .= "<td>{$record["volume"]}</td>";
    $output .= "<td><a href='todo_edit.php?id={$record["id"]}'>編集</a></td>";
    $output .= "<td><a href='todo_delete.php?id={$record["id"]}'>削除</a></td>";
    $output .= "</tr>";
  }
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>検索結果</title>
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <fieldset>
    <legend>検索結果</legend>
    <a href="index.php">入力画面</a>
    <table>
      <thead>
        <tr>
          <th>年月</th>
          <th>フロア</th>
          <th>ユニットグループ</th>
          <th>ユニット</th>
          <th>PB区分</th>
          <th>販売場所</th>
          <th>出身地</th>
          <th>年齢区分</th>
          <th>客数</th>
          <th>金額</th>
          <th>個数</th>
          <th>編集</th>
          <th>削除</th>
        </tr>
      </thead>
      <tbody>
        <?= $output ?>
      </tbody>
    </table>
  </fieldset>

  <style>
  </style>
</body>

</html>