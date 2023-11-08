<html>
	<head>
		<title>Google Recapcha</title>
		<link rel="stylesheet" type="text/css" href="../formulari.css">
		<script src='https://www.google.com/recaptcha/api.js'></script>
	</head>
	<body>	
		<form id="form" action="../Controlador/captcha_C.php" method="POST">
			Usuario: <input type="text" name="name">
			<br><br>
			Password: <input type="password" name="password">
			<br><br>
			<div class="g-recaptcha" data-sitekey="6LeKeOwoAAAAAEP57kqfuOWs_CMLujLt4GMov3zd"></div>
			<a href="../Controlador/index.php">Torna</a>
        <span class="error">
		<?php if(!isset($error)){
		$error;
	        }else{echo $error;}?>
		</span> 
			<br>
			<input type="submit" name="login" value="Login">
		</form>
	</body>
</html>

