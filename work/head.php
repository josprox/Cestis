<?php

include "../ps-conexion/conexion.php";

session_start();
if (!isset($_SESSION['id_maestro'])) {
	header("Location: ../maestros");
}
$iduser = $_SESSION['id_maestro'];

$sql = "SELECT maestros.nombre, maestros.usuario, maestros.img, maestros.discapacidad, maestros.correo, sexo.sexo FROM maestros INNER JOIN arg_maestro ON maestros.id = arg_maestro.id_mst INNER JOIN sexo ON sexo.id = arg_maestro.id_sexo WHERE maestros.id = '$iduser'";

$resultado = $conexion->query($sql);
$row = $resultado->fetch_assoc();
$row1 = $resultado->fetch_assoc();

if (isset($_POST["btn_enviar"])) {

  $imagen = $_FILES['imagen']['name'];

  if($_FILES['imagen']['error']){

      switch($_FILES['imagen']['error']){
          case 1: // Error exceso de tamaño de archivo php.ini
              echo"Tamaño del Archivo excede lo permitido por el server";
          break;

          case 2: //Excede la directiva MAX_FILE
              echo "EL TAMAÑO DEL ARCHIVO EXCEDE";
          break;
          case 3: //El fichero fue solo parcialmente subido
              echo "Corrupción de archivo";
          break;
          case 4: //No se subio el fichero
              echo "No se envió archivo de imagen";
          break;
      }

  }else{
      echo "<script>
    alert('Entrada correcta');
    window.location= './';
  </script>";
      if ((isset($_FILES['imagen']['name'])&&($_FILES['imagen']['error']==UPLOAD_ERR_OK))){

          $destino_de_ruta ="../ps-contenido/img/maestros/";

          move_uploaded_file($_FILES['imagen']['tmp_name'],$destino_de_ruta . $_FILES['imagen']['name']);

          echo "<script>
    alert('El archivo " . $_FILES['imagen']['name'] . " se ha copiado en el directorio de imagenes');
    window.location= './';
  </script>";
      }else{
          echo "El archivo no se ha podido copiar a imagenes";
      }
  }


  $myconsulta ="UPDATE maestros SET img = '$imagen' WHERE maestros.id = '$iduser'";

  $resultado = mysqli_query($conexion, $myconsulta);

  /* Cerramos conexion */

  /*mysqli_close($conexion);*/

  echo "<script>
    alert('La imagen fue actualizada correctamente');
    window.location= './';
  </script>";
}

if (isset($_POST["publicar"])) {
  $titulo = mysqli_real_escape_string($conexion,$_POST['titulo']);
$content = mysqli_real_escape_string($conexion,$_POST['contenido']);

$vista = mysqli_real_escape_string($conexion,$_POST['vista']);

$gradgrup = mysqli_real_escape_string($conexion,$_POST['gradgrup']);

$esp = mysqli_real_escape_string($conexion,$_POST['esp']);

$turn = mysqli_real_escape_string($conexion,$_POST['turn']);

$publicaciones = "INSERT INTO publicaciones (iduser, titulo, vista, descripcion) VALUES ('$iduser', '$titulo', '$vista','$content')";
$resultadousuario = $conexion->query($publicaciones);

  $sqldat = "SELECT id FROM publicaciones WHERE iduser = '$iduser' order by id desc";
  $resultadodat = $conexion->query($sqldat);

  $filas2 = $resultadodat -> fetch_array();

    $id = $filas2[0];

  //Insertar info
  $sqlusuario1 = "INSERT INTO arg_public (id_mst, id_pbc, id_gradgrup, id_esp, id_turno) 
    VALUES ('$iduser', '$id', '$gradgrup', '$esp','$turn')";
    $resultadousuario1 = $conexion->query($sqlusuario1);

		if ($resultadousuario1 > 0) {
			echo "<script>
			alert('Publicación exitosa');
			window.location= './';
		</script>";
		}else{
			echo "<script>
			alert('Error al publicar');
			window.location= './';
		</script>";
		}

}

