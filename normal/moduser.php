<?php
// Usaremos "seguridad_usuario.php" para asegurar que la sesión esté iniciada
// y que el usuario no sea un administrador tratando de acceder aquí.
// Simplemente asumiremos que la sesión ya está iniciada y $_SESSION['nif'] existe.
include("seguridad.php");
include("../conexion.php");

if (!isset($_SESSION['nif'])) {
	header("Location:../index.php");
	exit();
}

$nif_usuario = $_SESSION['nif'];

// 1. Consulta SELECT para cargar los datos del usuario logueado
$consulta = "SELECT nif, email, nombre, apellidos, telefono FROM usuarios WHERE nif = '$nif_usuario'";
$result = mysqli_query($conn, $consulta);

if ($result && $row = mysqli_fetch_assoc($result)) {
	$nif_usuario = $row['nif'];
	$email = $row['email'];
	$nombre = $row['nombre'];
	$telefono = $row['telefono'];
	$apellidos = $row['apellidos'];
} else {
	// Si por alguna razón el NIF no existe en la DB


}
mysqli_close($conn);
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>MODIFICAR MIS DATOS</title>
	<link href="../Bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="../styles.css" rel="stylesheet">
</head>

<body class="secuser">
	<?php include("headerNormal.php"); ?>

	<section class="site-wrapper">
		<div class="container site-content">
			<h2 class="text-center mb-4 text-light">Modificar Mis Datos</h2>

			<form action="modificaciondatos.php" method="POST" class="col-md-6 mx-auto text-light">

				<div class="mb-3">
					<label for="nif" class="form-label">NIF</label>
					<input type="text" class="form-control" id="nif" value="<?php echo $nif_usuario; ?>" disabled>
					<input type="hidden" name="nif_original" value="<?php echo $nif_usuario; ?>">
				</div>

				<div class="mb-3">
					<label for="email" class="form-label">E-mail</label>
					<input type="email" class="form-control" name="email" id="email"
						value="<?php echo $email; ?>" required>
				</div>

				<div class="mb-3">
					<label for="nombre" class="form-label">Nombre</label>
					<input type="text" class="form-control" name="nombre" id="nombre"
						value="<?php echo $nombre; ?>" required>
				</div>

				<div class="mb-3">
					<label for="apellidos" class="form-label">Apellidos</label>
					<input type="text" class="form-control" name="apellidos" id="apellidos"
						value="<?php echo $apellidos; ?>">
				</div>

				<div class="mb-3">
					<label for="telefono" class="form-label">Teléfono</label>
					<input type="tel" class="form-control" name="telefono" id="telefono"
						value="<?php echo $telefono; ?>">
				</div>

				<div class="mb-3">
					<label for="pass1" class="form-label">Nueva Contraseña (Dejar vacío para mantener la actual)</label>
					<input type="password" class="form-control" name="pass1" id="pass1">
				</div>
				<div class="mb-3">
					<label for="pass2" class="form-label">Confirmar Contraseña</label>
					<input type="password" class="form-control" name="pass2" id="pass2">
				</div>

				<div class="row justify-content-around">
					<div class="col-6">
						<button type="submit" class="btn btn-success ms-2 me-2 mb-4">Guardar Cambios</button>
						<a href="indexNormal.php" class="btn btn-secondary mb-4">Cancelar</a>
					</div>
				</div>
			</form>
		</div>
	</section>

	<?php include("footerNormal.php"); ?>
</body>

</html>