<?php
session_start();
include("../conexion_mysql.php");
	$numfact  = $_POST['numfact'];
	$numfact2 = $_POST['numfact2'];
	$codigo   = $_POST['codigo'];
	$cantid   = $_POST['cantidad'];
	$usuari   = $_POST['user'];
	$iva 	  = $_POST['iva'];
	$fc 	  = $_POST['fc'];
	$fe 	  = $_POST['fe'];
	$vtotal = "N";
	$datosrep = "INSERT INTO facturas(id_regisfact, codigo_factura, codigo_producto, cantidad, valor_total) VALUES";
	for ($i=0; $i < count($numfact2); $i++) { 
		$datosrep .= "('".$numfact2[$i]."', '".$codigo[$i]."', '".$cantid[$i]."', '".$vtotal[$i]."'),";
	}
	$cadena_final = substr($datosrep, 0,-1);
	$cadena_final.=";";
    $datos = "INSERT INTO datos_factura (codigofactura, usuario, fechacrea, fechaentre, iva) VALUES ('$numfact', '$usuari', '$fc', '$fe', '$iva')";
    print_r($cadena_final);
	$sql  = mysqli_query($conectar, $cadena_final);
	var_dump($sql);
	$sql2 = mysqli_query($conectar, $datos);
	if($sql && $ql2){
		echo json_encode(array('error' => false ));
	}else {
		echo json_encode(array('error' => true )) or die(mysqli_error($conectar));;
	}

?>