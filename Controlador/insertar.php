<?php 
// Benito Martinez Florido
session_start();
include '../Vista/inserirvista.php';
require '../Model/mainfunction.php';

try {
    $usuari = "";
    $usuari = $_SESSION['usuari'];
    $usuari_id = "";
    $usuari_id = usuari($usuari);
    error_reporting(0);

    $article = null;
    $article = $_POST['article'];
    // Insertem articles a la base de dades i validem que no hi hagui repetits
    insertartArticles($article,$usuari_id);
    seleccionarArticles($usuari_id);
    }catch (Exception $e) {
        echo "Error:" .  $e->getMessage();
    }


?>