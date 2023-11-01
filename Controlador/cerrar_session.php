<?php
require 'index.php';
// Crida a la funció per tancar la sessió
cerrar_sessio();
/**
 * cerrar_sesion
 * Tanca la sessió
 */
function cerrar_sessio() {
    session_destroy(); 
    header('Location: index.php'); // Redirigeix a l'usuari a la página de'nicio
    exit(); 
}
?>
