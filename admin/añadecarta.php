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
	<title>AÑADIR-CARTAS- ADMIN - POKEDAW</title>
</head>

<body>
	<!--Cabecera-->
	<?php
	include("headerAdmin.php")
	?>
	<!--Contenido de la página-->
	<section class="secadmin">
		<div class="container">
			<form action="altacarta.php" enctype="multipart/form-data" method="POST">
				<div class="row justify-content-center align-items-center ">
					<div class="col-11 col-sm-12 col-lg-11 col-xl-10 mb-4 mt-4">
						<div class="row justify-content-center titulos mt-4 mb-4">
							<div class="col-12 mt-4">
								<p class="h1 text-center" style="font-size: 25pt;">NUEVA CARTA</p>
							</div>
							<div class="col-10">
								<hr>
							</div>

							<div class="col-12 col-md-8 mt-4">

								<div class="form-floating mb-3 ">
									<input type="text" class="form-control" name="nombrecarta" id="nombrecarta" placeholder="Nombre" required>
									<label for="nombrecarta">NOMBRE<span class="form-text text-muted small float-end">EJ: Pikachu</span></label>
								</div>
								<div class="form-floating mb-3 ">
									<input type="text" name="tipo" id="tipo" class="form-control" placeholder="Tipo" required>
									<label for="tipo">Tipo<span class="form-text text-muted small float-end">EJ: Agua, Fuego, Hielo</span></label></label>
								</div>
								
								<div class="form-floating mb-3 ">
									<input type="file" name="imagen" id="imagen" class="form-control" required>
									<label for="imagen"><span class="form-text text-muted small float-end">EJ: carta01.png</span></label>
								</div>


								<div class="d-grid col-12 mx-auto mb-4 mt-4">
									<button class="btn btn-lg" type="submit">AÑADIR CARTA</button>
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
</body>

</html>