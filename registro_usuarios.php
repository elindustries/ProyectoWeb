<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Registro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>

<body>
    <center>
        <h1>Abarrotes Zavala</h1>
        <h2>Por favor ingrese sus datos</h2>
        <div class="container">
            <form id="form1" method="POST" action="registro_usuarios_exe.php" class="needs-validation">
                <div class="mb-3">
                    <label>Nombre(s):</label>
                    <input type="text" name="nombre" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Apellido Paterno:</label>
                    <input type="text" name="apellidop" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Apellido Materno:</label>
                    <input type="text" name="apellidom" class="form-control" required>
                </div>

                <!-- Nickname -->
                <div class="mb-3">
                    <label>Usuario</label>
                    <input type="text" name="nickname" class="form-control" required>
                </div>

                <!-- Contraseña -->
                <div class="mb-3">
                    <label>Contraseña</label>
                    <div class="input-group">
                        <input ID="txtPassword" type="Password" Class="form-control" name="password" required>
                        <div class="input-group-append">
                            <button id="show_password" class="btn btn-primary" type="button" onclick="mostrarPassword()"> <span class="fa fa-eye-slash icon"></span> </button>
                        </div>
                    </div>
                </div>

                <!-- Botón de registro -->
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary" id="btn">Enviar</button>
                </div>
                <!-- Botón de regreso -->
                <div class="mb-3">
                    <a class="btn btn-secondary" href="index.html" role="button">Inicio</a>
                </div>
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

   <!-- <script src="alerta.js"></script>-->
    <script src="js/showPassword.js"></script>
</body>

</html>