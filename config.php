<?php
// Configuración de la base de datos
$servername = "localhost"; // Cambia esto si usas otro servidor
$username = "root";        // Tu usuario de base de datos
$password = "";            // Tu contraseña de base de datos (puede estar vacía en localhost)
$dbname = "galeria_fotos"; // El nombre de tu base de datos

// Función para obtener la conexión a la base de datos
function getDB()
{
    global $servername, $username, $password, $dbname;
    try {
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Establecer que mysqli lance excepciones en caso de error
        $conn->set_charset("utf8");  // Definir la codificación de caracteres
        if ($conn->connect_error) {
            throw new Exception("Conexión fallida: " . $conn->connect_error);
        }
        return $conn; // Retorna la conexión a la base de datos
    } catch (Exception $e) {
        echo "Error al conectar a la base de datos: " . $e->getMessage();
        return null;
    }
}
