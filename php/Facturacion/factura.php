<!DOCTYPE html>
<?php
session_start();
if(!isset($_SESSION['id'])){
	header("location: ../login/usuario.php");
}
else {
	include("../conexion_mysql.php");
	$user   = $_SESSION['user'];
	$rol = $_SESSION['rol'];
	$cedula = $_SESSION['cedula'];
	$factura = $_GET['fact'];
	?>
<html>
<head>
	<title>Inicio</title>
	<link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css">
	<script src="../../js/jquery-3.4.1.min.js"></script>
	<link rel="stylesheet" type="text/css" href="../../css/estilos.css">
</head>
<body>
	<section>
		<div class="container">
			<div class="row">
				<?php 
					
					$sqluser = "SELECT usuario, fechacrea, fechaentre, iva FROM datos_factura WHERE id_factura = '$factura'";
					$sqlcons = mysqli_query($conectar, $sqluser);

					while ($row = mysqli_fetch_array($sqlcons)) {
						$iva = $row['iva'];
				?>
							<div class="col-12">
										<h1>TIVICOM Servicios a Terceros</h1>
							</div>
							<div class="col-6">
										<p>Vendedor: <?php echo $row['usuario']?></p>
										<p>Fecha Creacion: <?php echo $row['fechacrea']?></p>
										<p>Fecha Entrega: <?php echo $row['fechaentre']?></p>
							</div>
				<?php
			}
					$sql = 
					"SELECT CONCAT(pnombre, ' ' , snombre) AS nombre, CONCAT(papellido, ' ', sapellido) AS apellido, 
					cedula, direccion, celular, correo FROM usuario WHERE cedula = '$cedula'";
					$conn = mysqli_query($conectar, $sql);
					while ($row = mysqli_fetch_array($conn)) {
				?>
							<div class="col-6">
										<p>Nombres: <?php echo $row['nombre']?> </p>
										<p>Apellidos: <?php echo $row['apellido']?> </p>
										<p>Cedula: <?php echo $row['cedula']?></p>
										<p>Direccion: <?php echo $row['direccion']?></p>
										<p>Celular: <?php echo $row['celular']?></p>
							</div>
			<?php
				} 
			?>
									<!-- TITULOS -->
							<div class="col-12">
										<h2>INFORMACION PRODUCTOS</h2>
							</div>
							<div class="col-2">
										<p>COD</p>
							</div>
							<div class="col-1">
										<p>CANT</p>			
							</div>
							<div class="col-3">
										<p>DESCRIPCION</p>
							</div>
							<div class="col-2">
										<p>VUNIT</p>
							</div>
							<div class="col-1">
										<p>U/M</p>
							</div>
							<div class="col-3">
										<p>SUBTOTAL</p>
							</div>
			<?php
					$sql = "SELECT facturas.codigo_producto as codigo, facturas.cantidad as cantidad, productos.vunitario as vunitario, productos.descripcion as descripcion, (cantidad*vunitario) as subtotal, productos.unid_med as UM FROM facturas INNER JOIN productos WHERE id_factura = '$factura' AND productos.codigo = facturas.codigo_producto";
					$conn = mysqli_query($conectar, $sql);
					$sub_total = 0;
					while ($row = mysqli_fetch_array($conn)){
			?>				
									<!-- PRODUCTOS -->
							<div class="col-2">
										<p><?php echo $row['codigo']?></p>
							</div>
							<div class="col-1">
										<p><?php echo $row['cantidad']?></p>			
							</div>
							<div class="col-3">
										<p><?php echo $row['descripcion']?></p>
							</div>
							<div class="col-2">
										<p><?php echo $row['vunitario']?></p>
							</div>
							<div class="col-1">
										<p><?php echo $row['UM']?></p>
							</div>
							<div class="col-3">
										<p> 
											<?php 
												$subtotal = $row['subtotal'];
												echo $subtotal;
												$sub_total = $sub_total + $subtotal;
												$sub_totaliva = CEIL($sub_total*0.19);
												$total = $sub_totaliva+$sub_total;
											?>	
										</p>
							</div>
			<?php 
				}
			?>
							<div class="col-5">
										<p>Responsable:</p>
										<p>TIVICOM SERVICIOS A TERCEROS</p>
							</div>
							<div class="col-4">
										<p>IVA</p>
										<p>TOTAL</p>
							</div>
							<div class="col-3">
										<p><?php echo $iva?>&#37</p>
										<p><?php echo $total?></p>
							</div>
					<a href="verfact.php"><button>Regresar</button></a>
				</div>
			</div>
		</div>
	</section>
</body>
<?php 
}
?>
</html>
