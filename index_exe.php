<?php
	//creación de la sesión
	session_start();
	sleep(1);
	//importanción la BD
	include ("db/db.php");

	//variables de usuario
	$usuario=$_POST['usuario'];
	$password=$_POST['password'];

	//lectura del usuario
	$sql = "SELECT id_usuario, nick_usuario, privilegio_usuario,password_usuario 
			From usuarios 
			where nick_usuario ='$usuario'";
	
	$resultado = mysqli_query($conn, $sql);

		if(1== mysqli_num_rows($resultado)){
			$linea= mysqli_fetch_array($resultado);
			if(password_verify($password, $linea[3])){
				$id_usuario=$linea[0];
				$nombre=$linea[1];
				$privilegios = $linea [2];
		
				$_SESSION['id_usuario']=$id_usuario;
				$_SESSION['nombre']=$nombre;
				$_SESSION['privilegios'] = $privilegios;
		
				switch ($privilegios) {
					case 1:
						//header("location: /admin/home.php");
						echo "eres user";
						break;
					case 2:
						//header("location: /user/tabla_user.php");
						echo "eres admin";
						break;
				}
			}else{
				echo "<script>alert('Datos incorrectos!'); window.location='/index.html';</script>";
			}
		}
	else{
		echo "<script>alert('Datos incorrectos!'); window.location='/index.html';</script>";
	}

	mysqli_close($conn);
