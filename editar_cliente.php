<?php
// Datos de conexión
if ($_SERVER["HTTP_HOST"] == "localhost") {
    $servidor = "localhost";
    $usuario = "root";
    $clave = "johan123";
    $base_datos = "gestion_cliente";
    $puerto = 3306;
} else {
    $servidor = "mysql_container";
    $usuario = "root";
    $clave = "johan123";
    $base_datos = "gestion_cliente";
    $puerto = 3306;
}

// Crear la conexión
$conn = new mysqli($servidor, $usuario, $clave, $base_datos, 3306);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Capturar el ID del cliente a editar
$id = $_GET['id'];

// Obtener los datos del cliente
$sql = "SELECT * FROM clientes WHERE id = $id";
$resultado = $conn->query($sql);

if ($resultado->num_rows > 0) {
    $cliente = $resultado->fetch_assoc();
} else {
    echo "Cliente no encontrado.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
         <link rel="stylesheet" href="estilos.css">

    <title>Editar Cliente</title>
</head>
<body>
    <h2>Editar Cliente</h2>
    <form action="actualizar_cliente.php" method="post">
        <input type="hidden" name="id" value="<?php echo $cliente['id']; ?>">
        
        <label for="nombre">Nombre:</label><br>
        <input type="text" id="nombre" name="nombre" value="<?php echo $cliente['nombre']; ?>" required><br><br>

        <label for="correo">Correo:</label><br>
        <input type="email" id="correo" name="correo" value="<?php echo $cliente['correo']; ?>" required><br><br>

        <label for="telefono">Teléfono:</label><br>
        <input type="text" id="telefono" name="telefono" value="<?php echo $cliente['telefono']; ?>" required><br><br>

        <input type="submit" value="Actualizar Cliente">
    </form>
</body>
</html>
