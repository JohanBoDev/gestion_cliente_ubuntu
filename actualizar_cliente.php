<?php
// Datos de conexión
$servidor = "mysql_container";
$usuario = "root";
$clave = "johan123";
$base_datos = "gestion_cliente";

// Crear la conexión
$conn = new mysqli($servidor, $usuario, $clave, $base_datos, 3306);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Capturar los datos del formulario
$id = $_POST['id'];
$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$telefono = $_POST['telefono'];

// Consulta SQL para actualizar los datos
$sql = "UPDATE clientes SET nombre='$nombre', correo='$correo', telefono='$telefono' WHERE id=$id";

// Ejecutar la consulta y verificar
if ($conn->query($sql) === TRUE) {
    echo "Cliente actualizado exitosamente. <a href='leer_clientes.php'>Ver lista de clientes</a>";
} else {
    echo "Error al actualizar el cliente: " . $conn->error;
}

// Cerrar la conexión
$conn->close();
?>
