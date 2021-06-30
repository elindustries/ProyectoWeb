 <?php
    //variables para la BD
    date_default_timezone_set('America/Mexico_City');
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "abarroteszavala";

    // Creación de la conexion
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // Comprobar conexión
    if (!$conn) {
        die("<strong style='color:red'>Falló la conexión: </strong>" . mysqli_connect_error());
    }
    //echo "<strong style='color:green'>Conectado correctamente</strong>";

?> 