<?php
include("seguridad.php");
include("../conexion.php"); 

$datos_carta = [];
$error_carga = false;

// 1. Obtener el ID de la carta enviado por POST desde la lista
if (isset($_POST['modcarta'])) {
    // Usamos mysqli_real_escape_string para seguridad
    $idcarta =$_POST['modcarta'];
    
    // 2. Consulta SELECT para cargar los datos de la carta
    $consulta= "SELECT * FROM cartas_base WHERE id = '$idcarta'";
    
    $result= mysqli_query($conn, $consulta);
    
    if ($result && $row = mysqli_fetch_assoc($result)) {
        $datos_carta = $row; // Datos cargados correctamente
    } else {
        // Redirigir si la carta no se encuentra
        header("LOCATION:listacartas.php?status=carta_not_found");
        exit();
    }

} else {
    // Redirigir si no se recibió el ID
    header("Location:listacartas.php");
    exit();
}

// No cerramos la conexión aquí porque el HTML la necesita para el footer

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>MODIFICAR CARTA - ADMIN</title>
    <link href="../Bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../styles.css" rel="stylesheet">
</head>

<body class="secadmin">
    <?php include("headerAdmin.php"); ?>

    <section>
        <div class="container">
            <h2 class="text-center mb-4 text-light">Modificar Carta: <?php $datos_carta['nombre']; ?></h2>
            
            <form action="modificarcartas.php" method="POST" enctype="multipart/form-data" class="col-md-6 mx-auto text-light">
                
                <input type="hidden" name="id_original" value="<?php echo $datos_carta['id']; ?>">

                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" name="nombre" id="nombre" 
                           value="<?php echo $datos_carta['nombre']; ?>" required>
                </div>
                
                <div class="mb-3">
                    <label for="tipo" class="form-label">Tipo</label>
                    <input type="text" class="form-control" name="tipo" id="tipo" 
                           value="<?php echo $datos_carta['tipo']; ?>" required>
                </div>
                
                <input type="hidden" name="imagen_actual" value="<?php echo $datos_carta['imagen']; ?>">

                <div class="mb-3">
                    <label for="imagen" class="form-label">Cambiar Imagen (Seleccionar solo si quieres subir una nueva)</label>
                    <input type="file" class="form-control" name="imagen" id="imagen">
                    <p class="mt-2">Imagen actual: <?php echo $datos_carta['imagen']; ?></p> 
                    <img src="../cartas/<?php echo $datos_carta['imagen']; ?>" style="max-width: 100px; border: 1px solid #ccc;">
                </div>
                
                <button type="submit" class="btn btn-success me-2">Guardar Cambios</button>
                <a href="listacartas.php" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </section>

    <?php include("footerAdmin.php"); mysqli_close($conn); ?>
</body>
</html>