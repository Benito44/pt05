
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans+Condensed:wght@300&display=swap" rel="stylesheet">  
    <link rel="stylesheet" href="../estils.css"> 
    <title>Paginación</title>
</head>
<body>
<form method="GET" action="../Controlador/index.logat.php">
    <label for="opcions">Articles per pàgina:</label>
    <!-- Al fer qualsevol canvi en la sel·lecció de producte per pàgina enviarà les dades -->
	<select id="opcions" name="opcions" onchange="this.form.submit()">
    <!-- Quan es sel·leccioni el número és mostrarà per pantalla -->
        <option value="5" <?php if ($productes == 5) echo 'selected'; ?>>5</option>
        <option value="10" <?php if ($productes == 10) echo 'selected'; ?>>10</option>
        <option value="15" <?php if ($productes == 15) echo 'selected'; ?>>15</option>
    </select>
</form>
<span class="error">
		<?php if(!isset($errors)){
		$errors;
	        }else{echo $errors;}?>
	</span> 
    <div class="contenidor">
        <h1>Articles</h1>
        <section class="articles">
            <ul>
                <?php mostrar_dades2($connexio, $pagina_actual) ?>
            </ul>
        </section>

        <section class="paginacio">
            <ul >
                <?php paginacio2($paginas, $pagina_actual) ?>
            </ul>
        </section>
        
        <a href="../Controlador/cerrar_session.php">Cerrar sesión</a>
        <br>
        <form action="insertar.php" id="form" method="post"> 
        <h4>Modificacio d'articles</h4>
                <input type="submit" value="Modificacio d'articles">
        </form>
        </div>
</body>
</html>