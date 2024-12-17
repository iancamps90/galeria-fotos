<?php

// Configuración de la base de datos
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'galeria_fotos';

// Conexión a MySQL
$conn = new mysqli($host, $user, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
