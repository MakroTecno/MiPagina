<?php 

	include("../php/conexion_mysql.php");
	class Metodos
	{
		public function datos($sql, $row_count, $page){
			echo $total_count = $sql->num_rows;
			echo $pagina = ($page-1)*$row_count;
			echo $page_count = ceil($total_count/$row_count);
			
		}
	}

?>