<?php
    $usuarioeliminar=$_POST['deleteuser'];
    include("../conexion.php");
    $consulta="DELETE from usuarios where nif='$usuarioeliminar'";
    mysqli_query($conn, $consulta);
    echo mysqli_error($conn);
    mysqli_close($conn);
    header("LOCATION:formulario_bajas.php");
?>