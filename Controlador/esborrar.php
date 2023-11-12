<?php 
// Benito Martinez Florido
session_start();
include_once '../Model/mainfunction.php';
include '../Vista/inserirvista.php';
$connexio = connexio();
try {
    $usuari = "";
    $usuari = $_SESSION['usuari'];
    $usuari_id = "";
    $usuari_id = usuari($usuari);
    error_reporting(0);
// Esborrar l'article on l'usuari indiqui el seu ID 
    $id = "";
    $id = $_POST['id']; 
    borrarArticles($id, $usuari_id);
    seleccionarArticles($usuari_id);
} catch (Exception $e) {
    echo "Error:" .  $e->getMessage();
}


?>