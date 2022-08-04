<body>

<?php
$nickname = $_POST['nickname'];
$email = $_POST['email'];
$goiken = $_POST['goiken'];

$nickname = htmlspecialchars($nickname);
$email = htmlspecialchars($email);
$goiken = htmlspecialchars($goiken);

if($nickname == '') {
    echo 'ニックネームが入力されていません。';
} else {
    echo "ようこそ$nickname 様";
}

print '<br>';

if ($email == '') {
    echo 'E-Mailが入力されていません';
} else {
    echo "メールアドレス：$email";
}

print '<br>';

if ($goiken == '') {
    echo 'ご意見が入力されていません';
} else {
    echo "ご意見：$goiken";
}
?>

<br>

<form method="post" action="thanks.php">

    <input type="hidden" name="nickname" value="<?=$nickname?>">
    <input type="hidden" name="email" value="<?=$email?>">
    <input type="hidden" name="goiken" value="<?=$goiken?>">

    <input type="button" onclick="history.back()" value="戻る">
    <?php
        if ($nickname != '' || $email != '' || $goiken != '') {
            echo '<input type="submit" value="OK">';
        }
    ?>
</form>

</body>

