<?php
include('config.php'); // Incluir el archivo de configuración con la función getDB()

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES['foto'])) {
    // Recoger los datos del formulario
    $titulo = $_POST['titulo']; // Campo de título
    $descripcion = $_POST['descripcion']; // Campo de descripción
    $foto = preg_replace("/[^a-zA-Z0-9\._-]/", "", $_FILES['foto']['name']); // Elimina caracteres especiales

    // Directorio de destino
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($foto); // Concatenar el nombre del archivo con el directorio

    echo "Ruta destino: " . $target_file; // Muestra la ruta completa para verificar

    // Verificar si la carpeta 'uploads/' existe, si no, crearla
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0777, true); // Crea la carpeta si no existe
    }

    // Verifica si el archivo es una imagen (puedes añadir más validaciones si lo necesitas)
    $check = getimagesize($_FILES['foto']['tmp_name']);
    if ($check !== false) {
        // Mover la imagen a la carpeta de uploads
        if (move_uploaded_file($_FILES['foto']['tmp_name'], $target_file)) {
            echo "¡Foto subida con éxito!";

            // Insertar los datos en la base de datos
            $conn = getDB(); // Conexión a la base de datos
            if ($conn) {
                $sql = "INSERT INTO fotos (nombre, descripcion, ruta) VALUES ('$titulo', '$descripcion', '$foto')";

                if ($conn->query($sql) === TRUE) {
                    echo "Nueva foto registrada en la base de datos.";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            } else {
                echo "No se pudo conectar a la base de datos.";
            }
        } else {
            echo "Error al mover el archivo.";
        }
    } else {
        echo "El archivo no es una imagen válida.";
    }
}
?>

<?php include('includes/header.php'); ?>

<div class="container mt-5">
    <h2>Subir Foto</h2>
    <!-- Formulario para subir una foto -->
    <form action="upload.php" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="titulo" class="form-label">Título</label>
            <input type="text" class="form-control" id="titulo" name="titulo" required>
        </div>
        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required></textarea>
        </div>
        <div class="mb-3">
            <label for="foto" class="form-label">Seleccionar Foto</label>
            <input type="file" class="form-control" id="foto" name="foto" required>
        </div>
        <button type="submit" class="btn btn-primary">Subir Foto</button>
    </form>
</div>

<?php include('includes/footer.php'); ?>