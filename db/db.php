<?php

// Datos de la conexión a la base de datos
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root'); // 'root' es el usuario por defecto en XAMPP
define('DB_PASSWORD', ''); // Sin contraseña en XAMPP
define('DB_DATABASE', 'galeria'); // Nombre de la base de datos

// Conectar a la base de datos
function getDB()
{
    $dbConnection = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

    // Comprobar la conexión
    if ($dbConnection->connect_error) {
        die("Conexión fallida: " . $dbConnection->connect_error);
    }
    return $dbConnection;
}
