<!-- 
    Código basado en JOSPROX MX | JOSPROX Internacional, con la unión de Facilito FX, Paoo CSS, Zara CSS y código de proyecto libre basado en JS.

    para más información de uso y propiedades favor de leer en el siguiente link oficial: https://josprox.com/politicas debido a la creación de este código, el cuál es independiente de la materia, creado con la tecnología de Facitio FX con la licencia de 2015 - 2022, para más información de licencia visite: https://github.com/josprox

     Por la presente se otorga con cargo, a cualquier persona que obtenga una copia de este software y los archivos de documentación asociados (el "Software"), para operar con el Software con restricciones, incluidos, entre otros, los derechos de uso, copia, modificación, fusión , publicar, distribuir, sublicenciar y / o vender copias del Software, y permitir que las personas a las que se les proporcione el Software lo hagan, sujeto a las siguientes condiciones:

    El aviso de copyright anterior y este aviso de permiso se incluirán en todas las copias o partes sustanciales del Software.

    EL SOFTWARE SE PROPORCIONA "TAL CUAL", SIN GARANTÍA DE NINGÚN TIPO, EXPRESA O IMPLÍCITA, INCLUYENDO, PERO NO LIMITADO A, LAS GARANTÍAS DE COMERCIABILIDAD, APTITUD PARA UN PROPÓSITO PARTICULAR Y NO INFRACCIÓN. EN NINGÚN CASO LOS AUTORES O TITULARES DE LOS DERECHOS DE AUTOR SERÁN RESPONSABLES DE CUALQUIER RECLAMO, DAÑOS U OTRA RESPONSABILIDAD, YA SEA EN UNA ACCIÓN DE CONTRATO, AGRAVIO O DE OTRO MODO, QUE SURJA DE, FUERA DE O EN RELACIÓN CON EL SOFTWARE O EL USO U OTRAS NEGOCIACIONES EN EL SOFTWARE. 
 -->
 
<!DOCTYPE html>
<html lang="es-MX"> 
<head>
    <link rel="stylesheet" href="ps-contenido/css/modal.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link rel="stylesheet" href="ps-contenido/css/paps.css" />
    <link rel="stylesheet" href="ps-contenido/css/facilito_fx_ultima_ver/facilito-fx.css">

<?php 

include "ps-conexion/conexion.php";

session_start();
if (!isset($_SESSION['id_usuario'])) {
    header("Location: ./");
}
$iduser = $_SESSION['id_usuario'];

$sql = "SELECT usuarios.nombre, usuarios.img, usuarios.num_control, gradgrup.grado,gradgrup.grupo, especialidades.especialidad, turnos.turno FROM usuarios
INNER JOIN arg_alumno ON usuarios.id = arg_alumno.id_alm INNER JOIN gradgrup
ON arg_alumno.id_gg = gradgrup.id INNER JOIN especialidades
ON especialidades.id = arg_alumno.id_esp INNER JOIN turnos
ON arg_alumno.id_turn = turnos.id WHERE usuarios.id = '$iduser'";

$resultado = $conexion->query($sql);
$row = $resultado->fetch_assoc();

$datauser = "SELECT * FROM arg_alumno WHERE arg_alumno.id_alm = '$iduser'";
$restdatauser = $conexion->query($datauser);
$restfull = $restdatauser->fetch_assoc();

$tugradgrup = $restfull['id_gg'];
$tuespecialidad = $restfull['id_esp'];
$tuturno = $restfull['id_turn'];


if (!$_GET) {
    header('location:more?pagina=1');
  }

?>
    
    <title>Cetis CWP | Publicaciones</title>

    <?php
    include "ps-includes/metas.php";
    include "ps-conexion/pdo/config.php";

    //llamar a todos los articulos
    $sql = 'SELECT maestros.nombre, maestros.img, publicaciones.titulo, publicaciones.vista FROM maestros INNER JOIN arg_public ON maestros.id = arg_public.id_mst INNER JOIN publicaciones ON arg_public.id_pbc = publicaciones.id WHERE arg_public.id_gradgrup = '.$tugradgrup.' && arg_public.id_esp = '.$tuespecialidad.' && arg_public.id_turno = '.$tuturno.' ORDER BY publicaciones.id DESC';
    $sentencia = $pdo->prepare($sql);
    $sentencia->execute();

    $resultado = $sentencia->fetchAll();

    //var_dump($resultado);

    $articulo_x_pagina = 4;
    $total_articulos = $sentencia->rowCount();
    $paginas = $total_articulos / 4;
    //echo $paginas;
    $paginas = ceil($paginas);

    if ($_GET['pagina'] > $paginas || $_GET['pagina'] <= 0) {
      header('location:more?pagina=1');
  }    

    ?>

