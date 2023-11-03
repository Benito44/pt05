<?php
  require_once 'vendor/autoload.php';

  $clientID = '1029807202331-4ehvkbgpvv4pqupdildq6e4imsdtsdu5.apps.googleusercontent.com';
  $clientSecret = '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';
  $redirectUri = 'http://localhost:90/loginGoogle/perfil.php';

  // create Client Request to access Google API
  $client = new Google_Client();
  $client->setClientId($clientID);
  $client->setClientSecret($clientSecret);
  $client->setRedirectUri($redirectUri);
  $client->addScope("email");
  $client->addScope("profile");
?>