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
//Registrar info de usuario
if (isset($_POST["registrar"])) {
    $usuario = mysqli_real_escape_string($conexion,$_POST['user']);
	$password = mysqli_real_escape_string($conexion,$_POST['pass']);
	$password_encriptada = sha1($password);
	$correo = mysqli_real_escape_string($conexion,$_POST['correo']);
	$num_control = mysqli_real_escape_string($conexion,$_POST['num_ctr']);
	$discapacidad = mysqli_real_escape_string($conexion,$_POST['disc']);
	$nombre = mysqli_real_escape_string($conexion,$_POST['nombre']);

	$sqluser = "SELECT id FROM usuarios 
	WHERE num_control = '$num_control'";
	$resultadouser = $conexion->query($sqluser);
	$filas = $resultadouser -> num_rows;

  $sqlnc = "SELECT num FROM numcontrols WHERE num = '$num_control'";
  $resultadonc = $conexion->query($sqlnc);
  $control = $resultadonc -> num_rows;

  if ($control > 0){
    if ($filas > 0) {
      echo "<script>
        alert('El número de control ya fué registrado con otro usuario, si crees que es un error, favor de informarlo a servicio escolar. Error CCWP-680_rgtv2');
        window.location= './';
      </script>";
    }else{
      //Insertar info
      $sqlusuario = "INSERT INTO usuarios (usuario, password, correo, img, num_control, nombre, discapacidad) 
      VALUES ('$usuario', '$password_encriptada', '$correo','main.webp', '$num_control', '$nombre', '$discapacidad')";
      $resultadousuario = $conexion->query($sqlusuario);
    }
  }else{
    echo "<script>
    alert('El número de control es desconocido, favor de intentarlo otra vez, si el problema sigue, favor de informarlo a servicio escolar. Error CCWP-681_rgtv2');
    window.location= './';
  </script>";
  }


  $gradgrup = mysqli_real_escape_string($conexion,$_POST['gradgrup']);
  $gradgrup1 = (int)$gradgrup;
  $esp = mysqli_real_escape_string($conexion,$_POST['esp']);
  $esp1 = (int)$esp;
  $turno = mysqli_real_escape_string($conexion,$_POST['turno']);
  $turno1 = (int)$turno;
  $genero = mysqli_real_escape_string($conexion,$_POST['esp']);
  $genero1 = (int)$genero;

  $sqldat = "SELECT id FROM usuarios 
	WHERE usuario = '$usuario'";
  $resultadodat = $conexion->query($sqldat); 

	$filas1 = $resultadodat -> num_rows;

	if ($filas1 > 1) {
		echo "<script>
			alert('Registro de grupo ha fallado, ya existe uno asignado al usuario. Error CCWP-682_rgtv2');
			window.location= './';
		</script>";
  }else{

    $filas2 = $resultadodat -> fetch_array();

    $id = $filas2[0];
    
    
    //Insertar info
    $sqlusuario1 = "INSERT INTO arg_alumno (id_gg, id_esp, id_alm, id_turn, id_sexo) 
    VALUES ('$gradgrup1', '$esp1', '$id','$turno1', '$genero1')";
    $resultadousuario1 = $conexion->query($sqlusuario1);
    if ($resultadousuario1 > 0) {
      echo "<script>
      alert('Registro exitoso, favor de informar a la escuela');
      window.location= './';
    </script>";
    }else{
      echo "<script>
      alert('Error al registrarse. Error CCWP-683_rgtv2');
      window.location= './';
    </script>";
    }
  }
}

?>

<!DOCTYPE html>
<html lang="es-MX" >
<head>
  <meta charset="UTF-8">
  <title>Regístrate | Cetis CWP</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet"><link rel="stylesheet" href="ps-contenido/css/registro.css">
  <?php include "ps-includes/metas.php"; include "ps-plugins/adsense/ads.php"; ?>

