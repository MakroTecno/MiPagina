<!DOCTYPE html>
<?php
session_start();
if(!isset($_SESSION['id'])){
	header("location: ../login/usuario.php");
}
else {
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
						  <li class="nav-item">
					        <a class="nav-link" href="verfact.php">Mis Facturas</a>
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
			<div class="col-12">
			</div>
		</div>
	</div>
</section>
<!-- FOOTER -->
<section class="footer">
	<div class="container">

	</div>






	<script src="../../js/bootstrap.min.js"></script>
	<script src="../../js/script.js"></script>
</section>
</body>
<?php 
}
?>
</html>