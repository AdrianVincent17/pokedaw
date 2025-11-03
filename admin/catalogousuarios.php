<?php
// catalogo_cartas_usuario.php (Vista Admin)
// Aseguramos que la sesión inicia
include("seguridad.php"); // <--- CORREGIDO: Usamos la seguridad para el rol Admin
include("../conexion.php");

// Si la seguridad_admin.php no incluye session_start(), añádelo arriba.
// Comprobamos la conexión aquí, en caso de que la seguridad_admin.php no lo haga.
if (!$conn) {
    die("Error de conexión a la base de datos.");
}

$usuarios = [];
$cartas_del_usuario = [];
$usuario_seleccionado_email = '';
$usuario_seleccionado_nif = '';

// 1. OBTENER Y LLENAR ARRAY $usuarios para el desplegable (LÓGICA FALTANTE)
$sql_usuarios = "SELECT NIF, email, nombre, apellidos FROM usuarios ORDER BY email ASC";
$result_usuarios = mysqli_query($conn, $sql_usuarios); // <--- AÑADIDO: Ejecutar la consulta

if ($result_usuarios) {
    while ($row = mysqli_fetch_assoc($result_usuarios)) {
        // Concatenamos nombre y email para una mejor vista en el desplegable
        $row['nombre_completo'] = $row['nombre'] . ' ' . $row['apellidos'];
        $usuarios[] = $row; 
    }
} else {
    // Manejo de error si la consulta SQL falla
    die("Error al obtener la lista de usuarios: " . mysqli_error($conn));
}


// 2. Procesar la selección (Recibe POST)
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['usuario_email'])) {
    
    $usuario_seleccionado_email = mysqli_real_escape_string($conn, $_POST['usuario_email']);
    
    // Obtener NIF del usuario seleccionado (usando el array que ya cargamos)
    foreach ($usuarios as $user) {
        if ($user['email'] === $usuario_seleccionado_email) {
            $usuario_seleccionado_nif = $user['NIF']; // Usamos 'NIF' mayúscula según tu tabla
            break;
        }
    }
    
    if ($usuario_seleccionado_nif) {
        // CONSULTA CLAVE: Colección del usuario seleccionado
        $sql_cartas = "
            SELECT 
                cb.nombre, cb.imagen, cb.tipo, co.cantidad 
            FROM cartas_base cb
            INNER JOIN coleccion co ON cb.id = co.id_carta
            WHERE co.id_user = '$usuario_seleccionado_nif'
            AND co.cantidad > 0
            ORDER BY cb.nombre ASC
        ";
        
        $result_cartas = mysqli_query($conn, $sql_cartas);
        
        if ($result_cartas) {
            while ($row = mysqli_fetch_assoc($result_cartas)) {
                $cartas_del_usuario[] = $row;
            }
        }
    }
}
// NOTA: Cerramos la conexión al final del HTML.
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
	<title>CATALOGO USUARIOS-POKEDAW</title>


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
                                <?php echo htmlspecialchars($user['email']) . " (" . htmlspecialchars($user['nombre_completo']) . ")"; ?>
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
                                    <img src="../cartas/<?php echo htmlspecialchars($carta['imagen']); ?>" alt="<?php echo htmlspecialchars($carta['nombre']); ?>" class="max-width:250px img-fluid mb-2">
                                    <h5 class="card-title text-light text-center me-5"><?php echo htmlspecialchars($carta['nombre']); ?></h5>
                                    <p class="mx-5 ms-2 badge bg-success fs-5">Cantidad: <?php echo (int)$carta['cantidad']; ?></p>
                                    
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
                    <a href="indexAdmin.php" class="mb-4 btn ms-6 btn-danger">Volver Atras</a>
                </div>
            </div>
        </div>
    </section>

    <?php include("footerAdmin.php");
    // Cerramos la conexión aquí
    mysqli_close($conn); ?>
    
</body>
</html>