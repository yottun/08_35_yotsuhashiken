<?php
// 送信データのチェック
// var_dump($_GET);
// exit();

// 関数ファイルの読み込み
include('functions.php');

// idの受け取り
$id = $_GET['id'];

// DB接続
$pdo = connect_to_db();

// データ取得SQL作成
$sql = 'SELECT * FROM kadai_table WHERE id=:id';

// SQL準備&実行
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();


// データ登録処理後
if ($status == false) {
    // SQL実行に失敗した場合はここでエラーを出力し，以降の処理を中止する
    $error = $stmt->errorInfo();
    echo json_encode(["error_msg" => "{$error[2]}"]);
    exit();
} else {
    // 正常にSQLが実行された場合は指定の11レコードを取得
    // fetch()関数でSQLで取得したレコードを取得できる
    $record = $stmt->fetch(PDO::FETCH_ASSOC);
}

?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>売上集計（編集画面）</title>
</head>

<body>
    <form action="todo_update.php" method="POST">
        <fieldset>
            <legend>売上集計（編集画面）</legend>
            <a href="todo_read.php">一覧画面</a>

            <fieldset>
                <legend>変更前</legend>
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
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?= $record["months"] ?></td>
                            <td><?= $record["floorName"] ?></td>
                            <td><?= $record["UG"] ?></td>
                            <td><?= $record["unit"] ?></td>
                            <td><?= $record["PB"] ?></td>
                            <td><?= $record["place"] ?></td>
                            <td><?= $record["prefectures"] ?></td>
                            <td><?= $record["age"] ?></td>
                            <td><?= $record["customers"] ?></td>
                            <td><?= $record["price"] ?></td>
                            <td><?= $record["volume"] ?></td>
                        </tr>
                    </tbody>
                </table>
            </fieldset>
            <div>年月:
                <select name="months" id="">
                    <option value="">選択してください</option>
                    <option value="2020年1月">2020年1月</option>
                    <option value="2020年2月">2020年2月</option>
                    <option value="2020年3月">2020年3月</option>
                    <option value="2020年4月">2020年4月</option>
                    <option value="2020年5月">2020年5月</option>
                    <option value="2020年6月">2020年6月</option>
                </select>
            </div>
            <div>フロア:
                <select name="floorName" id="">
                    <option value="">選択してください</option>
                    <option value="３Ｆ">３Ｆ</option>
                    <option value="４Ｆ">４Ｆ</option>
                    <option value="５Ｆ">５Ｆ</option>
                </select>
            </div>
            <div>ユニットグループ:
                <select name="UG" id="">
                    <option value="">選択してください</option>
                    <option value="アダルトエレガンス">アダルトエレガンス</option>
                    <option value="アダルトカジュアル">アダルトカジュアル</option>
                    <option value="シスターズ">シスターズ</option>
                </select>
            </div>
            <div>ユニット:
                <select name="unit" id="">
                    <option value="">選択してください</option>
                    <optgroup label="アダルトエレガンス">
                        <option value="アクアスキュータム">アクアスキュータム</option>
                        <option value="アドーア">アドーア</option>
                        <option value="アマカ">アマカ</option>
                    <optgroup label="アダルトカジュアル">
                        <option value="アニエスｂ">アニエスｂ</option>
                        <option value="デプレ">デプレ</option>
                        <option value="ブルックスブラザーズ">ブルックスブラザーズ</option>
                    <optgroup label="シスターズ">
                        <option value="ココディール">ココディール</option>
                        <option value="アプワイザーリッシェ">アプワイザーリッシェ</option>
                        <option value="ウィルセレクション">ウィルセレクション</option>
                </select>
            </div>
            <div>PB区分:
                <select name="PB" id="">
                    <option value="">選択してください</option>
                    <option value="ﾌﾟﾛﾊﾟｰＰ">ﾌﾟﾛﾊﾟｰＰ</option>
                    <option value="ﾌﾟﾛﾊﾟｰＢ">ﾌﾟﾛﾊﾟｰＢ</option>
                </select>
            </div>
            <div>販売場所:
                <select name="place" id="">
                    <option value="">選択してください</option>
                    <option value="プロパー">プロパー</option>
                    <option value="催事">催事</option>
                    <option value="従業員販売">従業員販売</option>
                </select>
            </div>
            <div>出身地:
                <select name="prefectures" id="">
                    <option value="">選択してください</option>
                    <optgroup label="九州地方">
                        <option value="福岡県">福岡県</option>
                        <option value="佐賀県">佐賀県</option>
                        <option value="長崎県">長崎県</option>
                        <option value="大分県">大分県</option>
                        <option value="熊本県">熊本県</option>
                        <option value="宮崎県">宮崎県</option>
                        <option value="鹿児島県">鹿児島県</option>
                    <optgroup label="沖縄地方">
                        <option value="沖縄">沖縄</option>
                </select>
            </div>
            <div>年齢区分:
                <select name="age" id="">
                    <option value="">選択してください</option>
                    <option value="-19">-19</option>
                    <option value="20-24">20-24</option>
                    <option value="25-29">25-29</option>
                    <option value="30-34">30-34</option>
                    <option value="35-39">35-39</option>
                    <option value="40-44">40-44</option>
                    <option value="45-49">45-49</option>
                    <option value="50-54">50-54</option>
                    <option value="55-59">55-59</option>
                    <option value="60-64">60-64</option>
                    <option value="65-69">65-69</option>
                    <option value="70-">70-</option>
                </select>
            </div>
            <div>
                客数: <input type="text" name="customers">
            </div>
            <div>
                金額: <input type="text" name="price">
            </div>
            <div>
                個数: <input type="text" name="volume">
            </div>
            <div>
                <button>submit</button>
                <input type="hidden" name="id" value="<?= $record["id"] ?>">
            </div>

        </fieldset>
    </form>

</body>

</html>