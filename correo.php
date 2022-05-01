<!-- 
    Código basado en JOSPROX MX | JOSPROX Internacional, con la unión de Facilito FX, Paoo CSS, Zara CSS y código de proyecto libre basado en JS.

    para más información de uso y propiedades favor de leer en el siguiente link oficial: https://josprox.com/politicas debido a la creación de este código, el cuál es independiente de la materia, creado con la tecnología de Facitio FX con la licencia de 2015 - 2022, para más información de licencia visite: https://github.com/josprox

     Por la presente se otorga con cargo, a cualquier persona que obtenga una copia de este software y los archivos de documentación asociados (el "Software"), para operar con el Software con restricciones, incluidos, entre otros, los derechos de uso, copia, modificación, fusión , publicar, distribuir, sublicenciar y / o vender copias del Software, y permitir que las personas a las que se les proporcione el Software lo hagan, sujeto a las siguientes condiciones:

    El aviso de copyright anterior y este aviso de permiso se incluirán en todas las copias o partes sustanciales del Software.

    EL SOFTWARE SE PROPORCIONA "TAL CUAL", SIN GARANTÍA DE NINGÚN TIPO, EXPRESA O IMPLÍCITA, INCLUYENDO, PERO NO LIMITADO A, LAS GARANTÍAS DE COMERCIABILIDAD, APTITUD PARA UN PROPÓSITO PARTICULAR Y NO INFRACCIÓN. EN NINGÚN CASO LOS AUTORES O TITULARES DE LOS DERECHOS DE AUTOR SERÁN RESPONSABLES DE CUALQUIER RECLAMO, DAÑOS U OTRA RESPONSABILIDAD, YA SEA EN UNA ACCIÓN DE CONTRATO, AGRAVIO O DE OTRO MODO, QUE SURJA DE, FUERA DE O EN RELACIÓN CON EL SOFTWARE O EL USO U OTRAS NEGOCIACIONES EN EL SOFTWARE. 
 -->

 <?php

include "./ps-conexion/conexion.php";
session_start();
if (isset($_SESSION['id_usuario'])) {
    header("Location: panel");
}

if (isset($_POST['restaurar'])) {
    $usuario = mysqli_real_escape_string($conexion, $_POST['usuario']);
    $numcontrol = mysqli_real_escape_string($conexion, $_POST['numcontrol']);
    $correo = mysqli_real_escape_string($conexion, $_POST['correo']);
    $password = mysqli_real_escape_string($conexion, $_POST['newcontra']);
    $password_encriptada = sha1($password);

    $mast = mysqli_real_escape_string($conexion, $_POST['master']);
    $master = (int)$mast;

    if ($master == 1) {
        $sqlid = "SELECT id FROM maestros WHERE usuario = '$usuario' && correo = '$correo'";
        $rest = $conexion->query($sqlid);
        $rows = $rest->num_rows;
    
        if($rows > 0){
            $row = $rest->fetch_assoc();
            $id = $row['id'];
            $update = "UPDATE maestros SET `password` = '".$password_encriptada."' WHERE id = '$id'";
            $updatefull = $conexion->query($update);
            echo "<script>
                alert('La operación se ha completado correctamente');
                window.location= './';
            </script>";
        } else{
            echo "<script>
                alert('La operación no se ha completado correctamente, código de error CCWP-maestro_update_241');
                window.location= './correo';
            </script>";
        }
    }
    if ($master == 2){

        $sqliduser = "SELECT id FROM usuarios WHERE usuario = '$usuario' && correo = '$correo' && num_control = $numcontrol";
        $restuser = $conexion->query($sqliduser);
        $rowsuser = $restuser->num_rows;
    
        if($rowsuser > 0){
            $row = $restuser->fetch_assoc();
            $idusuario = $row['id'];
            $updateuser = "UPDATE usuarios SET `password` = '".$password_encriptada."' WHERE id = '$idusuario'";
            $updatefull = $conexion->query($updateuser);
            echo "<script>
                alert('La operación se ha completado correctamente');
                window.location= './';
            </script>";
        } else{
            echo "<script>
                alert('La operación no se ha completado correctamente,, código de error CCWP-alumno_update_241');
                window.location= './correo';
            </script>";
        }

    }

}

 ?>

<!DOCTYPE html>
<html lang="es-MX">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Olvidé mi contraseña | Cetis CWP</title>
    <link rel="stylesheet" href="ps-contenido/bootstrap/bootstrap-reboot.min.css">
    <link rel="stylesheet" href="ps-contenido/scss/correos.css">
</head>
<body>

    <div class="foto_portada">
        <img src="https://josprox.ovh/ps-contenido/app%20img/default.png" alt="">
    </div>

    <div class="contenedor">
        <div class="tarjeta">
            <h1>¿Olvidaste tu contraseña?</h1>
            <p>No te preocupes, es común olvidarla, es por eso que te ayudamos a restablecerla de una manera fácil y sencilla.</p>
            <p>A continuación ponga los siguientes datos escrito correctamente, si todo es correcto se cambiará la contraseña con la nueva que vas a registrar.</p>
    
            <div class="form_reset">
                <form action="<?php $_SERVER["PHP_SELF"]; ?>" method="POST">

                    <div class="grid">
                        <div class="bloc-grid">
                            <select name="master" class="master" id="" required>
                                <option selected>¿Eres un maestro o un alumno?</option>
                                <option value="1">Maestro</option>
                                <option value="2">Alumno</option>
                            </select>
                        </div>
                        <div class="bloc-grid">
                            <label for="correo">Pon tu correo.</label>
                            <input type="email" name="correo" id="" required>
                        </div>
                        <div class="bloc-grid">
                            <label for="usuario">Pon tu usuario.</label>
                            <input type="text" name="usuario" id="" required>
                        </div>
                        <div class="bloc-grid">
                            <label for="numcontrol" >Pon tu número de control (Si eres maestro no lo llenes).</label>
                            <input type="text" name="numcontrol" id="" >
                        </div>
                        <div class="bloc-grid">
                            <label for="newcontra">Pon tu nueva contraseña.</label>
                            <input type="password" name="newcontra" id="" required>
                        </div>
                    </div>


                    <div class="form_boton">
                        <button class="boton" type="submit" name="restaurar" value="restaurar">Restaurar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
</body>
</html>
<?php mysqli_close($conexion); ?>