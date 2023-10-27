<?php 
// Benito Martinez Florido
session_start();
include '../Vista/inserirvista.php';
include_once '../Model/mainfunction.php';
$connexio = connexio();
try {
    $usuari = "";
    $usuari = $_SESSION['usuari'];
    $usuari_id = "";
    $usuari_id = usuari($usuari);



error_reporting(0);


// Modifiquem l'article on l'usuari ens indica depenent de l'id insertat
$article_nou = "";
$id_vell = "";
$article_nou = $_POST['article_nou']; 
$id_vell = $_POST['id_vell']; 
    $statement = $connexio->prepare("UPDATE articles SET article=? WHERE id=? AND usuari_id= ?");
    $statement->bindParam(1,$article_nou);
    $statement->bindParam(2,$id_vell);
    $statement->bindParam(3,$usuari_id);
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