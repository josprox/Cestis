<!-- 
    Código basado en JOSPROX MX | JOSPROX Internacional, con la unión de Facilito FX, Paoo CSS, Zara CSS y código de proyecto libre basado en JS.

    para más información de uso y propiedades favor de leer en el siguiente link oficial: https://josprox.com/politicas debido a la creación de este código, el cuál es independiente de la materia, creado con la tecnología de Facitio FX con la licencia de 2015 - 2022, para más información de licencia visite: https://github.com/josprox

     Por la presente se otorga con cargo, a cualquier persona que obtenga una copia de este software y los archivos de documentación asociados (el "Software"), para operar con el Software con restricciones, incluidos, entre otros, los derechos de uso, copia, modificación, fusión , publicar, distribuir, sublicenciar y / o vender copias del Software, y permitir que las personas a las que se les proporcione el Software lo hagan, sujeto a las siguientes condiciones:

    El aviso de copyright anterior y este aviso de permiso se incluirán en todas las copias o partes sustanciales del Software.

    EL SOFTWARE SE PROPORCIONA "TAL CUAL", SIN GARANTÍA DE NINGÚN TIPO, EXPRESA O IMPLÍCITA, INCLUYENDO, PERO NO LIMITADO A, LAS GARANTÍAS DE COMERCIABILIDAD, APTITUD PARA UN PROPÓSITO PARTICULAR Y NO INFRACCIÓN. EN NINGÚN CASO LOS AUTORES O TITULARES DE LOS DERECHOS DE AUTOR SERÁN RESPONSABLES DE CUALQUIER RECLAMO, DAÑOS U OTRA RESPONSABILIDAD, YA SEA EN UNA ACCIÓN DE CONTRATO, AGRAVIO O DE OTRO MODO, QUE SURJA DE, FUERA DE O EN RELACIÓN CON EL SOFTWARE O EL USO U OTRAS NEGOCIACIONES EN EL SOFTWARE. 
 -->

 <?php
 
 include "./../ps-conexion/conexion.php";
	session_start();
	if (isset($_SESSION['id_usuario'])) {
		header("Location: ./home/");
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
				header("Location: ./home/");
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
          header("Location: ./home/");
        }else{
          echo "<script>
          alert('Contraseña incorrecta, vuélvelo a intentar o cambia la contraseña. Error CCWP-232_social');
          window.location= './';
          </script>";
        }
    } else {
        echo "<script>
          alert('Ninguno de los dos datos existen. Error CCWP-220_social');
          window.location= './';
        </script>";
    }
}

 ?>

<!DOCTYPE html> 
<html lang="es-MX">
<head>
	<title>Cristal | Iniciar sesión</title>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="./images/logo.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <script src="https://kit.fontawesome.com/4a5e39d1d1.js" crossorigin="anonymous"></script>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->

	<!-- Progresive web -->

	<meta name="description" content="Se bienvenido a Cristal, donde podrás conocer personas de tu mismo instituto, que esperas solo necesitas registrarte en Cetis CWP.">

  <meta name="theme-color" content="#c953c0">
  <meta name="MobileOptimized" content="width">
  <meta name="HandheldFriendly" content="true">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
  <link rel="apple-touch-icon" href="./images/logo.png">
  <link rel="apple-touch-startup-image" href="./images/logo.png">
  <link rel="manifest" href="./manifest.json">

  <!-- Progresive web -->
	
  <link rel="stylesheet" href="../ps-contenido/scss/boton_social.css">
	
</head>
<body>

	<a href="../" class="btn_social" target="_blank" rel="noopener noreferrer"><i class="fa-solid fa-school"></i></a>
    <a href="https://github.com/josprox/Cetis-CWP" class="btn_github" target="_blank" rel="noopener noreferrer"><i class="fa-brands fa-github"></i></a>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
			<div class="wrap-login100">
				<form class="login100-form validate-form" action="<?php $_SERVER["PHP_SELF"]; ?>" method="POST">
					<span class="login100-form-logo">
						<i class="zmdi zmdi-landscape"></i>
					</span>

					<span class="login100-form-title p-b-34 p-t-27">
						Cristal App
					</span>

					<div class="text-center p-t-90">
						<a class="txt1" href="../registros">
							¿No estás registrado? registrate en Cetis CWP para poder acceder
						</a>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="text" name="user" placeholder="Usuario">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="pass" placeholder="Contraseña">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" name="ingresar" type="submit">
							Iniciar sesión
						</button>
					</div>

					<div class="text-center p-t-90">
						<a class="txt1" href="../reset">
							¿Olvidaste tu contraseña? da clic aquí
						</a>
					</div>

				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
<script src="js/main.js"></script>
<!--===============================================================================================-->

<script src="./script.js"></script>

</body>
</html>