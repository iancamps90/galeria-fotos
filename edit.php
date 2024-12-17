<?php
include 'config.php';

// Verificar si se recibe el ID de la foto
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Obtener los datos actuales de la foto
    $sql = "SELECT * FROM fotos WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $foto = $result->fetch_assoc();
    } else {
        echo "Foto no encontrada.";
        exit();
    }
}

// Procesar el formulario de edición
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];

    $sql_update = "UPDATE fotos SET nombre = '$nombre', descripcion = '$descripcion' WHERE id = $id";

    if ($conn->query($sql_update)) {
        echo "Foto actualizada correctamente.";
        header("Location: index.php");
        exit();
    } else {
        echo "Error al actualizar la foto: " . $conn->error;
    }
}
?>


<?php include('includes/header.php'); ?>


<h1>Editar Foto</h1>
<form method="POST">
    <label>Nombre:</label>
    <input type="text" name="nombre" value="<?php echo $foto['nombre']; ?>" required><br>
    <label>Descripción:</label>
    <textarea name="descripcion"><?php echo $foto['descripcion']; ?></textarea><br>
    <button type="submit">Guardar Cambios</button>
</form>
<a href="index.php">Volver a la galería</a>




<?php include('includes/footer.php'); ?>