<!DOCTYPE html>
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
        </div>
	</div>
</section>
<!-- CUERPO -->
<section class="cuerpo">
	<div class="container regislogin">
		<div class="row formuser">
			<div class="col-12 botonuser">
			  <button id="login2"><img src="../../img/iconos/key.png"></button>
			  <button id="registro2"><img src="../../img/iconos/file-empty.png"></button>
		    </div>
		    <div class="col-12 registro">
				<form  method="POST" id="registro">
					<input type="text" name="usuario" placeholder="Usuario"><br>
					<input type="password" name="contraseña" placeholder="Contraseña"><br><br>
					<button name="registro">Registrarse</button>
				</form>
			</div>
			<div class="col-12 login">
				<form  method="POST" id="login">
					<input type="text" name="usuario" placeholder="Usuario"><br>
					<input type="password" name="contraseña" placeholder="Contraseña"><br><br>
					<button name="login">Loguearse</button>
				</form>
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


<!-- PHP -->
<?php
include("../conexion_mysql.php");
// REGISTRAR EL USUARIO
if(isset($_POST['registro'])) {
$user = mysqli_real_escape_string($conectar, $_POST['usuario']);
$pass = mysqli_real_escape_string($conectar, $_POST['contraseña']);
// VERIFICAR SI EL USUARIO EXISTE
            //$resultado_entrar1=mysqli_query($conexion, "SELECT * FROM usuarios WHERE usuario='$usuario_entrar' AND contrasenha='$contra_entrar'");
            $resultado_entrar = $conectar->prepare("SELECT usuario, pass FROM usuario WHERE usuario=? AND pass=?");
            $resultado_entrar->bind_param("ss", $user, $pass);
            $resultado_entrar->execute();
            $resultado_entrar->store_result();

            if ($resultado_entrar===false){
                die("Error: " . $conectar->connect_error);
            }else{

                $verificacion_entrar = $resultado_entrar->num_rows;


                if($verificacion_entrar>0){

                    echo '<p class="alert alert-danger">Ya existe el Usuario o Contraseña!.</p>';

                }else{

                    $rol = 2;
                    $visitas = 0;
                    $pnombre = "a";
                    $snombre = "a";
                    $papellido = "a";
                    $sapellido = "a";
                    $cedula = 0;
                    $foto = "a";
                    $correo = "a";
                    $celular = 0;
                    $direccion = "a";
                    $fechanac = date("d/m/y");
                    $sql = "INSERT INTO usuario(usuario, pass, visitas, rol, pnombre, snombre, papellido, sapellido, cedula, foto, correo, celular, direccion, fechanac) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
                    $verificar = mysqli_prepare($conectar, $sql);
                    $sentencia = mysqli_stmt_bind_param($verificar, "ssiissssississ", $user, $pass, $visitas, $rol, $pnombre, $snombre, $papellido, $sapellido, $cedula, $foto, $correo, $celular, $direccion, $fechanac);
                    $sentencia = mysqli_stmt_execute($verificar);
                    if($sentencia == FALSE) {
                    	echo '<p class="alert alert-danger">Problema en el sistema!.</p>';
                    }else {
                    	header('Refresh: 5; URL=usuario.php');
                    	echo '<p class="alert alert-success">Registro exitoso, Bienvenido!</p>';
                    }
                }
            }

}

// LOGIN DEL USUARIO
if(isset($_POST['login'])) 
{
	session_start();
	$user = mysqli_real_escape_string($conectar, $_POST['usuario']);
	$pass = mysqli_real_escape_string($conectar, $_POST['contraseña']);
	// VERIFICAR SI EL USUARIO EXISTE
$consulta = "SELECT id_usuario, usuario, pass, rol, visitas FROM usuario WHERE usuario = ? AND pass = ?";
$verificar = mysqli_prepare($conectar, $consulta);
$sentencia = mysqli_stmt_bind_param($verificar, "ss",$user, $pass);
$sentencia = mysqli_stmt_execute($verificar);
$sentencia = mysqli_stmt_bind_result($verificar, $id, $user, $contrasena, $rol, $visitas);
while(mysqli_stmt_fetch($verificar)) {
	$_SESSION['id']         = $id;
	$_SESSION['user']       = $user;
	$_SESSION['contrasena'] = $contrasena;
	$_SESSION['rol']        = $rol;
	$_SESSION['visita']     = $visitas;

		if($_SESSION['user'] == $user && $_SESSION['contrasena'] == $pass) {
		header("location: registro.php");
	}else {
		echo '<p class="alert alert-danger">Contraseña o Clave incorrectos.</p>';			
	}
}
}
?>



</body>
</html>



