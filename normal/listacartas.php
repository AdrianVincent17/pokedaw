<?php

// Este archivo funciona como la COLECCIÓN PRIVADA del usuario.
include("seguridad.php"); 
include("../conexion.php");

// Si por alguna razón la seguridad no establece la sesión NIF
if (!isset($_SESSION['nif'])) {
    header("Location: ../index.php"); 
    exit();
}

// Sanitizar el NIF antes de usarlo en la consulta
$nif_usuario = mysqli_real_escape_string($conn, $_SESSION['nif']);

// CONSULTA CLAVE: Unir cartas_base con coleccion, filtrando por el NIF
$consulta = "
    SELECT 
        cb.id, cb.nombre, cb.imagen, co.cantidad 
    FROM cartas_base cb
    INNER JOIN coleccion co ON cb.id = co.id_carta  
    WHERE co.id_user = '$nif_usuario'  /* <--- USANDO TU COLUMNA id_user */
    AND co.cantidad > 0 
    ORDER BY cb.nombre ASC
";
$result = mysqli_query($conn, $consulta);
$tiene_cartas = (mysqli_num_rows($result) > 0);

// ¡No olvides cerrar la conexión!
mysqli_close($conn); 
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
    <title>MI COLECCION-POKEDAW</title>
</head>

<body class="secuser">
    <?php
    include("headerNormal.php");
    include("navNormal.php");
    ?>
    <section class="site-wrapper">
        <div class="container site-content">
            <h2 class="text-light text-center mb-4">Mi Colección de Cartas</h2>
            
            <a href="añadecarta.php" class="btn btn-primary mb-3">Añadir Nueva Carta</a>

            <?php if (!$tiene_cartas) : ?>
                <div class="alert alert-info text-center mt-3">¡Aún no tienes cartas en tu colección!</div>
            <?php endif; ?>

            <div class="row justify-content-center m-2">
                <?php while ($row = mysqli_fetch_array($result)) : ?>
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 text-center text-light">
                        <div class="card bg-transparent border-0 mt-2 mb-2 ">
                            <img src="../cartas/<?php echo htmlspecialchars($row['imagen']); ?>" alt="<?php echo htmlspecialchars($row['nombre']); ?>">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo htmlspecialchars($row['nombre']); ?></h5>
                                <p class="badge bg-primary fs-6">Tienes: <?php echo (int)$row['cantidad']; ?></p>
                                
                                <form method='POST' action='ajustar_cantidad.php' style='display:inline;'>
                                    <input type='hidden' name='carta_id' value='<?php echo (int)$row['id']; ?>'>
                                    <button type='submit' class='btn btn-sm btn-warning me-2'>Ajustar</button>
                                </form>

                                <form method='POST' action='eliminar_carta_coleccion.php' style='display:inline;'>
                                    <input type='hidden' name='carta_id' value='<?php echo (int)$row['id']; ?>'>
                                    <button type='submit' class='btn btn-sm btn-danger' onclick='return confirm("¿Eliminar de tu colección?")'>Eliminar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </section>
    <script src="../Bootstrap/js/bootnavbar.js"></script>
    <script>
        new bootnavbar();
    </script>
    </body>
</html>