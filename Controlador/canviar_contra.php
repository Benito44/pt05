<?php
require '../Model/mainfunction.php';
session_start();


$contra = "";
$contra2 = "";
if (isset($_POST["contra"])) $contra = $_POST["contra"];
if (isset($_POST["contra2"])) {$contra2 = $_POST["contra2"];
}
$error = "";
$email = $_SESSION['email'];
$usuari = encontrarPorEmail($email);
if ($contra != $contra2) {
    $error = "Les contrasenyes no són iguals.";
    include '../Vista/recuperar_vista.php';
} elseif ($contra == null) {
    $error = "Les contrasenyes han de contenir alguna dada.";
    include '../Vista/recuperar_vista.php';
}  else {
    try {
        $connexio_real = connexio();
        error_reporting(0);
        $contra = password_hash($contra, PASSWORD_BCRYPT);
        $usuari = $_SESSION['usuari'];
        $statement = $connexio_real->prepare("UPDATE usuaris SET contrasenya = ? WHERE usuari = ?");
       $statement->bindParam(1, $contra);
        $statement->bindParam(2, $usuari);

        $error = "Insertat correctament";
        $statement->execute();
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    include 'index.logat.php';
}
?>