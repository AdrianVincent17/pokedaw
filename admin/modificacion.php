<?php
// modificacion.php
include("../conexion.php");

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    
    // NIF que NO SE PUEDE CAMBIAR, usado en el WHERE
    $nif_original = $_POST['nif_original']; 
    
    // Datos que PUEDEN ESTAR MODIFICADOS, usados en el SET
    $nif_nuevo = $_POST['nif'];
    $email = $_POST['email'];
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $telefono = $_POST['telefono'];
    $pass = $_POST['pass']; 
    $rol = $_POST['rol'];

    // Lógica para no actualizar la contraseña si está vacía
    $pass_update = "";
    if (!empty($pass)) {
        $pass_update = ", pass='$pass'";
    }

    // Consulta SQL CORREGIDA (sin la coma extra, usando la variable $nif_original en el WHERE)
    $consulta = "UPDATE usuarios SET 
        nif='$nif_nuevo', 
        email='$email', 
        nombre='$nombre', 
        apellidos='$apellidos', 
        telefono='$telefono', 
        rol='$rol'
        $pass_update
        WHERE nif='$nif_original'";

    $result = mysqli_query($conn, $consulta);
    
    if ($result) {
        // Redirección exitosa (CORRECCIÓN A)
        header("LOCATION:indexAdmin.php?status=update_success");
    } else {
        // Si hay un error, lo registramos.
        // echo "Error SQL: " . mysqli_error($conn); // Descomentar para depuración
        header("LOCATION:listamod.php?nif=" . $nif_original . "&status=update_fail");
    }

    mysqli_close($conn);
    exit(); // Finaliza el script (CORRECCIÓN A)
} else {
    // Si alguien intenta acceder sin POST
    header("LOCATION:listausers.php");
    exit();
}
