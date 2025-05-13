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

// Capturar datos del formulario
$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$telefono = $_POST['telefono'];

// Consulta para insertar datos
$sql = "INSERT INTO clientes (nombre, correo, telefono) VALUES ('$nombre', '$correo', '$telefono')";

// Ejecutar la consulta y verificar si se guardó correctamente
if ($conn->query($sql) === TRUE) {
    echo "Cliente agregado exitosamente. <a href='leer_clientes.php'>Ver lista de clientes</a>";
} else {
    echo "Error al agregar el cliente: " . $conn->error;
}

// Cerrar la conexión
$conn->close();
?>
