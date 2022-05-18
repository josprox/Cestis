<?php

include "base_db.php";

session_start();
if (!isset($_SESSION['id_usuario'])) {
    header("Location: ./");
}
$iduser = $_SESSION['id_usuario'];

$mysqli = new mysqli("$host","$usuario", "$contra","$database");

$datauser = "SELECT * FROM arg_alumno WHERE arg_alumno.id_alm = ".$iduser."";
$restdatauser = $mysqli->query($datauser);
$restfull = $restdatauser->fetch_assoc();

$tugradgrup = $restfull['id_gg'];
$tuespecialidad = $restfull['id_esp'];
$tuturno = $restfull['id_turn'];

$query = "SELECT maestros.nombre, maestros.img, publicaciones.titulo, publicaciones.vista FROM maestros INNER JOIN arg_public ON maestros.id = arg_public.id_mst INNER JOIN publicaciones ON arg_public.id_pbc = publicaciones.id WHERE arg_public.id_gradgrup = $tugradgrup && arg_public.id_esp = $tuespecialidad && arg_public.id_turno = $tuturno ORDER BY publicaciones.id DESC";

$salida = "";

if(isset($_POST['consulta'])){
    $q = $mysqli-> real_escape_string($_POST['consulta']);
    $query = "SELECT maestros.nombre, maestros.img, publicaciones.titulo, publicaciones.vista FROM maestros INNER JOIN arg_public ON maestros.id = arg_public.id_mst INNER JOIN publicaciones ON arg_public.id_pbc = publicaciones.id WHERE arg_public.id_gradgrup = $tugradgrup && arg_public.id_esp = $tuespecialidad && arg_public.id_turno = $tuturno && nombre LIKE '".$q."' OR titulo LIKE '%".$q."' OR vista LIKE '%".$q."' ORDER BY publicaciones.id DESC";
}

$resultado = $mysqli->query($query);

if($resultado -> num_rows > 0){
    while($fila = $resultado->fetch_assoc()){

        $salida.= '
        <div class="tarjetas">
                <div class="fch_black">

                    <div class="raw_item">
                        <img src="./ps-contenido/img/maestros/'.$fila['img'].'" alt="">
                    </div>

                    <div class="tits">
                        <h1>Nombre: '.$fila['nombre'].'</h1>
                        <h2>Actividad: '.$fila['titulo'].'</h2>
                    </div>
                </div>
                <p>'.$fila['vista'].'</p>
                <br>
                <a href="post?titulo='.$fila['titulo'].'">Acceder</a>
            </div>
        ';
    }
}else{
    $salida .= "<center><p>No hay datos o tu busqueda ha fallado, solo puedes buscar las actividades o nombres de los profesores.</p></center>";
}

echo $salida;

$mysqli->close();


?>