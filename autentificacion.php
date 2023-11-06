<?php
/*
  require 'configuracion.php';
  require 'Model/mainfunction.php';  
  
session_start();
// authenticate code from Google OAuth Flow
if (isset($_GET['code'])) {
  $connexio_real = connexio();

if ($connexio_real) {
  $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
  $client->setAccessToken($token['access_token']);
  
  // get profile info
  $google_oauth = new Google\Service\Oauth2($client);
  $google_account_info = $google_oauth->userinfo->get();
  $email =  $google_account_info->email;
  $name =  $google_account_info->name;
 //esto a otro fichero XD
  // now you can use this profile info to create account in your website and make user logged in.
$connexio_real = connexio();
$statement = $connexio_real->prepare("INSERT INTO usuaris (usuari, email) VALUES (?,?)");
$statement->bindParam(1,$name);
$statement->bindParam(2,$email);
$_SESSION['usuari'] = $name;
$error =  "Insertat correctament";
    $statement->execute();

} else {
    // Muestra un mensaje de error o registra el error
    echo "Error en la conexión a la base de datos.";
}

}
*/


require 'configuracion.php';
 
try {
    $adapter->authenticate();
    $userProfile = $adapter->getUserProfile();
    print_r($userProfile);
    //echo '<a href="logout.php">Logout</a>';
}
catch( Exception $e ){
    echo $e->getMessage() ;
}


?>