<?php
session_start();
if(!isset($_SESSION['id'])){
	header("location: ../login/usuario.php");
}else {
	if($_SESSION['rol'] = 1) {
			include("../conexion_mysql.php");
	$user = $_SESSION['user']
	?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<form method="POST" action="#" class="factura">
		<div class="container">
			<div class="row">
				<div class="col-12">
				    <label for="cedula">Cedula</label>
				    <br><input type="number" name="cedula">
				    <br><label for="fe">Fecha de Entrega</label>
				    <br><input type="date" id="fe" name="fe">
				    <br><br><input type="submit" name="datosuser">
				</div>
			</div>
		</div>
	</form>	


</body>
</html>


	<?php 
if(isset($_POST['datosuser'])){
	include("../conexion_mysql.php");
$cedula = $_POST['cedula'];
$IVA = 19;
$FC = date('Y-m-d');
$FE = $_POST['fe'];
$insertdatos = "INSERT INTO datos_factura (cedula, fechacrea, fechaentre, iva) VALUES ('$cedula', '$FC', '$FE', '$IVA')";
$insertsql = mysqli_query($conectar, $insertdatos);
	if($insertsql){
		header("location: indexfact.php");
	}else {
		die("Error: " . $conectar->connect_error);
	}
}


}else {
 	header("location: ../perfil.php");
 } 
}
	?>