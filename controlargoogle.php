<?php
/*
  require 'autentificacion.php';
  require 'Model/mainfunction.php';  
  
  $usuari =  $google_account_info->name;
  $email = $google_account_info->email = $email;


if (comprovarEmail($email)){
  echo "L'email ja està registrat";
} elseif(comprovarNom($usuari)){
  echo "El nom ja està registrat";
}else{
  insertar_usuari_Oauth2($usuari, $email);
  $_SESSION['usuari'] = $usuari;
  header('Location: Controlador/index.logat.php');
}
*/

require 'autentificacion.php';
require 'Model/mainfunction.php'; 
try {
  $adapter->authenticate();
  $userProfile = $adapter->getUserProfile();
  $usuari = $userProfile->lastName;
  $email = $userProfile->email;
if (comprovarEmail($email)){
  echo "L'email ja està registrat";
  session_destroy();
} elseif(comprovarNom($usuari)){
  echo "El nom ja està registrat";
  session_destroy();
}else{
  insertar_usuari_Oauth2($usuari, $email);
  $_SESSION['usuari'] = $usuari;
  header('Location: Controlador/index.logat.php');
}
}catch(Exception $e) {
  echo "Error: " . $e->getMessage();

}





?>