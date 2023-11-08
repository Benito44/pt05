<?php
session_start();
require '../Model/mainfunction.php';
include  '../Vista/login.vista.php';
if(isset($_POST['usuari']))$usuari = $_POST['usuari'];
if(isset($_POST['contra']))$contra = $_POST['contra'];

$connexio_real = connexio();
$error = "";
$intents = 0;
$statement = $connexio_real->prepare("SELECT intents FROM usuaris WHERE usuari = ?");
$statement->bindParam(1, $usuari);
$statement->execute();
while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
  $intents = $row["intents"];
}
$statement = $connexio_real->prepare("SELECT * FROM usuaris WHERE usuari = ?");
$statement->bindParam(1, $usuari);
$statement->execute();
while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
    if ($usuari != $row["usuari"] || !isset($_POST['usuari']) || (!password_verify($contra, $row["contrasenya"]))) {
        $error = "No s'ha posat l'usuari o la contrasenya correctament";
        $intents = $intents + 1; 
        $connexio_real = connexio();
        $statement = $connexio_real->prepare("UPDATE usuaris SET intents = ? WHERE usuari = ?");
        $statement->bindParam(1, $intents);
        $statement->bindParam(2, $usuari);
        $statement->execute();
    } if ($intents > 2) {
      $statement = $connexio_real->prepare("UPDATE usuaris SET intents = 0 WHERE usuari = ?");
        $statement->bindParam(1, $usuari);
        $statement->execute();
        header('Location: ../Vista/captcha.php');
    } else if ($usuari == $row["usuari"] && (password_verify($contra, $row["contrasenya"]))) {
        $_SESSION['usuari'] = $usuari;
        $_SESSION['contra'] = $contra;
        $statement = $connexio_real->prepare("UPDATE usuaris SET intents = 0 WHERE usuari = ?");
        $statement->bindParam(1, $usuari);
        $statement->execute();
        header('Location: index.logat.php');
    }
}
?>