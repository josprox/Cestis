<!-- 
    Código basado en JOSPROX MX | JOSPROX Internacional, con la unión de Facilito FX, Paoo CSS, Zara CSS y código de proyecto libre basado en JS.

    para más información de uso y propiedades favor de leer en el siguiente link oficial: https://josprox.com/politicas debido a la creación de este código, el cuál es independiente de la materia, creado con la tecnología de Facitio FX con la licencia de 2015 - 2022, para más información de licencia visite: https://github.com/josprox

     Por la presente se otorga con cargo, a cualquier persona que obtenga una copia de este software y los archivos de documentación asociados (el "Software"), para operar con el Software con restricciones, incluidos, entre otros, los derechos de uso, copia, modificación, fusión , publicar, distribuir, sublicenciar y / o vender copias del Software, y permitir que las personas a las que se les proporcione el Software lo hagan, sujeto a las siguientes condiciones:

    El aviso de copyright anterior y este aviso de permiso se incluirán en todas las copias o partes sustanciales del Software.

    EL SOFTWARE SE PROPORCIONA "TAL CUAL", SIN GARANTÍA DE NINGÚN TIPO, EXPRESA O IMPLÍCITA, INCLUYENDO, PERO NO LIMITADO A, LAS GARANTÍAS DE COMERCIABILIDAD, APTITUD PARA UN PROPÓSITO PARTICULAR Y NO INFRACCIÓN. EN NINGÚN CASO LOS AUTORES O TITULARES DE LOS DERECHOS DE AUTOR SERÁN RESPONSABLES DE CUALQUIER RECLAMO, DAÑOS U OTRA RESPONSABILIDAD, YA SEA EN UNA ACCIÓN DE CONTRATO, AGRAVIO O DE OTRO MODO, QUE SURJA DE, FUERA DE O EN RELACIÓN CON EL SOFTWARE O EL USO U OTRAS NEGOCIACIONES EN EL SOFTWARE. 
 -->

 <?php

include "ps-conexion/conexion.php";

session_start();

if (isset($_SESSION['id_usuario'])) {
    header("Location: panel");
}

//login por cookie
if (isset($_COOKIE['COOKIE_INDEFINED_SESSION'])) {
	if ($_COOKIE['COOKIE_INDEFINED_SESSION']) {
		$nombre_user = $_COOKIE['COOKIE_DATA_INDEFINED_SESSION']['user'];
		$password_user = $_COOKIE['COOKIE_DATA_INDEFINED_SESSION']['pass'];

		$sql = "SELECT id, password FROM usuarios WHERE usuario = '$nombre_user'";
		$resultado = $conexion->query($sql);
		$rows = $resultado->num_rows;
		if ($rows > 0) {
			$row = $resultado->fetch_assoc();
			$password_encriptada = $row['password'];
			if(password_verify($password_user,$password_encriptada) == TRUE){
				$_SESSION['id_usuario'] = $row['id'];
				header("Location: panel");
			}else{
				echo "<script>
				alert('Contraseña incorrecta, vuélvelo a intentar o cambia la contraseña. Error CCWP-232_alm_login');
				window.location= './';
			  </script>";
			  }
		} else {
			echo "<script>
				alert('Ninguno de los dos datos existen. Error CCWP-220_alm_login');
				window.location= './';
			</script>";
		}
	}
}

//Login
	if (isset($_POST["ingresar"])) {
		$usuario = mysqli_real_escape_string($conexion, $_POST['user']);
		$password = mysqli_real_escape_string($conexion, $_POST['pass']);

		//Cookie de usuario y contraseña
		setcookie("COOKIE_INDEFINED_SESSION", TRUE, time()+$_ENV['COOKIE_SESSION'], "/");
		setcookie("COOKIE_DATA_INDEFINED_SESSION[user]", $usuario, time()+$_ENV['COOKIE_SESSION'], "/");
		setcookie("COOKIE_DATA_INDEFINED_SESSION[pass]", $password, time()+$_ENV['COOKIE_SESSION'], "/");

		$sql = "SELECT id, password FROM usuarios WHERE usuario = '$usuario'";
		$resultado = $conexion->query($sql);
		$rows = $resultado->num_rows;
		if ($rows > 0) {
			$row = $resultado->fetch_assoc();
			$password_encriptada = $row['password'];
			if(password_verify($password,$password_encriptada) == TRUE){
				$_SESSION['id_usuario'] = $row['id'];
				header("Location: panel");
			}else{
				echo "<script>
				alert('Contraseña incorrecta, vuélvelo a intentar o cambia la contraseña. Error CCWP-232_alm_login');
				window.location= './';
			  </script>";
			  }
		} else {
			echo "<script>
				alert('Ninguno de los dos datos existen. Error CCWP-220_alm_login');
				window.location= './';
			</script>";
		}
	}

?>

<!DOCTYPE html>
<html lang="es-MX">
<head>
	<?php include "ps-includes/metas.php"; include "ps-plugins/adsense/ads.php";  ?>
	<title>Cetis Control Web Panel</title>
	<link rel="stylesheet" type="text/css" href="ps-contenido/css/logins.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<script src="./node_modules/sweetalert2/dist/sweetalert2.all.js"></script>
	<link rel="stylesheet" href="./node_modules/sweetalert2/dist/sweetalert2.min.css">
	<script src="./node_modules/jquery/dist/jquery.min.js"></script>
</head>
<body>
	<a href="./social/" class="btn_social" target="_blank" rel="noopener noreferrer"><i class="fa-solid fa-users"></i></a>
    <a href="https://github.com/josprox/Cetis-CWP" class="btn_github" target="_blank" rel="noopener noreferrer"><i class="fa-brands fa-github"></i></a>
	<img class="wave" src="ps-contenido/img/wave.png">
	<div class="container">
		<div class="img">
			<img src="ps-contenido/img/bg.svg">
		</div>
		<div class="login-content">
			<form action="<?php $_SERVER["PHP_SELF"]; ?>" method="POST">
				<img src="ps-contenido/img/avatar.svg">
				<h2 class="title">Bienvenido a Cetis CWP</h2>
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>Usuario</h5>
           		   		<input type="text" class="input" name="user" required>
           		   </div>
           		</div>
           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Contraseña</h5>
           		    	<input type="password" name="pass" class="input" required>
            	   </div>
            	</div>
            	<a href="registros">No estás registrado? Registrate aquí</a>
            	<a href="reset">Has olvidado tú contraseña? Has clic aquí</a>
            	<a href="https://panel.josprox.ovh">¿Eres de servicio escolar? has clic aquí</a>
            	<input name="ingresar" type="submit" class="btn_redirect" value="Iniciar sesión">
				<a href="./maestros" class="btn_redirect">Soy maestro(a)</a>
            </form>
        </div>
    </div>
    <script type="text/javascript" src="ps-contenido/js/logins.js"></script>
	<script src="ps-contenido/js/sweetalert.js"></script>
	<script src="./service.js"></script>
</body>
</html>
<?php mysqli_close($conexion); ?>