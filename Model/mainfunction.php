<?php 
// Ens connectem a la base de dades
function connexio(){
    $dbname = 'pt05_benito_martinez';
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
function encontrar_token($usuari){
    $token = "";
    $connexio = "";
    $connexio = connexio();
    $statement = $connexio->prepare("SELECT token FROM usuaris WHERE usuari = ?");
    $statement->bindParam(1,$usuari);
    $statement->execute();
    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
        $token = $row["token"];
    }
    return $token;
}
function insertar_token($token,$usuari_id){
    
    $connexio = connexio();
    $statement = $connexio->prepare("UPDATE usuaris SET token=? WHERE usuari_id= ?");
    $statement->bindParam(1,$token);
    $statement->bindParam(2,$usuari_id);
    $statement->execute();


    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
        $token = $row["token"];
    }
    return $token;
}
?>