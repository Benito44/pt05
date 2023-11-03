<?php
  require_once 'vendor/autoload.php';

  $clientID = '532009720343-mupdo12pg1nbdmngk9kdev76p47ukc5t.apps.googleusercontent.com';
  $clientSecret = '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';
  $redirectUri = 'http://localhost/Backend/UF2/pt05/Controlador/index.logat.php';

  // create Client Request to access Google API
  $client = new Google_Client();
  $client->setClientId($clientID);
  $client->setClientSecret($clientSecret);
  $client->setRedirectUri($redirectUri);
  $client->addScope("email");
  $client->addScope("profile");
?>