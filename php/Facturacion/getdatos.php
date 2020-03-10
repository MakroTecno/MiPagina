<?php 
include("../conexion_mysql.php");
$cod = $_GET['_num1'];
$conn = "SELECT * FROM Productos WHERE Codigo = '$cod'";
$mysqli = mysqli_query($conectar, $conn);
$clientes = array();
$contar = mysqli_num_rows($mysqli);
if ($contar == 0) {
	$clientes[] = array('codigo' => '0', 'Descripcion' => 'No hay nada', 'Vunitario' => '0', 'Resultado' => 2);
} else {
	while($row = mysqli_fetch_array($mysqli)) {
		$codigo = $row[0];
		$descrip = $row[1];
		$vunitario = $row[2];

       $clientes[] = array('codigo' => $codigo, 'Descripcion' => $descrip, 'Vunitario' => $vunitario, 'Resultado' => 1);

	}
}
$json_string = json_encode($clientes);
echo $json_string;

?>