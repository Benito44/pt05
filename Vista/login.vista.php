<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Usuari</title>
    <link rel="stylesheet" type="text/css" href="../formulari.css">
</head>
<body>
    <h1>Login</h1>
    <form action="../Controlador/login.php" id="form" method="post">
    Usuari
        <input type="text"  id="usuari" name="usuari" placeholder="Usuari1"><br><br>
        Contrasenya
        <input type="password" id="contra" name="contra" placeholder="Usuari1@1234"><br><br>
        <input type="submit" value="Login">
        <a href="../Controlador/index.php">Torna</a>

        <span class="error">
		<?php if(!isset($error)){
		$error;
	        }else{echo $error;}?>
	</span> 

    <div class="enlace">
         <?php //require ('../autentificacion.php')?>
        <a href="<?php //echo $client->createAuthUrl() ?>">Iniciar sesión con Google</a>
      </div>
    </form>
    <a href="../github.php">HYBRIDAUTH</a>
    
    <form action="registrar.vista.php" id="form" method="post"> 
        No t'has registrat? Registrat aqui!!<br>
        <input type="submit" value="Registrar">
    </form>
    <form method="POST" action="../Controlador/recupera_contra.php"> 
        Recupera la contrasenya<br>
        <input type="text" name="email" id="email" placeholder="correu electronic">
        <input type="submit" value="Recuperar">
</form>


</body>
</html>

