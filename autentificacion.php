<?php
/*
  require 'configuracion.php';

  
session_start();
// authenticate code from Google OAuth Flow
if (isset($_GET['code'])) {


  $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
  $client->setAccessToken($token['access_token']);
  
  // get profile info
  $google_oauth = new Google\Service\Oauth2($client); 
  $google_account_info = $google_oauth->userinfo->get();
  $email =  $google_account_info->email;
  $name =  $google_account_info->name;


} 
*/




require 'configuracion.php';

try {
    $adapter->authenticate();
    $userProfile = $adapter->getUserProfile();
    //print_r($userProfile);
}
catch( Exception $e ){
    echo $e->getMessage() ;
}


?>