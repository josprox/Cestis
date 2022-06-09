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

$sql = "SELECT usuarios.img FROM usuarios
INNER JOIN arg_alumno ON usuarios.id = arg_alumno.id_alm INNER JOIN gradgrup
ON arg_alumno.id_gg = gradgrup.id INNER JOIN especialidades
ON especialidades.id = arg_alumno.id_esp INNER JOIN turnos
ON arg_alumno.id_turn = turnos.id WHERE usuarios.id = '$iduser'";

$resultado = $conexion->query($sql);
$row = $resultado->fetch_assoc();

?>
<!DOCTYPE html>
<html lang="es-MX">
<head>
    <?php include "ps-includes/metas.php"; ?>
    <title>Cetis CWP | Busqueda</title>
    <link rel="stylesheet" href="./ps-contenido/scss/search.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <script src="https://kit.fontawesome.com/4a5e39d1d1.js" crossorigin="anonymous"></script>
</head>
<body>

    <div class="search">
        <img src="./ps-contenido/app img/cover.png" alt="">
        <form class="formulario" action="./resultados" method="get">
            <p>Versión 6.4 actualizado el día: 03/06/22</p>
            <label for="">¿Qué deseas buscar?</label>
            <input type="text" name="busqueda" id="busqueda" type="search" placeholder="Buscar...">
        </form>
    </div>

    <div class="content_cards contenedor" id="datos">
        <p>Si ves este mensaje, está fallando tú conexión, favor de intentarlo más tarde.</p>
    </div>
    
    <nav class="content_end">
        <ul class="barra_grid">
            <div class="barra">
                <a href="./panel"><li><i class="fa-solid fa-house"></i></li></a>
                <a href="./more"><li><i class="fa-solid fa-signs-post"></i></li></a>
                <a href="./search" class="active"><li><i class="fa-solid fa-magnifying-glass"></i></li></a>

            </div>
            <div class="barra">

                <a href="./perfil"><li><img src="ps-contenido/img/alumnos/<?php echo $row['img'];?>" alt="" /></li></a>
                <a href="./social/"><li><i class="fa-solid fa-users"></i></li></a>
                <a href="./ps-conexion/salir"><li><i class="fa-solid fa-arrow-right-from-bracket"></i></li></a>
            </div>
        </ul>
    </nav>

    <footer class="footer_bsq">
        <div class="contenedor">

            <div class="cajas">
                <div class="logo">
                    <img src="./ps-contenido/app img/cover.png" alt="">
                </div>
                <div class="datos">
                    <h1>Cetis CWP</h1>
                    <p>La mejor solución a tus problemas, un sistema de control único.</p>
                </div>
            </div>

            <div class="cajas">
                <h2>Pagínas dentro del sistema</h2>
                <ul>
                    <a href="./panel">
                        <li><i class="fa-solid fa-house"></i> Inicio</li>
                    </a>
                    <a href="./perfil">
                        <li><i class="fa-solid fa-people-group"></i> Perfil</li>
                    </a>
                    <a href="./more">
                        <li><i class="fa-solid fa-signs-post"></i> Publicaciones recientes</li>
                    </a>
                    <a href="./search">
                        <li><i class="fa-solid fa-magnifying-glass"></i> Buscador</li>
                    </a>
                </ul>
            </div>

        </div>
    </footer>
    
    <div class="copyright">
        <hr>
        <p>Todos los derechos reservados JOSPROX MX | Internacional</p>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
      <script src="./ps-contenido/js/jquery-3.6.0.min.js"></script>
      <script src="./ps-contenido/js/search.js"></script>
</body>
</html>