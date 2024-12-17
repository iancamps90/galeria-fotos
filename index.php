<?php
include('includes/header.php');
include('db/db.php'); // Incluir la conexión a la base de datos

// Obtener las fotos desde la base de datos
$conn = getDB();
$sql = "SELECT * FROM fotos";
$result = $conn->query($sql);
?>

<div class="container mt-5">
    <div class="row">
        <?php while ($row = $result->fetch_assoc()): ?>
            <div class="col-md-4">
                <div class="card">
                    <img src="uploads/<?php echo $row['foto']; ?>" class="card-img-top" alt="Foto">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $row['titulo']; ?></h5>
                        <p class="card-text"><?php echo $row['descripcion']; ?></p>
                        <a href="edit.php?id=<?php echo $row['id']; ?>" class="btn btn-warning">Editar</a>
                        <a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Eliminar</a>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
</div>


<?php
include('includes/footer.php');
?>