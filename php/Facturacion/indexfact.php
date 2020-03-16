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
	<script src="../../js/indexfact.js"></script>
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
					          <a class="dropdown-item" href="productos.php">Productos</a>
					        </div>
					      </li>
					      <li class="nav-item">
					        <a class="nav-link" href="salir.php">Salir</a>
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
	<form method="POST" action="validaruser.php" class="factura">
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

	<form method="POST" action="validarfactu.php" class="factura_repetida" id="facturas">
		<div class="container">
			<div class="row">
				<div class="col-12 repetido">
				<?php 
					$traercodigo = "SELECT id_factura FROM datos_factura WHERE usuario = '$user'";
					$consultacodigo = mysqli_query($conectar, $traercodigo);
					while ($traer = mysqli_fetch_array($consultacodigo)){
				?>
					<input type="hidden" name="factura[]" value="<?php echo $traer['id_factura']?>"> 
				<?php } ?>
				    <label for="code">Code Producto</label>
				    <br><input id="code" type="number" name="codigo[]">
				    <br><label for="cantidad">Cantidad</label>
				    <br><input type="number" id="cantidad" name="cantidad[]">
				    <hr>
				</div>
			</div>
			<button type="submit" class="btn btn-primary submit">Submit</button><br>
		</div>
	</form>
				<br><center><input type="submit" id="agregar" value="+"></center>	
</section>
<!-- FOOTER -->
<section class="footer">
	<div class="container">

	</div>






	<script src="../../js/bootstrap.min.js"></script>

</section>
</body>
<?php
 }else {
 	header("location: ../perfil.php");
 } 
}
?>
</html>