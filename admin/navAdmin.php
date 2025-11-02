<nav class="navbar navbar-expand-lg nav" id="main_navbar">
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
				<li class="nav-item">
					<a class="nav-link" href="indexAdmin.php"><i class="bi bi-file-earmark-post-fill"> Inicio</i></a>
				</li>

				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
						<i class="bi bi-person-fill-gear">Gestion Usuarios</i>
					</a>
					<ul class="dropdown-menu">
						<li><a class="dropdown-item" href="listausers.php">Datos</a></li>
						<li><a class="dropdown-item" href="registro.php">Añadir usuarios</a></li>
						<li><a class="dropdown-item" href="#">Permisos</a></li>
					</ul>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
						<i class="bi bi-person-fill-gear">Colecciones</i>
					</a>
					<ul class="dropdown-menu">
						<li><a class="dropdown-item" href="#">Catalogo</a></li>
						<li><a class="dropdown-item" href="#">Añadir</a></li>
						<li><a class="dropdown-item" href="#">Eliminar</a></li>
						<li><a class="dropdown-item" href="#">Modificar</a></li>
					</ul>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#"><i class="bi bi-file-earmark-post-fill"> Mi perfil</i></a>
				</li>
				


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
			<ul class="navbar-nav mx-4">
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
							<i class="bi bi-person-fill"> <?php echo $_SESSION['name']; ?></a></i>
						<ul class="dropdown-menu">
							<li><a class="dropdown-item" href="../logout.php">Cerrar sesión</a></li>
						</ul>
					</li>

				</ul>
		</div>
	</div>
</nav>