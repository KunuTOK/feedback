<?php 
  $db = mysqli_connect('127.0.0.1', 'admin', '123', 'fb_db');
  $back = "<p><a href=\"javascript: history.back()\">Вернуться назад</a></p>";
  $home = "<p><a href=\"register.php\">Вернуться домой</a></p>";

  if ($db == false) {
    echo "error! <br>";
    echo mysqli_connect_error();
    exit;
	}

    if (isset($_POST['email_check'])) {
      $email = $_POST['email'];
      $sql = "SELECT * FROM fb WHERE email='$email'";
      $results = mysqli_query($db, $sql);
      if (mysqli_num_rows($results) > 0) {
        echo "taken";	
      }else{
        echo 'not_taken';
      }
      exit;
	}
	
if (!empty($_POST['username']) and !empty($_POST['email']) and !empty($_POST['message'])) {
	$username = trim(strip_tags($_POST['username']));
	$email = trim(strip_tags($_POST['email']));
	$message = trim(strip_tags($_POST['message']));
  	  
  mail('kunutok@gmail.com', 'Письмо с fedback.github.io',
  'Вам написал: ' . $username, '<br />Его почта: ' . $email . '<br/>
Его сообщение: ' . $message, "Content-type:text/html, charset=utf-8");

mysqli_query($db, "INSERT INTO `fb` (`username`, `email`, `message`) VALUES ('$username', '$email', '$message');");
  echo " Сообщение отправлено. Спасибо <Br> $home";
  	exit;
} else {
    echo "Для отправки сообщения заполните все поля! $back";
  	exit;
}
?>
