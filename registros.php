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
if (isset($_POST["registrar_user"])) {
    $usuario = mysqli_real_escape_string($conexion,$_POST['user_user']);
	$password = mysqli_real_escape_string($conexion,$_POST['user_pass']);
	$password_encriptada = password_hash($password,PASSWORD_BCRYPT,["cost"=>10]);
	$correo = mysqli_real_escape_string($conexion,$_POST['user_correo']);
	$num_control = mysqli_real_escape_string($conexion,$_POST['num_ctr']);
	$discapacidad = mysqli_real_escape_string($conexion,$_POST['user_disc']);
	$nombre = mysqli_real_escape_string($conexion,$_POST['user_name']);
    $check1 = mysqli_real_escape_string($conexion,$_POST['check1']);

    if (isset($check1)) {
        
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
    
    
        $gradgrup = mysqli_real_escape_string($conexion,$_POST['user_gradgrup']);
        $gradgrup1 = (int)$gradgrup;
        $esp = mysqli_real_escape_string($conexion,$_POST['user_esp']);
        $esp1 = (int)$esp;
        $turno = mysqli_real_escape_string($conexion,$_POST['user_turno']);
        $turno1 = (int)$turno;
        $genero = mysqli_real_escape_string($conexion,$_POST['user_genero']);
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
    }else{
        echo "<script>
            alert('No verificó los permisos de sus datos, favor de llenarlos de nuevo');
            window.location= './';
            </script>";
    }

}

//Registrar info de usuario
if (isset($_POST["registrar_mst"])) {
    $usuario = mysqli_real_escape_string($conexion,$_POST['mst_user']);
	$password = mysqli_real_escape_string($conexion,$_POST['mst_pass']);
	$password_encriptada = password_hash($password,PASSWORD_BCRYPT,["cost"=>10]);
	$correo = mysqli_real_escape_string($conexion,$_POST['mst_correo']);
	$discapacidad = mysqli_real_escape_string($conexion,$_POST['mst_disc']);
	$nombre = mysqli_real_escape_string($conexion,$_POST['mst_nombre']);
	$sexo = mysqli_real_escape_string($conexion,$_POST['mst_sexo']);
    $check2 = mysqli_real_escape_string($conexion,$_POST['check2']);
    
    if (isset($check2)) {

        $sqluser = "SELECT id FROM maestros 
        WHERE usuario = '$usuario'";
        $resultadouser = $conexion->query($sqluser);
        $filas = $resultadouser -> num_rows;
        if ($filas > 0) {
            echo "<script>
                alert('El usuario ya existe. Error CCWP-681_rgtmst');
                window.location= './maestros';
            </script>";
        }else{
            //Insertar info
            $sqlusuario = "INSERT INTO maestros (usuario, password, correo, img, nombre, discapacidad) 
            VALUES ('$usuario', '$password_encriptada', '$correo','main.webp', '$nombre', '$discapacidad')";
            $resultadousuario = $conexion->query($sqlusuario);
        }
    
        $sexo = mysqli_real_escape_string($conexion,$_POST['mst_sexo']);
        $sexo1 = (int)$sexo;
        $gradgrup = mysqli_real_escape_string($conexion,$_POST['mst_gradgrup']);
        $gradgrup1 = (int)$gradgrup;
        $esp = mysqli_real_escape_string($conexion,$_POST['mst_esp']);
        $esp1 = (int)$esp;
        $turno = mysqli_real_escape_string($conexion,$_POST['mst_turno']);
        $turno1 = (int)$turno;
    
        $sqldat = "SELECT id FROM maestros 
            WHERE usuario = '$usuario'";
        $resultadodat = $conexion->query($sqldat);
    
            $filas1 = $resultadodat -> num_rows;
    
        if ($filas1 > 1) {
                echo "<script>
                    alert('Registro de grupo ha fallado, ya existe uno asignado al maestro. Error CCWP-682_rgtmst');
                    window.location= './registro_maestro';
                </script>";
        }else{
    
            $filas2 = $resultadodat -> fetch_array();
    
            $id = $filas2[0];
            
            
            //Insertar info
            $sqlusuario1 = "INSERT INTO arg_maestro (id_gg, id_esp, id_mst, id_turno, id_sexo) 
            VALUES ('$gradgrup1', '$esp1', '$id','$turno1', '$sexo1')";
            $resultadousuario1 = $conexion->query($sqlusuario1);
            if ($resultadousuario1 > 0) {
            echo "<script>
            alert('Registro exitoso, favor de informar a la escuela');
            window.location= './maestros';
            </script>";
            }else{
            echo "<script>
            alert('Error al registrarse. Error CCWP-683_rgtmst');
            window.location= './registro_maestro';
            </script>";
            }
        }
        
    }else{
        echo "<script>
            alert('No verificó los permisos de sus datos, favor de llenarlos de nuevo');
            window.location= './';
            </script>";
    }

}

