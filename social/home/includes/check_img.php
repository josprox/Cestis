<?php

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
        if ((isset($_FILES['imagen']['name'])&&($_FILES['imagen']['error']==UPLOAD_ERR_OK))){

            $destino_de_ruta ="../../ps-contenido/img/alumnos/";

            move_uploaded_file($_FILES['imagen']['tmp_name'],$destino_de_ruta . $_FILES['imagen']['name']);
        }else{
            echo "El archivo no se ha podido copiar a imagenes";
        }
    }

$img_datos = "SELECT img FROM usuarios WHERE id = '$iduser'";

$consulta_img = $conexion->query($img_datos);

$info_img = $consulta_img->fetch_assoc();

$img_actual = $info_img['img'];

if ($img_actual == "main.webp") {
    
    $myconsulta ="UPDATE usuarios SET img = '$imagen' WHERE usuarios.id = '$iduser'";

    $resultado = mysqli_query($conexion, $myconsulta);

    /* Cerramos conexion */

    /*mysqli_close($conexion);*/

    echo "<script>
            alert('La imagen fue actualizada correctamente. Codigo: perfil_img_1');
            window.location= './perfil';
        </script>";
}else{

    if (unlink("../../ps-contenido/img/alumnos/$img_actual")){
        $myconsulta ="UPDATE usuarios SET img = '$imagen' WHERE usuarios.id = '$iduser'";
    
        $resultado = mysqli_query($conexion, $myconsulta);
    
        /* Cerramos conexion */
    
        /*mysqli_close($conexion);*/
    
        echo "<script>
                alert('La imagen fue actualizada correctamente. Codigo: perfil_img_2');
                window.location= './perfil';
            </script>";
    }else{
        echo "<script>
                alert('La imagen fue subida al servidor pero no se pudo actualizar en la base de datos. Error: perfil_img_221');
                window.location= './perfil';
            </script>";
    }

}

?>