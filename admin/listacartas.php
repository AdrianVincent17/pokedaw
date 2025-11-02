<?php
include("seguridad.php");

?>
<?php
include("../conexion.php");
//Lógica del fichero
$consulta = "Select * from cartas_base";

$result = mysqli_query($conn, $consulta);


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
    <title>COLECCION-POKEDAW</title>
</head>

<body class="secadmin">
    <?php
    include("headerAdmin.php");
    include("navAdmin.php");
    ?>

    <section class="site-wrapper">
        <div class="container site-content">
            <div class="row justify-content-center align-items-center">
                <div class="col-2 mt-2">
                    <a href="añadecarta.php" class="btn ms-6 btn-danger">Añadir Nueva Carta</a>
                </div>
            </div>

            <div class="row justify-content-center titulos m-2">

                <?php
                // 3. Recorremos la consulta
                while ($row = mysqli_fetch_array($result)) {

                    $id = $row['id'];
                    $nombre = $row['nombre'];
                    // Construimos la ruta asumiendo que el campo 'imagen' ya contiene la ruta completa.
                    // Si solo contiene el nombre del archivo, ajusta la ruta base.
                    $ruta_imagen = '../cartas/' . $row['imagen'];
                ?>

                    <div class="col-12 col-sm-6 col-md-4 col-lg-3  text-center text-light">

                        <div class="card bg-transparent border-0 mt-2 mb-2 ">

                            <img src="<?php echo $ruta_imagen; ?>"
                                alt="<?php echo $nombre; ?>"
                                class="card-img-top img-fluid"
                                style="max-height: 250px; object-fit: contain;">

                            <div class="card-body">
                                <h5 class="card-title"><?php echo $nombre; ?></h5>
                                <form method='POST' action='cartamod.php' style='display:inline;'>
                                    <input type='hidden' name='modcarta' value='<?php echo $id; ?>'>
                                    <button type='submit' class='btn btn-sm btn-danger me-2'>Editar</button>
                                </form>

                                <form method='POST' action='eliminacarta.php' style='display:inline;'>
                                    <input type='hidden' name='idcartaeliminar' value='<?php echo $id; ?>'>
                                    <button type='submit' class='btn btn-sm btn-danger' onclick='return confirm("¿Seguro que quieres eliminar la carta <?php echo $nombre; ?>?")'>Eliminar</button>
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
    include("footerAdmin.php");
    mysqli_close($conn);
    ?>

</body>

</html>