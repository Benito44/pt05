<?php
session_start();
require '../Model/mainfunction.php';
include  '../Vista/login.vista.php';
$error = "";
$intents = 0;
if (isset($_POST['usuari']) ||isset($_POST['contra']) ) {
  $usuari = $_POST['usuari'];
  $contra = $_POST['contra'];
  intents($usuari, $contra);
  }



?>