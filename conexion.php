<?php
// Habilitar errores en PHP
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Datos de conexión
if ($_SERVER["HTTP_HOST"] == "localhost") {
    $servidor = "localhost";
    $usuario = "root";
    $clave = "";
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
$mysqli = new mysqli($servidor, $usuario, $clave, $base_datos);

// Verificar conexión
if ($mysqli->connect_error) {
    error_log("Error de conexión: " . $mysqli->connect_error, 3, "/var/log/apache2/error.log");
    die("Conexión fallida: " . $mysqli->connect_error);
} else {
    echo "Conexión exitosa a la base de datos MySQL";
}

// Cerrar conexión
$mysqli->close();
?>
