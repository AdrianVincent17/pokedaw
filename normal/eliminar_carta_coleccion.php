<?php

include("../conexion.php");
include("seguridad.php"); // Asume que verifica $_SESSION['nif']

// 1. Verificación de Seguridad
if ($_SERVER["REQUEST_METHOD"] != "POST" || !isset($_SESSION['nif']) || !isset($_POST['carta_id'])) {
    // Si el acceso no es por POST, o faltan datos, redirigir
    header("Location: listacartas.php"); 
    exit();
}

// 2. Obtener y Sanitizar Datos
// NIF del usuario logueado (clave de seguridad)
$nif_seguro = mysqli_real_escape_string($conn, $_SESSION['nif']); 
// ID de la carta a eliminar
$id_carta = mysqli_real_escape_string($conn, $_POST['carta_id']);

// 3. Consulta DELETE SEGURA
// Usamos id_user y id_carta para asegurar que solo se elimina la carta de la colección del usuario logueado.
$sql = "DELETE FROM coleccion 
        WHERE id_user = '$nif_seguro' 
        AND id_carta = '$id_carta'";

if (mysqli_query($conn, $sql)) {
    // Éxito: Redirigir a la vista de colección
    header("Location: listacartas.php?status=carta_eliminada_coleccion");
} else {
    // Error SQL
    header("Location: listacartas.php?error=no_se_pudo_eliminar_coleccion&msg=" . urlencode(mysqli_error($conn)));
}

mysqli_close($conn);
exit();
?>