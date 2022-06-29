<?php

function connect(){
    include "base_db.php";
    return new mysqli("$host","$usuario", "$contra","$database");
    }
    $conexion = connect();
    $conexion->set_charset("utf8");
    
    // AGREGANDO CHARSET UTF8
    if (!$conexion->set_charset("utf8")) {
        printf("Error código CCWP_681_utf8, no se puede cargar el conjunto de caracteres utf8: %s\n", $conexion->error);
        exit();
    }

?> 