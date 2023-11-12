<?php
session_start();
require '../Model/mainfunction.php';
include  '../Vista/login.vista.php';
$error = "";
$intents = 0;
// Sel·leccionem els intents de cada usuari, els modifiquem cada vegada que s'equivoquen i si els seus intents són més de dos sortirà el captcha per verificar
if (isset($_POST['usuari']) ||isset($_POST['contra']) ) {
  $usuari = $_POST['usuari'];
  $contra = $_POST['contra'];
  intents($usuari, $contra);
  }



?>