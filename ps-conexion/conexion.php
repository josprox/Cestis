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

    require __DIR__ . '/../vendor/autoload.php';

    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__, '../.env');
    $dotenv->load();

    //Cambio de configuración horaria
    date_default_timezone_set($_ENV['ZONA_HORARIA']);
    $fecha = date("Y-m-d H:i:s");

?> 