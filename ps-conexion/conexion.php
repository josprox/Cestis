<?php

function connect(){
    include "base_db.php";
    return new mysqli("$host","$usuario", "$contra","$database");
    }
    $conexion = connect();
    $conexion->set_charset("utf8");
    
    // AGREGANDO CHARSET UTF8
    if (!$conexion->set_charset("utf8")) {
        printf("Error al cargar el conjunto de caracteres utf8: %s\n", $conexion->error);
        exit();
    }
//$conexion = new mysqli('localhost',"root", "","cestis");
//if (mysqli_connect_errno()){
//    echo "No conectado",mysqli_connect_error();
//    exit();
//}else{
//    echo "Conectado";
//}

?> 