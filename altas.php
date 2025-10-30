<?php
//Estableciendo la conexión
include ("conexion.php");
//recogida de datos
$nif=$_POST['nif'];
$nom=$_POST['nombre'];
$ape=$_POST['apellidos'];
$email=$_POST['email'];
$tel=$_POST['telefono'];
$rol=$_POST['rol'];
if($rol===null){
    $rol=0;
}
$pass=$_POST['pass'];
$pass2=$_POST['pass2'];

if($pass!==$pass2){
    $_SESSION['error']=true;
    header("LOCATION:registro.php");
}else{
    $consulta = "INSERT INTO usuarios (nif,email,nombre,apellidos,telefono,pass,rol) 
VALUES ('$nif','$email','$nom','$ape','$tel','$pass','$rol')";

//ejecutamos la sentencia SQL
mysqli_query($conn,$consulta);
echo mysqli_error($conn);
mysqli_close($conn);
header ("LOCATION:index.php");
}

?>