<?php
    include('db/db.php');

    $nombre = $_POST["nombre"];
    $apellidop = $_POST["apellidop"];
    $apellidom = $_POST["apellidom"];
    $nickname = $_POST["nickname"];
    $hash = $_POST["password"];
    $privilegios = 1;

    //encriptado
    $password = password_hash($hash, PASSWORD_DEFAULT);

    $sql = "INSERT INTO usuarios (nombre_usuario,apellidop_usuario, apellidom_usuario, nick_usuario, password_usuario,privilegio_usuario) 
    VALUES ('$nombre','$apellidop','$apellidom','$nickname','$password','$privilegios')";

if (mysqli_query($conn, $sql)) {
    echo "<script>alert('Registro insertado correctamente'); window.location='index.html';</script>";
  } else {
    echo "<script>alert('Error insertando registro'); window.history.go(-1);</script>";
  }
    mysqli_close($conn);