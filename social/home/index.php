<!-- 
    Código basado en JOSPROX MX | JOSPROX Internacional, con la unión de Facilito FX, Paoo CSS, Zara CSS y código de proyecto libre basado en JS.

    para más información de uso y propiedades favor de leer en el siguiente link oficial: https://josprox.com/politicas debido a la creación de este código, el cuál es independiente de la materia, creado con la tecnología de Facitio FX con la licencia de 2015 - 2022, para más información de licencia visite: https://github.com/josprox

     Por la presente se otorga con cargo, a cualquier persona que obtenga una copia de este software y los archivos de documentación asociados (el "Software"), para operar con el Software con restricciones, incluidos, entre otros, los derechos de uso, copia, modificación, fusión , publicar, distribuir, sublicenciar y / o vender copias del Software, y permitir que las personas a las que se les proporcione el Software lo hagan, sujeto a las siguientes condiciones:

    El aviso de copyright anterior y este aviso de permiso se incluirán en todas las copias o partes sustanciales del Software.

    EL SOFTWARE SE PROPORCIONA "TAL CUAL", SIN GARANTÍA DE NINGÚN TIPO, EXPRESA O IMPLÍCITA, INCLUYENDO, PERO NO LIMITADO A, LAS GARANTÍAS DE COMERCIABILIDAD, APTITUD PARA UN PROPÓSITO PARTICULAR Y NO INFRACCIÓN. EN NINGÚN CASO LOS AUTORES O TITULARES DE LOS DERECHOS DE AUTOR SERÁN RESPONSABLES DE CUALQUIER RECLAMO, DAÑOS U OTRA RESPONSABILIDAD, YA SEA EN UNA ACCIÓN DE CONTRATO, AGRAVIO O DE OTRO MODO, QUE SURJA DE, FUERA DE O EN RELACIÓN CON EL SOFTWARE O EL USO U OTRAS NEGOCIACIONES EN EL SOFTWARE. 
 -->

 <?php
 
 include "../../ps-conexion/conexion.php";
 session_start();
 if (!isset($_SESSION['id_usuario'])) {
     header("Location: ../");
 }
 $iduser = $_SESSION['id_usuario'];

$sql_bienvenido = "SELECT id FROM social WHERE id_usuario = '$iduser'";
$resultado_bienvenido = $conexion->query($sql_bienvenido);
$filas = $resultado_bienvenido -> num_rows;

if ($filas < 1) {
    header("Location: ./bienvenido");
}

$amix = "SELECT usuarios.usuario, usuarios.nombre, usuarios.img, usuarios.correo, social.info_datos FROM usuarios INNER JOIN social ON usuarios.id = social.id_usuario ORDER BY RAND() LIMIT 1;";

$amix_rest = $conexion->query($amix);
$lectura = $amix_rest->fetch_assoc();

$sql_datos = "SELECT usuarios.usuario, usuarios.nombre, usuarios.img, usuarios.correo, social.info_datos FROM usuarios INNER JOIN social ON usuarios.id = social.id_usuario WHERE usuarios.id = $iduser;";

$datos_rest = $conexion->query($sql_datos);
$post_lect = $datos_rest->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="es-MX">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cristal | Inicio</title>
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="scss/cristal.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="../images/logo.png"/>
</head>
<body>
    <?php include "includes/navbar.php" ?>

    <div class="contenedor">
        <h1 class="titulos">Cristal social</h1>

        <div class="grid_1_2">

            <div class="grid_1">
                <p>Usuario:</p>
                <p><?php echo $lectura['usuario']; ?></p>
            </div>

            <div class="grid_2">
                <p>Nombre:</p>
                <p><?php echo $lectura['nombre']; ?></p>
            </div>

        </div>

        <div class="content_img_perfil">
            <img src="../../ps-contenido/img/alumnos/<?php echo $lectura['img'];?>" alt="">
        </div>

        <div class="caja_info">
            <p>Acerca de:</p>
            <?php echo $lectura['info_datos']; ?>
        </div>

        <center>
        <div class="centrar_flex">

            <div class="grid_1_2_reverso">

                <div class="grid_2">
                    <form action="./smtp/correo.php" method="POST">
                        <input type="hidden" name="micorreo" value="<?php echo $post_lect['correo']; ?>">
                        <input type="hidden" name="miusuario" value="<?php echo $post_lect['usuario']; ?>">
                        <input type="hidden" name="minombre" value="<?php echo $post_lect['nombre']; ?>">
                        <input type="hidden" name="miimg" value="<?php echo $post_lect['img'];?>">
                        <input type="hidden" name="miinfo" value="<?php echo $post_lect['info_datos']; ?>">
                        <input type="hidden" name="correo" value="<?php echo $lectura['correo']; ?>">
                        <input type="submit" value="Agregar" class="agregar">
                    </form>
                </div>
    
                <div class="grid_1">
                    <a href="" class="skip">Skip</a>
                </div>

            </div>

        </div>
        </center>

    </div>

</body>
</html>