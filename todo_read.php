<?php
// DB接続の設定
// DB名は`gsacf_x00_00`にする
$dbn = 'mysql:dbname=gsacf_d06_35;charset=utf8;port=3306;host=localhost';
$user = 'root';
$pwd = '';

try {
  // ここでDB接続処理を実行する
  $pdo = new PDO($dbn, $user, $pwd);
} catch (PDOException $e) {
  // DB接続に失敗した場合はここでエラーを出力し，以降の処理を中止する
  echo json_encode(["db error" => "{$e->getMessage()}"]);
  exit('dbError:' . $e->getMessage());
}

// データ取得SQL作成
// $sql = 'SELECT * FROM kadai_table ';
$sql = 'SELECT `prefectures`, SUM(`customers`) as average FROM `kadai_table` GROUP BY `prefectures` ORDER BY average DESC';

// SQL準備&実行
$stmt = $pdo->prepare($sql);
$status = $stmt->execute();


// データ登録処理後
$view = '';
if ($status == false) {
  // SQL実行に失敗した場合はここでエラーを出力し，以降の処理を中止する
  $error = $stmt->errorInfo();
  exit('sqlError:' . $error[2]);
} else {
  // 正常にSQLが実行された場合は入力ページファイルに移動し，入力ページの処理を実行する
  // fetchAll()関数でSQLで取得したレコードを配列で取得できる
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);  // データの出力用変数（初期値は空文字）を設定
  // $result = $stmt->fetchAll(PDO::FETCH_ASSOC);  // データの出力用変数（初期値は空文字）を設定
  $output = "";
  // <tr><td>deadline</td><td>todo</td><tr>の形になるようにforeachで順番に$outputへデータを追加
  // `.=`は後ろに文字列を追加する，の意味
  foreach ($result as $record) {
    $output .= "<tr>";
    $output .= "<td>{$record["prefectures"]}</td>";
    $output .= "<td>{$record["average"]}</td>";
    $output .= "</tr>";
  }
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>売上集計（一覧画面）</title>
  <link rel="stylesheet" type="text/css" href="css/style.css" />
  <script src="js/jquery-3.5.1.min.js"></script>
  <script type="text/javascript" src="js/style.js"></script>
  <script type="text/javascript" src="js/jquery.japan-map.min.js"></script>
  <script>
    $(function() {
      // var areas = [{

      var areas = [{
          code: 1,
          name: "北海道",
          color: "#7f7eda",
          hoverColor: "#b3b2ee",
          prefectures: [1]
        },
        {
          code: 2,
          name: "青森",
          color: "#759ef4",
          hoverColor: "#98b9ff",
          prefectures: [2]
        },
        {
          code: 3,
          name: "岩手",
          color: "#759ef4",
          hoverColor: "#98b9ff",
          prefectures: [3]
        },
        {
          code: 4,
          name: "宮城",
          color: "#759ef4",
          hoverColor: "#98b9ff",
          prefectures: [4]
        },
        {
          code: 5,
          name: "秋田",
          color: "#759ef4",
          hoverColor: "#98b9ff",
          prefectures: [5]
        },
        {
          code: 6,
          name: "山形",
          color: "#759ef4",
          hoverColor: "#98b9ff",
          prefectures: [6]
        },
        {
          code: 7,
          name: "福島",
          color: "#759ef4",
          hoverColor: "#98b9ff",
          prefectures: [7]
        },
        {
          code: 8,
          name: "茨城",
          color: "#7ecfea",
          hoverColor: "#b7e5f4",
          prefectures: [8]
        },
        {
          code: 9,
          name: "栃木",
          color: "#7ecfea",
          hoverColor: "#b7e5f4",
          prefectures: [9]
        },
        {
          code: 10,
          name: "群馬",
          color: "#7ecfea",
          hoverColor: "#b7e5f4",
          prefectures: [10]
        },
        {
          code: 11,
          name: "埼玉",
          color: "#7ecfea",
          hoverColor: "#b7e5f4",
          prefectures: [11]
        },
        {
          code: 12,
          name: "千葉",
          color: "#7ecfea",
          hoverColor: "#b7e5f4",
          prefectures: [12]
        },
        {
          code: 13,
          name: "東京",
          color: "#7ecfea",
          hoverColor: "#b7e5f4",
          prefectures: [13]
        },
        {
          code: 14,
          name: "神奈川",
          color: "#7ecfea",
          hoverColor: "#b7e5f4",
          prefectures: [14]
        },
        {
          code: 15,
          name: "新潟",
          color: "#7cdc92",
          hoverColor: "#aceebb",
          prefectures: [15]
        },
        {
          code: 16,
          name: "富山",
          color: "#7cdc92",
          hoverColor: "#aceebb",
          prefectures: [16]
        },
        {
          code: 17,
          name: "石川",
          color: "#7cdc92",
          hoverColor: "#aceebb",
          prefectures: [17]
        },
        {
          code: 18,
          name: "福井",
          color: "#7cdc92",
          hoverColor: "#aceebb",
          prefectures: [18]
        },
        {
          code: 19,
          name: "山梨",
          color: "#7cdc92",
          hoverColor: "#aceebb",
          prefectures: [19]
        },
        {
          code: 20,
          name: "長野",
          color: "#7cdc92",
          hoverColor: "#aceebb",
          prefectures: [20]
        },
        {
          code: 21,
          name: "岐阜",
          color: "#7cdc92",
          hoverColor: "#aceebb",
          prefectures: [21]
        },
        {
          code: 22,
          name: "静岡",
          color: "#7cdc92",
          hoverColor: "#aceebb",
          prefectures: [22]
        },
        {
          code: 23,
          name: "愛知",
          color: "#7cdc92",
          hoverColor: "#aceebb",
          prefectures: [23]
        },
        {
          code: 24,
          name: "三重",
          color: "#ffe966",
          hoverColor: "#fff19c",
          prefectures: [24]
        },
        {
          code: 25,
          name: "滋賀",
          color: "#ffe966",
          hoverColor: "#fff19c",
          prefectures: [25]
        },
        {
          code: 26,
          name: "京都",
          color: "#ffe966",
          hoverColor: "#fff19c",
          prefectures: [26]
        },
        {
          code: 27,
          name: "大阪",
          color: "#ffe966",
          hoverColor: "#fff19c",
          prefectures: [27]
        },
        {
          code: 28,
          name: "兵庫",
          color: "#ffe966",
          hoverColor: "#fff19c",
          prefectures: [28]
        },
        {
          code: 29,
          name: "奈良",
          color: "#ffe966",
          hoverColor: "#fff19c",
          prefectures: [29]
        },
        {
          code: 30,
          name: "和歌山",
          color: "#ffe966",
          hoverColor: "#fff19c",
          prefectures: [30]
        },
        {
          code: 31,
          name: "鳥取",
          color: "#ffcc66",
          hoverColor: "#ffe0a3",
          prefectures: [31]
        },
        {
          code: 32,
          name: "島根",
          color: "#ffcc66",
          hoverColor: "#ffe0a3",
          prefectures: [32]
        },
        {
          code: 33,
          name: "岡山",
          color: "#ffcc66",
          hoverColor: "#ffe0a3",
          prefectures: [33]
        },
        {
          code: 34,
          name: "広島",
          color: "#ffcc66",
          hoverColor: "#ffe0a3",
          prefectures: [34]
        },
        {
          code: 35,
          name: "山口",
          color: "#ffcc66",
          hoverColor: "#ffe0a3",
          prefectures: [35]
        },
        {
          code: 36,
          name: "徳島",
          color: "#fb9466",
          hoverColor: "#ffbb9c",
          prefectures: [36]
        },
        {
          code: 37,
          name: "香川",
          color: "#fb9466",
          hoverColor: "#ffbb9c",
          prefectures: [37]
        },
        {
          code: 38,
          name: "愛媛",
          color: "#fb9466",
          hoverColor: "#ffbb9c",
          prefectures: [38]
        },
        {
          code: 39,
          name: "高知",
          color: "#fb9466",
          hoverColor: "#ffbb9c",
          prefectures: [39]
        },
        {
          code: 40,
          name: "福岡",
          color: "#ff9999",
          hoverColor: "#ffbdbd",
          prefectures: [40]
        },
        {
          code: 41,
          name: "佐賀",
          color: "#ff9999",
          hoverColor: "#ffbdbd",
          prefectures: [41]
        },
        {
          code: 42,
          name: "長崎",
          color: "#ff9999",
          hoverColor: "#ffbdbd",
          prefectures: [42]
        },
        {
          code: 43,
          name: "熊本",
          color: "#ff9999",
          hoverColor: "#ffbdbd",
          prefectures: [43]
        },
        {
          code: 44,
          name: "大分",
          color: "#ff9999",
          hoverColor: "#ffbdbd",
          prefectures: [44]
        },
        {
          code: 45,
          name: "宮崎",
          color: "#ff9999",
          hoverColor: "#ffbdbd",
          prefectures: [45]
        },
        {
          code: 46,
          name: "鹿児島",
          color: "#ff9999",
          hoverColor: "#ffbdbd",
          prefectures: [46]
        },
        {
          code: 47,
          name: "沖縄",
          color: "#eb98ff",
          hoverColor: "#f5c9ff",
          prefectures: [47]
        },
      ];

      $("#map-container").japanMap({
        width: 800,
        selection: "area",
        areas: areas,
        // backgroundColor : "#f2fcff",
        // hoverColor: "red",
        borderLineColor: "#f2fcff",
        borderLineWidth: 0.25,
        lineColor: "#a0a0a0",
        lineWidth: 1,
        drawsBoxLine: true,
        showsPrefectureName: true,
        prefectureNameType: "short",
        movesIslands: true,
        fontSize: 11,
        onSelect: function(data) {
          alert(data.name);
        }
      });
    });
  </script>
</head>

<body>
  <div class="main">
    <fieldset>
      <legend>売上集計（一覧画面）</legend>
      <a href="todo_input.php">一覧画面</a>
      <table>
        <thead>
          <tr>
            <th>都道府県</th>
            <th>合計客数</th>
          </tr>
        </thead>
        <tbody>
          <!-- ここに<tr><td>deadline</td><td>todo</td><tr>の形でデータが入る -->
          <?= $output ?>
        </tbody>
      </table>
    </fieldset>
    <div id="map-container"></div>
  </div>
  <style>
    body {
      max-width: 1600px;
      margin: 0 auto;
    }

    .main {
      display: flex;
    }
    #map-container{
      margin-top: 100px;
    }
  </style>

</body>

</html>