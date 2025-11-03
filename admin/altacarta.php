<?php
// altacarta.php (Versión Corregida)

// Seguridad: Asegúrate de incluir la seguridad del administrador
include("seguridad.php"); 
include("../conexion.php");

// Directorio donde se guardarán las imágenes (AJUSTA ESTA RUTA SI ES NECESARIO)
$directorio_destino = "../cartas/"; 

// 1. Recogida de datos sanitizados
$nombrecarta = mysqli_real_escape_string($conn, $_POST['nombrecarta']);
$tipo = mysqli_real_escape_string($conn, $_POST['tipo']);

// 2. MANEJO DEL ARCHIVO (Usando $_FILES)
$nombre_archivo_db = ''; 

if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
    
    $fileTmpPath = $_FILES['imagen']['tmp_name'];
    $fileName = $_FILES['imagen']['name'];
    
    // Generamos un nombre único para evitar conflictos y sobreescritura
    $extension = pathinfo($fileName, PATHINFO_EXTENSION);
    $nombre_archivo_db = time() . '_' . uniqid() . '.' . $extension; 
    $dest_path = $directorio_destino . $nombre_archivo_db;

    // Movemos el archivo temporal al directorio final
    if (!move_uploaded_file($fileTmpPath, $dest_path)) {
        // Fallo al mover (ej: permisos de carpeta)
        mysqli_close($conn);
        header("Location: añadecarta.php?error=fallo_subida_archivo");
        exit();
    }
} else {
    // Si la imagen es obligatoria en la creación:
    mysqli_close($conn);
    header("Location: añadecarta.php?error=imagen_requerida");
    exit();
}

// 3. Inserción en la base de datos (usando el nombre seguro)
$consulta = "INSERT INTO cartas_base (nombre, tipo, imagen) 
             VALUES ('$nombrecarta', '$tipo', '$nombre_archivo_db')"; // <-- CLAVE: Usamos $nombre_archivo_db

if (mysqli_query($conn, $consulta)) {
    // Éxito
    mysqli_close($conn);
    header("Location: listacartas.php?status=carta_creada"); // Redireccionar a la lista del admin
    exit();
} else {
    // Error SQL
    $error_msg = mysqli_error($conn);
    // Opcional: Eliminar el archivo que ya se subió para no dejar basura
    if (file_exists($dest_path)) {
        unlink($dest_path);
    }
    mysqli_close($conn);
    header("Location: añadiecarta.php?error=fallo_db&msg=" . urlencode($error_msg));
    exit();
}
// Código inalcanzable de tu versión original eliminado
?>