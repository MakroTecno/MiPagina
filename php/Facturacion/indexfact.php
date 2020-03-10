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
				<form method="POST" action="validarfactu.php" class="factura">
					<div class="container">
						<div class="row">
				<div class="col-12 col-sm-6">
					<br><label for="nf">Numero de Factura</label>
				    <br><input type="number" id="nf" name="numfact">
				    <br><label for="code">Cliente</label>
				    <br><select name="user">
				    	<option>Seleccione el cliente</option>
				    	<?php 
				    	$sql = "SELECT usuario FROM usuario";
				    	$consulta = mysqli_query($conectar, $sql);
				    	while ($mover = mysqli_fetch_array($consulta)){
				    	?>
				    	<option value="<?php echo $mover['usuario']; ?>"><?php echo $mover['usuario']; ?></option>
				    <?php }?>
				    </select>
				    <br><label for="iva">IVA</label>
				    <br><input type="number" id="iva" name="iva">
				    <br><label for="fc">Fecha de Creacion</label>
				    <br><input type="date" id="fc" name="fc">
				    <br><label for="fe">Fecha de Entrega</label>
				    <br><input type="date" id="fe" name="fe">
				</div>

				<div class="col-12 col-sm-6 repetido">
				<label for="numfact2">Confirmar No. de Factura</label>
					<br><input type="number" id="numfact2" name="numfact2[]"> 
				    <br><label for="code">Codigo</label>
				    <br><input id="code" type="number" name="codigo[]">
				    <br><label for="cantidad">Cantidad</label>
				    <br><input type="number" id="cantidad" name="cantidad[]">
				    <hr>
				</div>
				  <button type="submit" class="btn btn-primary submit">Submit</button>
				</div>
			</div>
				</form>
				<center><input type="submit" id="agregar" value="+"></center>
</section>
<!-- FOOTER -->
<section class="footer">
	<div class="container">

	</div>






	<script src="../../js/bootstrap.min.js"></script>
	<script src="../../js/script.js"></script>
	<script src="../../js/indexfact.js"></script>
</section>
</body>
<?php
 }else {
 	header("location: ../perfil.php");
 } 
}
?>
</html>