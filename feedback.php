<?php?>
<html>
<head>
  <title>Feedback</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
 <form id="feedback_form" action=./process.php method="POST" charset="utf-8">
      <h1>Feedback</h1>     
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
	 	<button type='sumbit' id="reg_btn">to send</button>
	  </div>
	</form>
</body>
</html>
	<!-- scripts -->
	<script src="jquery-3.4.1.min.js"></script>
	<script src="script.js"></script>