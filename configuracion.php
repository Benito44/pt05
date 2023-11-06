<?php
/*
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
*/

require_once 'vendor/autoload.php';
 
$config = [
    'callback' => 'http://localhost/Backend/UF2/pt05/Controlador/index.logat.php',
    'keys'     => [
                    'id' => '532009720343-mupdo12pg1nbdmngk9kdev76p47ukc5t.apps.googleusercontent.com',
                    'secret' => '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'
                ],
    'scope'    => 'https://www.googleapis.com/auth/userinfo.profile https://www.googleapis.com/auth/userinfo.email',
    'authorize_url_parameters' => [
            'approval_prompt' => 'force', // to pass only when you need to acquire a new refresh token.
            'access_type' => 'offline'
    ]
];
 
$adapter = new Hybridauth\Provider\Google( $config );
?>  