<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];

    // Guardar la imagen en la carpeta 'upload'
    $carpeta = 'upload/';
    $ruta_imagen = $carpeta . basename($_FILES['foto']['name']);
    move_uploaded_file($_FILES['foto']['tmp_name'], $ruta_imagen);

    // Insertar en la base de datos
    $sql = "INSERT INTO fotos (nombre, descripcion, ruta) VALUES ('$nombre', '$descripcion', '$ruta_imagen')";
    if ($conn->query($sql)) {
        echo "Foto subida correctamente.";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<h1>Subir Foto</h1>
<form method="POST" enctype="multipart/form-data">
    <label>Nombre:</label>
    <input type="text" name="nombre" required><br>
    <label>Descripción:</label>
    <textarea name="descripcion"></textarea><br>
    <label>Seleccionar foto:</label>
    <input type="file" name="foto" required><br>
    <button type="submit">Subir Foto</button>
</form>