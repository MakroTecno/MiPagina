<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>


<?php
include('../conexion_mysql.php');
$ID = $_GET['id_cliente'];
	
	$sql = "DELETE FROM clientes WHERE id_cliente = '$ID'";
	$consulta = mysqli_query($conectar, $sql);

	$sql = "DELETE FROM productos WHERE id_cliente = '$ID'";
	$consulta2 = mysqli_query($conectar, $sql);


	if ($consulta && $consulta2) {
		header("location: factura.php");
	}
	else {
		header("location: index.php");
	}
	
?>
 
</body>
</html>