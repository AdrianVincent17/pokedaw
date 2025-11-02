<?php
//Estableciendo la conexión
include("../conexion.php");
//recogida de datos
$nombrecarta = $_POST['nombrecarta'];
$tipo = $_POST['tipo'];
$imagen = $_POST['imagen'];


$consulta = "INSERT INTO cartas_base (nombre,tipo,imagen) 
VALUES ('$nombrecarta','$tipo','$imagen')";

//ejecutamos la sentencia SQL
mysqli_query($conn, $consulta);
echo mysqli_error($conn);
mysqli_close($conn);
header("LOCATION:listacartas.php");
