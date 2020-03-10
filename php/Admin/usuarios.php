<!DOCTYPE html>
<?php
session_start();
if(!isset($_SESSION['id'])){
	header("location: usuario.php");
}
else {
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
					      <li class="nav-item dropdown">
					        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					          Administrar
					        </a>
					        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
					          <a class="dropdown-item" href="rol.php">Add/Quit Rol</a>
					          <a class="dropdown-item" href="#">Editar Usuarios</a>
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
		<div class="col-12">
			<table class="table table-dark">
				<thead>
				<tr>
					<th scope="col">ID</th>
					<th scope="col">USUARIOS</th>
					<th scope="col">PRIVILEGIOS</th>
				</tr>
			</thead>
				<tbody>
					<?php 
					$selectuser = "SELECT id_usuario, usuario, rol FROM usuario";
					$sqluser = mysqli_query($conectar, $selectuser);
					if($sqluser) {
						while($sluser = mysqli_fetch_array($sqluser)) {
							?>
				<tr>
					
						<td><?php echo $sluser['id_usuario'];?></td>
						<td><?php echo $sluser['usuario'];?></td>
						<td><?php echo $sluser['rol'];?></td>	
							<?php
						}
					}
					?>
				</tr>
			</tbody>
			</table>
		</div>
	</div>
</div>






	<script src="../../js/bootstrap.min.js"></script>
	<script src="../../js/script.js"></script>
</section>
</body>
<?php
if(isset($_POST['Registrar'])) {

	$ID = $_POST['ID'];
	$rol = $_POST['privilegio'];
	$acturol = "UPDATE usuario SET rol = '$rol' WHERE usuario.id_usuario = '$ID'";
	$selectrol = mysqli_query($conectar, $acturol);
	if($selectrol) {
  		echo '<p class="alert alert-success">Cambio exitoso!</p>';
	}else {
	echo '<p class="alert alert-danger">Problema en el Sistema, intenta mas tarde.</p>' .mysqli_error($conectar);
	}


}
}else {
 	header("location: ../perfil.php");
 }  
}
?>
</html>