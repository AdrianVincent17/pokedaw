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
	<link rel="icon" type="image/x-icon" href="../img/grifo.ico">
	<title>GESTIÓN - CES VEGA MEDIA</title>


</head>

<body>
	<h1>ADMIN</h1>

	<!--Cabecera-->
	<div class="container-fluid cabecera">
		<header class="row justify-content-center align-items-center">
			<div class="d-none d-md-block col-4  p-0 izq mt-4"></div>
			<div class="col-12 col-md-4">
				<div class="row justify-content-center align-items-center">
					<div class="col-auto mt-1">
						<img class="m-0" src="../img/GRIFO11.png" style="width:50px">
					</div>
					<div class="col-auto">
						<p class="text-center m-0"><span class="v"> V</span><span class="me">M</span></p>
					</div>
					<div class="col-auto mt-1 ms-4"></div>
					<div class="w-100"></div>
				</div>
			</div>
			<div class="d-none d-md-block col-4 p-0 der mt-4"></div>
			<div class="col-12 mb-1">
				<p class="h1 text-center">GESTIÓN CES - VEGA MEDIA</p>
			</div>
		</header>
	</div>

	<!--Barra de navegación-->
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark" id="main_navbar">
		<div class="container-fluid">

			<button class="navbar-toggler" type="button" data-bs-toggle="collapse"
				data-bs-target="#navbarSupportedContent"
				aria-controls="navbarSupportedContent"
				aria-expanded="false"
				aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav me-auto mb-2 mb-lg-0">

					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
							<i class="bi bi-file-earmark-post-fill">Material Curricular</i>
						</a>
						<ul class="dropdown-menu">
							<li><a class="dropdown-item" href="#">Nuevo</a></li>
							<li><a class="dropdown-item" href="#">Consultar</a></li>
							<li><a class="dropdown-item" href="#">Editorial</a></li>
						</ul>
					</li>


					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
							<i class="bi bi-person-fill-gear"> Personal</i>
						</a>
						<ul class="dropdown-menu">
							<li><a class="dropdown-item" href="#">Datos</a></li>
							<li class="nav-item dropdown">
								<a class="dropdown-item dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
									Asuntos propios
								</a>
								<ul class="dropdown-menu">
									<li><a class="dropdown-item" href="#">Solicitar</a></li>
									<li><a class="dropdown-item" href="#">Consultar</a></li>
									<li><a class="dropdown-item" href="#">Asignar</a></li>

									<!-- 
								Para añadir otro nivel

								<li class="nav-item dropdown">
							  <a class="dropdown-item dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
								Dropdown
							  </a>
							  <ul class="dropdown-menu">
								<li><a class="dropdown-item" href="#">Action</a></li>
								<li><a class="dropdown-item" href="#">Another action</a></li>
								<li><hr class="dropdown-divider" /></li>
								<li><a class="dropdown-item" href="#">Something else here</a>
								</li>
							  </ul>
							</li>
						-->
								</ul>
							</li>

							<li class="nav-item dropdown">
								<a class="dropdown-item dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
									Faltas
								</a>
								<ul class="dropdown-menu">
									<li><a class="dropdown-item" href="#">Nueva</a></li>
									<li><a class="dropdown-item" href="#">Consultar</a></li>
								</ul>
							</li>

							<li class="nav-item dropdown">
								<a class="dropdown-item dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
									Bajas
								</a>
								<ul class="dropdown-menu">
									<li><a class="dropdown-item" href="#">Nueva</a></li>
									<li><a class="dropdown-item" href="#">Consultar</a></li>
								</ul>
							</li>

							<li class="nav-item dropdown">
								<a class="dropdown-item dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
									Actividad
								</a>
								<ul class="dropdown-menu">
									<li><a class="dropdown-item" href="#">Nueva</a></li>
									<li><a class="dropdown-item" href="#">Consultar</a></li>
								</ul>
							</li>

							<li><a class="dropdown-item" href="#">Participación</a></li>
						</ul>
					</li>


					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
							<i class="bi bi-file-earmark-person"> Alumnos</i>
						</a>
						<ul class="dropdown-menu">
							<li><a class="dropdown-item" href="#">Plumier</a></li>

						</ul>
					</li>

					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
							<i class="bi bi-files"> Documentación</i>
						</a>
						<ul class="dropdown-menu">
							<li><a class="dropdown-item" href="#">Crear categoría</a></li>
							<li><a class="dropdown-item" href="#">Subir documentos</a></li>
							<li><a class="dropdown-item" href="#">Consultar doc.</a></li>
						</ul>
					</li>

					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
							<i class="bi bi-building-fill-gear"> Organización</i>
						</a>
						<ul class="dropdown-menu">
							<li class="nav-item dropdown">
								<a class="dropdown-item dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
									Horarios
								</a>
								<ul class="dropdown-menu">
									<li><a class="dropdown-item" href="#">Insertar guardias</a></li>
									<li><a class="dropdown-item" href="#">Horario grupo/aulas</a></li>
									<li><a class="dropdown-item" href="#">Horario Personal</a></li>
								</ul>
							</li>
						</ul>
					</li>

					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
							<i class="bi bi-tools"> Administración</i>
						</a>
						<ul class="dropdown-menu">
							<li><a class="dropdown-item" href="#">Gest.Bajas</a></li>
							<li><a class="dropdown-item" href="#">Sugerencias</a></li>
							<li class="nav-item dropdown">
								<a class="dropdown-item dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
									Guardias
								</a>
								<ul class="dropdown-menu">
									<li><a class="dropdown-item" href="#">Guardias</a></li>
									<li><a class="dropdown-item" href="#">Guardias de recreo</a></li>
								</ul>
							</li>
							<li><a class="dropdown-item" href="#">Tareas Pendientes</a></li>
							<li><a class="dropdown-item" href="#">Compras</a></li>
							<li><a class="dropdown-item" href="#">Caja</a></li>
							<li><a class="dropdown-item" href="#">Cont.Asuntos propios</a></li>
						</ul>
					</li>

					<li class="nav-item">
						<a class="nav-link" href="#"><i class="bi bi-list-check"> Encuestas</i></a>
					</li>
				</ul>


				<ul class="navbar-nav mx-auto">
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
							<i class="bi bi-person-fill"> Fernando</a></i>
						<ul class="dropdown-menu">
							<li><a class="dropdown-item" href="#">Cerrar sesión</a></li>
						</ul>
					</li>

				</ul>

			</div>
		</div>
	</nav>
	<!--Contenido de la página-->
	<section>
		<div class="container">
			<div class="row justify-content-center align-items-center">
				<div class="col-9 col-sm-8 col-md-6 col-xl-4 mb-5 mt-3">
					<div class="row justify justify-content-center titulos mt-5 mb-4">
						<div class="col-12 mt-5">
							<p class="h2 text-center">ACCEDE A TU CUENTA</p>
						</div>
						<div class="col-8 mt-4">
							<div class="row">
								<form action="">
									<div class="col-12">
										<input type="text" class="form-control" placeholder="NIF">
										<span class="form-text text-muted small">EJ: 12345678X</span>
									</div>
									<div class="col-12 mt-3 mb-2">
										<input type="password" class="form-control" id="pass" name="pass" placeholder="CONTRASEÑA">
									</div>
									<div class="col-12 mt-4 d-grid mb-5">
										<button class="btn btn-lg" type="submit">INICIAR SESIÓN</button>
									</div>
								</form>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-12 mb-1">
							<p class="text-center cuenta">¿NECESITAS UNA CUENTA?</p>
							<a class="btn w-100" href="registro.html" role="buttom">REGÍSTRATE</a>
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

</body>

</html>