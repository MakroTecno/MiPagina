<?php
session_start();
include("../conexion_mysql.php");
	$factura = $_POST['factura'];
	$codigo = $_POST['codigo'];
	$cantidad = $_POST['cantidad'];
	foreach ($codigo as $key => $value) {
		$factura = $factura[$key];
		$cantidad = $cantidad[$key];
		$datos[] = '("'.$factura.'", "'.$value.'", "'.$cantidad.'")';
		$sql = "INSERT INTO facturas (id_factura, codigo_producto, cantidad) VALUES " . implode(',', $datos);
	}
	$sql2 = mysqli_query($conectar, $sql);
	if($sql2){
		echo json_encode(array('error' => false ));
	}else {
		echo json_encode(array('error' => true )) or die(mysqli_error($conectar));;
	}





//////////////////////////////////////////////////
?>