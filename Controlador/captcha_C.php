
<?php 
include '../Vista/captcha.html';
/*
	define('CLAVE', '6LfDTuwoAAAAABep0Dz6seWrh23CYhfJqJ7cYU5g');
	
	$token = $_POST['token'];
	$action = $_POST['action'];
	
	$cu = curl_init();
	curl_setopt($cu, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
	curl_setopt($cu, CURLOPT_POST, 1);
	curl_setopt($cu, CURLOPT_POSTFIELDS, http_build_query(array('secret' => CLAVE, 'response' => $token)));
	curl_setopt($cu, CURLOPT_RETURNTRANSFER, true);
	$response = curl_exec($cu);
	curl_close($cu);
	
	$datos = json_decode($response, true);
	
	//print_r($datos);
	
	if($datos['success'] == 1 && $datos['score'] >= 0.5){
		if($datos['action'] == 'validarUsuario'){
			echo "perfecto";
		}
		
		} else {
		echo "ERES UN ROBOT";
	}	*/
		
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
    