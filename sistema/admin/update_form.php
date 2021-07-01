<?php
//importanción de BD
include('../db.php');
//verificación de sesión
include('../security.php');

//recibimos por GET el id a MODIFICAR
$id = $_GET['id'];

//sentencia SQL para obtener el registro
$sql = "SELECT * FROM usuarios WHERE id=$id";
if ($consulta = mysqli_query($conn, $sql)) {
    $registro = mysqli_fetch_assoc($consulta);
}
?>
<!DOCTYPE html>
<html>

<head>
    <title><?= $registro['nombre'] ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>

<body>
    <center>
        <h1>Actualizar datos</h1>
        <div class="container">
            <!-- Formulario para MODIFICAR -->
            <form id="form1" method="POST" action="update_exe.php" class="needs-validation">
                <input type="hidden" name="id" class="form-control" value=<?= $registro['id'] ?>>
                <div class="mb-3">
                    <label>Nombre(s):</label>
                    <input type="text" name="nombre" class="form-control" value="<?= $registro["nombre"] ?>" required>
                </div>

                <div class="mb-3">
                    <label>Apellidos:</label>
                    <input type="text" name="apellidos" class="form-control" required value="<?= $registro['apellidos']; ?>">
                </div>

                <div class="mb-3">
                    <label>Matricula</label>
                    <input type="text" name="matricula" class="form-control" required value="<?= $registro['matricula'] ?>">
                </div>

                <div class="mb-3">
                    <label>Sexo</label>
                    <select name="sexo" class="form-control" value="<?= $registro['sexo'] ?>">
                        <option value="masculino">Masculino</option>
                        <option value="femenino">Femenino</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label>Estado civil</label>
                    <select name="estadoCivil" class="form-control" value="<?= $registro['estado_civil'] ?>">
                        <option value="soltero">Soltero</option>
                        <option value="casado">Casado</option>
                        <option value="divorciado">Divorciado</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label>Fecha de nacimiento</label>
                    <input type="date" name="fechaNacimiento" class="form-control" required value="<?= $registro['fecha_nacimiento'] ?>">
                </div>

                <div class="mb-3">
                    <label>Carrera</label>
                    <input type="text" name="carrera" class="form-control" required value="<?= $registro['carrera'] ?>">
                </div>

                <div class="mb-3">
                    <label>Usuario</label>
                    <input type="text" name="usuario" class="form-control" required value="<?= $registro['usuario'] ?>">
                </div>

                <!-- Contraseña -->
                <div class="mb-3">
                    <label>Nueva Contraseña</label>
                    <div class="input-group">
                        <input ID="txtPassword" type="Password" Class="form-control" name="password" required >
                        <div class="input-group-append">
                            <button id="show_password" class="btn btn-primary" type="button" onclick="mostrarPassword()"> <span class="fa fa-eye-slash icon"></span> </button>
                        </div>
                    </div>
                </div>
                <!-- Contraseña -->

                <div class="mb-3">
                    <label>Privilegios</label>
                    <select name="privilegios" class="form-control" value="<?= $registro['privilegio'] ?>">
                        <option value="user">Usuario</option>
                        <option value="admin">Administrador</option>
                    </select>
                </div>

                <div class="mb-3">
                    <button type="submit" class="btn btn-primary" id="btn">Enviar</button>
                </div>
                <p><a class="btn btn-success" href="home.php">Ver tabla de Usuarios</a></p>
            </form>

        </div>
        <br>
        <footer class="bg-light text-center text-lg-start">
            <!-- Copyright -->
            <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
                © 2021 Copyright:
                <p class="text-dark">Eusebio Angel Sánchez Rincón</p>
            </div>
            <!-- Copyright -->
        </footer>
    </center>
    <script src="showPassword.js"></script>
</body>

</html>