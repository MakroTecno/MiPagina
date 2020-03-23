<?php
session_start();
include("../conexion_mysql.php");
	$factura = $_POST['factura'];
	$codigo = $_POST['codigo'];
	$cantidad = $_POST['cantidad'];
	foreach ($factura as $key => $value) {
		$codigos = $codigo[$key];
		$cantidads = $cantidad[$key];
		$dato[] = '("'.$value.'", "'.$codigos.'", "'.$cantidads.'")';
		$sql = "INSERT INTO facturas (id_factura, codigo_producto, cantidad) VALUES " .implode(',', $dato);
	}
	
//Realizamos la consulta y damos una respuesta
if(mysqli_query($conectar, $sql)) {
header("location: verfact.php");
die('<script>$("#facturas")[0].reset();</script>');
};




//////////////////////////////////////////////////
?>