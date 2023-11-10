<?php

session_start();
/*
  require 'autentificacion.php';
  require 'Model/mainfunction.php';  
  
  $usuari =  $google_account_info->name;
  $email = $google_account_info->email = $email;


if (comprovarEmail($email)){
  echo "L'email ja està registrat";
  $_SESSION['usuari'] = encontrarPorEmail($email);
  header('Location: Controlador/index.logat.php');
} elseif (comprovarEmail($email)){
  echo "L'email ja està registrat";
  $_SESSION['usuari'] = encontrarPorEmail($email);
  header('Location: Controlador/index.logat.php');
}
else{
  insertar_usuari_Oauth2($usuari, $email);
  $_SESSION['usuari'] = $usuari;
  header('Location: Controlador/index.logat.php');
}
*/

require 'Model/mainfunction.php'; 


  $error = "";
  if(!isset($_SESSION['email'])){
    
    $_SESSION['email'] = $email;
  }
  $email = $_SESSION['email'];
  







?>