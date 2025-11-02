<?php
include("seguridad.php");

?>
<?php
include("../conexion.php");
//Lógica del fichero
$consulta = "Select * from usuarios";

$result = mysqli_query($conn, $consulta);


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
	<title>DATOS-POKEDAW</title>


</head>

<body class="secadmin">
	<!--Cabecera-->
	<?php

	include("headerAdmin.php");
	include("navAdmin.php");

	?>

	<!--Barra de navegación-->

	<!--Contenido de la página-->
	<section>
		<div class="container">
			<div class="row justify-content-center align-items-center">

				<table class="table table-striped table-hover text-light">
					<thead>
						<tr>
							<th>NIF</th>
							<th>E-mail</th>
							<th>Nombre</th>
							<th>Apellidos</th>
							<th>Teléfono</th>
							<th>Rol</th>
							<th>Password</th>
							<th>Fecha registro</th>
							<th>Bloquear usuario</th>
						</tr>
					</thead>
					<tbody>
						<?php
						// Recorremos la consulta y creamos una fila <tr> por cada usuario
						while ($row = mysqli_fetch_array($result)) {
							// Definimos el valor del Rol
							$rol_display = ($row['rol'] == 1) ? 'Administrador' : 'Usuario Estándar';

							echo "<tr>";
							// Celdas <td> con los datos del usuario
							echo "<td class='text-light'>" . $row['nif'] . "</td>";
							echo "<td class='text-light'>" . $row['email'] . "</td>";
							echo "<td class='text-light'>" . $row['nombre'] . "</td>";
							echo "<td class='text-light'>" . $row['apellidos'] . "</td>";
							echo "<td class='text-light'>" . $row['telefono'] . "</td>";
							echo "<td class='text-light'>" . $rol_display . "</td>";
							echo "<td class='text-light'>" . $row['pass'] . "</td>";
							echo "<td class='text-light'>" . $row['fecha_registro'] . "</td>";
							

							echo "<td>";
							// Usamos un atributo 'data-nif' para saber qué usuario actualizar
							echo '<input type="checkbox" class="bloquear-toggle" data-nif="' . ($row['nif']) . '" >';
							echo "</td>";

							// Celda de Acciones (Botones de administración)
							echo "<td>";

							// Botón de Editar (sigue siendo un enlace GET)
							echo "<form method='POST' action='listamod.php' style='display:inline;'>";
							// Campo oculto que contiene el NIF y cuyo nombre debe ser 'deleteuser'
							echo "<input type='hidden' name='nif_carga' value='" .($row['nif']) . "'>";
							// Botón que envía el formulario
							echo "<button type='submit' class='btn btn-sm btn-danger me-2' onclick='return confirm(\"¿Estás seguro de que quieres editar a " .($row['nombre']) . "?\")'>Editar</button>";
							echo "</form>";

							// INICIO: Formulario para la Eliminación (Método POST)
							echo "<form method='POST' action='bajas.php' style='display:inline;'>";
							// Campo oculto que contiene el NIF y cuyo nombre debe ser 'deleteuser'
							echo "<input type='hidden' name='deleteuser' value='" .($row['nif']) . "'>";
							// Botón que envía el formulario
							echo "<button type='submit' class='btn btn-sm btn-danger' onclick='return confirm(\"¿Estás seguro de que quieres eliminar a " .($row['nombre']) . "?\")'>Eliminar</button>";
							echo "</form>";
							// FIN: Formulario para la Eliminación

							echo "</td>";
							echo "</tr>";
						}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</section>

	<?php

	include("footerAdmin.php");

	mysqli_close($conn);


	?>

	<script src="../Bootstrap/js/bootnavbar.js"></script>
	<script>
		new bootnavbar();
	</script>

</body>

</html>