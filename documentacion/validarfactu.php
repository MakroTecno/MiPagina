<?php
session_start();
include("../conexion_mysql.php");
	$factura = $_POST['id_factura'];
	$codigo = $_POST['codigo'];
	$cantidad = $_POST['cantidad'];
	foreach ($factura as $key => $value) {
		$codigos = $codigo[$key];
		$cantidades = $cantidad[$key]+1;
		$datos[] = '("'.$value.'", "'.$codigos.'", "'.$cantidades.'")';
		print_r($datos);
		//$sql = "INSERT INTO facturas (id_factura, codigo_producto, cantidad) VALUES " . implode(',', $datos);
	}
	//print_r($sql);

	/*$sql2 = mysqli_query($conectar, $sql);
	if($sql2){
		echo json_encode(array('error' => false ));
	}else {
		echo json_encode(array('error' => true )) or die(mysqli_error($conectar));;
	}*/





//////////////////////////////////////////////////
?>