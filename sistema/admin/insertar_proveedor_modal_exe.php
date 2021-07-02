<?php
    include('../../db/db.php');
print_r($_POST);
exit;

    //recolección de los datos
    $nombre_proveedor = $_POST["nombre_proveedor"];
    $telefono_proveedor = $_POST["telefono_proveedor"];
    $direccion_proveedor = $_POST["direccion_proveedor"];

    //elaboración de la query
    $sql_insertar_proveedor = "INSERT INTO proveedores 
    VALUES (NULL, '$nombre_proveedor','$telefono_proveedor','$direccion_proveedor')";

if (mysqli_query($conn, $sql_insertar_proveedor)) {
    echo "<script>alert('Proveedor insertado correctamente'); window.location='insertar_producto_form.php';</script>";
  } else {
    echo "<script>alert('Error insertando registro'); window.history.go(-1);</script>";
  }
    mysqli_close($conn);
?>