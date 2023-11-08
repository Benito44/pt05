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
function encontrarPorEmail($email){
    $usuari = "";
    $connexio = "";
    $connexio = connexio();
    $statement = $connexio->prepare("SELECT usuari FROM usuaris WHERE email = ?");
    $statement->bindParam(1,$email);
    $statement->execute();
    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
        $usuari = $row["usuari"];
    }
    return $usuari;
}
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
function encontrar_token($usuari_id){
    $token = "";
    $connexio = "";
    $connexio = connexio();
    $statement = $connexio->prepare("SELECT token FROM usuaris WHERE usuari_id = ?");
    $statement->bindParam(1,$usuari_id);
    $statement->execute();
    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
        $token = $row["token"];
    }
    return $token;
}
function usuarioPorToken($token){
    $usuari = "";
    $connexio = "";
    $connexio = connexio();
    $statement = $connexio->prepare("SELECT usuari FROM usuaris WHERE token = ?");
    $statement->bindParam(1,$token);
    $statement->execute();
    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
        $usuari = $row["usuari"];
    }
    return $usuari;
}
function idPorToken($token){
    $token = "";
    $connexio = "";
    $connexio = connexio();
    $statement = $connexio->prepare("SELECT usuari_id FROM usuaris WHERE token = ?");
    $statement->bindParam(1,$token);
    $statement->execute();
    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
        $usuari_id = $row["usuari_id"];
    }
    return $usuari_id;
}
function insertar_token($token,$email,$temps){
    
    $connexio = connexio();
    $statement = $connexio->prepare("UPDATE usuaris SET token=?,temps = ? WHERE email= ?");
    $statement->bindParam(1,$token);
    $statement->bindParam(2,$temps);
    $statement->bindParam(3,$email);
    $statement->execute();
//    INSERT INTO usuaris (usuari, email) VALUES ('control', 'control@gmail.com')

    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
        $token = $row["token"];
    }
    return $token;
}
function insertar_usuari_Oauth2($usuari, $email){
    $connexio = "";
    $connexio = connexio();
    $statement = $connexio->prepare("INSERT INTO usuaris (usuari, email) VALUES (?, ?)");
    $statement->bindParam(1, $usuari);
    $statement->bindParam(2, $email);
    $statement->execute();
}
function tempsPerEmail($email){
    $temps = "";
    $connexio = "";
    $connexio = connexio();
    $statement = $connexio->prepare("SELECT temps FROM usuaris WHERE email = ?");
    $statement->bindParam(1,$email);
    $statement->execute();
    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
        $temps = $row["temps"];
    }
    return $temps;
}

?>