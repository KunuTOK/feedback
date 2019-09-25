<!doctype html>
<html>
<head>
   <meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />
   <title>Ваше сообщение успешно отправлено</title>
</head>

<body>

<?php
$back = "<p><a href=\"javascript: history.back()\">Вернуться назад</a></p>";

if (!empty($_POST['a']) and !empty($_POST['b']) and !empty($_POST['c']) and !empty($_POST['d'])
    and !empty($_POST['e'])) {
    $a = trim(strip_tags($_POST['a']));
    $b = trim(strip_tags($_POST['b']));
    $c = trim(strip_tags($_POST['c']));
    $d = trim(strip_tags($_POST['d']));
    $e = trim(strip_tags($_POST['e']));

    mail('kunutok@gmail.com', 'Письмо с адрес_вашего_сайта',
        'Вам написал: ' . $a . $b . $c . '<br />Его почта: ' . $d . '<br />
      Его сообщение: ' . $e, "Content-type:text/html;charset=windows-1251");

    echo "Ваше сообщение успешно отправлено!<Br> Вы получите ответ в
      ближайшее время<Br> $back";

    exit;
} else {
    echo "Для отправки сообщения заполните все поля! $back";
    exit;
}
?>
</body>
</html>