<?php
require '../Model/mainfunction.php';
session_start();
$token = bin2hex(random_bytes(16)); // Genera un token aleatorio
$expiration = time() + 4 * 3600;
$connexio = connexio();
$email = $_POST['email'];
$_SESSION['email'] = $email;
$usuari = encontrarPorEmail($email);
$insertat_token = insertar_token($token, $email, $expiration);
$text = 'Hola '. $usuari . '<br>' . 'Per restablir la teva contrasenya només clica al següent link: ' . 
'http://localhost/Backend/UF2/pt05/Controlador/canviar_contra.php?token=' . $insertat_token . '&usuari=' . $usuari;

phphmailer($usuari, $email, $text);
$error = "";
$error = "Emal enviat";
include '../Vista/login.vista.php';

?>