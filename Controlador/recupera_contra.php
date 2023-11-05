<?php
require '../src/PHPMailer.php';
require '../src/Exception.php';
require '../src/SMTP.php';
require '../Model/mainfunction.php';
//include '../Vista/recuperar_vista.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

session_start();
$token = bin2hex(random_bytes(16)); // Genera un token aleatorio
$expiration = time() + 4 * 3600;
$connexio = connexio();
$email = $_POST['email'];
$_SESSION['email'] = $email;
$usuari = encontrarPorEmail($email);
$insertat_token = insertar_token($token, $email, $expiration);
$text = 'http://localhost/Backend/UF2/pt05/Controlador/canviar_contra.php?token=' . $insertat_token . '&usuari=' . $usuari;

phphmailer($usuari, $email, $text);

function phphmailer($nom, $adreca, $text) {
    $mail = new PHPMailer(true);
    try {
      $nom; $adreca;
      // Canviar les opcions del SMTP
      $mail->SMTPDebug =0;
      $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );                      
      $mail->isSMTP();                                            //Enviar utilitzant SMTP
      $mail->Host       = 'smtp.gmail.com';                    
      $mail->SMTPAuth   = true;                                   //Activem l'autenticació SMTP
      $mail->Username   = 'xamppbmartinez@gmail.com';                     //Email on creem la clau
      $mail->Password   = 'jvrg fwih oxgm ncwm';                          //Clau d'acces
      $mail->SMTPSecure = 'PHPMailer::ENCRYPTION_STARTTLS';            //Enable implicit TLS encryption
      $mail->Port       = 587;                                    // Utilitzem el port 587
    
      //Recipients
      $mail->setFrom('xamppbmartinez@gmail.com', $nom); 
      $mail->addAddress($adreca);     
    
      //Content
      $mail->isHTML(true); //Enviar l'email en format HTML
      $mail->Subject = 'Assumpte'; // Assumpte
      $mail->Body    = $text;  
    
      $mail->send(); // Enviem l'email
    } catch (Exception $e) {
      // Si hi ha cap error ens mostrarà el tipus d'error que sigui
    }
  }





?>