<?php

include("normal/seguridad.php");
include("conexion.php");
// ... incluye tu conexión y seguridad ...

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['deleteuser'])) {
    $usuarioeliminar = $_POST['deleteuser'];
    $nif_usuario_actual = $_SESSION['nif'];

    // ¡¡VERIFICACIÓN CRÍTICA!!
    if ($usuarioeliminar === $nif_usuario_actual) {
        // Lógica de eliminación segura...
        $consulta = "DELETE FROM usuarios WHERE nif = '$usuarioeliminar'";
        // ... ejecutar la consulta, cerrar sesión, y redirigir
        mysqli_query($conn, $consulta);
        echo mysqli_error($conn);
        mysqli_close($conn);
        header("LOCATION:formulario_bajas.php");
    } else {
        // Alerta de intento de manipulación
        die("Error de Seguridad: No puede eliminar otra cuenta.");
    }
}

?>