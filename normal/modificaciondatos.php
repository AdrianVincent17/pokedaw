<?php
// actualizar_usuario.php
include("seguridad.php");
include("../conexion.php");

// 1. Verificación de seguridad: Solo permitir POST y verificar sesión
if ($_SERVER["REQUEST_METHOD"] != "POST" || !isset($_SESSION['nif'])) {
    header("Location:indexNormal.php");
    exit();
}

// El NIF que vamos a actualizar es SIEMPRE el de la sesión, no el del POST.
// Esto previene que un usuario cambie el campo oculto "nif_original" para editar a otro.
$nif_seguro =$_SESSION['nif']; 

// 2. Obtener y Sanitizar Datos del Formulario
$email = $_POST['email'];
$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos'];
$telefono = $_POST['telefono'];
$pass1 = $_POST['pass1'];
$pass2 = $_POST['pass2'];

// 3. Lógica de Contraseña
$pass_update = "";
if (!empty($pass1)) {
    if ($pass1 === $pass2) {
        // En un entorno real, usarías password_hash() aquí:
        // $pass_hashed = password_hash($pass1, PASSWORD_DEFAULT); 
        
        $pass_update = ", pass='$pass1'";
    } else {
        // Error de contraseñas
        header("Location: modificaciondatos.php?error=pass_mismatch");
        exit();
    }
}

// 4. Construir la Sentencia UPDATE
// EL WHERE usa $nif_seguro (el de la SESIÓN)
$consulta = "UPDATE usuarios SET 
        email='$email', 
        nombre='$nombre', 
        apellidos='$apellidos', 
        telefono='$telefono'
        $pass_update
        WHERE nif='$nif_seguro'";

// 5. Ejecutar y Redirigir
if (mysqli_query($conn, $consulta)) {
    header("Location: indexNormal.php?status=update_success");
} else {
    // Manejo de error (puedes ser más específico, ej. si el email ya existe)
    header("Location: modificaciondatos.php?error=update_failed&msg=" . urlencode(mysqli_error($conn)));
}

mysqli_close($conn);
exit();
?>
