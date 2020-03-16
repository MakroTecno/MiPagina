<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
session_start();
include("../conexion_mysql.php");
$user = $_SESSION['user'];
$cedula = $_POST['cedula'];
$IVA = 19;
$FC = date('Y-m-d');
$FE = $_POST['fe'];
$insertdatos = "INSERT INTO datos_factura (usuario, cedula, fechacrea, fechaentre, iva) VALUES ('$user', '$cedula', '$FC', '$FE', '$IVA')";
$insertsql = mysqli_query($conectar, $insertdatos);
	if($insertsql){
		header("location: indexfact.php");
	}else {
		die("Error: " . $conectar->connect_error);
	}
?>