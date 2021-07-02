<?php
    include('../../db/db.php');

    $proveedor = $_POST["proveedor"];
    $descripcion = $_POST["descripcion"];
    $precio = $_POST["precio"];
    $categoria = $_POST["categoria"];

    //datos de la foto
    $foto = $_FILES['foto'];
    $nombre_foto= $foto['name'];
    $type = $foto['type'];
    $url_temporal = $foto['tmp_name'];

    $img_producto = 'img_producto.png';

    if($nombre_foto != ''){
        $destino = '../img_productos/';
        $img_nombre = 'img_' . md5(date('d-m-Y H:m:s'));
        $img_producto = $img_nombre.'.jpg';
        $src = $destino.$img_producto;
    }

    $sql_insertar_producto = "INSERT INTO productos 
    VALUES (NULL, '$descripcion','$precio','$categoria','$proveedor','$img_producto')";

if (mysqli_query($conn, $sql_insertar_producto)) {
  if($nombre_foto != ''){
    move_uploaded_file($url_temporal, $src);
  }
    echo "<script>alert('Registro insertado correctamente'); window.location='tabla_productos.php';</script>";
  } else {
    echo "<script>alert('Error insertando registro'); window.history.go(-1);</script>";
  }
    mysqli_close($conn);
?>