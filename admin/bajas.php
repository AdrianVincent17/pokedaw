<?php
include("../conexion.php");
$usuarioeliminar = $_POST['deleteuser'];

$consulta = "DELETE from usuarios where nif='$usuarioeliminar'";
mysqli_query($conn, $consulta);
echo mysqli_error($conn);
mysqli_close($conn);
header("LOCATION:listausers.php");
?>