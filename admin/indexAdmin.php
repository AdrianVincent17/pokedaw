<?php
	include("seguridad.php");
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
	<title>GESTIÓN-ADMIN- POKEDAW</title>


</head>

<body>
	<h1>ADMIN</h1>

	<!--Cabecera-->
	<?php
	include("headerAdmin.php");
	?>

	<!--Barra de navegación-->
	<?php
	include("navAdmin.php");
	?>
	<!--Contenido de la página-->
	<section>
		<div class="container">
			<div class="row justify-content-center align-items-center">
				<div class="col-9 col-sm-8 col-md-6 col-xl-4 mx-auto d-block">
					<div class="row justify justify-content-center titulos mt-5 mb-4">
						<div class="col-12 mt-4">
							<p class="h1 text-center">BIENVENIDO</p>
							<p class="h1 text-center"> <?php echo $_SESSION['name']; ?></p>
						</div>
						<div class="col-12 mt-4 mb-2">
							<div class="row justify-content-center align-items-center">
								<p class="h1 text-center">ROL DE USUARIO</p>
								<p class="h1 text-center"> ADMINISTRADOR</p>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
	</section>


	<script src="./Bootstrap/js/bootnavbar.js"></script>
	<script>
		new bootnavbar();
	</script>
	<!--Pie de pagina-->
	<?php
	include("footerAdmin.php");
	?>

</body>



</html>