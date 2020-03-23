<?php 
header('Content-Type: application/json');
	include("../php/conexion_mysql.php");
	require("metodos.php");
	$datosql = "SELECT * FROM productos";
	$datosql2 = mysqli_query($conectar,$datosql);
	$row_count = 5;
	$page = 1;
	Metodos::datos($datosql2, $row_count, $page);
	Metodos::datos($pagina);
	$sql = "SELECT * FROM productos LIMIT $pagina, $row_count";
	$sql2 = mysqli_query($conectar, $sql);
	print_r($sql2);
	/*while($rows = mysqli_fetch_array($sql2)){
		//echo $rows['codigo'];
		$array = array('codigo' => $rows['codigo']);
		print_r($array['codigo']);
	}
	while ($rows = mysqli_fetch_array($sql2)){
	$page_count = ceil($total_count/$row_count);
	$pagarray = array('page_count'=>$page_count,
					  'total_count'=>$total_count,
					  'row'=>array('codigo'=>$rows['codigo']),
					  //'row2'=>array($rows['codigo'],$rows['descripcion'],$rows['vunitario']),
					  'page'=>$page,
					  'row_count'=>$row_count);
	}*/
	
	
//print_r($pagarray);






///////////////////////////////////////////////////////


?>