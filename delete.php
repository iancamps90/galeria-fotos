<?php
include 'config.php';

// Verificar si se recibe el ID de la foto
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Obtener la ruta de la imagen para borrarla del servidor
    $sql = "SELECT ruta FROM fotos WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $foto = $result->fetch_assoc();
        $ruta = $foto['ruta'];

        // Eliminar la foto del servidor
        if (file_exists($ruta)) {
            unlink($ruta);
        }

        // Eliminar la foto de la base de datos
        $sql_delete = "DELETE FROM fotos WHERE id = $id";
        if ($conn->query($sql_delete)) {
            echo "Foto eliminada correctamente.";
        } else {
            echo "Error al eliminar la foto: " . $conn->error;
        }
    } else {
        echo "Foto no encontrada.";
    }
} else {
    echo "ID de foto no proporcionado.";
}

header("Location: index.php"); // Redirigir a la página principal
exit();
