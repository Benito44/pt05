
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans+Condensed:wght@300&display=swap" rel="stylesheet">  
    <link rel="stylesheet" href="../Model/estils.css">
    <title>Paginación</title>
    <style>

</style>

</head>
<body>
    <form method="post">
    <input type="submit" formaction="../Vista/registrar.vista.php" value="Registrar-se">
    <input type="submit" formaction="../Vista/login.vista.php" value="Login">
</form>

    <form method="GET" action="../Controlador/index.php">
    <label for="opcions">Articles per pàgina:</label>
    <!-- Al fer qualsevol canvi en la sel·lecció de producte per pàgina enviarà les dades -->
	<select id="opcions" name="opcions" onchange="this.form.submit()">
    <!-- Quan es sel·leccioni el número és mostrarà per pantalla -->
        <option value="5" <?php if ($productes == 5) echo 'selected'; ?>>5</option>
        <option value="10" <?php if ($productes == 10) echo 'selected'; ?>>10</option>
        <option value="15" <?php if ($productes == 15) echo 'selected'; ?>>15</option>
    </select>
</form>


    <div class="contenidor">
        <h1>Articles</h1>

        <section class="articles">
            <ul>
                <?php mostrar_dades($connexio, $pagina_actual) ?>
            </ul>
        </section>

        <section class="paginacio">
            <ul >
                <?php paginacio($paginas, $pagina_actual) ?>
            </ul>
        </section>
    </div>
</body>
</html>