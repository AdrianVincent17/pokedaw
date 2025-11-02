<?php
include("../conexion.php");
$cartaeliminar = $_POST['idcartaeliminar'];

$consulta = "DELETE from cartas_base where id='$cartaeliminar'";
mysqli_query($conn, $consulta);
echo mysqli_error($conn);
mysqli_close($conn);
header("LOCATION:listacartas.php");
?>