<?php
include_once '../Model/mainfunction.php';

/**
 * duplicatNOM
 * Agafem l'usuari de la taula d'usuaris
 * @param  mixed $data
 * @return void
 */
function duplicatNOM($data){
  $connexio_real = connexio();
  $statement = $connexio_real->prepare("SELECT usuari FROM usuaris WHERE usuari = '$data'");
  $statement->execute();
  $data_mostrada = "";
  while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
      $data_mostrada = $row["usuari"];
  }
  return $data_mostrada;
}    
/**
 * duplicatEMAIL
 * Agafem l'email de la taula d'usuaris
 * @param  mixed $data
 * @return void
 */
function duplicatEMAIL($data){
  $connexio_real = connexio();
  $statement = $connexio_real->prepare("SELECT email FROM usuaris WHERE email = '$data'");
  $statement->execute();
  $data_mostrada = "";
  while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
      $data_mostrada = $row["email"];
  }
  return $data_mostrada;
}   

$usuari = $_POST['usuari'];
$email = $_POST['email'];
$contra = $_POST['contra'];

$error = "";
// Mirem si l'email té el format diferent
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $error =   "Correu electrònic no es válido.";
    include '../Vista/registrar.vista.php';
    // Mirem si la contrasenya és igual a la verificaió de la contrasenya
    } elseif ($contra != $contra2 || $contra == null){
      $error =   "Les contrasenyes no són iguals/han de contenir alguna dada.";
      include '../Vista/registrar.vista.php';
      // Mirem si l'usuari i l'email està duplicat
          } else if(duplicatNOM($usuari) == $usuari || duplicatEMAIL($email) == $email){
        $error = "Valors duplicats";
        include '../Vista/registrar.vista.php';
      }
      else {
        try {
          $connexio_real = connexio();
          error_reporting(0);
          $contra = password_hash($contra, PASSWORD_BCRYPT);
          
          // Fem la secuencia per insertar l'usuari
          $statement = $connexio_real->prepare("INSERT INTO usuaris (usuari, email, contrasenya) VALUES (?,?,?)");
          $statement->bindParam(1,$usuari);
          $statement->bindParam(2,$email);
          $statement->bindParam(3,$contra);
          
          $error =  "Insertat correctament";
              $statement->execute();
          
          }catch (Exception $e) {
              echo "Error:" .  $e->getMessage();
          }
          include 'index.php';
      }






?>