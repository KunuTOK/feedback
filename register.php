<?php?>
<html>
<head>
  <title>Register</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
 <form id="register_form" action=./process.php method="POST" charset="utf-8">
      <h1>Register</h1>     
	  <div>
		 <input type="text" name="username" placeholder="username" id="username">
		 <span></span>
	  </div>
	  <div>
		<input type="email" name="email" placeholder="Email" id="email">
		<span></span>
		  </div>
	  <div>
        <label for="name">Текст вопроса:</label><br>
		<textarea rows="10" cols="40" colomn="30" name="message" id="message"></textarea>
		</div>
		<div>
	 	<button type='sumbit' id="reg_btn">Register</button>
	  </div>
	</form>
</body>
</html>
	<!-- scripts -->
	<script src="jquery-3.4.1.min.js"></script>
	<script src="script.js"></script>