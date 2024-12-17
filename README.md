# Galería de Fotos

Este proyecto es una galería de fotos simple que permite a los usuarios ver, subir, editar y eliminar imágenes. El proyecto está desarrollado en PHP, utilizando MySQL para la base de datos y Bootstrap para el diseño responsivo.

## Funcionalidades

- Visualización de fotos almacenadas en la base de datos.
- Subida de nuevas fotos.
- Edición de fotos (próximamente).
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
    nombre VARCHAR(255) NOT NULL,
    descripcion TEXT,
    ruta VARCHAR(255) NOT NULL
    fecha_subida timestamp current_timestamp
);

Solucionando el Problema de "No hay fotos"

Si al cargar la página de inicio no aparecen fotos, puede ser por varios motivos. Aquí algunos pasos para solucionarlo:

    Verificar la base de datos:
        Asegúrate de que la tabla fotos tiene imágenes cargadas. Si no es así, puedes añadir algunas a través del formulario de carga.

    Comprobar la consulta SQL:
        En el archivo index.php, verifica que la consulta SQL para obtener las fotos esté correcta. También asegúrate de que la conexión en db.php sea válida y sin errores.

Mejoras y Funcionalidades Recientes
1. Menú de Navegación

Se ha añadido un menú de navegación para facilitar el acceso entre las diferentes páginas del proyecto. Este menú incluye enlaces a:

    Inicio (index.php)
    Subir Foto (upload.php)
    Editar Foto (edit.php) — próximamente funcional.
    Eliminar Foto (delete.php) — próximamente funcional.

El menú se encuentra en el archivo includes/header.php.
2. Subida de Fotos

El archivo upload.php ahora contiene un formulario para permitir a los usuarios subir fotos. El formulario incluye campos para ingresar un título y descripción, y permite seleccionar la imagen desde el dispositivo. Las fotos se guardan en la carpeta uploads/, y sus datos (título, descripción y nombre del archivo) se almacenan en la base de datos.
3. Eliminación de Fotos

En el archivo delete.php se ha añadido la funcionalidad de eliminar fotos. Los usuarios pueden eliminar imágenes directamente desde la galería. La eliminación incluye tanto la base de datos como la eliminación del archivo en la carpeta uploads/.
4. Edición de Fotos (Próximamente)

El archivo edit.php está preparado para la edición de fotos, aunque aún no está funcional. Próximamente se permitirá a los usuarios editar el título y la descripción de las fotos subidas.
5. Diseño Responsivo Mejorado

Gracias a la integración de Bootstrap 5, el diseño del proyecto ahora es completamente responsivo. Esto garantiza que la página se vea bien en dispositivos móviles y en pantallas de escritorio.
6. Centralización de Configuración

Se ha añadido el archivo config.php, que centraliza la configuración del sistema, como la conexión a la base de datos. Esto facilita la gestión de configuraciones y hace que el proyecto sea más fácil de mantener.