</head>
<body>

    <?php

    $iniciar = ($_GET['pagina'] - 1) * $articulo_x_pagina;
    //echo $iniciar;

    $sql_articulos = 'SELECT maestros.nombre, maestros.img, publicaciones.titulo, publicaciones.vista FROM maestros INNER JOIN arg_public ON maestros.id = arg_public.id_mst INNER JOIN publicaciones ON arg_public.id_pbc = publicaciones.id WHERE arg_public.id_gradgrup = '.$tugradgrup.' && arg_public.id_esp = '.$tuespecialidad.' && arg_public.id_turno = '.$tuturno.' ORDER BY publicaciones.id DESC LIMIT :niniciar,:narticulos';
    $sentencia_articulos = $pdo->prepare($sql_articulos);
    $sentencia_articulos->bindParam(':niniciar', $iniciar, PDO::PARAM_INT);
    $sentencia_articulos->bindParam(':narticulos', $articulo_x_pagina, PDO::PARAM_INT);
    $sentencia_articulos->execute();

    $resultado_articulos = $sentencia_articulos->fetchAll();
    ?>

<?php include "ps-includes/nav.php"; ?>

    <div class="contenedor">

        <div class="grid-cuerpo">
        
            <section class="contenido">

            <h1 class="titulos">Publicaciones</h1>
                
            <?php foreach ($resultado_articulos as $registro): ?>

              <div class="trj-medios1">
    <?php if ($registro['img'] != "") {
        echo "<div class='trj-img'>";
        echo "<a  href='post?titulo=" . $registro['titulo'] . "'>" . "<img alt='' src='ps-contenido/img/maestros/" . $registro['img'] . "' ></a>";
        echo "</div>";
    } ?>
    <div class="trj-txt">
        <?php echo "<a  href='post?titulo=" . $registro['titulo'] . "'><h1>" . $registro["titulo"] . "</h1></a>"; 
        echo "<p>" . $registro["vista"] . "</p>"; 
        echo "<a href='post?titulo=" . $registro['titulo'] . "' ><i class='fas fa-info-circle'></i> Leer más...</a>";
        ?>
      </div>
  </div>

<?php endforeach; ?>

<center>
<div aria-label="Page navigation example">
  <ul class="pagination">
    <li class="page-item
    <?php echo $_GET["pagina"] <= 1 ? 'disabled' : ''; ?>
    "
    >
      <a class="page-link" href="more?pagina=<?php echo $_GET["pagina"] - 1; ?>">
      <i class="fas fa-angle-left"></i>
      </a>
    </li>

    <?php for ($i = 0; $i < $paginas; $i++): ?>

    <li class="page-item <?php echo $_GET['pagina'] == $i + 1 ? 'active' : ''; ?>">
      <a class="page-link" href="more?pagina=<?php echo $i + 1; ?>">
      <?php echo $i + 1; ?>
    </a></li>
    <?php endfor; ?>

    <li class="page-item
    <?php echo $_GET["pagina"] >= $paginas ? 'disabled' : ''; ?>
    ">
      <a class="page-link" href="more?pagina=<?php echo $_GET["pagina"] + 1; ?>">
      <i class="fas fa-angle-right"></i>
    </a>
  </li>
  </ul>
</div>
</center>

            
            
            </section>

            <aside class="relacion">
            <h1 class="titulos">Noticia nuevas</h1>
                <?php 
                 $miconsulta = "SELECT maestros.nombre, maestros.img, publicaciones.titulo, publicaciones.vista FROM maestros INNER JOIN arg_public ON maestros.id = arg_public.id_mst INNER JOIN publicaciones ON arg_public.id_pbc = publicaciones.id WHERE arg_public.id_gradgrup = ".$tugradgrup." && arg_public.id_esp = ".$tuespecialidad." && arg_public.id_turno = ".$tuturno." ORDER BY publicaciones.id DESC LIMIT 4;";

                 if($resultado=mysqli_query($conexion,$miconsulta)){
                     while($registro = mysqli_fetch_array($resultado)){
                 
                         echo '
                         <div class="trj-medios">
                         ';
                 
                         if($registro['img']!=""){
                             echo "<div class='trj-img'>";
                         echo "<a  href='post?titulo=" . $registro['titulo'] . "'>" . "<img alt=".$registro['titulo']." src='ps-contenido/img/maestros/" . $registro['img'] . "' ></a>";
                         echo "</div>";
                         }
                         echo '<div class="trj-txt">';//NO TOCAR
                         echo "<a  href='post?titulo=" . $registro['titulo'] . "' ><h1>" . $registro["titulo"] . "</h1></a>";
                         echo "<p>" . $registro["vista"] . "</p><br>";
                         echo "<a href='post?titulo=" . $registro['titulo'] . "' ><i class='fas fa-info-circle'></i> Leer más...</a>";
                         echo '</div>';
                 
                       echo "</div>";
                     }
                 }
                 
                 ?>
            </aside>
        
        </div>
    </div>
</body>
</html>