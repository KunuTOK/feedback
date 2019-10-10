<!doctype html>
<html>
<head>
   <meta http-equiv="Content-Type" content="text/html"; charset="utf-8"/>
   <title>Ваше сообщение успешно отправлено</title>
</head>
<body>
<?php
$back = "<p><a href=\"javascript: history.back()\">Вернуться назад</a></p>";
$connection = mysqli_connect('127.0.0.1', 'admin', '123', 'fb_db');

if ($connection == false) {
    echo "error! <br>";
    echo mysqli_connect_error();
    exit;
}

if (isset($_COOKIE[‘FormSubmitted’]))
{
die("Вы может отправить форму только один раз за сессию!");
}

if (!empty($_POST['familia']) and !empty($_POST['name']) and !empty($_POST['patronymic']) and !empty($_POST['email'])
    and !empty($_POST['message'])) {
    $familia = trim(strip_tags($_POST['familia']));
    $name = trim(strip_tags($_POST['name']));
    $patronymic = trim(strip_tags($_POST['patronymic']));
    $email = trim(strip_tags($_POST['email']));
    $message = trim(strip_tags($_POST['message']));

    mail('kunutok@gmail.com', 'Письмо с fedback.github.io',
        'Вам написал: ' . $familia . $name . $patronymic . '<br />Его почта: ' . $email . '<br />
  Его сообщение: ' . $message, "Content-type:text/html, charset=utf-8");

  setcookie(‘FormSubmitted’, $email);
 
    mysqli_query($connection, "INSERT INTO `fb` (`familiya`, `name`, `patronymic`, `email`, `message`) VALUES ('$familia', '$name', '$patronymic', '$email', '$message')");

    $result = mysqli_affected_rows($connection);
    if ($result > 0) {
        echo " Сообщение отправлено. Спасибо <Br> $back";
        exit;
    } else {
        echo "письмо с почтой  $email уже отправлено <Br> $back";
 }
} else {
    echo "Для отправки сообщения заполните все поля! $back";
    exit;
}
?>
</body>
</html>