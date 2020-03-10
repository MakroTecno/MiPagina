<!DOCTYPE html>
<?php
session_start();
if(!isset($_SESSION['id'])){
	header("location: ../login/usuario.php");
}else {
	if($_SESSION['rol'] = 1) {
			include("../conexion_mysql.php");
	$user = $_SESSION['user']
	?>
<html>
<head>
	<title>Inicio</title>
	<link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css">
	<script src="../../js/jquery-3.4.1.min.js"></script>
	<link rel="stylesheet" type="text/css" href="../../css/estilos.css">
</head>
<body>

<!-- HEADER -->
<section class="header">
	<div class="container">
		<div class="row">
			<div class="col-12 logo">
				<img src="../../img/logo.png">
	        </div>
	        <div class="col-12 menu">
				<nav class="navbar navbar-expand-lg navbar-light bg-light">
				  <a class="navbar-brand" href="../login/inicio.php">Inicio</a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="    navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					    <span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse" id="navbarSupportedContent">
					    <ul class="navbar-nav mr-auto">
					      <li class="nav-item">
					        <a class="nav-link" href="../perfil.php">Perfil</a>
					      </li>
					      <li class="nav-item">
					        <a class="nav-link" href="../proyectos.php">Sistemas</a>
					      </li>
					      	<li class="nav-item dropdown active">
					        <a class="nav-link dropdown-toggle" href="proyectos.php" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					          Facturacion
					        </a>
					        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
					          <a class="dropdown-item" href="verfact.php">Mis Facturas</a>
					          <a class="dropdown-item" href="indexfact.php">Agregar Facturas</a>
					        </div>
					      </li>
					      <li class="nav-item">
					        <a class="nav-link" href="../login/salir.php">Salir</a>
					      </li>
					    </ul>
					    					    	<div class="form-inline my-2 my-lg-0 puser">
					    		<?php 
					    		$consulimg = "SELECT foto, usuario FROM usuario WHERE usuario = '$user'";
					    		$sql = mysqli_query($conectar, $consulimg);
					    		while ($traerimg = mysqli_fetch_array($sql)){
					    			echo '<p>'.$traerimg['usuario'].'</p>';
					    			echo '<img src="../login/'.$traerimg["foto"].'" width="50px" height="50px">';
								 } 
 							  ?>
					    	</div>
					</div>
				</nav>
	        </div>
        </div>
	</div>
</section>
<!-- CUERPO -->
<section class="cuerpo">
	<div class="container">
		<div class="row">
		<div class="col-12 productos">
			<table class="table table-dark">
				<thead>
				<tr>
					<th scope="col">Codigo</th>
					<th scope="col">Descripcion</th>
					<th scope="col">Valor Unitario</th>
					<th scope="col">Medida</th>
				</tr>
			</thead>
				<tbody>
					<?php 
					$selectuser = "SELECT * FROM productos";
					$sqluser = mysqli_query($conectar, $selectuser);
					if($sqluser) {
						while($sluser = mysqli_fetch_array($sqluser)) {
							?>
				<tr>
					
						<td><?php echo $sluser['codigo'];?></td>
						<td><?php echo $sluser['descripcion'];?></td>
						<td><?php echo $sluser['vunitario'];?></td>
						<td><?php echo $sluser['unid_med'];?></td>	
							<?php
						}
					}
					?>
				</tr>
			</tbody>
			</table>
		</div>
		<div class="col-12 mdespleg">
					<button id="Agregarproduct">Agregar Producto</button>
					<input type="submit" id="agregar" value="+">
			<form id="Productos" method="POST" action="validarprodu.php">
				<div class="product">
				<div class="form-group">
					<input type="text" name="codigo[]" placeholder="Codigo">
				</div>
				<div class="form-group">
					<input type="text" name="descripcion[]" placeholder="Descripcion">
				</div>
				<div class="form-group">
					<input type="number" name="vunitario[]" placeholder="Vunitario">
				</div>
				<div class="form-group">
					<input type="text" name="unid_med[]" placeholder="Unidad/Medida">
				</div>
			</div>
				<input type="submit" name="Enviar" value="Enviar">
			</form>
		</div>
	</div>
</section>
<!-- FOOTER -->
<section class="footer">
	<div class="container">

	</div>

	<script src="../../js/bootstrap.min.js"></script>
	<script src="../../js/script.js"></script>
	<script src="../../js/scriptfact.js"></script>
</section>
</body>
<?php
 }else {
 	header("location: ../perfil.php");
 } 
}
?>
</html>