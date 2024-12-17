<?php
include 'config.php';
include 'includes/header.php';

// Consulta para obtener las fotos
$sql = "SELECT * FROM fotos ORDER BY fecha_subida DESC";
$result = $conn->query($sql);
?>

<h1>Galería de Fotos</h1>
<div class="gallery">
    <?php if ($result->num_rows > 0): ?>
        <?php while ($foto = $result->fetch_assoc()): ?>
            <div class="photo">
                <img src="<?php echo $foto['ruta']; ?>" alt="<?php echo $foto['nombre']; ?>">
                <p><?php echo $foto['nombre']; ?></p>
                <p><?php echo $foto['descripcion']; ?></p>
                <a href="edit.php?id=<?php echo $foto['id']; ?>">Editar</a> |
                <a href="delete.php?id=<?php echo $foto['id']; ?>" onclick="return confirm('¿Estás seguro de que quieres eliminar esta foto?');">Eliminar</a>
            </div>


        <?php endwhile; ?>
    <?php else: ?>
        <p>No hay fotos subidas aún.</p>
    <?php endif; ?>
</div>

<?php include 'includes/footer.php'; ?>