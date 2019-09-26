<!doctype html>
<html>
<head>
   <meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />
   <title>Ваше сообщение успешно отправлено</title>
</head>

<body>

<?php
$back = "<p><a href=\"javascript: history.back()\">Вернуться назад</a></p>";

$connection = mysqli_connect('127.0.0.1','admin','123','fb_db');
      if($connection == false)
      {
          echo "error! <br>";
          echo mysqli_connect_error();
          exit;
      }


if (!empty($_POST['familia']) and !empty($_POST['name']) and !empty($_POST['patronymic']) and !empty($_POST['email'])
    and !empty($_POST['mes'])) {
    $familia = trim(strip_tags($_POST['familia']));
    $name = trim(strip_tags($_POST['name']));
    $patronymic = trim(strip_tags($_POST['patronymic']));
    $email = trim(strip_tags($_POST['email']));
    $mes = trim(strip_tags($_POST['mes']));

    mail('kunutok@gmail.com', 'Письмо с fedback.github.io',
        'Вам написал: ' . $familia . $name . $patronymic . '<br />Его почта: ' . $email . '<br />
      Его сообщение: ' . $mes, "Content-type:text/html;charset=windows-1251");
      
    mysqli_query($connection,"INSERT INTO `fb` (`familiya`, `Name`, `patronymic`, `email`, `message`) VALUES ('$familia', '$name', '$patronymic', '$email', '$mes')");

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