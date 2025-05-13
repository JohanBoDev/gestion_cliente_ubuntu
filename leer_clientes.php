<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Clientes</title>
    <link rel="stylesheet" href="estilos.css"> <!-- Aquí enlazas tu archivo CSS -->
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #ddd;
        }
        a {
            text-decoration: none;
            color: #007bff;
        }
        a:hover {
            color: #0056b3;
        }
    </style>
</head>
<body>

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

// Consulta SQL para obtener datos
$sql = "SELECT id, nombre, correo, telefono, fecha_registro FROM clientes";
$resultado = $conn->query($sql);

// Botón para agregar un cliente
echo "<a href='agregar_cliente.php' style='display: inline-block; margin-bottom: 10px; background-color: #4CAF50; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;'>➕ Agregar Cliente</a>";

if ($resultado->num_rows > 0) {
    echo "<h2>Lista de Clientes</h2>";
    echo "<table>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Correo</th>
            <th>Teléfono</th>
            <th>Fecha de Registro</th>
            <th>Acciones</th>
        </tr>";
    
    while ($row = $resultado->fetch_assoc()) {
        echo "<tr>
            <td>".$row["id"]."</td>
            <td>".$row["nombre"]."</td>
            <td>".$row["correo"]."</td>
            <td>".$row["telefono"]."</td>
            <td>".$row["fecha_registro"]."</td>
            <td>
                <a href='editar_cliente.php?id=".$row["id"]."'>✏️ Editar</a> |
                <a href='eliminar_cliente.php?id=".$row["id"]."' onclick='return confirm(\"¿Estás seguro de que quieres eliminar este cliente?\")'>🗑️ Eliminar</a>
            </td>
        </tr>";
    }
    echo "</table>";
} else {
    echo "No se encontraron resultados.";
}

// Cerrar la conexión
$conn->close();
?>

</body>
</html>
