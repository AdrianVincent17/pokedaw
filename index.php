<?php
	session_start();
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="./Bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<script src="./Bootstrap/js/bootstrap.bundle.min.js"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">
	<link href="styles.css" rel="stylesheet">
	<link rel="icon" type="image/x-icon" href="img/logofuego.ico">
	<title>LOGIN - POKEDAW</title>
</head>

<body>
	<h1>index</h1>
	<!--Cabecera-->
	<?php
	include("conexion.php");
	if ($_SERVER['REQUEST_METHOD'] === "POST") {
		if ((isset($_POST['email']) && isset($_POST['pass']))) {
			$email = $_POST['email'];
			$pass = $_POST['pass'];
			$consulta = "SELECT * FROM usuarios where email='$email' AND pass='$pass'";
			$result = mysqli_query($conn, $consulta);
			echo mysqli_error($conn);

			if (mysqli_num_rows($result) == 1) {
				//Usuario registrado
				$row = mysqli_fetch_assoc($result);
				if ($row["rol"] == 0) {
					$_SESSION['name']=$row["nombre"];
					header("LOCATION:normal/indexNormal.php");
				} else if ($row["rol"] == 1) {
					header("LOCATION:admin/indexAdmin.php");
				} else {
					$sms = "Rol incorrecto, consulte con el administrador";
				}
			} else if (mysqli_num_rows($result) > 1) {
				//Fallo de integridad en la bbdd
			} else {
				$sms = "Usuario no registrado o pass incorrecto o email incorrecto";
			}
		}
	}


	include("header.php");
	?>

	<!--Contenido de la página-->
	<section>
		<div class="container">
			<div class="row justify-content-center align-items-center">
				<div class="col-9 col-sm-8 col-md-6 col-xl-4 mb-5 mt-3">
					<div class="row justify justify-content-center titulos mt-5 mb-4">
						<div class="col-12 mt-5">
							<p class="h1 text-center">ACCEDE A TU CUENTA</p>
						</div>
						<div class="col-8 mt-4">
							<div class="row">
								<form action="" method="POST">
									<div class="col-12">
										<input type="email" name="email" class="form-control" placeholder="E-MAIL" required>
										<span class="form-text text-white small">EJ: admin@pokedaw.com</span>
									</div>
									<div class="col-12 mt-3 mb-2">
										<input type="password" class="form-control" id="pass" name="pass" placeholder="CONTRASEÑA" required>
									</div>
									<div class="col-12 mt-4 d-grid mb-5">
										<button class="btn btn-lg" type="submit">INICIAR SESIÓN</button>
										<?php
										if (isset($sms)) {
											echo "$sms";
										}
										?>

									</div>
								</form>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-12 mb-1">
							<p class="text-center cuenta">¿NECESITAS UNA CUENTA?</p>
							<a class="btn w-100" href="registro.php" role="buttom">REGÍSTRATE</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--Pie de página-->
	<?php
	include("footer.php");
	?>
</body>

</html>