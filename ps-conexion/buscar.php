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

echo "<p>Session_gradgrup: ".$tugradgrup.", session_esp: ".$tuespecialidad.", session_turno: ".$tuturno."</p>";

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
    <div class="card">
            <h5 class="card-header">'.$fila['nombre'].'</h5>
            <div class="card-body">
              <h5 class="card-title">'.$fila['titulo'].'</h5>
              <p class="card-text">'.$fila['vista'].'</p>
              <a href="post?titulo='.$fila['titulo'].'" class="btn btn-primary">Ir a la publicación...</a>
            </div>
          </div>
          <br>
    ';
    }
}else{
    $salida .= "No hay datos";
}

echo $salida;

$mysqli->close();


?>