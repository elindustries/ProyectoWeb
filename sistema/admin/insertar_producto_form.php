<?php include('../../db/db.php');
include('seguridad_admin.php');

$sql_proveedores = "SELECT * from proveedores ORDER BY nombre_proveedor asc";
$resultado_proveedores = mysqli_query($conn, $sql_proveedores);

$sql_categorias = "SELECT * from categorias order by nombre_categoria asc";
$resultado_categorias = mysqli_query($conn, $sql_categorias);

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/subirFoto.css" class="hre">

    <meta charset="utf-8">
    <title>Insertar Producto</title>
</head>

<body>
    <div class="container">
        <!-- Barra de navegación-->
        <?php
        include "nav.php";
        ?>
        <!-- Barra de navegación-->

        <center>
            <h1>Abarrotes Zavala</h1>
            <h2>Ingrese los datos del producto</h2>
            <div class="container">
                <!-- Formulario -->
                <form method="POST" action="insertar_producto_exe.php" enctype="multipart/form-data" class="needs-validation">

                    <!-- Proveedores -->
                    <label>Proveedor</label>
                    <div class="input-group mb-3">
                        <select name="proveedor" class="form-control" required>
                            <option selected disabled>-Seleccionar proveedor-</option>
                            <!-- Lectura de proveedores -->
                            <?php
                            while ($row_proveedores = mysqli_fetch_assoc($resultado_proveedores)) {
                            ?>
                                <option value="<?= $row_proveedores['id_proveedor'] ?>"><?= $row_proveedores['nombre_proveedor'] ?></option>
                            <?php
                            }
                            ?>
                        </select>
                        <div class="input-group-append">
                            <!-- Boton Modal Proveedor -->
                            <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Añadir proveedor
                            </button>


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

                        <select name="categoria" class="form-control" required>
                            <option selected disabled>-Seleccionar categoría-</option>
                            <!-- Lectura de categorías -->
                            <?php
                            while ($row_categorias = mysqli_fetch_assoc($resultado_categorias)) {
                            ?>
                                <option value="<?= $row_categorias['id_categoria'] ?>"><?= $row_categorias['nombre_categoria'] ?></option>
                            <?php
                            }
                            mysqli_close($conn);
                            ?>
                        </select>
                        <div class="input-group-append">
                            <!-- Boton Modal Proveedor -->
                            <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#modal_categoria">
                                Añadir categoría
                            </button>
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
                <!-- Button trigger modal -->
                <!-- Modal para insertar proveedor -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Ingrese los datos del proveedor</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <!-- Formulario -->
                                <form class="needs-validation" method="POST" action="insertar_proveedor_modal_exe.php">
                                    <div class="mb-3">
                                        <label class="col-form-label">Nombre:</label>
                                        <input name="nombre_proveedor" type="text" class="form-control" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="col-form-label">Teléfono:</label>
                                        <input name="telefono_proveedor" type="number" class="form-control" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="col-form-label">Dirección:</label>
                                        <input name="direccion_proveedor" type="text" class="form-control" required>
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn btn-primary">Aceptar</button>
                            </div>
                            </form>
                            <!-- Formulario -->

                        </div>
                    </div>
                </div>
                <!-- Button trigger modal -->
                <!-- Modal para insertar categorías -->
                <div class="modal fade" id="modal_categoria" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Ingrese los datos de la nueva categoría</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <!-- Formulario -->
                                <form class="needs-validation" method="POST" action="insertar_categoria_modal_exe.php">
                                    <div class="mb-3">
                                        <label class="col-form-label">Nombre:</label>
                                        <input name="nombre_categoria" type="text" class="form-control" required>
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn btn-primary">Aceptar</button>
                            </div>
                            </form>
                            <!-- Formulario -->

                        </div>
                    </div>
                </div>


            </div>
            <br>
    </div>
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