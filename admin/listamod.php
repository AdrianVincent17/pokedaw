
<?php
include("../conexion.php");
$nifuser = $_POST['nif_carga'];
$consulta = "SELECT * from usuarios where nif='$nifuser'";
$result=mysqli_query($conn, $consulta);
echo mysqli_error($conn);
$row=mysqli_fetch_array($result);
$nif=$row['nif'];
$nombre=$row['nombre'];
$apellidos=$row['apellidos'];
$telefono=$row['telefono'];
$rol=$row['rol'];
$email=$row['email'];
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="../Bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<script src="../Bootstrap/js/bootstrap.bundle.min.js"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">
	<link href="../styles.css" rel="stylesheet">
	<link rel="icon" type="image/x-icon" href="../img/logofuego.ico">
	<title>MODIFICACION - ADMIN - POKEDAW</title>
</head>

<body class="secadmin">
	<!--Cabecera-->
	<?php
	include("headerAdmin.php")
	?>
	<!--Contenido de la página-->
	<section>
		<div class="container">
			<form action="modificacion.php" method="POST">
				<div class="row justify-content-center align-items-center ">
					<div class="col-11 col-sm-12 col-lg-11 col-xl-10 mb-4 mt-4">
						<div class="row justify-content-center titulos mt-4 mb-4">
							<div class="col-12 mt-4">
								<p class="h1 text-center" style="font-size: 25pt;">MODIFICAR USUARIO</p>
							</div>
							<div class="col-10">
								<hr>
							</div>

							<div class="col-12 col-md-8 mt-4">

								<div class="form-floating mb-3 ">
									<input type="hidden" name="nif_original" value="<?php echo $nifuser;?>">
									<input type="text" class="form-control" name="nif" id="nif" placeholder="NIF" value="<?php echo $nif;?>" required>
									<label for="nif">NIF</label>
								</div>
								<div class="form-floating mb-3 ">
									
									<input type="text" name="nombre" id="nombre" class="form-control"value="<?php echo $nombre;?>" placeholder="Nombre" required>
									<label for="nombre">Nombre</label>
								</div>
								<div class="form-floating mb-3 ">
									<input type="text" name="apellidos" id="apellidos" class="form-control" value="<?php echo $apellidos;?>" placeholder="Apellidos" required>
									<label for="apellidos">Apellidos</label>
								</div>
								<div class="form-floating mb-3 ">
									<input type="email" class="form-control" name="email" id="email" value="<?php echo $email;?>"  placeholder="Email">
									<label for="email">E-mail</label>
								</div>

								<div class="form-floating mb-3">
									<input type="number" class="form-control" name="telefono" id="telfono" value="<?php echo $telefono;?>" placeholder="Teléfono">
									<label for="telefono">telefono</label>
								</div>

								<div class="form-floating mb-3 ">
									<select class="form-select" id="rol" name="rol">
										<option value="1">Administrador</option>
										<option value="0">Usuario</option>
									</select>
									<label for="Tipo">Rol</label>
								</div>

								<div class="form-floating mb-3 ">
									<input type="password" class="form-control" name="pass" id="pass" placeholder="Contraseña">
									<label for="pass">Contraseña</label>
								</div>
								<div class="form-floating ">
									<input type="password" class="form-control" name="pass2" id="pass2" placeholder="Confirma tu contraseña">
									<label for="pass2">Confirma tu contraseña</label>
								</div>

								<div class="mt-2 mb-2">
									<span class="form-text text-light small float-end">Todos los campos son obligatorios</span>
								</div>

								<div class="d-grid col-12 mx-auto mb-4 mt-4">
									<button class="btn btn-lg" id="botonmodificar" type="submit">MODIFICAR CUENTA</button>
									<a class="text-center" href="indexAdmin.php">Volver</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>

	</section>
	<!--Pie de página-->
	<?php
	include("footerAdmin.php");
	?>
	<script>
    // 1. Obtener los elementos del DOM (Document Object Model)
    const pass1 = document.getElementById('pass');
    const pass2 = document.getElementById('pass2');
    const btn = document.getElementById('botonmodificar');

    // 2. Definir la función de validación
    function validarContrasenas() {
        const val1 = pass1.value;
        const val2 = pass2.value;

        // Condición de desactivación:
        // Si ambos están vacíos, o si ambos son iguales.
        // Si el usuario NO introduce contraseñas, permitimos la modificación.
        if (val1 === '' && val2 === '') {
            btn.disabled = false; // Si ambos están vacíos, se permite enviar (no se actualiza la pass)
            return;
        }

        // Condición de Error:
        // Si solo una está vacía O si las dos no son iguales.
        if (val1 !== val2) {
            btn.disabled = true; // Desactivar el botón
        } else {
            btn.disabled = false; // Activar el botón (son iguales y no vacías)
        }
    }

    // 3. Asignar la función a los eventos de entrada
    pass1.addEventListener('input', validarContrasenas);
    pass2.addEventListener('input', validarContrasenas);

    // Opcional: Ejecutar la validación al cargar la página si por alguna razón ya tenían texto
    validarContrasenas(); 
</script>
</body>

</html>