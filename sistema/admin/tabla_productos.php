<?php include('../../db/db.php');
include('seguridad_admin.php');

$sql = "SELECT id_producto, descripción_producto, precio_producto, img_producto, nombre_proveedor, nombre_categoria FROM productos 
INNER JOIN proveedores ON productos.id_proveedor_producto = proveedores.id_proveedor
INNER JOIN categorias ON productos.id_categoría_producto = categorias.id_categoria";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {

?>
<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<title>Productos</title>

		<!-- Bootstrap CSS -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
		
		<!-- Datatable -->
		<link rel="stylesheet" href="//cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">

	</head>

	<body>

		<div class="container">
			<!-- Apertura del container-->
			<header>
			<h1>Productos Registrados</h1>
			</header>

			<a class="btn btn-success" href="insertar_producto_form.php">Agregar Producto</a>
			<a class= "btn btn-danger" href="../cerrar_sesion.php">Cerrar Sesión</a>
			
			<table table id="example" class="table table-striped" style="width:100%">
				<thead>
					<tr>
						<th>Id </th>
						<th>Descripción </th>
						<th>Precio </th>
						<th>Imagen </th>
						<th>Proveedor</th>
						<th>Categoría</th>
						<th>Acciones</th>
					</tr>
				</thead>
				<tbody>
				<?php


				while ($row = mysqli_fetch_assoc($result)) {
				?>
					<tr>
						<td><?= $row["id_producto"] ?></td>
						<td><?= $row["descripción_producto"] ?></td>
						<td><?= $row["precio_producto"] ?></td>
						<td><img src="../img_productos/<?= $row["img_producto"] ?>" height="200" width="200"></td>
						<td><?= $row["nombre_proveedor"] ?></td>
						<td><?= $row["nombre_categoria"] ?></td>
						<!-- ?id= Se usa para pasar por get una variable de nombre id y despues del signo = se coloca el valor de la variable, en este caso se tomará de la variable $row['id'] -->
						<td><a class="btn btn-warning" href="update_form.php?id=<?= $row['id_producto'] ?>">Editar</a>
							<a class="btn btn-danger" href="delete_exe.php?id=<?= $row['id_producto'] ?>" onclick="return confirmacion()">Borrar</a>
						</td>
					</tr>
				<?php
				}

				?>
				</tbody>
			</table>
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
                <p class="text-dark" >Abarrotes Zavala</p>
            </div>
            <!-- Copyright -->
        </footer>
		<!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="../../js/jquery-3.6.0.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
		<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
		<script src="../../js/datatable.js"></script>
		
		<!--Script de eliminar -->
		<script src="confirmarEliminar.js"></script>
	</body>

</html>