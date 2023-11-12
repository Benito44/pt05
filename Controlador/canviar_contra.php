<?php
require '../Model/mainfunction.php';
session_start();


$contra = "";
$contra2 = "";
if (isset($_POST["contra"])) $contra = $_POST["contra"];
if (isset($_POST["contra2"])) {$contra2 = $_POST["contra2"];}
$error = "";
$email = $_SESSION['email'];


$usuari = encontrarPorEmail($email);
$expiration = tempsPerEmail($email);

    if ($contra != $contra2) {
        $error = "Les contrasenyes no són iguals.";
        include '../Vista/recuperar_vista.php';
    } elseif ($contra == null) {
        $error = "Les contrasenyes han de contenir alguna dada.";
        include '../Vista/recuperar_vista.php';
    }  elseif (time() > $expiration) {
        // Token caducat
        $error =  "El token ha caducat. Si us plau, solicita un de nou tornant al login.";
        include '../Vista/recuperar_vista.php';
    }   else {
            try {
                $contra = password_hash($contra, PASSWORD_BCRYPT);
                $_SESSION['usuari'] = $usuari;
                actualitzarUsuari($contra, $usuari);
            } catch (Exception $e) {
                echo "Error: " . $e->getMessage();
            }
    header('Location: index.logat.php');
}
?>