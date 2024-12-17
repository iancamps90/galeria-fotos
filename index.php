<?php
include('db/db.php'); // Incluir la conexión a la base de datos

// Obtener las fotos desde la base de datos
$conn = getDB();
$sql = "SELECT * FROM fotos";
$result = $conn->query($sql);

include('includes/header.php'); // Cabecera del sitio

?>

<div class="container mt-5">
    <h2>Galería de Fotos</h2>

    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<div class="card mb-3" style="width: 18rem;">';
            echo '<img src="uploads/' . $row['ruta'] . '" class="card-img-top" alt="' . $row['nombre'] . '">';
            echo '<div class="card-body">';
            echo '<h5 class="card-title">' . $row['nombre'] . '</h5>';
            echo '<p class="card-text">' . $row['descripcion'] . '</p>';
            echo '<a href="edit.php?id=' . $row['id'] . '" class="btn btn-warning">Editar</a>';
            echo '<a href="delete.php?id=' . $row['id'] . '" class="btn btn-danger">Eliminar</a>';
            echo '</div>';
            echo '</div>';
        }
    } else {
        echo "<h3>No hay fotos disponibles</h3>";
    }
    ?>

</div>

<?php include('includes/footer.php'); // Pie de página 
?>