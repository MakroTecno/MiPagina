<?php
session_start();
include("../conexion_mysql.php");
	$codigo = $_POST['codigo'];
	$descri = $_POST['descripcion'];
	$vunita = $_POST['vunitario'];
	$unidme = $_POST['unid_med'];
	$cadena = "INSERT INTO productos (codigo, descripcion, vunitario, unid_med) VALUES ";

	for ($i=0; $i < count($codigo); $i++) { 
		$cadena.= "('".$codigo[$i]."', '".$descri[$i]."', '".$vunita[$i]."', '".$unidme[$i]."'),";
	}
	$cadena_final = substr($cadena, 0,-1);
	$cadena_final.=";";
	$sql = mysqli_query($conectar, $cadena_final);
	if ($sql) {
		header("location:productos.php");	
	}else {
		echo 'Error';
	}
	$mysqli = mysqli_close($conectar);
	

?>