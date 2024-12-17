<?php
include('config.php'); // Configuración de la base de datos

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES['foto'])) {
    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];
    $foto = $_FILES['foto']['name'];
    $target_dir = "uploads/";

    // Mover la imagen a la carpeta de uploads
    move_uploaded_file($_FILES['foto']['tmp_name'], $target_dir . $foto);

    // Insertar los datos en la base de datos
    $conn = getDB();
    $sql = "INSERT INTO fotos (titulo, descripcion, foto) VALUES ('$titulo', '$descripcion', '$foto')";

    if ($conn->query($sql) === TRUE) {
        echo "Nueva foto subida con éxito.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>


<div class="container mt-5">
    <h2 class="text-center mb-4">Subir Nueva Foto</h2>
    <form action="upload.php" method="POST" enctype="multipart/form-data" class="mx-auto" style="max-width: 500px;">
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" name="nombre" class="form-control" id="nombre" required>
        </div>
        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <textarea name="descripcion" class="form-control" id="descripcion" rows="3" required></textarea>
        </div>
        <div class="mb-3">
            <label for="archivo" class="form-label">Seleccionar Imagen</label>
            <input type="file" name="archivo" class="form-control" id="archivo" required>
        </div>
        <button type="submit" class="btn btn-primary w-100">Subir Foto</button>
    </form>
</div>