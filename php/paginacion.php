<?php 
header('Content-Type: application/json');
	include("php/conexion_mysql.php");
	$datosql = "SELECT * FROM productos";
	$datosql2 = mysqli_query($conectar,$datosql);
	$total_count = $datosql2->num_rows;
	$row_count = 5;
	$page = 1;
	$pagina = ($page-1)*$row_count;
	$sql = "SELECT * FROM productos LIMIT $pagina, $row_count";
	$sql2 = mysqli_query($conectar, $sql);
	while ($rows = mysqli_fetch_array($sql2)){
	$page_count = ceil($total_count/$row_count);
	$pagarray = array('page_count'=>$page_count,
					  'total_count'=>$total_count,
					  'row'=>array($rows['codigo'],$rows['descripcion'],$rows['vunitario']),
					  'row2'=>array($rows['codigo'],$rows['descripcion'],$rows['vunitario']),
					  'page'=>$page,
					  'row_count'=>$row_count);
	}
	
	
print_r($pagarray);
?>