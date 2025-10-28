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
							<li><a class="dropdown-item" href="datos.php">Datos</a></li>
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
							<i class="bi bi-person-fill"> <?php echo $_SESSION['name']; ?></a></i>
						<ul class="dropdown-menu">
							<li><a class="dropdown-item" href="#">Cerrar sesión</a></li>
						</ul>
					</li>

				</ul>

			</div>
		</div>
	</nav>