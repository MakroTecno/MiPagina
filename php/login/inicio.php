<!DOCTYPE html>
<?php
session_start();
if(!isset($_SESSION['id'])){
	header("location: usuario.php");
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
				  <a class="navbar-brand" href="#">Inicio</a>
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
					      <?php
					      $rol = $_SESSION['rol'];
					      if ($rol == 1){
					      ?>
					      <li class="nav-item dropdown">
					        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					          Administrar
					        </a>
					        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
					          <a class="dropdown-item" href="../Admin/rol.php">Add/Quit Rol</a>
					          <a class="dropdown-item" href="#">Usuarios</a>
					          <a class="dropdown-item" href="#">Editar Usuarios</a>
					        </div>
					      </li>
					      <?php 
					  }
					  	?>
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
					    			echo '<img src="'.$traerimg["foto"].'" width="50px" height="50px">';
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
	<h1>AQUI SE MUESTRAN LAS NOVEDADES DE LOS SISTEMAS Y PROYECTOS DE LA EMPRESA</h1>
</div>






	<script src="../../js/bootstrap.min.js"></script>
	<script src="../../js/script.js"></script>
</section>
</body>
<?php 
}
?>
</html>