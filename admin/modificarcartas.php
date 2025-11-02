<?php
// update_carta.php
include("seguridad.php");
include("../conexion.php");

// Directorio de destino para las imágenes subidas
$directorio_destino = "../cartas/";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // 1. Obtener y Sanitizar Datos
    $id =$_POST['id_original'];
    $nombre =$_POST['nombre'];
    $tipo = $_POST['tipo'];
    $imagen_actual = $_POST['imagen']; // Nombre de la imagen actual
    
    $imagen_db = $imagen_actual; // Por defecto, mantenemos la imagen actual

    if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK && $_FILES['imagen']['size'] > 0) {
        
        $nombre_archivo_nuevo = basename($_FILES["imagen"]["name"]);
        $ruta_destino_nueva = $directorio_destino . $nombre_archivo_nuevo;
        
        // Intenta mover el archivo. Si tiene éxito, actualiza $imagen_db
        if (move_uploaded_file($_FILES["imagen"]["tmp_name"], $ruta_destino_nueva)) {
            $imagen_db = $nombre_archivo_nuevo; 
            // Nota: Con esta lógica simple, el archivo antiguo NO se borra.
        } else {
            // Manejo de error básico de subida
            $error_msg = "Error al mover el nuevo archivo al servidor.";
            // Podrías redirigir aquí con un mensaje de error si la subida es crítica
        }
    }

    // 3. Construir y Ejecutar la Sentencia UPDATE (usa $imagen_db, que puede ser la antigua o la nueva)
    $consulta = "UPDATE cartas_base SET 
            nombre = '$nombre', 
            tipo = '$tipo', 
            imagen = '$imagen_db'
            WHERE id = '$id'";

    if (mysqli_query($conn, $consulta)) {
        header("Location: listacartas.php?status=carta_update_success");
    } else {
        $error = mysqli_error($conn);
        header("Location: listacartas.php?status=carta_update_error&err=" . urlencode($error));
    }
    
    mysqli_close($conn);
    exit();
} else {
    // Acceso directo no permitido
    header("Location: listacartas.php");
    exit();
}