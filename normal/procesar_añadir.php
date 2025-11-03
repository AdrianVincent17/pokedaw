<?php
// procesar_añadir.php
include("seguridad.php"); 
include("../conexion.php");

if ($_SERVER["REQUEST_METHOD"] != "POST" || !isset($_SESSION['nif'])) {
    header("Location: listacartas.php"); exit();
}

$nif_seguro = mysqli_real_escape_string($conn, $_SESSION['nif']);
$carta_id = mysqli_real_escape_string($conn, $_POST['carta_id']);
$cantidad_a_añadir = (int)$_POST['cantidad'];

// 1. Intenta actualizar (si la carta ya está en la colección)
$sql_update = "UPDATE coleccion 
               SET cantidad = cantidad + $cantidad_a_añadir 
               WHERE id_user = '$nif_seguro' AND id_carta = '$carta_id'";

mysqli_query($conn, $sql_update);

// 2. Si no actualizó ninguna fila (no existía la carta), inserta
if (mysqli_affected_rows($conn) == 0) {
    $sql_insert = "INSERT INTO coleccion (id_user, id_carta, cantidad) 
                   VALUES ('$nif_seguro', '$carta_id', $cantidad_a_añadir)";
    mysqli_query($conn, $sql_insert);
}

if (mysqli_error($conn)) {
    header("Location: listacartas.php?error=fallo_añadir");
} else {
    header("Location: listacartas.php?status=carta_añadida");
}

mysqli_close($conn);
exit();
?>