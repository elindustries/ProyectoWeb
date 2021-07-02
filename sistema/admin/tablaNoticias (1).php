<?php include('conexion.php'); 

$sql="SELECT * FROM noticias";
			$result = mysqli_query($conn, $sql);

			if (mysqli_num_rows($result) > 0) {

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../CSS/bootstrap.min.css">

</head>
<body>

<main class="container">
        <div class="modal" id="modalNoticias" tabindex="-1" role="dialog" aria-labelledby="Nueva Noticia" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5>Nueva Noticia</h5>
                        <button class="close" data-dismiss="modal" aria-label="Cerrar">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col">
                                <form action="PHP/insertarNoticias.php" method="POST" class="needs-validation">
                                    <div class="row mb-3">
                                        <label for="titulo" class="form-label">Titulo:</label>
                                        <input type="text" name="titulo" class="form-control col-md-12" required name="titulo" placeholder="Ingrese aquí el titulo de la noticia">
                                    </div>
                                    <div class="row mb-3">
                                        <label for="descripcion" class="form-label">Descripción:</label>
                                        <input type="text" name="descripcion" class="form-control col-md-12" required name="descripcion" placeholder="Ingrese aquí una descripción">
                                    </div>
                                    <div class="row mb-3">
                                        <label for="encabezado" class="form-label">Encabezado:</label>
                                        <input type="text"  name="encabezado" class="form-control col-md-12" required name="encabezado" placeholder="Ingrese aqui el encabezado">
                                    </div>
                                    <div class="row mb-3">
                                        <label for="fkusuario" class="form-label">Fk Usuario:</label>
                                        <input type="text"  name="fkusuario" class="form-control col-md-12" required name="fkusuario" placeholder="Ingrese la llave foranea del usuario">
                                    </div>
                                    <div class="row mb-3">
                                        <label for="fketiqueta" class="form-label">Fk Etiqueta:</label>
                                        <input type="text"  name="fketiqueta" class="form-control col-md-12" required name="fketiqueta" placeholder="Ingrese la llave foranea de la etiqueta">
                                    </div>
									
									<input type="submit" class="btn btn-success" value="Aceptar">
                                </form>
                                
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </main>


	<div class="container"> <!-- Apertura del container-->
		<h1>Noticias Registradas</h1>
	
	<table class="table table-bordered">
		<tr>
			<th>Id </th>
			<th>Titulo</th>
			<th>Descripción</th>
			<th>Encabezado</th>
			<th>Fecha</th>
			<th>Opciones</th>
		</tr>
		<?php 
			

    		while($row = mysqli_fetch_assoc($result)) {	
    			$newFecha = date("d/m/Y", strtotime($row["fecha"]));
		?>
		<tr>
			<td><?=$row["idNoticia"]?></td>
			<td><?=$row["titulo"]?><br></td>
			<td><?=$row["descripcion"]?></td>
			<td><?=$row["encabezado"]?></td>
			<td><?=$newFecha?></td>
			<!-- ?id= Se usa para pasar por get una variable de nombre matricula y despues del signo = se coloca el valor de la variable, en este caso se tomará de la variable $row['matricula'] -->
			<td><a class="btn btn-warning" href="Actualizar.php?idNoticia=<?=$row['idNoticia']?>">Editar</a> 
				<a class="btn btn-danger" href="PHP/borrarNoticias.php?idNoticia=<?=$row['idNoticia']?>">Borrar</a></td>
		</tr>
		<?php 
				}

		?>
	</table>
	<a class="btn btn-success" data-toggle="modal" data-target="#modalNoticias">Nueva Noticia</a>
		<?php
			} 
			else {
    		echo "<script>alert('No existen noticias'); window.location='/Formulario/Formulario.php';</script>";;
			}

			mysqli_close($conn);

		?>
	</div> <!-- Cierre del container-->	
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="/JS/bootstrap.min.js"></script>
</body>
</html>