?>


<!DOCTYPE html>
<html lang="es-MX">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro | Cetis CWP</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <script src="https://kit.fontawesome.com/4a5e39d1d1.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./ps-contenido/scss/registro.css">
    <link rel="shortcut icon" href="./ps-contenido/app%20img/default.png" type="image/x-icon">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</head>
<body>

    <div class="contenedor">
        <div class="caja_form">

            <div class="caja_form_boton">
                <button type="button" class="precionar_boton active" onclick="login();" id="alm"><i class="fa-solid fa-user-check"></i> alumno</button>
                <button type="button" class="precionar_boton" onclick="registro();" id="mst"><i class="fa-solid fa-chalkboard-user"></i> maestro</button>
            </div>
            <div class="social">
                <a href="https://www.facebook.com/Josproxmx/" target="_blank" rel="noopener noreferrer"><i class="fa-brands fa-facebook"></i></a>
                <a href="https://josprox.com/" target="_blank" rel="noopener noreferrer"><i class="fa-solid fa-seedling"></i></a>
                <a href="https://github.com/josprox/Cetis-CWP" target="_blank" rel="noopener noreferrer"><i class="fa-brands fa-github"></i></a>
                <a href="./" target="_blank" rel="noopener noreferrer"><i class="fa-solid fa-school"></i></a>
                <a href="./social/" target="_blank" rel="noopener noreferrer"><i class="fa-solid fa-users"></i></a>
            </div>

            <center>
            <form id="login" action="<?php $_SERVER["PHP_SELF"]; ?>" method="POST" class="input_group">

                <input type="text" class="input_field" placeholder="¿Cuál es tu nombre?" name="user_name" required>

                <input type="text" class="input_field" placeholder="inserta tu correo electronico" name="user_correo" required>

                <input type="text" class="input_field" placeholder="¿Cuál es tu número de control?" name="num_ctr" required>

                <input type="text" class="input_field" placeholder="¿Tienes alguna discapacidad?" name="user_disc" required>

                <select name="user_genero" class="input_field">
                    <option selected>¿Cuál es tu genero?</option>
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
                <select name="user_gradgrup" class="input_field">
                    <option selected>¿Cuál es tu grado y grupo?</option>
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
                <select name="user_esp" class="input_field">
                    <option selected>¿Cuál es tu especialidad?</option>
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
                <select name="user_turno" class="input_field">
                    <option selected>¿Cuál es tu turno?</option>
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
                <input type="text" class="input_field" placeholder="ingresa un usuario" name="user_user" required>

                <input type="password" class="input_field" placeholder="ingresa tu contraseña de acceso" name="user_pass" required>

                <div class="grid_section">
                    <input type="checkbox" name="check1" class="input_check sect1" required>
                    <span class="sect2" >Acepta guardar esta información.</span>
                </div>

                <button type="submit" name="registrar_user" class="enviar_boton">Registrarse</button>
            </form>

            <form id="registro" action="<?php $_SERVER["PHP_SELF"]; ?>" method="POST" class="input_group">
                <input type="text" class="input_field" placeholder="¿Cuál es tu nombre?" name="mst_nombre" required>
                <input type="text" class="input_field" placeholder="inserta tu correo electronico" name="mst_correo" required>
                <input type="text" class="input_field" placeholder="¿Tienes alguna discapacidad?" name="mst_disc" required>
                <select name="mst_sexo" class="input_field">
                    <option selected>¿Cuál es tu genero?</option>
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
                <select name="mst_gradgrup" class="input_field">
                    <option selected>¿Qué grado y grupo te corresponde?</option>
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
                <select name="mst_esp" class="input_field">
                    <option selected>¿Cuál es la especialidad con la que trabajarás?</option>
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
                <select name="mst_turno" class="input_field">
                    <option selected>¿Cuál es el turno con la que trabajarás?</option>
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
                <input type="text" class="input_field" placeholder="ingresa un usuario" name="mst_user" required>
                <input type="password" class="input_field" placeholder="ingresa tu contraseña de acceso" name="mst_pass" required>

                <div class="grid_section">
                    <input type="checkbox" name="check2" class="input_check sect1" required>
                    <span class="sect2" >Acepta guardar esta información.</span>
                </div>

                <button type="submit" name="registrar_mst" class="enviar_boton">Registrarse</button>
            </form>

            </center>

        </div>
    </div>

    <script src="./ps-contenido/js/mostrar_registro.js"></script>
    
</body>
</html>