<!-- 
    Código basado en JOSPROX MX | JOSPROX Internacional, con la unión de Facilito FX, Paoo CSS, Zara CSS y código de proyecto libre basado en JS.

    para más información de uso y propiedades favor de leer en el siguiente link oficial: https://josprox.com/politicas debido a la creación de este código, el cuál es independiente de la materia, creado con la tecnología de Facitio FX con la licencia de 2015 - 2021, para más información de licencia visite: https://github.com/josprox

     Por la presente se otorga con cargo, a cualquier persona que obtenga una copia de este software y los archivos de documentación asociados (el "Software"), para operar con el Software con restricciones, incluidos, entre otros, los derechos de uso, copia, modificación, fusión , publicar, distribuir, sublicenciar y / o vender copias del Software, y permitir que las personas a las que se les proporcione el Software lo hagan, sujeto a las siguientes condiciones:

    El aviso de copyright anterior y este aviso de permiso se incluirán en todas las copias o partes sustanciales del Software.

    EL SOFTWARE SE PROPORCIONA "TAL CUAL", SIN GARANTÍA DE NINGÚN TIPO, EXPRESA O IMPLÍCITA, INCLUYENDO, PERO NO LIMITADO A, LAS GARANTÍAS DE COMERCIABILIDAD, APTITUD PARA UN PROPÓSITO PARTICULAR Y NO INFRACCIÓN. EN NINGÚN CASO LOS AUTORES O TITULARES DE LOS DERECHOS DE AUTOR SERÁN RESPONSABLES DE CUALQUIER RECLAMO, DAÑOS U OTRA RESPONSABILIDAD, YA SEA EN UNA ACCIÓN DE CONTRATO, AGRAVIO O DE OTRO MODO, QUE SURJA DE, FUERA DE O EN RELACIÓN CON EL SOFTWARE O EL USO U OTRAS NEGOCIACIONES EN EL SOFTWARE. 
 -->

<?php 

include "ps-conexion/conexion.php";
session_start();
if (isset($_SESSION['id_usuario'])) {
    header("Location: admin");
}
//Registrar info de usuario
if (isset($_POST["registrar"])) {
    $usuario = mysqli_real_escape_string($conexion,$_POST['user']);
	$password = mysqli_real_escape_string($conexion,$_POST['pass']);
	$password_encriptada = sha1($password);
	$correo = mysqli_real_escape_string($conexion,$_POST['correo']);
	$num_control = mysqli_real_escape_string($conexion,$_POST['num_ctr']);
	$nombre = mysqli_real_escape_string($conexion,$_POST['nombre']);
	$sqluser = "SELECT id FROM usuarios 
	WHERE num_control = '$num_control'";
	$resultadouser = $conexion->query($sqluser);
	$filas = $resultadouser -> num_rows;
	if ($filas > 0) {
		echo "<script>
			alert('El usuario ya existe');
			window.location= './';
		</script>";
	}else{
		//Insertar info
		$sqlusuario = "INSERT INTO usuarios (usuario, password, correo, img, num_control, nombre) 
		VALUES ('$usuario', '$password_encriptada', '$correo','main.webp', '$num_control', '$nombre')";
		$resultadousuario = $conexion->query($sqlusuario);
		if ($resultadousuario > 0) {
			echo "<script>
			alert('Registro exitoso, favor de informar a la escuela');
			window.location= './';
		</script>";
		}else{
			echo "<script>
			alert('Error al registrarse');
			window.location= './';
		</script>";
		}
	}
}

?>

<!DOCTYPE html>
<html lang="es-MX">
<head>
	<title>Registrate | Cestis</title>
	<link rel="stylesheet" type="text/css" href="ps-contenido/css/logins.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<?php include "ps-includes/metas.php"; ?>
</head>
<body>
	<img class="wave" src="ps-contenido/img/wave.png">
	<div class="container">
		<div class="img">
			<img src="ps-contenido/img/bg.svg">
		</div>
		<div class="login-content">
			<form action="<?php $_SERVER["PHP_SELF"]; ?>" method="POST">
				<h2 class="title">Registrate</h2>
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>Nombre</h5>
           		   		<input type="text" class="input" name="nombre" required>
           		   </div>
           		</div>
                <div class="input-div one">
           		   <div class="i">
					  <i class="far fa-envelope"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>Correo</h5>
           		   		<input type="email" class="input" name="correo" required>
           		   </div>
           		</div>
                <div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>Usuario</h5>
           		   		<input type="text" class="input" name="user" required>
           		   </div>
           		</div>
                <div class="input-div one">
           		   <div class="i">
					  <i class="fas fa-sort-numeric-up-alt"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>Número de control</h5>
           		   		<input type="text" class="input" name="num_ctr" required>
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
            	<a href="./">Ya estás registrado? Inicia sesión</a>
            	<input name="registrar" type="submit" class="btn" value="registrarse">
            </form>
        </div>
    </div>
    <script type="text/javascript" src="ps-contenido/js/logins.js"></script>
</body>
</html>
