<?php 
include_once '../Model/mainfunction.php';
$connexio = connexio();
session_start();/**
 * pagina
 *
 * @return void
 */
function pagina(){
    if (!isset($_GET['pagina'])) {
        $pagina_actual = 1;
    } else {
        $pagina_actual = $_GET['pagina'];
    }

    return $pagina_actual;
}
/**
 * paginacio
 * Creem la paginació indicant les pàgines 
 * @param  int $paginas
 * @param  int $pagina_actual
 * @return void
 */
function paginacio($paginas, $pagina_actual){
    for ($x = 1; $x <= $paginas; $x++) { 
        echo '<li class="' . ($x == $pagina_actual ? "active" : "") . '"><a href="index.php?pagina=' . $x . '">' . $x . '</a></li>';
        $nom_pagina = $x;
    }
    if ($pagina_actual != $nom_pagina) {
        $url = "index.php?pagina=" . ($pagina_actual+1);
        echo "<li><a href=\"$url\">Seguent</a></li>\n";
    }else{
        echo '<li class="' . ("disabled") . '">Seguent</li>';
    }
    if($pagina_actual > 1){
        $url = "index.php?pagina=" . ($pagina_actual-1);
        echo "<li><a href=\"$url\">Anterior</a></li>\n";
    }else{
        echo '<li class="' . ("disabled") . '">Anterior</li>';                   
    }
}
/**
 * productes
 * Retornarà la sessió amb el valor de productes per pantalla que hem marcat.
 * Per defecte serà 5
 * @return int
 */
function productes(){
    if (isset($_GET['opcions'])) {
        $_SESSION['productes'] = $_GET['opcions'];
    }
    if (!isset($_SESSION['productes'])) {
        $_SESSION['productes'] = 5; // Valor predeterminado
    }
    
    return $_SESSION['productes'];
}

/**
 * mostrar_dades
 * Mostrem les dades dels articles on no tenen usuari_id
 * @param  mixed $connexio
 * @param  mixed $pagina_actual
 * @return void
 */
function mostrar_dades($connexio, $pagina_actual){
    $productes = productes();
    $start = ($pagina_actual - 1) * $productes;
    $statement = $connexio->prepare("SELECT * FROM articles WHERE usuari_id IS NULL LIMIT $start, $productes");
    $statement->execute();

    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
        echo '<li>' . $row["id"] . " - " . $row["article"] . '</li>';
    }
}


try {
    $productes = productes();
    $num_total_registros = $connexio->query("SELECT COUNT(*) FROM articles WHERE usuari_id IS NULL")->fetchColumn();
    $paginas = ceil(intval($num_total_registros) / intval($productes));
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$pagina_actual = pagina();

require '../Vista/index.vista.php';

?>
