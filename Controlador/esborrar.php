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
    $statement = $connexio->prepare("DELETE FROM articles WHERE id = ? AND usuari_id = ?");
    $statement->bindParam(1,$id);
    $statement->bindParam(2,$usuari_id);
    $statement->execute();

    $statement = $connexio->prepare("SELECT * FROM articles WHERE usuari_id = ?");
    $statement->bindParam(1,$usuari_id);
    $statement->execute();
    echo '<section><ul>';
while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
    echo '<li>' . $row["id"] . " - " . $row["article"] . '</li>';
}
echo '</ul></section>';
} catch (Exception $e) {
    echo "Error:" .  $e->getMessage();
}


?>