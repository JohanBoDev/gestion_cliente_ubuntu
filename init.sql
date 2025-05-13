-- Crear la base de datos si no existe
CREATE DATABASE IF NOT EXISTS gestion_cliente;

-- Verificar si se creó y usarla
USE gestion_cliente;

-- Crear la tabla clientes si no existe
CREATE TABLE IF NOT EXISTS clientes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    correo VARCHAR(100) NOT NULL,
    telefono VARCHAR(20),
    fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Insertar algunos datos iniciales solo si no existen
INSERT IGNORE INTO clientes (nombre, correo, telefono) VALUES 
('Johan Bohorquez', 'johan@example.com', '123456789'),
('Juliana Acuña', 'juliana@example.com', '987654321');
