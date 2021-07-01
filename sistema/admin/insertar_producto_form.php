<?php include('../../db/db.php');
include('seguridad_admin.php');

$sql_proveedores = "SELECT * from proveedores";
$resultado_proveedores = mysqli_query($conn, $sql_proveedores);

$sql_categorias = "SELECT * from categorias";
$resultado_categorias = mysqli_query($conn, $sql_categorias);

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <!-- Bootstrap CSS -->
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
            <link rel="stylesheet" href="../../css/subirFoto.css" class="hre">
            
        <meta charset="utf-8">
        <title>Insertar Producto</title>
    </head>

    <body>
        <center>
            <h1>Abarrotes Zavala</h1>
            <h2>Ingrese los datos del producto</h2>
            <div class="container">
                <form method="POST" action="insertar_producto_exe.php" enctype="multipart/form-data" class="needs-validation">
                    <!-- Proveedores -->
                    <label>Proveedor</label>
                    <div class="input-group mb-3">
                        <select name="proveedor" class="form-control"  required>
                            <option selected disabled>-Seleccionar proveedor-</option>
                            <!-- Lectura de proveedores -->
                            <?php
                            while ($row_proveedores = mysqli_fetch_assoc($resultado_proveedores)){
                            ?>
                                <option value="<?=$row_proveedores['id_proveedor']?>"><?=$row_proveedores['nombre_proveedor']?></option>
                            <?php
                            }
                            ?>
                        </select>
                        <div class="input-group-append">
                            <a href="insertar_proveedor_form.php" class="btn btn-outline-secondary" type="button">Insertar proveedor</a>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label>Descipción</label>
                        <input type="text" name="descripcion" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label>Precio</label>
                        <input type="number" name="precio" class="form-control" required>
                    </div>

                    <!-- Categoría -->
                    <label>Categoría</label>
                    <div class="input-group mb-3">
                        
                        <select name="categoria" class="form-control"  required>
                            <option selected disabled>-Seleccionar categoría-</option>
                            <!-- Lectura de categorías -->
                            <?php
                            while ($row_categorias = mysqli_fetch_assoc($resultado_categorias)){
                            ?>
                                <option value="<?=$row_categorias['id_categoria']?>"><?=$row_categorias['nombre_categoria']?></option>
                            <?php
                            }
                            mysqli_close($conn);
                            ?>
                        </select>
                        <div class="input-group-append">
                            <a href="insertar_categoria_form.php" class="btn btn-outline-secondary" type="button">Insertar categoría</a>
                        </div>
                    </div>
                    <!-- Foto del producto -->
                    <div class="mb-3">
                        <div class="photo">
                            <label for="foto">Foto</label>
                                <div class="prevPhoto">
                                <span class="delPhoto notBlock">X</span>
                                <label for="foto"></label>
                                </div>
                                <div class="upimg">
                                <input type="file" name="foto" id="foto">
                                </div>
                                <div id="form_alert"></div>
                        </div>
                    </div>
                    

                    <!-- Botón de registro -->
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary" id="btn">Guardar producto</button>
                    </div>
                    <!-- Botón de regreso -->
                    <div class="mb-3">
                        <a class="btn btn-secondary" href="tabla_productos.php" role="button">Atrás</a>
                    </div>

                </form>

            </div>
            <br>
            <footer class="bg-light text-center text-lg-start">
                <!-- Copyright -->
                <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
                    © 2021 Copyright:
                    <p class="text-dark">Abarrotes Zavala</p>
                </div>
                <!-- Copyright -->
            </footer>
        </center>
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="../../js/jquery-3.6.0.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src="../../js/subirFoto.js"></script>
    </body>
</html>