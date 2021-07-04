<?php
    include('../../db/db.php');
//print_r($_POST);
//exit;

    //recolección de los datos
    $nombre_categoria = $_POST["nombre_categoria"];

    //elaboración de la query
    $sql_insertar_categoria = "INSERT INTO categorias 
    VALUES (NULL, '$nombre_categoria')";

if (mysqli_query($conn, $sql_insertar_categoria)) {
    echo "<script>alert('Categoría insertada correctamente'); window.location='insertar_producto_form.php';</script>";
  } else {
    echo "<script>alert('Error insertando registro'); window.history.go(-1);</script>";
  }
    mysqli_close($conn);
?>