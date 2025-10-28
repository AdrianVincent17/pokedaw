<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="./Bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<script src="./Bootstrap/js/bootstrap.bundle.min.js"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">
	<link href="styles.css" rel="stylesheet">
	<link rel="icon" type="image/x-icon" href="img/grifo.ico">
	<title>REGISTRO - POKEDAW</title>
</head>

<body>
	<!--Cabecera-->
	<?php
	include("header.php")
	?>
	<!--Contenido de la página-->
	<section>
		<div class="container ">
			<div class="row justify-content-center align-items-center ">
				<div class="col-11 col-sm-12 col-lg-11 col-xl-10 mb-4 mt-4">
					<div class="row justify-content-center titulos mt-4 mb-4">
						<div class="col-12 mt-4">
							<p class="h1 text-center" style="font-size: 25pt;">NUEVO USUARIO</p>
						</div>
						<div class="col-10">
							<hr>
						</div>

						<div class="col-12 col-md-8 mt-4">

							<div class="form-floating mb-3 ">
								<input type="text" class="form-control" id="nif" placeholder="NIF" required>
								<label for="nif">NIF <span class="form-text text-muted small float-end">EJ: 12345678X</span></label>
							</div>
							<div class="form-floating mb-3 ">
								<input type="text" id="nombre" class="form-control" placeholder="Nombre" required>
								<label for="nombre">Nombre</label>
							</div>
								<div class="form-floating mb-3 ">
								<input type="text" id="apellidos" class="form-control" placeholder="Apellidos" required>
								<label for="apellidos">Apellidos</label>
							</div>
							<div class="form-floating mb-3 ">
								<input type="email" class="form-control" id="email" placeholder="Email">
								<label for="email">Email <span class="form-text text-muted small float-end">EJ: xxxxxx@pokedaw.com</span></label>
							</div>
							<div class="form-floating mb-3"> <input type="number" class="form-control" id="tel" placeholder="Teléfonos">
								<label for="email">Teléfonos<span class="form-text text-muted float-end small"> EJ: 968647842 || 636365874</span></label>
							</div>
							<!--
							<div class="form-floating mb-3 ">
								<select class="form-select" id="tipo" name="tipo">
									<option value="1">Administrador</option>
									<option value="0">Usuario</option>
								</select>
								<label for="Tipo">Rol</label>
							</div>
							-->
							<div class="form-floating mb-3 ">
								<input type="password" class="form-control" id="pass" placeholder="Contraseña">
								<label for="pass">Contraseña</label>
							</div>
							<div class="form-floating ">
								<input type="password" class="form-control" id="pass2" placeholder="Confirma tu contraseña">
								<label for="pass2">Confirma tu contraseña</label>
							</div>

							<div class="mt-2 mb-2">
								<span class="form-text text-danger small float-end">Todos los campos son obligatorios</span>
							</div>

							<div class="d-grid col-12 mx-auto mb-4 mt-4">
								<button class="btn btn-lg" type="submit">CREAR CUENTA</button>
							</div>
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