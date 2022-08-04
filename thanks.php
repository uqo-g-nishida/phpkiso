<body>

<?php
$nickname=$_POST['nickname'];
$email=$_POST['email'];
$goiken=$_POST['goiken'];

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

?>

</body>
