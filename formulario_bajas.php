<?php
// ¡Paso 1: Asegúrate de que esta línea exista en seguridad.php!
// session_start(); 

include("normal/seguridad.php");

// =========================================================
// 💡 SOLUCIÓN: Definir la variable con el valor de la sesión.
// =========================================================
if (isset($_SESSION['dni'])) {
    $nif_usuario_actual = $_SESSION['dni'];
} else {
    // Si el usuario no ha iniciado sesión, lo detenemos aquí.
    die("Acceso denegado. Debes iniciar sesión para ver esta página.");
}
// =========================================================
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
    <link href="styles.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="../img/logofuego.ico">
    <title>ELIMINAR CUENTA-POKEDAW</title>
</head>

<body>
    <?php
    include("normal/headerNormal.php");
    include("normal/navNormal.php");
    ?>

    <section class="secadmin">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-9 col-sm-8 col-md-6 col-xl-4 mx-auto d-block">
                    <div class="row justify justify-content-center titulos mt-5 mb-4">
                        <div class="col-12 mt-4">
                            <?php
                            include("conexion.php");
                            
                            // 2. MODIFICAMOS LA CONSULTA: SOLO EL USUARIO ACTUAL
                            $consulta = "SELECT email FROM usuarios WHERE nif = '" . mysqli_real_escape_string($conn, $nif_usuario_actual) . "'";
                            
                            $result = mysqli_query($conn, $consulta);
                            $usuario = mysqli_fetch_assoc($result); // Obtenemos la única fila

                            // 3. MOSTRAMOS EL FORMULARIO SOLO SI SE ENCUENTRA EL USUARIO
                            if ($usuario) {
                                $email_usuario_actual = $usuario['email'];
                                // ... (el resto del formulario HTML)
                            ?>
                                <h4 class="text-center mb-4">Confirmar Eliminación de Cuenta</h4>
                                
                                <form action="bajas.php" method="POST">
                                    <p class="text-center">Estás a punto de eliminar la cuenta asociada al E-mail:</p>
                                    <p class="text-center"><strong><?php echo $email_usuario_actual; ?></strong></p>
                                    
                                    <input type="hidden" name="deleteuser" value="<?php echo htmlspecialchars($nif_usuario_actual); ?>">
                                    
                                    <div class="d-grid gap-2">
                                        <input type="submit" class="btn btn-danger mt-3" value="Eliminar Mi Cuenta Permanentemente">
                                    </div>
                                </form>
                            <?php
                            } else {
                                echo "<p class='text-center text-danger'>Error: No se encontró la información de su cuenta. Su sesión NIF no existe en la base de datos.</p>";
                            }

                            //Cerramos la conexión
                            mysqli_close($conn);
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php
    include("normal/footerNormal.php");
    ?>

    <script src="../Bootstrap/js/bootnavbar.js"></script>
    <script>
        new bootnavbar();
    </script>

</body>

</html>