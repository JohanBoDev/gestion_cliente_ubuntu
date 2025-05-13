<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
       <link rel="stylesheet" href="estilos.css">

    <title>Agregar Cliente</title>
</head>
<body>
    <h2>Agregar Nuevo Cliente</h2>
    <form action="procesar_cliente.php" method="post">
        <label for="nombre">Nombre:</label><br>
        <input type="text" id="nombre" name="nombre" required><br><br>

        <label for="correo">Correo:</label><br>
        <input type="email" id="correo" name="correo" required><br><br>

        <label for="telefono">Teléfono:</label><br>
        <input type="text" id="telefono" name="telefono" required><br><br>

        <input type="submit" value="Agregar Cliente">
    </form>
</body>
</html>
