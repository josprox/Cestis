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

?>
<!DOCTYPE html>
<html lang="es-MX">
    <head>
    <?php include "ps-includes/metas.php"; include "ps-plugins/adsense/ads.php"; ?>
        <title>Cetis CWP | Publicaciones</title>
        <link rel="stylesheet" href="ps-contenido/css/paps.css" />
        <link rel="stylesheet" href="ps-contenido/css/modal.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    </head>
    <body>
        
        <?php include "ps-includes/nav.php"; ?>

        <div class="contenedor">

            <div class="grid-cont">
                <section class="gd-sec" id="contenido_post">

                
                <?php

                $id =$_GET["titulo"];

                $miconsulta = "SELECT maestros.nombre, maestros.img, publicaciones.titulo, publicaciones.descripcion FROM maestros
                INNER JOIN arg_public ON maestros.id = arg_public.id_mst INNER JOIN publicaciones
                ON arg_public.id_pbc = publicaciones.id WHERE titulo='$id' ";

                if($resultado=mysqli_query($conexion,$miconsulta)){
                    while($registro = mysqli_fetch_array($resultado)){

                        echo "<h1 class= 'titulos'>" . $registro["titulo"] . "</h1>";

                        echo '<img class="img-public" src="ps-contenido/img/maestros/' . $registro['img'] . '" alt="">';

                        echo'<div class="contenido_post">'. $registro["descripcion"] . '</div>';

                    }
                }

                ?>

                </section>

                <aside class="gd-asd">

                    <h2>Noticias de tus maestros</h2>

                    <?php
                    $miconsulta1 = "SELECT maestros.nombre, maestros.img, publicaciones.titulo, publicaciones.vista FROM maestros INNER JOIN arg_public ON maestros.id = arg_public.id_mst INNER JOIN publicaciones ON arg_public.id_pbc = publicaciones.id WHERE arg_public.id_gradgrup = ".$tugradgrup." && arg_public.id_esp = ".$tuespecialidad." && arg_public.id_turno = ".$tuturno." ORDER BY publicaciones.id DESC LIMIT 4;";

                    if ($resultado = mysqli_query($conexion, $miconsulta1)) {
                        while ($registro = mysqli_fetch_array($resultado)) {
                            echo '
                                        <div class="tarjeta">
                                        ';

                            if ($registro['img'] != "") {
                                echo '<div class="trj-img">';
                                echo '<img src="ps-contenido/img/maestros/' . $registro['img'] . '" alt="">';
                                echo '</div>';
                            }

                            echo '
                                        <div class="trj-txt">
                                        <h1>' .
                                $registro['titulo'] .
                                '</h1>
                                        <p>' .
                                $registro['vista'] .
                                '</p>
                                        <div class="btn-info">
                                            <a href="post?titulo='.$registro['titulo'].'"><i class="fas fa-info"></i> Leer más </a>
                                        </div>
                                        ';

                            echo "</div></div>";
                        }
                    }
                    ?>

                    <a href="more">
                        <div class="mas">
                            <p>Ver más</p>
                        </div>
                    </a>
                </aside>
            </div>
        </div>

        <script src="ps-contenido/js/modal.js"></script>

        <script src="ps-contenido/js/slider.js"></script>
	<script src="./service.js"></script>

    </body>
</html>
<?php mysqli_close($conexion); ?>