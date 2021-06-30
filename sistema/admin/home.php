<?php include('../db.php');
include('../security.php');

$sql = "SELECT * FROM usuarios";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {

?>
<!DOCTYPE html>
<html>

	<head>
		<title>Tabla de datos</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

	</head>

	<body>
		<div class="container">
			<!-- Apertura del container-->
			<h1>Usuarios Registrados</h1>

			<table class="table table-bordered" >
				<tr>
					<th>Id </th>
					<th>Nombre </th>
					<th>Fecha Nacimiento </th>
					<th>Estado Civil </th>
					<th>Usuario</th>
					<th>Acciones</th>
				</tr>
				<?php


				while ($row = mysqli_fetch_assoc($result)) {
					$newFecha = date("d/m/Y", strtotime($row["fecha_nacimiento"]));
				?>
					<tr>
						<td><?= $row["id"] ?></td>
						<td><?= $row["nombre"] . " " . $row["apellidos"] ?><br>
							<small><em>Fecha registro: <?= $row["fecha_registro"] ?></em></small>
						</td>
						<td><?= $newFecha ?></td>
						<td><?= $row["estado_civil"] ?></td>
						<td><?= $row["usuario"] ?></td>
						<!-- ?id= Se usa para pasar por get una variable de nombre id y despues del signo = se coloca el valor de la variable, en este caso se tomará de la variable $row['id'] -->
						<td><a class="btn btn-warning" href="update_form.php?id=<?= $row['id'] ?>">Editar</a>
							<a class="btn btn-danger" href="delete_exe.php?id=<?= $row['id'] ?>" onclick="return confirmacion()">Borrar</a>
						</td>
					</tr>
				<?php
				}

				?>
			</table>
			<a class="btn btn-success" href="añadir_form.php">Agregar Usuario</a>
			<a class= "btn btn-danger" href="../close_sesion.php">Cerrar Sesión</a>
		<?php
	} else {
		echo "No existen registros";
	}

	mysqli_close($conn);

		?>
		
		</div> <!-- Cierre del container-->
		<br>
		<footer class="bg-light text-center text-lg-start">
            <!-- Copyright -->
            <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
                © 2021 Copyright:
                <p class="text-dark" >Eusebio Angel Sánchez Rincón</p>
            </div>
            <!-- Copyright -->
        </footer>
		<!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="js/jquery-3.4.1.slim.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<!--Script de eliminar -->
		<script src="confirmarEliminar.js"></script>
	</body>

</html>