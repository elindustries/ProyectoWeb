<?php
	session_start();
	$privilegios = $_SESSION['privilegios'];
	$nombre = $_SESSION['nombre'];
	$id_usuario=$_SESSION['id_usuario'];
	
	if (!$_SESSION){
		echo "<script>alert('Debe iniciar sesión'); window.location='../../index.html';</script>";
	}else switch ($privilegios) {
		case 1:
			//Si se es usuario se expulsa
			echo "<script>alert('No tienes permiso!'); window.location='../../index.html';</script>";
			break;
		case 2:
			//si es admin se continúa
			break;
	}
?>