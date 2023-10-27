<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../formulari.css">
    <title>Document</title>
</head>
<body>
<h1>Insertar</h1>
<form action="insertar.php" id="form" method="post"> 
        
        Insertar article <br>
        <input type="text"  id="article" name="article"><br>
        <input type="submit" value="insertar">
        </form>
        <h1>Modificar</h1>
        <form action="modificado.php" id="form" method="post"> 
        
        Sel·leccionar ID<br><input type="number"  id="id_vell" name="id_vell"><br>
        Article modificat<br><input type="text"  id="article_nou" name="article_nou"><br>
        <input type="submit" value="Modificar">
        </form>
        
        <h1>Eliminar</h1>
        <form action="esborrar.php" id="form" method="post"> 
        Eliminar article<br>
        <input type="number"  id="id" name="id"><br>
        <input type="submit" value="Eliminar">
        </form>
        <a href="../Controlador/index.logat.php">Torna</a>
</body>
</html>