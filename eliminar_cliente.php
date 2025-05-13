<?php
// Datos de conexión
$servidor = "localhost";
$usuario = "root";
$clave = "johan123";
$base_datos = "gestion_cliente";

// Crear la conexión
$conn = new mysqli($servidor, $usuario, $clave, $base_datos);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Capturar el ID del cliente
$id = $_GET['id'];

// Consulta SQL para eliminar el cliente
$sql = "DELETE FROM clientes WHERE id = $id";

// Ejecutar la consulta y verificar
if ($conn->query($sql) === TRUE) {
    echo "Cliente eliminado exitosamente. <a href='leer_clientes.php'>Volver a la lista de clientes</a>";
} else {
    echo "Error al eliminar el cliente: " . $conn->error;
}

// Cerrar la conexión
$conn->close();
?>
