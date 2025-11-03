<?php
// ajustar_cantidad.php
include("../conexion.php");
include("seguridad.php");

// Verificación de seguridad básica
if (!isset($_SESSION['nif'])) {
    header("Location: ../index.php");
    exit();
}

$nif_seguro = mysqli_real_escape_string($conn, $_SESSION['nif']);

// --- LÓGICA 2: PROCESAR EL FORMULARIO DE ACTUALIZACIÓN ---
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['nueva_cantidad'])) {
    
    $id_carta = mysqli_real_escape_string($conn, $_POST['carta_id']);
    $nueva_cantidad = (int)$_POST['nueva_cantidad']; 

    // Si la cantidad es 0 o menos, la eliminamos de la colección (DELETE)
    if ($nueva_cantidad <= 0) {
        $sql = "DELETE FROM coleccion 
                WHERE id_user = '$nif_seguro' AND id_carta = '$id_carta'";
        $msg = "cantidad_eliminada";
    } else {
        // Si es mayor que 0, actualizamos la cantidad (UPDATE)
        $sql = "UPDATE coleccion 
                SET cantidad = $nueva_cantidad 
                WHERE id_user = '$nif_seguro' AND id_carta = '$id_carta'";
        $msg = "cantidad_actualizada";
    }

    if (mysqli_query($conn, $sql)) {
        // Redirigir a la vista de colección (listacartas.php)
        header("Location: listacartas.php?status=" . $msg);
    } else {
        header("Location: listacartas.php?error=fallo_actualizacion");
    }
    mysqli_close($conn);
    exit();
} 

// --- LÓGICA 1: MOSTRAR EL FORMULARIO ---
elseif ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['carta_id'])) {
    // Si se llegó desde listacartas.php (con el ID de la carta)
    $id_carta_a_ajustar = mysqli_real_escape_string($conn, $_POST['carta_id']);
    
    // Consulta para obtener el nombre de la carta y la cantidad actual del usuario
    $consulta = "
        SELECT cb.nombre, co.cantidad 
        FROM cartas_base cb
        INNER JOIN coleccion co ON cb.id = co.id_carta
        WHERE co.id_user = '$nif_seguro' AND co.id_carta = '$id_carta_a_ajustar'";

    $result = mysqli_query($conn, $consulta);
    
    if ($result && $row = mysqli_fetch_assoc($result)) {
        $nombre_carta = htmlspecialchars($row['nombre']);
        $cantidad_actual = (int)$row['cantidad'];
    } else {
        // Si la carta no se encuentra en su colección (posible manipulación)
        header("Location: listacartas.php?error=carta_no_encontrada");
        mysqli_close($conn);
        exit();
    }
} else {
    // Acceso directo sin POST, redirigir
    header("Location: listacartas.php");
    mysqli_close($conn);
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" />
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">
	<link href="../styles.css" rel="stylesheet">
	<link rel="icon" type="image/x-icon" href="../img/logofuego.ico">
	<title>AJUSTAR-CANTIDAD-POKEDAW</title>


</head>
<body class="secuser">
    <?php include("headerNormal.php"); ?> 

    <section class="site-wrapper">
        <div class="container site-content mt-5">
            <h2 class="text-center text-light">Ajustar Cantidad de: <?php echo $nombre_carta; ?></h2>
            
            <form action="ajustar_cantidad.php" method="POST" class="col-md-4 mx-auto text-light p-4 border rounded">
                
                <div class="mb-3">
                    <label for="cantidad_actual" class="form-label">Cantidad Actual</label>
                    <input type="number" class="form-control" value="<?php echo $cantidad_actual; ?>" disabled>
                </div>
                
                <div class="mb-3">
                    <label for="nueva_cantidad" class="form-label">Nueva Cantidad</label>
                    <input type="number" class="form-control" name="nueva_cantidad" id="nueva_cantidad" 
                           value="<?php echo $cantidad_actual; ?>" min="0" required>
                    <div class="form-text text-warning">Si la cantidad es 0, la carta será eliminada de tu colección.</div>
                </div>

                <input type="hidden" name="carta_id" value="<?php echo $id_carta_a_ajustar; ?>">
                
                <button type="submit" class="btn btn-success me-2">Guardar Cantidad</button>
                <a href="listacartas.php" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </section>

    <?php include("footerNormal.php"); ?>
</body>
</html>