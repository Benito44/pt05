<?php

  //require 'autentificacion.php';
  require 'Model/mainfunction.php';  
  
  // now you can use this profile info to create account in your website and make user logged in.
  $usuari = "Benito_OAUTH2";
  $email = "oauth2@gmail.com";


insertar_usuari_Oauth2($usuari, $email);


  //$statement = $connexio->prepare("SELECT * FROM usuaris WHERE usuari = ?");
  //$statement->bindParam(1, $usuari);
  //$statement->execute();
  //$resultat = $sstatementmt->fetch(PDO::FETCH_OBJ);
echo $usuari;
      //$_SESSION['usuari'] = $usuari;
     

?>