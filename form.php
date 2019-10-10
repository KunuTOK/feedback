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

if (!empty($_POST['familia']) and !empty($_POST['name']) and !empty($_POST['patronymic']) and !empty($_POST['email'])
    and !empty($_POST['message'])) {
    $familia = trim(strip_tags($_POST['familia']));
    $name = trim(strip_tags($_POST['name']));
    $patronymic = trim(strip_tags($_POST['patronymic']));
    $email = trim(strip_tags($_POST['email']));
    $message = trim(strip_tags($_POST['message']));

    if(isset($_POST['email']) && $_POST['email'] != ''){
        $email2 = $_POST['email'];
        $email1 = mysqli_real_escape_string($connection,$email2);
        if(!filter_var($email1, FILTER_VALIDATE_EMAIL)){
          echo 'invalid';
        }else{
          $sql = "SELECT * FROM fb WHERE email='$email2'";
          $result1 = mysqli_query($connection,$sql);
          if(mysqli_num_rows($result1) == 1){
            die ("Сообщение с почтой  $emails уже отправлено <Br> $back");
          }
        }
      }

    mail('kunutok@gmail.com', 'Письмо с fedback.github.io',
        'Вам написал: ' . $familia . $name . $patronymic . '<br />Его почта: ' . $email . '<br />
  Его сообщение: ' . $message, "Content-type:text/html, charset=utf-8");
 
    mysqli_query($connection, "INSERT INTO `fb` (`familiya`, `name`, `patronymic`, `email`, `message`) VALUES ('$familia', '$name', '$patronymic', '$email', '$message')");
        echo " Сообщение отправлено. Спасибо <Br> $back";
        exit;
} else {
    echo "Для отправки сообщения заполните все поля! $back";
    exit;
}
?>
</body>
</html>