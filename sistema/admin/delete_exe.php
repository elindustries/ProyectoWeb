 <?php
include('../../db/db.php');

//Recibimos por GET el id del registro a borrar
$id=$_GET['id_producto'];

// sentencia SQL para eliminar un registro
$sql = "DELETE FROM productos WHERE id='$id'";

if (mysqli_query($conn, $sql)) {
  echo "<script>alert('Registro eliminado correctamente'); window.location='home.php';</script>";
} else {
  echo "<script>alert('Error borrando registro'); window.history.go(-1);</script>";
}

mysqli_close($conn);
?> 