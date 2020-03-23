<!DOCTYPE html>
<?php 
session_start();
include("../conexion_mysql.php");
$ID = $_SESSION['id'];
$nombre = $_SESSION['user'];
if(isset($ID)){
$visita = $_SESSION['visita'];
$visitasuma = $visita + 1;
$sql = "UPDATE usuario SET visitas = '$visitasuma' WHERE id_usuario = '$ID'";
$consulta = mysqli_query($conectar, $sql);
if($visitasuma < 2) {
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
	        <div class="col-8 welcome">
				<p class="nav-link">Bienvenido <?php echo $nombre?></p>
	        </div>
	        <div class="col-4 salir">
	        	<a class="salir" href="salir.php"><img class="imgicon" src="../../img/iconos/logout.png"></a>
	        </div>
        </div>
	</div>
</section>



<!-- CUERPO -->
<section class="cuerpo registro1">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<form method="POST" enctype="multipart/form-data">
					<div class="row">
<div class="col-12 col-sm-6">
   <div class="form-group">
    <label for="PrimerN">Primer Nombre</label>
    <input type="text" class="form-control" id="PrimerN" name="PrimerN">
  </div>
</div>
<div class="col-12 col-sm-6">
  <div class="form-group">
    <label for="SegundoN">Segundo Nombre</label>
    <input type="text" class="form-control" id="SegundoN" name="SegundoN">
  </div>
</div>
<div class="col-12 col-sm-6">
  <div class="form-group">
    <label for="PrimerA">Primer Apellido</label>
    <input type="text" class="form-control" id="PrimerA" name="PrimerA">
  </div>
</div>
<div class="col-12 col-sm-6">
  <div class="form-group">
    <label for="SegundoA">Segundo Apellido</label>
    <input type="text" class="form-control" id="SegundoA" name="SegundoA">
  </div>
</div>
<div class="col-12 col-sm-6">
  <div class="form-group">
    <label for="Cedula">Cedula</label>
    <input type="number" class="form-control" id="Cedula" name="Cedula">
  </div>
</div>
<div class="col-12 col-sm-6">
  <div class="form-group">
    <label for="Celular">Celular</label>
    <input type="text" class="form-control" id="Celular" name="Celular">
  </div>
</div>
<div class="col-12 col-sm-2">
  <div class="form-group">
    <label for="Edad">Fecha de Nacimiento</label>
    <input type="date" class="form-control" id="Edad" name="Edad">
  </div>
</div>
<div class="col-12 col-sm-10">
  <div class="form-group">
    <label for="Email">Correo Electronico</label>
    <input type="email" class="form-control" id="Email" name="Email">
  </div>
</div>
<div class="col-12 col-sm-4">
  <div class="form-group">
    <label for="file">Foto</label>
    <input type="file" class="form-control" id="file" name="file">
  </div>
</div>
<div class="col-12 col-sm-8">
  <div class="form-group">
    <label for="Direccion">Direccion</label>
    <input type="text" class="form-control" id="Direccion" name="Direccion">
  </div>
</div>
</div>
  <button type="submit" class="btn btn-primary" name="Registro">Enviar</button>
				</form>
			</div>
		</div>
	</div>
</section>

<section class="footer">
	<script src="../../js/bootstrap.min.js"></script>
	<script src="../../js/script.js"></script>
</section>
</body>

</html>
<?php 
error_reporting(E_ALL);
ini_set('display_errors', '1');
// ENLISTAR NUESTROS DATOS A LA BASE DE DATOS
if (isset($_POST['Registro'])){

$file = $_FILES['file']['name'];
$filetipo = $_FILES['file']['type'];
$filetamaño = $_FILES['file']['size'];
$filetemp = $_FILES['file']['tmp_name'];

if (getimagesize($filetemp) != false) {

    if($filetamaño < 30000) {

        if(strtolower(pathinfo($file, PATHINFO_EXTENSION)) == "jpg" || strtolower(pathinfo($file, PATHINFO_EXTENSION)) == "png") {

            $directorio = "images/";
            $archivo = $directorio . basename($_FILES["file"]["name"]);
            if(move_uploaded_file($_FILES["file"]["tmp_name"], $archivo)){
              $ID        = $_SESSION['id'];
            	$nombre    = $_SESSION['user'];
            	$pnombre   = $_POST['PrimerN'];
      				$snombre   = $_POST['SegundoN'];
      				$papellido = $_POST['PrimerA'];
      				$sapellido = $_POST['SegundoA'];
      				$cedula    = $_POST['Cedula'];
      				$celular   = $_POST['Celular'];
      				$fechanac  = $_POST['Edad'];
      				$email     = $_POST['Email'];
      				$file      = $archivo;
      				$direccion = $_POST['Direccion'];

				$inseruser = "UPDATE usuario SET pnombre = '$pnombre', snombre = '$snombre', papellido = '$papellido', sapellido = '$sapellido',
        cedula = '$cedula', foto = '$file', correo = '$email', celular = '$celular', direccion = '$direccion', fechanac = '$fechanac' WHERE usuario = '$nombre'";

				 $consulta1 = mysqli_query($conectar, $inseruser);

				 if ($consulta1) {
				 	header("location: inicio.php");
				 }
				 else {
				 	echo 'Error al mandar los datos, verifica' .mysqli_error($conectar);
				 }

            }else {
            echo '<script> alert("Error al subir la imagen."); </script>';      
            }

        }else {
        echo '<script> alert("Formatos permitidos: JPG/PNG."); </script>';  
        }

    }else {
        echo '<script> alert("Se permiten imagenes maximo de 30kb."); </script>';
    }


}else {
    echo '<script> alert("Solo se permiten imagenes."); </script>';
}
}

 }else {
	header("location:inicio.php");
 }
}
else {
	header("location:usuario.php");
}
?>