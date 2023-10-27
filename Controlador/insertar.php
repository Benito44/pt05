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

    $article = null;
    $article = $_POST['article'];
// Insertem articles a la base de dades i validem que no hi hagui repetits
if ($article != null) {
    $existingArticleQuery = $connexio->prepare("SELECT COUNT(*) FROM articles WHERE article = ? AND usuari_id = ?");
    $existingArticleQuery->bindParam(1, $article);
    $existingArticleQuery->bindParam(2, $usuari_id);
    $existingArticleQuery->execute();
    $existingArticleCount = $existingArticleQuery->fetchColumn();

    if ($existingArticleCount == 0) {
        // L'article no existeix, ho insertem
        $insertStatement = $connexio->prepare("INSERT INTO articles (article, usuari_id) VALUES (?, ?)");
        $insertStatement->bindParam(1, $article);
        $insertStatement->bindParam(2, $usuari_id);
        $insertStatement->execute();
        $_POST['article'] = null;
    } else {
        echo "L'article ja existeix.";
    }
}
$statement = $connexio->prepare("SELECT * FROM articles WHERE usuari_id = ?");
$statement->bindParam(1,$usuari_id);
$statement->execute();
echo '<section><ul>';
// Mostrem els articles desprès d'insertar
while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
    echo '<li>' . $row["id"] . " - " . $row["article"] . '</li>';
}
echo '</ul></section>';
}catch (Exception $e) {
    echo "Error:" .  $e->getMessage();
}


?>