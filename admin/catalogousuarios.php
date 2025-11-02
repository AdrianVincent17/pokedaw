<?php
include("seguridad.php"); // Asegura que solo el Admin pueda ver esto
include("../conexion.php");

$usuarios = [];
$cartas_del_usuario = [];
$usuario_seleccionado_email = '';
$usuario_seleccionado_nif = '';

// 1. OBTENER TODOS LOS USUARIOS PARA EL MENÚ DESPLEGABLE
$sql_usuarios = "SELECT nif, email FROM usuarios ORDER BY email ASC";
$result_usuarios = mysqli_query($conn, $sql_usuarios);

if ($result_usuarios) {
    while ($row = mysqli_fetch_assoc($result_usuarios)) {
        $usuarios[] = $row;
    }
}

// 2. PROCESAR LA SELECCIÓN DEL FORMULARIO
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['usuario_email'])) {

    $usuario_seleccionado_email = mysqli_real_escape_string($conn, $_POST['usuario_email']);

    // Buscar el NIF del usuario seleccionado (lo necesitamos para la tabla 'colecciones')
    $sql_nif = "SELECT nif FROM usuarios WHERE email = '$usuario_seleccionado_email'";
    $result_nif = mysqli_query($conn, $sql_nif);

    if ($result_nif && $row_nif = mysqli_fetch_assoc($result_nif)) {
        $usuario_seleccionado_nif = $row_nif['nif'];

        // 3. CONSULTA PARA OBTENER LAS CARTAS DE ESE USUARIO
        // Asumimos: 
        // - 'colecciones' es la tabla que une usuarios con cartas.
        // - 'colecciones.usuario_nif' guarda el NIF.
        // - 'colecciones.carta_id' guarda el ID de la carta.

        $sql_cartas = "
            SELECT 
                cb.nombre, 
                cb.tipo, 
                cb.imagen, 
                co.cantidad
            FROM cartas_base cb
            INNER JOIN coleccion co ON cb.id = co.id_carta
            WHERE co.id_user = '$usuario_seleccionado_nif'
            AND co.cantidad > 0
            ORDER BY cb.nombre ASC
        ";

        $result_cartas = mysqli_query($conn, $sql_cartas);

        if ($result_cartas) {
            while ($row_carta = mysqli_fetch_assoc($result_cartas)) {
                $cartas_del_usuario[] = $row_carta;
            }
        }
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>CARTAS USUARIOS - ADMIN</title>
    <link href="../Bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../styles.css" rel="stylesheet">
    <script src="../Bootstrap/js/bootnavbar.js"></script>
    <script>
        new bootnavbar();
    </script>
    <style>
        /* Estilos básicos para las cartas */
        .card-item {
            border: 1px solid #444;
            padding: 10px;
            margin-bottom: 20px;
            text-align: center;
            background-color: #333;
            color: #fff;
            border-radius: 8px;
        }

        .card-item img {
            max-height: 150px;
            width: auto;
            border-radius: 4px;
        }
    </style>
</head>

<body class="secadmin">
    <?php include("headerAdmin.php"); ?>

    <section class="site-wrapper">
        <div class="container site-content">
            <h2 class="text-center mb-5 text-light">Coleccion de usuarios</h2>

            <form action="catalogousuarios.php" method="POST" class="col-md-6 mx-auto mb-5">
                <div class="input-group">
                    <label for="usuario_email" class="input-group-text">Seleccionar Usuario:</label>
                    <select name="usuario_email" id="usuario_email" class="form-select" required onchange="this.form.submit()">
                        <option value="">-- Elige un E-mail --</option>
                        <?php foreach ($usuarios as $user) : ?>
                            <option value="<?php echo htmlspecialchars($user['email']); ?>"
                                <?php if ($usuario_seleccionado_email == $user['email']) echo 'selected'; ?>>
                                <?php echo htmlspecialchars($user['email']); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </form>

            <?php if ($usuario_seleccionado_email) : ?>
                <hr class="text-light">
                <h3 class="text-light text-center mb-4">CARTAS DE:<br> <?php echo htmlspecialchars($usuario_seleccionado_email); ?></h3>

                <?php if (!empty($cartas_del_usuario)) : ?>
                    <div class="row row-cols-1 row-cols-md-3 g-4">
                        <?php foreach ($cartas_del_usuario as $carta) : ?>
                            <div class="col">
                                <div class="card-item">
                                    <img src="../cartas/<?php echo htmlspecialchars($carta['imagen']); ?>" alt="<?php echo htmlspecialchars($carta['nombre']); ?>" class="img-fluid mb-2">
                                    <h5><?php echo htmlspecialchars($carta['nombre']); ?></h5>
                                    <p>Tipo: <?php echo htmlspecialchars($carta['tipo']); ?></p>
                                    <p class="badge bg-success fs-5">Cantidad: <?php echo (int)$carta['cantidad']; ?></p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php else : ?>
                    <div class="alert alert-info text-center">
                        El usuario <?php echo htmlspecialchars($usuario_seleccionado_email); ?> no tiene cartas en su colección.
                    </div>
                <?php endif; ?>
            <?php endif; ?>

            <div class="row justify-content-center align-items-center">
                <div class="col-2 mt-2">
                    <a href="indexAdmin.php" class="btn ms-6 btn-danger">Volver Atras</a>
                </div>
            </div>
        </div>
    </section>

    <?php include("footerAdmin.php");
    mysqli_close($conn); ?>


</body>

</html>