if (isset($_POST['registrar'])){
  $gradgrup = mysqli_real_escape_string($conexion,$_POST['gradgrup']);
  $gradgrup1 = (int)$gradgrup;
  $esp = mysqli_real_escape_string($conexion,$_POST['esp']);
  $esp1 = (int)$esp;
  $turno = mysqli_real_escape_string($conexion,$_POST['turno']);
  $turno1 = (int)$turno;
  if (isset($_POST['confirmar']) && $_POST['confirmar'] == '1' ) {
    //Insertar info
    $sqlusuario2 = "INSERT INTO arg_maestro (id_gg, id_esp, id_mst, id_turno) 
    VALUES ('$gradgrup1', '$esp1', '$iduser','$turno1')";
    $resultadousuario1 = $conexion->query($sqlusuario2);
    if ($resultadousuario1 > 0) {
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
  } else{
    echo "<script>
      alert('Favor de confirmar que está seguro del registro.');
      window.location= './';
    </script>";
  }
}

?>
<!--
=========================================================
* Material Dashboard 2 - v3.0.0
=========================================================

* Product Page: https://www.creative-tim.com/product/material-dashboard
* Copyright 2021 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="es-MX">

<head>
  <?php include "../ps-plugins/adsense/ads.php"; ?>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="./assets/img/favicon.png">
  <title>
    Escritorio
  </title>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Nucleo Icons -->
  <link href="./assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="./assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link id="pagestyle" href="./assets/css/material-dashboard.css?v=3.0.0" rel="stylesheet" />
  <style>
    input#btn_enviar {
    padding: 15px;
    background-color: #60cf4e;
    color: #fff;
    border: 0;
    font-size: 1em;
    border-radius: 12px;
    cursor: pointer;
}
input#imagen {
    position: absolute;
    top: 0px;
    left: 0px;
    right: 0px;
    bottom: 0px;
    width: 100%;
    height: 100%;
    opacity: 0;
}

div#div_file {
    position: relative;
    margin: 12px auto;
    padding: 0 0;
    width: 150px;
    height: auto;
    color: #fff;
    text-align: center;
    background-color: rgba(0, 0, 0, 0.5);
    border-radius: 12px;
    cursor: pointer;
}
  </style>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="./textarea/site.css">
  <link rel="stylesheet" href="./textarea/richtext.min.css">
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script type="text/javascript" src="./textarea/jquery.richtext.js"></script>
</head>

<body class="g-sidenav-show  bg-gray-200">
  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/material-dashboard/pages/dashboard " target="_blank">
        <span class="ms-1 font-weight-bold text-white">Bienvenido(a) <span><?php echo $row['usuario'];?></span></span>
      </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto  max-height-vh-100" id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link text-white active bg-gradient-primary" href="./">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">dashboard</i>
            </div>
            <span class="nav-link-text ms-1">Escritorio</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="notificaciones">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">notifications</i>
            </div>
            <span class="nav-link-text ms-1">Notificaciones</span>
          </a>
        </li>
        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">pestañas disponibles</h6>
        </li>
      </ul>
    </div>
    <div class="sidenav-footer position-absolute w-100 bottom-0 ">
      <div class="mx-3">
        <a class="btn bg-gradient-primary mt-4 w-100" href="salir.php" type="button">Cerrar sesión</a>
      </div>
    </div>
  </aside>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Páginas</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Escritorio</li>
          </ol>
          <h6 class="font-weight-bolder mb-0">Escritorio</h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            <div class="input-group input-group-outline">
              <label class="form-label">Type here...</label>
              <input type="text" class="form-control">
            </div>
          </div>
          <ul class="navbar-nav  justify-content-end">
            <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </a>
            </li>
            <li class="nav-item px-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0">
                <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer"></i>
              </a>
            </li>
            <li class="nav-item dropdown pe-2 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa fa-bell cursor-pointer"></i>
              </a>
              <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">

                <?php
            $miconsulta1 = "SELECT notifications.created_at, notifications.Tipo, classmodels.clase FROM notifications INNER JOIN classmodels ON classmodels.tipo = notifications.tipo ORDER BY notifications.created_at DESC LIMIT 6";

            if ($resultado = mysqli_query($conexion, $miconsulta1)) {
                while ($registro = mysqli_fetch_array($resultado)) {

                  echo '
                  <li class="mb-2">
                  <a href="notificaciones" class="dropdown-item border-radius-md" href="javascript:;">
                    <div class="d-flex py-1">
                      <div class="my-auto">
                        <img src="../ps-contenido/app img/default.png" class="avatar avatar-sm  me-3 ">
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="text-sm font-weight-normal mb-1">
                        '.$registro['Tipo'].'
                        </h6>
                        <p class="text-xs text-secondary mb-0">
                          <i class="fa fa-clock me-1"></i>
                          '.$registro['created_at'].'
                        </p>
                      </div>
                    </div>
                  </a>
                </li>
                  ';
                }
            }
            ?>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->