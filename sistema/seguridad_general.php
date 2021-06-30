<?php
	session_start();
	$privilegios = $_SESSION['privilegios'];
	$nombre = $_SESSION['nombre'];
	$id_usuario=$_SESSION['id_usuario'];
	
	if (!$_SESSION){
		echo "<script>alert('Debe iniciar sesión'); window.location='../index.html';</script>";
		//header("location:/index.html");
	}else switch ($privilegios) {
		case 1:
			//header("location: /admin/home.php");
			echo "eres user";
			break;
		case 2:
			header("location: admin/tabla_productos.php");
			//echo "eres admin";
			break;
	}
?>