# Galería de Fotos

Este proyecto es una galería de fotos simple que permite a los usuarios ver, subir, editar y eliminar imágenes. El proyecto está desarrollado en PHP, utilizando MySQL para la base de datos y Bootstrap para el diseño responsivo.

## Funcionalidades

- Visualización de fotos almacenadas en la base de datos.
- Subida de nuevas fotos.
- Edición de fotos.
- Eliminación de fotos.
- Usabilidad con Bootstrap para una interfaz amigable y responsiva.

## Estructura del Proyecto

galeria_fotos/ 

├── assets/ 
│ 
├── css/ 
│   └── style.css 
│ 
├── images/ 
│ 
└── js/ 
│   └── script.js 
├── db/ 
│ └── db.php 
├── includes/ 
│ 
├── footer.php 
│ └── header.php 
├── uploads/ (aquí se guardarán las fotos subidas) 
├── config.php 
├── delete.php 
├── edit.php 
├── index.php 
├── upload.php 
└── README.md


## Requisitos

- XAMPP o cualquier servidor local que soporte PHP y MySQL.
- Conexión a una base de datos MySQL.
- Bootstrap 5 para el diseño responsivo.

## Instalación

1. Clona este repositorio o descarga los archivos.
2. Coloca el proyecto dentro de la carpeta `htdocs` de XAMPP.
3. Crea una base de datos llamada `galeria` en tu servidor MySQL.
4. Ejecuta las consultas necesarias para crear las tablas en la base de datos (ver más abajo).
5. Inicia XAMPP y abre el proyecto en tu navegador: `http://localhost/galeria_fotos/`.

## Base de Datos

La base de datos debe tener una tabla llamada `fotos` con los siguientes campos:

```sql
CREATE TABLE fotos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(255) NOT NULL,
    descripcion TEXT,
    foto VARCHAR(255) NOT NULL
);


### **2. Solucionando el Problema de "No hay fotos"**

Parece que el problema es que no hay fotos en la base de datos, o bien la consulta no está obteniendo resultados. Vamos a comprobar algunos puntos:

#### **Pasos para solucionar "No hay fotos"**:

1. **Verificar la base de datos**:
   - Asegúrate de que en la base de datos (en la tabla `fotos`) haya fotos cargadas. Si no, debes agregar algunas fotos en la base de datos o a través del formulario de carga.
   
2. **Comprobar que la consulta SQL está funcionando correctamente**:
   En el archivo **`index.php`**, revisa si la consulta SQL está bien escrita y si está obteniendo datos de la tabla correctamente.

   Asegúrate de que el archivo `db.php` tiene la conexión correcta y que no hay errores de conexión. Aquí te dejo un ejemplo de cómo debería estar:

   ```php
   <?php
   include('db/db.php'); // Incluir la conexión a la base de datos

   // Obtener las fotos desde la base de datos
   $conn = getDB(); // Usamos la función de conexión de db.php
   $sql = "SELECT * FROM fotos";
   $result = $conn->query($sql);

   if ($result->num_rows > 0) {
       // Si hay fotos, mostrar cada una
       while ($row = $result->fetch_assoc()) {
           // Aquí va el código para mostrar las fotos
       }
   } else {
       echo "<h3>No hay fotos</h3>";
   }
   ?>

