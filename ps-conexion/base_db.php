<?php

    // Código generado por Jossito Security

    require __DIR__ . '/../vendor/autoload.php';

    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__, '../.env');
    $dotenv->load();

    //Valores de la conexión
    $usuario = $_ENV['USUARIO'];
    $contra = $_ENV['CONTRA'];
    $database = $_ENV['BASE_DE_DATOS'];
    $host = $_ENV['HOST'];

    //Cambio de configuración horaria
    date_default_timezone_set($_ENV['ZONA_HORARIA']);
    $fecha = date("Y-m-d H:i:s");

?>