<!-- 
    Código basado en JOSPROX MX | JOSPROX Internacional, con la unión de Facilito FX, Paoo CSS, Zara CSS y código de proyecto libre basado en JS.

    para más información de uso y propiedades favor de leer en el siguiente link oficial: https://josprox.com/politicas debido a la creación de este código, el cuál es independiente de la materia, creado con la tecnología de Facitio FX con la licencia de 2015 - 2022, para más información de licencia visite: https://github.com/josprox

     Por la presente se otorga con cargo, a cualquier persona que obtenga una copia de este software y los archivos de documentación asociados (el "Software"), para operar con el Software con restricciones, incluidos, entre otros, los derechos de uso, copia, modificación, fusión , publicar, distribuir, sublicenciar y / o vender copias del Software, y permitir que las personas a las que se les proporcione el Software lo hagan, sujeto a las siguientes condiciones:

    El aviso de copyright anterior y este aviso de permiso se incluirán en todas las copias o partes sustanciales del Software.

    EL SOFTWARE SE PROPORCIONA "TAL CUAL", SIN GARANTÍA DE NINGÚN TIPO, EXPRESA O IMPLÍCITA, INCLUYENDO, PERO NO LIMITADO A, LAS GARANTÍAS DE COMERCIABILIDAD, APTITUD PARA UN PROPÓSITO PARTICULAR Y NO INFRACCIÓN. EN NINGÚN CASO LOS AUTORES O TITULARES DE LOS DERECHOS DE AUTOR SERÁN RESPONSABLES DE CUALQUIER RECLAMO, DAÑOS U OTRA RESPONSABILIDAD, YA SEA EN UNA ACCIÓN DE CONTRATO, AGRAVIO O DE OTRO MODO, QUE SURJA DE, FUERA DE O EN RELACIÓN CON EL SOFTWARE O EL USO U OTRAS NEGOCIACIONES EN EL SOFTWARE. 
 -->

 <?php 

include "./../ps-conexion/conexion.php";

/* establecer el limitador de caché a 'private' */

session_cache_limiter('private');
$cache_limiter = session_cache_limiter();

/* establecer la caducidad de la caché a 3 meses */
session_cache_expire(131490);
$cache_expire = session_cache_expire();


/* iniciar la sesión */

session_start();

echo "<script>console.log('El limitador de caché ahora está establecido a: ".$cache_limiter."');</script>";
echo "<script>console.log('Las páginas de sesión examinadas caducan después de ".$cache_expire." minutos.');</script>";

if (isset($_SESSION['id_usuario'])) {
    header("Location: ./datos/");
}
//Login
//if (!empty($_POST)) {
if (isset($_POST["ingresar"])) {
    $usuario = mysqli_real_escape_string($conexion, $_POST['user']);
    $password = mysqli_real_escape_string($conexion, $_POST['pass']);
    $sql = "SELECT id, password FROM usuarios WHERE usuario = '$usuario'";
    $resultado = $conexion->query($sql);
    $rows = $resultado->num_rows;
    if ($rows > 0) {
        $row = $resultado->fetch_assoc();
		    $password_encriptada = $row['password'];

        if(password_verify($password,$password_encriptada) == TRUE){
          $_SESSION['id_usuario'] = $row['id'];
          header("Location: ./datos/");
        }else{
          echo "<script>
          alert('Contraseña incorrecta, vuélvelo a intentar o cambia la contraseña. Error CCWP-232_allinone');
          window.location= './allinone';
          </script>";
        }
    } else {
        echo "<script>
          alert('Ninguno de los dos datos existen. Error CCWP-220_allinone');
          window.location= './allinone';
        </script>";
    }
}

