<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galería de Fotos</title>
    <!-- Enlazamos a Bootstrap (CDN) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Estilos personalizados -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

    <!-- Header -->
    <header class="bg-dark text-white text-center p-4">
        <h1>Galería de Fotos</h1>
    </header>
    <!-- Fin Header -->

    
    <!-- Menú de navegación -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Galería de Fotos</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="upload.php">Subir Foto</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="delete.php">Eliminar Foto</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="edit.php">Editar Foto</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Fin del Menú -->