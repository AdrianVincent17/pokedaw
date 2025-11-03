<?php
include("../conexion.php");
include("seguridad.php"); // Asume que verifica $_SESSION['nif']

if (!isset($_SESSION['nif'])) {
	header("Location: ../index.php");
	exit();
}

// 1. Obtener todas las cartas disponibles para el desplegable
$consulta = "SELECT id, nombre FROM cartas_base ORDER BY nombre ASC";
$result = mysqli_query($conn, $consulta);

$cartas_disponibles = [];
if ($result) {
	while ($row = mysqli_fetch_assoc($result)) {
		$cartas_disponibles[] = $row;
	}
}
mysqli_close($conn);
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
	<title>AÑADIR CARTAS-POKEDAW</title>


</head>

<body class="secuser">
	<?php include("headerNormal.php"); ?>
	<section class="site-wrapper">
		<div class="container site-content mt-5">
			<h2 class="text-center text-light mb-4">AÑADIR CARTA</h2>

			<form action="procesar_añadir.php" method="POST" class="col-md-5 mx-auto text-light p-4 ">
				<div class="mb-3">
					<label for="carta_id" class="form-label">Seleccionar Carta</label>
					<select name="carta_id" id="carta_id" class="form-select" required>
						<option value="">-- Selecciona una Carta --</option>
						<?php foreach ($cartas_disponibles as $carta) : ?>
							<option value="<?php echo htmlspecialchars($carta['id']); ?>">
								<?php echo htmlspecialchars($carta['nombre']); ?>
							</option>
						<?php endforeach; ?>
					</select>
				</div>

				<div class="mb-3">
					<label for="cantidad" class="form-label">Cantidad a Añadir</label>
					<input type="number" class="form-control" name="cantidad" id="cantidad" value="1" min="1" required>
				</div>
				<div class="row justify-content-around">
					<div class="col-8">
						<button type="submit" class="btn btn-success ms-2 me-2">Añadir a Colección</button>
						<a href="listacartas.php" class="btn btn-secondary">Cancelar</a>
					</div>

				</div>
			</form>
		</div>
	</section>
	<?php include("footerNormal.php"); ?>
</body>

</html>