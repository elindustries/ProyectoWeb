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

    $sql = "INSERT INTO usuarios (nombre,apellidos,matricula,sexo,estado_civil,fecha_nacimiento,carrera,fecha_registro,usuario,password,privilegio) 
    VALUES ('$nombre','$apellidos','$matricula','$sexo','$estadoCivil','$fechaNacimiento','$carrera','$fecha_registro','$usuario','$password','$privilegios')";

if (mysqli_query($conn, $sql)) {
    echo "<script>alert('Registro insertado correctamente'); window.location='home.php';</script>";
  } else {
    echo "<script>alert('Error insertando registro'); window.history.go(-1);</script>";
  }
    mysqli_close($conn);
?>