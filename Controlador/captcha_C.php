
<?php 
		$captcha = $_POST['g-recaptcha-response'];
		$secret = '6LeKeOwoAAAAAEMJivYnwkEK84-orLl-twgUDgM1';
		$response = "";
		$error = "";
		$arr = json_decode($response, FALSE);
		if(!$captcha){

			$error = "Por favor verifica el captcha";
			include '../Vista/captcha.php';
			
			} else {
			
			$response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$captcha");
			
			$arr = json_decode($response, TRUE);
			
			if($arr['success'])
			{
				header('Location: login.php'); // Redirigeix a l'usuari a la página de'nicio
			} else {
				echo '<h3>Error al comprobar Captcha </h3>';
			}
		}



    ?>
    