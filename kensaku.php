<!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>一覧</title>
</head>
<body>

<?php
$code = $_POST['code'];

// DB接続
$dsn = 'mysql:dbname=phpkiso;host=localhost';
$user = 'root';
$password = '';
$dbh = new PDO($dsn, $user, $password);
$dbh->query('SET NAMES utf8');

$sql = 'SELECT * FROM anketo WHERE code=?';
$stmt = $dbh->prepare($sql);
$data[]=$code;
$stmt->execute($data);

while (1) {
    $rec = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($rec == false) {
        break;
    }
    echo "
                ${rec['code']}
                ${rec['nickname']}
                ${rec['email']}
                ${rec['goiken']}
                <br>
                ";
}

$dbh = null;
?>

<br>
<a href="menu.html">メニューに戻る</a>
</body>
</html>