//Registrar info de usuario
if (isset($_POST["registrar"])) {
  $usuario = mysqli_real_escape_string($conexion,$_POST['user']);
$password = mysqli_real_escape_string($conexion,$_POST['pass']);
$password_encriptada = password_hash($password,PASSWORD_BCRYPT,["cost"=>10]);
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
      alert('El número de control ya fué registrado con otro usuario, si crees que es un error, favor de informarlo a servicio escolar. Error CCWP_allinone_303');
      window.location= './';
    </script>";
  }else{
    //Insertar info
    $sqlusuario = "INSERT INTO usuarios (usuario, password, correo, img, num_control, nombre, discapacidad, created_at) 
    VALUES ('$usuario', '$password_encriptada', '$correo','main.webp', '$num_control', '$nombre', '$discapacidad', '$fecha')";
    $resultadousuario = $conexion->query($sqlusuario);
  }
}else{
  echo "<script>
  alert('El número de control es desconocido, favor de intentarlo otra vez, si el problema sigue, favor de informarlo a servicio escolar. Error CCWP_allinone_304');
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
    alert('Registro de grupo ha fallado, ya existe uno asignado al usuario. Error CCWP_allinone_305');
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
    alert('Error al registrarse Error CCWP_allinone_301');
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
  <title>Cetis CWP App</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
  <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900'>
  <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Montserrat:400,700'>
  <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>
  <link rel="stylesheet" href="./style.css">
  <!-- Metas -->
  <link rel="shortcut icon" href="./../ps-contenido/app img/default.png" type="image/x-icon">
  <meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1' >
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="Se bienvenido al panel de Alumnos, generado para que los alumnos puedan convivir con sus maestros de una manera muy segura.">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
  <script src="https://kit.fontawesome.com/4a5e39d1d1.js" crossorigin="anonymous"></script>

  <!-- Barra del navegador -->
  <meta name="theme-color" content="#7deb6c">
  <!-- Optimizado para moviles -->
  <meta name="MobileOptimized" content="width">
  <meta name="HandheldFriendly" content="true">
  <!-- Meta etiquetas par apple -->
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
  <!-- Iconos importantes -->
  <link rel="apple-touch-icon" href="./../ps-contenido/app img/profile.png">
  <link rel="apple-touch-startup-image" href="./../ps-contenido/app img/cover.png">
  <!-- Archivo de manifiesto app -->
  <link rel="manifest" href="./../manifest.json">

  <?php

  header("Content-Type: text/html;charset=utf-8");

  ?>

</head>
<body>

<!-- partial:index.partial.html -->
<div class="container">
  <div class="info">
    <h1>Cetis CWP</h1><span>Creado con <i class="fa fa-heart"></i> por <a href="http://josprox.com">JOSPROX MX | internacional</a></span>
  </div>
</div>
<div class="form">
  <div class="thumbnail"><img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/169963/hat.svg"/></div>
  <form class="register-form" action="<?php $_SERVER["PHP_SELF"]; ?>" method="POST">
    <label for="nombre">¿Cuál es tú nombre?</label>
    <input type="text" name="nombre" id="nombre" placeholder="Nombre" required>

    <label for="correo">¿Cuál es tú correo de confianza?</label>
    <input type="email" name="correo" id="correo" placeholder="Correo electrónico" required>
    <label for="num_ctr">¿Cuál es tú número de control?*</label>
    <input type="text" name="num_ctr" id="num_ctr" placeholder="Número de control" required>
    <label for="num_ctr">¿Tienes alguna discapacidad?*</label>
    <input type="text" name="disc" id="disc" placeholder="discapacidad" required>

    <select name="genero" class="form-wrapper" aria-label="Default select example" required>
      <option selected>¿Cuál es tú Género?</option>
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

    <label for="nombre">Usuario</label>
    <input type="text" name="user" id="user" placeholder="Nombre" required>
    <label for="nombre">Contraseña</label>
    <input type="password" name="pass" id="pass" placeholder="Contraseña" required>

    <button name="registrar" type="submit">crear</button>
    <p class="message" >¿Ya estás registrado? <a>Iniciar sesión</a></p>
  </form>

  <form class="login-form" action="<?php $_SERVER["PHP_SELF"]; ?>" method="POST">
    <input name="user" type="text" placeholder="usuario"/>
    <input name="pass" type="password" placeholder="Contraseña"/>
    <button name="ingresar" type="submit">Iniciar sesión</button>
    <p class="message">¿No estás registrado? <a>Crear una cuenta</a></p>
  </form>

</div>
<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  <script  src="./script.js"></script>

</body>
</html>
<?php mysqli_close($conexion); ?>