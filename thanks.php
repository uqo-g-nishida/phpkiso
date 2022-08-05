<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Thanks</title>
</head>
<body>

<?php
$nickname=$_POST['nickname'];
$email=$_POST['email'];
$goiken=$_POST['goiken'];

try {
    // DB接続
    $dsn = 'mysql:dbname=phpkiso;host=localhost';
    $user = 'root';
    $password = '';
    $dbh = new PDO($dsn, $user, $password);
    $dbh->query('SET NAMES utf8');

    echo "
    $nickname 様<br>
    ご意見ありがとうございました。<br>
    いただいたご意見「$goiken 」<br>
    $email 宛てにメールを送りましたのでご確認ください。
    ";

    $mail_sub='アンケートを受け付けました。';
    $mail_body="$nickname 様へ¥nアンケートご協力ありがとうございました。";
    $mail_body=html_entity_decode($mail_body, ENT_QUOTES, "UTF-8");
    $mail_head='From: xxx@xxx.co.jp';
    mb_language('Japanese');
    mb_internal_encoding("UTF-8");
    mb_send_mail($email, $mail_sub, $mail_body, $mail_head);

    // DBに自動保存
    $sql = 'INSERT INTO anketo (nickname,email,goiken) VALUES ("'.$nickname.'","'.$email.'","'.$goiken.'")';
    $stmt = $dbh->prepare($sql);
    $stmt->execute();

    $dbh = null;
} catch (Exception $e) {
    echo 'ただいま障害により大変ご迷惑をおかけしております。';
}

?>

</body>
</html>
