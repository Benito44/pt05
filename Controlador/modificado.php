<?php 
// Benito Martinez Florido
session_start();
include '../Vista/inserirvista.php';
require '../Model/mainfunction.php';
$connexio = connexio();
try {
    $usuari = "";
    $usuari = $_SESSION['usuari'];
    $usuari_id = "";
    $usuari_id = usuari($usuari);
    // Modifiquem l'article on l'usuari ens indica depenent de l'id insertat
    $article_nou = "";
    $id_vell = "";
    $article_nou = $_POST['article_nou']; 
    $id_vell = $_POST['id_vell']; 

    actualitzarArticles($article_nou, $id_vell,$usuari_id);
    seleccionarArticles($usuari_id);
} catch (Exception $e) {
    echo "Error:" .  $e->getMessage();
}


?>