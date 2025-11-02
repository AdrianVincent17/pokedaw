<?php
// Primero, inicia la sesión y asegura la seguridad
include("seguridad.php");

// Asume que 'seguridad.php' ya hizo session_start() y verificó el login.
if (!isset($_SESSION['nif'])) {
    // Si la sesión no tiene NIF (o el check de seguridad falló), redirigir
    header("Location: ../index.php");
    exit();
}

include("../conexion.php");

// 1. Obtener y sanitizar el NIF del usuario logueado
$nif_usuario = $_SESSION['nif'];

// 2. Lógica del fichero: Consulta con INNER JOIN
// La consulta selecciona los datos de la carta (cb)
// Y hace JOIN con la tabla de colecciones (co), filtrando por el NIF y cantidad > 0.
$consulta = "
    SELECT 
        cb.id, 
        cb.nombre, 
        cb.tipo, 
        cb.imagen,
        co.cantidad 
    FROM cartas_base cb
    INNER JOIN coleccion co ON cb.id = co.id_carta
    WHERE co.id_user = '$nif_usuario' 
    AND co.cantidad > 0
    ORDER BY cb.nombre ASC
";

$result = mysqli_query($conn, $consulta);

// Manejo de error básico
if (!$result) {
    die("Error al consultar la colección: " . mysqli_error($conn));
}

// 3. Opcional: Crear una variable para mostrar un mensaje si no hay cartas
$tiene_cartas = (mysqli_num_rows($result) > 0);

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
	<title>COLECCION-USUARIO-POKEDAW</title>


</head>

<body class="secadmin">
    <?php
    include("headerNormal.php");
    include("navNormal.php");
    ?>

    <section class="site-wrapper">
        <div class="container site-content">
            <h2 class="text-light text-center mb-4">Mi Colección de Cartas</h2>
              <div class="row justify-content-center align-items-center">
                <div class="col-2 mt-2">
                    <a href="añadecarta.php" class="btn ms-6 btn-danger">Añadir Nueva Carta</a>
                </div>

            <?php if (!$tiene_cartas) : ?>
                <div class="alert alert-info text-center mt-5">
                    ¡Aún no tienes cartas en tu colección! Empieza a coleccionar.
                </div>
            <?php endif; ?>

            <div class="row justify-content-center titulos m-2">

                <?php
                // 4. Recorremos la consulta (solo se ejecuta si hay resultados)
                while ($row = mysqli_fetch_array($result)) {

                    $id = $row['id'];
                    $nombre = $row['nombre'];
                    $cantidad = (int)$row['cantidad']; // Obtenemos la cantidad
                    $ruta_imagen = '../cartas/' .$row['imagen'];
                ?>

                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 text-center text-light">

                        <div class="card bg-transparent border-0 mt-2 mb-2 ">

                            <img src="<?php echo $ruta_imagen; ?>"
                                alt="<?php echo $nombre; ?>"
                                class="card-img-top img-fluid"
                                style="max-height: 250px; object-fit: contain;">

                            <div class="card-body">
                                <h5 class="card-title"><?php echo $nombre; ?></h5>
                                
                                <p class="badge bg-primary fs-6">Tienes: <?php echo $cantidad; ?></p>
                                
                                <form method='POST' action='cartamod.php' style='display:inline;'>
                                    <input type='hidden' name='modcarta' value='<?php echo $id; ?>'>
                                    <button type='submit' class='btn btn-sm btn-warning me-2'>Ajustar Cantidad</button>
                                </form>

                                <form method='POST' action='eliminacarta.php' style='display:inline;'>
                                    <input type='hidden' name='idcartaeliminar' value='<?php echo $id; ?>'>
                                    <button type='submit' class='btn btn-sm btn-danger' onclick='return confirm("¿Seguro que quieres eliminar esta carta de tu colección?")'>Eliminar</button>
                                </form>

                            </div>
                        </div>
                    </div>
                <?php
                } // Cierre del while
                ?>

            </div>
        </div>
    </section>

    <?php
    include("footerNormal.php");
    mysqli_close($conn);
    ?>

</body>

</html>