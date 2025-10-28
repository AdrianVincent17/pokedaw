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
	<link rel="icon" type="image/x-icon" href="../img/grifo.ico">
	<title>GESTIÓN - CES VEGA MEDIA</title>


</head>

<body>
	<!--Cabecera-->
	<?php

	include("headerNormal.php");
	include("navNormal.php");

	?>

	<!--Barra de navegación-->

	<!--Contenido de la página-->
	<section>
		<div class="container">
			<div class="row justify-content-center align-items-center">
				<div class="col-9 col-sm-8 col-md-6 col-xl-4 mb-5 mt-3">
					<div class="row justify justify-content-center titulos mt-5 mb-4">
						<div class="col-12 mt-5">
							<p class="h2 text-center">WELCOME <?php echo $_SESSION['name']; ?></p>
						</div>
						<div class="col-8 mt-4">
							<div class="row">
								<h1>Soy normal</h1>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
	</section>

	<?php

	include("../footer.php");
	

	?>

	<script src="../Bootstrap/js/bootnavbar.js"></script>
	<script>
		new bootnavbar();
	</script>

</body>

</html>