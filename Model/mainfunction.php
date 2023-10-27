<?php 
// Ens connectem a la base de dades
function connexio(){
    $dbname = 'pt04_benito_martinez';
    $username = 'root';
    $password = '';
    $connexio = new PDO("mysql:host=localhost;dbname=$dbname", $username, $password);
    return $connexio;
}
// Agafem l'id de l'usuari que s'ha logat
function usuari($usuari){
    $usuari_id = "";
    $connexio = "";
    $connexio = connexio();
    $statement = $connexio->prepare("SELECT usuari_id FROM usuaris WHERE usuari = ?");
    $statement->bindParam(1,$usuari);
    $statement->execute();
    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
        $usuari_id = $row["usuari_id"];
    }
    return $usuari_id;
}
?>