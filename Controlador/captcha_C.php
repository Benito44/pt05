
<?php 
include '../Vista/captcha.html';

		
		$name = $_POST['name'];
		$password = $_POST['password'];
		$captcha = $_POST['g-recaptcha-response'];
		
		$secret = '6LeKeOwoAAAAAEMJivYnwkEK84-orLl-twgUDgM1';
		$arr = json_decode($response, FALSE);
		if(!$captcha){

			echo "Por favor verifica el captcha";
			
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
    