</head>
<body>
<div class="container">
    <div class="wrapper">
      <ul class="steps">
        <li class="is-active">Paso 1</li>
        <li>Paso 2</li>
        <li>Paso 3</li>
      </ul>
      <form class="form-wrapper" action="<?php $_SERVER["PHP_SELF"]; ?>" method="POST">
        <div class="section is-active">
          <h3>Bienvenido a Cetis CWP, aquí podrás registrarte de una manera segura.</h3>
          <h3>Escribe los detalles para tu cuenta</h3>
          <label for="nombre">¿Cuál es tú nombre?*</label>
          <input type="text" name="nombre" id="nombre" placeholder="Nombre" required>
          <label for="correo">¿Cuál es tú correo de confianza?*</label>
          <input type="text" name="correo" id="correo" placeholder="Correo electrónico" required>
          <label for="num_ctr">¿Cuál es tú número de control?*</label>
          <input type="text" name="num_ctr" id="num_ctr" placeholder="Número de control" required>
          <label for="num_ctr">¿Tienes alguna discapacidad?*</label>
          <input type="text" name="disc" id="disc" placeholder="discapacidad" required>

          <select name="genero" class="form-wrapper" aria-label="Default select example" required>
            <option selected>¿Cuál es tú orientación sexual?</option>
            <?php
            $sexo = "SELECT * FROM `sexo`";

            if ($resultadosex = mysqli_query($conexion, $sexo)) {
                while ($registro1 = mysqli_fetch_array($resultadosex)) {
                    echo '<option value="' . $registro1['id'] .'">' . $registro1['sexo'] .'</option>
                    ';
                }
            }
            ?>
          </select>

          <div class="button">Siguiente</div>
        </div>

        <div class="section">
          <h3>llegó el momento de asignarte un grupo</h3>
          <select name="gradgrup" class="form-wrapper" aria-label="Default select example" required>
            <option selected>¿Qué grado y grupo eres?*</option>
            <?php
            $eleccion_gg = "SELECT * FROM `gradgrup`";

            if ($restgradgrup = mysqli_query($conexion, $eleccion_gg)) {
                while ($reggradgrup = mysqli_fetch_array($restgradgrup)) {
                    echo '<option value="' . $reggradgrup['id'] .'">' . $reggradgrup['grado'] . ' '. $reggradgrup['grupo'] .'</option>
                    ';
                }
            }
            ?>
          </select>

          <select name="esp" class="form-wrapper" aria-label="Default select example" required>
            <option selected>¿Cuál es tú especialidad?</option>
            <?php
            $especialidades = "SELECT * FROM `especialidades`";

            if ($resultado = mysqli_query($conexion, $especialidades)) {
                while ($registro = mysqli_fetch_array($resultado)) {
                    echo '<option value="' . $registro['id'] .'">' . $registro['especialidad'] .'</option>
                    ';
                }
            }
            ?>
          </select>

          <select name="turno" class="form-wrapper" aria-label="Default select example" required>
            <option selected>¿Cuál es tú turno?</option>
            <?php
            $eleccion_turnos = "SELECT * FROM `turnos`";

            if ($restturnos = mysqli_query($conexion, $eleccion_turnos)) {
                while ($regturnos = mysqli_fetch_array($restturnos)) {
                    echo '<option value="' . $regturnos['id'] .'">' . $regturnos['turno'] . '</option>
                    ';
                }
            }
            ?>
          </select>
          </select>
          <div class="button">Siguiente</div>
        </div>

        <div class="section">
          <h3>Perfecto, llegó el momento de crear tus datos de acceso, NO OLVIDES ningún dato.</h3>
          <label for="nombre">Usuario</label>
          <input type="text" name="user" id="user" placeholder="Nombre" required>
          <label for="nombre">Contraseña</label>
          <input type="password" name="pass" id="pass" placeholder="Contraseña" required>
          <input name="registrar" class="submit button" type="submit" value="Registrarse">
        </div>
      </form>
    </div>
  </div>
<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>
  <script  src="ps-contenido/js/registro.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script>
    swal.fire({
    title: "Advertencia",
    icon: "info",
    text: "Si no llenas el formulario completo, fallará el registro. Si ya te has registrado con anterioridad contacta a servicios escolares para solicitar la eliminación de la cuenta.",
    confirmButtonText: "Entendido!",
    footer: "Creado por JOSPROX",
    timer: 6000,
    timerProgressBar: true,
    allowOutsideClick: false,
    stopKeydownPropagation: true
})
  </script>
	<script src="./service.js"></script>


</body>
</html>
<?php mysqli_close($conexion); ?>